<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>
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
                if($row['c_id']!='')
                {
                    echo "<td width='25%' style='background-color:#FFF'>";
                    echo $row['c_id'] . " " . $row['c_name'];
                    echo "<br>";	
                    echo "</td>";
                
                }
                else
                {
                    echo "<td width='25%' style='background-color:#FFF'>";
                    echo "</td>";
                }
				if($i<4)
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