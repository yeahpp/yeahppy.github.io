<?php
session_start();

$id = $_POST['id'];
$pwd = $_POST['pwd'];

$connect = mysqli_connect("localhost", "root", "");
mysqli_select_db($connect, "sample");

// Use prepared statements to prevent SQL injection
$sqlrec = "SELECT * FROM member WHERE id = ? AND pwd = ?";
$stmt = mysqli_prepare($connect, $sqlrec);
mysqli_stmt_bind_param($stmt, "ss", $id, $pwd);

mysqli_stmt_execute($stmt);

// Use mysqli_stmt_fetch to retrieve the result
mysqli_stmt_store_result($stmt);

if (mysqli_stmt_num_rows($stmt) == 0) {
    echo "<script>alert('아이디 또는 비밀번호가 존재하지 않습니다.');history.back();</script>";
    exit;
}

// Bind the result variables
mysqli_stmt_bind_result($stmt, $irum, $id, $nicname, $email, $pwd, $regdate);

// Fetch the values
while (mysqli_stmt_fetch($stmt)) {
    $b = $nicname;
    $c = $regdate;
}
$_SESSION['nicname'] = $b;
$_SESSION['regdate'] = $c;

// Move this meta tag to the end of the HTML or use a header() function to redirect
echo "<meta http-equiv='refresh' content='0;url=29_loginmsg.php'>";
?>
