create database student;
GRANT ALL ON student.* TO 'dhruv'@'localhost' IDENTIFIED BY 'pass123';
GRANT ALL ON student.* TO 'dhruv'@'127.0.0.1' IDENTIFIED BY 'pass123';

CREATE TABLE users (
user_id INT UNSIGNED NOT NULL AUTO_INCREMENT KEY,
firstName VARCHAR(128),
lastName VARCHAR(128),
school VARCHAR(128),
username VARCHAR(128),
password VARCHAR(128),
admin boolean
);



--- add email field to this
--- where should school be stored ?

CREATE TABLE tbl_student_info (
student_id INT UNSIGNED,
father VARCHAR(128),
mother VARCHAR(128),
f_phone VARCHAR(128),
m_phone VARCHAR(128),
DOB date,
schoolID INT UNSIGNED,
status enum('active','inactive') DEFAULT 'active',
FOREIGN KEY (student_id) REFERENCES users(student_id),
FOREIGN KEY (schoolID) REFERENCES tbl_school_info(schoolID)
);

CREATE TABLE tbl_emergency_contact (
student_id INT UNSIGNED NOT NULL AUTO_INCREMENT KEY,
emergency1 VARCHAR(128),
phone1 VARCHAR(20),
emergency2 VARCHAR(128),
phone2 VARCHAR(20),
emergency3 VARCHAR(128),
phone3 VARCHAR(20),
FOREIGN KEY (student_id) REFERENCES tbl_student_info(student_id)
);

CREATE TABLE tbl_school_info(
  schoolID INT UNSIGNED NOT NULL AUTO_INCREMENT KEY,
  Name VARCHAR(128),
  address VARCHAR(128)
);

insert into users(firstName, lastName, username, password)
  values ('dhruv','gupta','dgupta','php123');

insert into tbl_student_info (student_id,father, mother, f_phone, m_phone, schoolID, DOB)
  values (1,'Shishir','Archana','(404)717-5785','(404)717-5785','1','2008-7-04');

insert into tbl_student_info (student_id,father, mother, f_phone, m_phone, schoolID, DOB)
  values (2,'dad','mom','(404)000-0000','(404)000-5115','1','2008-7-14');

insert into tbl_emergency_contact (student_id,emergency1,phone1, emergency2, phone2, emergency3, phone3)
  values (1,'Shishir','(404)717-5785','Archana','(404)717-5785','jb','(404)717-5785');

  insert into tbl_school_info(Name, Address)
    values ('GSU','200 North Ave');

  select u.student_id,u.firstName,u.lastName,u.school,s.father,s.f_phone,s.mother,s.m_phone
  from users u
  join tbl_student_info s on u.student_id =s.student_id;
