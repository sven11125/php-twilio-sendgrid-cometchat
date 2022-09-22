<?php
require_once('inc/config.php');
if(isset($_SESSION['SiteUser']['role']) && $_SESSION['SiteUser']['role'] == 'talent'){
	require_once('inc/header.php');
	$pageID = basename(__FILE__); ?>
	
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
					<h2 class="vacancies__title"><?php echo(isset($_GET['liked']) ?'selected vacancies' :'vacancies feed') ?></h2><?php
					if(isset($_GET['liked'])){
						$query = "SELECT jl.*, DATE_FORMAT(jl.jd_ts, '%M %e, %Y')as jd_ts_formated, 1 as j_liked
								  FROM   job_listing jl
								  left   join job_listing_like jll on jl.id = jll.jll_job_listing_id 
                                  where  jll.jll_user_id = ".(int)$_SESSION['SiteUser']['id']."
                                  GROUP  BY jl.id
								  ORDER  BY jl.id DESC
								  LIMIT  20";
					}else{
						$query = "SELECT jl.*, DATE_FORMAT(jl.jd_ts, '%M %e, %Y')as jd_ts_formated, jll.jll_id as j_liked
								  FROM   job_listing jl
								  left   join job_listing_like jll on jl.id = jll.jll_job_listing_id 
                                  GROUP  BY jl.id
								  ORDER  BY jl.id DESC
								  LIMIT  20 ";
					}
					$result = mysqli_query($SiteConn, $query);
					while($row = mysqli_fetch_array($result)){
						$employerInfo = getUserInfo($row['jd_user_id']);
						$jobInfo      = getJobInfo($row['id']);
						include('template-parts/talent_job_item.php');
					} ?>
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