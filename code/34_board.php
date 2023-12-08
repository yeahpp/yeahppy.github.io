<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>맛집 자유 게시판</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
            color: #333;
        }

        header {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 1em 0;
        }

        h1 {
            color: #aacc22;
            text-align: center;
            margin-top: 20px;
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background: #ddaa88;
            font-size: 1.2em;
        }

        a {
            text-decoration: none;
            color: #333;
            transition: color 0.3s;
        }

        a:hover {
            color: #ddaa88;
        }

        #ab {
            color: #ee9988;
        }

        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .pagination a,
        .pagination b {
            padding: 10px;
            margin: 0 5px;
            border: 1px solid #ddd;
            text-decoration: none;
            color: #555;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .pagination a:hover {
            background-color: #ddd;
        }

        .today{
            text-align: center;
            margin-top: 20px;
        }

        .today a {
            display: inline-block;
            padding: 12px 24px;
            background-color: green;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .today a:hover {
            background-color: Gray;
        }

        .link_position {
          
            /* bottom: 200px;
            left: 50px; */
        }

        .link_new {
            text-align: center;
            margin-top: 20px;
        }

        .link_new a {
            display: inline-block;
            padding: 12px 24px;
            background-color: #ddaa88;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .link_new a:hover {
            background-color: #cc9966;
        }

        .link_new {
            
            bottom: 50px;
            right: 100px;
        }

        .today{
  position:absolute;
  top:-40px;
  font-size:16px;
  height: 110px;
  line-height: 100px;
}


    </style>
</head>

<body>
    <header>
        <h1>맛집 자유 게시판</h1>
    </header>

    <div class="link_new">
        <a href="34_writein.html" target="_self">글쓰기</a>
    </div>

    <div class="today">
        <a href="23webproject\html\menu_page.html" target="_self">돌아가기</a>
    </div>

    <table>
        <tr>
            <th>NO</th>
            <th>제목</th>
            <th>작성자</th>
            <th>작성일</th>
            <th>조회</th>
        </tr>
        <?php
        $connect = mysqli_connect("localhost", "root", "");
        mysqli_select_db($connect, "sample");

        $page = 1;
        if (empty($_GET['page'])) {
            $page = 1;
        } else {
            $page = $_GET['page'];
        }
        $line_page = 5;
        $block_page = 3;
        $s1 = "select * from board";
        $result = mysqli_query($connect, $s1);
        $totrow = mysqli_num_rows($result);
        $totpage = ceil($totrow / $line_page);
        $totblock = ceil($totpage / $block_page);
        $cblock = ceil($page / $block_page);
        $frow = ($page - 1) * $line_page;

        $selrec = "select * from board order by no desc limit $frow,$line_page";
        $info = mysqli_query($connect, $selrec);
        while ($rowinfo = mysqli_fetch_array($info)) {
            echo "<tr>";
            echo "<td> $rowinfo[no] </td>";
            echo "<td> <a href='34_detailpost.php?title=$rowinfo[title]'> $rowinfo[title] </a></td>";
            echo "<td> $rowinfo[irum] </td>";
            echo "<td> $rowinfo[regdate] </td>";
            echo "<td> $rowinfo[hits] </td>";
            echo "</tr>";
        }
        mysqli_close($connect);
        ?>
    </table>

    <div class="pagination">
        <?php
        $fpage = (($cblock - 1) * $block_page) + 1;
        $lpage = min($totpage, $cblock * $block_page);

        if ($cblock > 1) {
            $prvblock = ($cblock - 1) * $block_page;
            echo "<a href='34_board.php?page=$prvblock'>◀ 이전</a>";
        }

        for ($i = $fpage; $i <= $lpage; $i++) {
            if ($i == $page) {
                echo "<b id='ab'>[$i]</b>";
            } else {
                echo "<a href='34_board.php?page=$i'>[$i]</a>";
            }
        }

        if ($cblock < $totblock) {
            $nxtblock = ($cblock + 1) * $block_page;
            echo "<a href='34_board.php?page=$nxtblock'>다음 ▶</a>";
        }
        ?>
    </div>
</body>

</html>
