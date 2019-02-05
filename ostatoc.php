<!DOCTYPE HTML>
<html>
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>Остаток</title>
  <link rel="stylesheet" type="text/css" href="ostatoc.css">
 </head>
 <body>
 <form action="index.html">
  <p><button class="cnop1">На главную страницу</button></p>
  </form>
<?php

$connect=mysql_connect ('localhost','eldar1wa_11','2018AS','eldar1wa_11')
or die ('Ошибка соединения с MySQL-сервером');
mysql_select_db('eldar1wa_11',$connect);

$query_tabl="SELECT marc_cab, ostatoc, prihod, rashod FROM ostatoc" or die ('Ошибка запроса');
 
$query = mysql_query($query_tabl, $connect) or die ('Ошибка mysqli_query'); 

$row = mysql_fetch_array($query) or die ('Ошибка mysqli_fetch_array');

echo "<table border=1> 
<tr><th>МАРКА</th><th>ПРИХОД</th><th>РАСХОД</th><th>ОСТАТОК</th></tr>"; 

while($row = mysql_fetch_array($query))
{
echo "<tr><td>",$row['marc_cab'],"</td><td>",
                $row['prihod'],"</td><td>",
                $row['rashod'],"</td><td>",
                $row['ostatoc'],"</td></tr>"."<br>";
}

?>
	<?php
		mysqli_close($connect);
	?>  
  
 </body>
</html>


