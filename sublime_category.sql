create table category
(
    id          int auto_increment
        primary key,
    name        varchar(100) not null,
    description text         not null,
    constraint category_name_uindex
        unique (name)
);

INSERT INTO sublime.category (id, name, description) VALUES (1, 'Smartphone', 'description 1');
INSERT INTO sublime.category (id, name, description) VALUES (2, 'Camera', 'description 2');
INSERT INTO sublime.category (id, name, description) VALUES (3, 'Audio', 'description 3');
INSERT INTO sublime.category (id, name, description) VALUES (4, 'Tablet', 'description 4');
create table mailing
(
    id          int auto_increment
        primary key,
    email       varchar(100)                         not null,
    auth_token  varchar(100)                         not null,
    is_active   tinyint(1) default 0                 not null,
    date_create timestamp  default CURRENT_TIMESTAMP not null,
    constraint mailing_auth_token_uindex
        unique (auth_token),
    constraint mailing_email_uindex
        unique (email)
);


create table order_info
(
    id               int auto_increment
        primary key,
    id_order         int          not null,
    name_product     varchar(100) not null,
    quantity_product int          not null,
    price_product    float        not null,
    sum_product      float        not null
);


create table orders
(
    id       int auto_increment
        primary key,
    quantity int                                   not null,
    sum      float                                 not null,
    id_user  int                                   null,
    status   varchar(30) default 'New'             not null,
    date     timestamp   default CURRENT_TIMESTAMP not null
);


create table products
(
    id          int auto_increment
        primary key,
    name        varchar(100)    not null,
    img         varchar(200)    not null,
    price       float default 0 not null,
    flag        varchar(10)     null,
    id_category varchar(100)    not null,
    description text            not null,
    discount    int   default 0 null,
    img_detail  varchar(500)    null,
    link_name   varchar(100)    not null,
    constraint products_name_uindex
        unique (name)
);

INSERT INTO sublime.products (id, name, img, price, flag, id_category, description, discount, img_detail, link_name) VALUES (1, 'Smart Phone 1', 'product_1.jpg', 670, 'New', 'Smartphone', 'description description description description description ', 0, 'details_1.jpg,details_2.jpg,details_3.jpg,details_4.jpg', 'smart_1');
INSERT INTO sublime.products (id, name, img, price, flag, id_category, description, discount, img_detail, link_name) VALUES (3, 'Camera 1', 'product_2.jpg', 550, 'Hot', 'Camera', 'description description description description description ', 0, 'details_1.jpg,details_2.jpg,details_3.jpg,details_4.jpg', 'camera_1');
INSERT INTO sublime.products (id, name, img, price, flag, id_category, description, discount, img_detail, link_name) VALUES (4, 'Smart Phone 2', 'product_3.jpg', 123, 'Sale', 'Smartphone', 'description description description description description ', 10, 'product_4.jpg,details_2.jpg,details_3.jpg,details_4.jpg', 'smart_2');
INSERT INTO sublime.products (id, name, img, price, flag, id_category, description, discount, img_detail, link_name) VALUES (5, 'Audio 1', 'product_4.jpg', 557, '', 'Audio', 'description description description description description ', 0, 'details_1.jpg,details_2.jpg,details_3.jpg,details_4.jpg', 'audio_1');
INSERT INTO sublime.products (id, name, img, price, flag, id_category, description, discount, img_detail, link_name) VALUES (6, 'Smart Phone 3', 'product_5.jpg', 670, '', 'Smartphone', 'description description description description description ', 0, 'details_1.jpg,details_2.jpg,details_3.jpg,details_4.jpg', 'smart_3');
INSERT INTO sublime.products (id, name, img, price, flag, id_category, description, discount, img_detail, link_name) VALUES (7, 'Tablet 1', 'product_6.jpg', 868, 'Sale', 'Tablet', 'description description description description description ', 20, 'details_1.jpg,details_2.jpg,details_3.jpg,details_4.jpg', 'tablet_1');
INSERT INTO sublime.products (id, name, img, price, flag, id_category, description, discount, img_detail, link_name) VALUES (8, 'Smart Phone 4', 'product_7.jpg', 670, 'New', 'Smartphone', 'description description description description description ', 0, 'details_1.jpg,details_2.jpg,details_3.jpg,details_4.jpg', 'smart_4');
INSERT INTO sublime.products (id, name, img, price, flag, id_category, description, discount, img_detail, link_name) VALUES (9, 'Camera 2', 'product_8.jpg', 455, '', 'Camera', 'description description description description description ', 0, 'details_1.jpg,details_2.jpg,details_3.jpg,details_4.jpg', 'camera_2');
INSERT INTO sublime.products (id, name, img, price, flag, id_category, description, discount, img_detail, link_name) VALUES (10, 'Tablet 2', 'product_9.jpg', 235, '', 'Tablet', 'description description description description description ', 0, 'details_1.jpg,details_2.jpg,details_3.jpg,details_4.jpg', 'tablet_2');
INSERT INTO sublime.products (id, name, img, price, flag, id_category, description, discount, img_detail, link_name) VALUES (11, 'Smart Phone 5', 'product_10.jpg', 345, 'Hot', 'Smartphone', 'description description description description description ', 0, 'details_1.jpg,details_2.jpg,details_3.jpg,details_4.jpg', 'smart_5');
INSERT INTO sublime.products (id, name, img, price, flag, id_category, description, discount, img_detail, link_name) VALUES (12, 'Audio 2', 'product_11.jpg', 455, 'New', 'Audio', 'description description description description description ', 0, 'details_1.jpg,details_2.jpg,details_3.jpg,details_4.jpg', 'audio_2');
create table users
(
    id         int auto_increment
        primary key,
    name       varchar(100)               not null,
    last_name  varchar(100)               not null,
    address    varchar(200)               not null,
    phone      int                        not null,
    email      varchar(100)               not null,
    access     varchar(30) default 'user' not null,
    auth_token varchar(100)               not null,
    is_active  tinyint(1)  default 0      not null,
    constraint users_auth_token_uindex
        unique (auth_token),
    constraint users_email_uindex
        unique (email),
    constraint users_phone_uindex
        unique (phone)
);

