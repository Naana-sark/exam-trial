drop schema if exists NATS96322022;
create schema NATS96322022;
use NATS96322022;



create table cases(
case_id varchar (20),
case_verdict varchar(15),
court_procedures varchar(30),
primary key(case_id)

);



create table individuals(
id varchar (20),
fname varchar(15),
lname varchar(15),
gender enum('Male','Female', 'Other'),
dob date, 
crimecommitted tinytext,
case_id varchar (20) ,
foreign key(case_id) references cases(case_id) on delete cascade on update cascade,
primary key(id)
);

create table judges(
judge_id varchar (20),
fname varchar(15),
lname varchar(15),
case_id varchar (20),
contactnum1 varchar(20),
gender enum('Male','Female', 'Other'),
foreign key(case_id) references cases(case_id) on delete cascade on update cascade,
primary key(judge_id)

);

create table lawyer(
lawyer_id varchar (20),
fname varchar(15),
lname varchar(15),
case_id varchar (20),
gender enum('Male','Female', 'Other'),
contactnum1 varchar(20),
foreign key(case_id) references cases(case_id) on delete cascade on update cascade,
primary key(lawyer_id)
);

CREATE TABLE admin(
  id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  username varchar(100) NOT NULL,
  email varchar(100) NOT NULL,
  password varchar(100) NOT NULL
);

CREATE TABLE lawworker(
  id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  username varchar(100) NOT NULL,
  email varchar(100) NOT NULL,
  password varchar(100) NOT NULL
)
