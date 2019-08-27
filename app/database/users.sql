
drop database if exists spm_demo;
create database  if not exists spm_demo;
use spm_demo;

CREATE TABLE  if not exists user (
  username  varchar(32)    NOT NULL,
  password  varchar(255)  NOT NULL,
  type varchar(32) NOT NULL,
  primary key (username)
);


INSERT into user VALUES ("admin", "$2y$10$eTxYGpUs8O7wD1t9fyPsg.SadBZwiGQsSIeqjsznQ4tEZCJpHRQ1i", "admin");

-- username     password    role
-- jack         apple123    admin
-- mary         orange123   user     

CREATE TABLE if not exists books(
	title varchar(64) NOT NULL,
    isbn varchar(6) NOT NULL UNIQUE,
    author varchar(32) NOT NULL,
    publishYear DATE NOT NULL,
    primary key (isbn)
);

INSERT INTO books VALUES 
	("Programming is Fun",
     "123123", 
     "Apple Tan",
     "2019-05-03"),
     ("I Love SPM",
     "321321",
     "Orange Lim",
     "2019-04-03"),
     ("I love IDP",
     "543543",
     "Tommy Lim",
     "2019-05-03");
     
CREATE table if not exists userBooks(
	username varchar(64) NOT NULL,
    isbn varchar(6) NOT NULL,
    primary key (isbn, username),
    foreign key (username)
		references user (username),
	foreign key (isbn)
		references books (isbn)
);

INSERT into userBooks VALUES 
	("apple", "123123");
