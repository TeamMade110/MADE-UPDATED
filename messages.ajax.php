<?php

include_once "Authentication.class.php";
include_once "Message.class.php";

MessagesSA::AjaxCallHandler();

class MessagesSA {
	
	// Database access infomation
	private static $DBLink = "localhost";
	private static $DBUsername = "root";
	private static $DBPassword = "password";
	private static $DBName = "made";
	
	public static function AjaxCallHandler() {
		// Check Login
		if (!(Authentication::isAuthorized())) {
			header("Location: /Login.php");
			exit();
		}
		// Build a table of all message for response
		echo self::getAllMessageHTML();
	}
	
	private static function getAllMessageHTML() {
		$HTML = "<table style='border-style: none; border-collapse: collapse;'><!--<tr><th>Message ID</th><th>Patient ID</th><th>Meessage Subject</th><th>Message Text</th><th>Doctor Name</th><th>Time Stamp</th></tr>-->";
		for ($i = (Message::getCount() - 1); $i >= 0; $i--) {
			$HTML = $HTML . "<tr>";
			$HTML = $HTML . "<th>" . Message::getMessageSubject($i) . "</th>";
			$HTML = $HTML . "<td>Doctor: " . Message::getDoctorName($i) . "</td>";
			$HTML = $HTML . "<td>" . Message::getTimeStamp($i) . "</td>";
			$HTML = $HTML . "</tr><tr>";
			$HTML = $HTML . "<td colspan='3'>" . str_replace("\n", "<br>", Message::getMessageText($i)) . "</td>";
			$HTML = $HTML . "</tr><tr><td colspan='3'></td></tr>";
		}
		$HTML = $HTML . "</table>";
		return $HTML;
	}
}

?>