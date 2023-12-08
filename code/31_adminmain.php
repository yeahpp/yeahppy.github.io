<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>맛집투어 관리</title>

    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #34495e;
            color: #ecf0f1;
            text-align: center;
            padding: 20px;
        }

        main {
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
            padding: 20px;
        }

        h3 {
            color: #2c3e50;
            text-align: center;
        }

        div {
            width: 100%;
            border: 1px dashed #3498db;
            background: #ecf0f1;
            margin-top: 20px;
            padding: 15px;
            box-sizing: border-box;
        }

        ul {
            list-style: none;
            padding: 0;
        }

        li {
            font-size: 1.2em;
            margin-bottom: 10px;
        }

        a {
            text-decoration: none;
            color: #3498db;
            transition: color 0.3s;
        }

        a:hover {
            color: #2980b9;
        }
    </style>
</head>

<body>

    <header>
        <h1>맛집투어 관리</h1>
    </header>

    <main>
        <?php
        $id = $_POST['id'];
        $pwd = $_POST['pwd'];

        $connect = mysqli_connect("localhost", "root", "", "sample");
        if (!$connect) {
            die("db connect error" . mysqli_error());
        }

        $sqlrec = "SELECT * FROM manager WHERE id=? AND pwd=?";
        $stmt = mysqli_prepare($connect, $sqlrec);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "ss", $id, $pwd);
            mysqli_stmt_execute($stmt);

            $result = mysqli_stmt_get_result($stmt);

            if (!$result || mysqli_num_rows($result) == 0) {
                echo "<script>alert('아이디 또는 비밀번호가 일치하지 않습니다.');history.back();</script>";
                exit;
            }

            $a = mysqli_fetch_array($result);
            mysqli_stmt_close($stmt);
        } else {
            die("Prepared statement error: " . mysqli_error($connect));
        }
        ?>

        <h3><?php echo $id ?>님 반갑습니다.</h3>

        <div>
            <ul>
                <li><a href="31_manager.php">회원관리</a></li>
                <li><a href="delete_board.php">게시판 삭제</a></li>
            </ul>
        </div>
    </main>

</body>

</html>
