INSERT INTO public.category(name) VALUES ('none');
INSERT INTO public.category(name) VALUES ('arts');
INSERT INTO public.category(name) VALUES ('business');
INSERT INTO public.category(name) VALUES ('charity');
INSERT INTO public.category(name) VALUES ('food&drinks');
INSERT INTO public.category(name) VALUES ('music');

insert into public.users (first_name, last_name, email, nif) values ('Catarina', 'Correia', 'cat@gmail.com',    123456789);
insert into public.users (first_name, last_name, email, nif) values ('Maria', 'Joana', 'joana@gmail.com',    123456788);
insert into public.users (first_name, last_name, email, nif) values ('Laura', 'Joana', 'joanae@gmail.com',    423456788);


insert into public.authenticated_user (user_id, username, password, user_state) values (1, 'catarina24', '8bc5de83cf1daf79ed5b2f13f93d7c05d01d0388', 'active');
insert into public.authenticated_user (user_id, username, password, user_state) values (2, 'joana123', '8bc5de83cf1daf79ed5b2f13f93d7c05d01d0388', 'active');
insert into public.authenticated_user (user_id, username, password, user_state) values (3, 'joana13', '8bc5de83cf1daf79ed5b2f13f93d7c05d01d0388', 'active');

insert into country (name) VALUES ('Portugal');

insert into city (name, country_id) VALUES ('Porto', 1);

insert into localization (latitude, longitude, street, city_id) VALUES (22, 22, null, 1);

insert into meta_event (name, description, beginning_date, ending_date, meta_event_state, photo_url, free, public, owner_id, category_id, local_id) VALUES ('Teste', 'neque duis bibendum morbi non quam nec dui luctus rutrum nulla tellus in sagittis dui vel nisl duis ac nibh fusce lacus purus aliquet at feugiat non pretium quis lectus suspendisse potenti in eleifend quam a odio in hac habitasse platea dictumst maecenas ut massa', '2017-06-28 01:40:59.273000', null, false, null, true, true, 1, 1, 1);
insert into meta_event (name, description, beginning_date, ending_date, meta_event_state, photo_url, free, public, owner_id, category_id, local_id) VALUES ('Teste dois', 'este e um teste de resistencia', '2017-06-28 01:40:59.273000', null, false, null, true, true, 1, 1, 1);
insert into meta_event (name, description, beginning_date, ending_date, meta_event_state, photo_url, free, public, owner_id, category_id, local_id) VALUES ('Teste tres', 'este e um teste de muita resistencia', '2017-06-28 01:40:59.273000', null, false, null, false, true, 1, 1, 1);

insert into public.type_of_ticket (ticket_type, price, num_tickets, meta_event_id, event_id) values ('expensive', 1000, 470, 3,NULL);
insert into public.type_of_ticket (ticket_type, price, num_tickets, meta_event_id, event_id) values ('more', 100, 33, 3,NULL);
insert into public.type_of_ticket (ticket_type, price, num_tickets, meta_event_id, event_id) values ('cheap', 10, 186, 3,NULL);
insert into public.type_of_ticket (ticket_type, price, num_tickets, meta_event_id, event_id) values ('almostfree', 1, 397, 3,NULL);

insert into public.event_content (user_id, event_id) values (1, 1);
insert into public.event_content (user_id, event_id) values (2, 3);
insert into public.event_content (user_id, event_id) values (1, 1);
insert into public.event_content (user_id, event_id) values (1, 2);
insert into public.event_content (user_id, event_id) values (1, 2);
insert into public.event_content (user_id, event_id) values (1, 2);
insert into public.event_content (user_id, event_id) values (1, 2);
insert into public.event_content (user_id, event_id) values (1, 3);
insert into public.event_content (user_id, event_id) values (2, 3);
insert into public.event_content (user_id, event_id) values (2, 3);
insert into public.event_content (user_id, event_id) values (2, 3);

insert into public.Rate (event_content_id, evaluation) values (1,3);
insert into public.Rate (event_content_id, evaluation) values (4,2);
insert into public.Rate (event_content_id, evaluation) values (8,2);

insert into public.Guest (is_going, user_id, event_id) values (false, 2, 3);
insert into public.Guest (is_going, user_id, event_id) values (true, 3, 3);

insert into public.Comments (comment_id, content, photo_url, comment_date) values (2, 'turpis adipiscing lorem vitae mattis nibh ligula nec sem duis aliquam convallis nunc proin at turpis a pede posuere nonummy integer non velit donec diam neque vestibulum eget vulputate ut ultrices vel augue vestibulum ante ipsum primis in faucibus orci luctus et', 'http://epa.gov/massa/quis/augue/luctus/tincidunt/nulla.json?placerat=porta&ante=volutpat&nulla=quam&justo=pede&aliquam=lobortis&quis=ligula&turpis=sit&eget=amet&elit=eleifend&sodales=pede&scelerisque=libero&mauris=quis&sit=orci&amet=nullam&eros=molestie&suspendisse=nibh&accumsan=in&tortor=lectus&quis=pellentesque&turpis=at&sed=nulla&ante=suspendisse&vivamus=potenti&tortor=cras&duis=in&mattis=purus&egestas=eu&metus=magna&aenean=vulputate&fermentum=luctus&donec=cum', '2017-05-11 17:46:49');
