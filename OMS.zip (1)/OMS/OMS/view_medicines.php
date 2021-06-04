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

$sql = "SELECT * FROM products WHERE status = 1";
$result = mysqli_query($conn,$sql);
$tdata = "";

if(mysqli_num_rows($result) > 0){
	$i = 1;
	while($row = mysqli_fetch_assoc($result)){

		$btn = "<a class='btn btn-success' href='customerlogin.php'>Login to Buy</a>";

		if(isset($_SESSION['cid'])){
			$btn = "<a class='btn btn-success' href='buy_now.php?id=".$row['id']."'>Buy Now</a>";
		}

		$tdata .= "<div class='row bg-light'>
						<div class='col-sm-3'>
							<img src='".$row['product_image']."' style='width:150px;' />
						</div>
						<div class='col-sm-9'>
							<div class='row' style='padding-top: 10px;'>
								<div class='col-sm-12'><h2>".$row['product_name']."</h2></div>
								<hr>
								<div class='col-sm-12'><h3>Type : ".$cname[$row['category']]." , Price : Rs. ".$row['cost']." /-, Stock : ".$row['stock']."</h3></div>
								<div class='col-sm-12'>Description : ".$row['description']." <br> Expiry Date : ".$row['expiry_date']."</div>
								<div class='col-sm-12 text-right'><br>".$btn."</div>
							</div>
						</div>
					</div><br>";

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