<?php

$db_con['host'] = "bminer-apps";
$db_con['port'] = "5444";
$db_con['user'] = "compliance";
$db_con['password'] = "cs130";
$db_con['dbname'] = "compliance";
$db_con['string'] = "host=" . $db_con['host'] . " port=" . $db_con['port'] . " user=" . $db_con['user'] . " password=" . $db_con['password'] . " dbname=" . $db_con['dbname'];
$db = pg_connect($db_con['string']);


$basic_search_query = $_POST['basic_search_query'];
$reg_search_query_string = "SELECT * FROM <table_name>;"; // TODO
$reg_search_query = pg_query($db, $reg_search_query_string);
// $search_results = pg_fetch_all($reg_search_query); // when you are expecting multiple rows. will return an array of associative arrays
// $search_results = pg_fetch_assoc($reg_search_query); // when you are expecting one row. will return an associative array

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

  <title>HOA Compliance</title>

  <script type="text/javascript" src="./node_modules/jquery/dist/jquery.min.js"></script>
  <script type="text/javascript" src="./node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script type="text/javascript" src="./js/script.js"></script>

  <link rel="stylesheet" type="text/css" href="./node_modules/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="./css/styles.css">
</head>
<body>

<h1><?php echo "compliance"; ?></h1>
<?php
	echo "<p>";
	echo "To view this page navigate to the root of your project directory and then run <i>php -S 127.0.0.1:8080 .</i>";
	echo "</p>";
?>

</body>
</html>

