<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>회원상세정보</title>

    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            text-align: center;
        }

        form {
            width: 350px;
            margin: 30px auto;
            background-color: #fff;
            border: 1px dashed #cc9900;
            padding: 15px;
            font-size: 1.2em;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        div {
            margin-bottom: 10px;
        }

        input {
            width: 100%;
            padding: 8px;
            font-size: 1.1em;
            color: #ddaa99;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        a {
            display: inline-block;
            text-decoration: none;
            font-size: 1.3em;
            color: #fff;
            background-color: #4CAF50;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        a:hover {
            background-color: #45a049;
        }

        h2 {
            text-align: center;
            color: #333;
        }
    </style>
</head>

<body>

    <?php
    $id = $_GET['id'];
    $connect = mysqli_connect("localhost", "root", "", "sample");
    mysqli_select_db($connect, "sample");

    $sqlrec = "SELECT * FROM member WHERE id='$id'";
    $info = mysqli_query($connect, $sqlrec);

    if (!$info)
        die("쿼리오류!!");
    $data = mysqli_fetch_array($info);
    ?>

    <form>
        <h2><?= $data['id'] ?> 회원상세정보</h2>
        <div>이름<input type="text" value="<?= $data['irum'] ?>"></div>
        <div>아이디<input type="text" value="<?= $data['id'] ?>"></div>
        <div>별명<input type="text" value="<?= $data['nicname'] ?>"></div>
        <div>이메일<input type="text" value="<?= $data['email'] ?>"></div>
        <div>비밀번호<input type="text" value="<?= $data['pwd'] ?>"></div>
        <div>가입일자<input type="text" value="<?= $data['regdate'] ?>"></div>
    </form>

    <a href="javascript:history.back()">회원현황으로 이동</a>

</body>

</html>
