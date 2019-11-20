<?php
	if (isset($_POST["submit"])) {
		$name = $_POST['name'];
		$email = $_POST['email'];
		$details = $_POST['details'];
		$human = intval($_POST['human']);
		$from = 'Demo Contact Form';
		$to = 'example@domain.com';
		$subject = 'Details from Contact Demo ';
		$errName = 'no';
		$errEmail = 'no';
		$errDetails = 'no';

		$body ="From: $name\n E-Mail: $email\n Details:\n $details";
		// Check if name has been entered
		if (!$_POST['name']) {
			$errName = 'Please enter your name';
		}

		// Check if email has been entered and is valid
		if (!$_POST['email'] || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
			$errEmail = 'Please enter a valid email address';
		}

		//Check if details has been entered
		if (!$_POST['details']) {
			$errDetails = 'Please enter your details';
		}
		//Check if simple anti-bot test is correct
		if ($human !== 5) {
			$errHuman = 'Your anti-spam is incorrect';
		}
// If there are no errors, send the email
if (!($errName == 'no') && !($errEmail == 'no')&& !($errDetails == 'no') && !($errHuman == 'no')) {
	if (mail ($to, $subject, $body, $from)) {
		$result='<div class="alert alert-success">Thank You! I will be in touch</div>';
	} else {
		$result='<div class="alert alert-danger">Sorry there was an error sending your details. Please try again later.</div>';
	}
}
	}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Bootstrap contact form with PHP example by BootstrapBay.com.">
    <meta name="author" content="BootstrapBay.com">
    <title>Bootstrap Contact Form With PHP Example</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
  </head>
  <body>
  	<div class="container">
  		<div class="row">
  			<div class="col-md-6 col-md-offset-3">
  				<h1 class="page-header text-center">Report Violation</h1>
				<form class="form-horizontal" role="form" method="post" action="submitForm.php" "enctype="multipart/form-data">
					<div class="form-group">
						<label for="name" class="col-sm-2 control-label">Unit</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="name" name="name" placeholder="Unit or License Plate #" value="<?php if(!empty($_POST['name'])){echo htmlspecialchars($_POST['name']);} ?>">
							<?php if (isset($errName) && !($errName == 'no')) {echo "<p class='text-danger'>$errName</p>";}?>
						</div>
					</div>
					<div class="form-group">
						<label for="email" class="col-sm-2 control-label">Violation Type</label>
						<div class="col-sm-10">

							<select>
								<option selected="selected">Choose one</option>
								<?php
								// A sample product array
								$products = array("Parking", "Housing", "Pets", "Other");
					

								// Iterating through the product array
								foreach($products as $item){
									?>
									<option value="<?php echo strtolower($item); ?>"><?php echo $item; ?></option>
									<?php
								}
								?>
							</select>

							<!--<input type="email" class="form-control" id="email" name="email" placeholder="example@domain.com" value="<?php if(!empty($_POST['email'])){echo htmlspecialchars($_POST['email']); }?>">-->
							<?php if (isset($errEmail) && !($errEmail == 'no')){echo "<p class='text-danger'>$errEmail</p>";}?>
						</div>
					</div>
					<div class="form-group">
						<label for="details" class="col-sm-2 control-label">Details</label>
						<div class="col-sm-10">
							<textarea class="form-control" rows="4" name="details"><?php if(!empty($_POST['details'])){echo htmlspecialchars($_POST['details']);}?></textarea>
							<?php if (isset($errDetails) && !($errDetails == 'no')){echo "<p class='text-danger'>$errDetails</p>";}?>
						</div>
					</div>

					<div class="form-group">
					<label for='uploaded_file' class="col-sm-2 control-label">Attach Image</label>
					<div class="col-sm-10">
						<input type="file" name="uploaded_file">
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
