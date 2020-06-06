create table customer(
cid int primary key auto_increment,
name varchar(40) not null,
phno int(10), 
email varchar(30)
);

create table employee(
eid int primary key auto_increment, 
name varchar(40) not null, 
phno int(10) not null, 
email varchar(30) not null, 
password varchar(30) not null,
status tinyint(1)
);

create table menu(
mid int primary key auto_increment, 
name varchar(60) not null, 
description text, 
price decimal(10,5) not null
);


create table orders(
oid int primary key auto_increment, 
cid int(11),
eid int(11),
odate DATETIME DEFAULT CURRENT_TIMESTAMP, 
delivery_status tinyint(1),
CONSTRAINT orders_cid FOREIGN KEY (cid) REFERENCES customer(cid),
CONSTRAINT orders_eid FOREIGN KEY (eid) REFERENCES employee(eid)
);

create table orders_menu(
oid int(11),
mid int(11),
quantity int(11),
CONSTRAINT orders_menu_mid FOREIGN KEY (mid) REFERENCES menu(mid),
CONSTRAINT orders_menu_oid FOREIGN KEY (oid) REFERENCES orders(oid)
);