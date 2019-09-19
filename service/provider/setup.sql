drop database if exists enrichment_ex_1;
create database  if not exists enrichment_ex_1;
use enrichment_ex_1;

CREATE TABLE if not exists books (
	title varchar(64) NOT NULL,
  isbn varchar(6) NOT NULL UNIQUE,
  author varchar(32) NOT NULL,
  publishYear DATE NOT NULL,
  primary key (isbn)
);

INSERT INTO books VALUES 
	("Programming is Fun", "123123", "Apple Tan", "2019-05-03"),
  ("I Love SPM", "321321", "Orange Lim", "2019-04-03"),
  ("I love IDP", "543543", "Tommy Lim", "2019-05-03");