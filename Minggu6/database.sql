create database pemweb_modul_6;

use pemweb_modul_6;

create table `pengguna`(
    `id` int(11) not null auto_increment,
    `username` varchar(100),
    `password` varchar(100),
    primary key (`id`)
);
create table `posts`(
    `id` int(11) not null auto_increment,
    `judul` varchar(100),
    `konten` varchar(1000),
    primary key (`id`)
);


