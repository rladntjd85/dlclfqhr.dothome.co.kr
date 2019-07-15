<?php 
	 include('./dbConn.php');

	 if ($_REQUEST["id"] == "" || $_REQUEST["id"] == "" ) {
	 	echo '<script> alert("아이디나 패스워드를 입력하세요"); history.back(); </script>';
	 }else {

	 	$pass = $_REQUEST["pw"];

	 	$sql = "select * from member where id = {$_REQUEST['id']}";
	 	$result = sql_query($sql);

  		$member = mysqli_fetch_assoc($result);

  		$hash_pw = $member['pw'];


  		if(password_verify($pass, $hash_pw)){
  			
  			session_start();
  			$_SESSION['userid'] = $member["id"];
  			$_SESSION['userpw'] = $member["pw"];

  		echo "<script>alert('로그인되었습니다.'); location.href='main.php';</script>";
		}else{ // 비밀번호가 같지 않다면 알림창을 띄우고 전 페이지로 돌아갑니다
		echo "<script>alert('아이디 혹은 비밀번호를 확인하세요.'); history.back();</script>";
		}
	 }
 ?>