<?php
session_start();

if(empty($_SESSION['SiteUser'])){
 //header('location:index.php');
} ?>
<h1>Wellcome to <?php echo $_SESSION['SiteUser']['useremail'];?> Page</h1>

<div id="profile">
<h2>User name is: <?php echo $_SESSION['SiteUser']['useremail'];?> and Your Role is :<?php echo $_SESSION['SiteUser']['role'];?></h2>
<div id="logout"><a href="logout.php">Please Click To Logout</a></div>