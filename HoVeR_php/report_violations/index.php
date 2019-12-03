<!DOCTYPE html>

<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<title>Report Violations</title>

		<!--<link rel="stylesheet" href="../login_page/bootstrap-scss/bootstrap.scss">-->
		<!--<link rel="stylesheet" href="style.css"-->
		<link rel="stylesheet" href="app.css">
	</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<a class="navbar-brand" href="../home_page/index.html">HoVeR</a>
			  
	<div class="collapse navbar-collapse" id="navbarTogglerDemo03">
		<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
			<li class="nav-item active">
				<a class="nav-link" href="../user_profile/index.html">User Profile <span class="sr-only">(current)</span></a>
			</li>
			<li class="nav-item active">
				<a class="nav-link" href="../report_violations/index.html">Report Violation <span class="sr-only">(current)</span></a>
			</li>
			<li class="nav-item active">
				<a class="nav-link" href="../view_violations/index.php">Violation History <span class="sr-only">(current)</span></a>
			</li>
			<li class="nav-item active">
				<a class="nav-link" href="../cc_and_r/index.html">CC&R's <span class="sr-only">(current)</span></a>
			</li>
		</ul>
		<form class="form-inline my-2 my-lg-0" method="post" action="../log_out.php">
			<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Logout</button>
		</form>
	</div>
</nav>

<form class="container-fluid" method="post">
	<div class="row-align-items-center">
		<div class="col">
			<form>
				<div class="form-group">
					<label for="id_type">Identification</label>
					<select multiple class="form-control" id="id_type">
						<option>Name</option>
						<option>Unit Number</option>
						<option>Licence Plate</option>
					</select>
				</div>
				<div class="form-group">
					<label for="c_user">Violator</label>
                    <input type="search" class="form-control" id="c_users" placeholder="">

                    <!-- On select id type search for user_id -->
                    <?php
                        $input_search = $_POST['id_type'];
                        $input_violator = $_POST['c_users'];
                        $dbconn = pg_connect("host=bminer-apps port=5444 dbname=compliance user=compliance password=cs1230");
    
                        $search_name = 'SELECT user_id FROM c_users WHERE first_name = $1 AND last_name = $2';
                        $search_unit = 'SELECT user_id FROM Unit WHERE unit_num = $1';
                        $search_licence = 'SELECT user_id FROM Car WHERE licence_plate = $1';
    
                        if ($input_search = "Name") {
                            pg_prepare("type", $search_name);
                            $user_id = pg_execute("type", array($input_violator));
                        }
                        elseif ($input_search = "Unit Number") {
                            pg_prepare("type", $search_unit);
                            $user_id = pg_execute("type", array($input_violator));        
                        }
                        elseif ($input_search = "Licence Plate") {
                            pg_prepare("type", $search_licence);
                            $user_id = pg_execute("type", array($input_violator));
                        }
                    ?>

				</div>
				<div class="form-group">
					<label for="violation_type">Violation Type</label>
					<select class="form-control" id="violation_type">

                        <?php
                            $dbconn = pg_connect("host=bminer-apps port=5444 dbname=compliance user=compliance password=cs1230");
                            $get_viol_type = 'SELECT violation_name FROM Violation_category GROUP BY violation_category_id';
                            $viol_result = pg_query($dbconn, $get_viol_type);

                            while ($row = pg_fetch_assoc($viol_result)) {
                                echo "<option>". $row["violation_name"]. "</option>"; 
                            }
                        ?>

					</select>
				</div>
				<div class="form-group">
					<label for="details">Details</label>
					<textarea class="form-control" id="details" rows="5"></textarea>
				</div>
				<div class="form-group">
					<label for="photo_attach">Attach Photo</label>
					<input type="file" class="form-control-file" id="photo_attach">
				</div>
			</form>
		</div>
	</div>

	<div class="row align-items-end">
		<div class="col-lg">
			<button class="btn btn-outline-danger my-2 my-sm-0" type="submit">Cancel</button>
		</div>
		<div class="col-sm">
            <button class="btn btn-outline-secondary my-2 my-sm-0" type="submit">Submit</button>
            
            <!-- On Submission -->
            <?php
                $input_type = $_POST['violation_type'];
                $input_details = $_POST['details'];

                $dbconn = pg_connect("host=bminer-apps port=5444 dbname=compliance user=compliance password=cs1230");
                $submit = 'INSERT INTO Violations (user_id, violation_category_id, violation_date, description, reporter) 
                            VALUES ((SELECT user_id FROM c_users WHERE user_id = $1), (SELECT violation_category_id FROM violation_category WHERE violation_type = $2), CURRENT_DATE, $3, $4)';
                pg_prepare("insertion", $submit);
                pg_execute("insertion", array($user_id, $input_type, $input_details, "Test Person"));
            ?>


		</div>
	</div>
</form>


</body>
</html>