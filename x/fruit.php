<html> <body>
<?PHP 
  $conn = mysqli_connect('localhost', 'root',  '', 'sample');
  if(mysqli_connect_errno()) {
    printf("%s \n", mysqli_connect_error());
    exit;
  }
  $query = "select * from fruit where price >= 30 && country='Korea'";
  $result = mysqli_query( $conn, $query );
  print "<table border=1><tr>" . 
       "<th>Name</th>" .
       "<th>Price</th>" . 
       "<th>Color</th>" .
       "<th>Country</th></tr>";
  while( $row = mysqli_fetch_row($result) ) {
    print "<tr><td>" . $row[0] . "</td>" . 
         "<td>" . $row[1] . "</td>" . 
         "<td>" . $row[2] . "</td>" . 
         "<td>" . $row[3] . "</td></tr>";
  }
  print "</table>";
  mysqli_free_result($result);
  mysqli_close($conn);
?>
</body> </html>
