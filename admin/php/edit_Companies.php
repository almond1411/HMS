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
                        $db->prepare($get_Company_Types);
                        $rows_Types = $db->Resultset();
                        foreach ($rows_Types as $row_Types) {
                            if ($row_Companies->Type == $row_Types->Id){
                                echo "<option value='".$row_Types->Id."' selected='selected'>".$row_Types->Type."</option>";
                            }
                            else {
                                echo "<option value='".$row_Types->Id."'>".$row_Types->Type."</option>";
                            }
                        }
                        ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Address Line 1: </td>
                    <td><input type="text" name="Address1" id="Address1" value="<?php echo $row_Companies->Address1; ?>"></td>
                    <td>Address Line 2: </td>
                    <td><input type="text" name="Address2" id="Address2" value="<?php echo $row_Companies->Address2; ?>"></td>
                </tr>
                <tr>
                    <td>City: </td>
                    <td><input type="text" name="City" id="City" value="<?php echo $row_Companies->City; ?>"></td>
                    <td>Email: </td>
                    <td><input type="text" name="Email" id="Email" value="<?php echo $row_Companies->Email; ?>"></td>
                </tr>
                <tr>
                    <td>Website: </td>
                    <td><input type="text" name="Website" id="Website" value="<?php echo $row_Companies->Website; ?>"></td>
                    <td>Contract: </td>
                    <td>
                        <select name="Class">
                        <?php 
                        switch ($row_Companies->Class) {
                            case 'A':
                            echo "<option value='A' selected='selected'>Class A</option>";
                            echo "<option value='B'>Class B</option>";
                            echo "<option value='C'>Class C</opion>";
                            echo "<option value='D'>Class D</option>";
                            break;

                            case 'B':
                            echo "<option value='A'>Class A</option>";
                            echo "<option value='B' selected='selected'>Class B</option>";
                            echo "<option value='C'>Class C</option>";
                            echo "<option value='D'>Class D</option>";
                            break;

                            case 'C':
                            echo "<option value='A'>Class A</option>";
                            echo "<option value='B'>Class B</option>";
                            echo "<option value='C'selected='selected'>Class C</option>";
                            echo "<option value='D'>Class D</option>";
                            break;

                            case 'D':
                            echo "<option value='A'>Class A</option>";
                            echo "<option value='B'>Class B</option>";
                            echo "<option value='C'>Class C</option>";
                            echo "<option value='D' selected='selected'>Class D</option>";
                            break;
                        }
                        ?>
                        </select>
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="form-button">
            <button type="submit" style="width: 240px;" class="wide-button">Update</button>
        </div>
    </div>
    <!-- form-table ends -->
</form>
<div class="sys-msg"></div>
<script src="./js/jQuery.js"></script>
<script src="./js/scripts.js"></script>
<script type="text/javascript">
    $("#myForm").on("submit", function (){
        event.preventDefault();
        let error = false;
        let Name = $("#Name");
        let City = $("#City");

        if (Name.val().trim() == "" || Name.val().trim() == null) {

        }
    });
</script>
