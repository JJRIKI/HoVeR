CREATE TABLE c_users (
	user_id SERIAL PRIMARY KEY,
	first_name varchar(80),
	last_name varchar(80),
	email varchar(80),
	password varchar(80),
	user_type varchar(80)
);

CREATE TABLE Car (
	licence_plate varchar(80) PRIMARY KEY,
	user_id SERIAL REFERENCES c_users(user_id),
	model varchar(80),
	make varchar(80),
	color varchar(80),
	car_type varchar(80)
);

CREATE TABLE Unit (
	unit_num int PRIMARY KEY,
	user_id SERIAL REFERENCES c_users(user_id),
	garage_num int,
	building_num int
);

CREATE TABLE Violation_category (
	violation_category_id int PRIMARY KEY,
	violation_name varchar(80),
	num_for_fine int,
	num_for_call int,
	num_for_email int,
	fine_baseline int
);

CREATE TABLE Violations (
	violation_id SERIAL PRIMARY KEY,
	user_id SERIAL REFERENCES c_users(user_id),
	violation_category_id int REFERENCES Violation_category(violation_category_id),
	violation_date date,
	description varchar(160),
	violation_num int,
	reporter varchar(80)
);

CREATE TABLE Fines (
	fine_id SERIAL PRIMARY KEY, 
	fine_amount int
);


