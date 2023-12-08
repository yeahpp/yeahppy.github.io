<?php
// logout.php

// 세션 시작
session_start();

// 세션 제거
session_destroy();

// 로그아웃 후 리다이렉션할 페이지로 이동 (예: 로그인 페이지)
header("Location: id.html");

exit();
?>
