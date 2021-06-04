<?php
ini_set('post_max_size', '1024M');
ini_set('upload_max_filesize', '1024M');
ini_set('max_execution_time', '300');	
session_start();
include 'header.php';
include 'db.php';
include 'menu.php';
$msg = "";
$sql = "SELECT * FROM category WHERE status = 1";
$result = mysqli_query($conn,$sql);
$subj = "";
	while ($row = mysqli_fetch_assoc($result)) {
		$subj .= "<option value='".$row['id']."'>".$row['category_name']."</option>";
	}

if(isset($_POST['sbt'])){
	$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';	
	$new = substr(str_shuffle($permitted_chars), 0, 10);
	$allowedExts = array("jpg", "png", "JPEG","PNG","jpeg","JPG");
	$temp = explode(".", $_FILES["filecm"]["name"]);
	$extension = end($temp);
	$target_dir = "uploads/";
	$target_file = $target_dir . $new .basename($_FILES["filecm"]["name"]);
	//($_FILES["filecm"]["size"] < 200000)
	if(in_array($extension, $allowedExts) && $_FILES["filecm"]["size"] <= 8000000){

		if (move_uploaded_file($_FILES["filecm"]["tmp_name"], $target_file)) {
			$sql = "INSERT INTO products (category, product_name, product_image, description, cost,stock,expiry_date,user_id) VALUES (
			".$_POST['category'].",'".$_POST['product_name']."','".$target_file."','".$_POST['desc']."','".$_POST['cost']."','".$_POST['stock']."','".$_POST['expiry_date']."','".$_SESSION['uid']."')";
			mysqli_query($conn,$sql);
			$msg = '<div class="alert alert-success" role="alert">
					  Medicine added Successfully.
					</div>';
	       
	    } else {
	        $msg = '<div class="alert alert-danger" role="alert">
					  Image cannot be uploaded.
					</div>';
	    }
	}else{
		$msg = '<div class="alert alert-danger" role="alert">
				  Only jpg and png files allowed. File size should be less than 8mb.
				</div>';
	}
}
?>
<div class="container">
	<div class="row" style="padding-top:20px; ">
		<div class="col-lg-12 col-sm-12">
			<h4 class="display-4 text-center">Add Medicine</h4>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-8 col-sm-12 offset-lg-2 card">
			<?php
				if($msg != ""){
					echo "<br>".$msg;
				}
			?>
			<form cl action="" method="POST" enctype="multipart/form-data"  style="margin-top: 10px;">
				<div class="row">
					<div class="form-group col-sm-3">
						<label for="category">Select Category</label>
						<div class="input-group mb-3">
	  						<div class="input-group-prepend">
	    						<span class="input-group-text"><i class="fas fa-align-justify"></i></span>
	  						</div>
								<select class="custom-select" id="category" name="category" required>
								    <?php echo $subj; ?>
								</select>
						</div>
					</div>
					<div class="form-group col-sm-5">
						<label for="cost">MRP</label>
						<div class="input-group mb-3">
						  	<div class="input-group-prepend">
						    	<span class="input-group-text">Rs</span>
						  	</div>
						  	<input type="number" min="1" class="form-control" name="cost" id="cost" placeholder="..." required>
						</div>
					</div>
					<div class="form-group col-sm-4">
					    <label for="filecm">Select File</label>
					    <input type="file" class="form-control-file" id="filecm" name="filecm" required>
					</div>
				</div>
				<div class="row">
					<div class="form-group col-sm-6">
						<label for="product_name">Medicine Name</label>
						<div class="input-group mb-3">
						  	<div class="input-group-prepend">
						    	<span class="input-group-text">@</span>
						  	</div>
						  	<input type="text" class="form-control" name="product_name" id="product_name" placeholder="..." required>
						</div>
					</div>
					<div class="form-group col-sm-2">
						<label for="stock">Stock</label>
						<div class="input-group mb-3">
						  	<div class="input-group-prepend">
						    	<span class="input-group-text">#</span>
						  	</div>
						  	<input type="number" min="1" class="form-control" name="stock" id="stock" placeholder="..." required>
						</div>
					</div>
					<div class="form-group col-sm-4">
						<label for="expiry_date">Expiry Date</label>
						<div class="input-group mb-3">
						  	<div class="input-group-prepend">
						    	<span class="input-group-text">#</span>
						  	</div>
						  	<input type="date" class="form-control" name="expiry_date" id="expiry_date" required>
						</div>
					</div>
					<div class="form-group col-sm-12">
						<div class="input-group">
						  	<div class="input-group-prepend">
						    	<span class="input-group-text">Description</span>
						  	</div>
						<textarea class="form-control" name="desc" id="desc" required></textarea>
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