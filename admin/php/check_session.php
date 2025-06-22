<?php 
session_start();

if (isset($_SESSION['Username'])) {
    //zero is returned for no error
    echo 0;
}
else {
    //one is returned if there is no session 
    echo 1;
}
?>
