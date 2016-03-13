create table admin(
	admin_id int not null,
	admin_name varchar(32) not null, 
	admin_password varchar(128) not null,
	primary key(

		admin_id
	)
);


create table posts(
	post_id int primary key auto_increment ,
	post_title nvarchar(64) not null, 
	post_date datetime ,
    post_type  nvarchar(32),
    post_author nvarchar(32),
    post_content longtext
);


create table comments(
	comment_id int auto_increment,
	post_id int,
    comment_date datetime,
    comment_author nvarchar(30),
    comment_content longtext,
    primary key(
        comment_id
    )
);
