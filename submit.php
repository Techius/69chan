<?php
include 'mysqli.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<title>69chan</title>
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
		</header>
		<br>
			<form action='addpost.php' method='post'>
				<p>
					Title
				</p>
				<input type='form' name='title' />
				<p>
					Text
				</p>
				<textarea name='text'>

				</textarea>
				<p>
					Channel
				</p>
				<input type='form' name='channel' />
				<br>
				<br>
				<input type='submit' />
			</form>
	</body>
</html>