<HTML>
<HEAD><TITLE> EJ1-Conversion IP Decimal a Binario </TITLE></HEAD>
<BODY>
<?php
$ip = "192.18.16.204";

list($part1, $part2, $part3, $part4) = explode(".",$ip);


$part1_binary = sprintf("%08b", $part1);
$part2_binary = sprintf("%08b", $part2);
$part3_binary = sprintf("%08b", $part3);
$part4_binary = sprintf("%08b", $part4);

$ip_binary = "$part1_binary.$part2_binary.$part3_binary.$part4_binary";

echo "IP $ip en binario es $ip_binary";
?>
</BODY>
</HTML>
