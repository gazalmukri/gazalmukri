<?php
session_start();
include 'header.php';
include 'db.php';
include 'menu.php';

$total_products = 0;
$total_category = 0;
$total_customer = 0;
$total_revenue = 0;

$sql = "SELECT COUNT(id) as total_products from products WHERE status = 1";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
$total_products = $row['total_products'];

$sql = "SELECT COUNT(id) as total_category from category WHERE status = 1";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
$total_category = $row['total_category'];

$sql = "SELECT COUNT(id) as total_customer from customer WHERE status = 1";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
$total_customer = $row['total_customer'];

$sql = "SELECT SUM(amt) as total_revenue from purchases WHERE status = 1";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
$total_revenue = $row['total_revenue'];

?>
<div class="container">
	
	<div class="row" style="padding-top:20px; ">
		<div class="col-lg-12 col-sm-12">
			<h3 class="display-4 text-center">Hello <?php echo $_SESSION['name']; ?> !</h3>
			<h4 class="text-center">Welcome to admin panel</h4>
		</div>
	</div>

	<div class="row mt-2">
		<div class="col-lg-6 mt-2 text-center">
			<h3>Total Products : <?php echo $total_products; ?></h3>
		</div>
		<div class="col-lg-6 mt-2 text-center">
			<h3>Total Category : <?php echo $total_category; ?></h3>
		</div>
		<div class="col-lg-6 mt-2 text-center">
			<h3>Total Customer : <?php echo $total_customer; ?></h3>
		</div>
		<div class="col-lg-6 mt-2 text-center">
			<h3>Total Revenue : <?php echo $total_revenue; ?></h3>
		</div>
	</div>

</div>
<?php
include 'footer.php';
?>