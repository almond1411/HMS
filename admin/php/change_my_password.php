<?php
session_start();
require_once "handler.php";
require_once "functions.php";

if (isset($_POST['currentPswd'])) {
    //checking if the password is correct
    $db = new database();
    $get_password = "SELECT Password FROM Admins WHERE Id = :Id ;";
    $db->prepare($get_password);
    $db->Bind(":Id", $_SESSION['Id']);
    $rows_Admins = $db->Resultset();
    foreach ($rows_Admins as $row_Admins) {
        #code...
    }
    //checking if the passwords match
    $challenge_password = hash ('sha3-512', $_POST['currentPswd']);
    if ($challenge_password == $row_Admins->Password) {
        //checking if the new passwords match
        if ($_POST['newPswd'] == $_POST['cfmPswd']) {
            //updating the password in the table Admins
            $update_password = "UPDATE Admins SET Password = :Password ;";
            $db->prepare($update_password);
            $new_password = hash('sha3-512', $_POST['newPswd']);
            $db->Bind(":Password", $new_password);
            if ($db->execute()) {
                //zero is returned for no error
                echo 0;
            }
            else {
                echo $connection_error;
            }
        }
        else {
            echo "Please reconfirm your password!";
        }
    }
    else {
        echo "Wrong password!";
    }
}
?>
