<div id="callScreen" style="display: none"></div>

<div id="bigChatBox" style="visibility: hidden">
	<div class="big-chat-user-box">
		<div class="big-chat-user-top">
			<div class="big-chat-user-top-home">
				<i class="fa fa-home" aria-hidden="true"></i>
			</div>
			<div class="big-chat-user-top-search">
				<i class="fa fa-search" style="opacity: 0.5" aria-hidden="true"></i>
				<input placeholder="Search">
				<i class="fa fa-pencil-square" aria-hidden="true"></i>
			</div>
		</div>
		<div class="big-chat-user-list">
			<?php
				$usersQuery = "SELECT * FROM user";
				$users = mysqli_query($SiteConn, $usersQuery);
				while($row = mysqli_fetch_array($users)) {
					if($_SESSION['SiteUser']['cometchat_uid'] != $row['cometchat_uid']){
						$receiver_uid = $_SESSION['SiteUser']['cometchat_uid'];
						$sender_uid = $row['cometchat_uid'];
						$chatListQuery = "SELECT * FROM chat_list WHERE sender_uid = '$sender_uid' AND receiver_uid  = '$receiver_uid'";
						$chatList = mysqli_query($SiteConn, $chatListQuery);
						if(mysqli_num_rows($chatList) > 0){
							$contact = '<div class="big-chat-user-item">
										  <img src="'. getHomeURL.'slicing/img/photo.png" alt="">
										  <div>
											<h4>'.$row["first_name"].' '.$row["last_name"].'</h4>
											<span class="uid" hidden>'.$row["cometchat_uid"].'</span>
										<span class="role" hidden>'.$row["role"].'</span>
											<span class="last-message">Hi, Pavel, How\'s your day today?</span>
										  </div>
										</div>';
							echo $contact;
						}
					}
				}
				?>
		</div>
	</div>
	<div class="big-chat-message-box">
		<div class="big-chat-message-top">
			<div class="big-chat-message-top-user">
				<img src="slicing/img/photo.png" alt="">
				<div>
					<span class="name">Pavel Rashkin</span>
					<span class="status">online</span>
				</div>
			</div>
			<div class="big-chat-message-top-buttons">
				<i class="fa fa-phone mr-2" aria-hidden="true" style="opacity: 1"></i>
				<i class="fa fa-video-camera" aria-hidden="true"></i>
				<i class="fa fa-search" aria-hidden="true"></i>
				<i class="fa fa-user-plus" aria-hidden="true"></i>
				<i class="fa fa-info-circle" aria-hidden="true"></i>
			</div>
			<div class="big-chat-box-close-button">
				<i class="fa fa-times-circle-o" aria-hidden="true"></i>
			</div>
		</div>
		<div class="big-chat-message-content">
			<div class="big-chat-message-inner-content">
			</div>
		</div>
		<div class="big-chat-message-bottom">
			<input placeholder="Type your message ...">
			<div class="big-chat-message-bottom-buttons">
				<div class="circle-button" style="opacity: 0.5">
					<i class="fa fa-paperclip" aria-hidden="true"></i>
		<input type="file" id="img_file_bc" hidden/>
				</div>
				<div class="circle-button">
					<i class="fa fa-paper-plane" aria-hidden="true"></i>
				</div>
			</div>
		</div>
	</div>
</div>