<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>글 상세보기</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #2c3e50;
            color: #ecf0f1;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        #container {
            width: 60%;
            background-color: #34495e;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        }

        #header {
            border-bottom: 2px dashed #3498db;
            margin-bottom: 20px;
            padding-bottom: 10px;
            font-size: 1.5em;
            color: #3498db;
            text-align: left;
        }

        #title {
            margin: 20px 0;
            font-size: 2.5em;
            color: #fff;
            text-align: left;
        }

        #content {
            width: 100%;
            margin-bottom: 20px;
            padding: 20px;
            border: 1px solid #2c3e50;
            border-radius: 5px;
            font-size: 1.3em;
            display: block;
            text-align: left;
            white-space: pre-line;
            background-color: #2c3e50;
        }

        #footer {
            text-align: right;
        }

        a {
            text-decoration: none;
            font-size: 1.8em;
            color: #fff;
            background-color: #3498db;
            padding: 15px 30px;
            border-radius: 8px;
            transition: background-color 0.3s;
            display: inline-block;
        }

        a:hover {
            background-color: #2980b9;
        }
    </style>
</head>

<body>

    <?php
    $title = $_GET['title'];
    $connect = mysqli_connect("localhost", "root", "", "sample");
    mysqli_select_db($connect, "sample");

    $selrec = "SELECT * FROM board WHERE title='$title'";
    $info = mysqli_query($connect, $selrec);
    if (!$info) die("조회결과 없습니다.");
    $data = mysqli_fetch_array($info);
    ?>

    <div id="container">
        <div id='header'>작성자: <?= $data['irum'] ?></div>
        <div id='title'>글 제목: <?= $data['title'] ?></div>
        <div id='content'><?= $data['content'] ?></div>

        <?php
        $uprec = "UPDATE board SET hits=hits+1 WHERE no={$data['no']}";
        $info2 = mysqli_query($connect, $uprec);
        mysqli_close($connect);
        ?>

        <div id='footer'>
            <a href="javascript:history.back()">목록으로 이동</a>
        </div>
    </div>

</body>

</html>
