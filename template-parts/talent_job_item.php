<div class="vacancy all">
	<div class="vacancy__top">
		<a href="<?php echo getHomeURL ?>job-page.php?jobID=<?php echo $row['id'] ?>">
			<h3 class="vacancy__title">
				<?php echo $row['title'] ?>
			</h3>
		</a>
		<div class="vacancy__icons">
			<i class="fa-heart like myacc_list_jobs_like_job <?php echo(getLikedMyJob($_SESSION['SiteUser']['id'], $row['id']) ?'fas' :'far') ?>" data-job_id="<?php echo $row['id'] ?>"></i>
			<i class="far fa-thumbs-down dislike"></i>
		</div>
	</div>
	<div class="conditions">
		<h5 class="conditions__item">
			Occupancy: <span><?php echo getOccupancyTitle($row['occupancy']) ?></span>;
		</h5>
		<h5 class="conditions__item">
			Salary range: <span>$<?php echo $row['salary_from'] ?> - $<?php echo $row['salary_to'] ?></span>;
		</h5>
		<h5 class="conditions__item">
			Location:<?php
				$query1 = "SELECT * 
						   FROM job_listing_region
						   WHERE jlr_job_listing_id = ".(int)$row['id'];
				$result1 = mysqli_query($SiteConn, $query1);
				while($row1 = mysqli_fetch_array($result1)){
					echo' <span>'.$row1['jlr_country'].', '.$row1['jlr_state'].($row1['jlr_city'] ?',' :'').' '.$row1['jlr_city'].'</span>; ';
				}
				mysqli_free_result($result1); ?>
		</h5>
		<h5 class="conditions__item">
			Relocation assistance: <span><?php echo($row['relocation_assistance'] ?'Yes' :'No') ?></span>;
		</h5>
		<h5 class="conditions__item">
			Work permit assistance: <span><?php echo($row['permit_assistance'] ?'Yes' :'No') ?></span>;
		</h5>
	</div>
	<div class="post-date">
		<p>Posted: <?php echo $row['jd_ts_formated'] ?></p>
	</div>
	<div class="vacancy__text <?php echo $row['id']?>" >
		<p><?php echo $row['job_description'] ?></p>
	</div>
	
	<?php require_once('template-parts/talent_job_modal.php') ?>
	
	<ul class="vacancy__skills"><?php
		$query1 = "SELECT jd.jd_name
				   FROM   job_listing_job_detail jld
				   left   join job_detail jd on jd.jd_id = jld.jljd_job_detail_id
				   WHERE  jld.jljd_job_listing_id = ".(int)$row['id'];
		$result1 = mysqli_query($SiteConn, $query1);
		while($row1 = mysqli_fetch_array($result1)){
			echo'<li class="vacancy__skill">'.$row1['jd_name'].'</li>';
		}
		mysqli_free_result($result1); ?>
	</ul>
</div>