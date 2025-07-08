<?php 
session_start();
require_once "handler.php";
require_once "functions.php";

//getting data from the form 
$db = new database();
$stm = "SELECT * FROM Companies WHERE Link = :CompaniesLink ;";
$db->prepare($stm);
$db->Bind(":CompaniesLink", $_POST['CompaniesLink']);
$rows_Companies = $db->Resultset();
?>

