<?php 
require_once('inc/config.php');
require_once('inc/header.php');
require_once('template-parts/logo_menu_1.php');
?>

<?php echo 'test'?>
  <section class="hero" style="background-image: url('<?php echo getHomeURL ?>img/background-hero.png');">
    <div class="hero__container">
      <div class="hero__content">
        <h1 class='hero__title'>Where A.I. companies apply to you!</h1>
        <p>Because great minds <u>DO</u> think</p>
        <a href="signup-page.php" class="btn btn--max">Sign up for <strong>free</strong></a>
        <a href="#" class="link">Learn more</a>
        <div class="hero__decor-element">
          <img src="<?php echo getHomeURL ?>img/zig-zag.png">
        </div>
      </div>
      <div class="hero__img">
        <img src="<?php echo getHomeURL ?>img/man-min.png">
      </div>
    </div>
  </section>

  <section class="map">
    <div class="map__container">
      <div class="map__img-left">
        <img src="<?php echo getHomeURL ?>img/map-USA.png" alt="USA map" />
      </div>
      <div class="map__wrapper">
        <div class="map__content">
          <h3 class="sub-title">markets</h3>
          <h2 class="map__title">Making matches worldwide.</h2>
          <p>Wona supports <span>50+</span>roles in <span>14</span>cities worldwide, and we’re constantly adding more. We even support remote work.</p>
          <div class="map__element">
            <img src="<?php echo getHomeURL ?>img/work-remotely.png" alt="Work remotely" />
          </div>
        </div>
        <div class="map__img-right">
          <img src="<?php echo getHomeURL ?>img/map-europe.png" alt="Europe map" />
        </div>
      </div>
    </div>
  </section>

  <section class="roles">
    <div class="roles__container">
      <div class="roles__box">
        <div class="roles__list">
			<h3 class="sub-title">roles</h3>
			<ul><?php
				$arr = getArrpos();
				foreach($arr as $arri){ ?>
					<li class="roles__row">
						<div class="roles__item active" data-role-id="<?php echo $arri[0] ?>">
							<?php echo $arri[1] ?>
						</div>
					</li><?php
				} ?>
			</ul>
		</div>

        <div class="specialities">
          <h3 class="sub-title"></h3>
          <div class="specialities__list"><?php
			$i = 0;
			$arr = getArrpos();
			foreach($arr as $arri){ ?>
				<ul class="specialities__items" data-specialitie-id="<?php echo $arri[0] ?>" <?php echo($i++==0 ?'style="display: none;"' :'') ?>><?php
					$arrd = getArrposDetail($arri[0]);
					foreach($arrd as $arrdi){
						echo'<li class="specialities__item">'.$arrdi[2].'</li>';
					} ?>
				</ul><?php
			} ?>
          </div>
        </div>
      </div>

      <div class="roles__img">
        <img src="<?php echo getHomeURL ?>img/Babe.png" alt="girl">
      </div>
    </div>
  </section>

  <section class="cards">
    <div class="cards__container">
      <div class="cards__item">
        <h3 class="sub-title">10K+ COMPANIES ON WONA</h3>
        <ul class="logos__list">
          <li class="logos__item">
            <img src="<?php echo getHomeURL ?>img/company-logo.png" alt="logo" class="logo" />
          </li>
          <li class="logos__item">
            <img src="<?php echo getHomeURL ?>img/company-logo.png" alt="logo" class="logo" />
          </li>
          <li class="logos__item">
            <img src="<?php echo getHomeURL ?>img/company-logo.png" alt="logo" class="logo" />
          </li>
          <li class="logos__item">
            <img src="<?php echo getHomeURL ?>img/company-logo.png" alt="logo" class="logo" />
          </li>
          <li class="logos__item">
            <img src="<?php echo getHomeURL ?>img/company-logo.png" alt="logo" class="logo" />
          </li>
          <li class="logos__item">
            <img src="<?php echo getHomeURL ?>img/company-logo.png" alt="logo" class="logo" />
          </li>
        </ul>
      </div>
      <div class="cards__item">
        <h3 class="sub-title">FOR EMPLOYERS</h3>
        <h1>Hire better tech talent, faster.</h1>
        <p>Looking to hire? The candidates on Wona are qualified and ready to interview</p>
        <a href="#" class="btn btn--max">Request a <strong>call</strong></a>
        <a href="#" class="link">Learn more</a>
      </div>
    </div>
  </section>

  <footer class="footer">
    <div class="footer__container">
      <div class="footer__column">
        <h3 class="sub-title sub-title--white">Candidate signup</h3>
        <p>Create a free profile to start finding your dream job.</p>
        <a href="#" class="small-link">Sign up to get hired.</a>
      </div>
      <div class="footer__column">
        <h3 class="sub-title sub-title--white">employer signup</h3>
        <p>Sign up and see how you match up with top tech tallent.</p>
        <a href="#" class="small-link">Sign up to hire.</a>
      </div>
      <div class="footer__column">
        <h3 class="sub-title sub-title--white">salary calculator</h3>
        <p>See how companies value your skills and experience.</p>
        <a href="#" class="small-link">Calculate yours</a>
        <span>(coming soon)</span>
      </div>
    </div>
  </footer>

<?php require_once('inc/footer.php') ?>