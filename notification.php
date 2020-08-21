<?php

$response = $_POST;

$fp = fopen('notification.json', 'w');
fwrite($fp, json_encode($response));
fclose($fp);

header("HTTP/1.1 200 OK");

