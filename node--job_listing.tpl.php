<?php
$dead = "";

$tz = new DateTimeZone($content['field_job_start_date']['#items']['0']['timezone']);
$deadd = New DateTime($content['field_job_start_date']['#items']['0']['value2'], $tz);
$dead = $deadd->format("l, F j, Y");

print render($content['body']) . "<br><strong>Deadline: </strong>$dead" . render($content['webform']);

?>