<div class="employer-about">
	<div class="employer-about__button">
		<button class="btn btn--rectangle red modal-toggle myacc_list_jobs_like_job <?php echo($jobInfo['j_liked'] ?'active' :'') ?>" data-job_id="<?php echo $jobInfo['id'] ?>">like this vacancy</button>
	</div>
	<div class="employer-about__button">
		<button class="btn btn--rectangle">save this vacancy</button>
	</div>
	<label class="employer-about__inappropriate">
		<input type="checkbox" />
		<i class="fas fa-fire"></i>
		<span>Flag as inappropriate</span>
	</label>
	<div class="job__line"></div>
	<div class="job-about__box employer-address">
		<h3 class="job__subtitle">about employer</h3>
		<p><?php echo $employerInfo['employer_company_name'] ?></p>
		<p><?php echo $employerInfo['employer_country'].' '.$employerInfo['employer_state'].' '.$employerInfo['employer_city'].' '.$employerInfo['employer_zip'] ?></p>
		<a href="#" target="_blank" rel="nofollow">http://www.abc.com</a>
	</div>
	<div class="job__line"></div>
	<div class="job-about__box employer-location">
		<h5><?php echo $employerInfo['employer_country'].' '.$employerInfo['employer_state'].' '.$employerInfo['employer_city'].' '.$employerInfo['employer_zip'] ?></h5>
		<!--<p>Dallas, TX 10:30 am</p>-->
	</div>
	<div class="job__line"></div>
	<div class="employer-statistic">
		<ul class="employer-statistic__list">
			<li class="employer-statistic__item">
				<a href="#uID"><?php echo getVacancyCount($employerInfo['id']) ?> vacancies posted</a>
			</li>
			<li class="employer-statistic__item">
				0 applicants interviewing
			</li>
			<li class="employer-statistic__item">
				0 applicants hired on wona
			</li>
		</ul>
	</div>
	<div class="employer-about__button">
		<button class="btn btn--rectangle">share vacancy</button>
	</div>
</div>