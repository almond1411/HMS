<?php 
session_start();
require_once "handler.php";
require_once "functions.php";

//getting data from the form 
$db = new database();
$stm = "SELECT * FROM Companies WHERE Link = :CompaniesLink ;";
$db->prepare($stm);
$db->Bind(":CompaniesLink", $_POST['CompaniesLink']);
$rows_Companies = $db->Resultset();
foreach ($rows_Companies as $row_Companies) {
    # code...
}
?>
<form id="myForm" action="#" method="post">
    <!-- form-table -->
    <div class="form-table">`
        <table>
            <thead></thead>
            <tbody>
                <tr>
                    <td>Name: </td>
                    <td><input type="text" name="Name" id="Name" value="<?php echo $row_Companies->Name; ?>"></td>
                    <td>Type: </td>
                    <td>
                        <select name="Type">
                        <?php 
                        //getting data from the table Company_Types
                        $get_Company_Types = "SELECT * FROM Company_Types ;";

                        ?>
                        </select>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <!-- form-table ends -->
</form>
