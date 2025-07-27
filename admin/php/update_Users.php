<?php 
session_start();
require_once "handler.php";
require_once "functions.php";
if (isset($_POST['Email'])) {
    $db = new database();

    //checking for duplicated entry
    $db->prepare("SELECT Id FROM Users WHERE Email = :Email AND Link != :UsersLink ;");
    $db->Bind(":Email", trim($_POST['Email']));
    $db->Bind(":UsersLink", $_POST['UsersLink']);
    $r = $db->Rowcount();
    if ($r > 0) {
        echo "Duplicate entry!";
    }
    else {
        //updating data in the table Users
        $update = "UPDATE Users SET 
            Email = :Email,
            Title = :Title,
            Name = :Name, 
            Position = :Position, 
            Status = :Status,
            Access = :Access WHERE
            Link = :UsersLink
        ;";
        $db->prepare($update);
        $db->Bind(":Email", trim($_POST['Email']));
        $db->Bind(":Title", $_POST['Title']);
        $db->Bind(":Name", trim($_POST['Name']));
        $db->Bind(":Position", trim($_POST['Position']));
        $db->Bind(":Status", $_POST['Status']);
        $db->Bind(":Access", $_POST['Access']);
        $db->Bind(":UsersLink", $_POST['UsersLink']);
        if ($db->execute()) {
            //zero is returned for no error
            echo 0;
        }
        else {
            echo $connection_error;
        }
    }
}
else {
    echo $connection_error;
}
?>
