<?


if($_SERVER['HTTP_HOST'] == '128.199.230.16'){
	
	$ServerName = 'localhost';
	$User = 'buffalobridge';
	$Password = 'buffalobridge';
	$DatabaseName = 'buffalobridge';
}else{
	$ServerName = 'localhost';
	$User = 'root';
	$Password = '1234';
	$DatabaseName = 'buffalobridge';
}



//echo DatabaseName;
$conn =mysql_connect($ServerName,$User,$Password) Or die('Can not connect server');
mysql_select_db($DatabaseName,$conn) or die ('Can not connect database');

mysql_query ('set character_set_client=\'utf8\'');
mysql_query ('set character_set_results=\'utf8\'');
mysql_query ('set collation_connection=\'utf8_unicode_ci\'');

?>