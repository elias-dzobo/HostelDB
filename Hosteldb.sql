drop database if exists hosteldb; 

create database hosteldb;
use hosteldb;

create table users(
    u_id int NOT NULL,
    username varchar(100),
    email varchar(100),
    password varchar(100),
    primary key(u_id)
);

create table Student(
    stu_id int not null AUTO_INCREMENT,
    stu_fname varchar(40),
    stu_lname varchar(40),
    stu_email varchar(50) not null unique,
    stu_contact varchar(15) unique,
    emergency_contact varchar(15) unique,
    primary key(stu_id)
);

create table Hostel(
    h_id int not null AUTO_INCREMENT,
    hname varchar(20),
    hostel_manager_name varchar(20),
    primary key (h_id)
);

create table Hostelmanager(
    hm_id int not null AUTO_INCREMENT,
    username varchar(20),
    hm_email varchar(40),
    hm_contact varchar(15) unique,
    h_id int not null,
    primary key(hm_id),
    foreign key (h_id) references Hostel(h_id) on delete cascade
);


create table Booking(
    booking_id int not null AUTO_INCREMENT,
    fname varchar(100),
    lname varchar(100),
    contact varchar(10),
    email varchar(100),
    gender enum ('Male', 'Female', 'Non-Binary', 'Other'),
    hostel varchar(100),
    room enum ('Single Occupancy', 'Double Occupancy', 'Triple Occupancy', 'Quadruple Occupancy'),
    booking_date datetime default current_timestamp,
    primary key(booking_id)
);

create table Payment(
    payment_id int not null AUTO_INCREMENT,
    stu_id int not null,
    booking_id int not null,
    ptotal decimal(5,2),
    pdate date,
    primary key(payment_id),
    foreign key (stu_id) references Student(stu_id) on delete cascade on update cascade,
    foreign key (booking_id) references Booking(booking_id) on delete cascade
);

ALTER TABLE `users`
  MODIFY `u_id` int NOT NULL AUTO_INCREMENT;

