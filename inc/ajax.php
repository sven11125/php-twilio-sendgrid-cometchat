<?php 
require_once('../inc/config.php');

//===SITE FORGOT PASSWORD===
if( isset($_POST['user_forgot_form']) ){
	echo siteRequestResetPass($_POST['user_forgot_form']);
}

//===GET AUTH INFO EMPLOYER===
if(isset($_POST['job_reg_action'])){
	addVacancy();
}

//===check user email count===
if(isset($_POST['check_reg_useremail'])){
	echo siteGetEmailCount($_POST['check_reg_useremail']);
	exit();
}

//===Like unlike my job===
if(isset($_POST['like_unlike_job_id'])){
	siteLikeUnlikeJob($_POST['like_unlike_job_id']);
	exit();
}

//===getting filtered list univercity===
if(isset($_POST['list_uncity'])){
	getListUnivercity($_POST['list_uncity']);
	exit();
}

//===getting filtered list degree===
if(isset($_POST['list_degree'])){
	getListDegree($_POST['list_degree']);
	exit();
}

//===search if wishlist 1-6===
if(isset($_POST['search_talent_wishlist'])){
	search_talent_wishlist($_POST['search_talent_wishlist'], $_POST['search_talent_wishlist_id']);
	exit();
}

//===search jobs_list===
if(isset($_POST['searchjob'])){
	searchjob($_POST['searchjob']);
	exit();
}

//===search jobs_list===
if(isset($_POST['searchtalent'])){
	searchtalent($_POST['searchtalent']);
	exit();
}

//===getting chat info 1===
if(isset($_POST['keyword']) && isset($_POST['self'])){
	getChatInfo_1($_POST['keyword'], $_POST['self']);
	exit();
}



?>