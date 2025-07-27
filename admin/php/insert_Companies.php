<?php
session_start();
require_once "handler.php";
require_once "functions.php";
if (isset($_POST['Name'])) {
    //connecting to database
    $db = new database();
    //checking for duplicate entry
    $stm = "SELECT Id FROM Companies WHERE Name = :Name ;";
    $db->prepare($stm);
    $db->Bind(":Name", trim($_POST['Name']));
    $r = $db->rowCount();
    if ($r == 0) {
        //inserting data to the table Companies
        $insert = "INSERT INTO Companies SET 
            Name = :Name,
            Type = :Type,
            Address1 = :Address1,
            Address2 = :Address2, 
            City = :City,
            Email = :Email,
            Website = :Website,
            Class = :Class,
            Link = :Link
        ;";
        $db->prepare($insert);
        //creating Link for Company
        $Link = uniqid("Com_", true);
        $db->Bind(":Name", trim($_POST['Name']));
        $db->Bind(":Type", $_POST['Type']);
        $db->Bind(":Address1", trim($_POST['Address1']));
        $db->Bind(":Address2", trim($_POST['Address2']));
        $db->Bind(":City", trim($_POST['City']));
        $db->Bind(":Email", trim($_POST['Email']));
        $db->Bind(":Website", trim($_POST['Website']));
        $db->Bind(":Class", trim($_POST['Class']));
        $db->Bind(":Link", $Link);
        if ($db->execute()) {
            //zero is returned for no error
            echo 0;
        }
        else {
            echo $connection_error;
        }
    }
    else {
        echo "Duplicate entry!";
    } 
}
else {
    echo $connection_error;
}
?>
