<?php
session_start();
if(empty($_SESSION['SiteUser'])){
	header('location:index.php');
}

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
          <img src="<?php echo getHomeURL ?>slicing/img/logo.png" alt="logo">
        </div>
        <div class="dashboard-nav">

          <ul class="dashboard-nav__list">
            <li class="dashboard-nav__item main">
              <a href="#" class="dashboard-nav__link">dashboard</a>
            </li>
            <li class="dashboard-nav__item">
              <a href="#" class="dashboard-nav__link">services</a>
              <i class="fas fa-sort-down"></i>
              <div class="dashboard-nav__dropdown">
                <a href="talent-services.php">Talent</a>
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
            <span class="dashboard__notification-count">12</span>
          </div>
          <div class="dashboard__notification">
            <div class="dashboard__notification-icon">
              <i class="far fa-envelope"></i>
            </div>
            <span class="dashboard__notification-count">5</span>
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
        <div class="dashboard__left-block">
          <div class="general-statistic">
            <div class="general-statistic__box">
              <h2 class="general-statistic__title">new talent</h2>
              <p class="general-statistic__count">123</p>
              <p class="general-statistic__percent general-statistic__percent--up"> <span>35,5</span>%</p>
            </div>
            <div class="general-statistic__box">
              <h2 class="general-statistic__title">new employers</h2>
              <p class="general-statistic__count">123</p>
              <p class="general-statistic__percent"> <span>35,5</span>%</p>
            </div>
            <div class="general-statistic__box">
              <h2 class="general-statistic__title">new vacancies</h2>
              <p class="general-statistic__count">123</p>
              <p class="general-statistic__percent"> <span>35,5</span>%</p>
            </div>
            <div class="general-statistic__box">
              <h2 class="general-statistic__title">Revenue</h2>
              <p class="general-statistic__count general-statistic__count--small">$ 1,1M</p>
              <p class="general-statistic__percent"> <span>35,5</span>%</p>
            </div>
          </div>

          <div class="dashboard-info">
            <div class="dashboard-info__talents">
              <div class="dashboard-info__button">
                <i class="fas fa-chevron-down"></i>
              </div>
              <div class="dashboard-info__menu">
                <div class="dashboard-info__title col1">
                  <p>full name</p>
                </div>
                <div class="dashboard-info__title col2">
                  <p>email</p>
                </div>
                <div class="dashboard-info__title col3">
                  <p>type</p>
                </div>
                <div class="dashboard-info__title col4">
                  <p>skills</p>
                </div>
                <div class="dashboard-info__title col5">
                  <p>location</p>
                </div>
                <div class="dashboard-info__title col6">
                  <p>salary range</p>
                </div>
                <div class="dashboard-info__title col7">
                  <p>actions</p>
                </div>
              </div>

              <ul class="dashboard-info__list"><?php
				$query = "SELECT * FROM user WHERE role = 'talent' LIMIT 2";
				$result = mysqli_query($SiteConn, $query);
				while($row = mysqli_fetch_array($result)){ ?>
					<li class="dashboard-info__item">
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
					  <div class="dashboard-info__item-text col1">
						<p><?php echo $row["first_name"]; ?> <?php echo $row["last_name"]; ?></p>
					  </div>
					  <div class="dashboard-info__item-text col2">
						<p class="dashboard-info__email" title='<?php echo $row["useremail"]; ?>'><?php echo $row["useremail"]; ?>></p>
					  </div>
					  <div class="dashboard-info__item-text col3">
						<p>Full-Time, Contract</p>
					  </div>
					  <div class="dashboard-info__item-text col4">
						<p>
							<?php echo $row["talent_add_exp_1"]; ?>
							<?php echo $row["talent_add_exp_2"]; ?>
							<?php echo $row["talent_add_exp_3"]; ?>
							<?php echo $row["talent_add_exp_4"]; ?>
							<?php echo $row["talent_add_exp_5"]; ?>
						</p>
					  </div>
					  <div class="dashboard-info__item-text col5">
						<p>Dallas, TX,
						  San Francisco, CA</p>
					  </div>
					  <div class="dashboard-info__item-text col6">
						<p>US$<?php echo $row["talent_salary"]; ?></p>
					  </div>
					  <div class="dashboard-info__item-text col7">
						<div class="select-action">
						  <span class="select-action__indicator"></span>
						  <div class="select-action__button">
							<p>select</p>
							<i class="fas fa-sort-down"></i>
						  </div>
						  <div class="select-action__dropdown">
							<ul class="select-action__list">
							  <li class="select-action__item" data-action="view">
								  <a href="" class="select-action__link">View profile</a>
							  </li>
							  <li class="select-action__item" data-action="approve">
								  <a href="" class="select-action__link approve">Approve profile</a>
							  </li>
							  <li class="select-action__item" data-action="suspend">
								  <a href="" class="select-action__link">suspend profile</a>
							  </li>
							  <li class="select-action__item" data-action="message">
                  <span class="name" hidden><?php echo ($row["first_name"].' '.$row["last_name"])?></span>
                  <span class="uid" hidden><?php echo $row["cometchat_uid"]?></span>
                  <span class="role" hidden><?php echo $row["role"]?></span>
								  <a href="javascript:void(0)" class="select-action__link quick_message">quick message</a>
							  </li>
							</ul>
						  </div>
						</div>
					  </div>
					</li>
				<?php } ?>
              </ul>

              <ul class="dashboard-info__list dashboard-info__list--more"><?php
				$query = "SELECT * FROM user WHERE role = 'talent' LIMIT 2 OFFSET 2";
				$result = mysqli_query($SiteConn, $query);
				while($row = mysqli_fetch_array($result)){ ?>
					<li class="dashboard-info__item">
					  <div class="dashboard-info__item-text col1">
						<p><?php echo $row["first_name"]; ?> <?php echo $row["last_name"]; ?></p>
					  </div>
					  <div class="dashboard-info__item-text col2">
						<p class="dashboard-info__email" title='<?php echo $row["useremail"]; ?>'><?php echo $row["useremail"]; ?>></p>
					  </div>
					  <div class="dashboard-info__item-text col3">
						<p>Freelance</p>
					  </div>
					  <div class="dashboard-info__item-text col4">
						<p><?php echo $row["talent_add_exp_1"]; ?>
							<?php echo $row["talent_add_exp_2"]; ?>
							<?php echo $row["talent_add_exp_3"]; ?>
							<?php echo $row["talent_add_exp_4"]; ?>
							<?php echo $row["talent_add_exp_5"]; ?></p>
					  </div>
					  <div class="dashboard-info__item-text col5">
						<p>Worldwide</p>
					  </div>
					  <div class="dashboard-info__item-text col6">
						<p>US$<?php echo $row["talent_salary"]; ?></p>
					  </div>
					  <div class="dashboard-info__item-text col7">
						<div class="select-action">
						  <span class="select-action__indicator"></span>
						  <div class="select-action__button">
							<p>select</p>
							<i class="fas fa-sort-down"></i>
						  </div>
						  <div class="select-action__dropdown">
							<ul class="select-action__list">
							  <li class="select-action__item">
								<a href="" class="select-action__link">View profile</a>
							  </li>
							  <li class="select-action__item">
								<a href="" class="select-action__link approve">Approve profile</a>
							  </li>
							  <li class="select-action__item">
								<a href="" class="select-action__link">suspend profile</a>
							  </li>
							  <li class="select-action__item">
								<a href="javascript:void(0)" class="select-action__link quick_message">quick message</a>
							  </li>
							</ul>
						  </div>
						</div>
					  </div>
					</li>
				<?php } ?>

                <div class="dashboard-info__all-list">
                  <a href="talent-services.php" class="dashboard-info__link">view all</a>
                </div>
              </ul>


            </div>

            <div class="dashboard-info-line"></div>

            <div class="dashboard-info__employer">
              <div class="dashboard-info__button">
                <i class="fas fa-chevron-down"></i>
              </div>
              <div class="dashboard-info__menu">
                <div class="dashboard-info__title col1">
                  <p>company</p>
                </div>
                <div class="dashboard-info__title col2">
                  <p>email</p>
                </div>
                <div class="dashboard-info__title col3">
                  <p>type</p>
                </div>
                <div class="dashboard-info__title col4">
                  <p>job type</p>
                </div>
                <div class="dashboard-info__title col5">
                  <p>location</p>
                </div>
                <div class="dashboard-info__title col6">
                  <p>size of company</p>
                </div>
                <div class="dashboard-info__title col7">
                  <p>actions</p>
                </div>

              </div>

              <ul class="dashboard-info__list">
                <?php
				$query = "SELECT * FROM user WHERE role = 'employer' LIMIT 2";
				$result = mysqli_query($SiteConn, $query);
				while($row = mysqli_fetch_array($result)){ ?>
				<li class="dashboard-info__item">
                  <div class="dashboard-info__item-text col1">
                    <p><?php echo $row["employer_company_name"]; ?></p>
                  </div>
                  <div class="dashboard-info__item-text col2">
                    <p class="dashboard-info__email" title='<?php echo $row["useremail"]; ?>'><?php echo $row["useremail"]; ?>></p>
                  </div>
                  <div class="dashboard-info__item-text col3">
                    <p>Oil/Gas Industry</p>
                  </div>
                  <div class="dashboard-info__item-text col4">
                    <p>Front-end, Back-end</p>
                  </div>
                  <div class="dashboard-info__item-text col5">
                    <p><?php echo $row["employer_country"]; ?>
                      <?php echo $row["employer_city"]; ?></p>
                  </div>
                  <div class="dashboard-info__item-text col6">
                    <p><?php echo $row["employer_employ_count"]; ?></p>
                  </div>
                  <div class="dashboard-info__item-text col7">
                    <div class="select-action">
                      <span class="select-action__indicator"></span>
                      <div class="select-action__button">
                        <p>select</p>
                        <i class="fas fa-sort-down"></i>
                      </div>
                      <div class="select-action__dropdown">
                        <ul class="select-action__list">
                          <li class="select-action__item">
                            <a href="" class="select-action__link">View profile</a>
                          </li>
                          <li class="select-action__item">
                            <a href="" class="select-action__link approve">Approve profile</a>
                          </li>
                          <li class="select-action__item">
                            <a href="" class="select-action__link">suspend profile</a>
                          </li>
                          <li class="select-action__item">
                            <span class="name" hidden><?php echo ($row["first_name"].' '.$row["last_name"])?></span>
                            <span class="uid" hidden><?php echo $row["cometchat_uid"]?></span>
                            <span class="role" hidden><?php echo $row["role"]?></span>
                            <a href="javascript:void(0)" class="select-action__link quick_message">quick message</a>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </li>
				<?php } ?>

              </ul>
              <ul class="dashboard-info__list dashboard-info__list--more">
                <?php
				$query = "SELECT * FROM user WHERE role = 'employer' LIMIT 2 OFFSET 2";
				$result = mysqli_query($SiteConn, $query);
				while($row = mysqli_fetch_array($result)){ ?>
				<li class="dashboard-info__item">
                  <div class="dashboard-info__item-text col1">
                    <p><?php echo $row["employer_company_name"]; ?></p>
                  </div>
                  <div class="dashboard-info__item-text col2">
                    <p class="dashboard-info__email" title='<?php echo $row["useremail"]; ?>'><?php echo $row["useremail"]; ?>></p>
                  </div>
                  <div class="dashboard-info__item-text col3">
                    <p>Freelance</p>
                  </div>
                  <div class="dashboard-info__item-text col4">
                    <p>HTML, PHP, Angular, Node</p>
                  </div>
                  <div class="dashboard-info__item-text col5">
                    <p><?php echo $row["employer_country"]; ?>
                      <?php echo $row["employer_city"]; ?></p>
                  </div>
                  <div class="dashboard-info__item-text col6">
                    <p>US$<?php echo $row["employer_employ_count"]; ?></p>
                  </div>
                  <div class="dashboard-info__item-text col7">
                    <div class="select-action">
                      <span class="select-action__indicator"></span>
                      <div class="select-action__button">
                        <p>select</p>
                        <i class="fas fa-sort-down"></i>
                      </div>
                      <div class="select-action__dropdown">
                        <ul class="select-action__list">
                          <li class="select-action__item">
                            <a href="" class="select-action__link">View profile</a>
                          </li>
                          <li class="select-action__item">
                            <a href="" class="select-action__link approve">Approve profile</a>
                          </li>
                          <li class="select-action__item">
                            <a href="" class="select-action__link">suspend profile</a>
                          </li>
                          <li class="select-action__item">
                            <a href="javascript:void(0)" class="select-action__link quick_message">quick message</a>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </li>
				<?php } ?>
                <div class="dashboard-info__all-list">
                  <a href="services-employers.php" class="dashboard-info__link">view all</a>

                </div>
              </ul>
            </div>

          </div>

        </div>

        <div class="dashboard__right-block">
          <div class="dashboard__calendar">
            <input type="text" id="calendar" data-multiple-dates="3" data-multiple-dates-separator=", " data-position='right top' />
          </div>

          <div class="recent-activity">
            <div class="recent-activity__top">
              <h3 class="recent-activity__title">Recent Activity</h3>
              <a href="#" class="recent-activity__global-link">View more</a>
            </div>
            <div class="recent-activity__block">
              <ul class="recent-activity__list">
                <li class="recent-activity__item recent-activity__item--purple">
                  <div class="recent-activity__indicator">
                    <span class="point-indicator"></span>
                  </div>
                  <div class="recent-activity__icon">
                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 172 172" style=" fill:#000000;">
                      <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                        <path d="M0,172v-172h172v172z" fill="none"></path>
                        <g fill="#ffffff">
                          <path d="M86,6.90688c-43.65602,0 -79.12,35.46398 -79.12,79.12c0,41.63931 32.27171,75.80172 73.1336,78.87141c0.08056,0.00655 0.16115,0.01386 0.24187,0.02015c1.9,0.13691 3.80998,0.22844 5.74453,0.22844c1.93455,0 3.84453,-0.09153 5.74453,-0.22844c0.08072,-0.0063 0.16131,-0.01361 0.24187,-0.02015c40.86189,-3.06969 73.1336,-37.2321 73.1336,-78.87141c0,-43.65602 -35.46398,-79.12 -79.12,-79.12zM86,13.78688c39.93779,0 72.24,32.3022 72.24,72.24c0,19.71706 -7.89544,37.55193 -20.6736,50.57875c-5.46671,-3.98083 -12.22246,-6.35558 -18.275,-8.47906c-7.16896,-2.5112 -13.95113,-4.89168 -15.82937,-9.03c-0.29584,-3.53288 -0.2694,-6.29176 -0.24188,-9.46l0.00672,-1.34375c3.05472,-2.9068 6.89623,-9.04167 8.21031,-14.70735c2.2704,-1.21088 5.04643,-4.11354 5.87891,-11.06578c0.41624,-3.45032 -0.56572,-6.12245 -1.94172,-7.91469c1.8576,-6.3812 5.55361,-22.53555 -0.92047,-32.96219c-2.73824,-4.40664 -6.87027,-7.18686 -12.30203,-8.28422c-3.05128,-3.77712 -8.80925,-5.83859 -16.50797,-5.83859c-11.69944,0.21672 -20.27622,3.80018 -25.4775,10.64922c-6.13352,8.084 -7.29248,20.29804 -3.45344,36.32156c-1.42072,1.79224 -2.44546,4.50307 -2.02234,8.02219c0.83592,6.95224 3.60179,9.8549 5.87219,11.06578c1.31408,5.67256 5.15215,11.80726 8.21031,14.71406l0.00672,1.31015c0.02752,3.182 0.05396,5.94696 -0.24188,9.4936c-1.88512,4.14864 -8.69992,6.55503 -15.90328,9.09719c-6.0162,2.12442 -12.73196,4.50283 -18.18765,8.43203c-12.78804,-13.02829 -20.68703,-30.87322 -20.68703,-50.59891c0,-39.93779 32.30221,-72.24 72.24,-72.24z">
                          </path>
                        </g>
                      </g>
                    </svg>
                  </div>
                  <div class="recent-activity__content">
                    <p><strong>Pavel Rashkin</strong> registered as new talent.
                      <a href="#" class="recent-activity__link">Review</a>
                    </p>
                    <p class="recent-activity__time">1 min. ago</p>
                  </div>
                </li>

                <li class="recent-activity__item recent-activity__item--blue">
                  <div class="recent-activity__indicator">
                    <span class="point-indicator"></span>
                  </div>
                  <div class="recent-activity__icon">
                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 172 172" style=" fill:#000000;">
                      <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                        <path d="M0,172v-172h172v172z" fill="none"></path>
                        <g fill="#ffffff">
                          <path d="M86,6.90688c-43.65602,0 -79.12,35.46398 -79.12,79.12c0,41.63931 32.27171,75.80172 73.1336,78.87141c0.08056,0.00655 0.16115,0.01386 0.24187,0.02015c1.9,0.13691 3.80998,0.22844 5.74453,0.22844c1.93455,0 3.84453,-0.09153 5.74453,-0.22844c0.08072,-0.0063 0.16131,-0.01361 0.24187,-0.02015c40.86189,-3.06969 73.1336,-37.2321 73.1336,-78.87141c0,-43.65602 -35.46398,-79.12 -79.12,-79.12zM86,13.78688c39.93779,0 72.24,32.3022 72.24,72.24c0,19.71706 -7.89544,37.55193 -20.6736,50.57875c-5.46671,-3.98083 -12.22246,-6.35558 -18.275,-8.47906c-7.16896,-2.5112 -13.95113,-4.89168 -15.82937,-9.03c-0.29584,-3.53288 -0.2694,-6.29176 -0.24188,-9.46l0.00672,-1.34375c3.05472,-2.9068 6.89623,-9.04167 8.21031,-14.70735c2.2704,-1.21088 5.04643,-4.11354 5.87891,-11.06578c0.41624,-3.45032 -0.56572,-6.12245 -1.94172,-7.91469c1.8576,-6.3812 5.55361,-22.53555 -0.92047,-32.96219c-2.73824,-4.40664 -6.87027,-7.18686 -12.30203,-8.28422c-3.05128,-3.77712 -8.80925,-5.83859 -16.50797,-5.83859c-11.69944,0.21672 -20.27622,3.80018 -25.4775,10.64922c-6.13352,8.084 -7.29248,20.29804 -3.45344,36.32156c-1.42072,1.79224 -2.44546,4.50307 -2.02234,8.02219c0.83592,6.95224 3.60179,9.8549 5.87219,11.06578c1.31408,5.67256 5.15215,11.80726 8.21031,14.71406l0.00672,1.31015c0.02752,3.182 0.05396,5.94696 -0.24188,9.4936c-1.88512,4.14864 -8.69992,6.55503 -15.90328,9.09719c-6.0162,2.12442 -12.73196,4.50283 -18.18765,8.43203c-12.78804,-13.02829 -20.68703,-30.87322 -20.68703,-50.59891c0,-39.93779 32.30221,-72.24 72.24,-72.24z">
                          </path>
                        </g>
                      </g>
                    </svg>
                  </div>
                  <div class="recent-activity__content">
                    <p><strong>ABC Co, Ltd</strong> registered as new employer.
                      <a href="#" class="recent-activity__link">Review</a>
                    </p>
                    <p class="recent-activity__time">15 min. ago</p>
                  </div>
                </li>

                <li class="recent-activity__item recent-activity__item--red">
                  <div class="recent-activity__indicator">
                    <span class="point-indicator"></span>
                  </div>
                  <div class="recent-activity__icon">
                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 172 172" style=" fill:#000000;">
                      <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                        <path d="M0,172v-172h172v172z" fill="none"></path>
                        <g fill="#ffffff">
                          <path d="M86,6.90688c-43.65602,0 -79.12,35.46398 -79.12,79.12c0,41.63931 32.27171,75.80172 73.1336,78.87141c0.08056,0.00655 0.16115,0.01386 0.24187,0.02015c1.9,0.13691 3.80998,0.22844 5.74453,0.22844c1.93455,0 3.84453,-0.09153 5.74453,-0.22844c0.08072,-0.0063 0.16131,-0.01361 0.24187,-0.02015c40.86189,-3.06969 73.1336,-37.2321 73.1336,-78.87141c0,-43.65602 -35.46398,-79.12 -79.12,-79.12zM86,13.78688c39.93779,0 72.24,32.3022 72.24,72.24c0,19.71706 -7.89544,37.55193 -20.6736,50.57875c-5.46671,-3.98083 -12.22246,-6.35558 -18.275,-8.47906c-7.16896,-2.5112 -13.95113,-4.89168 -15.82937,-9.03c-0.29584,-3.53288 -0.2694,-6.29176 -0.24188,-9.46l0.00672,-1.34375c3.05472,-2.9068 6.89623,-9.04167 8.21031,-14.70735c2.2704,-1.21088 5.04643,-4.11354 5.87891,-11.06578c0.41624,-3.45032 -0.56572,-6.12245 -1.94172,-7.91469c1.8576,-6.3812 5.55361,-22.53555 -0.92047,-32.96219c-2.73824,-4.40664 -6.87027,-7.18686 -12.30203,-8.28422c-3.05128,-3.77712 -8.80925,-5.83859 -16.50797,-5.83859c-11.69944,0.21672 -20.27622,3.80018 -25.4775,10.64922c-6.13352,8.084 -7.29248,20.29804 -3.45344,36.32156c-1.42072,1.79224 -2.44546,4.50307 -2.02234,8.02219c0.83592,6.95224 3.60179,9.8549 5.87219,11.06578c1.31408,5.67256 5.15215,11.80726 8.21031,14.71406l0.00672,1.31015c0.02752,3.182 0.05396,5.94696 -0.24188,9.4936c-1.88512,4.14864 -8.69992,6.55503 -15.90328,9.09719c-6.0162,2.12442 -12.73196,4.50283 -18.18765,8.43203c-12.78804,-13.02829 -20.68703,-30.87322 -20.68703,-50.59891c0,-39.93779 32.30221,-72.24 72.24,-72.24z">
                          </path>
                        </g>
                      </g>
                    </svg>
                  </div>
                  <div class="recent-activity__content">
                    <p><strong>Pavel Rashkin</strong> filed new support request.
                      <a href="#" class="recent-activity__link">Review</a>
                    </p>
                    <p class="recent-activity__time">1h. 26 min. ago</p>
                  </div>
                </li>

                <li class="recent-activity__item recent-activity__item--green">
                  <div class="recent-activity__indicator">
                    <span class="point-indicator"></span>
                  </div>
                  <div class="recent-activity__icon">
                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 172 172" style=" fill:#000000;">
                      <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                        <path d="M0,172v-172h172v172z" fill="none"></path>
                        <g fill="#ffffff">
                          <path d="M86,6.90688c-43.65602,0 -79.12,35.46398 -79.12,79.12c0,41.63931 32.27171,75.80172 73.1336,78.87141c0.08056,0.00655 0.16115,0.01386 0.24187,0.02015c1.9,0.13691 3.80998,0.22844 5.74453,0.22844c1.93455,0 3.84453,-0.09153 5.74453,-0.22844c0.08072,-0.0063 0.16131,-0.01361 0.24187,-0.02015c40.86189,-3.06969 73.1336,-37.2321 73.1336,-78.87141c0,-43.65602 -35.46398,-79.12 -79.12,-79.12zM86,13.78688c39.93779,0 72.24,32.3022 72.24,72.24c0,19.71706 -7.89544,37.55193 -20.6736,50.57875c-5.46671,-3.98083 -12.22246,-6.35558 -18.275,-8.47906c-7.16896,-2.5112 -13.95113,-4.89168 -15.82937,-9.03c-0.29584,-3.53288 -0.2694,-6.29176 -0.24188,-9.46l0.00672,-1.34375c3.05472,-2.9068 6.89623,-9.04167 8.21031,-14.70735c2.2704,-1.21088 5.04643,-4.11354 5.87891,-11.06578c0.41624,-3.45032 -0.56572,-6.12245 -1.94172,-7.91469c1.8576,-6.3812 5.55361,-22.53555 -0.92047,-32.96219c-2.73824,-4.40664 -6.87027,-7.18686 -12.30203,-8.28422c-3.05128,-3.77712 -8.80925,-5.83859 -16.50797,-5.83859c-11.69944,0.21672 -20.27622,3.80018 -25.4775,10.64922c-6.13352,8.084 -7.29248,20.29804 -3.45344,36.32156c-1.42072,1.79224 -2.44546,4.50307 -2.02234,8.02219c0.83592,6.95224 3.60179,9.8549 5.87219,11.06578c1.31408,5.67256 5.15215,11.80726 8.21031,14.71406l0.00672,1.31015c0.02752,3.182 0.05396,5.94696 -0.24188,9.4936c-1.88512,4.14864 -8.69992,6.55503 -15.90328,9.09719c-6.0162,2.12442 -12.73196,4.50283 -18.18765,8.43203c-12.78804,-13.02829 -20.68703,-30.87322 -20.68703,-50.59891c0,-39.93779 32.30221,-72.24 72.24,-72.24z">
                          </path>
                        </g>
                      </g>
                    </svg>
                  </div>
                  <div class="recent-activity__content">
                    <p><strong>New Co., Ltd</strong> posted a new vacancy.
                      <a href="#" class="recent-activity__link">Review</a>
                    </p>
                    <p class="recent-activity__time">2h. 18 min. ago</p>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>

  </section>

<div class="chat-box-container" style="z-index: 1000"></div>


<?php require_once('template-parts/superadmin_chat_screen.php') ?>

<?php require_once('inc/footer.php') ?>

<?php require_once('template-parts/chat_scripts.php') ?>
