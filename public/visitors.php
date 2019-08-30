<?php
/*************************************************************************
php easy :: online visitors counter scripts set - PHP Include Version
==========================================================================
Author: php easy code, www.phpeasycode.com
Web Site: http://www.phpeasycode.com
Contact: webmaster @ phpeasycode.com
*************************************************************************/
 
$dbfile = "visitors.db"; // path to data file
$expire = 300; // average time in seconds to consider someone online before removing from the list
 
if(!file_exists($dbfile)) {
die("Error: Data file " . $dbfile . " NOT FOUND!");
}
 
if(!is_writable($dbfile)) {
die("Error: Data file " . $dbfile . " is NOT writable! Please CHMOD it to 666!");
}
 
function CountVisitors() {
global $dbfile, $expire;
$cur_ip = getIP();
$cur_time = time();
$dbary_new = array();
 
$dbary = unserialize(file_get_contents("visitors.db"));
if(is_array($dbary)) {
foreach ($dbary as $user_ip=>$user_time) {
if(($user_ip != $cur_ip) && (($user_time + $expire) > $cur_time)) {
$dbary_new[$user_ip] = $user_time;
}
}
}
$dbary_new[$cur_ip] = $cur_time; // add record for current user
 
$fp = fopen('visitors.db', "w");
fputs($fp, serialize($dbary_new));
fclose($fp);
 
$out = sprintf("%03d", count($dbary_new)); // format the result to display 3 digits with leading 0's
return $out;
}
 
function getIP() {
if(isset($_SERVER['HTTP_X_FORWARDED_FOR'])) $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
elseif(isset($_SERVER['REMOTE_ADDR'])) $ip = $_SERVER['REMOTE_ADDR'];
else $ip = "0";
return $ip;
}
 
$visitors_online = CountVisitors();
?>
