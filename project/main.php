<?php include('./dbConn.php'); ?>
<!DOCTYPE html>
<head>
	<meta charset="utf-8" />
</head>
<body>
	<?php
		session_start();
		if(!isset($_SESSION['userid'])) {
			echo "<meta http-equiv='refresh' content='0;url=login.php'>";
			exit;
		}
		$userid = $_SESSION['userid'];
		echo "<p>안녕하세요. $userid.님</p>";
		echo "<p><a href='logout.php'>로그아웃</a></p>";
	?>
</body>
</html>

