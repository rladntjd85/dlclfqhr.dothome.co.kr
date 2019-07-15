<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>로그인</title>
	<style type="text/css">
		* {
			margin: 0 auto;
		}

		#login_box {
			widows: 500px;
			height: 200px;
			border: 2px solid gray;
		}

		table {
			margin-top: 10px;
		}

		.mem a:hover {
			color: red;
		}

		#btn {
			width: 95px;
			height: 55px;
			background: skyblue;
			border: 1px solid skyblue;
		}

		.inph {
			height: 25px;
		}

		h1 {
			width: 100px;
			margin : 0 auto;
		}
	</style>
</head>
<body>
	<div id="login_box">
		<h1>로그인</h1>
		<form method="post" action="login_ok.php">
			<table align="center" width="300">
				<tr>
					<td width="130" colspan="1">
						<input type="text" name="id" class="inph" placeholder="ID">
					</td>
					<td rowspan="2" align="center" width="100">
						<button type="submit" id="btn">로그인</button>
					</td>
				</tr>
				<tr>
					<td width="130" colspan="1">
						<input type="password" name="pw" class="inph" placeholder="PW">
					</td>
				</tr>
				<tr>
           		<td colspan="3" align="center" class="mem"> 
              		<a href="register.html">회원가입 	하시겠습니까?</a>
    	       </td>
	        	</tr>
			</table>
		</form>
	</div>
</body>
</html>