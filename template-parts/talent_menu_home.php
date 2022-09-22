<section class="profile-menu">
	<ul class="profile-menu__list">
		<li class="profile-menu__item <?php echo($pageID=='talent_home.php' ?'active' :'') ?>">
			<a href="talent_home.php">hub</a>
		</li>
		<li class="profile-menu__item <?php echo($pageID=='talent_profile.php' ?'active' :'') ?>">
			<a href="talent_profile.php">my profile</a>
		</li>
		<li class="profile-menu__item">
			<a href="#">my media</a>
		</li>
		<li class="profile-menu__item profile-menu__item--accent <?php echo($pageID=='talent-jobs.php' ?'active' :'') ?>">
			<a href="talent-jobs.php">Jobs I
			<i class="fas fa-heart"></i>
			</a>
		</li>
		<li class="profile-menu__item profile-menu__item--light">
			<a href="#" class="disabled">my assessments</a>
		</li>
	</ul>
</section>