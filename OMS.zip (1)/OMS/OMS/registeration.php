<?php
include 'header.php';
include 'db.php';
include 'nor_menu.php';
$msg = "";

if(isset($_POST['fname'])){

	$sql = 'SELECT * FROM customer WHERE username="'.$_POST['username'].'" and status = 1';

	$result = mysqli_query($conn,$sql);

	if(mysqli_num_rows($result) > 0 ){
		$msg = '<div class="alert alert-danger alert-dismissible" role="alert">
				  <strong>Username Already Exist</strong>
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button>
				</div>';
	}else{
		$sql = 'INSERT INTO customer (fname, email_id,contact_no,address, username, password) VALUES ("'.$_POST['fname'].'","'.$_POST['email'].'","'.$_POST['contact_no'].'","'.$_POST['address'].'","'.$_POST['username'].'","'.$_POST['password'].'")';
		mysqli_query($conn,$sql);
	$msg = '<div class="alert alert-success alert-dismissible" role="alert">
				  <strong>Registeration Successfull <a href="customerlogin.php">Login Here</a></strong>
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button>
				</div>';
	}

	
}

?>
<div class="container-fluid">
	<div class="row" style="padding-top:20px; ">
		<div class="col-lg-4 col-sm-12 offset-lg-4 card bg-dark">
			<h3 class="display-4 text-center text-warning">Customer Register</h3>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-4 col-sm-12 offset-lg-4 card">
			<?php
				if($msg != ""){
					echo $msg;
				}
			?>
			<form action="" method="POST" autocomplete="false"  style="margin-top: 10px;">
				<div class="form-group">
					<label for="fname">Name</label>
					<div class="input-group mb-3">
  						<div class="input-group-prepend">
    						<span class="input-group-text"><i class="fas fa-address-card"></i></span>
  						</div>
						<input type="text" class="form-control" name="fname" id="fname" placeholder="Enter Name" required>
					</div>
				</div>
				<div class="form-group">
					<label for="email">Email Id</label>
					<div class="input-group mb-3">
  						<div class="input-group-prepend">
    						<span class="input-group-text">@</span>
  						</div>
						<input type="email" class="form-control" name="email" id="email" placeholder="Enter Email Id"  required>
					</div>
				</div>
				<div class="form-group">
					<label for="contact_no">Contact no.</label>
					<div class="input-group mb-3">
  						<div class="input-group-prepend">
    						<span class="input-group-text">@</span>
  						</div>
						<input type="number" class="form-control" name="contact_no" id="contact_no" placeholder="Enter contact no"  required>
					</div>
				</div>
				<div class="form-group">
					<label for="address">Address</label>
					<div class="input-group mb-3">
  						<div class="input-group-prepend">
    						<span class="input-group-text">@</span>
  						</div>
						<input type="text" class="form-control" name="address" id="address" placeholder="Enter Address"  required>
					</div>
				</div>
				<div class="form-group">
					<label for="username">Username</label>
					<div class="input-group mb-3">
  						<div class="input-group-prepend">
    						<span class="input-group-text"><i class="fa fa-user-circle"></i></span>
  						</div>
						<input type="text" class="form-control" name="username" id="username" placeholder="Enter Username"  required>
					</div>
				</div>
				<div class="form-group">
					<label for="password">Password</label>
					<div class="input-group mb-3">
  						<div class="input-group-prepend">
    						<span class="input-group-text"><i class="fa fa-key"></i></span>
  						</div>
						<input type="password" class="form-control" name="password" id="password" placeholder="Enter Password"  required>
					</div>
				</div>
			<input type="submit" class="btn bg-dark text-warning float-right" name="register" value="Register">
			</form>
			<br>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-4 col-sm-12 offset-lg-4">
			<br>
			Have an account? <a href="studentlogin.php"><b>Login Here</b></a>
		</div>
	</div>
</div>

<?php
include 'footer.php';
?>
