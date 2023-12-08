<?php
$jcode=$_POST["jcode"];
$irum=$_POST["irum"];
$que=strval($_POST["que"]);
$price=strval($_POST["price"]);

$connect=mysqli_connect("localhost","root","");
mysqli_select_db( $connect,"sample");

$inrec="insert into goods values('$jcode','$irum','$que','$price')";




//$inrec= mysqli_query($connect,"INSERT INTO goods (jcode,irum,que,price) VALUES ('$jcode','$irum','$que','$price')");

//mysqli_query($conn,"INSERT INTO Persons (user_name, age) VALUES ('$user_name','$age')");
//출처: https://makand.tistory.com/entry/PHP-Mysql-insert-into-구문 [진격의 IT:티스토리]


$info = mysqli_query( $connect,$inrec);
print $inrec."<br>";



if(!$info)
{
    die("등록실패.<br>");

}
else{
    echo("등록되었습니다.");
}

mysqli_close($connect);
?>