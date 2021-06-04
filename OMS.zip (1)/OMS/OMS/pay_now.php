<?php	
session_start();
include 'header.php';
include 'db.php';
include 'nor_menu.php';

if(isset($_POST['sbmt'])){

			$sql = "SELECT * FROM products WHERE id =".$_POST['pid'];
			$result = mysqli_query($conn,$sql);
			$row = mysqli_fetch_assoc($result);

			$stock = $row['stock'] - $_POST['qty'];


			$sql = "UPDATE products SET stock = '".$stock."' WHERE id=".$_POST['pid'] ;
			mysqli_query($conn,$sql);

			$sql = "INSERT INTO purchases (cid, pid, amt,qty) VALUES (
			'".$_SESSION['cid']."','".$_POST['pid']."','".$_POST['amt']."','".$_POST['qty']."')";
			mysqli_query($conn,$sql);
			header("location:thankyou.php");
}
?>
<div class="container">
	<div class="row" style="padding-top:20px; ">
		<div class="col-lg-12 col-sm-12">
			<h4 class="display-4 text-center">Payment Form</h4>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-8 col-sm-12 offset-lg-2 card">

			<form  action="" method="POST" enctype="multipart/form-data"  style="margin-top: 10px;">
				<div class="row">
					<input type="hidden" name="pid" id="pid" value="<?php echo $_POST['pid']?>">
					<input type="hidden" name="qty" id="qty" value="<?php echo $_POST['qty']?>">
					<div class="form-group col-sm-12">
						<label for="amt">Total Price</label>
						<div class="input-group mb-3">
						  	<div class="input-group-prepend">
						    	<span class="input-group-text">Rs</span>
						  	</div>
						  	<input type="text" min="1" class="form-control" value="<?php echo round(($_POST['price']*$_POST['qty']),2)?>" name="amt" id="amt" placeholder="..." required readonly="">
						</div>
					</div>
					<div class="form-group col-sm-12">
						<label for="cardno">Card no.</label>
						<div class="input-group mb-3">
						  	<div class="input-group-prepend">
						    	<span class="input-group-text">#</span>
						  	</div>
						  	<input type="number"  class="form-control" name="cardno" id="cardno" placeholder="..." required>
						</div>
					</div>
					<div class="form-group col-sm-4">
						<label for="cvv">CVV</label>
						<div class="input-group mb-3">
						  	<div class="input-group-prepend">
						    	<span class="input-group-text">#</span>
						  	</div>
						  	<input type="number"  class="form-control" name="cvv" id="cvv" placeholder="..." required >
						</div>
					</div>
					<div class="form-group col-sm-4">
						<label for="category">Month</label>
						<div class="input-group mb-3">
	  						<div class="input-group-prepend">
	    						<span class="input-group-text"><i class="fas fa-align-justify"></i></span>
	  						</div>
								<select class="custom-select" id="category" name="category" required>
								    <option>01</option>
								    <option>02</option>
								    <option>03</option>
								    <option>04</option>
								    <option>05</option>
								    <option>06</option>
								    <option>07</option>
								    <option>08</option>
								    <option>09</option>
								    <option>10</option>
								    <option>11</option>
								    <option>12</option>
								</select>
						</div>
					</div>
					<div class="form-group col-sm-4">
						<label for="category">Year</label>
						<div class="input-group mb-3">
	  						<div class="input-group-prepend">
	    						<span class="input-group-text"><i class="fas fa-align-justify"></i></span>
	  						</div>
								<select class="custom-select" id="category" name="category" required>
								    <option>2019</option>
								    <option>2020</option>
								    <option>2021</option>
								    <option>2022</option>
								    <option>2023</option>
								    <option>2024</option>
								    <option>2025</option>
								    <option>2026</option>
								    <option>2027</option>
								</select>
						</div>
					</div>
				</div>
				<input type="submit" class="btn bg-dark text-warning float-right" name="sbmt" value="Make Payment">
			</form>
			<br>
		</div>
	</div>

</div>
<?php
include 'footer.php';
?>