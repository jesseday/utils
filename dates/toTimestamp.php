<?php

$str = $argv[1];
$date = new DateTime($str, new DateTimeZone('America/New_York'));
print $date->format('U') . "\n";
