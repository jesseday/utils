<?php

$infile = '/Users/jesse/Scripts/goals.json';

$data = json_decode(file_get_contents($infile));

foreach ($data as $obj => $d) {
  foreach ($d as $x => $p) {
    if ($p->id) {
      $ch = curl_init('https://api.results.com/api/v1/goals/' . $p->id . '/kpihistory');
      curl_setopt($ch, CURLOPT_HTTPHEADER, array('X-Token: e6fa413c-076b-4bde-98af-7c4660ff0994'));
      curl_setopt($ch, CURLOPT_HEADER, FALSE);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      $results = curl_exec($ch);
      $outfile = fopen('/Users/jesse/Scripts/data/goal-' . $p->id . '.json', 'w+');
      fwrite($outfile, $results);
      fclose($outfile);
    }
  }
}
