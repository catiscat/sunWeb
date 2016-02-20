--in database sun

--admin table for admin login
create table admin(
	id int primary key,
	name varchar(32) not null, 
	password varchar(128) not null
);

--posts table for blog post,blog delete,blog select and blog update
create table posts(
    id int primary key auto_increment,
    post_author varchar(64) not null,
    post_date text,
    post_content longtext not null,
    post_title text,
    post_modified text,
    post_type text,
    comment_count bigint(20),
    post_parent bigint(20),
    post_status varchar(20),
    post_password varchar(20),
    post_summary text,
    post_content_filtered longtext
);

insert into admin values (901,"c@t*9q",md5("c@t*9q"));

