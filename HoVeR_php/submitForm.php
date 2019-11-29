<?php
	if (isset($_POST["submit"])) {
		$unit = $_POST['unitnum'];
		$license = $_POST['licenseplate'];
		$violation = $_POST['violation'];
		$details = $_POST['details'];
		$errOwner = 'no';
		$errViolation = 'no';

		// Check if name has been entered
		if (!($_POST['unitnum'] || $_POST['licenseplate'])) {
			$errOwner = 'Please enter a unit or license plate number';
		}
		if (!($_POST['violation'])) {
			$errViolation = 'Please choose a violation type';
		}

// If there are no errors, send the email
if ((!isset($_POST['unitnum']) || !isset($_POST['licenseplate'])) && !(isset($_POST['violation']))) {
		$result='<div class="alert alert-danger">Sorry, please refresh and try again</div>';
	} else {
		$result='<div class="alert alert-success">Success!</div>';
	}
}
?>

<script type="text/JavaScript">

		function unit() {
			document.getElementById("unitnum").setAttribute("type", "text");
			document.getElementById("licenseplate").setAttribute("type", "hidden");
		}
		function license() {
			document.getElementById("licenseplate").setAttribute("type", "text");
			document.getElementById("unitnum").setAttribute("type", "hidden");
		}
</script>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Bootstrap contact form with PHP example by BootstrapBay.com.">
    <meta name="author" content="BootstrapBay.com">
    <title>Report Violation</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
  </head>
  <body>
  	<div class="container">
  		<div class="row">
  			<div class="col-md-6 col-md-offset-3">
  				<h1 class="page-header text-center">Report Violation</h1>
				<form class="form-horizontal" role="form" method="post" action="submitForm.php" "enctype="multipart/form-data">
					<div class="form-group">
						<label for="name" class="col-sm-2 control-label">Homeowner</label>
						<div class="col-sm-10">
						<!--	<select name='owner'> -->
								<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
								<input type="button" name="choose" value='Unit' onclick="unit()">
								<input type="button" name="choose" value='License' onclick="license()">
								<input type="hidden" id="unitnum" name="unitnum" placeholder="###">
								<input type="hidden" id="licenseplate" name="licenseplate" placeholder="#######">

						<!--	<input type="text" class="form-control" id="name" name="name" placeholder="Unit or License Plate #" value="<?php if(!empty($_POST['name'])){echo htmlspecialchars($_POST['name']);} ?>">-->
							<?php if (isset($errOwner) && !($errOwner == 'no')) {echo "<p class='text-danger'>$errOwner</p>";}?>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Violation Type</label>
						<div class="col-sm-10">

							<select name="violation">
								<option selected="selected">Choose one</option>
								<?php
								// A sample product array
								$products = array("Parking", "Housing", "Pets", "Other");


								// Iterating through the product array
								foreach($products as $item){
									?>
									<option name="<?php echo strtolower($item); ?>" value="<?php echo strtolower($item); ?>"><?php echo $item; ?></option>
									<?php
								}
								?>
							</select>

						</div>
					</div>
					<div class="form-group">
						<label for="details" class="col-sm-2 control-label">Details</label>
						<div class="col-sm-10">
							<textarea class="form-control" rows="4" name="details"><?php if(!empty($_POST['details'])){echo htmlspecialchars($_POST['details']);}?></textarea>

						</div>
					</div>

					<div class="form-group">
						<div class="col-sm-10 col-sm-offset-2">
							<input id="submit" name="submit" type="submit" value="Submit" class="btn btn-primary">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-10 col-sm-offset-2">
							<?php if(isset($result)){ echo $result;} ?>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
  </body>
</html>
