<?php
session_start();
include 'header.php';
include 'db.php';
include 'nor_menu.php';

$cname = array();
$sql = "SELECT * FROM category";
$result = mysqli_query($conn,$sql);
while($row = mysqli_fetch_assoc($result)){
	$cname[$row['id']] = $row['category_name'];
}

$sql = "SELECT * FROM products WHERE status = 1 and id =".$_GET['id'];
$result = mysqli_query($conn,$sql);
$tdata = "";

if(mysqli_num_rows($result) > 0){
	$i = 1;
	while($row = mysqli_fetch_assoc($result)){

		$btn = "<a class='btn btn-success' href='customerlogin.php'>Login to Enroll</a>";

		if(isset($_SESSION['cid'])){
			$btn = "<a class='btn btn-success' href='pay_now.php?id=".$row['id']."&fee=".$row['cost']."'>Pay Now</a>";
		}

		$tdata .= "<div class='row bg-light'>
						<h2></h2>
						<div class='col-sm-3'>
							<img src='".$row['product_image']."' style='width:150px;' />
						</div>
						<div class='col-sm-9'>
							<div class='row' style='padding-top: 10px;'>
								<div class='col-sm-12'><h2>".$row['product_name']."</h2></div>
								<hr>
								<div class='col-sm-12'><h3>Type : ".$cname[$row['category']]." , Price : Rs. ".$row['cost']." /-, Stock : ".$row['stock']."</h3></div>
								<div class='col-sm-12'>Description : ".$row['description']." <br> Expiry Date : ".$row['expiry_date']."</div>
							</div>
						</div>
					</div>
					<br>
					";

		if($row['stock'] > 0){
			$tdata .= "<div class='row'>
						<div class='col-sm-6 offset-sm-3 text-center'>
							<form  action='pay_now.php' method='POST'>
								<label>Select Quantity</label>
								<input class='form-control' name='qty' id='qty' type='number' min = '1' max = '".$row['stock']."' value='1' required/>
								<input type='hidden' name='pid' id='pid' value='".$_GET['id']."' >
								<input type='hidden' name='price' id='price' value='".$row['cost']."' >
								<br>
								<input class='btn btn-success' type='submit' name='sbt' id = 'sbt' value='Buy' />
							</form>
						</div>
					</div>";
		}else{
			$tdata .= "<div class='row'>
						<div class='col-sm-6 offset-sm-3 text-center'>
							<h2>OUT OF STOCK</H2>
						</div>
					</div>";
		}

		/*$tdata .= "<tr>
					<td>".$i."</td>
					<td><img src='".$row['product_image']."' style='width:100px;' /></td>
					<td>".$row['product_name']."</td>
					<td>".$cname[$row['category']]."</td>
					<td>".$row['description']."</td>
					<td>".$row['cost']."</td>
					<td>".$row['duration']." months</td>
					<td><a href='deletecm.php?id=".$row['id']."'><i class='fas fa-trash text-danger'></i></a></td>
				  </tr>";*/
		$i++;
	}
}else{
	$tdata = "<div class='row'><div class='col-sm-12'>No records found</div></div>";
}
?>

<div class="container">
	<br>
		<?php echo $tdata; ?>
</div>
<?php
include 'footer.php';
?>