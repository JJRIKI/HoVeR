<!DOCTYPE html>

<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<title>Violation History</title>

		<!--<link rel="stylesheet" href="../login_page/bootstrap-scss/bootstrap.scss">-->
		<!--<link rel="stylesheet" href="style.css"-->
		<link rel="stylesheet" href="app.css">
	</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<a class="navbar-brand" href="../home_page/index.php">HoVeR</a>

	<div class="collapse navbar-collapse" id="navbarTogglerDemo03">
		<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
			<li class="nav-item">
				<a class="nav-link" href="../home_page/userprofile.php">User Profile <span class="sr-only">(current)</span></a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="../report_violations_final/index.html">Report Violation <span class="sr-only">(current)</span></a>
			</li>
			<li class="nav-item active">
				<a class="nav-link">Violation History <span class="sr-only">(current)</span></a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="../cc_and_r/ccandrpage.php">CC&R's <span class="sr-only">(current)</span></a>
			</li>
		</ul>
		<form class="form-inline my-2 my-lg-0" method="post" action="../../login.php">
			<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Logout</button>
		</form>
	</div>
</nav>

<div class="table-responsive">
	<table class="table table-striped table-sm">
		<thead>
			<tr>
				<th>Violation ID</th>
                <th>Last Name</th>
                <th>First Name</th>
				<th>Type</th>
				<th>Date</th>
				<th>Details</th>
				<th>Reporter</th>
				<th>Prev Violations</th>
            </tr>



		</thead>
		<tbody>

            <?php
                $dbconn = pg_connect("host=bminer-apps port=5445 dbname=compliance user=compliance password=cs1230");

                $history = 'SELECT violation_id, last_name, first_name, violation_name, violation_date, description, reporter, violation_num
							FROM Violations left join Violation_category on Violations.violation_category_id = Violation_category.violation_category_id join c_users on Violations.user_id = c_users.user_id
							ORDER BY violation_id';
                $result = pg_query($dbconn, $history);
                // $rows = pg_fetch_array();

                while ($row = pg_fetch_assoc($result)) {
                    echo "<tr><td>". $row["violation_id"]. "</td><td>". $row["last_name"]. "</td><td>". $row["first_name"]. "</td><td>". $row["violation_name"]. "</td><td>". $row["violation_date"]. "</td><td>". $row["description"]. "</td><td>". $row["reporter"]. "</td><td>". $row["violation_num"]. "</td>";
                }
                echo "</table>";
            ?>

		</tbody>
	</table>
</div>

</body>
</html>
