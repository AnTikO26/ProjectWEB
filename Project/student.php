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
  <title>СтройТорг</title>
     
 </head>
    
 <body>
<?php require "stil.php"?>
     
       <form action = "studentfun.php" method="post">
  <fieldset>
    <legend>Заполнение:</legend>
      <p><label>Фамилия</label><input type="text" name="sfam" ></p>
      <p><label>Имя</label><input type="text" name="sname" ></p>
      <p><label>Отчество</label><input type="text" name="sotch" ></p>
      <p><label>Курс обучения</label><input type="number" name="kurs" min="0"></p>
      <p><label>Институт:</label><input type="text" name = "institut" ></p>     
    <p><label>Форма обучения:</label><select name="formob">
  <option>Очная</option>
  <option>Заочная</option>
 </select></p>
      <label>Стипендия:</label>
      <?php
$conn = pg_connect('host=localhost port=5432 dbname=baza user=postgres password=2000'); 
$sql = "SELECT * FROM stipendia";
$result_select = pg_query($conn, $sql);
echo "<select name = 'stip'>";
while($object = pg_fetch_object($result_select)){
echo "<option value = '$object->stname' > $object->stname </option>";
}
echo "</select>";
?>
        </fieldset>

<p><button type="submit" name="send" class="btn btn-success">Добавить</button></p>
      <p><label>ID:</label><input type="number" name = "s_id" min = "1"></p>
      <button type="submit" name="edit" class="btn btn-success">Редактировать</button>
</form>
     

     
<table border="1" style = "color:#00008B">
<tr>
<td>id</td>
<td>Фамилия</td>
<td>Имя</td>
<td>Отчество</td>
<td>Курс обучения</td>
<td>Институт</td>
<td>Форма обучения</td>
<td>Стипендия</td>
<td>Удаление</td>
</tr>
     <?php
    $conn = pg_connect('host=localhost port=5432 dbname=baza user=postgres password=2000'); 
         $query = pg_query ($conn, 'SELECT s_id, sfam, sname, sotch, kurs, institut, formob, stip FROM students');
         while($data = pg_fetch_array($query)){
         echo '
				<tr>
                <td>'.$data['s_id'].'</td>
				<td>'.$data['sfam'].'</td>
				<td>'.$data['sname'].'</td>
                <td>'.$data['sotch'].'</td>
				<td>'.$data['kurs'].'</td>
                <td>'.$data['institut'].'</td>
                <td>'.$data['formob'].'</td>
                <td>'.$data['stip'].'</td>
                <td>
				<form action = "studentfun.php" method="post">
					<button type="submit" name="delete" value="'.$data['s_id'].'">Удалить</button>
				</form>
				</td>
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