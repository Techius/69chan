<?php
include 'mysqli.php';
$id = $_POST['id'];
$description = htmlspecialchars($_POST['text']);
if($id === '' || $description === '') {
	header('Location: index.php');
} else {
	mysqli_query($mysqli, 'insert into `replies`(`threadID`,`message`) values("' . $id . '","' . $description . '");');
	$query = mysqli_query($mysqli, 'select `threadID`, `message`, `id` from `replies` where `threadID` = "' . $id . '" and  `message` = "' . $description . '";');
	while($row = mysqli_fetch_array($query, MYSQLI_NUM)) {
		$replyID = $row[0];
		$commentID = $row[2];
	}
	header('Location:' . 'permalink.php?id=' . $replyID . '#' . $commentID);
}
?>