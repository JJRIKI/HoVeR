<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
	<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>CC&Rs</title>
<link rel="stylesheet" href="app.css">
<style>
.accordion {
  background-color: #eee;
  color: #444;
  cursor: pointer;
  padding: 18px;
  width: 100%;
  border: none;
  text-align: left;
  outline: none;
  font-size: 15px;
  transition: 0.4s;
}

.accordion.active, .accordion:hover {
  background-color: #ccc;
}

.accordion:after {
  content: '\002B';
  color: #777;
  font-weight: bold;
  float: right;
  margin-left: 5px;
}

.accordion.active:after {
  content: "\2212";
}

.panel {
  padding: 0 18px;
  background-color: white;
  max-height: 0;
  overflow: hidden;
  transition: max-height 0.2s ease-out;
}

</style>

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
					<a class="nav-link" href="../view_violations_final/index.php">Violation History <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item active">
					<a class="nav-link">CC&R's <span class="sr-only">(current)</span></a>
				</li>
			</ul>
			<form class="form-inline my-2 my-lg-0" method="post" action="../../login.php">
				<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Logout</button>
			</form>
		</div>
	</nav>


<p><br></p>
<button class="accordion">Noise</button>
<div class="panel">
  <p>Noise complaints are taken very seriously. It is expected that "quiet hours" are observed between the hours of 10 pm and 11 am.</p>
</div>

<button class="accordion">Common Area Usage</button>
<div class="panel">
  <p>The common areas are expected to be reasonably respected.</p>
</div>

<button class="accordion">Unit Conditions</button>
<div class="panel">
  <p>Patios and doorways should be nicely kept and should not draw unfavorable attention.</p>
</div>

<button class="accordion">Pets</button>
<div class="panel">
  <p>NO PETS.</p>
</div>

<button class="accordion">Parking</button>
<div class="panel">
  <p>Every resident is expected to register their vehicles. Residents should be using their garage space and assigned parking spaces and should under no circumstance be using the visitor parking lot as regular parking.</p>
</div>

<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight) {
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    }
  });
}
</script>

</body>
</html>
