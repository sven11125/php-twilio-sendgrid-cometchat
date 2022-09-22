<?php 
require_once('inc/config.php');
require_once('inc/header.php');
require_once('template-parts/logo_menu_1.php');
?>

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
            <!--<div class="social-links__item">
              <a href="#" class="social-link" name="in">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </div>-->
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

  <form action="<?php echo getSelfURL ?>" method="POST" id="forgot-password" class="light-popup mfp-hide">
    <h2>Password Reset Request</h2>
    <p>Forgot your password? No problem! Just input your username or email address in the field below and we’ll send you the password reset link immediately</p>
    <div class="form-username">
		<label>
			Email address
			<input id="forgot_password_email" name="email" type="email" placeholder="Email address" required="" />
		</label>
    </div>
    <div id="forgot_password_message"></div>
	<input type="hidden" name="user_forgot_form" value="1">
    <button type="submit" href="#thanks-message" class="thanks-popup-ajax btn">Reset Password</button>
  </form>

  <div id="thanks-message" class="light-popup mfp-hide">
    <h2>Thank you!</h2>
    <p>Please check your inbox for the password reset link.</p>
  </div>

<?php require_once('inc/footer.php') ?>