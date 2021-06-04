<?php
session_start();
include 'header.php';
include 'db.php';
include 'menu.php';

$cname = array();
$sql = "SELECT * FROM category";
$result = mysqli_query($conn,$sql);
while($row = mysqli_fetch_assoc($result)){
	$cname[$row['id']] = $row['category_name'];
}

$sql = "SELECT * FROM products WHERE status = 1 ORDER BY id DESC";
$result = mysqli_query($conn,$sql);
$tdata = "";

if(mysqli_num_rows($result) > 0){
	$i = 1;
	while($row = mysqli_fetch_assoc($result)){
		$tdata .= "<tr>
					<td>".$i."</td>
					<td><img src='".$row['product_image']."' style='width:100px;' /></td>
					<td>".$row['product_name']."</td>
					<td>".$cname[$row['category']]."</td>
					<td>".$row['description']." <br> Expiry Date : ".$row['expiry_date']."</td>
					<td>Rs. ".$row['cost']."/-</td>
					<td>".$row['stock']."</td>
					<td><a href='deletecm.php?id=".$row['id']."'><i class='fas fa-trash text-danger'></i></a></td>
				  </tr>";
			$i++;
	}
}else{
	$tdata = "<tr><td colspan='8'>No records found</td></tr>";
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
					<th>Image</th>
					<th>Name</th>
					<th>Category</th>
					<th>Description</th>
					<th>MRP</th>
					<th>In Stock</th>
					<th>Action</th>
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

