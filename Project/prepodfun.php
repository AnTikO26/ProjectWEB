<?php

if(isset($_POST['delete']))    {
 $conn = pg_connect('host=localhost port=5432 dbname=baza user=postgres password=2000');
pg_query($conn, 'DELETE FROM teachers WHERE t_id='.$_POST['delete']);
pg_close($conn);


}
else {

$t_id=$_POST['t_id'];
$tfam=$_POST['tfam'];
$tname=$_POST['tname'];
$totch=$_POST['totch'];
$email=$_POST['email'];


$error='';
if(trim($tfam)=='')
$error='Введите фамилию преподавателя';
else if (trim($tname)=='')
$error='Введите имя преподавателя';
else if (trim($totch)=='')
$error='Введите отчество преподавателя';
else if (trim($email)=='')
$error='Введите email преподавателя';
if($error!=''){
echo $error;
  exit;
}
if(trim($t_id)=='')
{
  $conn = pg_connect('host=localhost port=5432 dbname=baza user=postgres password=2000');
    $query = "INSERT INTO teachers (tfam, tname, totch, email)  VALUES ('$tfam', '$tname', '$totch', '$email')";
    pg_query ( $conn,$query);
  pg_close($conn);
}
    else
{
$conn = pg_connect('host=localhost port=5432 dbname=baza user=postgres password=2000');

  $sql = "UPDATE teachers
  SET tfam='$tfam', tname='$tname', totch='$totch', email='$email'
  WHERE t_id=$t_id";
  pg_query($conn, $sql);
  pg_close($conn);
}
}
header('Location:prepod.php');
?>