<?php


//===create cometchat user===
function createUserApiOfCometchat($method, $url, $data){
	$curl = curl_init();

	$headers = array(
		'accept: application/json',
		'apikey: 029c53a23201a8e01a15e1ff3e2fa86f6ab48006',
		'appid: 1430499b11ee649',
		'content-type: application/json'
	);

	curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
	curl_setopt($curl, CURLOPT_URL, $url);
	curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
	curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	$apiResponse = curl_exec($curl);
	curl_close($curl);

	$jsonResponse = json_decode($apiResponse);
	return $jsonResponse->data->uid ?? 0;
}


//===cometchat f1===
function getChatInfo_1($keyword, $self_uid){
	// $keyword = $_POST['keyword'];
	// $self_uid = $_POST['self'];
	$filteredUsers = [];
	$usersQuery = "SELECT * FROM user";
	$users = mysqli_query($SiteConn, $usersQuery);
	while ($row = mysqli_fetch_array($users)) {
		$full_name = $row["first_name"] . ' ' . $row["last_name"];
		if ($row["cometchat_uid"] != $self_uid && strpos(strtolower($full_name), strtolower($keyword)) !== false) {
			$opponent_uid = $row['cometchat_uid'];
			$chatListQuery1 = "SELECT * FROM chat_list WHERE sender_uid = '$opponent_uid' AND receiver_uid  = '$self_uid'";
			$chatList1 = mysqli_query($SiteConn, $chatListQuery1);
			if (mysqli_num_rows($chatList1) > 0) {
				array_push($filteredUsers, $row);
			}
			$chatListQuery2 = "SELECT * FROM chat_list WHERE sender_uid = '$self_uid' AND receiver_uid  = '$opponent_uid'";
			$chatList2 = mysqli_query($SiteConn, $chatListQuery2);
			if (mysqli_num_rows($chatList2) > 0) {
				array_push($filteredUsers, $row);
			}
		}
	}
	echo json_encode($filteredUsers);
}


//===check liked job for user===
function getLikedMyJob($userID, $jobID){
	global $SiteConn;
	
	$result = mysqli_query($SiteConn,  "SELECT count(jll_id)as cc
										FROM   job_listing_like
										where  jll_user_id        = ".(int)$userID."
												and
											   jll_job_listing_id =	".(int)$jobID);
	while($row = mysqli_fetch_array($result)){
		return $row['cc'];
	}
}


//===GETTING JOB INFORMATION===
function getJobInfo($jobID){
	global $SiteConn;
	
	$result = mysqli_query($SiteConn,  "SELECT jl.*, DATE_FORMAT(jl.jd_ts, '%M %e, %Y')as jd_ts_formated, jll.jll_id as j_liked
										FROM   job_listing jl
										left   join job_listing_like jll on jl.id = jll.jll_job_listing_id
										where  jl.id = ".(int)$jobID);
	return mysqli_fetch_array($result, MYSQLI_ASSOC);
}

//===SQL query for searching vacancy===
function getSQLsearctVacancy($find){
	global $SiteConn;
	$sqladd = '';
	
	//===adding job===
	$job_arr_id = [];
	$sql = "SELECT *
			FROM   job
			WHERE  LOWER(job_name) LIKE '%".strtolower(mysqli_real_escape_string($SiteConn, $find))."%' ";
	
	$result = mysqli_query($SiteConn, $sql);
	while($row = mysqli_fetch_array($result)){
		$job_arr_id[] = $row['job_id'];
	}
	mysqli_free_result($result);
	if($job_arr_id){
		$sqladd .= " OR jd_job_id IN(".implode(',', $job_arr_id).") ";
	}
	
	//===adding job_details===
	$job_det_arr_id = [];
	$job_det_arr_ls_id = [];
	$sql = "SELECT *
			FROM   job_detail
			WHERE  LOWER(jd_name) LIKE '%".strtolower(mysqli_real_escape_string($SiteConn, $find))."%' ";
	$result = mysqli_query($SiteConn, $sql);
	while($row = mysqli_fetch_array($result)){
		$job_det_arr_id[] = $row['jd_id'];
	}
	mysqli_free_result($result);
	if($job_det_arr_id){
		$sql = "SELECT *
				FROM   job_listing_job_detail
				WHERE  jljd_job_detail_id IN (".implode(',', $job_det_arr_id).") ";
		$result = mysqli_query($SiteConn, $sql);
		while($row = mysqli_fetch_array($result)){
			$job_det_arr_ls_id[] = $row['jljd_job_listing_id'];
		}
		mysqli_free_result($result);
	}
	if($job_det_arr_ls_id){
		$sqladd .= " OR id IN(".implode(',', $job_det_arr_ls_id).") ";
	}
	
	//===adding region===
	$region_arr_id = [];
	$sql = "SELECT *
			FROM   job_listing_region
			WHERE  LOWER(jlr_country) LIKE '%".strtolower(mysqli_real_escape_string($SiteConn, $find))."%'
					OR
				   LOWER(jlr_state) LIKE '%".strtolower(mysqli_real_escape_string($SiteConn, $find))."%'
					OR
				   LOWER(jlr_city) LIKE '%".strtolower(mysqli_real_escape_string($SiteConn, $find))."%'
					OR
				   LOWER(jlr_zip) LIKE '%".strtolower(mysqli_real_escape_string($SiteConn, $find))."%'";
	
	$result = mysqli_query($SiteConn, $sql);
	while($row = mysqli_fetch_array($result)){
		$region_arr_id[] = $row['jlr_job_listing_id'];
	}
	mysqli_free_result($result);
	if($region_arr_id){
		$sqladd .= " OR id IN(".implode(',', $region_arr_id).") ";
	}
	
	//===MAIN SEARCH QUERY===
	$sql = "SELECT jl.*, DATE_FORMAT(jl.jd_ts, '%M %e, %Y')as jd_ts_formated, 1 as j_liked
			FROM   job_listing jl
			WHERE  LOWER(jl.title)           LIKE '%".strtolower(mysqli_real_escape_string($SiteConn, $find))."%'
					OR
				   LOWER(jl.job_description) LIKE '%".strtolower(mysqli_real_escape_string($SiteConn, $find))."%'
				   ".$sqladd."
			ORDER  BY jl.id DESC
			LIMIT  3 ";
	return $sql;
}


//===SEARCH TALENT===
function searchtalent($find){
	global $SiteConn;
	
	/*$sql = getSQLsearctVacancy($find);
	$result = mysqli_query($SiteConn, $sql);
	while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){ ?>
		<div class="searchjobItem">
			<h3><?php echo $row['title'] ?></h3>
			<h4><?php echo $row['job_description'] ?></h4>
		</div><?php
	}
	mysqli_free_result($result);*/
	//echo'res';
}


//===SEARCH VACANCY===
function searchjob($find){
	global $SiteConn;
	
	$sql = getSQLsearctVacancy($find);
	$result = mysqli_query($SiteConn, $sql);
	while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){ ?>
		<div class="searchjobItem">
			<a href="<?php echo getHomeURL ?>job-page.php?jobID=<?php echo $row['id'] ?>">
				<div class="vacancy__top vacancy__top--search">
					<h3 class="vacancies__title">
						<?php echo $row['title'] ?>
					</h3>
				</div>
				<div class="conditions">
					<h5 class="conditions__item">Occupancy: <span><?php echo getOccupancyTitle($row['occupancy']) ?></span>;</h5>
					<h5 class="conditions__item">Salary range: <span>$<?php echo $row['salary_from'] ?> - $<?php echo $row['salary_to'] ?></span>;</h5>
					<h5 class="conditions__item">Location: <span><?php
						$query1 = "SELECT * 
								   FROM job_listing_region
								   WHERE jlr_job_listing_id = ".(int)$row['id'];
						$result1 = mysqli_query($SiteConn, $query1);
						while($row1 = mysqli_fetch_array($result1)){
							echo $row1['jlr_country'].', '.$row1['jlr_state'].', '.$row1['jlr_city'].'; ';
						}
						mysqli_free_result($result1); ?></span>
					</h5>
					<h5 class="conditions__item">Relocation assistance: <span> <?php echo($row["relocation_assistance"] ?'Yes' :'No') ?></span>;</h5>
					<h5 class="conditions__item">Work permit assistance: <span> <?php echo($row['permit_assistance'] ?'Possible' :'No') ?></span>;</h5>
				</div>
			</a>
		</div><?php
	}
	mysqli_free_result($result);
}


//===adding new Vacancy===
function addVacancy(){
	global $SiteConn;

	//$job_reg_action =            (isset($_POST['job_reg_action'])           ?mysqli_real_escape_string($SiteConn, htmlspecialchars($_POST['job_reg_action'])) :'');
	$job_reg_id =                (isset($_POST['job_reg_id'])               ?mysqli_real_escape_string($SiteConn, htmlspecialchars($_POST['job_reg_id'])) :'');
	$job_reg_title =             (isset($_POST['job_reg_title'])            ?mysqli_real_escape_string($SiteConn, htmlspecialchars($_POST['job_reg_title'])) :'');
	$job_reg_occupancy =         (isset($_POST['job_reg_occupancy'])        ?(int)$_POST['job_reg_occupancy'] :'0');
	$job_reg_country =           (isset($_POST['job_reg_country'])          ?(array)$_POST['job_reg_country'] :[]);
	$job_reg_state =             (isset($_POST['job_reg_state'])            ?(array)$_POST['job_reg_state']   :[]);
	$job_reg_city =              (isset($_POST['job_reg_city'])             ?(array)$_POST['job_reg_city']    :[]);
	$job_reg_zip =               (isset($_POST['job_reg_zip'])              ?(array)$_POST['job_reg_zip']     :[]);
	$job_reg_salary_from =       (isset($_POST['job_reg_salary_from'])      ?(int)$_POST['job_reg_salary_from'] :'0');
	$job_reg_salary_to =         (isset($_POST['job_reg_salary_to'])        ?(int)$_POST['job_reg_salary_to'] :'0');
	$job_reg_description =       (isset($_POST['job_reg_description'])      ?mysqli_real_escape_string($SiteConn, htmlspecialchars($_POST['job_reg_description'])) :'');
	$job_reg_job =               (isset($_POST['job_reg_job'])              ?(int)$_POST['job_reg_job'] :'0');
	$job_reg_job_detail =        (isset($_POST['job_reg_job_detail'])       ?(array)$_POST['job_reg_job_detail'] :[]);
	$job_reg_reloc_assistant =   (isset($_POST['job_reg_reloc_assistant'])  ?(int)$_POST['job_reg_reloc_assistant'] :'0');
	$job_reg_permit_assistant =  (isset($_POST['job_reg_permit_assistant']) ?(int)$_POST['job_reg_permit_assistant'] :'0');
	$job_reg_remoote =           (isset($_POST['job_reg_remoote'])          ?(int)$_POST['job_reg_remoote'] :'0');
	$job_reg_draft =             (isset($_POST['job_reg_draft'])            ?(int)$_POST['job_reg_draft'] :'1');
	$sql = "INSERT into
				   job_listing(jd_user_id,                           jd_job_custom_id,  title,                occupancy,                jd_status,          remote_position,      permit_assistance,             relocation_assistance,        jd_job_id,        job_description,            salary_from,              salary_to              )
			       values     (".(int)$_SESSION['SiteUser']['id'].", '".$job_reg_id."', '".$job_reg_title."', '".$job_reg_occupancy."', ".$job_reg_draft.", ".$job_reg_remoote.", ".$job_reg_permit_assistant.", ".$job_reg_reloc_assistant.", ".$job_reg_job.", '".$job_reg_description."', ".$job_reg_salary_from.", ".$job_reg_salary_to." ) ";
	if(mysqli_query($SiteConn, $sql)){
		$vac_id = mysqli_insert_id($SiteConn);

		//===adding vacancy job detail===
		foreach($job_reg_job_detail as $job_reg_job_detail_i){
			$sql = "INSERT into
					job_listing_job_detail(jljd_job_detail_id,             jljd_job_listing_id )
					values                (".(int)$job_reg_job_detail_i.", ".(int)$vac_id."    ) ";
			if(!mysqli_query($SiteConn, $sql)){
				echo 'Error inserting new job detail! ';
				exit;
			}
		}

		$i = 0;
		foreach($job_reg_country as $job_reg_country_i){
			$sql = "INSERT into
					job_listing_region(jlr_job_listing_id, jlr_country,                jlr_state,                jlr_city,                jlr_zip                )
					values            (".(int)$vac_id.",   '".$job_reg_country[$i]."', '".$job_reg_state[$i]."', '".$job_reg_city[$i]."', '".$job_reg_zip[$i]."' ) ";
			if(!mysqli_query($SiteConn, $sql)){
				echo 'Error inserting new job location!';
				exit;
			}
			$i++;
		}
		echo(1);
		exit;
	}else{
		echo('Error inserting new job!'. $sql);
		exit;
	}
}


//===getting count vacancy opened/closed===
function getVacancyCount($userID, $openclose=0){
	global $SiteConn;

	$result = mysqli_query($SiteConn,  "SELECT count(id) as vcount
										FROM   job_listing
										where  jd_user_id = ".(int)$userID." 
											   ".((int)$openclose>0 ?"and jd_status = ".(int)$openclose :""));
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
	return $row['vcount'];
}


//===getting array talent wanted locations===
function getWantedLocationArr($userID){
	global $SiteConn;
	
	$result = mysqli_query($SiteConn,  "SELECT *
										FROM   user_talent_region
										where  utr_user_id = ".(int)$userID);
	return mysqli_fetch_all($result, MYSQLI_ASSOC);
	mysqli_free_result($result);
}


//===getting array talent Job details===
function getUserJobsArr($userID){
	global $SiteConn;
	
	$result = mysqli_query($SiteConn,  "SELECT jd.jd_name, jdr.ujr_job_detail_experience
										FROM   user_talent_job_detail_relation jdr
										left join job_detail jd on jdr.ujr_job_detail_id = jd.jd_id
										where  jdr.ujr_user_id = ".(int)$userID);
	return mysqli_fetch_all($result, MYSQLI_ASSOC);
	mysqli_free_result($result);
}


//===getting array talent edukation experiance===
function getUserEducationArr($userID){
	global $SiteConn;
	
	$result = mysqli_query($SiteConn,  "SELECT ul.university, dl.degree, udr.tdur_year
										FROM   talent_university_degree_relation udr
										left join talent_university_listing ul on udr.tdur_university_id = ul.id
										left join talent_degree_listing dl on udr.tdur_dgree_id = dl.id
										where  udr.tdur_user_id = ".(int)$userID);
	return mysqli_fetch_all($result, MYSQLI_ASSOC);
	mysqli_free_result($result);
}


//===getting array talent work experiance===
function getUserWorkArr($userID){
	global $SiteConn;
	
	$result = mysqli_query($SiteConn,  "SELECT *
										FROM   user_talent_work_experience
										where  we_user_id = ".(int)$userID);
	return mysqli_fetch_all($result, MYSQLI_ASSOC);
	mysqli_free_result($result);
}


function get_month_name($mID){
    $months = array(
        1   =>  'January',
        2   =>  'February',
        3   =>  'March',
        4   =>  'April',
        5   =>  'May',
        6   =>  'June',
        7   =>  'July',
        8   =>  'August',
        9   =>  'September',
        10  =>  'October',
        11  =>  'November',
        12  =>  'December'
    );
	if(in_array((int)$mID, range(1, 12))){
		return $months[(int)$mID];
	}
}


//===TWILIO SMSing===
function siteSMS($phone, $message){
	//use \Twilio\Rest\Client;
	$client = new \Twilio\Rest\Client(twilio_sid, twilio_token);
	$client->messages->create(
		$phone, // the number you'd like to send the message to
		array(
			'from' => twilio_phone_number, // A Twilio phone number you purchased at twilio.com/console
			'body' => $message // the body of the text message you'd like to send
		)
	);
}

//===like unlike my job===
function siteLikeUnlikeJob($jobId){
	global $SiteConn;

	if(isset($_SESSION['SiteUser']['id']) && $_SESSION['SiteUser']['id']>0){
		$result = mysqli_query($SiteConn, "SELECT *
										   FROM   job_listing_like
										   where  jll_user_id        = ".(int)$_SESSION['SiteUser']['id']."
													and
												  jll_job_listing_id = ".(int)$jobId);
		if($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
			mysqli_query($SiteConn, "DELETE
									 FROM   job_listing_like
									 where  jll_user_id = ".(int)$_SESSION['SiteUser']['id']."
											  and
											jll_job_listing_id = ".(int)$jobId);
			$yn = 0;
		}else{
			mysqli_query($SiteConn, "INSERT into
									 job_listing_like(jll_user_id,                          jll_job_listing_id )
									 values          (".(int)$_SESSION['SiteUser']['id'].", ".(int)$jobId."    )");
			$yn = 1;
		}
		mysqli_free_result($result);
		echo (int)$yn;
	}else{
		echo 'Нou are not authorized!';
	}
}

//===getting name Occupancy===
function getOccupancyTitle($oID){
	global $SiteConn;
	$res = '';

	$result = mysqli_query($SiteConn,  "SELECT *
										FROM   occupancy
										where  o_id = ".(int)$oID);
	while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
		$res = $row['o_title'];
	}
	mysqli_free_result($result);
	return $res;
}

//===getting name Vacancy status===
function getVacancyStatusInfo($vacID){
	global $SiteConn;
	$res = '';

	$result = mysqli_query($SiteConn,  "SELECT *
										FROM   job_listing_status
										where  jls_id = ".(int)$vacID);
	$arr = mysqli_fetch_all($result, MYSQLI_ASSOC);
	return ($arr ?$arr[0] :[]);
	mysqli_free_result($result);
}

//===getting name Vacancy status===
function getVacancyArr(){
	global $SiteConn;

	$result = mysqli_query($SiteConn, "SELECT * FROM job_listing_status order by jls_title");
	return mysqli_fetch_all($result, MYSQLI_ASSOC);
	mysqli_free_result($result);
}

//===getting array of work expirience===
function getWorkExpArr($userID){
	global $SiteConn;
	$res = [];

	$result = mysqli_query($SiteConn,  "SELECT *
										FROM   user_talent_work_experience
										where  we_user_id = ".(int)$userID);
	while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
		$res[] = $row;
	}
	mysqli_free_result($result);
	return $res;
}

//===getting array of work education===
function getEducationExpArr($userID){
	global $SiteConn;
	$res = [];

	$result = mysqli_query($SiteConn,  "SELECT tudr.*, dl.degree, unc.university
										FROM   talent_university_degree_relation tudr
										LEFT JOIN talent_degree_listing dl on tudr.tdur_dgree_id = dl.id
										LEFT JOIN talent_university_listing unc on tudr.tdur_university_id = unc.id
										where  tudr.tdur_user_id = ".(int)$userID);
	while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
		$res[] = $row;
	}
	mysqli_free_result($result);
	return $res;
}


function getGOOGLEUserInfo(){
	if(isset($_GET['code'])){
		$params = array(
			'client_id'     => auth_google_app_id,
			'client_secret' => auth_google_app_secret,
			'redirect_uri'  => auth_google_redirect,
			'grant_type'    => 'authorization_code',
			'code'          => $_GET['code']
		);

		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, 'https://accounts.google.com/o/oauth2/token');
		curl_setopt($curl, CURLOPT_POST, 1);
		curl_setopt($curl, CURLOPT_POSTFIELDS, urldecode(http_build_query($params)));
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		$result = curl_exec($curl);
		curl_close($curl);
		$tokenInfo = json_decode($result, true);
		if(isset($tokenInfo['access_token'])){
			$params['access_token'] = $tokenInfo['access_token'];
			$userInfo = json_decode(file_get_contents('https://www.googleapis.com/oauth2/v1/userinfo?'.urldecode(http_build_query($params))), true);
			if(isset($userInfo['id'])){
				return $userInfo;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}else{
		return false;
	}
}

function getFBUserInfo(){
	if(isset($_GET['code'])){
		$params = array(
			'client_id'       => auth_fb_app_id,
			'redirect_uri'    => auth_fb_redirect,
			'client_secret'   => auth_fb_app_secret,
			'code'            => $_GET['code'],
		);
		$tokenInfo = null;
		$tokenInfo = json_decode(file_get_contents('https://graph.facebook.com/oauth/access_token?'.http_build_query($params)));
		if(isset($tokenInfo->access_token)){
			$params = array('access_token' => $tokenInfo->access_token);
			$userInfo = json_decode(file_get_contents('https://graph.facebook.com/me?fields=id,first_name,last_name,email&appsecret_proof='.hash_hmac('sha256', $tokenInfo->access_token, auth_fb_app_secret).'&'.urldecode(http_build_query($params))), true);
			if(isset($userInfo['id'])){
				return $userInfo;
			}
		}
	}else{
		return false;
	}
}


//===GET REGISTER INFO FB for RECRUITER===
function siteGetRegisterInfoRecruiterFB(){
	if(isset($_GET['reg_recruiter_fb'])){
		$userInfo = getFBUserInfo();

		if($userInfo){
			$GLOBALS['get_recruiter_fb_fname'] = htmlspecialchars($userInfo['first_name']);
			$GLOBALS['get_recruiter_fb_lname'] = htmlspecialchars($userInfo['last_name']);
			$GLOBALS['get_recruiter_fb_email'] = htmlspecialchars($userInfo['email']);
		}else{
			$GLOBALS['SiteError'] = 'You are not logged in FB';
		}
	}
}


//===GET REGISTER INFO FB for EMPLOYER===
function siteGetRegisterInfoEmployerFB(){
	if(isset($_GET['reg_employer_fb'])){
		$userInfo = getFBUserInfo();

		if($userInfo){
			$GLOBALS['get_employer_fb_fname'] = htmlspecialchars($userInfo['first_name']);
			$GLOBALS['get_employer_fb_lname'] = htmlspecialchars($userInfo['last_name']);
			$GLOBALS['get_employer_fb_email'] = htmlspecialchars($userInfo['email']);
		}else{
			$GLOBALS['SiteError'] = 'You are not logged in FB';
		}
	}
}


//===GET REGISTER INFO FB for TALENT===
function siteGetRegisterInfoTalentFB(){
	if(isset($_GET['reg_talent_fb'])){
		$userInfo = getFBUserInfo();

		if($userInfo){
			$GLOBALS['get_talent_fb_fname'] = htmlspecialchars($userInfo['first_name']);
			$GLOBALS['get_talent_fb_lname'] = htmlspecialchars($userInfo['last_name']);
			$GLOBALS['get_talent_fb_email'] = htmlspecialchars($userInfo['email']);
		}else{
			$GLOBALS['SiteError'] = 'You are not logged in FB';
		}
	}
}


//===AUTH FB===
function siteAuthFB(){
	if(isset($_GET['auth_fb'])){
		$userInfo = getFBUserInfo();
		if($userInfo){
			if(isset($userInfo['email'])){
				siteAuthUserByEmail($userInfo['email']);
			}else{
				$GLOBALS['SiteError'] .= 'FB didn\'t provide email! ';
			}
		}else{
			$GLOBALS['SiteError'] .= 'You are not logged in FB! ';
		}
	}
}

//===AUTH GOOGLE===
function siteAuthGOOGLE(){
	if(isset($_GET['auth_google'])){
		$userInfo = getGOOGLEUserInfo();

		if($userInfo){
			siteAuthUserByEmail($userInfo['email']);
		}else{
			$GLOBALS['SiteError'] = 'You are not logged in google';
		}
	}
}

//===GET REGISTER INFO GOOGLE for RECRUITER===
function siteGetRegisterInfoRecruiterGOOGLE(){
	if(isset($_GET['reg_recruiter_google'])){
		$userInfo = getGOOGLEUserInfo();

		if($userInfo){
			$GLOBALS['get_recruiter_google_fname'] = htmlspecialchars($userInfo['given_name']);
			$GLOBALS['get_recruiter_google_lname'] = htmlspecialchars($userInfo['family_name']);
			$GLOBALS['get_recruiter_google_email'] = htmlspecialchars($userInfo['email']);
		}else{
			$GLOBALS['SiteError'] = 'You are not logged in google';
		}
	}
}

//===GET REGISTER INFO GOOGLE for TALENT===
function siteGetRegisterInfoTalentGOOGLE(){
	if(isset($_GET['reg_talent_google'])){
		$userInfo = getGOOGLEUserInfo();
		if($userInfo){

			$GLOBALS['get_talent_google_fname'] = htmlspecialchars($userInfo['given_name']);
			$GLOBALS['get_talent_google_lname'] = htmlspecialchars($userInfo['family_name']);
			$GLOBALS['get_talent_google_email'] = htmlspecialchars($userInfo['email']);
		}else{
			$GLOBALS['SiteError'] = 'You are not logged in google';
		}
	}
}

//===GET REGISTER INFO GOOGLE for EMPLOYER===
function siteGetRegisterInfoEmployerGOOGLE(){
	if(isset($_GET['reg_employer_google'])){
		$userInfo = getGOOGLEUserInfo();

		if($userInfo){
			$GLOBALS['get_imployer_google_fname'] = htmlspecialchars($userInfo['given_name']);
			$GLOBALS['get_imployer_google_lname'] = htmlspecialchars($userInfo['family_name']);
			$GLOBALS['get_imployer_google_email'] = htmlspecialchars($userInfo['email']);
		}else{
			$GLOBALS['SiteError'] = 'You are not logged in google';
		}
	}
}

//===auth user on site by email===
function siteAuthUserByEmail($useremail){
	global $SiteConn;

	if(siteGetEmailCount($useremail)==1){
		$result = mysqli_query($SiteConn,  "SELECT useremail, password
											FROM   user
											where  useremail = '".mysqli_real_escape_string($SiteConn, $useremail)."' ");
		while($row = mysqli_fetch_array($result, MYSQLI_NUM)){
			siteAuth($row[0], $row[1]);
		}
		mysqli_free_result($result);
	}else{
		$GLOBALS['SiteError'] = 'Email is not registered on the site.';
	}
}

//===self url===
function getSelfURL(){
  if (getenv('ENVIRONMENT')) {
    return "https://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'].'/';
  } else {
	  return (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ?"https" : "http")."://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'].'/';
  }
}

//===home url===
function getHomeURL(){
  if (getenv('ENVIRONMENT')) {
    return "https://".$_SERVER['HTTP_HOST'].'/';
  } else {
    return (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ?"https" : "https")."://".$_SERVER['HTTP_HOST'].'/';
  }
}

//===set vacancy state===
function setVacancyState($vacID, $vacState){
	global $SiteConn;
	mysqli_query($SiteConn, "UPDATE job_listing
							 set    jd_status  = ".(int)$vacState."
									where  jd_user_id = ".(int)$_SESSION['SiteUser']['id']."
											and
										   id         = ".(int)$vacID);
}

//===getting array positions===
function getArrpos(){
	global $SiteConn;

	$result = mysqli_query($SiteConn,  "SELECT j.*
										FROM   job j, job_detail jd
										where  j.job_id = jd.jd_job_id
										group  by j.job_id
										order  by job_name");
	return mysqli_fetch_all($result, MYSQLI_NUM);
}

//===getting array user haved vacancie in favorite===
function getListUserVacancyFavorite($vacID){
	global $SiteConn;

	$result = mysqli_query($SiteConn,  "SELECT *
										FROM   job_listing_like
										where  jll_job_listing_id = ".(int)$vacID);
	return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

//===getting array user haved vacancie in favorite===
function getUserInfo($userID){
	global $SiteConn;

	$result = mysqli_query($SiteConn,  "SELECT *
										FROM   user
										where  id = ".(int)$userID);
	$arr = mysqli_fetch_all($result, MYSQLI_ASSOC);
	return ($arr ?$arr[0] :[]);
}

//===getting array talent job details===
function getTalentJobDetailArr($userID){
	global $SiteConn;

	$result = mysqli_query($SiteConn,  "SELECT jd.jd_id, jd.jd_name
										FROM   user_talent_job_detail_relation utr
                                        left   join job_detail jd on utr.ujr_job_detail_id = jd.jd_id
										where  ujr_user_id = ".(int)$userID);
	return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

//===getting array positions details===
function getArrposDetail($posID=0){
	global $SiteConn;

	$result = mysqli_query($SiteConn,  "SELECT * 
										FROM   job_detail 
										where  jd_job_id = ".(int)$posID." 
										order  by jd_name");
	return mysqli_fetch_all($result, MYSQLI_NUM);
}

//===getting array positions details===
function getArrposDetailDopAll($jobID=0){
	global $SiteConn;

	$result = mysqli_query($SiteConn,  "SELECT * 
										FROM   job_detail_add
										".((int)$jobID ?'where jda_job_id = '.(int)$jobID :'')."
										order  by jda_name");
	return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

//===getting full array positions details===
function getArrposDetailAll(){
	global $SiteConn;
	$res = [];
	$result = mysqli_query($SiteConn,  "SELECT * 
										FROM job_detail 
										order by jd_job_id");
	while($row = mysqli_fetch_array($result, MYSQLI_NUM)){
		$res[] = $row;
	}
	mysqli_free_result($result);
	return $res;
}

//===error message===
function SiteError($msg){
	if($msg){
		return '<div class="SiteError">'.$msg.'</div>';
	}
}

//===REQUEST TO RESET PASSWORD===
function siteRequestResetPass($email){
	GLOBAL $SiteConn;
	$res = '';

	$email = mysqli_real_escape_string($SiteConn, htmlspecialchars($email));
	$result1 = mysqli_query($SiteConn, "SELECT * FROM user 
									    WHERE  useremail = '".$email."'
									    limit  1 ");
	if($row1 = mysqli_fetch_assoc($result1)){
		$rcode = rand(0, 9).rand(0, 9).rand(0, 9).substr(time(), -5).rand(0, 9).rand(0, 9);
		mysqli_query($SiteConn, "UPDATE user 
								 set    password_ch_code = '".$rcode."'
										WHERE  useremail = '".$email."' ");
		$subject = 'Restore password.';
		$urlreset = getHomeURL.'login-page-restorepass.php?user_forgot_resetcode='.$rcode;
		$message = siteGetContent(5);
		$message = str_replace('{{subject}}', 'Reset password', $message);
		$message = str_replace('{first_name}', $row1['first_name'].' '.$row1['last_name'], $message);
		$message = str_replace('{url_confirmed}', $urlreset, $message);
		if(siteMail($email, $subject, $message)){
			$res = 1;
		}else{
			$res = 'Something is wrong! Try later.';
		}
	}else{
		$res = 'Email not found. ['.$email.']';
	}
	mysqli_free_result($result1);
	return $res;
}

//===EMAILING===
function siteMail($to, $subject, $content){
	if(filter_var($to, FILTER_VALIDATE_EMAIL)){
		$email = new \SendGrid\Mail\Mail();
		$email->setFrom('super@wona.com', 'Wona User');
		$email->setSubject($subject);
		$email->addTo($to, 'Wona site');
		$email->addContent('text/html', $content); // "text/plain"
		$sendgrid = new \SendGrid(SendGridKeySec);
		try{
			$response = $sendgrid->send($email);
			return true;
			// print $response->statusCode();
			// print_r($response->headers());
			// print $response->body();
		}catch(Exception $e){
			//echo $e->getMessage();
			return false;
		}
	}else{
		return false;
	}
}

//===WET NEW PASSWORD===
function siteResetPass($password, $password_conf, $user_forgot_reset){
	GLOBAL $SiteConn;
	$res = '';

	if($password == $password_conf){
		$user_forgot_reset = mysqli_real_escape_string($SiteConn, htmlspecialchars($user_forgot_reset));
		$password          = mysqli_real_escape_string($SiteConn, $password);
		$result = mysqli_query($SiteConn, "SELECT * FROM user 
										   WHERE  password_ch_code = '".$user_forgot_reset."'
										   limit  1 ");
		if($row = mysqli_fetch_assoc($result)){
			$result1 = mysqli_query($SiteConn,  "UPDATE user 
												set    password          = '".$password."',
													   password_ch_code  = ''
												WHERE  password_ch_code  = '".$user_forgot_reset."' ");
			mysqli_free_result($result1);
			$res = 'Password changed.';
		}else{
			$res = 'Link already used.';
		}
		mysqli_free_result($result);
	}else{
		$res = 'Passwords do not match.';
	}

	return $res;
}

//===AUTH USER===
function siteAuth($useremail, $password){
	GLOBAL $SiteConn;

	if(session_status() == PHP_SESSION_NONE){
		session_start();
	}

	$_SESSION['SiteUser'] = [];

	$result = mysqli_query($SiteConn, "SELECT *
									   FROM user 
									   WHERE  useremail = '".mysqli_real_escape_string($SiteConn, htmlspecialchars($useremail))."' 
												AND
											  password  = '".mysqli_real_escape_string($SiteConn, $password)."'
									   limit  1 ");
	if($row = mysqli_fetch_assoc($result)){
		if($row['confirm']==1){
			$_SESSION['SiteUser'] = $row;

			if(!$row['cometchat_uid']){
				$userInfo = array('name'=> $row['first_name'].' '.$row['last_name'], 'uid'=>($row['id']));
				$uid = createUserApiOfCometchat("POST", "https://api-eu.cometchat.io/v2.0/users", json_encode($userInfo));
				if(mysqli_query($SiteConn, "UPDATE  user 
											SET     cometchat_uid = ".(int)$uid." 
											WHERE   useremail = '".mysqli_real_escape_string($SiteConn, $useremail)."' ")){
					$_SESSION['SiteUser']['cometchat_uid'] = $uid;
				}
			}

			switch($_SESSION['SiteUser']['role']){
				case 'talent':
					header('location:'.getHomeURL.'talent_home.php');
					exit;
				case 'employer':
					header('location:'.getHomeURL.'employer_home.php');
					exit;
				case 'recruiter':
					header('location:'.getHomeURL.'recruiter_home.php');
					exit;
				case 'superadmin':
					header('location:'.getHomeURL.'dashboard.php');
					exit;
			}
		}else{
			$GLOBALS['SiteError'] = 'Your email has not been verified.';
		}
	}else{
		$GLOBALS['SiteError'] = 'Your PassWord or UserName is not Found';
	}
	mysqli_free_result($result);

	return $GLOBALS['SiteError'];
}


//===insert user post===
function SiteInsertPost(){
	GLOBAL $SiteConn;
	
	if(isset($_SESSION['SiteUser']['id']) && $_SESSION['SiteUser']['id']){
		if(isset($_POST['post_content']) && $_POST['post_content']){
			$result = mysqli_query($SiteConn,  "INSERT into
												posts  (user_id_p,                            content)
												values (".(int)$_SESSION['SiteUser']['id'].", '".mysqli_real_escape_string($SiteConn, htmlspecialchars($_POST['post_content']))."') ");
			$post_id = (int)mysqli_insert_id($SiteConn);
			if($result){
				if(isset($_FILES['post_image']['tmp_name']) && $_FILES['post_image']['tmp_name']){
					$ext = pathinfo($_FILES['post_image']['name']);
					$fname = $post_id.'.'.$ext['extension'];
					$uploadfile = dirname(__DIR__).'/user_data/post/'.$fname;
					if(move_uploaded_file($_FILES['post_image']['tmp_name'], $uploadfile)){
						mysqli_query($SiteConn, "UPDATE posts
												 SET    post_image = '".mysqli_real_escape_string($SiteConn, htmlspecialchars($fname))."'
												 WHERE  post_id    = ".(int)$post_id." ");
					}else{
						$GLOBALS['SiteError'] .= 'File cannot uploaded! ';
					}
				}
				if(isset($_FILES['post_image']['error']) && $_FILES['post_image']['error'] > 0){
					$GLOBALS['SiteError'] .= 'File cannot uploaded! Error:'.$_FILES['post_image']['error'].'. ';
				}
			}
		}
	}else{
		$GLOBALS['SiteError'] .= 'Only authorized user! ';
	}
}


//===GETTING SITE CONTENT PAGE===
function siteGetContent($contentID){
	GLOBAL $SiteConn;

	$result = mysqli_query($SiteConn, "SELECT *
									   FROM   content 
									   WHERE  c_id = '".(int)$contentID."'
									   limit  1 ");
	if($row = mysqli_fetch_assoc($result)){
		return $row['c_data'];
	}
	mysqli_free_result($result);
}


//===Confirmation email===
function siteConfirmEMail($emailCode){
	GLOBAL $SiteConn;

	$result = mysqli_query($SiteConn, "SELECT id, useremail, email_confirmation_code, password, first_name
									   FROM   user 
									   WHERE  email_confirmation_code = '".mysqli_real_escape_string($SiteConn, $emailCode)."'
									   limit  1 ");
	if($row = mysqli_fetch_assoc($result)){
		mysqli_query($SiteConn, "UPDATE user
								 SET    email_confirmation_code = '', confirm = 1
								 WHERE  id = ".(int)$row['id']);

		$subject = 'Hello user!';
		$message = siteGetContent(3);
		$message = str_replace('{{subject}}', 'Hello new user', $message);
		$message = str_replace('{first name}', $row['first_name'], $message);
		siteMail($row['useremail'], $subject, $message);
		siteAuth($row['useremail'], $row['password']);
	}else{
		$GLOBALS['SiteError'] .= 'Email verification failed. ';
	}
	mysqli_free_result($result);
}


//===SEND EMAIL for confirm new email address===
function siteSendMailConfirmEMail($user_id){
	GLOBAL $SiteConn;

	$result = mysqli_query($SiteConn, "SELECT *
									   FROM   user 
									   WHERE  id = ".(int)$user_id."
									   limit  1 ");
	if($row = mysqli_fetch_assoc($result)){
		//===SEND MAIL FOR CONFIRM NEW EMAIL===
		$useremailcode = rand(0, 9).rand(0, 9).rand(0, 9).substr(time(), -5).rand(0, 9).rand(0, 9);
		mysqli_query($SiteConn, "UPDATE user
								 SET    email_confirmation_code = '".mysqli_real_escape_string($SiteConn, $useremailcode)."'
								 WHERE  id = ".(int)$user_id);
		$url = getHomeURL.'login-page.php?email_confirmation_code='.$useremailcode;
		$subject = 'Confirmation email.';
		$message = siteGetContent(1);
		$message = str_replace('{{subject}}', 'Email confirmation', $message);
		$message = str_replace('{first_name}', $row['first_name'], $message);
		$message = str_replace('{url_confirmed}', $url, $message);
		return siteMail($row['useremail'], $subject, $message);
	}else{
		return false;
	}
}


//===SEND EMAIL for frend===
function siteSendMailFriend($useremail, $first_name){
	GLOBAL $SiteConn;
	
	if(filter_var($useremail, FILTER_VALIDATE_EMAIL)){
		$url = getHomeURL.'login-page.php';
		$subject = 'Invitation email.';
		$message = siteGetContent(2);
		$message = str_replace('{{subject}}', 'Invitation email.', $message);
		$message = str_replace('{Senders First Name}', $first_name, $message);
		$message = str_replace('{url_confirmed}', $url, $message);
		return siteMail($useremail, $subject, $message);
	}else{
		return false;
	}
}


//===Getting ID dop experiance===
function getIDDetailDop($expName, $jda_job_id){
	GLOBAL $SiteConn;
	
	$result = mysqli_query($SiteConn, "SELECT jda_id
									   FROM   job_detail_add 
									   WHERE  jda_name = '".mysqli_real_escape_string($SiteConn, $expName)."'
									   limit  1 ");
	if($row = mysqli_fetch_assoc($result)){
		return $row['jda_id'];
	}else{
		mysqli_query($SiteConn,"INSERT into
								job_detail_add (jda_job_id, jda_name )
								values         (".(int)$jda_job_id.",  '".mysqli_real_escape_string($SiteConn, $expName)."' ) ");
		return (int)mysqli_insert_id($SiteConn);
	}
	mysqli_free_result($result);
}


//===getting list univercity===
function getListUnivercity($uncity_like){
	GLOBAL $SiteConn;
	
	if($uncity_like){
		$query = "SELECT * FROM talent_university_listing
				  WHERE  university LIKE '%".mysqli_real_escape_string($SiteConn, $uncity_like)."%'
				  limit  5";
		$result = mysqli_query($SiteConn, $query);  
		$res = '<ul class="edu_univer_ul">';  
		if(mysqli_num_rows($result) > 0){
			while($row = mysqli_fetch_array($result)){
				$res .= '<li value="'.$row['id'].'">'.htmlspecialchars($row['university']).'</li>';
			}  
		}else{  
			$res .= '<li>University Not Found</li>';  
		}  
		$res .= '</ul>';
		echo $res;
	}
	exit();
}


//===getting list degree===
function getListDegree($degree_like){
	GLOBAL $SiteConn;
	
	if($degree_like){
		$query = "SELECT * 
				  FROM   talent_degree_listing
				  WHERE  degree LIKE '%".mysqli_real_escape_string($SiteConn, $degree_like)."%'
				  limit  5";
		$result = mysqli_query($SiteConn, $query);  
		$res = '<ul class="edu_degree_ul">';  
		if(mysqli_num_rows($result) > 0){
			while($row = mysqli_fetch_array($result)){
				$res .= '<li value="'.$row['id'].'">'.$row['degree'].'</li>';
			}
		}else{
			$res .= '<li>Degree List Not Found</li>';
		}
		$res .= '</ul>'; 
		echo $res;
	}
	exit();
}

//=== search in TALENT Wishlist 1-6===
function search_talent_wishlist($title_like, $wlID=1){
	GLOBAL $SiteConn;
	
	if($title_like && in_array($wlID, [1,2,3,4,5,6])){
		$query = "SELECT * 
				  FROM   talent_wishlist_".(int)$wlID."
				  WHERE  o_name_options LIKE '%".mysqli_real_escape_string($SiteConn, $title_like)."%'
				  limit  5";
		$result = mysqli_query($SiteConn, $query);  
		$res = '<ul class="wishlist__selected-list">';  
		if(mysqli_num_rows($result) > 0){
			while($row = mysqli_fetch_array($result)){
				$res .= '<li value="'.$row['o_id'].'">'.$row['o_name_options'].'</li>';
			}
		}else{
			$res .= '<div>Not Found</div>';
		}
		$res .= '</ul>'; 
		echo $res;
	}
}


//===get user skill 1-5===
function getUserSkilName($userID, $skilID=1){
	GLOBAL $SiteConn;
	if(in_array((int)$skilID, [1,2,3,4,5])){
		$query = "SELECT jd.jda_name as s_name
				  FROM   user u
				  left join job_detail_add jd on u.talent_add_exp_".(int)$skilID." = jd.jda_id
				  WHERE  u.id = ".(int)$userID;
		$result = mysqli_query($SiteConn, $query);  
		while($row = mysqli_fetch_array($result)){
			return $row['s_name'];
		}
	}
}


//===get array from wishlist 1-6 user===
function getWishListUserArr($userID, $wlID){
	GLOBAL $SiteConn;
	if(in_array((int)$wlID, [1,2,3,4,5,6])){
		$query = "SELECT wl.o_name_options as name
				  FROM   talent_wishlist_".(int)$wlID."_relation wlr
				  left join talent_wishlist_".(int)$wlID." wl on wlr.twr_wl_id = wl.o_id
				  where  wlr.twr_user_id = ".(int)$userID."
				  order  by wl.o_name_options";
		$result = mysqli_query($SiteConn, $query);  
		return mysqli_fetch_all($result, MYSQLI_ASSOC);
	}else{
		return [];
	}
}


//===get currency name===
function getCurrencyName($currID=0){
	GLOBAL $SiteConn;
	
	$query = "SELECT cur_name 
			  FROM   currency
			  WHERE  cur_id = ".(int)$currID;
	$result = mysqli_query($SiteConn, $query);  
	while($row = mysqli_fetch_array($result)){
		return $row['cur_name'];
	}
}


//===get currency array===
function getCurrencyArr($currID=0){
	GLOBAL $SiteConn;
	
	$query = "SELECT * 
			  FROM   currency
			  order  by cur_name";
	$result = mysqli_query($SiteConn, $query);  
	return mysqli_fetch_all($result, MYSQLI_ASSOC);
}


//===get info1 list===
function getRegJobSearchArr(){
	GLOBAL $SiteConn;
	
	$query = "SELECT uij_id, uij_name
			  FROM   user_info_jobsearch
			  order  by uij_name";
	$result = mysqli_query($SiteConn, $query);  
	return mysqli_fetch_all($result, MYSQLI_ASSOC);
}


//===get info1 name===
function getRegJobSearchName($iID=0){
	GLOBAL $SiteConn;
	
	$query = "SELECT uij_id, uij_name
			  FROM   user_info_jobsearch
			  WHERE  uij_id = ".(int)$iID;
	$result = mysqli_query($SiteConn, $query);  
	while($row = mysqli_fetch_array($result)){
		return $row['uij_name'];
	}
}


//===REGISTER TALENT===
function SiteRegisterTalent(){
	GLOBAL $SiteConn;
	$useremail = (isset($_POST['useremail']) ?mysqli_real_escape_string($SiteConn, htmlspecialchars($_POST['useremail'])) :'');
	
	if(filter_var($useremail, FILTER_VALIDATE_EMAIL)){
		if(siteGetEmailCount($useremail)==0){
			//print_r($_POST);
			$first_name                 = mysqli_real_escape_string($SiteConn, htmlspecialchars($_POST['first_name']));
			$last_name                  = mysqli_real_escape_string($SiteConn, htmlspecialchars($_POST['last_name']));
			$password                   = mysqli_real_escape_string($SiteConn, htmlspecialchars($_POST['password']));
			$phone                      = mysqli_real_escape_string($SiteConn, htmlspecialchars($_POST['phone']));
			$email_receive_subsequent   = (isset($_POST['email_receive_subsequent']) ?1 :0);
			$talent_job                 = (int)$_POST['talent_job'];
			$talent_job_experience      = mysqli_real_escape_string($SiteConn, htmlspecialchars($_POST['talent_job_experience']));
			$talent_add_exp_1           = (isset($_POST['talent_add_exp_1']) && $_POST['talent_add_exp_1'] ?(int)getIDDetailDop($_POST['talent_add_exp_1'], $talent_job) :0);
			$talent_add_exp_2           = (isset($_POST['talent_add_exp_2']) && $_POST['talent_add_exp_2'] ?(int)getIDDetailDop($_POST['talent_add_exp_2'], $talent_job) :0);
			$talent_add_exp_3           = (isset($_POST['talent_add_exp_3']) && $_POST['talent_add_exp_3'] ?(int)getIDDetailDop($_POST['talent_add_exp_3'], $talent_job) :0);
			$talent_add_exp_4           = (isset($_POST['talent_add_exp_4']) && $_POST['talent_add_exp_4'] ?(int)getIDDetailDop($_POST['talent_add_exp_4'], $talent_job) :0);
			$talent_add_exp_5           = (isset($_POST['talent_add_exp_5']) && $_POST['talent_add_exp_5'] ?(int)getIDDetailDop($_POST['talent_add_exp_5'], $talent_job) :0);
			$talent_employ_type_1       = (isset($_POST['talent_employ_type_1']) ?1 :0);
			$talent_employ_type_2       = (isset($_POST['talent_employ_type_1']) ?2 :0);
			$talent_employ_type_3       = (isset($_POST['talent_employ_type_1']) ?3 :0);
			$talent_searc_where         = (int)$_POST['talent_searc_where'];
			$talent_start_date          = date('Y-m-d H:i:s', (int)strtotime($_POST['talent_start_date']));
			$talent_remote              = (isset($_POST['talent_remote']) ?(int)$_POST['talent_remote'] :0);
			$talent_europe_auth         = (isset($_POST['talent_europe_auth'])      ?(int)$_POST['talent_europe_auth']      :0);
			$talent_immigration_help    = (isset($_POST['talent_immigration_help']) ?(int)$_POST['talent_immigration_help'] :0);
			$talent_sharing_mail_1      = (isset($_POST['talent_sharing_mail_1']) ?mysqli_real_escape_string($SiteConn, htmlspecialchars($_POST['talent_sharing_mail_1'])) :'');
			$talent_sharing_mail_2      = (isset($_POST['talent_sharing_mail_2']) ?mysqli_real_escape_string($SiteConn, htmlspecialchars($_POST['talent_sharing_mail_2'])) :'');
			$talent_sharing_mail_3      = (isset($_POST['talent_sharing_mail_3']) ?mysqli_real_escape_string($SiteConn, htmlspecialchars($_POST['talent_sharing_mail_3'])) :'');
			$talent_sharing_mail_4      = (isset($_POST['talent_sharing_mail_4']) ?mysqli_real_escape_string($SiteConn, htmlspecialchars($_POST['talent_sharing_mail_4'])) :'');
			$talent_sharing_mail_5      = (isset($_POST['talent_sharing_mail_5']) ?mysqli_real_escape_string($SiteConn, htmlspecialchars($_POST['talent_sharing_mail_5'])) :'');
			$talent_wishlist_1          = (isset($_POST['talent_wishlist_1']) ?(array)$_POST['talent_wishlist_1'] :[]);
			$talent_wishlist_2          = (isset($_POST['talent_wishlist_2']) ?(array)$_POST['talent_wishlist_2'] :[]);
			$talent_wishlist_3          = (isset($_POST['talent_wishlist_3']) ?(array)$_POST['talent_wishlist_3'] :[]);
			$talent_wishlist_4          = (isset($_POST['talent_wishlist_4']) ?(array)$_POST['talent_wishlist_4'] :[]);
			$talent_wishlist_5          = (isset($_POST['talent_wishlist_5']) ?(array)$_POST['talent_wishlist_5'] :[]);
			$talent_wishlist_6          = (isset($_POST['talent_wishlist_6']) ?(array)$_POST['talent_wishlist_6'] :[]);
			$talent_salary_currency     = (int)$_POST['talent_salary_currency'];
			$talent_salary              = (int)str_replace('.', '', str_replace(',', '', $_POST['talent_salary']));
			$talent_url_lin             = mysqli_real_escape_string($SiteConn, htmlspecialchars($_POST['talent_url_lin']));
			$talent_url_portfolio       = mysqli_real_escape_string($SiteConn, htmlspecialchars($_POST['talent_url_portfolio']));
			$talent_url_portfolio_pass  = mysqli_real_escape_string($SiteConn, htmlspecialchars($_POST['talent_url_portfolio_pass']));
			$talent_url_github          = mysqli_real_escape_string($SiteConn, htmlspecialchars($_POST['talent_url_github']));
			$talent_workexp_company     = (isset($_POST['talent_workexp_company'])     ?(array)$_POST['talent_workexp_company']     :[]);
			$talent_workexp_title       = (isset($_POST['talent_workexp_title'])       ?(array)$_POST['talent_workexp_title']       :[]);
			$talent_workexp_start_year  = (isset($_POST['talent_workexp_start_year'])  ?(array)$_POST['talent_workexp_start_year']  :[]);
			$talent_workexp_start_month = (isset($_POST['talent_workexp_start_month']) ?(array)$_POST['talent_workexp_start_month'] :[]);
			$talent_workexp_and_year    = (isset($_POST['talent_workexp_and_year'])    ?(array)$_POST['talent_workexp_and_year']    :[]);
			$talent_workexp_and_month   = (isset($_POST['talent_workexp_and_month'])   ?(array)$_POST['talent_workexp_and_month']   :[]);
			$talent_workexp_corrent     = (isset($_POST['talent_workexp_corrent'])     ?(array)$_POST['talent_workexp_corrent']     :[]);
			$talent_workexp_descript    = (isset($_POST['talent_workexp_descript'])    ?(array)$_POST['talent_workexp_descript']    :[]);
			$talent_eduexp_id           = (array)$_POST['talent_eduexp_id'];
			$talent_eduexp_degree_id    = (array)$_POST['talent_eduexp_degree_id'];
			$talent_eduexp_year         = (array)$_POST['talent_eduexp_year'];
			$talent_want_area_country   = (isset($_POST['talent_want_area_country'])   ?(array)$_POST['talent_want_area_country'] :[]);
			$talent_want_area_city      = (isset($_POST['talent_want_area_city'])      ?(array)$_POST['talent_want_area_city']    :[]);
			$job_detail                 = (isset($_POST['job_detail'])                 ?(array)$_POST['job_detail'] :[]);
			$job_detail_experience      = (isset($_POST['job_detail_experience'])      ?(array)$_POST['job_detail_experience'] :[]);
			$talent_country             = mysqli_real_escape_string($SiteConn,         htmlspecialchars($_POST['talent_country']));
			$talent_city                = mysqli_real_escape_string($SiteConn,         htmlspecialchars($_POST['talent_city']));
			
			$sql = "INSERT into
					user(role, useremail, password, first_name, last_name, phone, email_receive_subsequent, talent_job, talent_job_experience, talent_add_exp_1, talent_add_exp_2, talent_add_exp_3,
						 talent_add_exp_4, talent_add_exp_5, talent_employ_type_1, talent_employ_type_2, talent_employ_type_3, talent_searc_where, talent_start_date, talent_remote, 
						 talent_europe_auth, talent_immigration_help, talent_sharing_mail_1, talent_sharing_mail_2, talent_sharing_mail_3, talent_sharing_mail_4, talent_sharing_mail_5,
						 talent_salary_currency, talent_salary, talent_url_lin, talent_url_portfolio, talent_url_portfolio_pass, talent_url_github, employer_country, employer_state)
					values('talent', '".$useremail."', '".$password."', '".$first_name."', '".$last_name."', '".$phone."', ".$email_receive_subsequent.", ".$talent_job.", '".$talent_job_experience."',
						   ".$talent_add_exp_1.", ".$talent_add_exp_2.", ".$talent_add_exp_3.", ".$talent_add_exp_4.", ".$talent_add_exp_5.", ".$talent_employ_type_1.", ".$talent_employ_type_2.",
						   ".$talent_employ_type_3.", ".$talent_searc_where.", '".$talent_start_date."', ".$talent_remote.", ".$talent_europe_auth.", ".$talent_immigration_help.",
						   '".$talent_sharing_mail_1."', '".$talent_sharing_mail_2."', '".$talent_sharing_mail_3."', '".$talent_sharing_mail_4."', '".$talent_sharing_mail_5."',
						   ".$talent_salary_currency.", ".$talent_salary.", '".$talent_url_lin."', '".$talent_url_portfolio."', '".$talent_url_portfolio_pass."', '".$talent_url_github."',
						   '".$talent_country."', '".$talent_city."') ";
			$result = mysqli_query($SiteConn, $sql);
			if($result){
				$user_id = (int)mysqli_insert_id($SiteConn);

				if(siteSendMailConfirmEMail($user_id)!==true){
					$GLOBALS['SiteError'] .= 'Error sending confirmation mail! ';
				}

				if($email_receive_subsequent){
					//siteSetUserMailing($user_id, $useremail, 111);
				}
				
				//===ADD education experience===
				if($talent_eduexp_id){
					for($i=0;$i<count($talent_eduexp_id);$i++){
						$college_id = (int)$talent_eduexp_id[$i];
						$dgree_id   = (int)$talent_eduexp_degree_id[$i];
						$ed_year    = (int)$talent_eduexp_year[$i];
						if($college_id){
							$sql = "INSERT into
									talent_university_degree_relation(tdur_user_id,      tdur_university_id, tdur_dgree_id, tdur_year )
									values                           (".(int)$user_id.", ".$college_id.",    ".$dgree_id.", ".$ed_year." ) ";
							if(!mysqli_query($SiteConn, $sql)){
								$GLOBALS['SiteError'] .= 'Error adding education! ';
							}
						}
					}
				}
				
				//===wishlist 1===
				if($talent_wishlist_1){
					foreach($talent_wishlist_1 as $talent_wishlist_i){
						if($talent_wishlist_i){
							$sql = "INSERT into
									talent_wishlist_1_relation(twr_user_id,       twr_wl_id )
									values                    (".$user_id.", ".(int)$talent_wishlist_i." ) ";
							mysqli_query($SiteConn, $sql);
						}
					}
				}
				
				//===wishlist 2===
				if($talent_wishlist_2){
					foreach($talent_wishlist_2 as $talent_wishlist_i){
						if($talent_wishlist_i){
							$sql = "INSERT into
									talent_wishlist_2_relation(twr_user_id,       twr_wl_id )
									values                    (".$user_id.", ".(int)$talent_wishlist_i." ) ";
							mysqli_query($SiteConn, $sql);
						}
					}
				}
				
				//===wishlist 3===
				if($talent_wishlist_3){
					foreach($talent_wishlist_3 as $talent_wishlist_i){
						if($talent_wishlist_i){
							$sql = "INSERT into
									talent_wishlist_3_relation(twr_user_id,       twr_wl_id )
									values                    (".$user_id.", ".(int)$talent_wishlist_i." ) ";
							mysqli_query($SiteConn, $sql);
						}
					}
				}
				
				//===wishlist 4===
				if($talent_wishlist_4){
					foreach($talent_wishlist_4 as $talent_wishlist_i){
						if($talent_wishlist_i){
							$sql = "INSERT into
									talent_wishlist_4_relation(twr_user_id,       twr_wl_id )
									values                    (".$user_id.", ".(int)$talent_wishlist_i." ) ";
							mysqli_query($SiteConn, $sql);
						}
					}
				}
				
				//===wishlist 5===
				if($talent_wishlist_5){
					foreach($talent_wishlist_5 as $talent_wishlist_i){
						if($talent_wishlist_i){
							$sql = "INSERT into
									talent_wishlist_5_relation(twr_user_id,       twr_wl_id )
									values                    (".$user_id.", ".(int)$talent_wishlist_i." ) ";
							mysqli_query($SiteConn, $sql);
						}
					}
				}
				
				//===wishlist 6===
				if($talent_wishlist_6){
					foreach($talent_wishlist_6 as $talent_wishlist_i){
						if($talent_wishlist_i){
							$sql = "INSERT into
									talent_wishlist_6_relation(twr_user_id,       twr_wl_id )
									values                    (".$user_id.", ".(int)$talent_wishlist_i." ) ";
							mysqli_query($SiteConn, $sql);
						}
					}
				}

				//===add users to mailing in mailchimp===
				if($talent_sharing_mail_1){
					siteSendMailFriend($talent_sharing_mail_1, $first_name);
				}
				if($talent_sharing_mail_2){
					siteSendMailFriend($talent_sharing_mail_2, $first_name);
				}
				if($talent_sharing_mail_3){
					siteSendMailFriend($talent_sharing_mail_3, $first_name);
				}
				if($talent_sharing_mail_4){
					siteSendMailFriend($talent_sharing_mail_4, $first_name);
				}
				if($talent_sharing_mail_5){
					siteSendMailFriend($talent_sharing_mail_5, $first_name);
				}

				//===ADD Job && Job detail===
				if($job_detail){
					for($i=0;$i<count($job_detail);$i++){
						$ujr_job_detail_id          = mysqli_real_escape_string($SiteConn, htmlspecialchars($job_detail[$i]));
						$ujr_job_detail_experience  = mysqli_real_escape_string($SiteConn, htmlspecialchars($job_detail_experience[$i]));
						if($ujr_job_detail_id && $ujr_job_detail_experience){
							$sql = "INSERT into
									user_talent_job_detail_relation(ujr_user_id,  ujr_job_detail_id,        ujr_job_detail_experience)
									values                         (".$user_id.", '".$ujr_job_detail_id."', '".$ujr_job_detail_experience."') ";
							mysqli_query($SiteConn, $sql);
						}
					}
				}
				
				//===ADD wanted locations===
				if($talent_want_area_country){
					for($i=0;$i<count($talent_want_area_country);$i++){
						$utr_country = mysqli_real_escape_string($SiteConn, htmlspecialchars($talent_want_area_country[$i]));
						$utr_city    = mysqli_real_escape_string($SiteConn, htmlspecialchars($talent_want_area_city[$i]));
						if($utr_country && $utr_city){
							$sql = "INSERT into
									user_talent_region(utr_user_id, utr_country, utr_city)
									values(".$user_id.", '".$utr_country."', '".$utr_city."') ";
							mysqli_query($SiteConn, $sql);
						}
					}
				}
				
				//===upload resume===
				if(is_file($_FILES['talent_resume_url']['tmp_name']) && $_FILES['talent_resume_url']['error']>0){
					$GLOBALS['SiteError'] .= 'Error uploading file resume: ['.$_FILES['avatar']['error'].'] ';
				}
				if(is_file($_FILES['talent_resume_url']['tmp_name']) && filesize($_FILES['talent_resume_url']['tmp_name']) > resume_file_size){
					$GLOBALS['SiteError'] .= 'Error uploading file resume, file size more: '.resume_file_size.'B. ';
				}
				if(isset($_FILES['talent_resume_url']['tmp_name']) && $_FILES['talent_resume_url']['tmp_name'] && filesize($_FILES['talent_resume_url']['tmp_name']) < resume_file_size ){
					$ext = pathinfo($_FILES['talent_resume_url']['name']);
					$fname = $user_id.'.'.$ext['extension'];
					$uploadfile = dirname(__DIR__).'/user_data/resume/'.$fname;
					if(move_uploaded_file($_FILES['talent_resume_url']['tmp_name'], $uploadfile)){
						mysqli_query($SiteConn, "UPDATE user
												 SET    talent_resume_url = '".mysqli_real_escape_string($SiteConn, htmlspecialchars($fname))."'
												 WHERE  id = ".(int)$user_id." ");
					}else{
						$GLOBALS['SiteError'] .= 'File resume cannot uploaded! ';
					}
				}

				//===upload avatar===
				// if(is_file($_FILES['avatar']['tmp_name']) && $_FILES['avatar']['error']>0){
					// $GLOBALS['SiteError'] .= 'Error uploading file avatar: ['.$_FILES['avatar']['error'].'] ';
				// }
				// if(is_file($_FILES['avatar']['tmp_name']) && filesize($_FILES['avatar']['tmp_name']) > avatar_file_size){
					// $GLOBALS['SiteError'] .= 'Error uploading file resume, file size more: '.avatar_file_size.'B. ';
				// }
				// if(is_file($_FILES['avatar']['tmp_name']) && filesize($_FILES['avatar']['tmp_name']) < avatar_file_size){
					// $ext = pathinfo($_FILES['avatar']['name']);
					// $fname = $user_id.'.'.$ext['extension'];
					// $uploadfile = dirname(__DIR__).'/user_data/avatar/'.$fname;
					// if(move_uploaded_file($_FILES['avatar']['tmp_name'], $uploadfile)){
						// mysqli_query($SiteConn, "UPDATE user
												 // SET avatar = '".mysqli_real_escape_string($SiteConn, htmlspecialchars($fname))."'
												 // WHERE id = ".(int)$user_id." ");
					// }else{
						// $GLOBALS['SiteError'] .= 'File resume cannot uploaded! ';
					// }
				// }
				if($_POST['apload-img'] && strlen($_POST['apload-img']) < avatar_file_size){
					$fname = $user_id.'.jpg';
					$uploadfile = dirname(__DIR__).'/user_data/avatar/'.$fname;
					if($source = imagecreatefromstring(base64_decode(str_replace('data:image/jpeg;base64,', '', $_POST['apload-img'])))){
						if( imagejpeg($source, $uploadfile) ){
							imagedestroy($source);
							mysqli_query($SiteConn, "UPDATE user
													 SET    avatar = '".mysqli_real_escape_string($SiteConn, htmlspecialchars($fname))."'
													 WHERE  id = ".(int)$user_id);
						}else{
							$GLOBALS['SiteError'] .= 'File avatar cannot saved! ';
						}
					}else{
						$GLOBALS['SiteError'] .= 'File avatar cannot converted! ';
					}
				}
				
				//===ADD work experience===
				if($talent_workexp_company){
					// print_r($talent_workexp_company);
					// print_r($talent_workexp_title);
					// print_r($talent_workexp_start_year);
					// print_r($talent_workexp_start_month);
					// print_r($talent_workexp_and_year);
					// print_r($talent_workexp_and_month);
					// print_r($talent_workexp_corrent);
					// print_r($talent_workexp_descript);
					for($i=0;$i<count($talent_workexp_company);$i++){
						$we_company     = mysqli_real_escape_string($SiteConn, htmlspecialchars($talent_workexp_company[$i]));
						$we_title       = mysqli_real_escape_string($SiteConn, htmlspecialchars($talent_workexp_title[$i]));
						$we_start_year  = (int)$talent_workexp_start_year[$i];
						$we_start_month = (int)$talent_workexp_start_month[$i];
						$we_and_year    = (isset($talent_workexp_and_year[$i])  ?(int)$talent_workexp_and_year[$i]  :0);
						$we_and_month   = (isset($talent_workexp_and_month[$i]) ?(int)$talent_workexp_and_month[$i] :0);
						$we_current     = (isset($talent_workexp_corrent[$i])   ?1 :0);
						$we_description = mysqli_real_escape_string($SiteConn, htmlspecialchars($talent_workexp_descript[$i]));
						if($we_company){
							$sql = "INSERT into
									user_talent_work_experience(we_user_id, we_company, we_title, we_start_year, we_start_month, we_and_year, we_and_month, we_current, we_description)
									values(".$user_id.", '".$we_company."', '".$we_title."', ".$we_start_year.", ".$we_start_month.", ".$we_and_year.", ".$we_and_month.", ".$we_current.", '".$we_description."') ";
							mysqli_query($SiteConn, $sql);
						}
					}
				}

				$GLOBALS['SiteError'] .= 'User TALENT addad! Confirm your email before login. ';
			}else{
				$GLOBALS['SiteError'] .= 'Error User TALENT insert! ';
			}
		}else{
			$GLOBALS['SiteError'] .= 'User with this email already exists! ';
		}
	}else{
		$GLOBALS['SiteError'] .= 'Error! Email address is not valid. ['.$useremail.'] ';
	}
}


//===REGISTER EMPLOYER===
function SiteRegisterEmployer(){
	GLOBAL $SiteConn;
	$useremail = (isset($_POST['useremail']) ?mysqli_real_escape_string($SiteConn, htmlspecialchars($_POST['useremail'])) :'');
	
	if(filter_var($useremail, FILTER_VALIDATE_EMAIL)){
		if(siteGetEmailCount($_POST['useremail'])==0){
			//print_r($_POST);
			$first_name                = mysqli_real_escape_string($SiteConn, htmlspecialchars($_POST['first_name']));
			$last_name                 = mysqli_real_escape_string($SiteConn, htmlspecialchars($_POST['last_name']));
			$password                  = mysqli_real_escape_string($SiteConn, $_POST['password']);
			$phone                     = mysqli_real_escape_string($SiteConn, htmlspecialchars($_POST['phone']));
			$email_receive_subsequent  = (isset($_POST['email_receive_subsequent']) ?1 :0);
			$employer_job_title        = mysqli_real_escape_string($SiteConn, htmlspecialchars($_POST['employer_job_title']));
			$employer_company_name     = mysqli_real_escape_string($SiteConn, htmlspecialchars($_POST['employer_company_name']));
			$employer_employ_count     = mysqli_real_escape_string($SiteConn, htmlspecialchars($_POST['employer_employ_count']));
			$employer_country          = mysqli_real_escape_string($SiteConn, htmlspecialchars($_POST['employer_country']));
			$employer_city             = mysqli_real_escape_string($SiteConn, htmlspecialchars($_POST['employer_city']));
			$job_relation              = (isset($_POST['job_relation'])     ?(array)$_POST['job_relation'] :[]);
			$job_relation_new          = (isset($_POST['job_relation_new']) ?(array)$_POST['job_relation_new'] :[]);
			$reg_form_employer_wantloc = (isset($_POST['reg_form_employer_wantloc']) ?(array)$_POST['reg_form_employer_wantloc'] :[]);
			$employer_talent_v1        = (isset($_POST['employer_talent_v1']) ?1 :0);
			$employer_talent_v2        = (isset($_POST['employer_talent_v2']) ?1 :0);
			$employer_talent_v3        = (isset($_POST['employer_talent_v3']) ?1 :0);
			$employer_talent_v4        = (isset($_POST['employer_talent_v4']) ?1 :0);
			$employer_talent_v5        = (isset($_POST['employer_talent_v5']) ?1 :0);

			foreach($job_relation_new as $job_relation_new_i){
				$job_relation[] = siteInsertJob($job_relation_new_i);
			}
			
			$result = mysqli_query($SiteConn,  "INSERT into
												user  (confirm, role,       useremail,        password,        first_name,        last_name,        phone,        email_receive_subsequent,      employer_job_title,        employer_company_name,        employer_employ_count,        employer_country,        employer_city)
												values(1,       'employer', '".$useremail."', '".$password."', '".$first_name."', '".$last_name."', '".$phone."', ".$email_receive_subsequent.", '".$employer_job_title."', '".$employer_company_name."', '".$employer_employ_count."', '".$employer_country."', '".$employer_city."') ");
			if($result){
				$user_id = mysqli_insert_id($SiteConn);

				//siteSendMailConfirmEMail($user_id);
				$subject = 'Hello user!';
				$message = siteGetContent(3);
				$message = str_replace('{{subject}}', 'Hello new user', $message);
				$message = str_replace('{first name}', $first_name.'<br/>Company:'.$employer_company_name.'<br/>Login:'.$useremail.'<br/>Password:'.$password, $message);
				siteMail($useremail, $subject, $message);

				if($email_receive_subsequent){
					//siteSetUserMailing($user_id, $useremail, 111);
				}

				//===add employer jobs===
				if($job_relation){
					foreach($job_relation as $job_relationi){
						$sql = "INSERT into
								user_employer_job_relation(uejr_user_id, uejr_job_id)
								values                    (".$user_id.", '".$job_relationi."') ";
						mysqli_query($SiteConn, $sql);
					}
				}

				//===add employer locations===
				if($reg_form_employer_wantloc){
					foreach($reg_form_employer_wantloc as $reg_form_employer_wantloci){
						$arr = explode(':', $reg_form_employer_wantloci);
						if(isset($arr[0]) && isset($arr[1])){
							$sql = "INSERT into
									user_employer_region(utr_user_id,  utr_country,   utr_city)
									values              (".$user_id.", '".$arr[0]."', '".$arr[1]."') ";
							mysqli_query($SiteConn, $sql);
						}
					}
				}

				siteAuth($useremail, $password);
			}else{
				$GLOBALS['SiteError'] .= 'Error User EMPLOYER insert! ';
			}
		}else{
			$GLOBALS['SiteError'] .= 'User with this email already exists! ';
		}
	}else{
		$GLOBALS['SiteError'] .= 'Error! Email address is not valid. ['.$useremail.'] ';
	}
}


//===REGISTER RECRUITER===
function SiteRegisterRecruiter(){
	GLOBAL $SiteConn;
	$useremail = (isset($_POST['useremail']) ?mysqli_real_escape_string($SiteConn, htmlspecialchars($_POST['useremail'])) :'');
	
	if(filter_var($useremail, FILTER_VALIDATE_EMAIL)){
		if(siteGetEmailCount($_POST['useremail'])==0){
			$first_name                = mysqli_real_escape_string($SiteConn, htmlspecialchars($_POST['first_name']));
			$last_name                 = mysqli_real_escape_string($SiteConn, htmlspecialchars($_POST['last_name']));
			$password                  = mysqli_real_escape_string($SiteConn, $_POST['password']);
			$phone                     = mysqli_real_escape_string($SiteConn, htmlspecialchars($_POST['phone']));
			$talent_url_lin            = mysqli_real_escape_string($SiteConn, htmlspecialchars($_POST['talent_url_lin']));
			$employer_country          = mysqli_real_escape_string($SiteConn, htmlspecialchars($_POST['employer_country']));
			$employer_state            = mysqli_real_escape_string($SiteConn, htmlspecialchars($_POST['employer_state']));
			$employer_city             = mysqli_real_escape_string($SiteConn, htmlspecialchars($_POST['employer_city']));
			$employer_zip              = mysqli_real_escape_string($SiteConn, htmlspecialchars($_POST['employer_zip']));
			$email_receive_subsequent  = (isset($_POST['email_receive_subsequent']) ?1 :0);
			
			$result = mysqli_query($SiteConn,  "INSERT  into
												user   (role,          useremail,        password,        first_name,        last_name,        phone,        email_receive_subsequent,      employer_country,        employer_state,        employer_city,        employer_zip )
												values ('recruiter',   '".$useremail."', '".$password."', '".$first_name."', '".$last_name."', '".$phone."', ".$email_receive_subsequent.", '".$employer_country."', '".$employer_state."', '".$employer_city."', '".$employer_zip."' ) ");
			if($result){
				$user_id = mysqli_insert_id($SiteConn);
				
				if(siteSendMailConfirmEMail($user_id)!==true){
					$GLOBALS['SiteError'] .= 'Error sending confirmation mail! ';
				}
				
				if($email_receive_subsequent){
					//siteSetUserMailing($user_id, $useremail, 111);
				}
				
				$GLOBALS['SiteError'] .= 'User RECRUITER addad! Confirm your email before login. ';
			}else{
				$GLOBALS['SiteError'] .= 'Error User RECRUITER insert! ';
			}
		}else{
			$GLOBALS['SiteError'] .= 'User with this email already exists! ';
		}
	}else{
		$GLOBALS['SiteError'] .= 'Error! Email address is not valid. ['.$useremail.'] ';
	}
}


//===INSERT NEW JOB===
function siteInsertJob($JobName){
	GLOBAL $SiteConn;

	$result = mysqli_query($SiteConn, "SELECT job_id
									   FROM   job 
									   WHERE  job_name = '".mysqli_real_escape_string($SiteConn, htmlspecialchars($JobName))."'
									   limit  1 ");
	if($row = mysqli_fetch_assoc($result)){
		return $row['job_id'];
	}else{
		mysqli_query($SiteConn, "INSERT into
								 job(   job_name)
								 values('".mysqli_real_escape_string($SiteConn, htmlspecialchars($JobName))."') ");
		return (int)mysqli_insert_id($SiteConn);
	}
	mysqli_free_result($result);
}


//===Get array country===
function siteGetArrCounty(){
	GLOBAL $SiteConn;

	$result = mysqli_query($SiteConn, "SELECT distinct utr_country
									   FROM   user_talent_region 
									   order  by utr_country ");
	return mysqli_fetch_all($result, MYSQLI_NUM);
}

//===get array city in country===
function siteGetArrCountyCity($countryName){
	GLOBAL $SiteConn;

	$result = mysqli_query($SiteConn, "SELECT distinct utr_city
									   FROM   user_talent_region
									   WHERE  utr_country = '".mysqli_real_escape_string($SiteConn, htmlspecialchars($countryName))."'
									   order  by utr_city ");
	return mysqli_fetch_all($result, MYSQLI_NUM);
}

//===get array user posts===
function siteGetArrUserPosts($user_id){
	GLOBAL $SiteConn;

	$result = mysqli_query($SiteConn, "SELECT p.post_id, p.post_image, p.content, user.avatar, user.first_name, user.last_name, date_format(p.status_time, '%M %d, %Y')as status_time
									   FROM   posts p
									   left   join user on p.user_id_p = user.id
									   WHERE  user_id_p = ".(int)$user_id."
									   order  by p.status_time DESC ");
	return mysqli_fetch_all($result, MYSQLI_NUM);
}

//===searc email in existing users===
function siteGetEmailCount($useremail){
	GLOBAL $SiteConn;

	$result = mysqli_query($SiteConn, "SELECT count(useremail) as c
									   FROM   user
									   WHERE  useremail = '".$useremail."' ");
	$res = mysqli_fetch_all($result, MYSQLI_NUM);
	return (int)$res[0][0];
}

//===custom paging===
function sitePaging($baseURL, $count, $paged, $postonpage){
	$pageCount = ceil($count / $postonpage);

	$pageCountDn=$pageCount-2;
	if($pageCount<4){
		$pageCountDn=$pageCount+1;
	}elseif($pageCount==4){
		$pageCountDn=$pageCount;
	}elseif($pageCount==5){
		$pageCountDn=$pageCount-1;
	}elseif($pageCount==6){
		$pageCountDn=$pageCount-2;
	}

	if($pageCount>1){
		$res = $pageCount.'<div class="full-list-nav"><div class="full-list-nav__pages">';

		$res .= '<div class="page-arrow"><a href="'.$baseURL.'&paged=1"><i class="fas fa-angle-double-left"></i></a></div>';

		$res .= '<div class="page-arrow"><a href="'.$baseURL.'&paged='.($paged-1 < 1 ?1 :$paged-1).'"><i class="fas fa-angle-left"></i></a></div>';

		for($i=1;$i<4;$i++){
			$res .= '<div class="page-number active"><a href="'.$baseURL.'&paged='.$i.'" class="'.($i==$paged ?'active' :'').'"><p>'.$i.'</p></a></div>';
			if($i>$pageCount-1){break;}
		}

		$res .= '<div class="page-points"><p>...</p></div>';

		for($i=$pageCountDn;$i<$pageCount+1;$i++){
			$res .= '<div class="page-number"><a href="'.$baseURL.'&paged='.$i.'" class="'.($i==$paged ?'active' :'').'"><p>'.$i.'</p></a></div>';
		}

		$res .= '<div class="page-arrow"><a href="'.$baseURL.'&paged='.($paged+1 > $pageCount-1 ?$paged :$paged+1).'"><i class="fas fa-angle-right"></i></a></div>';

		$res .= '<div class="page-arrow"><a href="'.$baseURL.'&paged='.($pageCount).'"><i class="fas fa-angle-double-right"></i></a></div>';

		$res .= '</div></div>';
		return $res;
	}else{
		return '';
	}
}

//===add user to mailchimp mailing===
function siteSetUserMailing($name='', $email='', $groupID=0){

	function rudr_mailchimp_curl_connect($url, $request_type, $api_key, $data = array()){
		if( $request_type == 'GET' )
			$url .= '?' . http_build_query($data);

		$mch = curl_init();
		$headers = array(
			'Content-Type: application/json',
			'Authorization: Basic '.base64_encode( 'user:'. $api_key )
		);
		curl_setopt($mch, CURLOPT_URL, $url );
		curl_setopt($mch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($mch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($mch, CURLOPT_CUSTOMREQUEST, $request_type); // according to MailChimp API: POST/GET/PATCH/PUT/DELETE
		curl_setopt($mch, CURLOPT_TIMEOUT, 10);
		curl_setopt($mch, CURLOPT_SSL_VERIFYPEER, false); // certificate verification for TLS/SSL connection

		if( $request_type != 'GET' ) {
			curl_setopt($mch, CURLOPT_POST, true);
			curl_setopt($mch, CURLOPT_POSTFIELDS, json_encode($data) ); // send data in json
		}
		return curl_exec($mch);
	}


	// for more reference please vizit http://developer.mailchimp.com/documentation/mailchimp/reference/lists/
	// full error glossary is here http://developer.mailchimp.com/documentation/mailchimp/guides/error-glossary/
	$apiKey = mailchimp_key;
	$fname = 'Alexx';
	$lname = 'Popovich';
	//$email = 'superpuperlesha@gmail.com';
	//$email = 'developmentenvioroment@gmail.com';
	$email = 'dev1environment@gmail.com';
	$listID = '203a529ac6';


	//===get list mail categoryes===
	$data = array('fields'=>'lists', 'count'=>99);
	$url = 'https://' . substr($apiKey,strpos($apiKey,'-')+1) . '.api.mailchimp.com/3.0/lists/';
	$result = json_decode( rudr_mailchimp_curl_connect( $url, 'GET', $apiKey, $data) );
	if(!empty($result->lists)){
		echo '<select>';
		foreach( $result->lists as $list ){
			echo '<option value="' . $list->id . '">' . $list->name . ' (' . $list->stats->member_count . ')</option>';
		}
		echo '</select>';
	}elseif(is_int($result->status)){
		echo '<strong>' . $result->title . ':</strong> ' . $result->detail;
	}
	echo'<br/><br/><br/>';

	//===add user to mailchimp===



	//===get users from mail list===
	// $memberID = md5(strtolower($email));
	// $url = 'https://'.substr($apiKey,strpos($apiKey,'-')+1).'.api.mailchimp.com/3.0/lists/'.$listID.'/members/';
	// $data = json_encode([
		// 'email_address' => $email,
		// 'status'        => 'subscribed',
		// 'merge_fields'  => [
			// 'FNAME'     => $fname,
			// 'LNAME'     => $lname
		// ]
	// ]);
	// $result = json_decode(rudr_mailchimp_curl_connect($url, 'GET', $apiKey, $data));
	// print_r($result);




	//===add user to mail list===
	echo'<br/><br/><br/>';
	$postData = array(
		"email_address" => $email,
		"status" => "subscribed",
		"merge_fields" => array(
			"FNAME" => $fname,
			"PHONE" => $lname
		)
	);
	$ch = curl_init('https://us4.api.mailchimp.com/3.0/lists/'.$listID.'/members/');
	curl_setopt_array($ch, array(
		CURLOPT_POST           => TRUE,
		CURLOPT_RETURNTRANSFER => TRUE,
		CURLOPT_HTTPHEADER     => array(
			'Authorization: apikey '.$apiKey,
			'Content-Type: application/json'
		),
		CURLOPT_POSTFIELDS => json_encode($postData)
	));
	$result = curl_exec($ch);
	print_r($result);
}



?>
