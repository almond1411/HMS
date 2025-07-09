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
            <td><a href="<?php echo $row_Companies->Email; ?>"><?php echo $row_Companies->Email; ?></a></td>
            <td><a href="<?php echo $row_Companies->Website; ?>"><?php echo $row_Companies->Website; ?></a></td>
            <td>
                <?php 
                //getting data from the table Company_Type
                $select_Company_Types = "SELECT * FROM Company_Types WHERE Id = :Id ;";
                $db->prepare($select_Company_Types);
                $db->Bind(":Id", $row_Companies->Type);
                $rows_Company_Types = $db->Resultset();
                foreach ($rows_Company_Types as $row_Company_Types) {
                    echo $row_Company_Types->Type;
                }
                ?>
            </td>
            <td><?php echo $row_Companies->Class; ?></td>
            <td>
                <a href="view_Companies.html?CompaniesLink=<?php echo $row_Companies->Link; ?>"><button type="button" class="small-button">View</button></a>
		        &nbsp;
                <a href="edit_Companies.html?CompaniesLink=<?php echo $row_Companies->Link; ?>"><button type="button" class="small-button">Edit</button></a>
            </td>
        </tr>
    <?php endforeach; ?>    
    </tbody>
</table>
