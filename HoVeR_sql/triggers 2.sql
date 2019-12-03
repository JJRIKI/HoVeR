--function to update the number of previous violations
CREATE OR REPLACE FUNCTION prev_viol()
RETURNS TRIGGER AS $total$
DECLARE
	usr_id integer = NEW.user_id;
	viol_id integer = NEW.violation_id;
	viol_cat_id integer = NEW.violation_category_id;
	tot_p_viol integer;
BEGIN
	tot_p_viol :=
	(SELECT COUNT(violation_category_id)
	FROM Violations
	WHERE usr_id = user_id AND viol_cat_id = violation_category_id);
	
	UPDATE Violations
	SET violation_num = tot_p_viol
	WHERE violation_id= viol_id;	

RETURN NEW;
END; $total$ LANGUAGE plpgsql;

CREATE TRIGGER ins_prev_viol AFTER INSERT
ON Violations
FOR EACH ROW
EXECUTE PROCEDURE prev_viol();


--function to give appropriate consequence
/*CREATE OR REPLACE FUNCTION which_consequence();
RETURNS TRIGGER AS $total$
DECLARE
	tot_p_viol integer = NEW.violation_num;
	email_thresh integer = (SELECT num_for_email FROM Violation_category WHERE violation_category_id = NEW.violation_category_id);
	call_thresh integer = (SELECT num_for_call FROM Violation_category WHERE violation_category_id = NEW.violation_category_id);
	board_thresh integer = (SELECT num_for_fine FROM Violation_category WHERE violation_category_id = NEW.violation_category_id);
BEGIN
	IF tot_p_viol = email_thresh
	THEN
		--EMAIL CONSEQUENCE
	ELSIF tot_p_viol = call_thresh
	THEN
		--CALL CONSEQUENCE
	ELSIF tot_p_viol >= board_thresh
	THEN
		--BOARD CONSEQUENCE

RETURN NEW;
END; $total$ LANGUAGE plpgsql;

CREATE TRIGGER consequence AFTER UPDATE
ON Violations
FOR EACH ROW
EXECUTE PROCEDURE which_consequence();
*/
