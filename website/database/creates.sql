DROP SCHEMA public CASCADE;
CREATE SCHEMA public;

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

DROP TABLE IF EXISTS Visitor;

DROP TABLE IF EXISTS Host;

DROP TABLE IF EXISTS Type_of_Ticket;

CREATE TYPE notification_type AS ENUM(
    'userReport', 'eventReport', 'contentReport', 'eventCommented', 'eventCreatedPoll', 'eventRated', 'eventChangedLocal', 'eventChangedDate', 'eventChangedName', 'eventInvitation', 'eventCanceled', 'eventAllSoldTickets', 'eventReminder', 'userSentEmail'
);

CREATE TABLE public.Administrator
(
	administrator_id serial PRIMARY KEY,
	username varchar(20) UNIQUE NOT NULL,
	email varchar(254) UNIQUE NOT NULL,
	password varchar(30) NOT NULL
);

CREATE TABLE public.Users
(
	user_id serial PRIMARY KEY,
	first_name varchar(20) NOT NULL,
	last_name varchar(20) NOT NULL,
	email varchar(254) UNIQUE NOT NULL,
	birthdate date,
	nif int UNIQUE
);


CREATE TABLE public.Authenticated_User
(
	user_id serial PRIMARY KEY,
	username varchar(20) UNIQUE NOT NULL,
	password varchar(30) NOT NULL,
	photo_url varchar(150),
	FOREIGN KEY(user_id) REFERENCES Users(user_id)
);

CREATE TABLE public.Category
(
	category_id serial PRIMARY KEY,
	name varchar(50) UNIQUE NOT NULL
);

CREATE TABLE public.Country
(
	country_id serial PRIMARY KEY,
	name varchar(20) NOT NULL
);

CREATE TABLE public.City
(
	city_id serial PRIMARY KEY,
	name varchar(20) NOT NULL,
	country_id integer,
	FOREIGN KEY(city_id) REFERENCES Country(country_id)
);

CREATE TABLE public.Localization
(	
	local_id serial PRIMARY KEY,
    street VARCHAR(200),
    coordinates VARCHAR(100) NOT NULL,
    city_id INTEGER,
    FOREIGN KEY(city_id) REFERENCES City(city_id)
);

CREATE TABLE public.Meta_Event
(
	meta_event_id serial PRIMARY KEY,
	name varchar(50) NOT NULL,
	description varchar(2000) NOT NULL,
	recurrence varchar(20) NOT NULL,
	photo_url varchar(150),
	expiration_date timestamp,
	free boolean NOT NULL,
	owner_id integer,
	category_id integer,
	local_id integer,
	FOREIGN KEY(owner_id) REFERENCES Authenticated_User(user_id),
	FOREIGN KEY(category_id) REFERENCES Category(category_id),
	FOREIGN KEY(local_id) REFERENCES Localization(local_id)
);

CREATE TABLE public.Event
(
	event_id serial PRIMARY KEY,
	name varchar(50) NOT NULL,
	description varchar(2000),
	beginning_date timestamp NOT NULL,
	ending_date timestamp,
	photo_url varchar(150),
	free boolean NOT NULL,
	meta_event_id integer NOT NULL,
	local_id integer NOT NULL,
	FOREIGN KEY(meta_event_id) REFERENCES Meta_Event(meta_event_id),
	FOREIGN KEY(local_id) REFERENCES Localization(local_id)
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
	comment_id serial PRIMARY KEY,
	content varchar(500),
	photo_url varchar(150),
	comment_date timestamp NOT NULL,
	FOREIGN KEY(comment_id) REFERENCES Event_Content(event_content_id)
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
	notification_date timestamp NOT NULL,
	notification_type notification_type NOT NULL,
	checked boolean NOT NULL, 
	event_id integer,
	event_content_id integer,
	user_id integer,
	administrator_id integer,
	FOREIGN KEY(event_id) REFERENCES Event(event_id),
	FOREIGN KEY(event_content_id) REFERENCES Event_Content(event_content_id),
	FOREIGN KEY(user_id) REFERENCES Authenticated_User(user_id),
	FOREIGN KEY(administrator_id) REFERENCES Administrator(administrator_id)
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
	poll_id serial PRIMARY KEY,
	poll_type integer NOT NULL,
	poll_date timestamp NOT NULL,
    FOREIGN KEY(poll_id) REFERENCES Event_Content(event_content_id)
);

CREATE TABLE public.Poll_Unit
(
	poll_unit_id serial PRIMARY KEY,
	name varchar(20) NOT NULL,
	poll_id integer,
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
	avaliation int NOT NULL,
	FOREIGN KEY(event_content_id) REFERENCES Event_Content(event_content_id)
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
	ticket_type varchar NOT NULL,
	price float NOT NULL,
	meta_event_id integer,
	event_id integer,
	FOREIGN KEY(meta_event_id) REFERENCES Meta_Event(meta_event_id),
	FOREIGN KEY(event_id) REFERENCES Event(event_id)
);

CREATE TABLE public.Ticket
(
	ticket_id serial PRIMARY KEY,
	name varchar NOT NULL,
	nif integer NOT NULL,
	user_id integer NOT NULL,
	type_of_ticket_id integer NOT NULL,
	FOREIGN KEY(user_id) REFERENCES Users(user_id),
	FOREIGN KEY(type_of_ticket_id) REFERENCES Type_of_Ticket(type_of_ticket_id)
);

