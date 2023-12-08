 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<style>
p{color:#ccaa11;font-size:1.2em}
</style>

<body>

<?php
session_start();
if(!isset($_SESSION['nicname']) or !isset($_SESSION['regdate']))
{
	echo "<meta http-equiv='refresh' content='100;url=29_login.html'>";
	exit;
}

	$nicname=$_SESSION['nicname'];
	$regdate=$_SESSION['regdate'];
	echo "<p>안녕하세요 $nicname 님</p>";
	echo "회원님은 $regdate 일에 가입하셨습니다. woodpia에서 좋은 시간 보내세요";

?>
</body>
</html>




