create table blog(
	id int primry key,
	title nvarchar,
	pubDate date,
	author nvarchar,
	tab nvarchar,
	content nvarchar,
	comments navarchar,
)

--设计数据库
--blog
--user(id,comment,)


--管理员表 admin
create database Manager;
create table admin(
	id int primary key,
	name varchar(32) not null, 
	password varchar(128) not null
);

--雇员表 emp
create table emp(
	id int primary key auto_increment,
	name varchar(64) not null,
	grade tinyint,
	email varchar(64) not null,
	salary float

);

insert into emp(name,grade,email,salary) values ("shunping",1,'shunping@sohu.com',200);
insert into emp(name,grade,email,salary) values ("shunping",1,'shunping@sohu.com',200);
insert into emp(name,grade,email,salary) values ("shunping",1,'shunping@sohu.com',200);
insert into emp(name,grade,email,salary) values ("shunping",1,'shunping@sohu.com',200);
insert into emp(name,grade,email,salary) values ("shunping",1,'shunping@sohu.com',200);
insert into emp(name,grade,email,salary) values ("shunping",1,'shunping@sohu.com',200);
insert into emp(name,grade,email,salary) values ("shunping",1,'shunping@sohu.com',200);
insert into emp(name,grade,email,salary) values ("shunping",1,'shunping@sohu.com',200);
insert into emp(name,grade,email,salary) values ("shunping",1,'shunping@sohu.com',200);
insert into emp(name,grade,email,salary) values ("shunping",1,'shunping@sohu.com',200);


insert into admin values (100,"admin",md5("admin"));


















