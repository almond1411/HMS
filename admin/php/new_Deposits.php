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
        echo $new_file_name = uniqid("DpsFl_", true).'.'.$file_extension;
    }
    else {
        echo "Nope";
    }
}
else {
    echo $connection_error;
}
?>
