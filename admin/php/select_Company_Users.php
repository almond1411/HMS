<?php
session_start();
require_once "handler.php";
require_once "functions.php";

if (isset($_POST['CompaniesLink'])) {
    $db = new database();
    $select_Users = "SELECT * FROM Users WHERE CompaniesLink = :CompaniesLink ;";
    $db->prepare();
}
?>
