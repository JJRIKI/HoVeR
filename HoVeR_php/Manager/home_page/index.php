<!DOCTYPE html>

<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<title>Home Page</title>

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
        	<li class="nav-item active">
          		<a class="nav-link" href="../userprofile.php">User Profile <span class="sr-only">(current)</span></a>
        	</li>
      	</ul>
      	<form class="form-inline my-2 my-lg-0" method="post" action="../../login.php">
        	<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Logout</button>
      	</form>
    </div>
</nav>

<div class="container-fluid">
    <div class="row-align-items-center">
        <div class="col">

            <button type="button" class="btn btn-secondary btn-lg btn-block" onclick="location.href='../report_violations_final/index.html'">Report Violation</button>

            <button type="button" class="btn btn-secondary btn-lg btn-block" onclick="location.href='../view_violations_final/index.php'">Violation History</button>

            <button type="button" class="btn btn-secondary btn-lg btn-block" onclick="location.href='../../ccandrpage.php'">CC&R's</button>

        </div>
    </div>
</div>

</body>
</html>
