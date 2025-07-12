<?php
session_start();
require_once "handler.php";
require_once "functions.php";

if (isset($_SESSION['Id'])) {
    //getting data from the table Admins
    $db = new database();
    $get_Admin = "SELECT * FROM Admins WHERE Id = :Id ;";
    $db->prepare($get_Admin);
    $db->Bind(":Id", $_SESSION['Id']);
    $rows_Admin = $db->Resultset();
    foreach ($rows_Admin as $row_Admin) {
        # code...
    }

}
else {
    echo $connection_error;
}
?>
<form action="#" id="myForm" method="post">
    <!-- form-table -->
    <div class="form-table">
        <table>
            <thead>
                <tr>
                    <th colspan="2">Update my Info</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Title: </td>
                    <td>
                        <select name="Title">
                        <?php 
                        switch ($row_Admin->Title) {
                            case "Mr.":
                                echo "<option value='Mr.' selected='selected'>Mr.</option>";
                                echo "<option value='Ms.'>Ms.</option>";
                                echo "<option value='Mrs.'>Mrs.</option>";
                            break;
                            case "Ms.":
                                echo "<option value='Mr.'>Mr.</option>";
                                echo "<option value='Ms.' selected='selected'>Ms.</option>";
                                echo "<option value='Mrs.'>Mrs.</option>";
                            break;
                            case "Mrs.":
                                echo "<option value='Mr.'>Mr.</option>";
                                echo "<option value='Ms.'>Ms.</option>";
                                echo "<option value='Mrs.' selected='selected'>Mrs.</option>";
                            break;
                        }   
                        ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Name: </td>
                    <td><input type="text" name="Name" id="Name" value="<?php echo $row_Admin->Name; ?>"></td>
                </tr>
                <tr>
                    <td>Position: </td>
                    <td><input type="text" name="Position" id="Position" value="<?php echo $row_Admin->Position; ?>"></td>
                </tr>
                <tr>
                    <td>Department: </td>
                    <td><input type="text" name="Department" id="Department" value="<?php echo $row_Admin->Department; ?>"></td>
                </tr>
                <tr>
                    <td>Email: </td>
                    <td><input type="text" name="Email" id="Email" value="<?php echo $row_Admin->Email; ?>"></td>
                </tr>
                <tr>
                    <td>Phone: </td>
                    <td><input type="text" name="Phone" id="Phone" value="<?php echo $row_Admin->Phone; ?>"></td>
                </tr>
            </tbody>
        </table>
        <div class="form-button">
            <button type="submit" style="width: 240px;" class="wide-button">Submit</button>
        </div>
    </div>
    <!-- form-table ends -->
</form>
