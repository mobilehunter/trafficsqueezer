<style type="text/css">
table.grid_style {border-width:1px;border-spacing:2px;border-style:ridge;border-color:#B6B6B6;border-collapse:collapse;background-color:white;}
table.grid_style th {border-width:1px;padding:1px;border-style:ridge;border-color:#B6B6B6;background-color:white;font-size:10px;}
table.grid_style td {border-width:1px;padding:1px;border-style:ridge;border-color:#B6B6B6;background-color:white;font-size:10px;}
#table_top_heading {background-color:gray;font-weight:bold;color:white;text-decoration:none;font-size:10px;}
</style>
<?php include('c/c_db_access.php');
session_start(); $username = $_SESSION['username'];
$query = "select stats_history from profile where username='$username'";
$result=mysql_query($query, $db);
if(mysql_num_rows($result) > 0)
{  while($row = mysql_fetch_array($result))
   { $stats_history = $row['stats_history']; }
}
print "<form method=\"POST\" action=\"stats_history_bknd.php\">";
print "<input type=\"hidden\" id=\"stats_history_before\" name=\"stats_history_before\" value=\"$stats_history\" >";
print '<table border="0" width="720">';
print '<tr><td width="120">Statistics since last</td><td width="580">';
$disabled="disabled=disabled";
if($stats_history=="120") $checked="checked"; else $checked="";
print "<input type=\"radio\" id=\"stats_history\" name=\"stats_history\" value=\"120\" $checked />2 Hours&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
if($stats_history=="60") $checked="checked"; else $checked="";
print "<input type=\"radio\" id=\"stats_history\" name=\"stats_history\" value=\"60\" $checked />1 Hour&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>";

if($stats_history=="30") $checked="checked"; else $checked="";
print "<input type=\"radio\" id=\"stats_history\" name=\"stats_history\" value=\"30\" $checked />30 Minutes&nbsp;&nbsp;&nbsp;";
if($stats_history=="10") $checked="checked"; else $checked="";
print "<input type=\"radio\" id=\"stats_history\" name=\"stats_history\" value=\"10\" $checked />10 Minutes&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
if($stats_history=="5") $checked="checked"; else $checked="";
print "<input type=\"radio\" id=\"stats_history\" name=\"stats_history\" value=\"5\" $checked />5 Minutes&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
print "</td></tr>";
print "<tr><td><br></td></tr>";
print "<tr><td valign=bottom width=\"70\">";
print "<input title=\"Save settings ?\" type=\"submit\" name=\"submit_ok\" value=\"Save\" style=\"border:0;background-color:#ff5c00;color:white;font-weight:bold;font-size:11px;\" /></td>";
print "<td width=\"250\"></td></tr>";
print "</table></center>";
?>
<br><br>