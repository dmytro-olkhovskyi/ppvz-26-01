<?php

$db_user = 'quiz';
$db_pass = 'BT3yRL0t!LqKhU6K';
$db_host = 'localhost';
$db_name = 'quiz';
$db_port = 3306;

$db = new mysqli($db_host, $db_user, $db_pass, $db_name, $db_port);

if ($db->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$db->set_charset('utf8mb4');