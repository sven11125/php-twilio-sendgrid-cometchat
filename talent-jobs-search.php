<?php
require_once('inc/config.php');
if(isset($_SESSION['SiteUser']['role']) && $_SESSION['SiteUser']['role'] == 'talent'){
	require_once('inc/header.php'); ?>
	
	<div class="talent">
		<section class="talent-nav">
			<?php require_once('template-parts/logo.php') ?>
			
			<?php require_once('template-parts/talent_search.php') ?>
			
			<?php require_once('template-parts/talent_menu.php') ?>
			
			<?php require_once('template-parts/talent_chat.php') ?>
		</section>
		
		<?php require_once('template-parts/talent_top_menu.php') ?>
		
		<section class="vacancies">
			<div class="container">
				<div class="vacancies__list">
					<h2 class="vacancies__title"><?php echo 'vacancies search' ?></h2><?php
					$find = (isset($_POST['searchjob']) ?htmlspecialchars($_POST['searchjob']) :'');
					$sql = getSQLsearctVacancy($find);
					
					//echo $sql;
					$result = mysqli_query($SiteConn, $sql);
					while($row = mysqli_fetch_array($result)){
						$employerInfo = getUserInfo($row['jd_user_id']);
						require_once('template-parts/talent_job_item.php');
					}
					mysqli_free_result($result); ?>
				</div>
			</div>
		</section>
	</div>
	
	<?php require_once('template-parts/talent_chat_screen.php') ?>
	
	<?php require_once('inc/footer.php') ?>
	
	<?php require_once('template-parts/chat_scripts.php') ?>
	
<?php }else{
	header('location:'.getHomeURL.'login-page.php');
	exit;
} ?>