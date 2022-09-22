<?php
if(session_status() == PHP_SESSION_NONE){
	session_start();
}
	
clearstatcache();
error_reporting(-1);

$GLOBALS['SiteError'] = '';

$SiteConn = mysqli_connect('35.198.135.99', 'wona', 'pi|.&..5l1', 'wona');

if(mysqli_connect_errno()){
    printf("Error connected database: %s\n", mysqli_connect_error());
    exit();
}


//require_once('classes.php');
require_once('functions.php');

define('getHomeURL', getHomeURL());
define('getSelfURL', getSelfURL());

//===SENDGRID===
define('SendGridKeySec', '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');
require_once(dirname(dirname(__FILE__)).'/inc/api/sendgrid-php/vendor/autoload.php');

//===MAILCHIMP===
define('mailchimp_key',                              '0287ddc70d54c5049fae73c7ca029781-us4');

//===twilio===
define('twilio_sid',                                 'ACaf0f0c655a445ee633d979bf3a249230');
define('twilio_token',                               'ea9e2571c753e5e857a979c82fc715d7');
define('twilio_phone_number',                        '+15017250604');
require_once(dirname(dirname(__FILE__)).'/inc/api/twilio-php/src/Twilio/autoload.php');

//===AUTH GOOGLE all===
define('auth_google_app_secret',                     'wURzV5j-S0PSWyE3BkhUgBb6'); // APP secret
define('auth_google_app_id',                         '160988627479-mkd3ronj06rqqboaj54je18t9li6sai2.apps.googleusercontent.com');
define('auth_google_app_redirect',                   getHomeURL.'login-page.php/?auth_google=1'); // app redirect url after auth any roles in google
define('auth_google_url',                            'https://accounts.google.com/o/oauth2/auth?'.urldecode(http_build_query(array('redirect_uri'=>auth_google_app_redirect, 'response_type'=>'code', 'client_id'=>auth_google_app_id, 'scope'=>'https://www.googleapis.com/auth/userinfo.email https://www.googleapis.com/auth/userinfo.profile'))));
//===AUTH getting info GOOGLE===
define('auth_google_app_redirect_talent_getinfo',    getHomeURL.'signup-page.php/?reg_talent_google=1'); // app redirect url after getting info in google
define('auth_google_app_redirect_employer_getinfo',  getHomeURL.'signup-page.php/?reg_employer_google=1'); // app redirect url after getting info in google
define('auth_google_app_redirect_recruiter_getinfo', getHomeURL.'signup-page.php/?reg_recruiter_google=1'); // app redirect url after getting info in google
define('auth_google_reg_talent_url',                 'https://accounts.google.com/o/oauth2/auth?'.urldecode(http_build_query(array('redirect_uri'=>auth_google_app_redirect_talent_getinfo, 'response_type'=>'code', 'client_id'=>auth_google_app_id, 'scope'=>'https://www.googleapis.com/auth/userinfo.email https://www.googleapis.com/auth/userinfo.profile'))));
define('auth_google_reg_employer_url',               'https://accounts.google.com/o/oauth2/auth?'.urldecode(http_build_query(array('redirect_uri'=>auth_google_app_redirect_employer_getinfo, 'response_type'=>'code', 'client_id'=>auth_google_app_id, 'scope'=>'https://www.googleapis.com/auth/userinfo.email https://www.googleapis.com/auth/userinfo.profile'))));
define('auth_google_reg_recruiter_url',              'https://accounts.google.com/o/oauth2/auth?'.urldecode(http_build_query(array('redirect_uri'=>auth_google_app_redirect_recruiter_getinfo, 'response_type'=>'code', 'client_id'=>auth_google_app_id, 'scope'=>'https://www.googleapis.com/auth/userinfo.email https://www.googleapis.com/auth/userinfo.profile'))));
if(isset($_GET['reg_talent_google'])){
	define('auth_google_redirect', auth_google_app_redirect_talent_getinfo);
}elseif(isset($_GET['reg_employer_google'])){
	define('auth_google_redirect', auth_google_app_redirect_employer_getinfo);
}elseif(isset($_GET['reg_recruiter_google'])){
	define('auth_google_redirect', auth_google_app_redirect_recruiter_getinfo);
}else{
	define('auth_google_redirect', auth_google_app_redirect);
}
//===AUTH FACEBOOK all===
define('auth_fb_app_secret',                         '695b0398dd151738e5ffe5c9c3bdec67'); // APP secret
define('auth_fb_app_id',                             '2491560394416027'); // APP ID
define('auth_fb_app_redirect',                       getHomeURL.'login-page.php/?auth_fb=1'); // app redirect url after auth any roles in FB
define('auth_fb_url',                                'https://www.facebook.com/dialog/oauth?'.urldecode(http_build_query(array('client_id'=>auth_fb_app_id, 'redirect_uri'=>auth_fb_app_redirect, 'response_type'=>'code', 'scope'=>'email'))));
//===AUTH getting info FB===
define('auth_FB_app_redirect_talent_getinfo',        getHomeURL.'signup-page.php/?reg_talent_fb=1'); // app redirect url after getting info in fb
define('auth_FB_app_redirect_employer_getinfo',      getHomeURL.'signup-page.php/?reg_employer_fb=1'); // app redirect url after getting info in fb
define('auth_FB_app_redirect_recruiter_getinfo',     getHomeURL.'signup-page.php/?reg_recruiter_fb=1'); // app redirect url after getting info in fb
define('auth_fb_talent_url',                         'https://www.facebook.com/dialog/oauth?'.urldecode(http_build_query(array('client_id'=>auth_fb_app_id, 'redirect_uri'=>auth_FB_app_redirect_talent_getinfo, 'response_type'=>'code', 'scope'=>'email'))));
define('auth_fb_employer_url',                       'https://www.facebook.com/dialog/oauth?'.urldecode(http_build_query(array('client_id'=>auth_fb_app_id, 'redirect_uri'=>auth_FB_app_redirect_employer_getinfo, 'response_type'=>'code', 'scope'=>'email'))));
define('auth_fb_recruiter_url',                      'https://www.facebook.com/dialog/oauth?'.urldecode(http_build_query(array('client_id'=>auth_fb_app_id, 'redirect_uri'=>auth_FB_app_redirect_recruiter_getinfo, 'response_type'=>'code', 'scope'=>'email'))));
if(isset($_GET['reg_talent_fb'])){
	define('auth_fb_redirect', auth_FB_app_redirect_talent_getinfo);
}elseif(isset($_GET['reg_employer_fb'])){
	define('auth_fb_redirect', auth_FB_app_redirect_employer_getinfo);
}elseif(isset($_GET['reg_recruiter_fb'])){
	define('auth_fb_redirect', auth_FB_app_redirect_recruiter_getinfo);
}else{
	define('auth_fb_redirect', auth_fb_app_redirect);
}

//===uploading files chack===
define('avatar_file_size',                             '1000000');
define('resume_file_size',                             '1000000');
define('post_file_size',                               '1000000');


//===CONFIRM EMAIL AFTER REGISTER===
if(isset($_GET['email_confirmation_code'])){
	siteConfirmEMail($_GET['email_confirmation_code']);
}

//===GET AUTH INFO RECRUITER from FB===
if(isset($_GET['reg_recruiter_fb'])){
	siteGetRegisterInfoRecruiterFB();
}

//===GET AUTH INFO EMPLOYER from FB===
if(isset($_GET['reg_employer_fb'])){
	siteGetRegisterInfoEmployerFB();
}

//===GET AUTH INFO TALENT from FB===
if(isset($_GET['reg_talent_fb'])){
	siteGetRegisterInfoTalentFB();
}

//===AUTH FB===
if(isset($_GET['auth_fb'])){
	siteAuthFB();
}

//===GET AUTH INFO RECRUITER from GOOGLE===
if(isset($_GET['reg_recruiter_google'])){
	siteGetRegisterInfoRecruiterGOOGLE();
}

//===GET AUTH INFO TALENT from GOOGLE===
if(isset($_GET['reg_talent_google'])){
	siteGetRegisterInfoTalentGOOGLE();
}

//===GET AUTH INFO IMPLOYER from GOOGLE===
if(isset($_GET['reg_employer_google'])){
	siteGetRegisterInfoEmployerGOOGLE();
}

//===AUTH GOOGLE===
if(isset($_GET['auth_google'])){
	siteAuthGOOGLE();
}

//===Insert user post===
if(isset($_POST['insert_post_yn'])){
	SiteInsertPost();
}

//===register talent===
if(isset($_POST['reg_talent_form_yn'])){
	SiteRegisterTalent();
}

//===register employer===
if(isset($_POST['reg_employer_form_yn'])){
	SiteRegisterEmployer();
}

//===register employer===
if(isset($_POST['reg_recruiter_form_yn'])){
	SiteRegisterRecruiter();
}

//===SITE AUTH===
if(isset($_POST['user_login_form']) && isset($_POST['useremail']) && isset($_POST['password'])){
	$GLOBALS['SiteError'] = siteAuth($_POST['useremail'], $_POST['password']);
}

//===SET vacancy state===
if( isset($_GET['setvacancyid']) && isset($_GET['setvacancystate']) ){
	setVacancyState($_GET['setvacancyid'], $_GET['setvacancystate']);
}

?>