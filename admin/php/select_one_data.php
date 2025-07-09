<?php
session_start();
require_once "handler.php";
require_once "functions.php";

$db = new database();
$table = $_POST['table'];
$column = $_POST['column'];
$by_using = $_POST['by_using'];

$stm = "SELECT $column FROM $table WHERE $by_using = :target ;";
$db->prepare($stm);
$db->Bind(":target", $_POST['target']);
$rows = $db->Resultset();
foreach ($rows as $row) {
    echo $row->$column;
}
?>
