<?php 
session_start();
require_once "handler.php";
require_once "functions.php";
if (isset($_POST['Name'])) {
    $db = new database();

    //checking for duplicate entry
    $check = "SELECT Id FROM Companies WHERE 
        Name = :Name AND
        Link != :Link
    ;";
    $db->prepare($check);
    $db->Bind(":Name", trim($_POST['Name']));
    $db->Bind(":Link", $_POST['Link']);
    $r = $db->Rowcount();
    if ($r > 0) {
        echo "Duplicate entry!";
    }
    else {

        $update_Companies = "UPDATE Companies SET 
            Name = :Name,
            Type = :Type,
            Address1 = :Address1,
            Address2 = :Address2, 
            City = :City,
            Email = :Email,
            Website = :Website,
            Class = :Class WHERE Link = :Link
        ;";
        $db->prepare($update_Companies);
        $db->Bind(":Name", trim($_POST['Name']));
        $db->Bind(":Type", $_POST['Type']);
        $db->Bind(":Address1", trim($_POST['Address1']));
        $db->Bind(":Address2", trim($_POST['Address2']));
        $db->Bind(":City", trim($_POST['City']));
        $db->Bind(":Email", trim($_POST['Email']));
        $db->Bind(":Website", trim($_POST['Website']));
        $db->Bind(":Class", $_POST['Class']);
        $db->Bind(":Link", $_POST['Link']);
    }
}
else {
    echo $connection_error;
}

?>
