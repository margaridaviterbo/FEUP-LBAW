
INSERT INTO public.category(name) VALUES ('none');
INSERT INTO public.category(name) VALUES ('arts');
INSERT INTO public.category(name) VALUES ('business');
INSERT INTO public.category(name) VALUES ('charity');
INSERT INTO public.category(name) VALUES ('food&drinks');
INSERT INTO public.category(name) VALUES ('music');

insert into public.users (first_name, last_name, email, nif) values ('Catarina', 'Correia', 'cat@gmail.com',    123456789);

insert into public.authenticated_user (user_id, username, password, user_state) values (1, 'catarina24', '8bc5de83cf1daf79ed5b2f13f93d7c05d01d0388', 'active');
