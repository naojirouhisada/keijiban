CREATE DATABASE keijiban DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

CREATE TABLE up_genre(
 id MEDIUMINT AUTO_INCREMENT, index (id),
`name` VARCHAR(15) ,
order_number INT 
);

CREATE TABLE under_genre(
id MEDIUMINT AUTO_INCREMENT, index (id),
`name` VARCHAR(15),
person_name VARCHAR(50),
order_number INT,
up_genre_id INT,
url_name VARCHAR(20)
);

CREATE TABLE thread(
 id MEDIUMINT AUTO_INCREMENT, index (id),
title VARCHAR(200),
comment_count INT ,
last_update_time DATETIME,
under_genre_id INT
);

CREATE TABLE thread_comment(
id MEDIUMINT AUTO_INCREMENT, index (id),
`name` VARCHAR(200),
address VARCHAR(100),
unique_id INT ,
post_time DATETIME,
content VARCHAR(1000),
comment_number INT,
thread_id INT
);

CREATE TABLE thread_tag(
 id MEDIUMINT AUTO_INCREMENT, index (id),
thread_id INT,
tag_id INT
);

CREATE TABLE tag(
id MEDIUMINT AUTO_INCREMENT, index (id),
tag_name VARCHAR(20)
);

INSERT INTO up_genre VALUES("","学問",1);
INSERT INTO up_genre VALUES("","ニュース",2);

INSERT INTO under_genre VALUES("","哲学","TETU",1,1,"tetugaku");
INSERT INTO under_genre VALUES("","日本史","NIHON",2,1,"nihonsi");
INSERT INTO under_genre VALUES("","世界史","SEKAI",3,1,"sekaisi");
INSERT INTO under_genre VALUES("","科学ニュース","KAGAKU",1,2,"kagaku");
INSERT INTO under_genre VALUES("","哲学ニュース","TETUNEWS",2,2,"tetunews");




