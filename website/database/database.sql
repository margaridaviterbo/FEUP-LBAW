.bail ON
.mode columns
.headers on
.nullvalue NULL
PRAGMA foreign_keys = ON;

CREATE TABLE IF NOT EXISTS User(
    user_id integer PRIMARY KEY,
    username varchar collate nocase NOT NULL UNIQUE,
    first_name varchar collate nocase,
    last_name varchar collate nocase,
    email varchar NOT NULL UNIQUE,
    photo_url varchar, 
    password varchar NOT NULL,
	birthday date,
	address varchar 
);


CREATE TABLE IF NOT EXISTS Event(
    event_id integer PRIMARY KEY,
    title varchar NOT NULL,
	beginning_date date  NOT NULL,
	finish_date date,
	recurrence varchar,
	local varchar NOT NULL,
	description varchar NOT NULL,
	price float NOT NULL,
	photo varchar
);

CREATE TABLE IF NOT EXISTS Owner(
    event_id integer NOT NULL UNIQUE, 
	owner_id integer NOT NULL,
	PRIMARY KEY(owner_id, event_id),
    FOREIGN KEY(event_id) REFERENCES Event(event_id),
    FOREIGN KEY(owner_id) REFERENCES User(user_id)
);

CREATE TABLE IF NOT EXISTS Guest(
    event_id integer NOT NULL, 
	guest_id integer NOT NULL,
	PRIMARY KEY(guest_id, event_id),
    FOREIGN KEY(event_id) REFERENCES Event(event_id),
    FOREIGN KEY(guest_id) REFERENCES User(user_id)
);

CREATE TABLE IF NOT EXISTS Event_Host(
    event_id integer NOT NULL, 
	event_host_id integer NOT NULL,
	PRIMARY KEY(event_host_id, event_id),
    FOREIGN KEY(event_id) REFERENCES Event(event_id),
    FOREIGN KEY(event_host_id) REFERENCES User(user_id)
);

CREATE TABLE IF NOT EXISTS Administrator(
    administrator_id integer PRIMARY KEY,
    username varchar collate nocase NOT NULL UNIQUE,
    email varchar UNIQUE,
    password varchar NOT NULL
);

CREATE TABLE IF NOT EXISTS Ticket(
    ticket_id integer PRIMARY KEY,
    event_id integer NOT NULL,
	user_id integer NOT NULL,
	pdf varchar NOT NULL,
	price float,
    FOREIGN KEY(event_id) REFERENCES Event(event_id),
    FOREIGN KEY(user_id) REFERENCES User(user_id)
);

CREATE TABLE IF NOT EXISTS TicketType(
    ticket_type_id integer PRIMARY KEY,
    event_id integer NOT NULL,
	price float NOT NULL,
	name varchar NOT NULL,
	description varchar,
    FOREIGN KEY(event_id) REFERENCES Event(event_id)
);
