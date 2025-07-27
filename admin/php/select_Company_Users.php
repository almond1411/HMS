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
            <th>Email</th>
            <th>Title</th>
            <th>Name</th>
            <th>Position</th>
            <th>Status</th>
            <th>Created On</th>
            <th>######</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($rows_Users as $row_Users): ?>
        <tr>
            <td><?php echo $row_Users->Email; ?></td>
            <td><?php echo $row_Users->Title; ?></td>
            <td><?php echo $row_Users->Name; ?></td>
            <td><?php echo $row_Users->Position; ?></td>
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
            <td><?php echo date('d-M-y', strtotime($row_Users->Created)); ?></td>
            <td>
                <a href="edit_Users.html?UsersLink=<?php echo $row_Users->Link ?>&CompaniesLink=<?php echo $_POST['CompaniesLink']; ?>"><button type="button" class="small-button">Edit</button></a>
            </td>
        </tr>
        <?php endforeach; ?>
        <tr>
            <th colspan=""></th>
        </tr>
    </tbody>
</table>

