DROP SCHEMA IF EXISTS public CASCADE;
CREATE SCHEMA public;
SET SCHEMA 'public';

GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO public;

DROP TABLE IF EXISTS Administrator;

DROP TABLE IF EXISTS Authenticated_User;

DROP TABLE IF EXISTS Category;

DROP TABLE IF EXISTS City;

DROP TABLE IF EXISTS Comments;

DROP TABLE IF EXISTS Country;

DROP TABLE IF EXISTS Event;

DROP TABLE IF EXISTS Event_Content;

DROP TABLE IF EXISTS Guest;

DROP TABLE IF EXISTS Hosts;

DROP TABLE IF EXISTS JoinPoll_UnitToAuthenticated_User;

DROP TABLE IF EXISTS Localization;

DROP TABLE IF EXISTS Meta_Event;

DROP TABLE IF EXISTS Notification;

DROP TABLE IF EXISTS Notification_Intervinient;

DROP TABLE IF EXISTS Paid_Event;

DROP TABLE IF EXISTS Poll;

DROP TABLE IF EXISTS Poll_Unit;

DROP TABLE IF EXISTS Rate;

DROP TABLE IF EXISTS Saved_Event;

DROP TABLE IF EXISTS Ticket;

DROP TABLE IF EXISTS Users;

DROP TABLE IF EXISTS Host;

DROP TABLE IF EXISTS Type_of_Ticket;

CREATE TYPE notification_type AS ENUM(
    'userReport', 'eventReport', 'contentReport', 'eventCommented', 'eventCreatedPoll', 'eventRated', 'eventChangedLocal', 'eventChangedDate', 'eventChangedName', 'eventInvitation', 'eventCanceled', 'eventAllSoldTickets', 'eventReminder', 'userSentEmail'
);

CREATE TYPE recurrence AS ENUM(
	'daily', 'weekly', 'once', 'annually', 'quarterly', 'semester'
);

CREATE TYPE user_state AS ENUM(
	'notConfirmed', 'active', 'canceledAdmin', 'canceledUser'
);

CREATE FUNCTION XOR(bool,bool) RETURNS bool AS '
SELECT ($1 AND NOT $2) OR (NOT $1 AND $2);
' LANGUAGE 'sql';

CREATE TABLE public.Administrator
(
	administrator_id serial PRIMARY KEY,
	username varchar(1000) UNIQUE NOT NULL,
	email varchar(1000) UNIQUE NOT NULL,
	password varchar(1000) NOT NULL,
	active boolean NOT NULL,
	CONSTRAINT min_size CHECK (LENGTH(username) >= 8 AND LENGTH(password) >= 8)
);

CREATE TABLE public.Users
(
	user_id serial PRIMARY KEY,
	first_name varchar(1000) NOT NULL,
	last_name varchar(1000) NOT NULL,
	email varchar(1000) UNIQUE NOT NULL,
	birthdate date,
	nif int UNIQUE,
	CONSTRAINT min_size CHECK (LENGTH(first_name) >= 3 AND LENGTH(last_name) >= 2 AND length(nif::TEXT) = 9),
	CONSTRAINT valid_date CHECK (birthdate < current_date)
);


CREATE TABLE public.Authenticated_User
(
	user_id serial PRIMARY KEY,
	username varchar(1000) UNIQUE NOT NULL,
	password varchar(1000) NOT NULL,
	photo_url varchar(1000),
	user_state user_state NOT NULL,
	FOREIGN KEY(user_id) REFERENCES Users(user_id),
	CONSTRAINT min_size CHECK (LENGTH(username) >= 8 AND LENGTH(password) >= 8)
);

CREATE TABLE public.Category
(
	category_id serial PRIMARY KEY,
	name varchar(1000) UNIQUE NOT NULL
);

CREATE TABLE public.Country
(
	country_id serial PRIMARY KEY,
	name varchar(1000) UNIQUE NOT NULL
);

CREATE TABLE public.City
(
	city_id serial PRIMARY KEY,
	name varchar(1000) NOT NULL,
	country_id integer,
	FOREIGN KEY(city_id) REFERENCES Country(country_id)
);

CREATE TABLE public.Localization
(	
	local_id serial PRIMARY KEY,
    street VARCHAR(1000),
	coordinates VARCHAR(1000) NOT NULL,
	city_id INTEGER,
	FOREIGN KEY(city_id) REFERENCES City(city_id)
);

CREATE TABLE public.Meta_Event
(
	meta_event_id serial PRIMARY KEY,
	name varchar(1000) NOT NULL,
	description varchar(20000) NOT NULL,
	recurrence recurrence NOT NULL,
	meta_event_state boolean NOT NULL,
    photo_url varchar(1000),
	expiration_date timestamp,
	free boolean NOT NULL,
	owner_id integer NOT NULL,
	category_id integer NOT NULL,
	local_id integer NOT NULL,
	FOREIGN KEY(owner_id) REFERENCES Authenticated_User(user_id),
	FOREIGN KEY(category_id) REFERENCES Category(category_id),
	FOREIGN KEY(local_id) REFERENCES Localization(local_id),
	CONSTRAINT expiration_date CHECK (expiration_date > current_date)
);

/*TODO: fazer trigger para quando se adiciona um evento verificar o tipo de meta_event */
CREATE TABLE public.Event
(
	event_id serial PRIMARY KEY,
	name varchar(1000) NOT NULL,
	description varchar(20000) NOT NULL,
	beginning_date timestamp NOT NULL,
	ending_date timestamp,
    event_state boolean NOT NULL,
	photo_url varchar(1000),
	free boolean NOT NULL,
	meta_event_id integer NOT NULL,
	local_id integer NOT NULL,
	FOREIGN KEY(meta_event_id) REFERENCES Meta_Event(meta_event_id),
	FOREIGN KEY(local_id) REFERENCES Localization(local_id),
	/*CONSTRAINT beginning_date CHECK (beginning_date > current_date),*/
	CONSTRAINT end_date CHECK (ending_date > beginning_date)
);

CREATE TABLE public.Event_Content
(
	event_content_id serial PRIMARY KEY,
	user_id integer NOT NULL,
	event_id integer NOT NULL,
	FOREIGN KEY(user_id) REFERENCES Authenticated_User(user_id),
	FOREIGN KEY(event_id) REFERENCES Event(event_id)
);


CREATE TABLE public.Comments
(
	comment_id integer PRIMARY KEY,
	content varchar(10000),
	photo_url varchar(2000),
	comment_date timestamp NOT NULL DEFAULT now(),
	FOREIGN KEY(comment_id) REFERENCES Event_Content(event_content_id),
	CONSTRAINT valid_content CHECK (photo_url IS NOT NULL OR content IS NOT NULL)
);

CREATE TABLE public.Guest
(
	is_going boolean NOT NULL,
	user_id integer,
	event_id integer,
	PRIMARY KEY(user_id, event_id),
	FOREIGN KEY(user_id) REFERENCES Authenticated_User(user_id),
	FOREIGN KEY(event_id) REFERENCES Event(event_id)
);

CREATE TABLE public.Host
(
	user_id integer,
	meta_event_id integer,
	PRIMARY KEY(user_id, meta_event_id),
	FOREIGN KEY(user_id) REFERENCES Authenticated_User(user_id),
	FOREIGN KEY(meta_event_id) REFERENCES Meta_Event(meta_event_id)
);

CREATE TABLE public.Notification
(
	notification_id serial PRIMARY KEY,
	notification_date timestamp NOT NULL DEFAULT now(),
	notification_type notification_type NOT NULL,
	checked boolean NOT NULL, 
	event_id integer,
	event_content_id integer,
	user_id integer,
	administrator_id integer,
	FOREIGN KEY(event_id) REFERENCES Event(event_id),
	FOREIGN KEY(event_content_id) REFERENCES Event_Content(event_content_id),
	FOREIGN KEY(user_id) REFERENCES Authenticated_User(user_id),
	FOREIGN KEY(administrator_id) REFERENCES Administrator(administrator_id),
	CONSTRAINT report CHECK (notification_type IN ('userReport', 'contentReport', 'eventReport') AND administrator_id IS NOT NULL),
	CONSTRAINT valid_user CHECK (XOR(user_id IS NOT NULL, administrator_id IS NOT NULL))
);

CREATE TABLE public.Notification_Intervinient
(
	user_id integer,
	notification_id integer,
	PRIMARY KEY(user_id, notification_id),
	FOREIGN KEY(user_id) REFERENCES Authenticated_User(user_id),
	FOREIGN KEY(notification_id) REFERENCES Notification(notification_id)
);

CREATE TABLE public.Poll
(
	poll_id integer PRIMARY KEY,
	poll_type integer NOT NULL,
	poll_date timestamp NOT NULL DEFAULT now(),
  FOREIGN KEY(poll_id) REFERENCES Event_Content(event_content_id)
);

CREATE TABLE public.Poll_Unit
(
	poll_unit_id serial PRIMARY KEY,
	name varchar(1000) NOT NULL,
	poll_id integer NOT NULL,
	FOREIGN KEY(poll_id) REFERENCES Poll(poll_id)
);

CREATE TABLE public.JoinPoll_UnitToAuthenticated_User
(
  user_id integer,
  poll_unit_id integer,
  PRIMARY KEY(user_id, poll_unit_id),
  FOREIGN KEY(user_id) REFERENCES Authenticated_User(user_id),
  FOREIGN KEY(poll_unit_id) REFERENCES Poll_Unit(poll_unit_id)
);

CREATE TABLE public.Rate
(
	event_content_id integer PRIMARY KEY,
	evaluation integer NOT NULL,
	FOREIGN KEY(event_content_id) REFERENCES Event_Content(event_content_id),
	CONSTRAINT check_evaluation CHECK (evaluation <= 10 AND evaluation > 0)
);

CREATE TABLE public.Saved_Event
(
	user_id integer,
	meta_event_id integer,
	PRIMARY KEY(user_id, meta_event_id),
	FOREIGN KEY(user_id) REFERENCES Authenticated_User(user_id),
	FOREIGN KEY(meta_event_id) REFERENCES Meta_Event(meta_event_id)
);

CREATE TABLE public.Type_of_Ticket
(
	type_of_ticket_id serial PRIMARY KEY,
	ticket_type varchar(1000) NOT NULL,
	price float NOT NULL,
	num_tickets integer NOT NULL,
	meta_event_id integer,
	event_id integer,
	FOREIGN KEY(meta_event_id) REFERENCES Meta_Event(meta_event_id),
	FOREIGN KEY(event_id) REFERENCES Event(event_id),
	CONSTRAINT positive_price CHECK (price > 0),
	CONSTRAINT valid_num_tickets CHECK (num_tickets > 0),
	CONSTRAINT has_event CHECK (meta_event_id IS NOT NULL OR event_id IS NOT NULL)
);

CREATE TABLE public.Ticket
(
	ticket_id serial PRIMARY KEY,
	name varchar(1000) NOT NULL,
	nif integer NOT NULL,
	user_id integer NOT NULL,
	type_of_ticket_id integer NOT NULL,
	FOREIGN KEY(user_id) REFERENCES Users(user_id),
	FOREIGN KEY(type_of_ticket_id) REFERENCES Type_of_Ticket(type_of_ticket_id),
	CONSTRAINT valid_nif CHECK (LENGTH(nif::TEXT) = 9)
);
