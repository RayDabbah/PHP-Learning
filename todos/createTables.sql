CREATE TABLE users( id serial primary key, username varchar(255) not null, email varchar(255) not null,password varchar(255) not null);

CREATE TABLE todos(id serial primary key, description varchar(255) not null, completed BOOL not null, userid int not null);
