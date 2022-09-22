<?php

require_once('inc/config.php');

if ($_POST['role'] === 'superadmin') {

    $sender_uid = (int)$_POST['sender'];
    $receiver_uid = (int)$_POST['receiver'];

    $query0 = "INSERT into chat_list(sender_uid, receiver_uid) values ($sender_uid, $receiver_uid)";
    $result0 = mysqli_query($SiteConn, $query0);

    if ($result0) {
        echo json_encode('success');
    }

} else {

    $self_uid = (int)$_POST['self'];
    $job_id = (int)$_POST['job_id'];

    $query1 = "SELECT * FROM job_listing  WHERE id = '$job_id' limit  1";
    $result1 = mysqli_query($SiteConn, $query1);
    while ($row = mysqli_fetch_array($result1)) {

        $opponent_uid = (int)$row['jd_user_id'];

        $query2 = "INSERT into chat_list(sender_uid, receiver_uid) values ($opponent_uid, $self_uid)";
        $result2 = mysqli_query($SiteConn, $query2);

        if ($result2) {
            echo json_encode('success');
        }
    }
}
