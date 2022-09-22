<section class="profile-hero">
	<div class="profile-hero__edit">
		<div class="profile-hero__edit-icon">
			<i class="fas fa-pen"></i>
		</div>
	</div>
	<div class="user">
		<div class="user__icon">
			<img src="<?php echo getHomeURL.'user_data/'.($_SESSION['SiteUser']['avatar'] ?'avatar/'.$_SESSION['SiteUser']['avatar'] :'noimage.png') ?>" alt="avatar" />
		</div>
		<div class="user__title">
			<h1 class="user__name"><?php echo $_SESSION['SiteUser']['first_name'].' '.$_SESSION['SiteUser']['last_name'] ?></h1>
			<h3 class="user__location"><?php echo $_SESSION['SiteUser']['employer_state'].' '.$_SESSION['SiteUser']['employer_country'] ?></h3>
		</div>
	</div>
</section>