<?php 
session_start ();
require_once "handler.php";
require_once "functions.php";

if (isset($_POST['CompaniesLink'])) {
	$db = new database();
	$stm = "SELECT * FROM Deposits WHERE CompaniesLink = :CompaniesLink ;";
	$db->prepare($stm);
	$db->Bind(":CompaniesLink", $_POST['CompaniesLink']);
}
?>