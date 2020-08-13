<?php
//db details
// défini l'UTF-8 comme encodage par défaut (à placer dans le fichier de configuration par exemple)
mb_internal_encoding('UTF-8');

$dbHost = 'localhost';
$dbUsername = 'afriquetec';
$dbPassword = 'afriquetec';
$dbName = 'afriquetec';

//Connect and select the database
//SET NAMES 'utf8';
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
?>