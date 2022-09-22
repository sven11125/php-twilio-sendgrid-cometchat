<div class="contacts ">
	<form action="" method="POST" class="user-search">
		<button class="user-search__button"><i class="fas fa-search"></i></button>
		<input type="text" name="" placeholder="Search" class="user-search__input" />
	</form>
	<div class="contacts__box">
		<h3 class="contacts__title">Contacts</h3>
		<ul class="contacts__list"><?php
			// $usersQuery =  "SELECT * 
							// FROM   user 
							// where  cometchat_uid != ".(int)$_SESSION['SiteUser']['cometchat_uid'];
			
			$usersQuery = "SELECT * FROM user";
			$users = mysqli_query($SiteConn, $usersQuery);
			while($row = mysqli_fetch_array($users)){
				if($_SESSION['SiteUser']['cometchat_uid'] != $row['cometchat_uid']){
					$receiver_uid  = (int)$_SESSION['SiteUser']['cometchat_uid'];
					$sender_uid    = (int)$row['cometchat_uid'];
					$chatListQuery = "SELECT * FROM chat_list WHERE sender_uid = '$sender_uid' AND receiver_uid  = '$receiver_uid'";
					$chatList = mysqli_query($SiteConn, $chatListQuery);
					if(mysqli_num_rows($chatList) > 0){ ?>
						<li class="contacts__item">
							<div class="contact">
								<div class="contact__icon">
									<img src="<?php echo getHomeURL.'slicing/img/photo.png' ?>" alt="icon">
								</div>
							</div>
							<h4 class="contact__name"><?php echo $row["first_name"].' '.$row["last_name"] ?></h4>
							<span class="uid" hidden><?php echo $row["cometchat_uid"] ?></span>
							<span class="role" hidden><?php echo $row["role"] ?></span>				                             
						</li><?php
					}
				}
			} ?>
		</ul>
	</div>
</div>
<div class="chat-box-container"></div>