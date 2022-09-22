<section class="jobs">
	<div class="container">
		<div class="jobs__menu">
			<div class="post__avatar">
				<img src="<?php echo getHomeURL.'user_data/'.($_SESSION['SiteUser']['avatar'] ?'avatar/'.$_SESSION['SiteUser']['avatar'] :'noimage.png') ?>" alt="avatar">
			</div>
			<div class="jobs__box">
				<div class="jobs__box-item">
					<h3><?php echo $_SESSION['SiteUser']['first_name'].' '.$_SESSION['SiteUser']['last_name'] ?></h3>
				</div>
				<div class="jobs__box-item">
					<h3>recent</h3>
					<div class="recent__icon">
						<i class="fas fa-check-circle"></i>
					</div>
				</div>
			</div>
			<ul class="jobs__switch">
				<li class="jobs__switch__item <?php echo(isset($_GET['liked']) || isset($_POST['searchjob']) ?'' :'active') ?>">
					<a href="<?php echo getHomeURL ?>talent-jobs.php" class="jobs__switch__link">all jobs</a>
				</li>
				<li class="jobs__switch__item <?php echo(isset($_GET['liked']) && !isset($_POST['searchjob']) ?'active' :'') ?>">
					<a href="<?php echo getHomeURL ?>talent-jobs.php?liked" class="jobs__switch__link jobs__switch__link--accent">
					<i class="fas fa-heart"></i>
					</a>
				</li>
			</ul>
			<div class="jobs__box jobs__nav">
				<div class="jobs__box-item jobs__box-item--accent jobs__box-item--small">
					<h3>Jobs I</h3>
					<div class="heart">
						<i class="fas fa-heart"></i>
					</div>
				</div>
				<div class="jobs__box-item jobs__box-item--burger">
					<i class="fas fa-bars"></i>
					<i class="fas fa-times"></i>
				</div>
				<div class="nav-dropdown">
					<ul class="nav-dropdown__list">
						<li class="nav-dropdown__item">
							<a href="talent_home.php" class="nav-dropdown__link">hub</a>
						</li>
						<li class="nav-dropdown__item">
							<a href="#" class="nav-dropdown__link">portfolio</a>
						</li>
						<li class="nav-dropdown__item">
							<a href="#" class="nav-dropdown__link">my media</a>
						</li>
						<div class="nav-dropdown__line"></div>
						<li class="nav-dropdown__item nav-dropdown__item--last">
							<a href="#" class="nav-dropdown__link">my assessments</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</section>