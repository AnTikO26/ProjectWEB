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
     
     <form action = "predmetsfun.php" method="post">
  <fieldset>
    <legend>Заполнение:</legend>
      <p><label>Название:</label><input type="text" name="pname"></p>
      <label>Преподаватель:</label>
      <?php
$conn = pg_connect('host=localhost port=5432 dbname=baza user=postgres password=2000'); 
$sql = "SELECT * FROM teachers";
$result_select = pg_query($conn, $sql);
echo "<select name = 'prepod'>";
while($object = pg_fetch_object($result_select)){
echo "<option value = '$object->tfam' > $object->tfam </option>";
}
echo "</select>";
?>
      
  </fieldset>
<p><button type="submit" name="send" class="btn btn-success">Добавить</button></p>
         <p><label>ID:</label><input type="number" name = "p_id" min = "1"></p>
      <button type="submit" name="edit" class="btn btn-success">Редактировать</button>
</form>
     
     
<table border="1" style = "color:#00008B">
<tr>
<td>id</td>
<td>Название</td>
<td>Преподаватель</td>
<td>Удалить</td>
<?php
    $conn = pg_connect('host=localhost port=5432 dbname=baza user=postgres password=2000'); 
         $query = pg_query ($conn, 'SELECT p_id, pname, prepod FROM predmets');
         while($data = pg_fetch_array($query)){
         echo '
				<tr>
                <td>'.$data['p_id'].'</td>
				<td>'.$data['pname'].'</td>
				<td>'.$data['prepod'].'</td>
                <td>
				<form action = "predmetsfun.php" method="post">
					<button type="submit" name="delete" value="'.$data['p_id'].'">Удалить</button>
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