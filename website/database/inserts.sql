/* ADMIN */

INSERT INTO public.administrator(username, email, password) VALUES ('administrator', 'admin@fe.up.pt', '12345678');
INSERT INTO public.administrator(username, email, password) VALUES ('administrator2', 'admin2@fe.up.pt', '12345678');

/* USER */

INSERT INTO public.users(first_name, last_name, email, nif) VALUES ('Catarina', 'Correia', 'cat@fe.up.pt', 123456789);
INSERT INTO public.users(first_name, last_name, email, nif) VALUES ('Margarida', 'Viterbo', 'viterbo@fe.up.pt', 123456788);
INSERT INTO public.users(first_name, last_name, email, nif) VALUES ('Rui', 'Paiva', 'rvop@fe.up.pt', 123456787);


/* Authenticated_User */

INSERT INTO public.authenticated_user(username, password) VALUES ('catcorreia', 'catteste');


/* Category */

INSERT INTO public.category(name) VALUES ('food');
INSERT INTO public.category(name) VALUES ('economy');
INSERT INTO public.category(name) VALUES ('politics');

/* Country */

INSERT INTO public.country(name) VALUES ('Portugal');


/* City */

INSERT INTO public.city(name, country_id) VALUES ('Vila Real', 1);
/*INSERT INTO public.city(name, country_id) VALUES ('Porto', 1);*/


/* Localization */

INSERT INTO public.localization(coordinates, city_id) VALUES ('lol', 1);

/* Meta_event */

INSERT INTO public.meta_event(name, description, recurrence, expiration_date, free, owner_id, category_id, local_id) VALUES ('Dogs', 'Lets adopt them!', 'daily', TIMESTAMP '2018-05-16 15:36:38', true, 1, 1, 1);

/* Event */

INSERT INTO public.event(name, description, beginning_date, ending_date, free, meta_event_id, local_id) VALUES('Dogs', 'Lets adopt them!', TIMESTAMP '2018-05-16 15:36:38', TIMESTAMP '2018-05-20 15:36:38', false, 1, 1);

/*Event_Content*/

INSERT INTO public.event_content(user_id, event_id) VALUES (1, 1);

/*Type_of_ticket */
INSERT INTO public.type_of_ticket(ticket_type, price, num_tickets, meta_event_id, event_id) VALUES ('Plateia', 10, 2, 1, 1);