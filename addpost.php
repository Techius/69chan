<?php
include 'mysqli.php';
$title = $_POST['title'];
$description = htmlspecialchars($_POST['text']);
$channel = $_POST['channel'];
if($title === '' || $description === '' || $channel === '') {
	header('Location: index.php');
} else {
	mysqli_query($mysqli, 'insert into `topics`(`title`,`description`, `channels`) values("' . $title . '","' . $description . '","' . $channel . '");');
	$query = mysqli_query($mysqli, 'select `id`, `channels`, `title`, `description` from `topics` where `channels` = "' . $channel . '" and  `title` = "' . $title . '" and `description` = "' . $description . '";');
	while($row = mysqli_fetch_array($query, MYSQLI_NUM)) {
		$id = $row[0];
	}
	header('Location:' . 'permalink.php?id=' . $id);
}
?>