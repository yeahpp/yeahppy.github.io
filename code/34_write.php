<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Board Registration</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px;
            text-align: center;
        }

        h2 {
            margin-bottom: 20px;
        }

        .success-message {
            color: green;
            margin-bottom: 10px;
        }

        .error-message {
            color: red;
            margin-bottom: 10px;
        }

        a {
            display: inline-block;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<div class="container">
    <?php
    $irum = $_POST['irum'];
    $pwd = $_POST['pwd'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $regdate = date('y-m-d');
    $connect = mysqli_connect("localhost", "root", "", "sample");

    if (!$connect) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $inrec = "INSERT INTO board (irum, pwd, title, content, regdate, hits) VALUES ('$irum', '$pwd', '$title', '$content', '$regdate', 0)";
    $info = mysqli_query($connect, $inrec);

    if (!$info) {
        echo '<h2 class="error-message">글 등록 실패</h2>';
        die(mysqli_error($connect));
    } else {
        echo '<h2 class="success-message">작성하신 글이 등록되었습니다.</h2>';
    }

    mysqli_close($connect);
    ?>
    <a href="34_board.php">글 목록으로</a>
</div>

</body>
</html>
