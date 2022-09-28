<?php

if(isset($_POST['delete']))    {
 $conn = pg_connect('host=localhost port=5432 dbname=baza user=postgres password=2000');
pg_query($conn, 'DELETE FROM students WHERE s_id='.$_POST['delete']);
pg_close($conn);


}
else {

$s_id=$_POST['s_id'];
$sfam=$_POST['sfam'];
$sname=$_POST['sname'];
$sotch=$_POST['sotch'];
$kurs=$_POST['kurs'];
$institut=$_POST['institut'];
$formob=$_POST['formob'];
$stip=$_POST['stip'];


$error='';
if(trim($sname)=='')
$error='Введите имя';
else if (trim($sfam)=='')
$error='Введите фамилию';
else if (trim($sotch)=='')
$error='Введите отчество';
else if (trim($kurs)=='')
$error='Введите курс';
else if (trim($institut)=='')
$error='Введите институт';

if($error!=''){
echo $error;
  exit;
}
if(trim($s_id)=='')
{
  $conn = pg_connect('host=localhost port=5432 dbname=baza user=postgres password=2000');
    $query = "INSERT INTO students (sfam, sname, sotch, kurs, institut, formob, stip)  VALUES ('$sfam', '$sname', '$sotch', '$kurs', '$institut', '$formob', '$stip')";
    pg_query ( $conn,$query);
  pg_close($conn);
}
    else
{
$conn = pg_connect('host=localhost port=5432 dbname=baza user=postgres password=2000');

  $sql = "UPDATE students
  SET sfam='$sfam', sname='$sname', sotch = '$sotch', kurs='$kurs', institut=$institut, formob=$formob, stip = $stip
  WHERE s_id=$s_id";
  pg_query($conn, $sql);
  pg_close($conn);
}
}
header('Location:student.php');
?>