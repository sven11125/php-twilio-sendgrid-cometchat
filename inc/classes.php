<?php
class siteVacancy{
	public $id                    = ''; //job ID
	public $title                 = ''; //Vacancy title
	public $jd_job_custom_id      = ''; //Custom vacancy ID
	public $job_description       = ''; //Job Description
	public $jd_ts                 = ''; //Timestamp vacancy created
	public $jd_ts_formated        = ''; //Timestamp vacancy created formatted
	public $occupancy             = ''; //Full time / Part Time / Hourly Work
	public $occupancy_title       = ''; //occupancy title
	public $salary_from           = ''; //Salary Range from
	public $salary_to             = ''; //Salary Range to
	public $relocation_assistance = ''; //Relocation Assistance
	public $permit_assistance     = ''; //Work Permit Assistance
	public $remote_position       = ''; //Remote work 0/1
	public $remote_position_title = ''; //Remote work yes, Remote work no, Remote work only
	public $jd_status             = ''; //Vacancy status
	public $jd_status_title       = ''; //Vacancy status title
	public $jd_status_color       = ''; //Vacancy status color
	public $jd_job_id             = ''; //Job ID
	public $jd_job_id_title       = ''; //Job title
	public $jd_user_id            = ''; //User creator ID
	public $jd_user_id_fname      = ''; //User creator first name
	public $jd_user_id_lname      = ''; //User creator last name
	public $jd_user_id_email      = ''; //User creator email
	public $jd_user_liked_arr     = ''; //Users liked this vacancy
	
	public function __construct($vacID=0){
		global $SiteConn;
		if($vacID){
			$sql = "SELECT jl.*, DATE_FORMAT(jl.jd_ts, '%M %e, %Y')as jd_ts_formated, UNIX_TIMESTAMP(jd_ts)as jd_tss , jll.jll_id as j_liked, os.jls_title, os.jls_color, o.o_title, j.job_name, u.first_name, u.last_name, u.useremail
					FROM   job_listing jl
					left   join job_listing_like jll on jl.id = jll.jll_job_listing_id
					left   join job_listing_status os on jl.jd_status = os.jls_id
					left   join occupancy o on jl.occupancy = o.o_id
					left   join job j on jl.jd_job_id = j.job_id
					left   join user u on jl.jd_user_id = u.id
					where  jl.id = ".(int)$vacID;
			$result = mysqli_query($SiteConn,  $sql);
			while($row = mysqli_fetch_array($result)){
				$this->id                    = $row['id'];
				$this->title                 = $row['title'];
				$this->jd_job_custom_id      = $row['jd_job_custom_id'];
				$this->job_description       = $row['job_description'];
				$this->jd_ts                 = $row['jd_tss'];
				$this->jd_ts_formated        = $row['jd_ts_formated'];
				$this->occupancy             = $row['occupancy'];
				$this->occupancy_title       = $row['o_title'];
				$this->salary_from           = $row['salary_from'];
				$this->salary_to             = $row['salary_to'];
				$this->relocation_assistance = $row['relocation_assistance'];
				$this->permit_assistance     = $row['permit_assistance'];
				$this->remote_position       = $row['remote_position'];
				$this->jd_status             = $row['jd_status'];
				$this->jd_status_title       = $row['jls_title'];
				$this->jd_status_color       = $row['jls_color'];
				$this->jd_job_id             = $row['jd_job_id'];
				$this->jd_job_id_title       = $row['job_name'];
				$this->jd_user_id            = $row['jd_user_id'];
				$this->jd_user_id_fname      = $row['first_name'];
				$this->jd_user_id_lname      = $row['last_name'];
				$this->jd_user_id_email      = $row['useremail'];
				$this->jd_user_liked_arr     = $this->getUserVacancyLikedArr($row['id']);
			}
		}
	}
	
	public static function createVacancy($jd_user_id, $jd_job_id, $jd_status){
		GLOBAL $SiteConn;
		$sql = "INSERT into
			    job_listing(jd_user_id,           jd_job_id,           jd_status           )
			    values     (".(int)$jd_user_id.", ".(int)$jd_job_id.", ".(int)$jd_status." ) ";
		if(mysqli_query($SiteConn, $sql)){
			return mysqli_insert_id($SiteConn);
		}else{
			return false;
		}
	}
	
	protected function setValueString($vacID, $field, $value){
		GLOBAL $SiteConn;
		$sql = "UPDATE from job_listing
			    set    ".$field." = '".mysqli_real_escape_string($SiteConn, htmlspecialchars($value))."'
				WHWRW  id = ".(int)$vacID;
		return mysqli_query($SiteConn, $sql);
	}
	
	protected function setValueInt($vacID, $field, $value){
		GLOBAL $SiteConn;
		$sql = "UPDATE from job_listing
			    set    ".$field." = ".(int)$value."
				WHWRW  id = ".(int)$vacID;
		return mysqli_query($SiteConn, $sql);
	}
	
	public static function setTitle($vacID, $title){
		return setValueString($vacID, 'title', $title);
	}
	
	public static function setCustomID($vacID, $customID){
		return setValueString($vacID, 'jd_job_custom_id', $customID);
	}
	
	public static function setDescription($vacID, $description){
		return setValueString($vacID, 'job_description', $description);
	}
	
	public static function setOccupancy($vacID, $occupancy){
		return setValueInt($vacID, 'occupancy', $occupancy);
	}
	
	public static function setSalaryFrom($vacID, $from){
		return setValueInt($vacID, 'salary_from', $from);
	}
	
	public static function setSalaryTo($vacID, $to){
		return setValueInt($vacID, 'salary_to', $to);
	}
	
	public static function setRelocateYN($vacID, $yn){
		return setValueInt($vacID, 'relocation_assistance', $yn);
	}
	
	public static function setPermitYN($vacID, $yn){
		return setValueInt($vacID, 'permit_assistance', $yn);
	}
	
	public static function setRemootePosition($vacID, $yn){
		return setValueInt($vacID, 'remote_position', $yn);
	}
	
	public static function setStatus($vacID, $yn){
		return setValueInt($vacID, 'jd_status', $yn);
	}
	
	public static function setJob($vacID, $yn){
		return setValueInt($vacID, 'jd_job_id', $yn);
	}
	
	
	
	public static function getUserVacancyLikedArr($vacID){
		GLOBAL $SiteConn;
		
		$result = mysqli_query($SiteConn, "SELECT jll_user_id FROM job_listing_like where jll_job_listing_id=".(int)$vacID);
		return mysqli_fetch_all($result, MYSQLI_NUM);
		mysqli_free_result($result);
	}
	
}
?>