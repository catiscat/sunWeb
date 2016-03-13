

create table admin(
    id   tinyint auto_increment ,
	admin_id tinyint not null,
	admin_name varchar(32) not null, 
	admin_password varchar(128) not null,
	primary key(
		id,
		admin_id
	)
);

create table users(
	id   int auto_increment ,
	user_id int unsigned NOT NULL,
	user_name varchar(32) not null, 
	user_password varchar(128) not null,
	primary key(
		id,
		user_id
	)
);

create table users_profile(

);


create table posts(
	post_id int primary key auto_increment ,
	post_title nvarchar(64) not null, 
    post_type nvarchar(32),
post_user_id int unsigned NOT NULL,
    CONSTRAINT FK_post_user_id foreign key(post_user_id) references users(user_id)
);


create table posts_profile(
	post_id int not null,
	post_content longtext not null,
	primary key(
		post_id
	),
	FOREIGN KEY (post_id) REFERENCES posts(post_id)
);


create table posts_profile_specail(
	post_id int  not null,
	comment_count bigint(20),
	post_status varchar(20),
    post_modified text,
	post_password varchar(20),
    post_summary nvarchar(20),
	primary key(
		post_id
	),
    FOREIGN KEY (post_id) REFERENCES posts(post_id)
);






create table comments(
	comment_id int auto_increment,
    comment_date datetime,
    comment_user_id int not null,
    comment_post_id int not null,
    comment_author nvarchar(30),
	primary key(
		comment_id
	),
	FOREIGN KEY (comment_user_id) REFERENCES users(user_id),
	FOREIGN KEY (comment_post_id) REFERENCES posts(post_id)
);



create table comments_profile(
	comment_id int not null,
	comment_content longtext not null,
	primary key(
		comment_id
	),
	FOREIGN KEY (post_id) REFERENCES posts(post_id)
);




create table comments_profile_specail(
	comment_id int  not null,
	comment_floor int auto_increment not null ,
	comment_floor_under tinyint auto_increment not null,
	comment_author_email varchar(100),
	comment_author_url varchar(200),
	comment_author_ip varchar(100),  
	primary key(
		comment_id
	),
    FOREIGN KEY (comment_id) REFERENCES comments(comment_id)
);


datetime,
    post_user_id  int unsigned NOT NULL,
