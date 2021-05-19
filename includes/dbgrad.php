<?php 
// DB credentials.
define('DB_HOST','sql104.epizy.com');
define('DB_USER','epiz_28651210');
define('DB_PASS','IjVhXAjeDfuO');
define('DB_NAME','epiz_28651210_portfolio');
// Establish database connection.
try
{
$dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
}
catch (PDOException $e)
{
exit("Error: " . $e->getMessage());
}
?>
