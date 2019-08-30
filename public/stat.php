<?php
$file = 'stat.log';    // файл для записи истории посещения сайта
$col_zap = 1999;    // ограничиваем количество строк log-файла
function getRealIpAddr() {
  if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
  }
  elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
  }
  else {
    $ip = $_SERVER['REMOTE_ADDR'];
  }
  return $ip;
}

if (strstr($_SERVER['HTTP_USER_AGENT'], 'YandexBot')) {
  $bot = 'YandexBot';
}
elseif (strstr($_SERVER['HTTP_USER_AGENT'], 'Googlebot')) {
  $bot = 'Googlebot';
}
else {
  $bot = $_SERVER['HTTP_USER_AGENT'];
}

$ip = getRealIpAddr();
$date = date("H:i:s d.m.Y");
$home = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
if (stristr($bot, 'bot') === FALSE) {
  $lines = file($file);
  while (count($lines) > $col_zap) {
    array_shift($lines);
  }
  $lines[] = $date . '|' . $bot . '|' . $ip . '|' . $home . "|\r\n";
  file_put_contents($file, $lines);
}

if (isset($_GET['col'])) {
    $col = $_GET['col'];
  }
  else {
    $col = 500;
  }
$file = file("stat.log");
  if ($col > sizeof($file)) {
    $col = sizeof($file);
  }
  
  $kd = 0;
  $mas[] = array();
  $yd = date('d.m.Y', strtotime('yesterday'));
  for ($si = sizeof($file) - 1; $si + 1 > sizeof($file) - $col; $si--) {
    $string = explode('|', $file[$si]);
    $q1[$si] = $string[0]; // дата и время
    $q2[$si] = $string[1]; // имя бота
    $q3[$si] = $string[2]; // ip бота
    $q4[$si] = $string[3]; // адрес посещения
    if ((strstr($string[0], $yd)) && (!in_array($string[2], $mas))) {
      $kd = $kd + 1;
    };
    $mas[] = $string[2];
    
  };
  $allVisitors=ceil(((int)(sizeof($file)))/2);
?>