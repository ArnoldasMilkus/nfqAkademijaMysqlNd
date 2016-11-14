create database nd1;
use nd1;
source Books.sql;

Delete  Books, Authors from Books left join Authors on Books.authorId=Authors.authorId where Books.authorId IS NULL or Authors.authorId IS NULL; 
create table booksGenres( bookId int(11) NOT NULL, genre varchar(40) NOT NULL, CONSTRAINT book_gen_pk PRIMARY KEY (bookId,genre), FOREIGN KEY(bookId) REFERENCES Books(bookId));
insert into booksGenres (bookId, genre) values(1,"Programming");
insert into booksGenres (bookId, genre) values(2,"Programming");
insert into booksGenres (bookId, genre) values(3,"Programming");
insert into booksGenres (bookId, genre) values(4,"Programming");
insert into booksGenres (bookId, genre) values(4,"Concurrency");
create table booksAuthors( bookId int(11) NOT NULL, authorId int(11) NOT NULL, CONSTRAINT book_auth_pk PRIMARY KEY (bookId,authorId));
insert into booksAuthors (bookId, authorId) select bookId, authorId from Books;
alter table Books drop column authorId;
 insert into booksAuthors (bookId, authorId) values(1,5);
 insert into booksAuthors (bookId, authorId) values(2,5);
ALTER TABLE Books CONVERT TO CHARACTER SET utf8 COLLATE utf8_general_ci;
insert into Books (title,year) values("ąčęėįšųū",2000);

