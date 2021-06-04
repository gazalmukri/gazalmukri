<?php	
session_start();
include 'header.php';
include 'db.php';
include 'nor_menu.php';

?>
<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<div class="jumbotron">
			  <h1 class="display-4">Thankyou! Your payment is successfull.</h1>
			  <p class="lead">We will deliver your medicines within 24 hrs.</p>
			  <!-- <hr class="my-4">
			  <a class="btn btn-primary btn-lg" href="login.php" role="button">Admin Login</a> -->
			</div>
		</div>
	</div>
</div>
<?php
include 'footer.php';
?>