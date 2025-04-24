<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$db_conn = pg_connect("host=localhost dbname=php_site_ru user=postgres password=password") or die("Connection error: " . pg_last_error());
?>
