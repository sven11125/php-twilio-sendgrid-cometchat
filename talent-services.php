<?php
session_start();
if(empty($_SESSION['SiteUser'])){
	header('location:index.php');
} ?>

<?php 
require_once('inc/config.php');
require_once('inc/header.php');
require_once('template-parts/logo_menu_1.php');
?>

<div class="dashboard__overlay">
    <div class="dashboard__image"></div>
</div>
<section class="dashboard">
    <div class="container">
        <div class="dashboard__header">
            <div class="dashboard__logo">
                <img src="slicing/img/logo.png" alt="logo">
            </div>
            <div class="dashboard-nav">

                <ul class="dashboard-nav__list">
                    <li class="dashboard-nav__item">
                        <a href="dashboard.php" class="dashboard-nav__link">dashboard</a>
                    </li>
                    <li class="dashboard-nav__item main">
                        <a href="#" class="dashboard-nav__link">Talent</a>
                        <i class="fas fa-sort-down"></i>
                        <div class="dashboard-nav__dropdown">
                            <a href="services-employers.php">Employers</a>
                            <a href="#">jobs</a>
                        </div>
                    </li>
                    <li class="dashboard-nav__item">
                        <a href="#" class="dashboard-nav__link">finances</a>
                    </li>
                    <li class="dashboard-nav__item">
                        <a href="#" class="dashboard-nav__link">reports</a>
                    </li>
                </ul>

                <div class="dashboard-nav__search">
                    <form action="" method="POST" class="dashboard__search">
                        <button class="dashboard__search-btn"><i class="fas fa-search"></i></button>
                        <input type="text" name="" placeholder="SEARCH..." class="dashboard__search-input" />
                    </form>
                </div>

            </div>

            <div class="dashboard__user-nav">
                <div class="dashboard__notification">
                    <div class="dashboard__notification-icon">
                        <i class="far fa-bell"></i>
                    </div>
                    <span class="dashboard__notification-count">0</span>
                </div>
                <div class="dashboard__notification">
                    <div class="dashboard__notification-icon">
                        <i class="far fa-envelope"></i>
                    </div>
                    <span class="dashboard__notification-count">0</span>
                </div>
                <div class="dashboard-user">
                    <a href="#" class="dashboard-user__link"><?php echo $_SESSION['SiteUser']['first_name'].' '.$_SESSION['SiteUser']['last_name'] ?></a>
                    <i class="fas fa-sort-down"></i>
                    <div class="dashboard-user__dropdown">
                        <div class="dashboard-user__item"><a href="#">settings</a></div>
                        <div class="dashboard-user__item"><a href="logout.php">log out</a></div>
                    </div>
                </div>
                <div class="dashboard__user-icon">

                </div>
            </div>
        </div>

        <div class="dashboard__menu">
            <div class="modal-overlay"></div>

            <div class="dashboard__burger">
                <i class="fas fa-bars"></i>
            </div>

            <div class="dashboard__burger-menu">
                <ul class="burger-menu__list">
                    <li class="burger-menu__item">
                        <a href="" class="burger-menu__link">Add new talent</a>
                    </li>
                    <li class="burger-menu__item">
                        <a href="" class="burger-menu__link">add new employer</a>
                    </li>
                    <li class="burger-menu__item">
                        <a href="" class="burger-menu__link">add new job</a>
                    </li>
                    <li class="burger-menu__item">
                        <a href="" class="burger-menu__link">new message</a>
                    </li>
                    <li class="burger-menu__item">
                        <a href="" class="burger-menu__link">manual payment</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="dashboard__main-block">
            <div class="dashboard__full-block">
                <div class="dashboard-info">
                    <div class="dashboard-info__talents">
                        <div class="full-list-table">
                            <ul class="dashboard-info__menu">
                                <li class="dashboard-info__title col1">
                                    <label class="form__checkbox">
                                        <input type="checkbox" id="all-talents" />
                                        <span class="main-checkbox"></span>
                                    </label>
                                </li>
                                <li class="dashboard-info__title sort col2">
                                    <p>full name</p>
                                    <div class="sort-arrows">
                                        <i class="fas fa-sort-up"></i>
                                        <i class="fas fa-sort-down"></i>
                                    </div>
                                </li>
                                <li class="dashboard-info__title sort col3">
                                    <p>email</p>
                                    <div class="sort-arrows">
                                        <i class="fas fa-sort-up"></i>
                                        <i class="fas fa-sort-down"></i>
                                    </div>
                                </li>
                                <li class="dashboard-info__title col4">
                                    <p>phone</p>
                                </li>
                                <li class="dashboard-info__title sort col5">
                                    <p>type</p>
                                    <div class="sort-arrows">
                                        <i class="fas fa-sort-up"></i>
                                        <i class="fas fa-sort-down"></i>
                                    </div>
                                </li>
                                <li class="dashboard-info__title col6">
                                    <p>skills</p>
                                </li>
                                <li class="dashboard-info__title col7">
                                    <p>location</p>
                                </li>
                                <li class="dashboard-info__title sort col8">
                                    <p>salary range</p>
                                    <div class="sort-arrows">
                                        <i class="fas fa-sort-up"></i>
                                        <i class="fas fa-sort-down"></i>
                                    </div>
                                </li>
                                <li class="dashboard-info__title col9">
                                </li>
                                <li class="dashboard-info__title col10">
                                    <p>actions</p>
                                </li>


                            </ul>


                            <ul class="dashboard-info__list"><?php
								$query = "SELECT * FROM user WHERE role = 'talent'";
								$result = mysqli_query($SiteConn, $query);
								while($row = mysqli_fetch_array($result)){ ?>
									<li class="dashboard-info__item">
										<div class="dashboard-info__item-text col1">
											<label class="form__checkbox">
												<input type="checkbox" class="this-talent" />
												<span class="main-checkbox"></span>
											</label>
										</div>
										<div class="dashboard-info__item-text col2">
											<p><?php echo $row["first_name"]; ?> <?php echo $row["last_name"]; ?></p>
										</div>
										<div class="dashboard-info__talents-box">
											<div class="actions-modal" style="display: none;">
												<div class="modal-overlay"></div>
												<div class="t-profile">
												<div class="close-popup">
													<div class="close-popup__icon ">
													<i class="fas fa-times"></i>
													</div>
												</div>

												<div class="t-profile__icon">
													<i class="fas fa-user"></i>
												</div>

												<div class="t-profile__content">
													<div class="t-profile__title">
													<h2 class="t-profile__name">Pavel Rashkin</h2>
													<span class="t-profile__status t-profile__status--green">new</span>
													<span class="t-profile__status">pending review</span>
													</div>

													<div class="t-profile__location">
													<p>Lives in Khabarovsk, Russia</p>
													</div>

													<div class="t-profile__contacts">
													<div class="t-profile__contacts-item">
														<i class="fas fa-phone-alt"></i>
														<p>+7 999 111-22-22</p>
													</div>
													<div class="t-profile__contacts-item">
														<i class="fas fa-at"></i>
														<p class="dashboard-info__email dashboard-info__email--purpule" title='pavel@gmail.com'>
														pavel@gmail.com></p>
													</div>
													</div>

													<div class="t-profile__text">
													<p><span class="ttu">CURRENT STATUS:</span><span class="red bold">Ready to interview and actively
														searching</span> </p>
													</div>
													<div class="t-profile__text">
													<p>Prefers only <span class="red bold">permanent roles</span> <span class="red">at a</span> minumum base
														salary of <span class="red bold">US$70,000/yr</span></p>
													</div>

													<div class="t-profile__skills">
													<ul class="skills__list">
														<li class="skills__item">HTML</li>
														<li class="skills__item">PHP</li>
														<li class="skills__item">Angular</li>
														<li class="skills__item">Node</li>
													</ul>


													<div class="select-action">
														<i class="fas fa-bars"></i>
														<div class="select-action__button">
														<p>select</p>
														<i class="fas fa-sort-down"></i>
														</div>
														<div class="select-action__dropdown">
														<ul class="select-action__list">
															<li class="select-action__item">
															<a href="#" class="select-action__link" data-action="modal-approve">Approve profile</a>
															</li>
															<li class="select-action__item">
															<a href="#" class="select-action__link" data-action="modal-suspend">suspend profile</a>
															</li>
															<li class="select-action__item">
															<a href="#" class="select-action__link">quick message</a>
															</li>
														</ul>
														</div>
													</div>
													</div>

													<div class="info-list">
													<ul class="info-list__items">
														<li class="info-list__item">
														<div class="info-list__title">
															<div class="info-list__button">
															<i class="fas fa-chevron-down"></i>
															</div>
															<h3>wishlist</h3>
														</div>
														<div class="info-list__content user-wishlist">
															<p>In priority order:</p>
															<ol>
															<li>I’m looking for a company that has <strong>leadership opportunities</strong> and
																<strong>new technologies</strong></li>
															<li>I’d like to work at a company with <strong>1-15</strong> employees</li>
															<li>My ideal company would be in these industries: <strong>cybersecurity</strong></li>
															<li>I aspire to work in these top technologies: <strong>CSS, HTML</strong> and
																<strong>Java</strong></li>
															<li>I’m looking for a new position as a(n): <strong>individual contributor</strong></li>
															</ol>
														</div>
														</li>

														<li class="info-list__item">
														<div class="info-list__title">
															<div class="info-list__button">
															<i class="fas fa-chevron-down"></i>
															</div>
															<h3>location</h3>
														</div>

														<div class="info-list__content">
															<div class="info-list__block">
															<div class="info-list__content-icon">
																<i class="fas fa-map-marker-alt"></i>
															</div>
															<p><strong>Wants to work in or near the following areas (or remote):</strong></p>
															<p>Dallas, TX <br>San Francisco, CA</p>
															</div>
														</div>
														</li>

														<li class="info-list__item">
														<div class="info-list__title">
															<div class="info-list__button">
															<i class="fas fa-chevron-down"></i>
															</div>
															<h3>Experience & Roles</h3>
														</div>

														<div class="info-list__content">
															<div class="info-list__block">
															<div class="info-list__row first">
																<p><strong>Total: Software Engineering</strong></p>
																<div class="info-list__content-bg">
																<span class="info-list__years val3">6-10 years</span>
																</div>
															</div>
															<p><strong>In order of proficiency:</strong></p>
															<ol>
																<li>
																<div  class="info-list__row">
																<p>Backend</p>
																<div class="info-list__content-bg">
																	<span class="info-list__years val2">4-6 years</span>
																</div>
																</div>
																</li>
																<li>
																<div class="info-list__row">
																<p>Frontend</p>
																<div class="info-list__content-bg">
																	<span class="info-list__years val3">6-10 years</span>
																</div>
																</div>
																</li>
																<li>
																<div class="info-list__row">
																<p>Full Stack</p>
																<div class="info-list__content-bg">
																	<span class="info-list__years val1">1-5 years</span>
																</div>
																</div>
																</li>
															</ol>
															</div>                
														</div>
														</li>

														<li class="info-list__item">
														<div class="info-list__title">
															<div class="info-list__button">
															<i class="fas fa-chevron-down"></i>
															</div>
															<h3>Work experience</h3>
														</div>

														<div class="info-list__content">
															<div class="info-list__block">
															<div class="info-list__content-icon">
																<i class="fas fa-briefcase"></i>
															</div>
															<p><strong>ABC</strong></p>
															<p class="m0"><strong>Designer</strong></p>
															<p>May 2019 — Dec 2019 (7 mos)</p>
															<p>Sketch, Photoshop, etc. html, coding, having fun, drinking coffee. Overall having kick-butt time. Loved it!</p>
															</div>                
														</div>
														</li>

														<li class="info-list__item">
														<div class="info-list__title">
															<div class="info-list__button">
															<i class="fas fa-chevron-down"></i>
															</div>
															<h3>Education</h3>
														</div>

														<div class="info-list__content">
															<div class="info-list__block">
															<div class="info-list__content-icon">
																<i class="fas fa-briefcase"></i>
															</div>

															<p><strong>DVGUPS</strong></p>
															<p class="m0"><strong>B.S. Computer Science</strong></p>
															<p>2015</p>
															</div>               
														</div>
														</li>

														<li class="info-list__item">
														<div class="info-list__title">
															<div class="info-list__button">
															<i class="fas fa-chevron-down"></i>
															</div>
															<h3>activity</h3>
														</div>
														<div class="info-list__content">
															<p>Comments list:</p>
															<ol class="acivity-box">
															</ol>
														</div>
														</li>

														<li class="info-list__item">
														<div class="info-list__title">
															<div class="info-list__comment add-comment">
															<i class="fas fa-pen"></i>
															</div>
															<div class="textAreaWrap">
															<textarea class="textArea"></textarea>
															<div class="placeholderDiv">Enter your comments here. Comments will be timestamped in visible in the activity tab</div> 
															</div>
														</div>
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
											</div>
											<div class="dashboard-info__item-text col3">
												<p class="dashboard-info__email" title='<?php echo $row["useremail"]; ?>'><?php echo $row["useremail"]; ?>>
												</p>
											</div>
											<div class="dashboard-info__item-text col4">
												<p><?php echo $row["phone"]; ?></p>
											</div>
											<div class="dashboard-info__item-text col5">
												<p>Full-Time, Contract</p>
											</div>
											<div class="dashboard-info__item-text col6">
												<p><?php echo $row["talent_add_exp_1"]; ?> 
													<?php echo $row["talent_add_exp_2"]; ?> 
													<?php echo $row["talent_add_exp_3"]; ?> 
													<?php echo $row["talent_add_exp_4"]; ?> 
													<?php echo $row["talent_add_exp_5"]; ?></p>
											</div>
											<div class="dashboard-info__item-text col7">
												<p>Dallas, TX,
													San Francisco, CA</p>
											</div>
											<div class="dashboard-info__item-text col8">
												<p>US$<?php echo $row["talent_salary"]; ?></p>
											</div>
											<div class="dashboard-info__item-text col9">
												<div class="dashboard-info__social">
													
													<a href="#">
													<div class="social-link facebook">
													<i class="fab fa-facebook-square"></i>
													</div>
													</a>
													<?php if($row["talent_url_lin"]){?>
													<a href="<?php echo $row["talent_url_lin"]; ?>">
													<div class="social-link linkedin active">
													   <i class="fab fa-linkedin"></i>
													</div>
													</a>
													<?php }else{?>
													<div class="social-link linkedin">
													   <i class="fab fa-linkedin"></i>
													</div>
													
													<?php }?>
													
													<a href="#">
													<div class="social-link instagram">
														<i class="fab fa-instagram"></i>
													</div>
													</a>
												</div>
											</div>
											<div class="dashboard-info__item-text col10">
												<div class="select-action">
													<span class="select-action__indicator"></span>
													<div class="select-action__button">
														<p>select</p>
														<i class="fas fa-sort-down"></i>
													</div>
													<div class="select-action__dropdown">
														<ul class="select-action__list" data-order="1">
															<li class="select-action__item" data-action="view">
																<a href="#" class="select-action__link">View profile</a>
															</li>
															<li class="select-action__item" data-action="approve">
																<a href="#" class="select-action__link">Approve profile</a>
															</li>
															<li class="select-action__item" data-action="suspend">
																<a href="#" class="select-action__link">suspend profile</a>
															</li>
															<li class="select-action__item" data-action="message">
																<a href="#" class="select-action__link">quick message</a>
															</li>
														</ul>
													</div>
												</div>
											</div>
										</div>
									</li><?php
								} ?>
                            </ul>
                        </div>

                        <div class="full-list-nav">
                            <div class="full-list-nav__pages">
                                <!--<div class="page-arrow">
                                    <i class="fas fa-angle-double-left"></i>
                                </div>
                                <div class="page-arrow">
                                    <i class="fas fa-angle-left"></i>
                                </div>
                                <div class="page-number active">
                                    <p>1</p>
                                </div>
                                <div class="page-number">
                                    <p>2</p>
                                </div>
                                <div class="page-number">
                                    <p>3</p>
                                </div>
                                <div class="page-number">
                                    <p>4</p>
                                </div>
                                <div class="page-number">
                                    <p>5</p>
                                </div>
                                <div class="page-points">
                                    <p>...</p>
                                </div>
                                <div class="page-number">
                                    <p>13</p>
                                </div>
                                <div class="page-number">
                                    <p>14</p>
                                </div>
                                <div class="page-number">
                                    <p>15</p>
                                </div>
                                <div class="page-number">
                                    <p>16</p>
                                </div>
                                <div class="page-arrow">
                                    <i class="fas fa-angle-right"></i>
                                </div>
                                <div class="page-arrow">
                                    <i class="fas fa-angle-double-right"></i>
                                </div>-->

                            </div>
                            <div class="ull-list-nav__all">
                                <div class="full-list-nav__button">
                                    <p>rows per page</p>
                                    <i class="fas fa-sort-down"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require_once('inc/footer.php') ?>