CREATE TABLE users( id SERIAL int not null, username varchar(255) not null, email varchar(255) not null,password varchar(255) not null, primary key (id) );

CREATE TABLE todos(id SERIAL int not null, description varchar(255) not null, completed BOOL not null, userid int not null, primary key (id) );