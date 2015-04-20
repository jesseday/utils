<?php

$data = file_get_contents($argv[1]);
$outfile = fopen($argv[2], 'w+');

$d = json_decode($data);
$info = $d->data;
$headers = array();
$first = reset($info);
$f = (array) $first;
unset($f['Security']);
unset($f['goalKpiHistory']);
$headers = array_keys($f);
$h = implode(',', $headers);
$h .= PHP_EOL;
fwrite($outfile, $h);

foreach ($info as $delta => $item) {
  $i = (array) $item;
  foreach ($i as $k => $p) {
    if (is_object($p) || is_array($p)) {
      unset($i[$k]);
    }
  }
  $line = '"' . implode('","', $i);
  $line .= '"' . PHP_EOL;
  // echo $line;
  fwrite($outfile, $line);
//  break;
}

fclose($outfile);
