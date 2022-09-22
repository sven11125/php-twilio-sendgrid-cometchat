<?php 
require_once('inc/config.php');
require_once('inc/header.php');
require_once('template-parts/logo_menu.php');

$yearArray = range(1950, 2080); ?>
	
<section class="sign-up">
	<div class="sign-up__container">
		<div class="sign-up__options">
			<p>Already have an account? <a href="login-page.php" class="small-link">Log in</a></p>
			<?php //require_once('template-parts/lang_switch.php') ?>
		</div>
		<div class="steps">
			<div class="steps__nav">
				<div class="steps__nav-item" data-nav='1'>
					<div class="steps__logo">
						<img src="<?php echo getHomeURL ?>slicing/img/bitmap.png" alt="logo" />
					</div>
					<div class="steps__menu">
						<ul class="steps__menu-list">
							<li class="steps__menu-item">
								<span class="steps__point" data-step="1">
									<i class="fas fa-check"></i>
								</span>
								<p>Get Started</p>
							</li>
							<li class="steps__menu-item">
								<span class="steps__point" data-step="2">
									<i class="fas fa-check"></i>
								</span>
								<p>Step One: Position</p>
							</li>
							<li class="steps__menu-item">
								<span class="steps__point" data-step="3">
									<i class="fas fa-check"></i>
								</span>
								<p>Step Two: Invite Friends</p>
							</li>
							<li class="steps__menu-item">
								<span class="steps__point" data-step="5">
									<i class="fas fa-check"></i>
								</span>
								<p>Step Three: Salary</p>
							</li>
							<li class="steps__menu-item">
								<span class="steps__point" data-step="6">
									<i class="fas fa-check"></i>
								</span>
								<p>Step Four: Information</p>
							</li>
							<li class="steps__menu-item">
								<span class="steps__point" data-step="7">
									<i class="fas fa-check"></i>
								</span>
								<p>Step Five: Experience</p>
							</li>
							<li class="steps__menu-item">
								<span class="steps__point" data-step="8">
									<i class="fas fa-check"></i>
								</span>
								<p>Submit for Review</p>
							</li>
						</ul>
					</div>
				</div>
				<div class="steps__nav-item" data-nav='2' style="display: none;">
					<div class="steps__nav--employer" style='background-image: url("<?php echo getHomeURL ?>slicing/img/employer-menu2.png");'></div>
				</div>
				<div class="steps__nav-item" data-nav='3' style="display: none;">
					<div class="steps__nav--recruter" style='background-image: url("<?php echo getHomeURL ?>slicing/img/were-hiring.png");'></div>
				</div>
			</div>
			<div class="steps__form-box">
				<div class="tabs" id="tabs">
					<ul class="tabs__navigation-list">
						<li class="tabs__navigation-item">
							<a href="#tabs-1" class="tabs__navigation-link">TALENT</a>
						</li>
						<li class="tabs__navigation-item <?php echo(isset($GLOBALS['get_imployer_google_fname']) || isset($GLOBALS['get_employer_fb_fname']) ?'ui-tabs-active' :'') ?>">
							<a href="#tabs-2" class="tabs__navigation-link">EMPLOYER</a>
						</li>
						<li class="tabs__navigation-item <?php echo(isset($GLOBALS['get_recruiter_google_fname']) || isset($GLOBALS['get_recruiter_fb_fname']) ?'ui-tabs-active' :'') ?>">
							<a href="#tabs-3" class="tabs__navigation-link">RECRUITER</a>
						</li>
					</ul>
					<div class="tab-container" id="tabs-1">
						<form class="form__talent" id="reg_talent_form" action="<?php echo getHomeURL ?>login-page.php" method="post" enctype="multipart/form-data">
							<div class="tab tab-1">
								<div class="tabs__title">
									<h2>We Bring Job Offers to You</h2>
									<p>Join thousands of people who’ve found their dream job using Wona.</p>
								</div>
								<div class="social-links">
									<div class="social-links__item social-links__item--facebook">
										<a href="<?php echo auth_fb_talent_url ?>" class="social-link" name="facebook">
										<i class="fab fa-facebook-f"></i>
										<span>Sign Up</span>
										</a>
									</div>
									<div class="social-links__item social-links__item--google">
										<a href="<?php echo auth_google_reg_talent_url ?>" class="social-link" name="google">
										<i class="fab fa-google"></i>
										<span>Sign Up</span>
										</a>
									</div>
									<!--<div class="social-links__item social-links__item--in">
										<a href="#" class="social-link" name="in">
										<i class="fab fa-linkedin-in"></i>
										<span>Sign Up</span>
										</a>
									</div>-->
								</div>
								<div class="delimiter">
									<div class="line"></div>
									<p>or</p>
									<div class="line"></div>
								</div>
								<div class="contact-form" id="talent-contact-form">
									<label>
										First Name<?php
										$first_name = $GLOBALS['get_talent_google_fname'] ?? $GLOBALS['get_talent_fb_fname'] ?? ''; ?>
										<input type="text" name="first_name" placeholder="First Name" id="t-first-name"  required  <?php echo($first_name ?'value="'.$first_name.'" readonly="readonly"' :'') ?>>
									</label>
									<label>
										Last Name<?php
										$last_name = $GLOBALS['get_talent_google_lname'] ?? $GLOBALS['get_talent_fb_lname'] ?? ''; ?>
										<input type="text" name="last_name" placeholder="Last Name" id="t-last-name" required <?php echo($last_name ?'value="'.$last_name.'" readonly="readonly"' :'') ?>>
									</label>
									<label>
										Email<?php
										$useremail = $GLOBALS['get_talent_google_email'] ?? $GLOBALS['get_talent_fb_email'] ?? ''; ?>
										<input type="email" name="useremail" id="t-email" placeholder="you@example.com" required <?php echo($useremail ?'value="'.$useremail.'" readonly="readonly"' :'') ?> pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$">         
									</label>
									<label>
										Password
										<input type="password" name="password" id="t-password" required>
									</label>
									<label>
										Mobile
										<input type="tel"   name="phone" placeholder="+12(345)678-9012" id="t-phone" required/>
									</label>
									<label>
										City
										<input type="text"   id="reg_form_talent_city_google" name="talent_city_google" placeholder="Start typing your city" required>
										<input type="hidden" id="reg_form_talent_country"     name="talent_country">
										<input type="hidden" id="reg_form_talent_city"        name="talent_city">
									</label>
									<div class="contact-form__agreement">
										<label class="form__checkbox">
											<input type="checkbox" id="t-agree-conditions" required/>
											<span class="main-checkbox"></span>
											<span>By signing up, you agree to Wona’s <a href="https://wona.io/privacy-policy/" target="_blank" class="link link--small">Terms of Service</a> and <a href="https://wona.io/privacy-policy/" target="_blank" class="link link--small">Privacy Policy</a> , which outline your rights and obligations with respect to your use of the Service and procesing of your data.</span>
										</label>
										<label class="form__checkbox">
											<input type="checkbox" name="email_receive_subsequent" id="t-agree-email" />
											<span class="main-checkbox"></span>
											<span>You agree to receive subsequent email and third-party communications, which you may opt out of, or unsubscribe from, at any time.</span>
										</label>
									</div>
								</div>
								<div class="form__button">
									<button type="button" class="btn nextBtn" data-step="1" id="email_check_talent" data-nav="toggle">Get Started</button>
								</div>
							</div>
							<div class="tab tab-2">
								<div class="position">
									<div class="position__item">
										<div class="position__title">
											<h3>position</h3>
										</div>
										<div class="position__box">
											<h5 class="position__subtitle">What type of position do you currently have?</h5>
											<select class="form-select" name="talent_job" id='talent-job'><?php
												$arr = getArrpos();
												foreach($arr as $arri){
													echo'<option value="'.$arri[0].'">'.$arri[1].'</option>';
												} ?>
											</select>
											<h5 class="position__subtitle">What are your top specialities?</h5>
											<p>Choose up to three:</p><?php
											$arr = getArrpos();
											foreach($arr as $arri){ ?>
												<ul class="position__specialities" data-val="<?php echo $arri[0] ?>"><?php
													$arrd = getArrposDetail($arri[0]);
													foreach($arrd as $arrdi){
														echo'<li class="position__specialities-item" data-speciality="'.$arrdi[0].'">
																<label class="form__checkbox">
																	<input type="checkbox" name="job_detail[]" value="'.$arrdi[0].'">
																	<span class="main-checkbox"></span>
																	<span>'.$arrdi[2].'</span>
																</label>
															</li>';
													} ?>
												</ul><?php
											} ?>
											<ul id="specialities-list" style="display: none;"><?php
												$arr = getArrposDetailAll();
												foreach($arr as $arri){
													echo'<li class="position__rank-item" data-speciality="'.$arri[0].'">
															<div class="position__rank-title">
																<span class="position__rank-number"></span>
																<span>'.$arri[2].'</span>
															</div>
															<input type="hidden" name="" class="hedden-value">
															<select class="form-select">
																<option value="1-5" data-val="1">1-5 years</option>
																<option value="4-6" data-val="2">4-6 years</option>
																<option value="6-10" data-val="3">6-10 years</option>
															</select>
														</li>';
												} ?>
											</ul>
											<h5>Rank your specialties and add yours of experience:</h5>
											<p>1 = highest proficiency lever, 3 = lowest proficiency level</p>
											<div class="position__rank">
												<div class="position__rank-default">
													<p>Total: <span id='t-role'>Software Engineering</p>
													<input type="hiden" name="talent_job_experience" id="total-experience">
													<span id='experience-years'>1-5 years</span>
												</div>
												<ul class="position__rank-list"></ul>
											</div>
										</div>
									</div>
									<div class="position__item">
										<div class="position__title">
											<h3>skills</h3>
										</div>
										<div class="position__box">
											<h5 class="position__subtitle">Rank your top 5 frameworks, languages and skills:</h5>
											<p>1 = highest proficiency level, 5 = lowest proficiency level Employers may test your proficiency.</p>
											<script>
												var words = [<?php
													$arr = getArrposDetailDopAll();
													foreach($arr as $arri){
														echo "'".htmlspecialchars($arri['jda_name'])."',";
													} ?>];
											</script>
											<div class="skills">
												<div class="skills__user">
													<ul class="skills__user-list" id="sort-user-skills">
														<li class="skills__user-item input">
															<span class="drag-icon my-handle"><img src="<?php echo getHomeURL ?>slicing/img/drag_handle.svg" alt="drag"></span>
															<span class="skills__rank"></span>
															<span class="skills__value"></span>
															<div class="skills__select-value">
																<div class="skills__select">
																	<input type="text" class="skills-src" name="talent_add_exp_1" placeholder="Add...">
																</div>
																<ul class="skills-select__items skills-res"></ul>
															</div>
															<span class="skills__remove">x</span>
														</li>
														<li class="skills__user-item empty">
															<span class="drag-icon my-handle"><img src="<?php echo getHomeURL ?>slicing/img/drag_handle.svg" alt="drag"></span>
															<span class="skills__rank"></span>
															<span class="skills__value"></span>
															<div class="skills__select-value">
																<div class="skills__select">
																	<input type="text" class="skills-src" name="talent_add_exp_2" placeholder="Add...">
																</div>
																<ul class="skills-select__items skills-res"></ul>
															</div>
															<span class="skills__remove">x</span>
														</li>
														<li class="skills__user-item empty">
															<span class="drag-icon my-handle"><img src="<?php echo getHomeURL ?>slicing/img/drag_handle.svg" alt="drag"></span>
															<span class="skills__rank"></span>
															<span class="skills__value"></span>
															<div class="skills__select-value">
																<div class="skills__select">
																	<input type="text" class="skills-src" name="talent_add_exp_3" placeholder="Add...">
																</div>
																<ul class="skills-select__items skills-res"></ul>
															</div>
															<span class="skills__remove">x</span>
														</li>
														<li class="skills__user-item empty">
															<span class="drag-icon my-handle"><img src="<?php echo getHomeURL ?>slicing/img/drag_handle.svg" alt="drag"></span>
															<span class="skills__rank"></span>
															<span class="skills__value"></span>
															<div class="skills__select-value">
																<div class="skills__select">
																	<input type="text" class="skills-src" name="talent_add_exp_4" placeholder="Add...">
																</div>
																<ul class="skills-select__items skills-res"></ul>
															</div>
															<span class="skills__remove">x</span>
														</li>
														<li class="skills__user-item empty">
															<span class="drag-icon my-handle"><img src="<?php echo getHomeURL ?>slicing/img/drag_handle.svg" alt="drag"></span>
															<span class="skills__rank"></span>
															<span class="skills__value"></span>
															<div class="skills__select-value">
																<div class="skills__select">
																	<input type="text" class="skills-src" name="talent_add_exp_5" placeholder="Add...">
																</div>
																<ul class="skills-select__items skills-res"></ul>
															</div>
															<span class="skills__remove">x</span>
														</li>
													</ul>
												</div>
												<div class="skills__offer">
													<h5 class="position__subtitle">Other candidates like you have added these skills. Do you have these in demand skills?</h5><?php
													$i = 0;
													$arr = getArrpos();
													foreach($arr as $arri){
														$arrd = getArrposDetailDopAll($arri[0]); ?>
														<ul class="skills__offer-list <?php echo($i++ == 0 ?'active' :'') ?>" data-val="<?php echo $arri[0] ?>"><?php
															foreach($arrd as $arrii){ ?>
																<li class="skills__offer-item talent_jda_add" data-jda_id="<?php echo $arrii['jda_id'] ?>" data-jda_name="<?php echo $arrii['jda_name'] ?>">
																	+&nbsp;<?php echo $arrii['jda_name'] ?>
																</li><?php
															} ?>
														</ul><?php
													} ?>
												</div>
											</div>
										</div>
									</div>
									<div class="position__item">
										<div class="position__title">
											<h3>status</h3>
										</div>
										<div class="position__box">
											<h5 class="position__subtitle">What type of employment are you seeking?</h5>
											<ul class="position__status" id="employment-type">
												<li class="position__status-item">
													<label class="form__checkbox">
													<input type="checkbox" name="talent_employ_type_1">
													<span class="main-checkbox"></span>
													<span>Permanent (full-time)</span>
													</label>
												</li>
												<li class="position__status-item">
													<label class="form__checkbox">
													<input type="checkbox" name="talent_employ_type_2">
													<span class="main-checkbox"></span>
													<span>Contract</span>
													</label>
												</li>
												<li class="position__status-item">
													<label class="form__checkbox">
													<input type="checkbox" name="talent_employ_type_3">
													<span class="main-checkbox"></span>
													<span>Intern</span>
													</label>
												</li>
											</ul>
											<h5 class="position__subtitle">Where are you in your job search?</h5>
											<ul class="position__status" id="searchType"><?php
												$i=0;
												$arr = getRegJobSearchArr();
												foreach($arr as $arri){ ?>
													<li class="position__status-item">
														<label class="form__checkbox">
															<input type="radio" name="talent_searc_where" value="<?php echo $arri['uij_id'] ?>" <?php echo($i++==0 ?'checked="checked"' :'') ?>>
															<span class="main-radio-checkbox"></span>
															<span class='form__checkbox-text'><?php echo $arri['uij_name'] ?></span>
														</label>
													</li><?php
												} ?>
											</ul>
											<h5 class="position__subtitle">What's your ideal start date?</h5>
											<label for="#start-date" class="start-date">
											<input type="text" id="start-date" name="talent_start_date">
											<span class="start-date__img">
											<i class="fas fa-calendar-alt"></i>
											</span>
											</label>
										</div>
									</div>
									<div class="position__item">
										<div class="position__title">
											<h3>location</h3>
										</div>
										<div class="position__box">
											<h5 class="position__subtitle">Are you interested in working remotely?</h5>
											<ul class="position__status flex" id="remotely">
												<li class="position__status-item">
													<label class="form__checkbox">
														<input type="radio" name="talent_remote" value="0" checked>
														<span class="main-radio-checkbox"></span>
														<span>Yes</span>
													</label>
												</li>
												<li class="position__status-item">
													<label class="form__checkbox">
														<input type="radio" name="talent_remote" value="1">
														<span class="main-radio-checkbox"></span>
														<span>No</span>
													</label>
												</li>
												<li class="position__status-item">
													<label class="form__checkbox">
														<input type="radio" name="talent_remote" value="2">
														<span class="main-radio-checkbox"></span>
														<span>Remote Only</span>
													</label>
												</li>
											</ul>
											<h5 class="position__subtitle">Where do you want to work?</h5>
											<div id="reg_form_employer_want_location_box"></div>
											<label>
												<input type="text"   id="reg_form_talant_wantloc_google" placeholder="Enter a City">
												<input type="hidden" id="reg_form_talant_wantloc_country">
												<input type="hidden" id="reg_form_talant_wantloc_city">
											</label>
											<h5 class="position__subtitle">European Union work authorization?</h5>
											<p>Do you have valid immigration permission to work in this country?</p>
											<ul class="position__status flex" id="authorization">
												<li class="position__status-item">
													<label class="form__checkbox">
													<input type="radio" name="talent_europe_auth" value="1" checked>
													<span class="main-radio-checkbox"></span>
													<span>Yes</span>
													</label>
												</li>
												<li class="position__status-item">
													<label class="form__checkbox">
													<input type="radio" name="talent_europe_auth" value="0">
													<span class="main-radio-checkbox"></span>
													<span>No</span>
													</label>
												</li>
											</ul>
											<h5 class="position__subtitle">Will you require assistance from your prospective employer in order to obtain an immigration permission to work in this country?</h5>
											<ul class="position__status flex" id="immigration-permission">
												<li class="position__status-item">
													<label class="form__checkbox">
													<input type="radio" name="talent_immigration_help" value="1" checked>
													<span class="main-radio-checkbox"></span>
													<span>Yes</span>
													</label>
												</li>
												<li class="position__status-item">
													<label class="form__checkbox">
													<input type="radio" name="talent_immigration_help" value="0">
													<span class="main-radio-checkbox"></span>
													<span>No</span>
													</label>
												</li>
											</ul>
										</div>
									</div>
								</div>
								<div class="form__buttons">
									<a class="btn prevBtn" data-nav="toggle">Back</a>
									<button type="button" class="btn nextBtn" data-step="2">Next</button>
								</div>
							</div>
							<div class="tab tab-3">
								<div class="invite">
									<div class="invite__title">
										<!-- <h2>Earn <span class="accent">$1000</span> by sharing Wona</h2> -->
										<h2>Your chance to win an Asus Zen Book</h2>
										<p>Invite software engineers, data scientists, designers and product managers — you’ll earn $1000 for every friend that lands a job.</p>
									</div>
									<div class="invite__emails">
										<input type="email" class="invite__email" name="talent_sharing_mail_1" placeholder="Enter email address">
										<input type="email" class="invite__email" name="talent_sharing_mail_2" placeholder="Enter email address" disabled>
										<input type="email" class="invite__email" name="talent_sharing_mail_3" placeholder="Enter email address" disabled>
										<input type="email" class="invite__email" name="talent_sharing_mail_4" placeholder="Enter email address" disabled>
										<input type="email" class="invite__email" name="talent_sharing_mail_5" placeholder="Enter email address" disabled>
									</div>
									<div class="invite__total">
										<!-- <p>Total: <span class="total-earn accent">$0</span></p> -->
										<p>Number of chances to win <span class="total-earn accent"></span></p>
										<input type="hidden" id='total-earn'>
									</div>
								</div>
								<div class="form__buttons">
									<a class="btn prevBtn">Back</a>
									<a class="btn nextBtn" data-step="3">Next</a>
								</div>
							</div>
							<div class="tab tab-4">
								<div class="salary">
									<div class="salary__title">
										<h2>Wishlist</h2>
									</div>
									<div class="wishlist">
										<p>Tell us what is important to you and rank them: 1= highest importance, 5= lowest importance.</p>
										<ul class="wishlist__list">
											<li class="wishlist__item">
												<span class="wishlist__number">#1</span>
												<div class="t-wishlist__text" id='talent_wishlist_1'>	
													<p>My ideal company would be in the</p> 
													<div class='wishlist__selected-input'>
														<input type="text" class="wishlist-selected-input selected-industry" placeholder="select an option">
														<div class="wishlist__selected-dropdown selected-industry-list">
															<?php search_talent_wishlist('a', 1) ?>
														</div>
													</div>
													<p>industry</p>
												</div>
											</li>
											<li class="wishlist__item">
												<span class="wishlist__number">#2</span>
												<div class="t-wishlist__text" id='talent_wishlist_2'>	
													<p>And I'm looking for a company that specializes in</p> 
													<div class='wishlist__selected-input'>
														<input type="text" class="wishlist-selected-input selected-specializes" placeholder="select an option">
														<div class="wishlist__selected-dropdown selected-specializes-list">
															<?php search_talent_wishlist('a', 2) ?>
														</div>
													</div>
												</div>
											</li>
											<li class="wishlist__item">
												<span class="wishlist__number">#3</span>
												<div class="t-wishlist__text" id='talent_wishlist_3'>	
													<p>Ideally, I would like to work at a company that has</p> 
													<div class='wishlist__selected-input'>
														<input type="text" class="wishlist-selected-input selected-employees" placeholder="select an option">
														<div class="wishlist__selected-dropdown selected-employees-list">
															<?php search_talent_wishlist('1', 3) ?>
														</div>
													</div>
													<p>employees</p>
												</div>
											</li>
											<li class="wishlist__item">
												<span class="wishlist__number">#4</span>
												<div class="t-wishlist__text" id='talent_wishlist_4'>	
													<p>My work would use these top technologies</p> 
													<div class='wishlist__selected-input'>
														<input type="text" class="wishlist-selected-input selected-technologies" placeholder="select an option">
														<div class="wishlist__selected-dropdown selected-technologies-list">
															<?php search_talent_wishlist('a', 4) ?>
														</div>
													</div>
												</div>
											</li>
											<li class="wishlist__item">
												<span class="wishlist__number">#5</span>
												<div class="t-wishlist__text" id='talent_wishlist_5'>	
													<p>And I'm looking for a position as a(n)</p> 
													<div class='wishlist__selected-input'>
														<input type="text" class="wishlist-selected-input selected-position" placeholder="select an option">
														<div class="wishlist__selected-dropdown selected-position-list">
															<?php search_talent_wishlist('a', 5) ?>
														</div>
													</div>
												</div>
											</li>
											<li class="wishlist__item">
												<span class="wishlist__number">#6</span>
												<div class="t-wishlist__text" id='talent_wishlist_6'>	
													<p>My top three favourites companies to work for would be</p> 
													<div class='wishlist__selected-input'>
														<input type="text" class="wishlist-selected-input  edu_company" placeholder="select an option">
														<div class="wishlist__selected-dropdown companyList">
															<?php search_talent_wishlist('a', 6) ?>
														</div>
													</div>
												</div>
											</li>
										</ul>
									</div>
								</div>
								<div class="form__buttons">
									<a class="btn prevBtn">Back</a>
									<a class="btn nextBtn" data-step="4">Next</a>
								</div>
							</div>
							<div class="tab tab-5">
								<div class="position">
									<div class="position__item">
										<div class="position__title">
											<h3>salary expectations</h3>
										</div>
										<div class="position__box">
											<h5 class="position__subtitle">What is your salary expectation from new role?</h5>
											<div class="choose-salary select-input">
												<select class="form-select" name="talent_salary_currency" id="t-currency"><?php
													$arr = getCurrencyArr();
													foreach($arr as $arri){
														echo '<option value="'.$arri['cur_id'].'">'.htmlspecialchars($arri['cur_name']).'</option>';
													} ?>
												</select>
												<input type="text" name="talent_salary" placeholder="30 000" id='t-salary'>
											</div>
											<p>We recommend indicating base salary only. Other income factors, such as equity or bonus, can be discussed directly with employers once you receive your first interview request.</p>
											<div class="choose-salary__graph">
												<img src="<?php echo getHomeURL ?>slicing/img/graph.png" alt="graph" />
											</div>
										</div>
									</div>
								</div>
								<div class="form__buttons">
									<a class="btn prevBtn">Back</a>
									<a class="btn nextBtn" data-step="5">Next</a>
								</div>
							</div>
							<div class="tab tab-6">
								<div class="position">
									<div class="position__item">
										<div class="position__title">
											<h3>information</h3>
										</div>
										<div class="position__box">
											<div class="information__photo">
												<div class="cropme" id="landscape" style="width: 100px; height: 100px;"></div>
												<label for="upload" class="information__photo-icon">
												<input type="hidden" name="MAX_FILE_SIZE" id="avatar_file_size" value="<?php echo avatar_file_size ?>" />
												<input type="file"   id="upload" name="avatar" accept=".jpg, .jpeg" style="display:none">		
												<input type="hidden" id="upload-img" name="apload-img">			
												</label>
												<div class="information__photo-text">
													<p>Adding a photo will help your profile get noticed. It doesn’t have to be a photo of your face, it can be anything that represents you.</p>
													<p>(optional)</p>
												</div>
											</div>
											<div class="information__form" id="talent-contact-form">
												<label class="information__contacts">
													<p>Full Name</p>
													<input type="text" placeholder="First and Last Name" data-val="t-full-name" readonly>
												</label>
												<label class="information__contacts">
													<p>Email</p>
													<input type="email" placeholder="you@example.com" data-val='t-email' readonly>
												</label>
												<label class="information__contacts">
													<p>Phone (Required)</p>
													<div class="select-input">
														<input type="tel" data-val='t-phone' readonly>
													</div>
												</label>
											</div>
										</div>
									</div>
									<div class="position__item">
										<div class="position__title">
											<h3>links</h3>
										</div>
										<div class="position__box">
											<ul class="information__links">
												<li class="information__link-item">
													<h5 class="position__subtitle">LinkedIn Profile URL: <span>(Optional)</span></h5>
													<input type="text" name="talent_url_lin" placeholder="http://www.linkedin.com/in/myusername" />
													<p>Visit your LinkedIn profile and copy the URL in your broser to get your profile link</p>
												</li>
												<li class="information__link-item">
													<h5 class="position__subtitle">Portfolio/Personal Website: <span>(Optional)</span></h5>
													<input type="text" name="talent_url_portfolio" placeholder="http://example.com" />
												</li>
												<li class="information__link-item">
													<h5 class="position__subtitle">Enter Portfolio password<span>(if you don’t have one, leave blank.)</span></h5>
													<input type="text" name="talent_url_portfolio_pass" placeholder="Enter your portfolio password" />
													<p>We will share this information with employers</p>
												</li>
												<li class="information__link-item">
													<h5 class="position__subtitle">GitHub URL: <span>(Optional)</span></h5>
													<input type="text" name="talent_url_github" placeholder="http://example.com" />
												</li>
											</ul>
										</div>
									</div>
								</div>
								<div class="form__buttons">
									<a class="btn prevBtn">Back</a>
									<a class="btn nextBtn" data-step="6">Next</a>
								</div>
							</div>
							<div class="tab tab-7">
								<div class="resume">
									<div class="resume-btn">
										<label class="btn">upload resume
										<input type="hidden" name="MAX_FILE_SIZE" id="resume_file_size" value="<?php echo resume_file_size ?>" />
										<input type="file" id="resume" name="talent_resume_url" accept=".doc, .docx, .pdf" style="display:none">
										</label>
										<div class="resume__file">
											<span class="file-name"></span>
											<span class="remove-file">x</span>
										</div>
									</div>
									<div class="position__item">
										<div class="position__title">
											<h3>work experience</h3>
										</div>
										<div class="position__box talent_list_we" id="t-work-experience">
											<div class="resume__item">
												<h5 class="position__subtitle">Company name:</h5>
												<input type="text" name="talent_workexp_company[]" placeholder="Enter the name of the company." class='t-work-company'/>
											</div>
											<div class="resume__item">
												<h5 class="position__subtitle">Your title:</h5>
												<input type="text" name="talent_workexp_title[]" placeholder="Enter your title at this company" class='t-work-role'/>
											</div>
											<div class="resume__item">
												<h5 class="position__subtitle">Started:</h5>
												<div class="resume__columns">
													<div class="resume__column">
														<select class="form-select t-work-start-mo" name="talent_workexp_start_month[]">
															<option value="0">Month</option>
															<option value="1">January</option>
															<option value="2">February</option>
															<option value="3">March </option>
															<option value="4">April</option>
															<option value="5">May</option>
															<option value="6">June</option>
															<option value="7">July</option>
															<option value="8">August</option>
															<option value="9">September</option>
															<option value="10">October</option>
															<option value="11">November</option>
															<option value="12">December</option>
														</select>
													</div>
													<div class="resume__column">
														<select class="form-select t-work-start-year" name="talent_workexp_start_year[]">
															<option value="">Year</option>
															<?php
																foreach($yearArray as $yearArrayI){
																	echo '<option '.($yearArrayI==date('Y') ?'selected' :'').' value="'.$yearArrayI.'">'.$yearArrayI.'</option>';
																} ?>
														</select>
													</div>
												</div>
											</div>
											<div class="resume__item">
												<h5 class="position__subtitle">Ended:</h5>
												<div class="resume__columns">
													<div class="resume__column">
														<select class="form-select t-work-end-mo" name="talent_workexp_and_month[]">
															<option value="0">Month</option>
															<option value="1">January</option>
															<option value="2">February</option>
															<option value="3">March </option>
															<option value="4">April</option>
															<option value="5">May</option>
															<option value="6">June</option>
															<option value="7">July</option>
															<option value="8">August</option>
															<option value="9">September</option>
															<option value="10">October</option>
															<option value="11">November</option>
															<option value="12">December</option>
														</select>
													</div>
													<div class="resume__column">
														<select class="form-select t-work-end-year" name="talent_workexp_and_year[]">
															<option value="">Year</option>
															<?php
																foreach($yearArray as $yearArrayI){
																	echo '<option '.($yearArrayI==date('Y') ?'selected' :'').' value="'.$yearArrayI.'">'.$yearArrayI.'</option>';
																} ?>
														</select>
													</div>
												</div>
											</div>
											<div class="resume__item current-position">
												<label class="form__checkbox">
													<input type="checkbox" name="talent_workexp_corrent[]">
													<span class="main-checkbox"></span>
													<p>I currently work here.</p>
												</label>
											</div>
											<div class="resume__item">
												<h5 class="position__subtitle">Description:</h5>
												<textarea class="resume__user-description t-work-comment" maxlength="600" name="talent_workexp_descript[]" rows="8" placeholder="Skills or technologies you used in this position"></textarea>
											</div>
											<div class="remove-item">
												<p>Remove company</p>
											</div>
										</div>
										<div class="plus-btn plus-btn-exp" id="add-work-experianse">
											<i class="fas fa-plus"></i>
										</div>
									</div>
									<div class="position__item">
										<div class="position__title">
											<h3>education</h3>
										</div>
										<div class="position__box talent_list_edu"  id="t-education">
											<p class="position__box__comment">Enter «self taught» if you have no formal education.</p>
											<div class="resume__item">
												<div class="resume__columns">
													<div class="resume__column resume__column--allwidth resume-university">
														<h5 class="position__subtitle">University / College:</h5>
														<input type="hidden" name="talent_eduexp_id[]">
														<input type="text" name="talent_eduexp_name[]" placeholder="Enter the name of your university" class="t-institut edu_univer">
														<div class="eduList"></div>
													</div>
													<div class="resume__column">
														<h5 class="position__subtitle">Graduation year:</h5>
														<select class="form-select t-instiyut-year" name="talent_eduexp_year[]">
															<option>Year</option><?php
															foreach($yearArray as $yearArrayI){
															  echo '<option '.($yearArrayI==date('Y') ?'selected' :'').' value="'.$yearArrayI.'">'.$yearArrayI.'</option>';
															} ?>
														</select>
													</div>
												</div>
											</div>
											<div class="resume__item resume-degree">
												<h5 class="position__subtitle">Degree:</h5>
												<input type="hidden" name="talent_eduexp_degree_id[]">
												<input type="text" name="talent_eduexp_degree[]" placeholder="Example: B.S. in Engineering" class='t-speciality edu_degree'/>
												<div class="degreeList"></div>
											</div>
											<div class="remove-item">
												<p>Remove</p>
											</div>
										</div>
										<div class="plus-btn plus-btn-edu" id="add-education">
											<i class="fas fa-plus"></i>
										</div>
									</div>
								</div>
								<div class="form__buttons">
									<a class="btn prevBtn">Back</a>
									<a class="btn nextBtn" data-step="7">Next</a>
								</div>
							</div>

							<div class="tab tab-8">
								<div class="review__header"></div>
								<div class="review">
									<div class="review__item">
										<div class="review__title">
											<div class="review__photo">
												<img src="<?php echo getHomeURL ?>slicing/img/user-icon.png" alt="photo" />
											</div>
											<div class="review__contact">
												<h3 class="review__contact-name" data-val="t-full-name"><span data-val='t-first-name'>Pavel</span>&nbsp;&nbsp;<span data-val="t-last-name">Rashkin</span></h3>
												<p data-val='reg_form_talent_city_google'></p>
											</div>
										</div>
									</div>
									<div class="review__item">
										<div class="review__speciality">
											<h3 class="review__speciality-title"> <span data-val='t-work-role'> Designer</span> at <span data-val="t-work-company">ABC</span></h3>
											<ul class="review__preference">
												<li class="review__preference-item">
													<p>Prefers only permanent roles at a minumum base salary of <span data-val="t-currency"></span><span data-val='t-salary'></span> /yr</p>
												</li>
											</ul>
										</div>
									</div>
									<div class="review__item">
										<div class="review__search-status">
											<h5 class="review__search-status__title">Job search status:</h5>
											<p data-val='search-type'>Ready to interview and actively searching</p>
										</div>
									</div>
									<div class="review__item">
										<div class="review__contacts">
											<p><span data-val='t-phone'>+7 999 111-22-22</span>Email&nbsp<span data-val='t-email'></span></p>
										</div>
									</div>
									<div class="review__item">
										<div class="review__wishlist">
											<h3 class="review__subtitle"><span data-val='t-first-name'></span>’s Wishlist</h3>
											<p>In priority order:</p>
											<ol class="review__wishlist__list">
												<li class="review__wishlist__item">
													My ideal company would be in the
													<strong data-val='talent_wishlist_1'></strong>
													industry
												</li>
												<li class="review__wishlist__item">
													And I'm looking for a company that specializes in <strong data-val='talent_wishlist_2'></strong>
												</li>
												<li class="review__wishlist__item">
													Ideally, I would like to work at a company that has
													<strong data-val="talent_wishlist_3"></strong>
													employees
												</li>
												<li class="review__wishlist__item">
													My work would use these top technologies
													<strong data-val="talent_wishlist_4"></strong>
												</li>
												<li class="review__wishlist__item">
													And I'm looking for a position as a(n)
													<strong data-val="talent_wishlist_5"></strong>
												</li>
												<li class="review__wishlist__item">
													My top three favourites companies to work for would be
													<strong data-val="talent_wishlist_6"></strong>
												</li>
											</ol>
										</div>
									</div>
									<div class="review__item">
										<div class="review__location">
											<h3 class="review__subtitle">location</h3>
											<div class="review__location__content">
												<h5 class="review__location__title">Wants to work in or near the following areas (or remote):</h5>
												<div id="t-work-locations"></div>
											</div>
										</div>
									</div>
									<div class="review__item">
										<div class="review__primary-area">
											<h3 class="review__subtitle">primary area of expertise</h3>
											<div class="review__primary-area__list">
											</div>
										</div>
									</div>
									<div class="review__item">
										<div class="review__experience">
											<h3 class="review__subtitle">experience & roles</h3>
											<div class="review__experience__total">
												<h5 class="review__experience__title">
													Total: <span data-val="t-role">Software Engineering</span>
												</h5>
												<div class="review__experience__column">
													<div class="review__experience__years" data-size="5">
														<p data-val="total-experience">1-5 years</p>
													</div>
												</div>
											</div>
											<h5 class="review__experience__title">In order of proficiency:</h5>
											<ol class="review__experience__list"></ol>
										</div>
									</div>
									<div class="review__item">
										<div class="review__work-exp" id='review__work-exp-box'>
											<div class="review__work-exp__title">
												<h3 class="review__subtitle">work experience</h3>
											</div>
											<div class="review__work-exp__content" id='t-review__work-exp'></div>
										</div>
									</div>
									<div class="review__item">
										<div class="review__work-exp" id="review__edu-box">
											<div class="review__work-exp__title">
												<h3 class="review__subtitle">education</h3>
											</div>
											<div class="review__work-exp__content" id="t-review__edu"></div>
										</div>
									</div>
									<div class="review__item">
										<div class="review__expect">
											<h3 class="review__subtitle">Clear hear to view your profile</h3>
											<!-- <div class="review__expect__content">
												<p>We’ll review your profile to check if we have jobs that match your skill set and experience. If we do, your profile will start being promoted to employers as soon as 1-3 business days.</p>
												</div> -->
										</div>
									</div>
								</div>
								<div class="form__buttons">
									<a class="btn prevBtn">Back</a>
									<input type="hidden" name="reg_talent_form_yn">
									<a href="#uID" id="reg_talent_form_submit" class="btn signup-submit">My Profile</a>
								</div>
							</div>
						</form>
					</div>
					<div class="tab-container active" id="tabs-2">
						<form class="form__employer" id="reg_employer_form" action="<?php echo getHomeURL ?>login-page.php" method="post">
							<div class="tab">
								<div class="tabs__title">
									<h2>We’ll bring you the best!</h2>
									<p>Hire better tech talent, faster. Sign up to get started.</p>
								</div>
								<div class="social-links">
									<div class="social-links__item social-links__item--facebook">
										<a href="<?php echo auth_fb_employer_url ?>" class="social-link" name="facebook">
										<i class="fab fa-facebook-f"></i>
										<span>Sign Up</span>
										</a>
									</div>
									<div class="social-links__item social-links__item--google">
										<a href="<?php echo auth_google_reg_employer_url ?>" class="social-link" name="google">
										<i class="fab fa-google"></i>
										<span>Sign Up</span>
										</a>
									</div>
									<!--<div class="social-links__item social-links__item--in">
										<a href="#" class="social-link" name="in">
										<i class="fab fa-linkedin-in"></i>
										<span>Sign Up</span>
										</a>
									</div>-->
								</div>
								<fieldset class="contact-form" id="employer-started">
									<label>
									First Name<?php
										$first_name = $GLOBALS['get_imployer_google_fname'] ?? $GLOBALS['get_employer_fb_fname'] ?? ''; ?>
									<input type="text" name="first_name" placeholder="First Name" id="e-first-name" required <?php echo($first_name ?'value="'.$first_name.'" readonly="readonly"' :'') ?>>
									</label>
									<label>
									Last Name<?php
										$last_name = $GLOBALS['get_imployer_google_lname'] ?? $GLOBALS['get_employer_fb_lname'] ?? ''; ?>
									<input type="text" name="last_name" placeholder="Last Name" id="e-last-name" required <?php echo($last_name ?'value="'.$last_name.'" readonly="readonly"' :'') ?>>
									</label>
									<label>
									Email<?php
										$useremail = $GLOBALS['get_imployer_google_email'] ?? $GLOBALS['get_employer_fb_email'] ?? ''; ?>
									<input type="email" name="useremail" id="e-email" placeholder="you@example.com" required <?php echo($useremail ?'value="'.$useremail.'" readonly="readonly"' :'') ?>>
									</label>
									<label>
									Password
									<input type="password" name="password" id="e-password" required>
									</label>
									<label>
									Mobile
									<input type="tel" name="phone" placeholder="+12(345)678-9012" id="e-phone" required/>
									</label>
									<label>
									Job Title
									<input type="text" name="employer_job_title" placeholder="Your job title" id="e-job-title" required/>
									</label>
									<label>
									Company Name
									<input type="text" name="employer_company_name" placeholder="Name of your company" id="e-company-name" required/>
									</label>
									<label>
										Employees
										<select class="form-select" name="employer_employ_count" id="e-employ-count" required>
											<option value="0">Select number of employees in your company</option>
											<option value="0-50">0- 50</option>
											<option value="50-200">50-200</option>
											<option value="200–1000">200 – 1000</option>
											<option value="1000+">1000+</option>
										</select>
									</label>
									<label>
									Headquarters Address
									<input type="text"   id="reg_form_employer_city_google" name="employer_city_google" placeholder="Start typing your city" required>
									<input type="hidden" id="reg_form_employer_country"     name="employer_country">
									<input type="hidden" id="reg_form_employer_city"        name="employer_city">
									</label>
									<div class="contact-form__agreement">
										<label class="form__checkbox">
										<input type="checkbox" id="reg_form_employer_agree" name="reg_form_employer_agree" required>
										<span class="main-checkbox"></span>
										<span>By signing up, you agree to Wona’s <a href="#" class="link link--small">Terms of Service</a> and <a href="#" class="link link--small">Privacy Policy</a>, which outline your rights and obligations with respect to your use of the Service and procesing of your data.</span>
										</label>
										<label class="form__checkbox">
										<input type="checkbox" name="email_receive_subsequent">
										<span class="main-checkbox"></span>
										<span>You agree to receive subsequent email and third-party communications, which you may opt out of, or unsubscribe from, at any time.</span>
										</label>
									</div>
								</fieldset>
								<div class="form__button">
									<a class="btn nextBtn">Get Started</a>
								</div>
							</div>
							<div class="tab">
								<div class="tabs__title tabs__title--left">
									<h2>What roles are you hiring for?</h2>
									<p>Select all roles you’re after below</p>
								</div>
								<div class="roles-form">
									<div class="roles-form__list">
										<ul class="roles-form__items">
											<?php
												$arr = getArrpos();
												foreach($arr as $arri){
													echo'<li class="roles-form__item">
														  <label class="form__checkbox">
															<input type="checkbox" name="job_relation[]" value="'.$arri[0].'">
															<span class="main-checkbox"></span>
															<span>'.$arri[1].'</span>
														  </label>
														</li>';
												} ?>
											<li class="roles-form__item other">
												<label class="form__checkbox">
												<input type="checkbox" name="job_relation_other_yn">
												<span class="main-checkbox"></span>
												<input type="text" name="job_relation_other" class="other-text" placeholder="Other (Please specify)" />
												</label>
												<span class="add-new-roles">+</span>
											</li>
										</ul>
									</div>
								</div>
								<div class="form__buttons">
									<a class="btn prevBtn">Back</a>
									<a class="btn nextBtn">Next</a>
								</div>
							</div>
							<div class="tab">
								<div class="tabs__title tabs__title--left">
									<h2>What markets are you hiring in?</h2>
									<p>Wona’s candidates are in 13 major markets, and remote, too.</p>
								</div>
								<div class="markets-form">
									<div class="markets-form__images">
										<div class="markets-form__img">
											<img src="<?php echo getHomeURL ?>slicing/img/map-USA.png" alt="USA map" />
										</div>
										<div class="markets-form__img">
											<img src="<?php echo getHomeURL ?>slicing/img/map-europe.png" alt="europe map" />
										</div>
									</div>
									<div class="markets-form__city">
										<?php
											//$arr = siteGetArrCounty();
											//foreach($arr as $arri){ ?>
										<!--<div class="markets-form__column">
											<h3 class="markets-form__subtitle"><?php //echo $arri[0] ?></h3><?php
												//$arrr = siteGetArrCountyCity($arri[0]);
												//foreach($arrr as $arrri){ ?>
												<label class="form__checkbox">
													<input type="checkbox" name="reg_form_employer_wantloc" value="<?php //echo $arri[0].':'.$arrri[0] ?>">
													<span class="main-checkbox"></span>
													<p><?php //echo $arrri[0] ?></p>
												</label><?php
												//} ?>
											</div>--><?php 
											//} ?>
										<div class="markets-form__column">
											<h3 class="markets-form__subtitle">United States</h3>
											<label class="form__checkbox">
												<input type="checkbox" name="reg_form_employer_wantloc" value="United States:San Francisco">
												<span class="main-checkbox"></span>
												<p>San Francisco</p>
											</label>
											<label class="form__checkbox">
												<input type="checkbox" name="reg_form_employer_wantloc" value="United States:Seattle">
												<span class="main-checkbox"></span>
												<p>Seattle</p>
											</label>
											<label class="form__checkbox">
												<input type="checkbox" name="reg_form_employer_wantloc" value="United States:Dallas">
												<span class="main-checkbox"></span>
												<p>Dallas</p>
											</label>
											<label class="form__checkbox">
												<input type="checkbox" name="reg_form_employer_wantloc" value="United States:Washington">
												<span class="main-checkbox"></span>
												<p>Washington</p>
											</label>
											<label class="form__checkbox">
												<input type="checkbox" name="reg_form_employer_wantloc" value="United States:Boston">
												<span class="main-checkbox"></span>
												<p>Boston</p>
											</label>
											<label class="form__checkbox">
												<input type="checkbox" name="reg_form_employer_wantloc" value="United States:New York">
												<span class="main-checkbox"></span>
												<p>New York</p>
											</label>
											<label class="form__checkbox">
												<input type="checkbox" name="reg_form_employer_wantloc" value="Canada:Toronto">
												<span class="main-checkbox"></span>
												<p>Toronto</p>
											</label>
										</div>
										<div class="markets-form__column">
											<h3 class="markets-form__subtitle">EUROPE</h3>
											<label class="form__checkbox">
												<input type="checkbox" name="reg_form_employer_wantloc" value="United Kingdom:London">
												<span class="main-checkbox"></span>
												<p>London</p>
											</label>
											<label class="form__checkbox">
												<input type="checkbox" name="reg_form_employer_wantloc" value="France:Paris">
												<span class="main-checkbox"></span>
												<p>Paris</p>
											</label>
											<label class="form__checkbox">
												<input type="checkbox" name="reg_form_employer_wantloc" value="Netherlands:Amsterdam">
												<span class="main-checkbox"></span>
												<p>Amsterdam</p>
											</label>
											<label class="form__checkbox">
												<input type="checkbox" name="reg_form_employer_wantloc" value="Germany:Berlin">
												<span class="main-checkbox"></span>
												<p>Berlin</p>
											</label>
											<label class="form__checkbox">
												<input type="checkbox" name="reg_form_employer_wantloc" value="Poland:Warsaw">
												<span class="main-checkbox"></span>
												<p>Warsaw</p>
											</label>
											<label class="form__checkbox">
												<input type="checkbox" name="reg_form_employer_wantloc" value="Czechia:Prague">
												<span class="main-checkbox"></span>
												<p>Prague</p>
											</label>
										</div>
									</div>
								</div>
								<div class="form__buttons">
									<a class="btn prevBtn">Back</a>
									<a class="btn nextBtn">Next</a>
								</div>
							</div>
							<div class="tab">
								<div class="tabs__title tabs__title--left">
									<h2>What are your top recruiting challenges?</h2>
									<p>Help us understand your recruiting challenges by checking the list below</p>
								</div>
								<div class="recruiting-form">
									<ul class="recruiting-form__list">
										<li class="recruiting-form__item">
											<label class="form__checkbox">
												<input type="checkbox" name="employer_talent_v1">
												<span class="main-checkbox"></span>
												<p>Finding candidates with the right skills and level of experience</p>
											</label>
										</li>
										<li class="recruiting-form__item">
											<label class="form__checkbox">
												<input type="checkbox" name="employer_talent_v2">
												<span class="main-checkbox"></span>
												<p>Standing out to candidates in a competitive market</p>
											</label>
										</li>
										<li class="recruiting-form__item">
											<label class="form__checkbox">
												<input type="checkbox" name="employer_talent_v3">
												<span class="main-checkbox"></span>
												<p>Finding candidates with the right skills and level of experience</p>
											</label>
										</li>
										<li class="recruiting-form__item">
											<label class="form__checkbox">
												<input type="checkbox" name="employer_talent_v4">
												<span class="main-checkbox"></span>
												<p>Knowing what salaries I need to offer</p>
											</label>
										</li>
										<li class="recruiting-form__item">
											<label class="form__checkbox">
												<input type="checkbox" name="employer_talent_v5">
												<span class="main-checkbox"></span>
												<p>Getting people through the pipeline and accepting offers</p>
											</label>
										</li>
									</ul>
								</div>
								<div class="form__buttons">
									<a class="btn prevBtn">Back</a>
									<a class="btn nextBtn">Next</a>
								</div>
							</div>
							<div class="tab">
								<div class="tabs__title tabs__title--left">
									<h2>Learn why top candidates love Wona! </h2>
									<p>Spend just a few minutes to watch our insightful video (Coming soon)</p>
								</div>
								<div class="instruction">
									<div class="video-wrap">
										<img src="<?php echo getHomeURL ?>slicing/img/maxresdefault.jpg" alt="video coming soon">
									</div>
									<ul class="instruction__list">
										<li class="instruction__item">
											<h5 class="instruction__subtitle">
												<span class="instruction__number">01</span>Set up a company profile
											</h5>
											<p>Create your custom company page, invite co-workers, and connect to your ATS</p>
										</li>
										<li class="instruction__item">
											<h5 class="instruction__subtitle">
												<span class="instruction__number">02</span>Create positions
											</h5>
											<p>Let us know the skills, experience, and role you are looking for.</p>
										</li>
										<li class="instruction__item">
											<h5 class="instruction__subtitle">
												<span class="instruction__number">03</span>See your matches
											</h5>
											<p>We match your needs to deliver relevant candidates. We’ll even email them to you!</p>
										</li>
										<li class="instruction__item">
											<h5 class="instruction__subtitle">
												<span class="instruction__number">04</span>Connect and hire
											</h5>
											<p>Send interview requests to the best candidates, interview, and secure hires.</p>
										</li>
									</ul>
								</div>
								<div class="form__buttons">
									<a class="btn prevBtn">Back</a>
									<a class="btn nextBtn">Next</a>
								</div>
							</div>
							<div class="tab">
								<div class="conclusion">
									<div class="conclusion__title">
										<h2>Let us find the best candidates for you.</h2>
									</div>
									<div class="conclusion__text">
										<p>Let us know who you’re looking for and we’ll do the rest.</p>
										<p>Our maching learning algorithms are constantly learning, so we can suggest ways to find more (or better) candidates based on what’s happening in your market.</p>
									</div>
								</div>
								<div class="form__buttons">
									<a class="btn prevBtn">Back</a>
									<input type="hidden" name="reg_employer_form_yn">
									<a href="#uID" class="btn" id="reg_employer_form_submit">View Company Profile</a>
								</div>
							</div>
						</form>
					</div>
					<div class="tab-container" id="tabs-3">
						<form class="form__talent" id="reg_recruter_form" action="<?php echo getHomeURL ?>login-page.php" method="post">
							<div class="tab">
								<div class="tabs__title">
									<h2>Let your recruitment business soar</h2>
									<p>Access thousands of jobs and incredible talent on Wona.</p>
								</div>
								<div class="social-links">
									<div class="social-links__item social-links__item--facebook">
										<a href="<?php echo auth_fb_recruiter_url ?>" class="social-link" name="facebook">
										<i class="fab fa-facebook-f"></i>
										<span>Sign Up</span>
										</a>
									</div>
									<div class="social-links__item social-links__item--google">
										<a href="<?php echo auth_google_reg_recruiter_url ?>" class="social-link" name="google">
										<i class="fab fa-google"></i>
										<span>Sign Up</span>
										</a>
									</div>
									<!--<div class="social-links__item social-links__item--in">
										<a href="#" class="social-link" name="in">
										<i class="fab fa-linkedin-in"></i>
										<span>Sign Up</span>
										</a>
									</div>-->
								</div>
								<div class="delimiter">
									<div class="line"></div>
									<p>or</p>
									<div class="line"></div>
								</div>
								<div class="contact-form" id="recruter-contact-form">
									<div class="input-wrap"></div>
									<label class="check">
									First Name<?php
										$first_name = $GLOBALS['get_recruiter_google_fname'] ?? $GLOBALS['get_recruiter_fb_fname'] ?? ''; ?>
									<input type="text" name="first_name" placeholder="First Name" id="r-first-name" required <?php echo($first_name ?'value="'.$first_name.'" readonly="readonly"' :'') ?>>
									</label>
									<label class="check">	
									Last Name<?php
										$first_name = $GLOBALS['get_recruiter_google_lname'] ?? $GLOBALS['get_recruiter_fb_lname'] ?? ''; ?>
									<input type="text" name="last_name" placeholder="Last Name" id="r-last-name"  required <?php echo($last_name ?'value="'.$last_name.'" readonly="readonly"' :'') ?>>
									</label>
									<label class="check">
									Email<?php
										$useremail = $GLOBALS['get_recruiter_google_email'] ?? $GLOBALS['get_recruiter_fb_email'] ?? ''; ?>
									<input type="email" name="useremail" id="r-email" placeholder="you@example.com" required <?php echo($useremail ?'value="'.$useremail.'" readonly="readonly"' :'') ?> pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$">
									</label>
									<label>
									Password
									<input type="password" name="password" id="r-password" required>
									</label>
									<label class="check">
									Mobile
									<input type="tel"   name="phone" placeholder="+1(212)555-1212" id="r-phone" required/>
									</label>
									<label>
									Full Address
									<input type="text"   id="reg_form_recruter_city_google" name="recruter_city_google" placeholder="Start typing your address here" required>
									</label>
									<div class="address-autofilled">
										<p>City:&nbsp;<span data-val="reg_form_recruter_city"></span></p>
										<p>State:&nbsp;<span data-val='reg_form_recruter_state'></span></p>
										<p>Country:&nbsp;<span data-val="reg_form_recruter_country"></span></p>
										<p>Zip:&nbsp;<span data-val="reg_form_recruter_zip"></span></p>
										<input type="hidden" id="reg_form_recruter_city"    name="employer_city">
										<input type="hidden" id="reg_form_recruter_state"   name="employer_state">
										<input type="hidden" id="reg_form_recruter_country" name="employer_country">
										<input type="hidden" id="reg_form_recruter_zip"     name="employer_zip">
									</div>
									<label class="check">
									LinkedIn Profile
									<input type="text" name="talent_url_lin" placeholder="Start typing your address here" id="r-linkedin">
									</label>
									<div class="contact-form__agreement">
										<label class="form__checkbox">
										<input type="checkbox" id="r-agree-conditions" required>
										<span class="main-checkbox"></span>
										<span>By signing up, you agree to Wona’s <a href="#" class="link link--small">Terms of Service</a> and <a href="#" class="link link--small">Privacy Policy</a> , which outline your rights and obligations with respect to your use of the Service and procesing of your data.</span>
										</label>
										<label class="form__checkbox">
										<input type="checkbox" name="email_receive_subsequent" id="r-agree-email">
										<span class="main-checkbox"></span>
										<span>You agree to receive subsequent email and third-party communications, which you may opt out of, or unsubscribe from, at any time.</span>
										</label>
									</div>
								</div>
								<div class="form__button">
									<input type="hidden" name="reg_recruiter_form_yn">
									<button type="button" class="btn nextBtn" id="reg_recruter_form_submit">Submit for review</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<!--submit talent-->
<div id="signup-submit_t" class="mfp-hide white-popup">
	<div class="white-popup__content">
		<div class="white-popup__img">
			<img src="<?php echo getHomeURL ?>slicing/img/fine.png" alt="OK">
		</div>
		<h2 class="white-popup__title">Thank you for your application!</h2>
		<p class="white-popup__text">We have received your application and will review it shortly! Once we have approved your application we will send you email confirming your registration!</p>
		<a class="signup-submit__close" id="reg_talent_form_submit_modal_window" href="#uID">thank you!</a>
	</div>
</div>
<!--submit employer-->
<div id="signup-submit_e" class="mfp-hide white-popup">
	<div class="white-popup__content">
		<div class="white-popup__img">
			<img src="<?php echo getHomeURL ?>slicing/img/fine.png" alt="OK">
		</div>
		<h2 class="white-popup__title">Thank you for your application!</h2>
		<p class="white-popup__text">We have received your application and will review it shortly! Once we have approved your application we will send you email confirming your registration!</p>
		<a class="signup-submit__close" id="reg_employer_form_submit_modal_window" href="#uID">thank you!</a>
	</div>
</div>
<!--submit recruiter-->
<div id="signup-submit_r" class="mfp-hide white-popup">
	<div class="white-popup__content">
		<div class="white-popup__img">
			<img src="<?php echo getHomeURL ?>slicing/img/fine.png" alt="OK">
		</div>
		<h2 class="white-popup__title">Thank you for your application!</h2>
		<p class="white-popup__text">We have received your application and will review it shortly! Once we have approved your application we will send you email confirming your registration!</p>
		<a class="signup-submit__close" id="reg_recruiter_form_submit_modal_window" href="#uID">thank you!</a>
	</div>
</div>

<!--email exist employer-->
<!-- <div id="email-exists_e" class="mfp-hide white-popup">
	<div class="white-popup__content">
	  <div class="white-popup__img">
	<img src="<?php //echo getHomeURL ?>slicing/img/fine.png" alt="OK">
	  </div>
	  <h2 class="white-popup__title">This email exists!</h2>
	<a class="signup-submit__close" href="#uID">Close</a>
	</div>
	</div> -->
<!--email exist talent-->
<!-- <div id="email-exists_t" class="mfp-hide white-popup">
	<div class="white-popup__content">
	  <div class="white-popup__img">
	<img src="<?php //echo getHomeURL ?>slicing/img/fine.png" alt="OK">
	  </div>
	  <h2 class="white-popup__title">This email exists!</h2>
	<a class="signup-submit__close" href="#uID">Close</a>
	</div>
	</div> -->
<!--email exist recruiter-->
<!-- <div id="email-exists_r" class="mfp-hide white-popup">
	<div class="white-popup__content">
	  <div class="white-popup__img">
	<img src="<?php //echo getHomeURL ?>slicing/img/fine.png" alt="OK">
	  </div>
	  <h2 class="white-popup__title">This email exists!</h2>
	<a class="signup-submit__close" href="#uID">Close</a>
	</div>
	</div> -->
<?php require_once('inc/footer.php') ?>