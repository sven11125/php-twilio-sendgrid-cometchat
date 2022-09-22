<div id="posting-modal" class="posting-modal">
	<div class="posting-modal__box">
		<div class="posting-modal__header">
			<h2 class="posting-modal__title">New vacancy </h2>
			<span class="posting-modal__close">&times;</span>
		</div>
		
		<div class="posting-modal__content">
			<form method="POST" class="vacancy-form" id="job_reg_form" action="<?php echo getHomeURL ?>/employer_home.php">
				<div class="vacancy-form__item">
					<label for="#job-title">Job ID:</label><?php 
					$number = rand(100, 10000) ?>
					<input id="job_reg_id" name="job_reg_id" type="text" value="<?php echo $number ?>" placeholder="<?php echo $number ?>">
				</div>
				<div class="vacancy-form__item">
					<label for="#job-title">Job Title:</label>
					<input id="job_reg_title" name="job_reg_title" type="text" placeholder="Enter title of your job posting">
				</div>

				<div class="vacancy-form__item">
					<label for="#job_reg_desired:">Technology:</label>
					<div class="job_reg_job">
						<select name="job_reg_job" id="job_reg_job" class="vacancy-form-select"><?php
							$arr = getArrpos();
							foreach($arr as $arri){
								echo'<option value="'.$arri[0].'">'.$arri[1].'</option>';
							} ?>
						</select>
					</div>
				</div>		

				<div class="vacancy-form__item">
					<label class="label-top">Skills:</label>
					<div class="job_reg_job">					
						<div class="job_reg_job__choiсes"><?php
							$arr = getArrpos();
							foreach($arr as $arri){ ?>
							<div class="job_reg_job__choiсe multiple-select-container">
								<select name="job_reg_job_detail" data-val="<?php echo $arri[0] ?>" class="desired-select" multiple ><?php
									$arrd = getArrposDetail($arri[0]);
									foreach($arrd as $arrdi){
										echo'<option value="'.$arrdi[0].'">'.$arrdi[2].'</option>';
									} ?>
								</select>
							</div><?php
							} ?>
						</div>
					</div>
				</div>
				

				
				<div class="vacancy-form__item">
					<label for="#occupancy:">Occupancy:</label>
					<select id="job_reg_occupancy" name="job_reg_occupancy" class="vacancy-form-select">
						<option value="0">Select occupancy</option><?php
						$query1 = "SELECT * 
								   FROM   occupancy
								   order  by o_title ";
						$result1 = mysqli_query($SiteConn, $query1);
						while($row1 = mysqli_fetch_array($result1)){
							echo'<option value="'.$row1['o_id'].'">'.$row1['o_title'].'</option>';
						}
						mysqli_free_result($result1); ?>
					</select>
				</div>
				
				<div class="vacancy-form__item vacancy-form__item--multiple">
					<label for="#job_reg_location_google:">Location:</label>
					<div class="multiple-select-container">
						<input type="text"   name="job_reg_location_google" id="job_reg_location_google">
						<input type="hidden" name="job_reg_country_t"         id="job_reg_country">
						<input type="hidden" name="job_reg_state_t"           id="job_reg_state">
						<input type="hidden" name="job_reg_city_t"            id="job_reg_city">
						<input type="hidden" name="job_reg_zip_t"             id="job_reg_zip">
						<ul class="location-results__list"></ul>
					</div>
				</div>
				
				<div class="vacancy-form__item vacancy-form__item--small">
					<label for=".salary-range">Salary Range:</label>
					<div class="vacancy-form__salary">
					  <!-- <a href="#uID" class="posting-modal__link">Currency</a> -->
					  <select name="from" class="select-currency posting-modal__link" id="job_reg_salary_curr" name="job_reg_salary_curr">
						<option value="0">Currency</option>
						<option value="$">$</option>
						<option value="€">€</option>
						<option value="£">£</option>
					  </select>
					  <select name="from" class="vacancy-form-select salary-range" id="job_reg_salary_from" name="job_reg_salary_from">
						<option value="0">From</option>
						<option value="10K">10K</option>
						<option value="30K">30K</option>
						<option value="50K">50K</option>
						<option value="100K">100K</option>
					  </select>
					  <select name="to" class="vacancy-form-select salary-range"   id="job_reg_salary_to"   name="job_reg_salary_to">
						<option value="0">To</option>
						<option value="30K">30K</option>
						<option value="50K">50K</option>
						<option value="100K">100K</option>
						<option value="100K+">100K+</option>
					  </select>
					</div>
				</div>

				<div class="vacancy-form__item">
					<label for="#job-description">Job Description:</label>
					<textarea rows="10" cols="50" name="job_reg_description" id="job_reg_description" placeholder="Enter your job description"></textarea>
				</div>

				<div class="vacancy-form__item">
					<div class="vacancy-form__item-title">Relocation Assistance:</div>
					<label class="form__checkbox">
						<span>Yes</span>
						<input type="radio" name="job_reg_reloc_assistant" value="1" checked="checked">
						<span class="main-radio-checkbox"></span>
					</label>
					<label class="form__checkbox">
						<span>No</span>
						<input type="radio" name="job_reg_reloc_assistant" value="0">
						<span class="main-radio-checkbox"></span>
					</label>
				</div>
				<div class="vacancy-form__item">
					<div class="vacancy-form__item-title">Work Permit Assistance:</div>
					<label class="form__checkbox">
						<span>Yes</span>
						<input type="radio" name="job_reg_permit_assistant" value="1" checked="checked">
						<span class="main-radio-checkbox"></span>
						</label>
					<label class="form__checkbox">
						<span>No</span>
						<input type="radio" name="job_reg_permit_assistant" value="0">
						<span class="main-radio-checkbox"></span>
					</label>
				</div>
				<div class="vacancy-form__item">
					<div class="vacancy-form__item-title">Is this a remote position?</div>
					<label class="form__checkbox">
						<span>Yes</span>
						<input type="radio" name="job_reg_remoote" value="1" checked="checked">
						<span class="main-radio-checkbox"></span>
					</label>
					<label class="form__checkbox">
						<span>No</span>
						<input type="radio" name="job_reg_remoote" value="0">
						<span class="main-radio-checkbox"></span>
					</label>
				</div>
				<hr class="line-2-copy">
				<a href="#uID" id="job_reg_submit_draft">Save as draft</a>
				<input type="hidden" name="job_reg_draft"  id="job_reg_draft"  value="2">
				<input type="submit" name="job_reg_submit" id="job_reg_submit" value="SUBMIT FOR REVIEW" class="submit-for-review" />
			</form>
			<style>
			.vacancy-form #job_reg_submit_draft {
  height: 16px;
  width: 125px;
  color: #4a4a4a;
  font-family: Roboto;
  font-size: 14px;
  letter-spacing: 1px;
  line-height: 16px;
  margin: 40px 0px 0px 0px;
  position:absolute;
}

.vacancy-form #job_reg_submit_draft:hover {
  text-decoration:underline;
}

.vacancy-form .submit-for-review {
  height: 40px;
  width: 244px;
  color: #ffffff;
  font-family: "Fira Sans Condensed";
  font-size: 14px;
  letter-spacing: 2.92px;
  line-height: 17px;
  margin: 30px 0px 0px 300px;
  border-radius: 25px;
  background-color: #0374bb;
}
			</style>
		</div>
	</div>
</div>