<!DOCTYPE html>
<html>
 <head>
  <meta charset="utf-8">
  <title>Приход</title>
 <link rel="stylesheet" type="text/css" href="prihod.css">
 </head>
  <body>
  <form method="post" action""> 
  <input type="date" id="data_postavki" name="data_postavki"  class="cal1">
  
  <select name="new_doc" id="new_doc" class="opt1_1">
            <option value="no">нет</option>
			<option value="yes">да</option>
  </select>
  <select name="vid_documenta" id="vid_documenta" class="opt1">
            <option value=""></option>
			<option value="акт">акт</option>
			<option value="инвентаризация">инвентаризация</option>
			<option value="счет-фактура">счет-фактура</option>
			<option value="товарно-транспортная накладная">товарно-транспортная накладная</option>
  </select>
  <select name="marca" id="marca" class="opt3">
	<option value=""></option>
	        <option value="ППГнг(А)-HF">ППГнг(А)-HF</option>
	        <option value="А2ХН">А2ХН</option>
	        <option value="ППГнг(А)-FRHF">ППГнг(А)-FRHF</option>
	        <option value="LIHH">LIHH</option>
	        <option value="LIYY(TP)">LIYY(TP)</option>
	        <option value="LITCS FR.4mm">LITCS FR.4mm</option>
	        <option value="CAT 5E HF-FTP">CAT 5E HF-FTP</option>
	        <option value="КГТП-ХЛ">КГТП-ХЛ</option>
	        <option value="КПСнг(А)-FRHF">КПСнг(А)-FRHF</option>
	        <option value="НO7V-K 6 GG">НO7V-K 6 GG</option>
	        <option value="HO7V-K">HO7V-K</option>
	        <option value="НO7V-K 25 GG">НO7V-K 25 GG</option>
	        <option value="Nexans H03VV-F">Nexans H03VV-F</option>
	        <option value="Alsecure">Alsecure</option>
	        <option value="Alsecure Plus">Alsecure Plus</option>
	        <option value="EIB-H(st)H">EIB-H(st)H</option>
  </select>
  
  <input type="text" id="n_documenta" size="40" name="n_documenta" class="pole1">
  <input type="date" id="data_documenta" name="data_documenta" class="cal2">
  
   <input type="n_barabana" id="n_barabana" size="40" name="n_barabana" class="pole2">
    <input type="text" id="dlina" size="40" name="dlina" class="pole3">
  <p class="kv9">НОВЫЙ ДОКУМЕНТ</p> 
  <p class="kv1">ДАТА ПОСТАВКИ</p>
  <p class="kv2">ВИД ДОКУМЕНТА</p>
  <p class="kv3">НОМЕР ДОКУМЕНТА</p>
  <p class="kv4">ДАТА ДОКУМЕНТА</p>
  <p class="kv5">МАРКА КАБЕЛЯ</p>
  <p class="kv7">НОМЕР БАРАБАНА</p>
  <p class="kv8">ДЛИНА (КМ)</br> Дробные числа писать через точку"."</p>
  
  <input type="submit" value="Учесть" name="submit" class="cnop2">
  </form>
  <form action="index.html">
  <p><button class="cnop1">На главную страницу</button></p>
  </form>

<?php

$connect=mysql_connect ('localhost','eldar1wa_11','2018AS','eldar1wa_11')
or die ('Ошибка соединения с MySQL-сервером');
mysql_select_db('eldar1wa_11',$connect);

$new_doc=$_POST['new_doc'];
if ($new_doc!='no')
{
    $data_postavki = $_POST['data_postavki'];
    $data_documenta = $_POST['data_documenta']; 
    $vid_documenta = $_POST['vid_documenta'];
    $n_documenta = $_POST['n_documenta'];
    $marca = $_POST['marca'];
    $n_barabana = $_POST['n_barabana'];
    $dlina = $_POST['dlina'];
}

if ($new_doc!='yes')
{
$data_postavki_query="select data_provodki
    from uchet where id_bar = (select max(id_bar) from uchet)" or die ('"<p class="kv10">Ошибка запроса документа</p>"');
      $result_data_postavki=mysql_query($data_postavki_query) or die ('"<p class="kv10">Ошибка mysql_query </p>"'); 
      $row_data_postavki=mysql_fetch_array($result_data_postavki) or die ('"<p class="kv10">Ошибка mysql_query </p>"');// возвращает массив
      $data_postavki= $row_data_postavki[0];
  $data_documenta_query="select data_documenta
    from uchet where id_bar = (select max(id_bar) from uchet)" or die ('"<p class="kv10">Ошибка запроса документа</p>"');
      $result_data_documenta=mysql_query($data_documenta_query) or die ('"<p class="kv10">Ошибка mysql_query </p>"'); 
      $row_data_documenta=mysql_fetch_array($result_data_documenta) or die ('"<p class="kv10">Ошибка mysql_query </p>"');
      $data_documenta=$row_data_documenta[0];
  $vid_documenta_query="select document
    from uchet where id_bar = (select max(id_bar) from uchet)" or die ('"<p class="kv10">Ошибка запроса документа</p>"');
      $result_vid_documenta=mysql_query($vid_documenta_query) or die ('"<p class="kv10">Ошибка mysql_query </p>"'); 
      $row_vid_documenta=mysql_fetch_array($result_vid_documenta) or die ('"<p class="kv10">Ошибка mysql_query </p>"');
      $vid_documenta=$row_vid_documenta[0];
  $n_documenta_query="select n_documenta
    from uchet where id_bar = (select max(id_bar) from uchet)" or die ('"<p class="kv10">Ошибка запроса документа</p>"');
      $result_n_documenta=mysql_query($n_documenta_query) or die ('"<p class="kv10">Ошибка mysql_query </p>"'); 
      $row_n_documenta=mysql_fetch_array($result_n_documenta) or die ('"<p class="kv10">Ошибка mysql_query </p>"');
      $n_documenta=$row_n_documenta[0]; 
      $mesto = $_POST['mesto'];
      $marca = $_POST['marca'];
      $n_barabana = $_POST['n_barabana'];
      $dlina = $_POST['dlina'];
}

$query="insert into uchet (marca,  n_barabana, data_provodki, document, n_documenta,
        data_documenta, prihod, ostatoc)
VALUES ('$marca','$n_barabana','$data_postavki', '$vid_documenta','$n_documenta','$data_documenta',
        '$dlina','$dlina')" or die ('ОШИБКА ВСТАВКИ В БД');//присвоение запроса переменной
        
if ($dlina !='')
{
mysql_query($query) or die ('Ошибка mysql_query1');
$query_prihod="select prihod from ostatoc where marc_cab='$marca'" or die ('Ошибка $query_prihod1');
$query_prihod2=mysql_query($query_prihod) or die ('Ошибка $query_prihod2');
$query_prihod22=mysql_fetch_array($query_prihod2) or die ('Ошибка $query_prihod22');
$query_prihod222=$query_prihod22[0];
$prihod_summa=$query_prihod222+$dlina;

$query_prihod3="Update ostatoc set prihod ='$prihod_summa' where marc_cab='$marca'" 
    or die ('Ошибка $query_prihod');
mysql_query($query_prihod3) or die ('Ошибка mysql_query3');//посылаетзапрос
$prihod_rashod="select rashod from ostatoc where marc_cab='$marca'" or die ('Ошибка $prihod_rashod');
$rashod=mysql_query($prihod_rashod) or die ('Ошибка mysql_query4');
$rashod2=mysql_fetch_array($rashod) or die ('Ошибка $rashod2');
$rashod22=$rashod2[0];
$prihod_ostatoc=$prihod_summa-$rashod22 or die ('Ошибка $prihod_ostatoc');
$query_ostatoc="Update ostatoc set ostatoc = '$prihod_ostatoc' where marc_cab='$marca'" 
    or die ('Ошибка $query_ostatoc');
mysql_query($query_ostatoc) or die ('Ошибка mysql_query5');


echo '<p class="kv10">Учтено</p>';
}
     else
     {
      echo '<p class="kv10">Не проведено. Нет длины</p>';   
     }



mysql_close($connect);

	?>  
  
 </body>
</html>