<?php

include_once "Authentication.class.php";
include_once "Message.class.php";

class MessagesS {
	
	public static $SendMessageStatus = "";
	
	public static function Page_Load() {
		// Check Login
		if (!(Authentication::isAuthorized())) {
			header("Location: /login.php");
			exit();
		}
	}
	
	public static function FormSubmitHandler() {
		// Handle form submit
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			if (isset($_POST['SendMessageBtn_Click'])) {
				self::SendMessageBtn_Click();
			}
		}
	}
	
	private static function SendMessageBtn_Click() {
		$SendMessageTitle = $_REQUEST["txt_SendMessageTitle"];
		$SendMessageBody = $_REQUEST["txt_SendMessageBody"];
		$SendMessageDoctorName = $_REQUEST["txt_SendMessageDoctorName"];
		
		if ($SendMessageDoctorName != "Terry Chan" && $SendMessageDoctorName != "Haejoon" && $SendMessageDoctorName != "Brent") {
			self::$SendMessageStatus = "Doctor Not Found";
			return;
		}
		
		if (Message::SendMessage($SendMessageTitle, $SendMessageBody, $SendMessageDoctorName)) {
			self::$SendMessageStatus = "";
		}
		else {
			self::$SendMessageStatus = "Fail";
		}
	}
}

?>