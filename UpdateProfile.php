<?php
include "UpdateProfile.server.php";
UpdateProfileS::Page_Load();
UpdateProfileS::FormSubmitHandler();
?>

<!DOCTYPE html>
<html>

<head>
	<title>Update Profile</title>
</head>
	
<body>

	<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
		<table border="0">
			<!--<tr>
				<td>PatientID: </td><td><?php echo UpdateProfileS::$PatientID; ?></td><td></td>
			</tr>-->
			<tr>
				<td>Username: </td><td><?php echo UpdateProfileS::$Username; ?></td><td></td>
			</tr>
			<tr>
				<td>FirstName: </td><td><?php echo UpdateProfileS::$FirstName; ?></td><td></td>
			</tr>
			<tr>
				<td>LastName: </td><td><?php echo UpdateProfileS::$LastName; ?></td><td></td>
			</tr>
			<tr>
				<td>Sex: </td><td><?php echo UpdateProfileS::$Sex; ?></td><td></td>
			</tr>
			<tr>
				<td>Age: </td><td><?php echo UpdateProfileS::$Age; ?></td><td></td>
			</tr>
			<tr>
				<td>SSN: </td><td><?php echo UpdateProfileS::$SSN; ?></td><td></td>
			</tr>
			<tr>
				<td>DOB: </td><td><?php echo UpdateProfileS::$DOB; ?></td><td></td>
			</tr>
			<tr>
				<td>Phone: </td><td><input type="text" name="txt_Phone" value="<?php echo UpdateProfileS::$Phone; ?>"></td><td><input type="submit" name="ChangePhoneBtn_Click" value="Change"></td>
			</tr>
			<tr>
				<td>Email: </td><td><input type="text" name="txt_Email" value="<?php echo UpdateProfileS::$Email; ?>"></td><td><input type="submit" name="ChangeEmailBtn_Click" value="Change"></td>
			</tr>
			<tr>
				<td>Address: </td><td><input type="text" name="txt_Address" value="<?php echo UpdateProfileS::$Address; ?>"></td><td><input type="submit" name="ChangeAddressBtn_Click" value="Change"></td>
			</tr>
			<tr>
				<td>Zip: </td><td><input type="text" name="txt_Zip" value="<?php echo UpdateProfileS::$Zip; ?>"></td><td><input type="submit" name="ChangeZipBtn_Click" value="Change"></td>
			</tr>
			<tr>
				<td>State: </td><td><input type="text" name="txt_State" value="<?php echo UpdateProfileS::$State; ?>"></td><td><input type="submit" name="ChangeStateBtn_Click" value="Change"></td>
			</tr>
			<tr>
				<td>PrimaryCare: </td><td><?php echo UpdateProfileS::$PrimaryCare; ?></td><td></td>
			</tr>
		</table>
	</form>
	<br>
	<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
		<table>
			<tr>
				<th>Change Password</th>
			</tr>
			<tr>
				<td>Current Password: </td><td><input type="password" name="txt_CurrPassword"></td>
			</tr>
			<tr>
				<td>New Password: </td><td><input type="password" name="txt_NewPassword"></td>
			</tr>
			<tr>
				<td></td><td align="right"><input type="submit" name="ChangePasswordBtn_Click" value="Change Password"></td>
			</tr>
			<tr>
				<td><?php echo UpdateProfileS::$ChangePasswordStatus; ?></td><td></td>
			</tr>
		</table>
	</form>
	<br>
	<a href="personal-profile.php">Return to MADE</a>
	<br><br>
	<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
		<input type="submit" name="LogoutBtn_Click" value="Logout">
	</form>
</body>
	
</html>