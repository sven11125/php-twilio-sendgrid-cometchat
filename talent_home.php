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

		<section class="user-profile">
			<div class="container">

				<?php require_once('template-parts/talent_top_head.php') ?>

				<?php require_once('template-parts/talent_menu_home.php') ?>

				<section class="profile-content">
					<div class="talent-resume">
						<div class="biography">
							<div class="biography__box">
								<div class="biography__icon biography__icon--main">
									<i class="fas fa-star"></i>
								</div>
								<div class="biography__content">
									<h3 class="biography__title">Biography</h3>
									<p>Stumptown heirloom laborum, consequat ad butcher green juice prism lorem jean shorts. <a href="#" class="biography__more-link">more…</a></p>
								</div>
							</div>
							
							<div class="biography__line"></div>
							<div class="biography__box">
								<ul class="biography__list"><?php
									$arr = getWorkExpArr($_SESSION['SiteUser']['id']);
									foreach($arr as $arri){ ?>
										<li class="biography__item">
											<div class="biography__text">
												<div class="biography__icon">
													<i class="fas fa-briefcase"></i>
												</div>
												<p><?php echo $arri['we_company'].' Position:'.$arri['we_description'] ?></p>
											</div>
											<div class="biography__dates">
												<p><?php echo $arri['we_start_month'].'-'.$arri['we_start_year'] ?></p>
												<p><?php echo ($arri['we_current'] ?'Present' :$arri['we_and_month'].'-'.$arri['we_and_year']) ?></p>
											</div>
											<div class="dates-line">
												<img src="<?php echo getHomeURL ?>slicing/img/dates-line.png" alt="line">
											</div>
										</li><?php
									} ?>
								</ul>
							</div>
							
							<div class="biography__line"></div>
							<div class="biography__box">
								<ul class="biography__list"><?php
									$arr = getEducationExpArr($_SESSION['SiteUser']['id']);
									foreach($arr as $arri){ ?>
										<li class="biography__item">
											<div class="biography__text">
												<div class="biography__icon">
													<i class="fas fa-graduation-cap"></i>
												</div>
												<p>Studied <?php echo $arri['degree'] ?> in <span class="biography__accent"><?php echo $arri['university'] ?></span> </p>
											</div>
											<div class="biography__dates">
												<p><?php echo $arri['tdur_year'] ?></p>
												<!--<p>01-2004</p>-->
											</div>
											<div class="dates-line">
												<img src="<?php echo getHomeURL ?>slicing/img/dates-line.png" alt="">
											</div>
										</li><?php
									} ?>
								</ul>
							</div>
						</div>
					</div>
					
					<div class="feed" id="feed">
						<div id="tabs-min" class="add-content">
							<form action="<?php echo getHomeURL ?>talent_home.php" id="insert_post_form" method="post" enctype="multipart/form-data">
								<?php echo SiteError($GLOBALS['SiteError']) ?>
								<ul class="add-content__list">
									<li class="add-content__item">
										<a href="#add-post">Create Post</a>
									</li>
									<li class="add-content__item">
										<input type="hidden" name="MAX_FILE_SIZE" value="<?php echo post_file_size ?>">
										<input type="file" onchange="readURL(this);" style="display:none;" name="post_image" id="uploadFile">
										<a href="#uID" id="uploadTrigger">Add photo/video</a>
									</li>
								</ul>
								<div id="add-post" class="add-post">
									<div class="post__avatar">
										<img src="<?php echo getHomeURL.'user_data/'.($_SESSION['SiteUser']['avatar'] ?'avatar/'.$_SESSION['SiteUser']['avatar'] :'noimage.png') ?>" alt="avatar">
									</div>
									<div class="post-box">
										<textarea name="post_content" rows="8" class="add-post__textarea" placeholder="Got news? Share them!"></textarea>
										<div class="post__buttons">
											<input type="hidden" name="insert_post_yn">
											<a href="#" class="post-btn" id="insert_post">post</a>
											<a href="#" class="clear" id="insert_post_reset">Clear</a>
										</div>
									</div>
								</div>
							</form>
						</div>
						
						<h2 class="posts__title">Posts</h2>
						<div class="posts"><?php
							$arr = siteGetArrUserPosts($_SESSION['SiteUser']['id']);
							foreach($arr as $arri){ ?>
								<article class="post">
									<div class="post__header">
										<div class="post__avatar">
											<img src="<?php echo getHomeURL.'user_data/'.($_SESSION['SiteUser']['avatar'] ?'avatar/'.$_SESSION['SiteUser']['avatar'] :'noimage.png') ?>" alt="avatar">
										</div>
										<div class="post__title">
											<h3 class="post__user-name"><?php echo $arri[4].' '.$arri[5] ?></h3>
											<h4 class="post__date"><?php echo $arri[6] ?></h4>
										</div>
									</div>
									<div class="post__text">
										<p><?php echo $arri[2] ?></p><?php
										if($arri[1]){ ?>
											<img src="<?php echo($arri[1] ?getHomeURL.'user_data/post/'.$arri[1] :getHomeURL.'user_data/noimage.png') ?>" alt="post avatar"><?php
										} ?>
									</div>
									<div class="post__footer">
										<div class="post__icon post__icon--like">
											<i class="fas fa-heart"></i>
										</div>
										<div class="post__icon">
											<i class="fas fa-comments"></i>
										</div>
									</div>
								</article><?php
							} ?>
						</div>
					</div>
				</section>
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