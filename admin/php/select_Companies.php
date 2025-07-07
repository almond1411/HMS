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
            <th>######</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($rows_Companies as $row_Companies): ?>
        <tr>
            <td><?php echo $row_Companies->Id; ?></td>
            <td><?php echo $row_Companies->Name; ?></td>
            <td><?php echo $row_Companies->City; ?></td>
            <td>
                <?php if (isset($row_Companies->Email)): ?>
                    <a href="<?php echo $row_Companies->Email; ?>"><?php echo $row_Companies->Email; ?></a>
                <?php endif; ?>
            </td>
            <td>
                <?php if (isset($row_Companies->Website)): ?>
                    <a href="<?php echo $row_Companies->Website; ?>"><?php echo $row_Companies->Website; ?></a>
                <?php endif; ?>
            </td>
            <td class="centered">
                <?php
                //getting data from the table Company_Types
                $getTypes = "SELECT * FROM Company_Types WHERE Id = :Id ;";
                $db->prepare($getTypes);
                $db->Bind(":Id", $row_Companies->Type);
                $rows_Types = $db->Resultset();
                foreach ($rows_Types as $row_Types) {
                    echo $row_Types->Type;
                }
                ?>
            </td>
            <td class="centered">
                <?php echo $row_Companies->Class; ?>
            </td>
            <td>
            </td>
        </tr>
    <?php endforeach; ?>    
    </tbody>
</table>
