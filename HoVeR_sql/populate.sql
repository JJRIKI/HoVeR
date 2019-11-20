INSERT INTO c_users (user_id, first_name, last_name, email, password, user_type)
VALUES
	(1, 'John', 'Doe', 'jdoe@anonymous.com', 'password1', 'Manager');

INSERT INTO Car (licence_plate, user_id, model, make, color, car_type) 
VALUES
	('1111aaaa',(SELECT user_id FROM c_users WHERE user_id = 1),  'Prius', 'car', 'blue', 'small');

INSERT INTO Unit (unit_num, user_id, garage_num, building_num) 
VALUES
	(1,(SELECT user_id FROM c_users WHERE user_id = 1), 1, 1);

INSERT INTO Violations (violation_id, user_id, violation_category_id, violation_date, description, num_prev_violations, reporter) 
VALUES
	(1,(SELECT user_id FROM c_users WHERE user_id = '1'), (SELECT violation_category_id FROM violation_category WHERE violation_category_id = 1), '2019-11-11', 'Had a pet', 2, 'Dan Shank');

INSERT INTO Violation_category (violation_category_id, num_for_fine, num_for_email, fine_baseline) 
VALUES
	(1, 3, 2, 100);

INSERT INTO Fines (fine_id, fine_amount) 
VALUES
	(1, 100);
