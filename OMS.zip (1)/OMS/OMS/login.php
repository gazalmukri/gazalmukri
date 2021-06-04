<?php
include 'header.php';
include 'db.php';
include 'nor_menu.php';
$msg = "";
if(isset($_POST['username'])){

	$sql = 'SELECT * FROM users WHERE username="'.$_POST['username'].'" and password="'.$_POST['password'].'" and status = 1';

	$result = mysqli_query($conn,$sql);
	if(mysqli_num_rows($result) > 0 ){
		session_start();
		$row = mysqli_fetch_assoc($result);
		$_SESSION['name'] = $row['fname'];
		$_SESSION['uid'] = $row['id'];
		header("location:home.php");
	}else{
		$msg = '<div class="alert alert-danger alert-dismissible" role="alert">
				  <strong>Username and Password Invalid</strong>
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
			<h3 class="display-4 text-center text-warning">Admin Login</h3>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-4 col-sm-12 offset-lg-4 card">
			<?php
				if($msg != ""){
					echo $msg;
				}
			?>
			<form action="" method="POST"  style="margin-top: 10px;">
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
			<input type="submit" class="btn bg-dark text-warning float-right" name="login" value="Login">
			</form>
			<br>
		</div>
	</div>
	<!-- <div class="row">
		<div class="col-lg-4 col-sm-12 offset-lg-4">
			<br>
			Don`t have an account? <a href="registeration.php"><b>Register Here</b></a>
		</div>
	</div> -->
</div>

<?php
include 'footer.php';
?>
