<style type="text/css">
#l_ip_proto { width:920px;height:140px;background-color:white;}
#w_ip_proto { width:920px;height:140px;background-color:white;}
</style>
<script src="c/flot/jquery.js"></script>
<script src="c/flot/excanvas.js"></script>
<script src="c/flot/jquery.flot.js"></script>
<script src="c/flot/jquery.flot.time.js"></script>
<?php
print '<script type="text/javascript">
 $(document).ready(function() {';

include("/var/www/html/c/c_db_access.php"); error_reporting(5);
include("/var/www/html/c/c_db_access.php"); error_reporting(5);
session_start(); $username = $_SESSION['username'];
$query = "select stats_history from profile where username='$username'";
$result=mysql_query($query, $db);
if(mysql_num_rows($result) > 0)
{  while($row = mysql_fetch_array($result))
   { $stats_history = $row['stats_history']; }
}

$query_condition=" where timestamp>=DATE_SUB(NOW(),INTERVAL $stats_history MINUTE) and type=0";
$output="";

$query = "select UNIX_TIMESTAMP(timestamp)*1000 timestamp, 
	l_tcp_pkt_cnt, l_udp_pkt_cnt, l_icmp_pkt_cnt, l_sctp_pkt_cnt, l_others_pkt_cnt,
	w_tcp_pkt_cnt, w_udp_pkt_cnt, w_icmp_pkt_cnt, w_sctp_pkt_cnt, w_others_pkt_cnt 
	from stats_ip_proto $query_condition";

$count=0;
$l_tcp_output="";
$l_udp_output="";
$l_icmp_output="";
$l_sctp_output="";
$l_others_output="";
$w_tcp_output="";
$w_udp_output="";
$w_icmp_output="";
$w_sctp_output="";
$w_others_output="";
$result=mysql_query($query, $db);
if(mysql_num_rows($result) > 0)
{
	while($row = mysql_fetch_array($result))
 {
 	  if($count>0) 
 	  { $l_tcp_output.=",";
		 $l_udp_output.=",";
		 $l_icmp_output.=",";
		 $l_sctp_output.=",";
		 $l_others_output.=",";
		 $w_tcp_output.=",";
		 $w_udp_output.=",";
		 $w_icmp_output.=",";
		 $w_sctp_output.=",";
		 $w_others_output.=",";
 	  }

	  $timestamp = $row['timestamp'];
	  $l_tcp_pkt_cnt = round($row['l_tcp_pkt_cnt'], 0);
	  $l_udp_pkt_cnt = round($row['l_udp_pkt_cnt'], 0);
	  $l_icmp_pkt_cnt = round($row['l_icmp_pkt_cnt'], 0);
	  $l_sctp_pkt_cnt = round($row['l_sctp_pkt_cnt'], 0);
	  $l_others_pkt_cnt = round($row['l_others_pkt_cnt'], 0);
	  $w_tcp_pkt_cnt = round($row['w_tcp_pkt_cnt'], 0);
	  $w_udp_pkt_cnt = round($row['w_udp_pkt_cnt'], 0);
	  $w_icmp_pkt_cnt = round($row['w_icmp_pkt_cnt'], 0);
	  $w_sctp_pkt_cnt = round($row['w_sctp_pkt_cnt'], 0);
	  $w_others_pkt_cnt = round($row['w_others_pkt_cnt'], 0);
	  
	  $count++;

	  $l_tcp_output.="[$timestamp,$l_tcp_pkt_cnt]";
	  $l_udp_output.="[$timestamp,$l_udp_pkt_cnt]";
	  $l_icmp_output.="[$timestamp,$l_icmp_pkt_cnt]";
	  $l_sctp_output.="[$timestamp,$l_sctp_pkt_cnt]";
	  $l_others_output.="[$timestamp,$l_others_pkt_cnt]";
	  $w_tcp_output.="[$timestamp,$w_tcp_pkt_cnt]";
	  $w_udp_output.="[$timestamp,$w_udp_pkt_cnt]";
	  $w_icmp_output.="[$timestamp,$w_icmp_pkt_cnt]";
	  $w_sctp_output.="[$timestamp,$w_sctp_pkt_cnt]";
	  $w_others_output.="[$timestamp,$w_others_pkt_cnt]";

 }
}
print 'var l_tcp = ['.$l_tcp_output.'];'."\n";
print 'var l_udp = ['.$l_udp_output.'];'."\n";
print 'var l_icmp = ['.$l_icmp_output.'];'."\n";
print 'var l_sctp = ['.$l_sctp_output.'];'."\n";
print 'var l_others = ['.$l_others_output.'];'."\n";
print 'var w_tcp = ['.$w_tcp_output.'];'."\n";
print 'var w_udp = ['.$w_udp_output.'];'."\n";
print 'var w_icmp = ['.$w_icmp_output.'];'."\n";
print 'var w_sctp = ['.$w_sctp_output.'];'."\n";
print 'var w_others = ['.$w_others_output.'];'."\n";

$color_red = 'color: "rgba(218,15,66,1)"';
$color_blue = 'color: "rgba(170,214,252,1)"';
$color_green = 'color: "rgba(28,203,91,1)"';
$color_yellow = 'color: "rgba(239,201,43,1)"';
$color_gray = 'color: "rgba(157,157,157,1)"';

print 'var l_data = [
    { label:"TCP", data: l_tcp,fill:1.0,'.$color_red.'},
    { label:"UDP", data: l_udp,fill:1.0,'.$color_blue.'},
    { label:"ICMP", data: l_icmp,fill:1.0,'.$color_green.'},
    { label:"SCTP", data: l_sctp,fill:1.0,'.$color_yellow.'},
    { label:"Others", data: l_others,fill:1.0,'.$color_gray.'}
    ];';

    
print 'var w_data = [
    { label: "TCP", data: w_tcp,fill:1.0,'.$color_red.'},
    { label: "UDP", data: w_udp,fill:1.0,'.$color_blue.'},
    { label: "ICMP", data: w_icmp,fill:1.0,'.$color_green.'},
    { label: "SCTP", data: w_sctp,fill:1.0,'.$color_yellow.'},
    { label: "Others", data: w_others,fill:1.0,'.$color_gray.'}
    ];';
    
    
$options = '{ xaxis: { mode: "time",timeformat: "%d/%b %H:%M",timezone: "browser" },
         grid: { borderWidth: {top: 1, right: 1, bottom: 1, left: 1}, borderColor: {top:"#888", bottom:"#888", left:"#888", right:"#888"} },
         series: { lines: { show:true, lineWidth:0, fill:true }, shadowSize:0},
         lines: { show:true, steps:false }
       }';

print '$.plot($("#l_ip_proto"), l_data,'.$options.');';
print '$.plot($("#w_ip_proto"), w_data,'.$options.');';

print '});';
print '</script>';
?>
<center>IP Protocol Packet Analysis (LAN Port Packets)</center>
<div id="l_ip_proto"></div>
<br>
<center>IP Protocol Packet Analysis (WAN Port Packets)</center>
<div id="w_ip_proto"></div>
<br>
<!--
<center>Overall Optimization LAN - Bytes(KB)</center>
<div id="overalloptimization_lan"></div>
<br>
<center>Overall Optimization WAN - Bytes (KB)</center>
<div id="overalloptimization_wan"></div>
-->