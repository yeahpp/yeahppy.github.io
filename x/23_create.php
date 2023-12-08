 <?php



$connect=mysqli_connect("localhost", "root", "");
if(!$connect)
{
    die("db connect error".mysql_error());
}

mysqli_select_db($connect,"sample");
$str="create table goods(jcode char(5) not null, irum varchar(20) not null, que int(4), price int(8), primary key(jcode))";
$qury=mysqli_query($connect,$str);
if(!$qury)
{
    die("테이블 작성 오류<br>");

}
else{
    echo("테이블 생성완료");
}
mysqli_close($connect);
?> 

 



