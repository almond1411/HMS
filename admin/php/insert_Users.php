<?php 
session_start();
require_once "handler.php";
require_once "functions.php";

if (isset($_POST['Email'])) {
    $db = new database();
    
    //checking for duplicate entry
    $db->prepare("SELECT Id FROM Users WHERE Email = :Email ;");
    $db->Bind(":Email", trim($_POST['Email']));
    $row_count = $db->rowCount();
    if ($row_count == 0) {
        //inserting data to the table Users
        $insert = "INSERT INTO Users SET 
            Link = :Link,
            Email = :Email, 
            Password = :Password,
            Title = :Title, 
            Name = :Name, 
            Position = :Position, 
            CompaniesLink = :CompaniesLink, 
            Status = :Status
        ;";
        $db->prepare($insert);
        $Link = uniqid("Usr_", true);
        $db->Bind(":Link", $Link);
        $db->Bind(":Email", trim($_POST['Email']));
        //generating password
        $Password = hash('sha3-512', 'P@ss2025');
        $db->Bind(":Password", $Password);
        $db->Bind(":Title", $_POST['Title']);
        $db->Bind(":Name", trim($_POST['Name']));
        $db->Bind(":Position", trim($_POST['Position']));
        $db->Bind(":CompaniesLink", $_POST['CompaniesLink']);
        $db->Bind(":Status", 1);
        if ($db->execute()) {
            //zero is retured for no error
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
