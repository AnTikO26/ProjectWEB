<!DOCTYPE HTML>
<html lang="ru">
 <head>
     <style>
body { background: url(fontf.jpg); }
</style>
  <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-seale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <title>Пример веб-страницы</title>
 </head>
 <body>
<?php require "stil.php"?>

     <table border="1" style = "color:#00008B">
<tr>
<td>id</td>
<td>Вид стипендии</td>
<td>Сумма</td>
</tr>
        <?php
    $conn = pg_connect('host=localhost port=5432 dbname=baza user=postgres password=2000'); 
         $query = pg_query ($conn, 'SELECT id, stname, stsumm FROM stipendia');
         while($data = pg_fetch_array($query)){
         echo '
				<tr>
				<td>'.$data['id'].'</td>
				<td>'.$data['stname'].'</td>
				<td>'.$data['stsumm'].'</td>
        </tr>
         ';
         }
        ?>
</table>
     
     </br>
    
 <?php require "footer.php"?>
</div>
 </body>
</html>