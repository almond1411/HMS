<?php
session_start();
require_once "handler.php";
require_once "functions.php";
if (isset($_POST['UsersLink'])) {
	$db = new database();
	$db->prepare("SELECT * FROM Users WHERE Link = :Link ;");
	$db->Bind(":Link", $_POST['UsersLink']);
	$rows_Users = $db->Resultset();
	foreach ($rows_Users as $row_Users) {
		# code...
	}
}
?>
<form action="#" id="myForm" method="post">
	<!-- form-table -->
	<div class="form-table">
		<table>
			<thead></thead>
			<tbody>
				<tr>
					<td>Title: </td>
					<td>
						<select name="Title">
						<?php 
						switch ($row_Users->Title) {
							case 'Mr':
								echo "<option value='Mr' selected='selected'>Mr.</option>";
								echo "<option value='Ms'>Ms.</option>";
								echo "<option value='Mrs'>Mrs.</option>";
							break;
							case 'Ms':
								echo "<option value='Mr'>Mr.</option>";
								echo "<option value='Ms' selected='selected'>Ms.</option>";
								echo "<option value='Mrs'>Mrs.</option>";
							break;
							case 'Mrs':
								echo "<option value='Mr'>Mr.</option>";
								echo "<option value='Ms'>Ms.</option>";
								echo "<option value='Mrs' selected='selected'>Mrs.</option>";
							break;
						}
						?>
						</select>
						<input type="hidden" id="UsersLink" name="UsersLink" value="<?php echo $_POST['UsersLink']; ?>">
                        <input type="hidden" id="CompaniesLink" name="CompaniesLink" value="<?php echo $_POST['CompaniesLink']; ?>">
					</td>
					<td>Name: </td>
					<td><input type="text" name="Name" id="Name" value="<?php echo $row_Users->Name; ?>"></td>
				</tr>
				<tr>
					<td>Email: </td>
					<td><input type="text" name="Email" id="Email" value="<?php echo $row_Users->Email; ?>"></td>
					<td>Position: </td>
					<td><input type="text" name="Position" id="Email" value="<?php echo $row_Users->Position; ?>"></td>
				</tr>
				<tr>
					<td>Access: </td>
					<td><input type="number" max="1" name="Access" id="Access" value="<?php echo $row_Users->Access; ?>"></td>
					<td>Status: </td>
					<td>
						<select name="Status">
						<?php 
						if ($row_Users->Status == 1) {
							echo "<option value='1' selected='selected'>Active</option>";
							echo "<option value='2'>Inactive</option>";
						}
						else {
							echo "<option value='1'>Active</option>";
							echo "<option value='2' selected='selected'>Inactive</option>";
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
	$("#myForm").on("submit", function () {
		event.preventDefault();
		var error = false;
		let Name = $("#Name");
		let Email = $("#Email");
        let CompaniesLink = $("#CompaniesLink").val();

		if (Name.val().trim() == "" || Name.val().trim() == null) {
			error = true;
			Name.addClass("input-error");
			displayError("Name cannot be blank!");
		}

		if (Email.val().trim() == "" || Email.val().trim() == null) {
			error = true;
			Email.addClass("input-error");
			displayError("Email cannot be blank!");
		}

		if (error == false) {
			$.ajax({
				url: "./php/update_Users.php",
				type: "post",
				data: $(this).serialize(),
				success: function (err) {
					if (err == 0) {
					    location.href = "view_Companies.html?CompaniesLink="+CompaniesLink;
                    }
					else {
						displayError(err);
					}
				}
			});
		}
	});
</script>
