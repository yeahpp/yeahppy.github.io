<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>게시판 목록 및 삭제</title>

    <style>
        body {
            font-family: '돋움체', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        #container {
            max-width: 900px;
            margin: 20px auto;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }

        #header {
            background-color: #4e4376;
            color: #fff;
            padding: 20px;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: center;
        }

        th {
            background-color: #4e4376;
            color: #fff;
        }

        legend {
            font-size: 1.5em;
            font-weight: bold;
            color: #4e4376;
            margin-bottom: 10px;
        }

        form {
            padding: 20px;
            box-sizing: border-box;
        }

        label {
            display: block;
            margin-bottom: 10px;
            color: #4e4376;
            font-size: 1.2em;
        }

        input[type="text"],
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #4e4376;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4e4376;
            color: #fff;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #392f5a;
        }
    </style>
</head>

<body>

    <div id="container">
        <div id="header">
            <h1>게시판 목록</h1>
        </div>

        <?php
        $conn = mysqli_connect('localhost', 'root', '', 'sample');
        if (mysqli_connect_errno()) {
            printf("%s \n", mysqli_connect_error());
            exit;
        }
        $query = "SELECT * FROM board";
        $result = mysqli_query($conn, $query);
        ?>

        <table>
            <tr>
                <th>번호</th>
                <th>이름</th>
                <th>비밀번호</th>
                <th>제목</th>
                <th>내용</th>
                <th>등록일</th><th>조회수</th>
            </tr>
            <?php
            while ($row = mysqli_fetch_row($result)) {
                echo "<tr>";
                for ($i = 0; $i < count($row); $i++) {
                    echo "<td>{$row[$i]}</td>";
                }
                echo "</tr>";
            }
            ?>
        </table>

        <form action="26_delresult.php" method="post">
            <fieldset>
                <legend>삭제할 게시판 번호를 입력하세요</legend>
                <label>번호</label><input type="text" name="c_code">
                <input type="submit" value="삭제하기">
            </fieldset>
        </form>
    </div>

</body>

</html>
