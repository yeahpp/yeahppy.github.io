<!DOCTYPE html>
<html lang="kr">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>김예린의 맛집투어</title>

  <style>
  body {
    margin: 0;
    overflow: hidden; /* 흐린 배경이 넘치는 것을 방지 */
  }

  div.blur-background {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: url("ham.jpg") center center / cover fixed;
    filter: blur(5px); /* 흐림 효과 강도 조절 가능 */
    z-index: -1; /* 배경이 다른 요소 뒤로 가도록 설정 */
  }

  div.yelin {
    text-align: center;
    height: 100vh; /* 화면 높이의 100% */
    display: flex;
    flex-direction: column;
    justify-content: center; /* 수직 가운데 정렬 */
  } 

  div.good {
    text-align: center;
    height: 100px;
    line-height: 100px;
  }

  a:link, a:visited {
    background-color: grey;
    color: white;
    padding: 20px; /* 버튼 크기 조절 */
    margin: 10px auto; /* 가로 중앙 정렬, 위아래 간격을 10px로 설정 */
    text-decoration: none;
    display: flex;
    justify-content: center; /* 수평 가운데 정렬 */
    align-items: center; /* 수직 가운데 정렬 */
  }

  a:hover, a:active {
    background-color: red;
  }

  .link_position {
    position: relative;
    top: 0px;
    left: 100px;
  }

  .today {
    position: fixed;
    bottom: 0;
    left: 50%;
    transform: translateX(-50%);
    font-size: 16px;
    color: white; /* 흰색으로 변경 */
  }

  p {
    font-size: 1.2em;
    text-align: center; /* 가운데 정렬 추가 */
    color: white; /* 흰색으로 변경 */
  }
  </style>
</head>

<body>
<?php
session_start();
if(!isset($_SESSION['nicname']) or !isset($_SESSION['regdate'])) {
  echo "<meta http-equiv='refresh' content='100;url=29_login.html'>";
  exit;
}

$nicname = $_SESSION['nicname'];
$regdate = $_SESSION['regdate'];
?>

<div class="blur-background"></div>
<div class="yelin">
  <b style="font-size: 50px; color: white;"><?php echo "$nicname's Food Map"; ?></b>
  <div class="good"><b style="font-size: 15px; color: white;"> 당신의 맛집을 추천해주세요.<b></div>
  <div class="link_position">
    <a href="23webproject/html/menu_page.html" target="__self" class="today">들어가기</a>
  </div>
</div>




</body>
</html>
