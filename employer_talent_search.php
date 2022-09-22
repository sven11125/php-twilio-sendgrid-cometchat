<?php
require_once('inc/config.php');
if(isset($_SESSION['SiteUser']['role']) && $_SESSION['SiteUser']['role'] == 'employer'){
	require_once('inc/header.php'); ?>
	
	
	
	<?php require_once('inc/footer.php') ?>
<?php }else{
	header('location:'.getHomeURL.'login-page.php');
	exit;
} ?>