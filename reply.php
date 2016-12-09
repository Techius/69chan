<?php
include 'mysqli.php';
$id = $_GET['id'];
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
		<div id='chanInfo'>
			<h1>
				Reply
			</h1>
			<p>
				Reply to shit here
			</p>
		</div>
		<form action='addreply.php' method='post'>
			<p>
				Thread ID
			</p>
			<input type='form' name='id' value=<?php echo $id; ?> />
			<p>
				Text
			</p>
			<textarea name='text'>

			</textarea>
			<br>
			<br>
			<input type='submit' />
		</form>
	</body>
</html>