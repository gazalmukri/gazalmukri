<?php
session_start();
include 'header.php';
include 'db.php';
include 'menu.php';
$msg = "";


if(isset($_POST['sbt'])){

	$sql = "INSERT INTO category (category_name) VALUES ('".$_POST['cname']."')";
	mysqli_query($conn,$sql);
	$msg = '<div class="alert alert-success" role="alert">
			  Category Added Successfully.
			</div>';   
}

?>
<div class="container">
	<div class="row" style="padding-top:20px; ">
		<div class="col-lg-12 col-sm-12">
			<h4 class="display-4 text-center">Add Category </h4>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-8 col-sm-12 offset-lg-2 card">
			<?php
				if($msg != ""){
					echo "<br>".$msg;
				}
			?>
			<form  action="" method="POST" style="margin-top: 10px;">
				<div class="row">
					<div class="form-group col-sm-12">
						<label for="cname">Category Name</label>
						<div class="input-group mb-3">
						  	<div class="input-group-prepend">
						    	<span class="input-group-text">@</span>
						  	</div>
						  	<input type="text" class="form-control" name="cname" id="cname" placeholder="Enter Category Name" required>
						</div>
					</div>
				</div>
				<input type="submit" class="btn bg-dark text-warning float-right" name="sbt" value="Submit">
			</form>
			<br>
		</div>
	</div>

</div>
<?php
include 'footer.php';
?>