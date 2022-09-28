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
     
      <form action = "gradebookfun.php" method="post">
  <fieldset>
    <legend>Заполнение:</legend>
      <p><label>Семестр:</label><input type="number" name="sem" min = "0"></p>
    <p><label>Дата:</label><input type="date" name = "data"></p>
      <p></p> <label>Предмет:</label> 
      <?php
$conn = pg_connect('host=localhost port=5432 dbname=baza user=postgres password=2000'); 
$sql = "SELECT * FROM predmets";
$result_select = pg_query($conn, $sql);
echo "<select name = 'gpred'>";
while($object = pg_fetch_object($result_select)){
echo "<option value = '$object->pname' > $object->pname </option>";
}
echo "</select>";
      ?></p>
      
      <p></p><label>Преподаватель:</label>
      <?php
$conn = pg_connect('host=localhost port=5432 dbname=baza user=postgres password=2000'); 
$sql = "SELECT * FROM teachers";
$result_select = pg_query($conn, $sql);
echo "<select name = 'gprepod'>";
while($object = pg_fetch_object($result_select)){
echo "<option value = '$object->tfam' > $object->tfam </option>";
}
echo "</select>";
          ?></p>
          
      <p></p><label>Студент:</label>
      <?php
$conn = pg_connect('host=localhost port=5432 dbname=baza user=postgres password=2000'); 
$sql = "SELECT * FROM students";
$result_select = pg_query($conn, $sql);
echo "<select name = 'gstud'>";
while($object = pg_fetch_object($result_select)){
echo "<option value = '$object->sfam' > $object->sfam </option>";
}
echo "</select>";
     ?></p>
      <p><label>Оценка:</label><select name="point">
  <option>Не зачтено</option>
  <option>Зачтено</option>
  <option>Неудовлетворительно</option>
  <option>Удовлетворительно</option>
  <option>Хорошо</option>
  <option>Отлично</option>
 </select></p>
      
      <p><label>Оценка:</label><select name="vid">
  <option>Зачет</option>
  <option>Экзамен</option>
  <option>Курсовая работа</option>
  <option>Учебная практика</option>
 </select></p>
  </fieldset>
<p><button type="submit" name="send" class="btn btn-success">Добавить</button></p>
        <p><label>ID:</label><input type="number" name = "g_id" min = "1"></p>
      <button type="submit" name="edit" class="btn btn-success">Редактировать</button>
</form>

<table border="1" style = "color:#00008B">
<tr>
<td>id</td>
<td>Семестр</td>
<td>Дата</td>
<td>Предмет</td>
<td>Преподаватель</td>
<td>Студент</td>
<td>Оценка</td>
<td>Вид контроля</td>
<td>Удаление</td>
</tr>
<?php
    $conn = pg_connect('host=localhost port=5432 dbname=baza user=postgres password=2000'); 
         $query = pg_query ($conn, 'SELECT g_id, sem, data, gpred , gprepod, gstud, point, vid FROM gradebook');
         while($data = pg_fetch_array($query)){
         echo '
				<tr>
                <td>'.$data['g_id'].'</td>
				<td>'.$data['sem'].'</td>
                <td>'.$data['data'].'</td>
				<td>'.$data['gpred'].'</td>
                <td>'.$data['gprepod'].'</td>
                <td>'.$data['gstud'].'</td>
                <td>'.$data['point'].'</td>
                <td>'.$data['vid'].'</td>
                <td>
				<form action = "gradebookfun.php" method="post">
					<button type="submit" name="delete" value="'.$data['g_id'].'">Удалить</button>
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