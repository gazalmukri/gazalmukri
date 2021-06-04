<?php
if (!isset($_SESSION['uid'])) {
	header("location:login.php");
}

?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">OMS</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item ">
        <a class="nav-link  text-warning" href="home.php">Dashboard</a>
      </li>
      <li class="nav-item">
        <a class="nav-link  text-warning" href="addcm.php">Add Medicines</a>
      </li>
      <li class="nav-item">
        <a class="nav-link  text-warning" href="viewcm.php">View Medicines</a>
      </li>

      <li class="nav-item">
        <a class="nav-link  text-warning" href="addcategory.php">Add Category</a>
      </li>
      <li class="nav-item">
        <a class="nav-link  text-warning" href="viewcategory.php">View Category</a>
      </li>
      <li class="nav-item">
        <a class="nav-link  text-warning" href="orders.php">Orders</a>
      </li>
      <li class="nav-item">
        <a class="nav-link  text-warning" href="logout.php">Logout</a>
      </li>
    </ul>
  </div>
</nav>