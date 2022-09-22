<?php 
require_once('inc/config.php');
require_once('inc/header.php');

//echo siteMail('superpuperlesha@gmail.com', 'Theme!!!', 'Content!!!');
//echo siteSMS('+380671227279', 'Hello!!!');
//phpinfo();


$v = new siteVacancy(111);
echo $v->title;


?>
<?php require_once('inc/footer.php') ?>

<!-- The core Firebase JS SDK is always required and must be listed first -->
<!--<script src="https://www.gstatic.com/firebasejs/7.9.3/firebase-app.js"></script>-->
<!-- TODO: Add SDKs for Firebase products that you want to use https://firebase.google.com/docs/web/setup#available-libraries -->
<!--<script>
	// Your web app's Firebase configuration
	var firebaseConfig = {
		apiKey:            "AIzaSyAdM85FMpZlcW7eFHcGMhv0yAw6b-CuMEc",
		authDomain:        "wona-9af34.firebaseapp.com",
		databaseURL:       "https://wona-9af34.firebaseio.com",
		projectId:         "wona-9af34",
		storageBucket:     "wona-9af34.appspot.com",
		messagingSenderId: "101948026516",
		appId:             "1:101948026516:web:92066b94618e9531028e81"
	};
	// Initialize Firebase
	firebase.initializeApp(firebaseConfig);
</script>-->