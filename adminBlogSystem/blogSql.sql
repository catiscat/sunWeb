--in database sun

--admin table for admin login
create table admin(
	id int primary key,
	name varchar(32) not null, 
	password varchar(128) not null
);

--posts table for blog post,blog delete,blog select and blog update
create table posts(
    id bigint primary key auto_increment,
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


--comment table for comment post,comment delete,comment select and comment update
create table comments(
    comment_id bigint primary key auto_increment,
    comment_post_id bigint,
    comment_author tinytext,
    comment_date text,
    comment_content text,
    comment_approved varchar(20),
    user_id bigint,
    comment_type nvarchar(20),
    comment_parent bigint,
    comment_author_email varchar(100),
    comment_author_url varchar(200),
    comment_author_ip varchar(100)    
);
