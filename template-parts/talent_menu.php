<div class="settings">
	<div class="settings__edit">
		<a href="#">
			<div class="settings__edit-icon">
				<i class="fas fa-plus"></i>
			</div>
		</a>
	</div>
	<div class="settings__list">
		<ul class="settings__items">
			<li class="settings__item <?php echo($pageID=='talent_home.php' ?'active' :'') ?>">
				<a href="<?php echo getHomeURL ?>talent_home.php">
					<i class="fas fa-book"></i>
				</a>
			</li>
			<li class="settings__item <?php echo($pageID=='talent-jobs.php' ?'active' :'') ?>">
				<a href="<?php echo getHomeURL ?>talent-jobs.php">
					<i class="fas fa-briefcase"></i>
				</a>
			</li>
			<li class="settings__item <?php echo($pageID=='talent_profile.php' ?'active' :'') ?>">
				<a href="<?php echo getHomeURL ?>talent_profile.php">
					<i class="fas fa-graduation-cap"></i>
				</a>
			</li>
			<li class="settings__item">
				<a href="#">
					<i class="fas fa-palette"></i>
				</a>
			</li>
			<li class="settings__item">
				<a href="#">
					<i class="fas fa-pencil-ruler"></i>
				</a>
			</li>
		</ul>
	</div>
	<div class="settings__config">
		<div class="settings__item">
			<a href="logout.php">
			<i class="fas fa-cog"></i>
			</a>
		</div>
		<div class="settings__user-icon">
			<img src="<?php echo getHomeURL.'user_data/'.($_SESSION['SiteUser']['avatar'] ?'avatar/'.$_SESSION['SiteUser']['avatar'] :'noimage.png') ?>" alt="Avatar">
		</div>
	</div>
</div>