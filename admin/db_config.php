<?php

$db_username = 'root';
$db_password = '';
$db_name = 'moraexams2019';
$db_host = 'localhost';

$max_file_size=1048576; // File Maximum Size 1Mb=1024Kb=1048576bytes
$image_allowed_extentions = array("gif", "jpeg", "jpg", "png");  // allowed extentions for upload

$db = mysqli_connect($db_host, $db_username, $db_password,$db_name);

?>