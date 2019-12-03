INSERT INTO c_users (first_name, last_name, email, password, user_type)
VALUES
	('John', 'Doe', 'jdoe@anonymous.com', 'password1', 'Manager');

INSERT INTO c_users (first_name, last_name, email, password, user_type)
VALUES
        ('James', 'Bek', 'jbek@anonymous.com', 'password2', 'Home Owner');

INSERT INTO c_users (first_name, last_name, email, password, user_type)
VALUES
        ('Hannah', 'Fisk', 'hfisk@anonymous.com', 'password3', 'Board Member'); 

INSERT INTO Car (licence_plate, user_id, model, make, color, car_type) 
VALUES
	('1111aaaa',(SELECT user_id FROM c_users WHERE user_id = 1),  'Prius', 'car', 'blue', 'small');

INSERT INTO Car (licence_plate, user_id, model, make, color, car_type)
VALUES
        ('aaaa1111',(SELECT user_id FROM c_users WHERE user_id = 2),  'Honda', 'Mini-van', 'Silver', 'Medium');

INSERT INTO Car (licence_plate, user_id, model, make, color, car_type)
VALUES                                                                                                                     
        ('a1a1a1a1',(SELECT user_id FROM c_users WHERE user_id = 3),  'Dodge', 'Pick-up-truck', 'Black', 'Large'); 

INSERT INTO Unit (unit_num, user_id, garage_num, building_num) 
VALUES
	(1,(SELECT user_id FROM c_users WHERE user_id = 1), 1, 1);

INSERT INTO Unit (unit_num, user_id, garage_num, building_num)
VALUES
        (2,(SELECT user_id FROM c_users WHERE user_id = 2), 2, 2);

INSERT INTO Unit (unit_num, user_id, garage_num, building_num)
VALUES
        (3,(SELECT user_id FROM c_users WHERE user_id = 3), 3, 3);


INSERT INTO Violation_category (violation_category_id, violation_name, num_for_fine, num_for_call, num_for_email, fine_baseline) 
VALUES
	(1, 'Parking', 3, 2, 1, 100);

INSERT INTO Violation_category (violation_category_id, violation_name, num_for_fine, num_for_call, num_for_email, fine_baseline)
VALUES
        (2, 'Noise', 3, 2, 1, 200);

INSERT INTO Violation_category (violation_category_id, violation_name, num_for_fine, num_for_call, num_for_email, fine_baseline)
VALUES
        (3, 'Common Area Usage', 3, 2, 1, 300);

INSERT INTO Violation_category (violation_category_id, violation_name, num_for_fine, num_for_call, num_for_email, fine_baseline)
VALUES
        (4, 'Unit Conditions', 3, 2, 1, 400);

INSERT INTO Violation_category (violation_category_id, violation_name, num_for_fine, num_for_call, num_for_email, fine_baseline)
VALUES
        (5, 'Pet', 3, 2, 1, 500);

INSERT INTO Violations (user_id, violation_category_id, violation_date, description, reporter) 
VALUES
	((SELECT user_id FROM c_users WHERE user_id = '1'), (SELECT violation_category_id FROM violation_category WHERE violation_category_id = 5), '2019-11-11', 'Had a pet', 'Dan Shank'); --place a nested subquery here?

INSERT INTO Violations (user_id, violation_category_id, violation_date, description, reporter)
VALUES
        ((SELECT user_id FROM c_users WHERE user_id = '1'), (SELECT violation_category_id FROM violation_category WHERE violation_category_id = 5), '2019-11-12', 'Had a pet', 'Dan Shank');

INSERT INTO Violations (user_id, violation_category_id, violation_date, description, reporter)
VALUES
        ((SELECT user_id FROM c_users WHERE user_id = '2'), (SELECT violation_category_id FROM violation_category WHERE violation_category_id = 1), '2019-11-12', 'Parked in a redzone', 'Hannah Fisk');

INSERT INTO Violations (user_id, violation_category_id, violation_date, description, reporter)
VALUES
        ((SELECT user_id FROM c_users WHERE user_id = '2'), (SELECT violation_category_id FROM violation_category WHERE violation_category_id = 1), current_date, 'Parked in guest parking', 'Hannah Fisk');

INSERT INTO Violations (user_id, violation_category_id, violation_date, description, reporter)
VALUES
        ((SELECT user_id FROM c_users WHERE user_id = '2'), (SELECT violation_category_id FROM violation_category WHERE violation_category_id = 2), current_date, 'Parked in guest parking', 'Hannah Fisk');

INSERT INTO Violations (user_id, violation_category_id, violation_date, description, reporter)
VALUES
        ((SELECT user_id FROM c_users WHERE user_id = '2'), (SELECT violation_category_id FROM violation_category WHERE violation_category_id = 4), current_date, 'Destroyed Door', 'Dan Shank');

INSERT INTO Violations (user_id, violation_category_id, violation_date, description, reporter)
VALUES
        ((SELECT user_id FROM c_users WHERE user_id = '2'), (SELECT violation_category_id FROM violation_category WHERE violation_category_id = 2), current_date, 'Parked in Red Lane', 'Hannah Fisk');

INSERT INTO Violations (user_id, violation_category_id, violation_date, description, reporter)
VALUES
        ((SELECT user_id FROM c_users WHERE user_id = '2'), (SELECT violation_category_id FROM violation_category WHERE violation_category_id = 1), current_date, 'Parked in Manager Parking', 'Dan Shank');


INSERT INTO Fines (fine_id, fine_amount) 
VALUES
	(1, 100);
