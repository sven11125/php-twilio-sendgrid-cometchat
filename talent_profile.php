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
				
				<section class="t-portfolio">
					<div class="t-portfolio__top">
						<h2 class="t-portfolio__title">my profile</h2>
						<div class="t-portfolio__nav">
							<div class="t-portfolio__resume">
								<?php if($_SESSION['SiteUser']['talent_resume_url']){ ?>
									<a href="<?php echo getHomeURL.'user_data/resume/'.$_SESSION['SiteUser']['talent_resume_url'] ?>" target="_blank" class="t-portfolio__resume-link">
										<img src="<?php echo getHomeURL ?>slicing/img/resume-icon.png" alt="resume">
									</a>
								<?php } ?>
							</div>
							<div class="select-action">
								<i class="fas fa-bars"></i>
								<div class="select-action__button">
									<p>actions</p>
									<i class="fas fa-sort-down"></i>
								</div>
								<div class="select-action__dropdown">
									<ul class="select-action__list">
										<li class="select-action__item">
											<a href="#" class="select-action__link" data-action="edit">edit profile</a>
										</li>
										<li class="select-action__item">
											<a href="#" class="select-action__link" data-action="save">save changes</a>
										</li>
										<li class="select-action__item">
											<a href="#" class="select-action__link">upload updated CV</a>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="t-profile">
						<div class="t-profile__avatar" id="t-profile__avatar" style="width: 60px; height: 60px;">
							<div class="t-profile__icon">
								<i class="fas fa-user"></i>
							</div>
						</div>
						<label for="upload" class="information__photo-icon">
						<input type="hidden" name="MAX_FILE_SIZE" value="<?php echo avatar_file_size ?>">
						<input type="file"   id="upload" name="avatar" accept=".jpg, .jpeg" style="display:none">		
						<input type="hidden" id="upload-img" name="apload-img">			
						</label>
						<div class="t-profile__content">
							<div class="t-profile__title">
								<h2 class="t-profile__name"><?php echo $_SESSION['SiteUser']['first_name'].' '.$_SESSION['SiteUser']['last_name'] ?></h2>
								<div class="t-portfolio-resume">
									<div class="resume__file">
										<span class="remove-file">x</span>
										<span class="file-name"></span>
									</div>
									<div class="t-portfolio__upload">                            
										<label>
											<img src="<?php echo getHomeURL ?>slicing/img/resume-icon.png" alt="resume">
											<input type="hidden" name="MAX_FILE_SIZE" value="<?php echo resume_file_size ?>">
											<input type="file" id="resume" name="talent_resume_url" accept=".doc, .docx, .pdf" style="display:none">
										</label>             
									</div>
								</div>
							</div>
							<div class="t-profile__location">
								<p>Lives in <?php echo $_SESSION['SiteUser']['employer_state'].' '.$_SESSION['SiteUser']['employer_country'] ?></p>
								<!--<input type="text"   id="reg_form_talent_city_google" name="talent_city_google" placeholder="Start typing your city" required>
								<input type="hidden" id="reg_form_talent_country"     name="talent_country" value="<?php echo $_SESSION['SiteUser']['employer_country'] ?>">
								<input type="hidden" id="reg_form_talent_city"        name="talent_city"    value="<?php echo $_SESSION['SiteUser']['employer_state'] ?>">-->
								<div class="edit-portfolio">
									<i class="fas fa-pencil-alt"></i>
								</div>
							</div>
							<div class="t-profile__contacts">
								<div class="t-profile__contacts-item">
									<i class="fas fa-phone-alt"></i>
									<p><?php echo $_SESSION['SiteUser']['phone'] ?></p>
									<!--<input type="tel" name="phone" placeholder="+12(345)678-9012" id="t-phone" required value="<?php echo $_SESSION['SiteUser']['phone'] ?>" >-->
									<div class="edit-portfolio">
										<i class="fas fa-pencil-alt"></i>
									</div>
								</div>
								<div class="t-profile__contacts-item">
									<i class="fas fa-at"></i>
									<p class="t-profile__email dashboard-info__email--purpule" title='<?php echo $_SESSION['SiteUser']['useremail'] ?>'>
										<?php echo $_SESSION['SiteUser']['useremail'] ?>
									</p>
								</div>
							</div>
							<div class="t-profile__text">
								<p><span class="ttu">CURRENT STATUS:</span><span class="red bold"><?php echo getRegJobSearchName($_SESSION['SiteUser']['talent_searc_where']) ?></span></p>
								<div class="edit-portfolio">
									<i class="fas fa-pencil-alt"></i>
								</div>
							</div>
							<div class="t-profile__text">
								<p>
									Prefers only <span class="red bold">permanent roles</span> <span class="red">at a</span> minumum base salary of 
									<span class="red bold"> <?php echo getCurrencyName($_SESSION['SiteUser']['talent_salary_currency']).' '.$_SESSION['SiteUser']['talent_salary'] ?> /yr</span>
								</p>
								<div class="edit-portfolio">
									<i class="fas fa-pencil-alt"></i>
								</div>
							</div>
							<div class="t-profile__skills">
								<ul class="skills__list"><?php
									echo($_SESSION['SiteUser']['talent_add_exp_1'] ?'<li class="skills__item">'.getUserSkilName($_SESSION['SiteUser']['id'], 1).'</li>' :'');
									echo($_SESSION['SiteUser']['talent_add_exp_2'] ?'<li class="skills__item">'.getUserSkilName($_SESSION['SiteUser']['id'], 2).'</li>' :'');
									echo($_SESSION['SiteUser']['talent_add_exp_3'] ?'<li class="skills__item">'.getUserSkilName($_SESSION['SiteUser']['id'], 3).'</li>' :'');
									echo($_SESSION['SiteUser']['talent_add_exp_4'] ?'<li class="skills__item">'.getUserSkilName($_SESSION['SiteUser']['id'], 4).'</li>' :'');
									echo($_SESSION['SiteUser']['talent_add_exp_5'] ?'<li class="skills__item">'.getUserSkilName($_SESSION['SiteUser']['id'], 5).'</li>' :''); ?>
								</ul>
								<div class="edit-portfolio">
									<i class="fas fa-pencil-alt"></i>
								</div>
							</div>
							<div class="info-list">
								<ul class="info-list__items">
									<li class="info-list__item">
										<div class="info-list__title">
											<div class="info-list__arrow">
												<i class="fas fa-chevron-right"></i>
												<i class="fas fa-pencil-alt"></i>
											</div>
											<h3>wishlist</h3>
											<div class="t-portfolio__content">
												<div class="user-wishlist">
													<p>In priority order:</p>
													<ol>
													
													<?php $arr = getWishListUserArr($_SESSION['SiteUser']['id'], 1);
													if($arr){ ?>
														<li>
															<p>My ideal company would be in the
																<span class="t-wishlist-text"><?php
																	foreach($arr as $arri){
																		echo $arri['name'].'; ';
																	} ?>
																</span>
																industry.
															</p>
														</li>
													<?php } ?>
													
													<?php $arr = getWishListUserArr($_SESSION['SiteUser']['id'], 2);
													if($arr){ ?>
														<li>
															<p>And I'm looking for a company that specializes in
																<span class="t-wishlist-text"><?php
																	foreach($arr as $arri){
																		echo $arri['name'].'; ';
																	} ?>
																</span>
															</p>
														</li>
													<?php } ?>
													
													<?php $arr = getWishListUserArr($_SESSION['SiteUser']['id'], 3);
													if($arr){ ?>
														<li>
															<p>Ideally, I would like to work at a company that has
																<span class="t-wishlist-text"><?php
																	foreach($arr as $arri){
																		echo $arri['name'].'; ';
																	} ?>
																</span>
																employees.
															</p>
														</li>
													<?php } ?>
													
													<?php $arr = getWishListUserArr($_SESSION['SiteUser']['id'], 4);
													if($arr){ ?>
														<li>
															<p>My work would use these top technologies
																<span class="t-wishlist-text"><?php
																	foreach($arr as $arri){
																		echo $arri['name'].'; ';
																	} ?>
																</span>
															</p>
														</li>
													<?php } ?>
													
													<?php $arr = getWishListUserArr($_SESSION['SiteUser']['id'], 5);
													if($arr){ ?>
														<li>
															<p>And I'm looking for a position as a(n)
																<span class="t-wishlist-text"><?php
																	foreach($arr as $arri){
																		echo $arri['name'].'; ';
																	} ?>
																</span>
															</p>
														</li>
													<?php } ?>
													
													<?php $arr = getWishListUserArr($_SESSION['SiteUser']['id'], 6);
													if($arr){ ?>
														<li>
															<p>My top three favourites companies to work for would be
																<span class="t-wishlist-text"><?php
																	foreach($arr as $arri){
																		echo $arri['name'].'; ';
																	} ?>
																</span>
															</p>
														</li>
													<?php } ?>
												</div>
											</div>
										</div>
									</li>
									<li class="info-list__item">
										<div class="info-list__title">
											<div class="info-list__arrow">
												<i class="fas fa-chevron-right"></i>
												<i class="fas fa-pencil-alt"></i>
											</div>
											<h3>location</h3>
											<div class="t-portfolio__content">
												<div class="info-list__block">
													<div class="info-list__content-icon">
														<i class="fas fa-map-marker-alt"></i>
													</div>
													<p><strong>Wants to work in or near the following areas (or remote):</strong></p>
													<p><?php
														$arr = getWantedLocationArr($_SESSION['SiteUser']['id']);
														foreach($arr as $arri){
															echo $arri['utr_country'].', '.$arri['utr_city'].'<br/>';
														} ?>
													</p>
												</div>
											</div>
										</div>
									</li>
									<li class="info-list__item">
										<div class="info-list__title">
											<div class="info-list__arrow">
												<i class="fas fa-chevron-right"></i>
												<i class="fas fa-pencil-alt"></i>
											</div>
											<h3>Experience & Roles</h3>
											<div class="t-portfolio__content">
												<div class="info-list__block">
													<div class="info-list__row first">
														<p><strong>Total: Software Engineering</strong></p>
														<div class="info-list__content-bg">
															<span class="info-list__years val3"><?php echo $_SESSION['SiteUser']['talent_job_experience'] ?></span>
														</div>
													</div>
													<p><strong>In order of proficiency:</strong></p>
													<ol><?php
														$arr = getUserJobsArr($_SESSION['SiteUser']['id']);
														foreach($arr as $arri){ ?>
															<li>
																<div class="info-list__row">
																	<p><?php echo $arri['jd_name'] ?></p>
																	<div class="info-list__content-bg">
																		<span class="info-list__years val2"><?php echo $arri['ujr_job_detail_experience'] ?> years</span>
																	</div>
																</div>
															</li><?php
														} ?>
													</ol>
												</div>
											</div>
										</div>
									</li>
									<li class="info-list__item">
										<div class="info-list__title">
											<div class="info-list__arrow">
												<i class="fas fa-chevron-right"></i>
												<i class="fas fa-pencil-alt"></i>
											</div>
											<h3>Work experience</h3>
											<div class="t-portfolio__content"><?php
												$arr = getUserWorkArr($_SESSION['SiteUser']['id']);
												foreach($arr as $arri){ ?>
													<div class="info-list__block">
														<div class="info-list__content-icon">
															<i class="fas fa-briefcase"></i>
														</div>
														<p><strong><?php echo $arri['we_company'] ?></strong></p>
														<p class="m0"><strong><?php echo $arri['we_title'] ?></strong></p>
														<p><?php echo get_month_name($arri['we_start_month']) ?> <?php echo $arri['we_start_year'] ?> — <?php echo get_month_name($arri['we_and_month']) ?> <?php echo $arri['we_and_year'] ?> </p>
														<p><?php echo $arri['we_description'] ?></p>
													</div><?php
												} ?>
											</div>
										</div>
									</li>
									<li class="info-list__item">
										<div class="info-list__title">
											<div class="info-list__arrow">
												<i class="fas fa-chevron-right"></i>
												<i class="fas fa-pencil-alt"></i>
											</div>
											<h3>Education</h3>
											<div class="t-portfolio__content"><?php
												$arr = getUserEducationArr($_SESSION['SiteUser']['id']);
												foreach($arr as $arri){ ?>
													<div class="info-list__block">
														<div class="info-list__content-icon">
															<i class="fas fa-briefcase"></i>
														</div>
														<p><strong><?php echo $arri['university'] ?></strong></p>
														<p class="m0"><strong><?php echo $arri['degree'] ?></strong></p>
														<p><?php echo $arri['tdur_year'] ?></p>
													</div><?php
												} ?>
												
											</div>
										</div>
									</li>
									<li class="info-list__item">
										<div class="info-list__title">
											<div class="info-list__arrow">
												<i class="fas fa-chevron-right"></i>
												<i class="fas fa-pencil-alt"></i>
											</div>
											<h3>activity</h3>
											</div class="t-portfolio__content"> 
											<!-- <div class="info-list__content">
												<p>Comments list:</p>
												<ol class="acivity-box">
												</ol>
											</div> -->
									</li>
								</ul>
								</div>
							</div>
							<div class="approve-profile">
								<div class="approve-message">
									<div class="message-icon">
										<i class="fas fa-bullhorn"></i>
									</div>
									<p class="approve-message__text">You are about to <span>approve</span> this profile, are you sure?</p>
									<p class="approve-message__text-done">profile approved!</p>
									<div class="approve-buttons">
										<div class="approve-yes">
											<i class="fas fa-check-circle"></i>
										</div>
										<div class="approve-no">
											<i class="fas fa-times-circle"></i>
										</div>
									</div>
								</div>
							</div>
							<div class="suspend-profile suspended">
								<div class="suspend-message">
									<div class="message-icon">
										<i class="fas fa-bullhorn"></i>
									</div>
									<p class="suspend-message__text">You are about to <span>suspend</span>this profile, are you sure?</p>
									<p class="suspend-message__text-done">profile suspended!</p>
									<div class="suspend-buttons">
										<div class="suspend-yes">
											<i class="fas fa-check-circle"></i>
										</div>
										<div class="suspend-no">
											<i class="fas fa-times-circle"></i>
										</div>
									</div>
								</div>
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