<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$db_conn = pg_connect("host=localhost dbname=php_site_ru user=postgres password=password");
if (!$db_conn) {
    die("Ошибка подключения: " . pg_last_error($db_conn));
}
echo "Подключение к PostgreSQL успешно!";
pg_close($db_conn);
?>
