<? include 'connect.php';



if($_POST['SEND']){
	$sql = "INSERT INTO buffalobridge.feedback 
	(
	c_id, 
	f_name, 
	f_message, 
	f_rating, 
	is_active, 
	created_date, 
	updated_date
	)
	VALUES
	( 
	'".$_GET['c_id']."', 
	'".$_POST['nameFeed']."', 
	'".$_POST['commentTA']."', 
	'".$_POST['Rating']."', 
	'1', 
	NOW(), 
	NOW()
	);";
	mysql_query($sql);
}


//$_GET['c_id'] = 1;
$sql = "
SELECT 	
	c_name, 
	c_picture

	 
	FROM 
	commentator 
	WHERE c_id = ".$_GET['c_id']."
	LIMIT 1";
	$result = mysql_query($sql);
	$row = mysql_fetch_array($result);
	
	
	$sql = "SELECT 	f_id, 
	c_id, 
	f_name, 
	f_message, 
	f_rating, 
	is_active, 
	created_date, 
	updated_date
	 
	FROM 
	feedback 
	WHERE c_id = ".$_GET['c_id']."
	";
	$result = mysql_query($sql);
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>








<table width="100%">
  <tr>
    <td><img src="<?=$row['c_picture']?>" width="300"><br>
<?=$row['c_name']?>
    </td>
    <td>
    <form action="?c_id=<?=$_GET['c_id']?>" method="post">
    Name: <input name="nameFeed" type="text" size="50" maxlength="200">
<br>

Comment: <br>
	<textarea name="commentTA" cols="80" rows="3"></textarea><br>
Rating: 
    <input name="Rating" type="radio" value="1"> 1
    <input name="Rating" type="radio" value="2"> 2
    <input name="Rating" type="radio" value="3"> 3
    <input name="Rating" type="radio" value="4"> 4
    <input name="Rating" type="radio" value="5"> 5<br>
<input name="SEND" value="Send Feedback" type="submit">
</form>
<br>
<br>
<table width="100%">
 <?
      while($feedback = mysql_fetch_array($result)) {
      ?>
  <tr>
    <td>NAME :<?=$feedback['f_name']?><br>

<?=nl2br($feedback['f_message'])?><br>
<br>

</td>
  </tr>
  <? }?>
</table>
</td>
  </tr>
</table>
<p>&nbsp;</p>
</body>
</html>