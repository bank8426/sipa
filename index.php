<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Buffalo Bridge Football</title>
<? echo  '<div style="color:#FDD900;text-align:center; font-size: 50px">Buffalo Bridge Football</div>';	
					?>

</head>
<body style="background-color:#416730">
<?
include 'connect.php';
$result = mysql_query("SELECT * FROM commentator");
?>
<table width="1000" border="0" align="center" style="background-color:#416730">
<tr><td align="center">
    <table width="800" border="1" style="background-color:#648C41">
    
      <?
      while($row = mysql_fetch_array($result)) {
      ?>
      <tr>
        <?
            for($i=0;$i<4;$i++)
            {
				 echo "<td width='25%' style='background-color:#648C41'>";	
                if($row['c_id']!='')
                {
                   	echo"<a style='text-decoration: none' href=comment.php?c_id=" .$row['c_id'] . ">";
					 echo "<img width=250 src='" . $row['c_picture'] . "' border=0>";
					 
					echo  '<div style="color:#FFFFFF;text-align:center;">' . $row['c_id'] . " " . $row['c_name'] .
					'</div>';	
					echo "</a>";
                    //echo "</td>";
                
                }
				echo "</td>";
				if($i<3)
				{
                	$row = mysql_fetch_array($result);
				}
            }
        ?>
      </tr>
      <?
      }
        ?>
    </table>
</td></tr>
</table>
<?
mysql_close();
?>

</body>
</html>