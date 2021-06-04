<?php
session_start();
include 'header.php';
include 'db.php';
include 'menu.php';


$sql = "SELECT * FROM category WHERE status = 1";
$result = mysqli_query($conn,$sql);
$tdata = "";

if(mysqli_num_rows($result) > 0){
	$i = 1;
	while($row = mysqli_fetch_assoc($result)){
		$tdata .= "<tr>
					<td>".$i."</td>
					<td>".$row['category_name']."</td>
					<td><a href='deletecategory.php?id=".$row['id']."'><i class='fas fa-trash text-danger'></i></a></td>
				  </tr>";
			$i++;
	}
}else{
	$tdata = "<tr><td colspan='63'>No records found</td></tr>";
}
?>
<div class="container">
	<div class="row" style="padding-top:20px; ">
		<div class="col-lg-12 col-sm-12">
			<h4 class="display-4 text-center">Category List</h4>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<table class="table table-dark">
				<thead>
					<th>Sr.no</th>
					<th>Category Name</th>
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

