<?php

if(isset($_POST['delete']))    {
 $conn = pg_connect('host=localhost port=5432 dbname=baza user=postgres password=2000');
pg_query($conn, 'DELETE FROM predmets WHERE p_id='.$_POST['delete']);
pg_close($conn);


}
else {
    
$p_id=$_POST['p_id'];
$pname=$_POST['pname'];
$prepod=$_POST['prepod'];



if(trim($p_id)=='')
{
  $conn = pg_connect('host=localhost port=5432 dbname=baza user=postgres password=2000');
    $query = "INSERT INTO predmets (pname, prepod)  VALUES ('$pname', '$prepod')";
    pg_query ( $conn,$query);
  pg_close($conn);
}
    else
{
$conn = pg_connect('host=localhost port=5432 dbname=baza user=postgres password=2000');

  $sql = "UPDATE predmets
  SET pname='$pname', prepod='$prepod'
  WHERE p_id=$p_id";
  pg_query($conn, $sql);
  pg_close($conn);
}
}
header('Location:predmets.php');
?>