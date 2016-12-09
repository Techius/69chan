<?php
include 'mysqli.php';
$id = $_GET['id'];
if(!isset($id)) {
	header('Location: index.php');
}
?>
<!DOCTYPE html>
<html>
	<head>
		<?php 
		$query = mysqli_query($mysqli, 'select `id`, `title` from `topics` where `id` = "' . $id . '";');
		while($row = mysqli_fetch_array($query, MYSQLI_NUM)) { 
			echo "<title>". $row[1] ." | 69chan</title>"; 
		}
		?>
		<link rel="stylesheet" type="text/css" href="css.css">
	</head>
	<body>
		<header>
			<div id='menuWrapper'>
				<ul>
					<a href='submit.php'> 
						<li>
							Submit
						</li>
					</a>
					<?php
					$query = mysqli_query($mysqli, 'select `name` from `channels`;');
					while($row = mysqli_fetch_array($query, MYSQLI_NUM)) { 
						$channelName = $row[0];
						echo "
						<a href='index.php?p=".$channelName."'>
							<li>
								".$channelName ."
							</li>
						</a>

						";
					}
					?>
				</ul>
			</div>
			<br>
			<br>
		</header>
		<div id='comments'>
			<?php 
			$query = mysqli_query($mysqli, 'select * from `topics` where `id` = "' . $id . '" order by `id` desc;');
			while($row = mysqli_fetch_array($query, MYSQLI_NUM)) { 
				$id = $row[0];
				$channels = $row[1];
				$articleTitle = $row[2];
				$description = $row[3];
				echo "
					<article>
					<p>
						<strong>
						". 
							$articleTitle
						."
						</strong>
						|
						<a href='reply.php?id=".$id."'>
							Reply
						</a>
						|
						<a href='permalink.php?id=".$id."'>
							Permalink
						</a>
						|
						#". $id ."
					</p>
					<p>". 
						$description
						.
					"</p>";
				$comments = mysqli_query($mysqli, 'select * from `replies` where `threadID` = "' . $id . '" order by `id` asc;');
				while($row = mysqli_fetch_array($comments, MYSQLI_NUM)) { 
					$commentID = $row[0];
					$commentThreadID = $row[1];
					$message = $row[2];
					echo "
					<article  id=".$commentID.">
						<p>
							<strong>
							>". 
								$commentThreadID
							."
							</strong>
							|
							#". $commentID ."
						</p>
						<p>"
							. 
							$message
							.
						"</p>
					</article>";
				}
				echo "</article>";
			}
			
			?>
		</div>
	</body>
</html>