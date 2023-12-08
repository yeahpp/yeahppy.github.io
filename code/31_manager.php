<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>woodpia 회원 현황</title>

    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        header {
            background-color: #2c3e50;
            color: #ecf0f1;
            text-align: center;
            padding: 20px;
            width: 100%;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #2c3e50;
        }

        table {
            width: 80%;
            margin-top: 20px;
            border-collapse: collapse;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }

        th, td {
            padding: 15px;
            text-align: center;
        }

        th {
            background-color: #2c3e50;
            color: #ecf0f1;
        }

        td {
            background-color: #34495e;
            color: #ecf0f1;
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
        <h2>woodpia 회원 현황</h2>
    </header>

    <table>
        <tr>
            <th>아이디</th>
            <th>비밀번호</th>
            <th>가입일자</th>
            <th>상세보기</th>
        </tr>
        <?php
        $connect = mysqli_connect("localhost", "root", "", "sample");

        $sqlrec = "SELECT * FROM member ORDER BY regdate DESC";
        $info = mysqli_query($connect, $sqlrec);

        while ($rowinfo = mysqli_fetch_array($info)) {
            echo "<tr>";
            echo "<td>" . $rowinfo['id'] . "</td>";
            echo "<td>" . $rowinfo['pwd'] . "</td>";
            echo "<td>" . $rowinfo['regdate'] . "</td>";
            echo "<td><a href='31_detail.php?id=" . $rowinfo['id'] . "'>상세보기</a></td>";
            echo "</tr>";
        }
        ?>
    </table>

</body>

</html>
