<?php
    $input_search = $_POST['id_type'];
    $input_violator = $_POST['c_users'];
    $dbconn = pg_connect("host=bminer-apps port=5444 dbname=compliance user=compliance password=cs1230");
    
    $search_name = 'SELECT user_id FROM c_users WHERE first_name = $1 AND last_name = $2';
    $search_unit = 'SELECT user_id FROM Unit WHERE unit_num = $1';
    $search_licence = 'SELECT user_id FROM Car WHERE licence_plate = $1';
    
    if ($input_search = "Name") {
        pg_prepare("type", $search_name);
        $pieces = explode(" ", $input_search);
        $user_id = pg_execute("type", array($pieces[0], $pieces[1]));
    }
    elseif ($input_search = "Unit Number") {
        pg_prepare("type", $search_unit);
        $user_id = pg_execute("type", array($input_violator));        
    }
    elseif ($input_search = "Licence Plate") {
        pg_prepare("type", $search_licence);
        $user_id = pg_execute("type", array($input_violator));
    }

    $input_type = $_POST['violation_type'];
    $input_details = $_POST['details'];

    $dbconn = pg_connect("host=bminer-apps port=5444 dbname=compliance user=compliance password=cs1230");
    $submit = 'INSERT INTO Violations (user_id, violation_category_id, violation_date, description, reporter) 
                VALUES ((SELECT user_id FROM c_users WHERE user_id = $1), (SELECT violation_category_id FROM violation_category WHERE violation_name = $2), CURRENT_DATE, $3, $4)';
    pg_prepare("insertion", $submit);
    pg_execute("insertion", array((integer) $user_id, (int) $input_type, $input_details, "Test Person"));
?>