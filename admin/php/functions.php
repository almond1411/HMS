<?php 
require_once "handler.php";

$connection_error = "There was a connection error!";

//function to wirte in the log file 
function write_log_file ($log) {
    $logfile = fopen("~/logs.txt", "a") or die ("Unable to open file");
    $log = $log.' | '.date("d-M-y H:i:s")."\n";
}
?>
