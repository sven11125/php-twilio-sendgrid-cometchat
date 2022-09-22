<div class="modal">
	<div class="modal-overlay modal-transition"></div>
	<div class="job modal-transition">
		<div class="new-window">
			<a class="new-window__link" href="job-page.php" target="_blank">
				<p>Open vacancy in a new window</p>
			</a>
			<div class="close-popup">
				<div class="close-popup__icon ">
					<i class="fas fa-angle-right"></i>
				</div>
			</div>
		</div>
		<div class="job__content">
			<div class="job-about">
				<div class="job-about__top">
					<h2 class="job-about__title"><?php echo $row['title'] ?></h2>
				</div>
				<div class="job-about__description">
					<div class="job-about__box">
						<h3 class="job__subtitle">Vacancy Description:</h3>
						<?php echo $row['job_description'] ?>
					</div>
					<div class="job__line"></div>
					<div class="job-about__box">
						<h3 class="job__subtitle">
							location: <?php
							$query1 = "SELECT * 
									   FROM job_listing_region
									   WHERE jlr_job_listing_id = ".(int)$row['id'];
							$result1 = mysqli_query($SiteConn, $query1);
							while($row1 = mysqli_fetch_array($result1)){
								echo' <span>'.$row1['jlr_country'].', '.$row1['jlr_state'].', '.$row1['jlr_city'].'</span>; ';
							}
							mysqli_free_result($result1); ?>
						</h3>
						<h3 class="job__subtitle">
							Salary range: <span>$<?php echo $row['salary_from'] ?> - $<?php echo $row['salary_to'] ?></span>
						</h3>
						<h3 class="job__subtitle">
							relocation assistance: <span><?php echo($row["relocation_assistance"] ?'Yes' :'No') ?></span>
						</h3>
						<h3 class="job__subtitle">
							work permit assistance: <span><?php echo($row['permit_assistance'] ?'Yes' :'No') ?></span>
						</h3>
					</div>
					<div class="job__line"></div>
					<div class="job-about__box">
						<h3 class="job__subtitle">
							job type: <span><?php echo getOccupancyTitle($row['occupancy']) ?></span>
						</h3>
					</div>
					<div class="job__line"></div>
					<div class="job-about__box">
						<h3 class="job__subtitle">skills & experties:</h3>
						<ul class="vacancy__skills"><?php
							$query1 = "SELECT jd.jd_name
									   FROM   job_listing_job_detail jld
									   left join job_detail jd on jd.jd_id = jld.jljd_job_detail_id
									   WHERE  jld.jljd_job_listing_id = ".(int)$row['id'];
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
			
		</div>
	</div>
</div>