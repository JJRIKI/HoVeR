<!DOCTYPE html>

<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<title>User Profile</title>

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
				<a class="nav-link">User Profile <span class="sr-only">(current)</span></a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="../view_violations_final/index.php">Violation History <span class="sr-only">(current)</span></a>
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

<div class="container">
    <div class="jumbotron">
      <div class="row">
          <div class="col-md-4 col-xs-12 col-sm-6 col-lg-4">
              <img src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" class="img-thumbnail">
          </div>
          <div class="col-md-8 col-xs-12 col-sm-6 col-lg-8">
              <div class="container" style="border-bottom:1px solid black">
                <h2>James Bek</h2>
              </div>
                <hr>
              <ul class="container details">
                <li><p><span class="glyphicon glyphicon-earphone one" style="width:50px;"></span>+303-548-0882</p></li>
                <li><p><span class="glyphicon glyphicon-envelope one" style="width:50px;"></span>jbek@westmont.edu</p></li>
                <li><p><span class="glyphicon glyphicon-map-marker one" style="width:50px;"></span>Unit 31</p></li>
                <li><p><span class="glyphicon glyphicon-credit-card one" style="width:50px;"></span>Next payment: Jan 15</p></a>
              </ul>
          </div>
      </div>
    </div>
  </div>

</body>
</html>
