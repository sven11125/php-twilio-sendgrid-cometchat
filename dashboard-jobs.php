<?php
require_once('inc/config.php');
if(isset($_SESSION['SiteUser']['role']) && $_SESSION['SiteUser']['role'] == 'employer'){
	require_once('inc/header.php');
	
	//===set tab active===
	$filtst_state = $_GET['state'] ?? '*';
	
	$pg_baseURL     = getHomeURL.'dashboard-jobs.php?state='.$filtst_state;
	$pg_paged       = (isset($_GET['paged']) ?(int)$_GET['paged'] :1);
	$pg_postsonpage = 5; ?>
	
	<div class="employer">
		<section class="talent-nav">
			<div class="talent-nav__logo">
				<img src="<?php echo getHomeURL ?>slicing/img/logo.png" alt="logo">
			</div>
			<div class="container">
				<form action="" method="POST" class="search-anything">
					<input type="text" name="" placeholder="Search for anything" class="search-anything__input" />
					<button class="search-anything__button search-anything__button--blue">
					<i class="fas fa-search"></i>
					</button>
				</form>
				<nav class="user-nav-group">
					<div class="user-nav">
						<div class="user-nav__icon user-nav__icon--blue">
							<i class="fas fa-bell"></i>
						</div>
					</div>
					<div class="user-nav">
						<div class="user-nav__icon user-nav__icon--blue">
							<i class="far fa-envelope"></i>
						</div>
						<span class="user-nav__notification">12</span>
					</div>
				</nav>
			</div>
			<div class="settings settings--employer">
				<div class="settings__item settings__item--logo">
					<img src="<?php echo getHomeURL ?>slicing/img/logo-white.png" alt="user" />
				</div>
				<div class="modal-overlay"></div>
				<div class="settings__edit-item">
					<button class="settings__edit-link" id="posting-btn" href="#">add new job posting</button>
				</div>
				<div class="settings__edit">
					<a href="#">
						<div class="settings__edit-icon settings__edit-icon--blue">
							<i class="fas fa-plus"></i>
							<i class="fas fa-times"></i>
						</div>
					</a>
				</div>
				<div class="settings__list">
					<ul class="settings__items">
						<li class="settings__item">
							<a href="employer_home.php">
								<div class="settings__icon">
									<svg width="30px" height="26px" viewBox="0 0 30 26" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
										<title>Shape</title>
										<desc>Created with Sketch.</desc>
										<g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
											<g id="Dashboard---Employer-Drop-down" transform="translate(-83.000000, -297.000000)" fill="#FFFFFF" fill-rule="nonzero">
												<g id="Group-13" transform="translate(60.000000, 74.000000)">
													<g id="icons8-feedly" transform="translate(23.000000, 223.000000)">
														<path d="M11.4212095,26 L17.7301742,26 C18.7415917,26 19.7083882,25.5984081 20.4248088,24.8844663 L28.040188,17.2690871 C29.5250879,15.7817083 29.5250879,13.3721548 28.040188,11.884776 L17.2690871,1.11367448 C15.7817083,-0.371224826 13.3721548,-0.371224826 11.884776,1.11367448 L1.11367448,11.884776 C-0.371224826,13.3721548 -0.371224826,15.7817083 1.11367448,17.2690871 L8.72905365,24.8844663 C9.44299545,25.5984081 10.4122708,26 11.4212095,26 Z M9.79500874,18.7688605 L9.19262019,18.1664719 C8.94224492,17.9185755 8.94224492,17.5169835 9.19262019,17.2690871 L13.6795464,12.7821609 C13.9274428,12.5342644 14.3290348,12.5342644 14.5769312,12.7821609 L15.9230092,14.1282388 C16.1709056,14.3761353 16.1709056,14.7777272 15.9230092,15.0256237 L12.1772935,18.7688605 C12.0583032,18.8878508 11.8971707,18.954783 11.7286011,18.954783 L10.2437012,18.954783 C10.0751316,18.954783 9.91399903,18.8878508 9.79500874,18.7688605 Z M16.3717016,21.7560126 L15.769313,22.36088 C15.6503227,22.4798703 15.4891902,22.5468025 15.3206206,22.5468025 L13.8332419,22.5468025 C13.6646723,22.5468025 13.5035397,22.4798703 13.3845494,22.36088 L12.7821609,21.7560126 C12.5342644,21.5081162 12.5342644,21.1065242 12.7821609,20.8586278 L14.1282388,19.5125499 C14.3761353,19.2646534 14.7777272,19.2646534 15.0256237,19.5125499 L16.3717016,20.8586278 C16.6195981,21.1065242 16.6195981,21.5081162 16.3717016,21.7560126 Z M5.60307948,13.6795464 L13.6795464,5.60307948 C13.9274428,5.35518302 14.3290348,5.35518302 14.5769312,5.60307948 L15.9230092,6.9491574 C16.1709056,7.19705386 16.1709056,7.5986458 15.9230092,7.84654226 L8.59023163,15.1793198 C8.47124134,15.2983101 8.30762999,15.3652423 8.14153921,15.3652423 L6.65416046,15.3652423 C6.48559087,15.3652423 6.32445833,15.2983101 6.20546803,15.1793198 L5.60307948,14.5769312 C5.35518302,14.3290348 5.35518302,13.9274428 5.60307948,13.6795464 Z" id="Shape"></path>
													</g>
												</g>
											</g>
										</g>
									</svg>
								</div>
							</a>
						</li>
						<li class="settings__item active">
							<a href="dashboard-jobs.php">
								<div class="settings__icon">
									<svg width="26px" height="26px" viewBox="0 0 26 26" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
										<title>Shape Copy</title>
										<desc>Created with Sketch.</desc>
										<g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
											<g id="Dashboard---Employer-Drop-down" transform="translate(-85.000000, -371.000000)" fill="#FFFFFF" fill-rule="nonzero">
												<g id="Group-13" transform="translate(60.000000, 74.000000)">
													<g id="Sidebar">
														<g id="Items" transform="translate(15.000000, 213.000000)">
															<g id="Work-Experience" transform="translate(0.000000, 74.000000)">
																<g id="Group-12">
																	<path d="M19.75,10 C18.8592124,10 18.125,10.7342124 18.125,11.625 L18.125,13.25 L11.0388999,13.25 C10.4654948,13.25 10,13.7070312 10,14.2740885 L10,22.4583333 C10,22.756673 10.7638345,23 11.0388999,23 L33.8777668,23 C34.1528322,23 34.9166667,22.756673 34.9166667,22.4583333 L34.9166667,14.2740885 C34.9166667,13.7070312 34.4511719,13.25 33.8777668,13.25 L26.7916667,13.25 L26.7916667,11.625 C26.7916667,10.7342124 26.0574543,10 25.1666667,10 L19.75,10 Z M19.75,11.0833333 L25.1666667,11.0833333 C25.4713542,11.0833333 25.7083333,11.3203125 25.7083333,11.625 L25.7083333,13.25 L19.2083333,13.25 L19.2083333,11.625 C19.2083333,11.3203125 19.4453125,11.0833333 19.75,11.0833333 Z M22.4583333,19.75 C23.057129,19.75 23.5416667,20.2345376 23.5416667,20.8333333 C23.5416667,21.432129 23.057129,21.9166667 22.4583333,21.9166667 C21.8595376,21.9166667 21.375,21.432129 21.375,20.8333333 C21.375,20.2345376 21.8595376,19.75 22.4583333,19.75 Z M10,23.6728518 L10,30.6425781 C10,31.2096354 10.4654948,31.6666667 11.0388999,31.6666667 L24.8217772,31.6666667 L24.625,32.0708009 L26.3557945,32.9869792 L26.6943362,34.9145509 L28.634603,34.6394855 L30.0416667,36 L31.4487303,34.6394855 L33.3889977,34.9145509 L33.7275393,32.9869792 L35.4583333,32.0708009 L34.5971678,30.3125 L35.4583333,28.5541991 L34.9166667,28.268555 L34.9166667,23.6728518 C34.6373698,23.9246418 34.2776695,24.0833333 33.8777668,24.0833333 L11.0388999,24.0833333 C10.6389977,24.0833333 10.2792969,23.9246418 10,23.6728518 Z M30.0416667,26.0638021 L30.7293293,26.7303061 L31.0932616,27.0794271 L31.5926105,27.009603 L32.5405272,26.8763021 L32.7076823,27.817871 L32.7944335,28.3151042 L33.2408854,28.5520833 L34.0872396,29.000651 L33.6661783,29.8575845 L33.4440104,30.3125 L33.6661783,30.7674155 L34.0872396,31.6264647 L33.2408854,32.0750324 L32.7944335,32.3098958 L32.7076823,32.8092448 L32.5405272,33.7508137 L31.5926105,33.615397 L31.0932616,33.5455729 L30.7293293,33.8968102 L30.0416667,34.5611979 L29.354004,33.8968102 L28.9900717,33.5455729 L28.488607,33.615397 L27.5406904,33.7508137 L27.375651,32.8092448 L27.2888999,32.3098958 L26.8403322,32.0750324 L25.9960938,31.6264647 L26.4150393,30.7674155 L26.6393229,30.3125 L26.4171551,29.8575845 L25.9960938,29.000651 L26.8424479,28.5520833 L27.2888999,28.3151042 L27.375651,27.8157552 L27.5428061,26.8763021 L28.4907228,27.009603 L28.9900717,27.0794271 L29.354004,26.7281904 L30.0416667,26.0638021 Z" id="Shape-Copy"></path>
																</g>
															</g>
														</g>
													</g>
												</g>
											</g>
										</g>
									</svg>
								</div>
							</a>
						</li>
						<li class="settings__item">
							<a href="#">
								<div class="settings__icon">
									<svg width="31px" height="25px" viewBox="0 0 31 25" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
										<title>Shape</title>
										<desc>Created with Sketch.</desc>
										<g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
											<g id="Dashboard---Employer-Drop-down" transform="translate(-82.000000, -447.000000)" fill="#FFFFFF" fill-rule="nonzero">
												<g id="Group-13" transform="translate(60.000000, 74.000000)">
													<g id="Sidebar">
														<g id="Items" transform="translate(15.000000, 213.000000)">
															<g id="Educaton" transform="translate(0.000000, 150.000000)">
																<g id="graduation-cap-solid" transform="translate(7.000000, 10.000000)">
																	<g id="icons8-video_conference">
																		<g id="icons8-resume_website">
																			<path d="M1.87217309,0 C0.839278355,0 0,0.839278355 0,1.87217309 L0,7.89473684 L30.2631579,7.89473684 L30.2631579,1.87217309 C30.2631579,0.839278355 29.4238796,0 28.3909849,0 L1.87217309,0 Z M3.94736842,2.63157895 C4.67368421,2.63157895 5.26315789,3.22039474 5.26315789,3.94736842 C5.26315789,4.67368421 4.67368421,5.26315789 3.94736842,5.26315789 C3.22105263,5.26315789 2.63157895,4.67368421 2.63157895,3.94736842 C2.63157895,3.22039474 3.22105263,2.63157895 3.94736842,2.63157895 Z M7.89473684,2.63157895 C8.62105263,2.63157895 9.21052632,3.22039474 9.21052632,3.94736842 C9.21052632,4.67368421 8.62105263,5.26315789 7.89473684,5.26315789 C7.16842105,5.26315789 6.57894737,4.67368421 6.57894737,3.94736842 C6.57894737,3.22039474 7.16842105,2.63157895 7.89473684,2.63157895 Z M11.1842105,2.63157895 L26.9736842,2.63157895 L26.9736842,5.26315789 L11.1842105,5.26315789 L11.1842105,2.63157895 Z M0,9.21052632 L0,24.3421053 C0,24.7059211 0.294078947,25 0.657894737,25 L29.6052632,25 C29.9690789,25 30.2631579,24.7059211 30.2631579,24.3421053 L30.2631579,9.21052632 L0,9.21052632 Z M7.8754625,11.8421053 C8.33467303,11.8421053 8.68945329,11.9685961 8.82761118,12.2185961 C9.44340066,12.3067539 9.71633421,12.7276625 9.81830789,13.2388467 C9.85515,13.4237151 9.86842105,13.6197368 9.86842105,13.8157895 C9.86842105,14.2427632 9.78211382,14.648273 9.70908684,14.8745888 C9.78079803,14.9193257 9.89802632,15.0620066 9.86842105,15.3166118 C9.81381579,15.7902961 9.62514408,15.9100125 9.50606513,15.9205388 C9.4600125,16.3619862 9.05282697,16.8855368 8.90085329,16.9677737 C8.90085329,17.2829053 8.88986447,17.5231289 8.92012763,17.8685237 C9.28460132,18.8777342 11.7308901,18.5951684 11.8433901,20.5412211 L11.8433901,21.0526316 L11.8421053,21.0526316 L3.94736842,21.0526316 L3.94736842,20.5412211 C4.06052632,18.5951684 6.51643684,18.8777342 6.88091053,17.8685237 C6.91117368,17.5231289 6.90018487,17.2829053 6.90018487,16.9677737 C6.74821118,16.8861947 6.32946118,16.3619862 6.28340855,15.9205388 C6.16432961,15.9100125 5.97760066,15.7902961 5.9223375,15.3166118 C5.89273224,15.0620066 6.00996118,14.9199836 6.08167171,14.8745888 C5.98890855,14.5081414 5.91907895,14.15 5.92105263,13.8157895 C5.92236842,13.6138158 5.94259868,13.4210526 5.98273026,13.2401316 C6.16496711,12.4144737 6.7629625,11.8421053 7.8754625,11.8421053 Z M15.7894737,13.1578947 L26.3157895,13.1578947 L26.3157895,14.4736842 L15.7894737,14.4736842 L15.7894737,13.1578947 Z M15.7894737,16.4473684 L26.3157895,16.4473684 L26.3157895,17.7631579 L15.7894737,17.7631579 L15.7894737,16.4473684 Z M15.7894737,19.7368421 L24.3421053,19.7368421 L24.3421053,21.0526316 L15.7894737,21.0526316 L15.7894737,19.7368421 Z" id="Shape"></path>
																		</g>
																	</g>
																</g>
															</g>
														</g>
													</g>
												</g>
											</g>
										</g>
									</svg>
								</div>
							</a>
						</li>
						<li class="settings__item">
							<a href="#">
								<div class="settings__icon">
									<svg width="30px" height="30px" viewBox="0 0 30 30" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
										<title>icons8-heat_map</title>
										<desc>Created with Sketch.</desc>
										<g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
											<g id="Dashboard---Employer-Drop-down" transform="translate(-82.000000, -521.000000)" fill="#FFFFFF" fill-rule="nonzero">
												<g id="Group-13" transform="translate(60.000000, 74.000000)">
													<g id="Sidebar">
														<g id="Items" transform="translate(15.000000, 213.000000)">
															<g id="icons8-heat_map" transform="translate(7.000000, 234.000000)">
																<path d="M0.703023893,8.23266246e-05 C0.309216047,0.00632538028 -0.00525798048,0.330158762 6.6630007e-05,0.723977794 L6.6630007e-05,29.9999311 L29.2760165,29.9999311 C29.5335271,30.0035012 29.7730506,29.8682069 29.9028686,29.6457834 C30.0326867,29.4233598 30.0326867,29.1482671 29.9028686,28.9258435 C29.7730506,28.70342 29.5335271,28.5681257 29.2760165,28.5717676 L1.42822675,28.5717676 L1.42822675,0.723977794 C1.43086974,0.530970964 1.35526789,0.345114604 1.21864735,0.208756798 C1.08202682,0.0723989922 0.896025277,-0.00284496938 0.703023893,8.23266246e-05 Z M13.209984,0.00993190241 C11.0410223,0.00993190241 9.28273156,1.76822269 9.28273156,3.9371843 C9.28273156,4.9787564 9.69649446,5.97766842 10.4329972,6.71417111 C11.1694998,7.4506738 12.1684119,7.86443671 13.209984,7.86443671 C14.2515561,7.86443671 15.2504681,7.4506738 15.9869708,6.71417111 C16.7234735,5.97766842 17.1372364,4.9787564 17.1372364,3.9371843 C17.1372364,1.76822269 15.3789456,0.00993190241 13.209984,0.00993190241 Z M5.35547915,1.43802369 C3.97523086,1.43802369 2.85631853,2.55693601 2.85631853,3.9371843 C2.85631853,5.3174326 3.97523086,6.43634492 5.35547915,6.43634492 C6.73572745,6.43634492 7.85463977,5.3174326 7.85463977,3.9371843 C7.85463977,2.55693601 6.73572745,1.43802369 5.35547915,1.43802369 Z M21.0644888,1.43802369 C19.6842405,1.43802369 18.5653281,2.55693601 18.5653281,3.9371843 C18.5653281,5.3174326 19.6842405,6.43634492 21.0644888,6.43634492 C22.4447371,6.43634492 23.5636494,5.3174326 23.5636494,3.9371843 C23.5636494,2.55693601 22.4447371,1.43802369 21.0644888,1.43802369 Z M27.4909018,1.43802369 C26.1106535,1.43802369 24.9917412,2.55693601 24.9917412,3.9371843 C24.9917412,5.3174326 26.1106535,6.43634492 27.4909018,6.43634492 C28.8711501,6.43634492 29.9900624,5.3174326 29.9900624,3.9371843 C29.9900624,2.55693601 28.8711501,1.43802369 27.4909018,1.43802369 Z M18.2083052,10.0065744 C17.1667331,10.0065744 16.1678211,10.4203373 15.4313184,11.15684 C14.6948157,11.8933427 14.2810528,12.8922547 14.2810528,13.9338268 C14.2810528,14.9753989 14.6948157,15.9743109 15.4313184,16.7108136 C16.1678211,17.4473163 17.1667331,17.8610792 18.2083052,17.8610792 C20.3772668,17.8610792 22.1355576,16.1027884 22.1355576,13.9338268 C22.1355576,11.7648652 20.3772668,10.0065744 18.2083052,10.0065744 L18.2083052,10.0065744 Z M5.7125021,10.7206203 C4.13507547,10.7206203 2.85631853,11.9993772 2.85631853,13.5768038 C2.85631853,15.1542305 4.13507547,16.4329874 5.7125021,16.4329874 C7.28992872,16.4329874 8.56868566,15.1542305 8.56868566,13.5768038 C8.56868566,11.9993772 7.28992872,10.7206203 5.7125021,10.7206203 Z M27.1338788,10.7206203 C25.5564522,10.7206203 24.2776953,11.9993772 24.2776953,13.5768038 C24.2776953,15.1542305 25.5564522,16.4329874 27.1338788,16.4329874 C28.7113055,16.4329874 29.9900624,15.1542305 29.9900624,13.5768038 C29.9900624,11.9993772 28.7113055,10.7206203 27.1338788,10.7206203 Z M13.209984,19.289171 C11.0410223,19.289171 9.28273156,21.0474618 9.28273156,23.2164234 C9.28273156,25.385385 11.0410223,27.1436758 13.209984,27.1436758 C15.3789456,27.1436758 17.1372364,25.385385 17.1372364,23.2164234 C17.1372364,21.0474618 15.3789456,19.289171 13.209984,19.289171 Z M5.35547915,20.7172628 C3.97523086,20.7172628 2.85631853,21.8361751 2.85631853,23.2164234 C2.85631853,24.5966717 3.97523086,25.715584 5.35547915,25.715584 C6.73572745,25.715584 7.85463977,24.5966717 7.85463977,23.2164234 C7.85463977,21.8361751 6.73572745,20.7172628 5.35547915,20.7172628 Z M21.0644888,20.7172628 C19.6842405,20.7172628 18.5653281,21.8361751 18.5653281,23.2164234 C18.5653281,24.5966717 19.6842405,25.715584 21.0644888,25.715584 C22.4447371,25.715584 23.5636494,24.5966717 23.5636494,23.2164234 C23.5636494,21.8361751 22.4447371,20.7172628 21.0644888,20.7172628 Z M27.4909018,20.7172628 C26.1106535,20.7172628 24.9917412,21.8361751 24.9917412,23.2164234 C24.9917412,24.5966717 26.1106535,25.715584 27.4909018,25.715584 C28.8711501,25.715584 29.9900624,24.5966717 29.9900624,23.2164234 C29.9900624,21.8361751 28.8711501,20.7172628 27.4909018,20.7172628 Z" id="Shape"></path>
															</g>
														</g>
													</g>
												</g>
											</g>
										</g>
									</svg>
								</div>
							</a>
						</li>
					</ul>
				</div>
				<div class="settings__config">
					<div class="settings__item">
						<a href="logout.php">
						<i class="fas fa-cog"></i>
						</a>
					</div>
					<div class="settings__user-icon">
						<img src="<?php echo getHomeURL ?>slicing/img/logo.png" alt="user" />
					</div>
				</div>
			</div>
			<div class="contacts  contacts--employer">
				<form action="" method="POST" class="user-search">
					<button class="user-search__button"><i class="fas fa-search"></i></button>
					<input type="text" name="" placeholder="Search" class="user-search__input" />
				</form>
				<div class="contacts__box">
					<h3 class="contacts__title">Contacts</h3>
					<ul class="contacts__list">
						<?php $usersQuery = "SELECT * FROM user";
							$users = mysqli_query($SiteConn, $usersQuery);
							while($row = mysqli_fetch_array($users)) {
								if($_SESSION['SiteUser']['cometchat_uid'] != $row['cometchat_uid']){
									$sender_uid = $_SESSION['SiteUser']['cometchat_uid'];
									$receiver_uid = $row['cometchat_uid'];
									$chatListQuery = "SELECT * FROM chat_list WHERE sender_uid = '$sender_uid' AND receiver_uid  = '$receiver_uid'";
									$chatList = mysqli_query($SiteConn, $chatListQuery);
									if(mysqli_num_rows($chatList) > 0){
										$contact = '<li class="contacts__item">
														<div class="contact">
															<div class="contact__icon">
																<img src="'. getHomeURL.'slicing/img/photo.png" alt="icon" />
															</div>
														</div>
														<h4 class="contact__name">'.$row["first_name"].' '.$row["last_name"].'</h4>
														<span class="uid" hidden>'.$row["cometchat_uid"].'</span>
														<span class="role" hidden>'.$row["role"].'</span>
														<span class="contact__status contact__status--green"></span>
													</li>';
										echo $contact;
									}
								}
							} ?>
					</ul>
				</div>
			</div>
			<div class="chat-box-container"></div>
		</section>
		<section class="user-profile">
			<div class="container">
				<div class="employer-jobs__nav">
					<ul class="employer-jobs__sort-list">
						<li class="employer-jobs__sort-item <?php echo($filtst_state == '*' ?'active' :'') ?>">
							<a href="dashboard-jobs.php" class="employer-jobs__sort-link">All</a>
						</li>
						<?php
							$arr = getVacancyArr();
							foreach($arr as $arri){ ?>
						<li class="employer-jobs__sort-item <?php echo($filtst_state == $arri['jls_id'] ?'active' :'') ?>">
							<a href="dashboard-jobs.php?state=<?php echo $arri['jls_id'] ?>" class="employer-jobs__sort-link"><?php echo $arri['jls_title'] ?></a>
						</li>
						<?php
							} ?>
					</ul>
					<div class="employer-jobs__hamburger-menu">
						<div class="employer-jobs__hamburger">
							<i class="fas fa-bars"></i>
						</div>
					</div>
				</div>
				<div class="employer-jobs">
					<div class="employer-jobs__table">
						<div class="employer-jobs__table-header">
							<ul class="employer-jobs__row">
								<li class="employer-jobs__col col1">
									<label class="form__checkbox">
									<input type="checkbox" id="all-jobs" />
									<span class="main-checkbox"></span>
									</label>
								</li>
								<li class="employer-jobs__col col2">
									<p>job id</p>
								</li>
								<li class="employer-jobs__col col3">
									<p>title</p>
								</li>
								<li class="employer-jobs__col col4">
									<p>location</p>
								</li>
								<li class="employer-jobs__col col5">
									<p>applicants</p>
								</li>
								<li class="employer-jobs__col col6">
									<p>status</p>
								</li>
							</ul>
						</div>
						<div class="employer-jobs__table-body"><?php
							$result = mysqli_query($SiteConn,  "SELECT count(id) as cc
																FROM   job_listing
																where  jd_user_id = ".(int)$_SESSION['SiteUser']['id']."
																		".($filtst_state !== '*' ?'and jd_status='.(int)$filtst_state :'') );
							$row = mysqli_fetch_assoc($result);
							$pg_count = $row['cc'];
							mysqli_free_result($result);
							$sql = "SELECT *
									FROM   job_listing
									where  jd_user_id = ".(int)$_SESSION['SiteUser']['id']."
											".($filtst_state !== '*' ?'and jd_status='.(int)$filtst_state :'')."
									ORDER BY id DESC
									LIMIT ".($pg_paged>1 ?(int)($pg_paged-1)*(int)$pg_postsonpage :0).", ".(int)$pg_postsonpage;
							$result = mysqli_query($SiteConn, $sql);
							while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
								$ListUserVacancyFavorite = getListUserVacancyFavorite($row['id']);
								$vacStatInfo = getVacancyStatusInfo($row['jd_status']); ?>
								<ul class="employer-jobs__row" data-val='active'>
									<li class="employer-jobs__col col1">
										<label class="form__checkbox">
										<input type="checkbox" id="all-jobs" />
										<span class="main-checkbox"></span>
										</label>
									</li>
									<li class="employer-jobs__col col2">
										<p><?php echo $row['jd_job_custom_id'] ?></p>
									</li>
									<li class="employer-jobs__col col3">
										<p><?php echo $row['title'] ?></p>
									</li>
									<li class="employer-jobs__col col4"><?php
										$query1 = "SELECT * 
												   FROM job_listing_region
												   WHERE jlr_job_listing_id = ".(int)$row['id'];
										$result1 = mysqli_query($SiteConn, $query1);
										while($row1 = mysqli_fetch_array($result1)){
											echo'<p>'.$row1['jlr_country'].', '.$row1['jlr_state'].', '.$row1['jlr_city'].', '.$row1['jlr_zip'].'</p>';
										}
										mysqli_free_result($result1); ?>
									</li>
									<li class="employer-jobs__col col5">
										<p><a href="#uID" class="employer-jobs__count"><?php echo count($ListUserVacancyFavorite) ?></a></p>
									</li>
									<li class="employer-jobs__col col6">
										<div class="select-status">
											<div class="employer-jobs__status" style="background-color: <?php echo $vacStatInfo['jls_color'] ?>;">
												<p><?php echo $vacStatInfo['jls_title'] ?></p>
											</div>
											<div class="select-action__dropdown">
												<ul class="select-action__list"><?php
													$arr = getVacancyArr();
													foreach($arr as $arri){ ?>
														<li class="select-action__item">
															<a href="<?php echo getHomeURL ?>dashboard-jobs.php?paged=<?php echo $pg_paged ?>&state=<?php echo $filtst_state ?>&setvacancyid=<?php echo $row['id'] ?>&setvacancystate=<?php echo $arri['jls_id'] ?>" class="select-action__link" data-action="<?php echo $arri['jls_title'] ?>"><?php echo $arri['jls_title'] ?></a>
														</li><?php
													} ?>
												</ul>
											</div>
										</div>
									</li>
								</ul>
								<div class="employer-jobs__table  employer-jobs__table-dropdown">
									<div class="employer-jobs__table-header">
										<ul class="employer-jobs__row">
											<li class="employer-jobs__col col1"></li>
											<li class="employer-jobs__col col21">
												<p>full name</p>
											</li>
											<li class="employer-jobs__col col22">
												<p>type</p>
											</li>
											<li class="employer-jobs__col col23">
												<p>skills</p>
											</li>
											<li class="employer-jobs__col col4">
												<p>salary range</p>
											</li>
											<li class="employer-jobs__col col51">
											</li>
											<li class="employer-jobs__col col61">
											</li>
										</ul>
									</div>
									<div class="employer-jobs__table-body" style="min-height:auto;"><?php
										foreach($ListUserVacancyFavorite as $arri){
											$user = getUserInfo($arri['jll_user_id']);
											if($user){
												$jdrarr = getTalentJobDetailArr($arri['jll_user_id']); ?>
												<ul class="employer-jobs__row">
													<li class="employer-jobs__col col1"></li>
													<li class="employer-jobs__col col21">
														<p><?php echo $user['first_name'].' '.$user['last_name'] ?></p>
													</li>
													<li class="employer-jobs__col col22">
														<p><?php echo ($user['talent_employ_type_1'] ?'Permanent (full-time)' :'').($user['talent_employ_type_2'] ?', Contract' :'') ?></p>
													</li>
													<li class="employer-jobs__col col23">
														<p><?php
															$c = count($jdrarr);
															$i = 0;
															foreach($jdrarr as $jdrarri){
																echo $jdrarri['jd_name'].(++$i < $c ?', ' :'');
															} ?>
														</p>
													</li>
													<li class="employer-jobs__col col4">
														<p><?php echo 'US$ '.$user['talent_salary'] ?></p>
													</li>
													<li class="employer-jobs__col col51">
														<div class="dashboard-info__social">
															<div class="social-link facebook">
																<?php if($user['talent_url_github']){ ?>
																<a href="<?php echo $user['talent_url_github'] ?>">
																<i class="fab fa-git-square"></i>
																</a>
																<?php } ?>
															</div>
															<div class="social-link linkedin active">
																<?php if($user['talent_url_lin']){ ?>
																<a href="<?php echo $user['talent_url_lin'] ?>">
																<i class="fab fa-linkedin"></i>
																</a>
																<?php } ?>
															</div>
															<div class="social-link instagram">
																<?php if($user['talent_url_portfolio']){ ?>
																<a href="<?php echo $user['talent_url_portfolio'] ?>">
																<i class="fab fa-portrait"></i>
																</a>
																<?php } ?>
															</div>
														</div>
													</li>
													<li class="employer-jobs__col col61">
														<div class="select-action">
															<span class="select-action__indicator"></span>
															<div class="select-action__button">
																<p>MORE</p>
															</div>
														</div>
													</li>
												</ul><?php
											}
										} ?>
										<div class="employer-jobs__dropdown-footer">
											<div class="employer-jobs__dropdown-footer-line"></div>
											<div class="employer-jobs__dropdown-footer-close">
												<i class="fas fa-chevron-up"></i>
											</div>
											<div class="employer-jobs__dropdown-footer-line"></div>
										</div>
									</div>
								</div><?php
							}
							mysqli_free_result($result); ?>
						</div>
					</div>
					<?php echo sitePaging($pg_baseURL, $pg_count, $pg_paged, $pg_postsonpage) ?>
				</div>
			</div>
		</section>
	</div>

	<?php require_once('template-parts/form_adding_vacancy.php') ?>

  <?php require_once('template-parts/superadmin_chat_screen.php') ?>

	<?php require_once('inc/footer.php') ?>

  <?php require_once('template-parts/chat_scripts.php') ?>

<?php }else{
	header('location:'.getHomeURL.'login-page.php');
	exit;
} ?>