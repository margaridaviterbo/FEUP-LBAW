.bail ON
.mode columns
.headers on
.nullvalue NULL
PRAGMA foreign_keys = ON;

DROP TABLE IF EXISTS Administrator CASCADE;

DROP TABLE IF EXISTS Authenticated_User CASCADE;

DROP TABLE IF EXISTS Category CASCADE;

DROP TABLE IF EXISTS City CASCADE;

DROP TABLE IF EXISTS Comments CASCADE;

DROP TABLE IF EXISTS Country CASCADE;

DROP TABLE IF EXISTS Event CASCADE;

DROP TABLE IF EXISTS Event_Content CASCADE;

DROP TABLE IF EXISTS Guest CASCADE;

DROP TABLE IF EXISTS Hosts CASCADE;

DROP TABLE IF EXISTS JoinPoll_UnitToAuthenticated_User CASCADE;

DROP TABLE IF EXISTS Localization CASCADE;

DROP TABLE IF EXISTS Meta_Event CASCADE;

DROP TABLE IF EXISTS Notification CASCADE;

DROP TABLE IF EXISTS Notification Intervinient CASCADE;

DROP TABLE IF EXISTS Paid_Event CASCADE;

DROP TABLE IF EXISTS Poll CASCADE;

DROP TABLE IF EXISTS Poll_Unit CASCADE;

DROP TABLE IF EXISTS Rate CASCADE;

DROP TABLE IF EXISTS Saved_Event CASCADE;

DROP TABLE IF EXISTS Ticket CASCADE;

DROP TABLE IF EXISTS Users CASCADE;

DROP TABLE IF EXISTS Visitor CASCADE;

CREATE TABLE Administrator
(
	administrator_id integer PRIMARY KEY,
	username varchar UNIQUE NOT NULL,
	email varchar UNIQUE NOT NULL,
	password varchar NOT NULL
);

CREATE TABLE Authenticated_User
(
	user_id integer PRIMARY KEY
	username varchar UNIQUE NOT NULL,
	password varchar NOT NULL,
	photo_url varchar,
	FOREIGN KEY(user_id) REFERENCES User(user_id)
);

CREATE TABLE Category
(
	category_id integer PRIMARY KEY,
	name varchar UNIQUE NOT NULL
);

CREATE TABLE City
(
	city_id integer PRIMARY KEY,
	name varchar NOT NULL,
	country_id integer,
	FOREIGN KEY(country_id) REFERENCES Country(country_id)
);

CREATE TABLE Comments
(
	comment_id integer PRIMARY KEY,
	content varchar,
	photo_url varchar,
	comment_date timestamp NOT NULL,
	FOREIGN KEY(comment_id) REFERENCES Event_Content(event_content_id)
);

CREATE TABLE Country
(
	country_id integer PRIMARY KEY,
	name varchar NOT NULL
);

CREATE TABLE Event
(
	event_id integer PRIMARY KEY,
	name varchar Meta_Event.name,
	description varchar Meta_Event.description,
	beginning_date timestamp NOT NULL,
	ending_date timestamp,
	photo_url varchar Meta_Event.photo_url,
	free boolean Meta_Event.free,
	meta_event_id integer,
	local_id integer, /* ou coordenadas?? */
	FOREIGN KEY(meta_event_id) REFERENCES Meta_Event(meta_event_id),
	FOREIGN KEY(local_id) REFERENCES Localization(local_id)
);

CREATE TABLE Event_Content
(
	event_content_id integer PRIMARY KEY,
	user_id integer,
	event_id integer,
	FOREIGN KEY(user_id) REFERENCES Authenticated_User(user_id),
	FOREIGN KEY(event_id) REFERENCES Event(event_id)
);

CREATE TABLE Guest
(
	is_going boolean NOT NULL,
	user_id integer,
	event_id integer,
	PRIMARY KEY(user_id, event_id),
	FOREIGN KEY(user_id) REFERENCES Authenticated_User(user_id),
	FOREIGN KEY(event_id) REFERENCES Event(event_id)
);

CREATE TABLE Host
(
	user_id integer,
	meta_event_id integer,
	PRIMARY KEY(user_id, event_id),
	FOREIGN KEY(user_id) REFERENCES Authenticated_User(user_id),
	FOREIGN KEY(meta_event_id) REFERENCES Meta_Event(meta_event_id)
)
;

CREATE TABLE JoinPoll_UnitToAuthenticated_User
(
	user_id integer,
	poll_unit_id integer,
	PRIMARY KEY(user_id, poll_unit_id),
	FOREIGN KEY(user_id) REFERENCES Authenticated_User(user_id),
	FOREIGN KEY(meta_event_id) REFERENCES Poll_Unit(poll_unit_id)
);

CREATE TABLE Localization
(	
	local_id integer PRIMARY KEY,
	street varchar,
	coordinates varchar,
	city_id integer,
	FOREIGN KEY(city_id) REFERENCES City(city_id)
)
;

CREATE TABLE Meta_Event
(
	meta_event_id integer PRIMARY KEY,
	name varchar NOT NULL,
	description varchar NOT NULL,
	recurrence varchar NOT NULL,
	photo_url varchar,
	expiration_date timestamp,
	free boolean NOT NULL,
	owner_id integer,
	category_id integer,
	local_id integer,
	FOREIGN KEY(owner_id) REFERENCES Authenticated_User(user_id),
	FOREIGN KEY(category_id) REFERENCES Category(category_id),
	FOREIGN KEY(localID) REFERENCES Localization(local_id)
);

/* duvidas */
CREATE TABLE Notification
(
	notification_id integer PRIMARY KEY,
	notification_date timestamp NOT NULL,
	notification_type enum,
	checked boolean NOT NULL, /*read*/
	event_id integer,
	event_content_id integer,
	FOREIGN KEY(event_id) REFERENCES Event(event_id),
	FOREIGN KEY(event_content_id) REFERENCES Event_Content(event_content_id)
);

CREATE TABLE Notification_Intervinient
(
	user_id integer,
	notification_id integer,
	PRIMARY KEY(user_id, notification_id),
	FOREIGN KEY(user_id) REFERENCES Authenticated_User(user_id),
	FOREIGN KEY(notification_id) REFERENCES Notification(notification_id)
);

CREATE TABLE Poll
(
	poll_id integer PRIMARY KEY,
	poll_type integer NOT NULL,
	poll_date timestamp NOT NULL
);

CREATE TABLE Poll_Unit
(
	poll_unit_id integer PRIMARY KEY,
	name varchar NOT NULL,
	poll_id integer,
	FOREIGN KEY(poll_id) REFERENCES Poll(poll_id),
);

CREATE TABLE Rate
(
	event_content_id integer PRIMARY KEY,
	avaliation int,
	FOREIGN KEY(event_content_id) REFERENCES Event_Content(event_content_id)
);

CREATE TABLE Saved_Event
(
	user_id integer,
	meta_event_id integer,
	PRIMARY KEY(user_id, event_id),
	FOREIGN KEY(user_id) REFERENCES Authenticated_User(user_id),
	FOREIGN KEY(meta_event_id) REFERENCES Meta_Event(meta_event_id)
);

CREATE TABLE Ticket
(
	ticket_id integer PRIMARY KEY,
	name varchar NOT NULL,
	nif integer NOT NULL,
	user_id integer,
	type_of_ticket_id integer,
	FOREIGN KEY(user_id) REFERENCES Users(user_id),
	FOREIGN KEY(type_of_ticket_id) REFERENCES Type_of_Ticket(type_of_ticket_id)
);

CREATE TABLE Type_of_Ticket
(
	type_of_ticket_id integer PRIMARY KEY,
	ticket_type varchar NOT NULL,
	price float NOT NULL,
	meta_event_id integer,
	event_id integer,
	FOREIGN KEY(meta_event_id) REFERENCES Meta_Event(meta_event_id),
	FOREIGN KEY(event_id) REFERENCES Event(event_id)
);

CREATE TABLE Users
(
	user_id integer PRIMARY KEY,
	first_name varchar NOT NULL,
	last_name varchar NOT NULL,
	email varchar UNIQUE NOT NULL,
	birthdate date,
	nif int UNIQUE
);

CREATE TABLE Visitor
(
	visitor_id integer PRIMARY KEY,
	FOREIGN KEY(visitor_id) REFERENCES Users(user_id)
);
