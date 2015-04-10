<?php
$timestamp = $argv[1];
$date = new DateTime('now', new DateTimeZone('America/New_York'));
$date->setTimestamp($timestamp);
print $date->format('r') . "\n";
