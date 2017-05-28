
INSERT INTO public.category(name) VALUES ('none');
INSERT INTO public.category(name) VALUES ('arts');
INSERT INTO public.category(name) VALUES ('business');
INSERT INTO public.category(name) VALUES ('charity');
INSERT INTO public.category(name) VALUES ('food&drinks');
INSERT INTO public.category(name) VALUES ('music');

insert into public.users (first_name, last_name, email, nif) values ('Catarina', 'Correia', 'cat@gmail.com',    123456789);
insert into public.users (first_name, last_name, email, nif) values ('Maria', 'Joana', 'joana@gmail.com',    123456788);

insert into public.authenticated_user (user_id, username, password, user_state) values (1, 'catarina24', '8bc5de83cf1daf79ed5b2f13f93d7c05d01d0388', 'active');
insert into public.authenticated_user (user_id, username, password, user_state) values (2, 'joana123', '8bc5de83cf1daf79ed5b2f13f93d7c05d01d0388', 'active');

insert into country (name) VALUES ('Portugal');

insert into city (name, country_id) VALUES ('Porto', 1);

insert into localization (latitude, longitude, street, city_id) VALUES (22, 22, null, 1);

insert into meta_event (name, description, beginning_date, ending_date, meta_event_state, photo_url, free, public, owner_id, category_id, local_id) VALUES ('Teste', 'neque duis bibendum morbi non quam nec dui luctus rutrum nulla tellus in sagittis dui vel nisl duis ac nibh fusce lacus purus aliquet at feugiat non pretium quis lectus suspendisse potenti in eleifend quam a odio in hac habitasse platea dictumst maecenas ut massa', '2017-06-28 01:40:59.273000', null, false, null, true, true, 1, 1, 1);