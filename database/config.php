<?php

$host = '192.168.5.3';
$port = '5432';
$username = 'postgres';
$password = 'Test1234$';
$dbname = 'projetsi';
$connection_string = "host={$host} port={$port} dbname={$dbname} user={$username} password={$password}";

$conn = pg_connect($connection_string);

if (!$conn) {
    echo "<marquee>Not connected to db</marquee> \n";
}
