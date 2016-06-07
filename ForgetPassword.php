<?php
include "ForgetPassword.server.php";
ForgetPasswordS::Page_Load();
ForgetPasswordS::FormSubmitHandler();
?>

<!DOCTYPE html>
<html>

<head>
	<title>Forget Password</title>
</head>
	
<body>

	<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
		<table>
			<tr>
				<td>Username: </td><td><input type="text" name="txt_Username"></td>
			</tr>
			<tr>
				<td>Date of Birth: </td><td><input type="text" name="txt_DOB"></td>
			</tr>
			<tr>
				<td>Social Security Number: </td><td><input type="text" name="txt_SSN"></td>
			</tr>
			<tr>
				<td>New Password: </td><td><input type="password" name="txt_NewPassword"></td>
			</tr>
			<tr>
				<td></td><td align="right"><input type="submit" name="ChangePasswordBtn_Click" value="Change Password"></td>
			</tr>
			<tr>
				<td><?php echo ForgetPasswordS::$ChangePasswordStatus; ?></td><td></td>
			</tr>
		</table>
	</form>

</body>
	
</html>