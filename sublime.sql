create table category
(
    id          int auto_increment
        primary key,
    name        varchar(100) not null,
    description text         not null,
    constraint category_name_uindex
        unique (name)
);

INSERT INTO u0645758_sublime.category (id, name, description) VALUES (1, 'Smartphone', 'description 1');
INSERT INTO u0645758_sublime.category (id, name, description) VALUES (2, 'Camera', 'description 2');
INSERT INTO u0645758_sublime.category (id, name, description) VALUES (3, 'Audio', 'description 3');
INSERT INTO u0645758_sublime.category (id, name, description) VALUES (4, 'Tablet', 'description 4');
create table delivery
(
    id    int auto_increment
        primary key,
    name  varchar(100) not null,
    price float        null
);

INSERT INTO u0645758_sublime.delivery (id, name, price) VALUES (1, 'Next day delivery', 4.99);
INSERT INTO u0645758_sublime.delivery (id, name, price) VALUES (2, 'Standard delivery', 1.99);
INSERT INTO u0645758_sublime.delivery (id, name, price) VALUES (3, 'Personal pickup', 0);
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

INSERT INTO u0645758_sublime.mailing (id, email, auth_token, is_active, date_create) VALUES (11, 'crezi2349@gmail.com', '0fSBdyH8SsPtZ-NR3aagG3LoJI-NNX9H', 1, '2019-04-29 13:05:04');
INSERT INTO u0645758_sublime.mailing (id, email, auth_token, is_active, date_create) VALUES (12, 'arbuzov.mail@gmail.com', 'Fu1I6V7wPT1c542kf2wJn2_fHp4h0oeE', 1, '2019-04-30 11:50:46');
INSERT INTO u0645758_sublime.mailing (id, email, auth_token, is_active, date_create) VALUES (14, 'asdf@saf.com', 'cjFH2hu09FVF_FfRdIYQALjudFwPwNWI', 0, '2019-04-30 11:51:54');
INSERT INTO u0645758_sublime.mailing (id, email, auth_token, is_active, date_create) VALUES (16, 'sdfsdss@gmail.com', '6fDq894rZ7vq5GOeBX3He7JHP4hK0pw0', 0, '2019-04-30 11:52:54');
INSERT INTO u0645758_sublime.mailing (id, email, auth_token, is_active, date_create) VALUES (18, 'sadfsd@gmail.com', 'BgeEdo7uwP3_BT8LA7BruLdehgAXWako', 0, '2019-04-30 12:38:02');
INSERT INTO u0645758_sublime.mailing (id, email, auth_token, is_active, date_create) VALUES (19, 'crezi_23@mail.ru', 'ceadaf7hv4A6TjIDl6bsykD3xtNeqPoO', 1, '2019-04-30 12:48:26');
create table order_info
(
    id         int auto_increment
        primary key,
    id_order   int          not null,
    name       varchar(255) not null,
    quantity   int          not null,
    price      float        not null,
    sum        float        not null,
    product_id int          not null
);

INSERT INTO u0645758_sublime.order_info (id, id_order, name, quantity, price, sum, product_id) VALUES (1, 1, 'Smart Phone 1', 3, 670, 2010, 1);
INSERT INTO u0645758_sublime.order_info (id, id_order, name, quantity, price, sum, product_id) VALUES (2, 1, 'Tablet 2', 1, 235, 235, 10);
INSERT INTO u0645758_sublime.order_info (id, id_order, name, quantity, price, sum, product_id) VALUES (3, 2, 'Smart Phone 2', 9, 123, 1107, 4);
INSERT INTO u0645758_sublime.order_info (id, id_order, name, quantity, price, sum, product_id) VALUES (4, 3, 'Camera 1', 3, 550, 1650, 3);
INSERT INTO u0645758_sublime.order_info (id, id_order, name, quantity, price, sum, product_id) VALUES (5, 4, 'Audio 1', 18, 557, 10026, 5);
INSERT INTO u0645758_sublime.order_info (id, id_order, name, quantity, price, sum, product_id) VALUES (6, 4, 'Camera 2', 2, 455, 910, 9);
INSERT INTO u0645758_sublime.order_info (id, id_order, name, quantity, price, sum, product_id) VALUES (7, 4, 'Camera 1', 2, 550, 1100, 3);
INSERT INTO u0645758_sublime.order_info (id, id_order, name, quantity, price, sum, product_id) VALUES (8, 4, 'Tablet 1', 2, 868, 1736, 7);
INSERT INTO u0645758_sublime.order_info (id, id_order, name, quantity, price, sum, product_id) VALUES (9, 4, 'Tablet 2', 2, 235, 470, 10);
INSERT INTO u0645758_sublime.order_info (id, id_order, name, quantity, price, sum, product_id) VALUES (10, 5, 'Camera 2', 2, 455, 910, 9);
INSERT INTO u0645758_sublime.order_info (id, id_order, name, quantity, price, sum, product_id) VALUES (11, 6, 'Camera 2', 7, 455, 3185, 9);
INSERT INTO u0645758_sublime.order_info (id, id_order, name, quantity, price, sum, product_id) VALUES (12, 6, 'Camera 1', 2, 550, 1100, 3);
INSERT INTO u0645758_sublime.order_info (id, id_order, name, quantity, price, sum, product_id) VALUES (13, 6, 'Tablet 2', 2, 235, 470, 10);
INSERT INTO u0645758_sublime.order_info (id, id_order, name, quantity, price, sum, product_id) VALUES (14, 6, 'Tablet 1', 2, 868, 1736, 7);
INSERT INTO u0645758_sublime.order_info (id, id_order, name, quantity, price, sum, product_id) VALUES (15, 7, 'Inca 4K UHD Action Camera', 2, 455, 910, 9);
INSERT INTO u0645758_sublime.order_info (id, id_order, name, quantity, price, sum, product_id) VALUES (16, 8, 'Inca 4K UHD Action Camera', 1, 455, 455, 9);
INSERT INTO u0645758_sublime.order_info (id, id_order, name, quantity, price, sum, product_id) VALUES (17, 8, 'Samsung Galaxy S10 512GB - Prism Black', 1, 123, 123, 4);
INSERT INTO u0645758_sublime.order_info (id, id_order, name, quantity, price, sum, product_id) VALUES (18, 8, 'Huawei P30 Pro 256GB - Breathing Crystal', 1, 670, 670, 8);
INSERT INTO u0645758_sublime.order_info (id, id_order, name, quantity, price, sum, product_id) VALUES (19, 9, 'Samsung Galaxy S10 512GB - Prism Black', 2, 123, 246, 4);
INSERT INTO u0645758_sublime.order_info (id, id_order, name, quantity, price, sum, product_id) VALUES (20, 10, 'Nokia 5.1 Plus 32GB with Android One - Black', 1, 670, 670, 6);
create table orders
(
    id              int auto_increment
        primary key,
    quantity        int                                   not null,
    sum             float                                 not null,
    id_user         int                                   null,
    status          varchar(30) default 'New'             not null,
    date            timestamp   default CURRENT_TIMESTAMP not null,
    name            varchar(255)                          not null,
    email           varchar(255)                          not null,
    phone           varchar(11)                           not null,
    address         varchar(255)                          not null,
    last_name       varchar(255)                          null,
    delivery_method varchar(255)                          null
);

INSERT INTO u0645758_sublime.orders (id, quantity, sum, id_user, status, date, name, email, phone, address, last_name, delivery_method) VALUES (1, 0, 2245, 2, 'New', '2019-04-28 20:34:49', 'Name', 'email@email.ru', 'phone', 'Address', 'Last Name', null);
INSERT INTO u0645758_sublime.orders (id, quantity, sum, id_user, status, date, name, email, phone, address, last_name, delivery_method) VALUES (2, 0, 996.3, 4, 'New', '2019-04-29 13:05:04', 'Руслан Рамильевич Азанов', 'crezi2349@gmail.com', '89224729559', 'Тюмень', 'Азанов', null);
INSERT INTO u0645758_sublime.orders (id, quantity, sum, id_user, status, date, name, email, phone, address, last_name, delivery_method) VALUES (3, 0, 1920.6, null, 'New', '2019-04-29 16:22:38', 'Ruslan', 'crezi_23@mail.ru', '232323', 'sdsdsdd', 'Azanov', '3');
INSERT INTO u0645758_sublime.orders (id, quantity, sum, id_user, status, date, name, email, phone, address, last_name, delivery_method) VALUES (4, 0, 13894.8, 1, 'New', '2019-04-30 12:38:02', 'asdf', 'sadfsd@gmail.com', 'asdf', 'adsf', 'ggg', '3');
INSERT INTO u0645758_sublime.orders (id, quantity, sum, id_user, status, date, name, email, phone, address, last_name, delivery_method) VALUES (5, 0, 910, 9, 'New', '2019-04-30 12:42:42', 'awtest', 'arbuzov.mail@gmail.com', 'awtest', 'awtest', 'awtest3333333333', '3');
INSERT INTO u0645758_sublime.orders (id, quantity, sum, id_user, status, date, name, email, phone, address, last_name, delivery_method) VALUES (7, 0, 914.99, 10, 'New', '2019-04-30 20:56:05', 'sdsd', 'crezi2349@gmail.com', 'hjhjh', 'jhhj', 'dsdsd', '1');
INSERT INTO u0645758_sublime.orders (id, quantity, sum, id_user, status, date, name, email, phone, address, last_name, delivery_method) VALUES (8, 0, 1232.7, 10, 'New', '2019-04-30 21:49:20', 'sdsd', 'crezi2349@gmail.com', 'hjhjh', 'jhhj', 'dsdsd', '2');
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

INSERT INTO u0645758_sublime.products (id, name, img, price, flag, id_category, description, discount, img_detail, link_name) VALUES (1, 'Huawei Y6 2018 16GB Smartphone - Black', 'phone1.jpg', 670, 'New', 'Smartphone', 'Stylish and powerful, the Huawei Y6 2018 16GB Smartphone is full of features to keep you connected with your on-the-go lifestyle. Boasting a capable Qualcomm Snapdragon processor, face unlock technology, and a stylish 2.5D screen design, the Huawei Y6 2018 is a harmony of form and function.', 0, 'details1_1.jpg,details1_2.jpg,details1_3.jpg,details1_4.jpg', 'smart_1');
INSERT INTO u0645758_sublime.products (id, name, img, price, flag, id_category, description, discount, img_detail, link_name) VALUES (3, 'GoPro HERO7 Black Action Video Camera', 'camera1.jpg', 550, 'Hot', 'Camera', 'Rugged, compact, and easy to use, the GoPro HERO7 Black Action Video Camera is an ideal companion for the adventurous trendsetter looking to save each action-packed scene and create breathtaking footage of various sights and sounds around the world. The camera comes with an intuitive touchscreen and Voice Control support for quick setting changes and easy recording wherever you are.', 0, 'details6_1.jpg,details6_2.jpg,details6_3.jpg,details6_4.jpg', 'camera_1');
INSERT INTO u0645758_sublime.products (id, name, img, price, flag, id_category, description, discount, img_detail, link_name) VALUES (4, 'Samsung Galaxy S10 512GB - Prism Black', 'phone2.jpg', 123, 'Sale', 'Smartphone', 'No notch. No interruptions. The powerful new Galaxy S10 features a cinematic bezel-less screen to give you immersive viewing. Shoot like a professional with our Pro-grade camera and count on a battery so powerful, it can charge others with Wireless PowerShare.', 10, 'details2_1.jpg,details2_2.jpg,details2_3.jpg,details2_4.jpg', 'smart_2');
INSERT INTO u0645758_sublime.products (id, name, img, price, flag, id_category, description, discount, img_detail, link_name) VALUES (5, 'Sony V41D Floor Standing Vertical Mini Hi-Fi System', 'audio1.jpg', 557, '', 'Audio', 'Bring ecstatic music entertainment to your room with the Sony V41D Floor Standing Vertical Mini Hi-Fi System. With speaker lights that flash in sync with the music and illuminate the dance floor, you can create a nightclub-inspired atmosphere that’ll have everyone pumped up.', 0, 'details8_1.jpg,details8_2.jpg,details8_3.jpg,details8_4.jpg', 'audio_1');
INSERT INTO u0645758_sublime.products (id, name, img, price, flag, id_category, description, discount, img_detail, link_name) VALUES (6, 'Nokia 5.1 Plus 32GB with Android One - Black', 'phone3.jpg', 670, '', 'Smartphone', 'Slim, elegant, and feature-rich, the Nokia 5.1 Plus 32GB with Android One is the reliable companion for today’s outgoing crowd. It combines a big HD+ screen with its powerful MediaTek processor, making it perfect for multitasking, binge-watching movies, and playing mobile games.', 0, 'details3_1.jpg,details3_2.jpg,details3_3.jpg,details3_4.jpg', 'smart_3');
INSERT INTO u0645758_sublime.products (id, name, img, price, flag, id_category, description, discount, img_detail, link_name) VALUES (7, 'Lenovo Tab 10 X103F 16GB Tablet Wi-Fi - Black', 'tablets1.jpg', 868, 'Sale', 'Tablet', 'description description description description description ', 20, 'details10_1.jpg,details10_2.jpg,details10_3.jpg', 'tablet_1');
INSERT INTO u0645758_sublime.products (id, name, img, price, flag, id_category, description, discount, img_detail, link_name) VALUES (8, 'Huawei P30 Pro 256GB - Breathing Crystal', 'phone4.jpg', 670, 'New', 'Smartphone', 'Quickly zoom in and capture the rich, delicate details of your surroundings with the Huawei P30 Pro Phone. Made with a 4200mAh battery, 6.47-inch FullView OLED display, an IP68 rating, and Android 9.0 (featuring EMUI 9.1), it also serves as a powerful and practical platform for handling various productivity and entertainment tasks while you’re on the go.', 0, 'details4_1.jpg,details4_2.jpg,details4_3.jpg,details4_4.jpg', 'smart_4');
INSERT INTO u0645758_sublime.products (id, name, img, price, flag, id_category, description, discount, img_detail, link_name) VALUES (9, 'Inca 4K UHD Action Camera', 'camera2.jpg', 455, '', 'Camera', 'Durable, convenient to use, and providing crisp recordings, the Inca 4K UHD Action Camera is a great companion for the modern trendsetter with an active lifestyle.', 0, 'details7_1.jpg,details7_2.jpg', 'camera_2');
INSERT INTO u0645758_sublime.products (id, name, img, price, flag, id_category, description, discount, img_detail, link_name) VALUES (10, 'Samsung Galaxy Tab A 8.0 16GB WiFi - Black', 'tablets2.jpg', 235, 'Sale', 'Tablet', 'The Samsung Galaxy Tab A 8.0 16GB WiFi features a powerful processor and an 8.0” display, making it a practical and convenient solution for your multitasking and entertainment needs.', 90, 'details_1.jpg,details_2.jpg,details_3.jpg,details_4.jpg', 'tablet_2');
INSERT INTO u0645758_sublime.products (id, name, img, price, flag, id_category, description, discount, img_detail, link_name) VALUES (11, 'CAT S61 64GB Rugged Smartphone - Black', 'phone5.jpg', 345, 'Hot', 'Smartphone', 'The CAT S61 64GB Rugged Smartphone offers 4G capability, a tough construction, and various built-in apps, letting you stay connected when you’re on the go while making simple work of your daily tasks.', 0, 'details5_1.jpg,details5_2.jpg,details5_3.jpg,details5_4.jpg', 'smart_5');
INSERT INTO u0645758_sublime.products (id, name, img, price, flag, id_category, description, discount, img_detail, link_name) VALUES (12, 'JBL PartyBox 300 Wireless Party Speaker', 'audio2.jpg', 455, 'New', 'Audio', 'Powerful and easy to setup, the JBL PartyBox 300 Wireless Party Speaker delivers clear and immersive sound to keep the party going through your favourite beats, whether indoors or outdoors.', 0, 'details9_1.jpg,details9_2.jpg,details9_3.jpg,details9_4.jpg', 'audio_2');
create table users
(
    id         int auto_increment
        primary key,
    name       varchar(255)               not null,
    last_name  varchar(255)               not null,
    address    varchar(255)               not null,
    phone      varchar(100)               not null,
    email      varchar(255)               not null,
    access     varchar(30) default 'user' not null,
    auth_token varchar(100)               not null,
    is_active  tinyint(1)  default 0      not null,
    username   varchar(255)               not null,
    password   varchar(255)               not null,
    constraint users_auth_token_uindex
        unique (auth_token),
    constraint users_email_uindex
        unique (email),
    constraint users_phone_uindex
        unique (phone)
);

INSERT INTO u0645758_sublime.users (id, name, last_name, address, phone, email, access, auth_token, is_active, username, password) VALUES (1, 'Ruslan', 'Azanov', 'Tyumen', '89324789874', 'crezi_23@mail.ru', 'admin', 'admin', 1, 'admin', '$2y$13$u47W59HikXRttAZEa7QX5OpNKB5/97poU/gTXdE2oDqStIQRGApNS');
INSERT INTO u0645758_sublime.users (id, name, last_name, address, phone, email, access, auth_token, is_active, username, password) VALUES (2, 'Name', 'Last Name', 'Address', 'phone', 'email@email.ru', 'user', '', 0, 'user', '$2y$13$5jXacSsnd386O3yMGvjxJunXoMmUZd0eVqSkOErNe9wpRoMCOjHfm');
INSERT INTO u0645758_sublime.users (id, name, last_name, address, phone, email, access, auth_token, is_active, username, password) VALUES (9, 'awtest', 'awtest', 'awtest', 'awtest', 'arbuzov.mail@gmail.com', 'user', 'NNi2YyM_hkA7HNRykmHHdrACq2lJhu4X', 1, 'awtest', '$2y$13$TWnnAyKOIeXPFDpH5bDOr.LaJRL6UGkjVFKL85YdZwJJ/23ztrFOa');
INSERT INTO u0645758_sublime.users (id, name, last_name, address, phone, email, access, auth_token, is_active, username, password) VALUES (10, 'sdsd', 'dsdsd', 'jhhj', 'hjhjh', 'crezi2349@gmail.com', 'user', 'ymRVzbcqAQjh2jwryqXHfShjx1QiAxOO', 1, 'test', '$2y$13$1zbfO.42UwLtBp6atWCZouGlo9imk4kd//Lf62KwyxFOe0mfSD47u');