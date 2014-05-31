
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
	c_picture,
	c_profile
	 
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
	WHERE c_id = ".$_GET['c_id']." ORDER BY created_date DESC
	";
	$result = mysql_query($sql);
	
	$sum = 0;
	$count = 0;
	$avg = 0;
	while($feedback = mysql_fetch_array($result))
	{
		$sum = $sum + $feedback[f_rating];
		$count = $count + 1;
	}
	
	$avg =$sum/$count;
	
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Buffalo Bridge Football</title>


</head>


<body style="background-color:#416730">
<a href="index.php"> <-- Back</a>
<? echo  '<div style="color:#FDD900;text-align:Left; font-size: 50px">' . $row['c_name'] . '(Rating : ' . $avg .')</div>' ;	
					?>







<table width="100%" >

  <tr >
  
    <td  style="background:#648C41" align="center">
    <br><img src="<?=$row['c_picture']?>" width="300"><br>

<?=$row['c_profile']?>
    </td>
    <td>
    
<br>
<br>

</td>
  </tr>
</table>
<p>&nbsp;</p>

<table width="200" border="1" align="center" style="background:#648C41">
  <tr>
  <td>

<table width="100%">

 <?
      while($feedback = mysql_fetch_array($result)) {
      ?>
  <tr>
    <td bgcolor="#FFFFFF">NAME :<?=$feedback['f_name']?><br>

<?=nl2br($feedback['f_message'])?><br>
<br>

</td>
  </tr>
  <? }?>
  <tr>
</table>
<p>&nbsp;</p>
<form action="?c_id=<?=$_GET['c_id']?>" method="post">
   <span style="color:#FFF; font-weight:bold"> Name: </span><input name="nameFeed" type="text" size="50" maxlength="200">
<br>

<span style="color:#FFF; font-weight:bold">Comment:</span> <br>
	<textarea name="commentTA" cols="80" rows="3"></textarea><br>
<span style="color:#FFF; font-weight:bold">Rating: </span>
    <input name="Rating" type="radio" value="1"><span style="color:#FFF; font-weight:bold"> 1</span>
    <input name="Rating" type="radio" value="2"><span style="color:#FFF; font-weight:bold"> 2</span>
    <input name="Rating" type="radio" value="3"><span style="color:#FFF; font-weight:bold"> 3</span>
    <input name="Rating" type="radio" value="4"><span style="color:#FFF; font-weight:bold"> 4</span>
    <input name="Rating" type="radio" value="5"><span style="color:#FFF; font-weight:bold"> 5</span><br>
<input name="SEND" value="Send Feedback" type="submit">
</form>
</td>
  </tr>
</table>

</body>
</html>