<?php
require_once('inc/config.php');
if(isset($_SESSION['SiteUser']['role']) && $_SESSION['SiteUser']['role'] == 'talent'){
	require_once('inc/header.php'); ?>
	
	<div class="talent">
		<section class="talent-nav">
			<?php require_once('template-parts/logo.php') ?>
			
			<?php require_once('template-parts/talent_search.php') ?>
			
			<?php require_once('template-parts/talent_menu.php') ?>
		</section>
		
		<div class="job-page">
			<div class="container">
				<div class="job__content"><?php
					$jobID        = $_GET['jobID'] ?? 0;
					$jobInfo      = getJobInfo($jobID);
					$employerInfo = getUserInfo($jobInfo['jd_user_id']);
					if(isset($jobInfo['id'])){ ?>
						<div class="job-about">
							<div class="job-about__top">
								<h2 class="job-about__title"><?php echo $jobInfo['title'] ?></h2>
							</div>
							<div class="job-about__description">
								<div class="job-about__box">
									<h3 class="job__subtitle">Vacancy Description:</h3>
									<p><?php echo $jobInfo['job_description'] ?></p>
								</div>
								<div class="job__line"></div>
								<div class="job-about__box">
									<h3 class="job__subtitle">
										location: <span><?php
											$query1 = "SELECT * 
													   FROM job_listing_region
													   WHERE jlr_job_listing_id = ".(int)$jobInfo['id'];
											$result1 = mysqli_query($SiteConn, $query1);
											while($row1 = mysqli_fetch_array($result1)){
												echo$row1['jlr_country'].', '.$row1['jlr_state'].', '.$row1['jlr_city'].', '.$row1['jlr_zip'];
											}
											mysqli_free_result($result1); ?></span>
									</h3>
									<h3 class="job__subtitle">
										Salary range: <span>$<?php echo $jobInfo['salary_from'] ?> - $<?php echo $jobInfo['salary_to'] ?></span>
									</h3>
									<h3 class="job__subtitle">
										relocation assistance: <span><?php echo($jobInfo['relocation_assistance'] ?'yes' :'No') ?></span>
									</h3>
									<h3 class="job__subtitle">
										work permit assistance: <span><?php echo($jobInfo['permit_assistance'] ?'maybe' :'No') ?></span>
									</h3>
								</div>
								<div class="job__line"></div>
								<div class="job-about__box">
									<h3 class="job__subtitle">
										job type: <span><?php echo getOccupancyTitle($jobInfo['occupancy']) ?></span>
									</h3>
								</div>
								<div class="job__line"></div>
								<div class="job-about__box">
									<h3 class="job__subtitle">skills & experties:</h3>
									<ul class="vacancy__skills"><?php
										$query1 = "SELECT jd.jd_name
												   FROM   job_listing_job_detail jld
												   left   join job_detail jd on jd.jd_id = jld.jljd_job_detail_id
												   WHERE  jld.jljd_job_listing_id = ".(int)$jobInfo['id'];
										$result1 = mysqli_query($SiteConn, $query1);
										while($row1 = mysqli_fetch_array($result1)){
											echo'<li class="vacancy__skill">'.$row1['jd_name'].'</li>';
										}
										mysqli_free_result($result1); ?>
									</ul>
								</div>
								<div class="job__line"></div>
							</div>
						</div>
						
						<?php require_once('template-parts/talent_job_modal_aboutemployer.php') ?>
						
					<?php }else{ ?>
						<h1>Job not found.</h1><?php
					} ?>
				</div>
			</div>
		</div>
	</div>
	
<?php require_once('inc/footer.php') ?>
<?php }else{
	header('location:'.getHomeURL.'login-page.php');
	exit;
} ?>