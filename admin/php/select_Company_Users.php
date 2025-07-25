<?php
session_start();
require_once "handler.php";
require_once "functions.php";

if (isset($_POST['CompaniesLink'])) {
    $db = new database();
    $stm = "SELECT * FROM Users WHERE CompaniesLink = :CompaniesLink ;";
    $db->prepare($stm);
    $db->Bind(":CompaniesLink", $_POST['CompaniesLink']);
    $rows_Users = $db->Resultset();   
}
?>
<table>
    <thead>
        <tr>
            <th>Username</th>
            <th>Title</th>
            <th>Name</th>
            <th>Position</th>
            <th>Department</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Status</th>
            <th>Access</th>
            <th>Created On</th>
            <th>######</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($rows_Users as $row_Users): ?>
        <tr>
            <td><?php echo $row_Users->Username; ?></td>
            <td><?php echo $row_Users->Title; ?></td>
            <td><?php echo $row_Users->Name; ?></td>
            <td><?php echo $row_Users->Position; ?></td>
            <td><?php echo $row_Users->Department; ?></td>
            <td><a href="mailto:<?php echo $row_Users->Email; ?>"><?php echo $row_Users->Email; ?></a></td>
            <td><?php echo $row_Users->Phone; ?></td>
            <td>
            <?php 
            if ($row_Users->Status == 1) {
                echo "Active";
            }
            else {
                echo "Inactive";
            }
            ?>    
            </td>
            <td><?php echo $row_Users->Access; ?></td>
            <td><?php echo strtotime('d-M-y', $row_Users->Created); ?></td>
        </tr>
        <?php endforeach; ?>
        <tr>
            <th colspan=""></th>
        </tr>
    </tbody>
</table>

