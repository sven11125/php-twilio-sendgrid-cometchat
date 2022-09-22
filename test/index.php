<?php
if (! session_id()) {
    session_start();
}
if (empty($_GET["action"])) {
    require_once 'config.php';
    require ('oauth/http.php');
    require ('oauth/oauth_client.php');
    
    if ($_GET["oauth_problem"] != "") {
        $error1 = $_GET["oauth_problem"];
    }
    
    $client = new oauth_client_class();
    
    $client->debug = false;
    $client->debug_http = true;
    $client->redirect_uri = REDIRECT_URI;
    $client->server = "LinkedIn";
    $client->client_id = CLIENT_ID;
    $client->client_secret = CLIENT_SECRET;
    $client->scope = SCOPE;
    
    if (($success = $client->Initialize())) {
        if (($success = $client->Process())) {
            if (strlen($client->authorization_error)) {
                $client->error = $client->authorization_error;
                $success = false;
            } elseif (strlen($client->access_token)) {
                $success = $client->CallAPI('http://api.linkedin.com/v1/people/~:(id,email-address,first-name,last-name,picture-url,public-profile-url,formatted-name)', 'GET', array(
                    'format' => 'json'
                ), array(
                    'FailOnAccessError' => true
                ), $user);
            }
        }
        $success = $client->Finalize($success);
        $_SESSION["member_id"] = $user->id;
    }
    if ($client->exit) {
        exit();
    }
    if ($success) {
        // Do your code with the Linkedin Data
    } else {
        $error = $client->error;
    }
} else {
    $_SESSION = array();
    unset($_SESSION);
    session_destroy();
}
?>
<html>
<head>
<title>Simple PHP LinkedIn OAuth Login Integration</title>
<style>
body {
    width: 550px;
    font-family: Arial;
}

#profile-outer {
    background: #79ccc4;
    padding: 40px;
    color: #505050;
    text-align: center;
}

.profile-info {
    font-weight: bold;
}

.profile-image {
    width: 100px;
    height: 100px;
    border-radius: 50%;
    margin-bottom: 10px;
}

.success {
    padding: 10px;
    background: #5b948f;
    border: #51847f 1px solid;
    color: #c4e0de;
}

.error {
    padding: 10px;
    background: #ffc6d1;
    border: #efbac4 1px solid;
    color: #b34f59;
}

.link {
    background: #41b2f1;
    padding: 10px 20px 10px 20px;
    text-decoration: none;
    color: #FFF;
    margin-top: 20px;
    display: inline-block;
}

.link img {
    vertical-align: middle;
}
</style>
</head>
<body>
    <div class="container">
        <div class="margin10"></div>
        <div class="col-sm-3 col-sm-offset-4 padding20">
<?php if (!$success && !$_SESSION["member_id"]) { ?>  
<?php if(!empty($error)) { ?>
            <div class="error"><?php echo $error; ?></a>
            </div>
<?php } ?>
        <a class="link login" href="index.php"> <img
                src="linkedin-icon.png" /> Login with LinkedIn
            </a>
<?php } else { ?>
        <div id="profile-outer">
                <div>
                    <img src="<?php echo $user->pictureUrl; ?>"
                        class="profile-image" />
                </div>
                <div class="profile-row">
                    <span class="profile-info"><?php echo $user->firstName; ?></span>
                </div>
            </div>
            <div class="success">
                You have Successfully Logged in. Click here to <a
                    href="index.php?action=logout"> Logout </a>
            </div>
<?php } ?>
    </div>
    </div>
</body>
</html>