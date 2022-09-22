<?php 
require_once('inc/config.php');
require_once('inc/header.php');
require_once('template-parts/logo_menu_1.php');?>

<section class="login login--light">
    <div class="login__container">
      <div class="login__options">
		
		<?php //require_once('template-parts/lang_switch.php') ?>
		
      </div>
      <div class="login__box" style="background-image: url('<?php echo getHomeURL ?>slicing/img/login-background.png');">
        <div class="login__text">
			
          <div class="login__title">
			<?php echo SiteError($GLOBALS['SiteError']) ?>
            <h2>Login to <img class="logo" src="<?php echo getHomeURL ?>slicing/img/bitmap.png" alt="W." /> with:</h2>
          </div>
		  
          <div class="social-links">
            <div class="social-links__item">
              <a href="<?php echo auth_fb_url ?>" class="social-link" name="facebook">
                <i class="fab fa-facebook-f"></i>
              </a>
            </div>
            <div class="social-links__item">
              <a href="<?php echo auth_google_url ?>" class="social-link" name="google">
                <i class="fab fa-google"></i>
              </a>
            </div>
            <div class="social-links__item">
              <a href="#" class="social-link" name="in">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </div>
          </div>

			<div class="delimiter">
				<div class="line"></div>
				<p>or</p>
				<div class="line"></div>
			</div>
			
			<form action="<?php echo getSelfURL ?>" method="POST" class="login__form">
				<label>
					Email address
					<input type="email" name="useremail" placeholder="Enter your email address" required/>
				</label>
				<label>
					Password
					<input class="form-control" name="password" type="password" placeholder="Enter your password" required>
				</label>
				<div class="login__forgot">
					<a href="#forgot-password" class="forgot-password-popup link link--small">Forgot your password?</a>
				</div>
				<input type="hidden" name="user_login_form" value="1">
				<button class="btn btn-primary btn-block" type="submit">Login</button>
			</form>
		  
        </div>
        <div class="login__image">
          <img src="<?php echo getHomeURL ?>slicing/img/man.png" alt="man" />
        </div>
      </div>
    </div>
  </section>

<?php //===SITE RESET PASSWORD=== ?>
<?php if( isset($_POST['user_forgot_reset']) && isset($_POST['password']) && isset($_POST['password_conf']) ){
	$GLOBALS['SiteError'] = siteResetPass($_POST['password'], $_POST['password_conf'], $_POST['user_forgot_reset']);
} ?>

<?php if(isset($_GET['user_forgot_resetcode'])){ ?>
		<form action="<?php echo getHomeURL ?>login-page-restorepass.php" class="light-popup mfp-hide" id="reset-password-popup" method="post">
		<h2>Password Reset</h2>
		<p>Please enter your new password below, please make sure to save your new password for future use</p>	
		
		<div class="form-user-password">
		<label>
			NEW PASSWORD
		<input type="password" name="password" placeholder="Enter your new password" required="" >
		</label>
		<label>
			REPEAT NEW PASSWORD
		<input type="password" name="password_conf" placeholder="Confirm your new password" required="" >	
		<input type="hidden"   name="user_forgot_reset" value="<?php echo ($_GET['user_forgot_resetcode'] ?? '') ?>">
		</label>
		</div>
		<input type="submit" class="btn" value="SAVE PASSWORD">
		</form><?php
	}elseif($GLOBALS['SiteError']){
		echo SiteError($GLOBALS['SiteError']);
	}else{ ?>
		<p>No data needed for password recovery.</p>
<?php } ?>

<?php require_once('inc/footer.php') ?>