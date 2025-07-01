<?php 
session_start();
require_once "handler.php";
require_once "functions.php";
//selecting data from the table Companies
$db = new database();
$stm = "SELECT * FROM Companies ORDER BY Id DESC; ";
$db->prepare($stm);
$rows_Companies = $db->Resultset();
?>
<table>
    <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>City</th>
            <th>Email</th>
            <th>Website</th>
            <th>Type</th>
            <th>Class</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($rows_Companies as $row_Companies): ?>
        <tr>
            <td><?php echo $row_Companies->Id; ?></td>
            <td><?php echo $row_Companies->Name; ?></td>
        </tr>
    <?php endforeach; ?>    
    </tbody>
</table>
