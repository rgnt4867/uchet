<!DOCTYPE html>
<html>
 <head>
  <meta charset="utf-8">
  <title>Росход</title>
  <link rel="stylesheet" type="text/css" href="rashod.css">
 </head>
  <body>
      
  <form method="post" action"">
  <p class="kv9">НОВАЯ ДАТА</p>
  <p class="kv1">ДАТА ВЫДАЧИ</p>
  <p class="kv2">ПОЛУЧАТЕЛЬ</p>
  <p class="kv5">МАРКА КАБЕЛЯ</p>
  <p class="kv7">НОМЕР БАРАБАНА</p>
  <p class="kv8">ДЛИНА (КМ)</br> Дробные числа писать через точку"."</p>
  
  <input type="date" id= "calendar1" name="calendar1"  class="cal1">
 <input type="text" id="pole_1" name="pole_1" size="40" class="pole1">
 <input type="text" id="n_barabana" name="n_barabana" size="40" class="pole2">
  <select name="new_date" id="new_dat" class="opt5">
	<option value="no">нет</option>
	<option value="yes">да</option>
  </select>
  <select name="poluchatel" id="poluchatel" class="opt1">
	<option value=""></option>
	<option value="АЛП">АЛП</option>
	<option value="Армо">Армо</option>
	<option value="Брайтнет">Брайтнет</option>
	<option value="Инжекс">Инжекс</option>
	<option value="Интегрос">Интегрос</option>
	<option value="КЛМ">КЛМ</option>
	<option value="Перспектива">Перспектива</option>
	<option value="Сейфорт">Сейфорт</option>
	<option value="СКБ">СКБ</option>
	<option value="Стройсервис">Стройсервис</option>
	<option value="Тека">Тека</option>
	<option value="Топлед">Топлед</option>
  </select>
  
   <select name="marca" id="marca" class="opt2">
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
  
  <input type="submit" value="Учесть" class="cnop2">
  </form>
  <form action="index.html">
  <p><button class="cnop1">На главную страницу</button></p>
  </form> 
  
  <?php
$connect=mysql_connect ('localhost','eldar1wa_11','2018AS','eldar1wa_11')
    or die ('Ошибка соединения с MySQL-сервером');
mysql_select_db('eldar1wa_11',$connect) or die ('Ошибка соединения с таблицей');

    $new_date=$_POST['new_date'];
    if ($new_date!='no')
    {
        $poluchatel = $_POST['poluchatel'];
        $marca = $_POST['marca'];
        $n_barabana = $_POST['n_barabana'];
        $data_vidachi = $_POST['calendar1'];
        $dlina =$_POST['pole_1'];
        
    }
    if ($new_date!='yes')
    {
    $data_vidachi_query="select data_provodki
        from uchet where id_bar = (select max(id_bar) from uchet)" or die ('"<p class="kv10">Ошибка запроса документа</p>"');
          $result_data_vidachi=mysql_query($data_vidachi_query) or die ('"<p class="kv10">Ошибка mysql_query </p>"'); 
          $row_data_vidachi=mysql_fetch_array($result_data_vidachi) or die ('"<p class="kv10">Ошибка mysql_query </p>"');// возвращает массив
          $data_vidachi= $row_data_vidachi[0];
          $poluchatel = $_POST['poluchatel'];
          $marca = $_POST['marca'];
          $n_barabana = $_POST['n_barabana'];
          $dlina = $_POST['pole_1'];
    }
 
$query="insert into uchet (marca, n_barabana, data_provodki, poluchatel, rashod, ostatoc)
VALUES ('$marca','$n_barabana','$data_vidachi', '$poluchatel','$dlina',''-'$dlina')";//присвоение запроса переменной 
 
if ($dlina !='')
{
mysql_query($query);//посылаетзапрос

$query_rashod="select rashod from ostatoc where marc_cab='$marca'" or die ('Ошибка $query_rashod1');
$query_rashod2=mysql_query($query_rashod) or die ('Ошибка $query_rashod2');
$query_rashod22=mysql_fetch_array($query_rashod2) or die ('Ошибка $query_rashod22');
$query_rashod222=$query_rashod22[0];
$rashod_summa=$query_rashod222+$dlina;

$query_rashod3="Update ostatoc set rashod ='$rashod_summa' where marc_cab='$marca'" 
    or die ('Ошибка $query_rashod');
mysql_query($query_rashod3) or die ('Ошибка mysql_query3');//посылаетзапрос
$prihod_prihod="select prihod from ostatoc where marc_cab='$marca'" or die ('Ошибка $prihod_prihod');
$prihod=mysql_query($prihod_prihod) or die ('Ошибка mysql_query4');
$prihod2=mysql_fetch_array($prihod) or die ('Ошибка $prihod2');
$prihod22=$prihod2[0];
$rashod_ostatoc=$prihod22-$rashod_summa or die ('Ошибка $rashod_ostatoc');
$query_ostatoc="Update ostatoc set ostatoc = '$rashod_ostatoc' where marc_cab='$marca'" 
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