<?php 
session_start();
require_once "handler.php";
require_once "functions.php";
if (isset($_POST['Amount'])) {
    $Link = uniqid ("Dps_", true);
    $db = new database();
    
    //checking if a file has been uploaded
    if ($_FILES['File']['error'] == 0) {
        $file = $_FILES['File'];
        //generationg file name
        $extension = explode('.', $file['name']);
        $file_extension = strtolower(end($extension));
        
        $allowed_extensions = array("pdf", "jpg", "jpeg", "png");

        if (in_array($file_extension, $allowed_extensions)) {
            $new_file_name = uniqid("DpsFl_", true).'.'.$file_extension;
            $file_path = "./../../Deposits/".$new_file_name;
            move_uploaded_file($file['tmp_name'], $file_path);    
        }
        else {
            echo "The file format must be PDF, JPG, JPEG or PNG!";
            die();
        }
    }
    else {
        $new_file_name = "No files";    
    }

    //inserting data to the table Deposits
    $insert = "INSERT INTO Deposits SET 
        Link = :Link,
        Amount = :Amount,
        Method = :Method,
        File = :File,
        Deposit_date = :Deposit_date,
        CompaniesLink = :CompaniesLink,
        UsersLink = :UsersLink
    ;";
    $db->prepare($insert);
    $db->Bind(":Link", $Link);
    $db->Bind(":Amount", $_POST['Amount']);
    $db->Bind(":Method", trim($_POST['Method']));
    $db->Bind(":File", $new_file_name);
    $db->Bind(":Deposit_date", $_POST['Deposit_date']);
    $db->Bind(":CompaniesLink", $_POST['CompaniesLink']);
    $db->Bind(":UsersLink", $_SESSION['Link']);
    if ($db->execute()) {
        //zero is returned for no error
        echo 0;
    }
    else {
        echo $connection_error;
    }
}
else {
    echo $connection_error;
}
?>
