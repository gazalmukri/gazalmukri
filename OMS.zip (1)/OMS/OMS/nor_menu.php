<?php

  $show  = '<li class="nav-item ">
            <a class="nav-link  text-warning" href="my_medicines.php">History</a>
          </li>
          <li class="nav-item">
            <a class="nav-link  text-warning" href="logout.php">Logout</a>
          </li>';
if (!isset($_SESSION['cid'])) {
$show = '<li class="nav-item">
        <a class="nav-link  text-warning" href="registeration.php">Register</a>
      </li>
          <li class="nav-item">
            <a class="nav-link  text-warning" href="customerlogin.php">Customer Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link  text-warning" href="login.php">Admin Login</a>
          </li>';
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
        <a class="nav-link  text-warning" href="index.php">Home</a>
      </li>
      <li class="nav-item ">
        <a class="nav-link  text-warning" href="view_medicines.php">Medicines</a>
      </li>
      <li class="nav-item">
        <a class="nav-link  text-warning" href="aboutus.php">About Us</a>
      </li>
      <?php echo $show;?>
    </ul>
  </div>
</nav>