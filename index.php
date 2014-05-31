<?
include 'connect.php';
$result = mysql_query("SELECT * FROM commentator");















?>
<table width="200" border="0" style="background-color:#416730">
<tr><td>
    <table width="200" border="1" style="background-color:#648C41">
    
      <?
      while($row = mysql_fetch_array($result)) {
      ?>
      <tr>
        <?
            for($i=0;$i<4;$i++)
            {
                if($row['c_id']!='')
                {
                    echo "<td style='background-color:#FFF'>";
                    echo $row['c_id'] . " " . $row['c_name'];
                    echo "<br>";	
                    echo "</td>";
                
                }
                else
                {
                    echo "<td style='background-color:#FFF'>";
                    echo "</td>";
                }
                $row = mysql_fetch_array($result);
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
