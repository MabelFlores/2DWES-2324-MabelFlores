<HTML>
<HEAD><TITLE> EJ1-Conversion IP Decimal a Binario </TITLE></HEAD>
<BODY>
<?php
$ip = "192.18.16.204";

list($part1, $part2, $part3, $part4) = explode(".",$ip);

$part1_binary = str_pad(decbin($part1), 8, '0', STR_PAD_LEFT);
$part2_binary = str_pad(decbin($part2), 8, '0', STR_PAD_LEFT);
$part3_binary = str_pad(decbin($part3), 8, '0', STR_PAD_LEFT);
$part4_binary = str_pad(decbin($part4), 8, '0', STR_PAD_LEFT);  

$ip_binary = "$part1_binary.$part2_binary.$part3_binary.$part4_binary";

echo "IP $ip en binario es $ip_binary";
?>
</BODY>
</HTML>
