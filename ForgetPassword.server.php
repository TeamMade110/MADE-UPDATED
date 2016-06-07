<?php

include_once "Authentication.class.php";

class ForgetPasswordS {
	
	public static $ChangePasswordStatus = "";
	
	public static function Page_Load() {
		
	}
	
	public static function FormSubmitHandler() {
		// Handle form submit
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			if (isset($_POST['ChangePasswordBtn_Click'])) {
				self::ChangePasswordBtn_Click();
			}
		}
	}
	
	private static function ChangePasswordBtn_Click() {
		$Username = $_REQUEST["txt_Username"];
		$DOB = $_REQUEST["txt_DOB"];
		$SSN = $_REQUEST["txt_SSN"];
		$NewPassword = $_REQUEST["txt_NewPassword"];
		
		if (Authentication::ForgetPassword($Username, $DOB, $SSN, $NewPassword)) {
			self::$ChangePasswordStatus = "Success<br><a href='login.php'>Click here return to Login</a>";
		}
		else {
			self::$ChangePasswordStatus = "Unauthorized";
		}
	}
	
}

?>