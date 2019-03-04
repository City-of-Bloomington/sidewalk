create table applications (
    id         int unsigned not null primary key auto_increment,
    address_id int unsigned not null,
    address    varchar(128) not null,
    firstname  varchar(64)  not null,
    lastname   varchar(64)  not null,
    email      varchar(128),
    phone      varchar(16),
    owned      bool,
    occupied   bool
);

create table census (
    id          int unsigned not null primary key auto_increment,
    location_id int unsigned not null unique,
    geoid_10    varchar(18),
    tract       varchar(6),
    block_group varchar(2),
    block       varchar(6),
    cdbg_flag   char(2)
);
