<?php
session_start();
include 'header.php';
include 'db.php';
include 'nor_menu.php';


$cust = array();
$pro = array();


$sql = "SELECT * FROM products";
$result = mysqli_query($conn,$sql);
while($row = mysqli_fetch_assoc($result)){
	$pro[$row['id']] = $row['product_name'];
}

$sql = "SELECT * FROM purchases where cid = '".$_SESSION['cid']."' ORDER BY id DESC";
$result = mysqli_query($conn,$sql);
$tdata = "";

if(mysqli_num_rows($result) > 0){
	$i = 1;
	while($row = mysqli_fetch_assoc($result)){
		$tdata .= "<tr>
					<td>".$i."</td>
					<td>".$pro[$row['pid']]."</td>
					<td>".$row['amt']."</td>
				  	<td>".$row['qty']."</td>
				  </tr>";
			$i++;
	}
}else{
	$tdata = "<tr><td colspan='4'>No records found</td></tr>";
}
?>
<div class="container">
	<div class="row" style="padding-top:20px; ">
		<div class="col-lg-12 col-sm-12">
			<h4 class="display-4 text-center">Medicine List</h4>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<table class="table table-dark">
				<thead>
					<th>Sr.no</th>
					<th>Medicine </th>
					<th>Amount Paid</th>
					<th>Quantity</th>
				</thead>
				<tbody>
					<?php echo $tdata;?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<?php
include 'footer.php';
?>

