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
     
      <form action = "prepodfun.php" method="post">
  <fieldset>
    <legend>Заполнение:</legend>
      <p><label>Фамилия:</label><input type="text" name="tfam"></p>
    <p><label>Имя:</label><input type="text" name="tname"></p>
      <p><label>Отчество:</label><input type="text" name="totch"></p>
    <p><label>email:</label><input type="email" name="email"></p>
  </fieldset>
<p><button type="submit" name="send" class="btn btn-success">Добавить</button></p>
         <p><label>ID:</label><input type="number" name = "t_id" min = "1"></p>
      <button type="submit" name="edit" class="btn btn-success">Редактировать</button>
</form>

     <table border="1" style = "color:#00008B">
<tr>
<td>id</td>
<td>Фамилия</td>
<td>Имя</td>
<td>Отчество</td>
<td>email</td>
<td>Удаление</td>
<?php
    $conn = pg_connect('host=localhost port=5432 dbname=baza user=postgres password=2000'); 
         $query = pg_query ($conn, 'SELECT t_id, tname, tfam, totch, email FROM teachers');
         while($data = pg_fetch_array($query)){
         echo '
				<tr>
                <td>'.$data['t_id'].'</td>
				<td>'.$data['tfam'].'</td>
				<td>'.$data['tname'].'</td>
                <td>'.$data['totch'].'</td>
				<td>'.$data['email'].'</td>
                <td>
				<form action = "prepodfun.php" method="post">
					<button type="submit" name="delete" value="'.$data['t_id'].'">Удалить</button>
				</form>
				</td>
				</tr>
         ';
         }
        ?>>
</table>
     
     </br>
     
 <?php require "footer.php"?>
</div>
 </body>
</html>