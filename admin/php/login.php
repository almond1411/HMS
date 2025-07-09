<?php 
session_start();
require_once "handler.php";
require_once "functions.php";

//checking if password is empty
if (isset($_POST['Password'])) {
    $db = new database();
    $db->Prepare("SELECT * FROM Admins WHERE BINARY Username = :Username AND BINARY Password = :Password");
    $db->Bind(":Username", trim($_POST['Username']));
    $Password = hash('sha3-512', trim($_POST['Password']));
    $db->Bind(":Password", trim($Password));
    $row_count = $db->Rowcount();
    $rows = $db->Resultset_array();
    if ($row_count == 1) {
        foreach ($rows as $row) {
            $_SESSION = $row;
        }
        //zero is returned for no error
        echo 0;
        $log = 'Successful login as '.$_POST['Username'];
    }
    else {
        echo "Wrong username or password!";
        $log = "Unsuccessful login as ".$_POST['Username'];
    }
    //write_log_file ($log);
}
?>
