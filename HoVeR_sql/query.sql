--query for all of violation historyi
SELECT *
FROM Violations;
--query for violation history of a specific user_id
SELECT *
FROM Violations
WHERE user_id = ;
--query for violation history of a specific violation
SELECT *
FROM Violations
WHERE violation_category_id = ;
--query for violation history of a specific unit and specific violation
SELECT *
FROM Violations
WHERE user_id = AND violation_category_id = ;
--query for which unit a car belongs to
SELECT unit_num 
FROM Car left join Unit on Car.user_id = Unit.user_id
WHERE licence_plate = ;
--query for which violations will have a board review
