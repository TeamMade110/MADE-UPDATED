<?php

include_once "Authentication.class.php";

class LoginS {
	
	public static $Authorized = "";
	
	public static function Page_Load() {
		
	}
	
	public static function FormSubmitHandler() {
		// Handle form submit
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			if (isset($_POST['LoginBtn_Click'])) {
				self::LoginBtn_Click();
			}
		}
	}
	
	private static function LoginBtn_Click() {
		$Username = $_REQUEST["txt_Username"];
		$Password = $_REQUEST["txt_Password"];
		
		if (Authentication::Authenticate($Username, $Password)) {
			header("Location: /index.php");
			exit();
		}
		else {
			self::$Authorized = "Unauthorized";
		}
}
	
}

?>