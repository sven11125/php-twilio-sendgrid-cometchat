<?php

require_once('inc/config.php');

$keyword = $_POST['keyword'];
$self_uid = $_POST['self'];

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

?>
