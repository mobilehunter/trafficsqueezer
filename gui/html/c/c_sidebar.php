<?php error_reporting(5); session_start(); $language=$_SESSION['language']; ?>
<table summary="sidebar buttons" width="96%"  style="font-family:arial;color:gray;font-size:11px;" >
<tr><td bgcolor="#2981e4" ><a href="home.php" style="color:white;text-decoration:none;font-size:12px;">&nbsp;
<?php if($language=="es") {print "Casa";}
else if($language=="po") {print "Casa";}
else if($language=="ge") {print "Haus";} 
else {print "Home";} ?>
</a></td></tr>
<tr><td><a href="bigpicture.php" target="_blank" style="font-family:arial;color:gray;font-size:11px;text-decoration:none;"> + Big Picture</a></td></tr>
<tr><td bgcolor="#ff5c00" ><a href="" style="color:white;text-decoration:none;font-size:12px;" >&nbsp;Settings</a></td></tr>
<tr><td><a href="ports.php" style="font-family:arial;color:gray;font-size:11px;text-decoration:none;"> + Ports</a></td></tr>
<tr><td><a href="basicset.php" style="font-family:arial;color:gray;font-size:11px;text-decoration:none;"> + Basic Settings</a></td></tr>
<tr><td><a href="bridge.php" style="font-family:arial;color:gray;font-size:11px;text-decoration:none;"> + Bridge</a></td></tr>
<tr><td><a href="remote.php" style="font-family:arial;color:gray;font-size:11px;text-decoration:none;"> + Remote Subnet Machine</a></td></tr>
<!--<tr><td><a href="cust_list.php" style="font-family:arial;color:gray;font-size:11px;text-decoration:none;"> + DPI</a></td></tr>-->
<tr><td><a href="stats_history.php" style="font-family:arial;color:gray;font-size:11px;text-decoration:none;"> + Stats History</a></td></tr>
<tr><td><hr id="hr_style"></td></tr>
<tr><td><a href="w_device_type.php" style="font-family:arial;color:gray;font-size:11px;text-decoration:none;"> + Wizard</a></td></tr>
<tr><td bgcolor="#91bd09" ><a href="" style="color:white;text-decoration:none;font-size:12px;" >&nbsp;Statistics</a></td></tr>
<tr><td><a href="stats_overall.php" style="font-family:arial;color:gray;font-size:11px;text-decoration:none;"> + Overall</a></td></tr>
<tr><td><a href="stats_ip_proto.php" style="font-family:arial;color:gray;font-size:11px;text-decoration:none;"> + IP Protocol</a></td></tr>
<!--<tr><td><a href="stats_coal.php" style="font-family:arial;color:gray;font-size:11px;text-decoration:none;"> + Coalescing</a></td></tr>
<tr><td><a href="stats_l7filter_block_dns.php" style="font-family:arial;color:gray;font-size:11px;text-decoration:none;"> + DNS Filter</a></td></tr>
-->
<!--
<tr><td bgcolor="#ff5c00" ><a href="" style="font-weight:bold;color:white;text-decoration:none;font-size:12px;" >&nbsp;DPI</a></td></tr>
<tr><td><a href="report_sale.php" style="font-family:arial;color:gray;font-size:11px;text-decoration:none;"> + logs</a></td></tr>
<tr><td><a href="report_sale.php" style="font-family:arial;color:gray;font-size:11px;text-decoration:none;"> + logs</a></td></tr>
-->

<tr><td bgcolor="gray" ><a href="help.php" style="color:white;text-decoration:none;font-size:12px;">&nbsp;Help</a></td></tr>
<tr><td><a href="about.php" style="font-family:arial;color:gray;font-size:11px;text-decoration:none;"> + About</a></td></tr>
<tr><td><a href="license.php" style="font-family:arial;color:gray;font-size:11px;text-decoration:none;"> + License</a></td></tr>
<tr><td><a href="contact.php" style="font-family:arial;color:gray;font-size:11px;text-decoration:none;"> + Contact</a></td></tr>

<tr><td bgcolor="#ff5c00" ><a href="" style="color:white;text-decoration:none;font-size:12px;" >&nbsp;Engineering Debug</a></td></tr>
<tr><td><a href="engg_kernel_jobs.php" style="font-family:arial;color:gray;font-size:11px;text-decoration:none;"> + Kernel Jobs</a></td></tr>
<tr><td><a href="engg_gui_jobs.php" style="font-family:arial;color:gray;font-size:11px;text-decoration:none;"> + GUI Jobs</a></td></tr>
<tr><td><a href="engg_tsproc.php?file=/proc/trafficsqueezer/config" style="font-family:arial;color:gray;font-size:11px;text-decoration:none;"> + Proc Config</a></td></tr>
<tr><td><a href="engg_tsproc.php?file=/proc/trafficsqueezer/stats" style="font-family:arial;color:gray;font-size:11px;text-decoration:none;"> + Proc Stats</a></td></tr>
</table>