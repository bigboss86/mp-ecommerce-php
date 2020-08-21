<?php

$response = file_get_contents("php://input");;

$fp = fopen('notification.json', 'w');
fwrite($fp, $response);
fclose($fp);

header("HTTP/1.1 200 OK");

