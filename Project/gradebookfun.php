<?php

if(isset($_POST['delete']))    {
 $conn = pg_connect('host=localhost port=5432 dbname=baza user=postgres password=2000');
pg_query($conn, 'DELETE FROM gradebook WHERE g_id='.$_POST['delete']);
pg_close($conn);


}
else {

$g_id=$_POST['g_id'];
$sem=$_POST['sem'];
$data=$_POST['data'];
$gpred=$_POST['gpred'];
$gprepod = $_POST['gprepod'];
$gstud = $_POST['gstud'];
$point = $_POST['point'];
$vid = $_POST['vid'];


$error='';
if(trim($sem)=='')
$error='Введите семестр';
else if (trim($data)=='')
$error='Введите дату';
if($error!=''){
echo $error;
  exit;
}
if(trim($g_id)=='')
{
  $conn = pg_connect('host=localhost port=5432 dbname=baza user=postgres password=2000');
    $query = "INSERT INTO gradebook (sem, data, gpred, gprepod, gstud, point, vid)  VALUES ('$sem', '$data', '$gpred', '$gprepod', '$gstud', '$point', '$vid')";
    pg_query ( $conn,$query);
  pg_close($conn);
}
    else
{
$conn = pg_connect('host=localhost port=5432 dbname=baza user=postgres password=2000');

  $sql = "UPDATE gradebook
  SET sem='$sem', data=$data, gpred = $gpred, gprepod = $gprepod, gstud = $gstud, point = $point, vid = $vid
  WHERE id_g=$g_id";
  pg_query($conn, $sql);
  pg_close($conn);
}
}
header('Location:gradebook.php');
?>