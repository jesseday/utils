<?php

$f1 = '/Users/jesse/scripts/goals-jane.json';
$d1 = file_get_contents($f1);

$f2 = '/Users/jesse/scripts/goals-jane-archived.json';
$d2 = file_get_contents($f2);

$outarray = new stdClass();
$outarray->data = array();
$x1 = json_decode($d1);
$x2 = json_decode($d2);
$inarray = array($x1, $x2);
echo count($inarray);
echo count($inarray[0]->data);
foreach ($inarray as $arr) {
  foreach ($arr as $data) {
    foreach ($data as $object) {
      $property = property_exists($object, 'id') ? 'id' : 'Id';
      if (file_exists('/Users/jesse/scripts/data/goal-' . $object->$property . '.json')) {
        $oFile = '/Users/jesse/scripts/data/goal-' . $object->$property . '.json';
        $oContents = file_get_contents($oFile);
        $oData = json_decode($oContents);
        $object->goalKpiHistory =$oData->data;
      }
      $outarray->data[] = $object;
      unset($oFile);
      unset($oContents);
      unset($oData);
      unset($dHist);
      unset($object);
    }
  }
}
$outdata = json_encode($outarray);
$outfile = '/Users/jesse/scripts/goals.json';
$o = fopen($outfile, 'w+');
fwrite($o, $outdata);
fclose($o);
