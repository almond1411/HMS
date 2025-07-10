<?php
session_start();
require_once "handler.php";
require_once "functions.php";

if (isset($_POST['CompaniesLink'])) {
    $db = new database();
    $select_Users = "SELECT * FROM Users WHERE CompaniesLink = :CompaniesLink ;";
    $db->prepare($select_Users);
    $db->Bind(":CompaniesLink", $_POST['CompaniesLink]);
    $rows_Users = $db->Resultset();
    foreach ($rows_Users as $row_Users):
}
?>

