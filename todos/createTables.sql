CREATE TABLE users( id int not null auto_increment, username varchar(255) not null, email varchar(255) not null,password varchar(255) not null, primary key (id) );

CREATE TABLE todos(id int not null auto_increment, description varchar(255) not null, completed BOOL not null, userid int not null, primary key (id) );