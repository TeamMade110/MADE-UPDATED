<?php

include_once "Authentication.class.php";

class UpdateProfileS {

	public static $PatientID = "";
	public static $Username = "";
	public static $FirstName = "";
	public static $LastName = "";
	public static $Sex = "";
	public static $Age = "";
	public static $SSN = "";
	public static $DOB = "";
	public static $Phone = "";
	public static $Email = "";
	public static $Address = "";
	public static $Zip = "";
	public static $State = "";
	public static $PrimaryCare = "";
	public static $ChangePasswordStatus = "";
	
	public static function Page_Load() {
		// Check Login
		if (!(Authentication::isAuthorized())) {
			header("Location: /Login.php");
			exit();
		}
		// Display user parameters
		self::$PatientID = Authentication::getPatientID();
		self::$Username = Authentication::getUsername();
		self::$FirstName = Authentication::getFirstName();
		self::$LastName = Authentication::getLastName();
		self::$Sex = Authentication::getSex();
		self::$Age = Authentication::getAge();
		self::$SSN = Authentication::getSSN();
		self::$DOB = Authentication::getDOB();
		self::$Phone = Authentication::getPhone();
		self::$Email = Authentication::getEmail();
		self::$Address = Authentication::getAddress();
		self::$Zip = Authentication::getZip();
		self::$State = Authentication::getState();
		self::$PrimaryCare = Authentication::getPrimaryCare();
	}
	
	public static function FormSubmitHandler() {
		// Handle form submit
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			if (isset($_POST['ChangePasswordBtn_Click'])) {
				self::ChangePasswordBtn_Click();
			}
			if (isset($_POST['ChangePhoneBtn_Click'])) {
				self::ChangePhoneBtn_Click();
			}
			if (isset($_POST['ChangeEmailBtn_Click'])) {
				self::ChangeEmailBtn_Click();
			}
			if (isset($_POST['ChangeAddressBtn_Click'])) {
				self::ChangeAddressBtn_Click();
			}
			if (isset($_POST['ChangeZipBtn_Click'])) {
				self::ChangeZipBtn_Click();
			}
			if (isset($_POST['ChangeStateBtn_Click'])) {
				self::ChangeStateBtn_Click();
			}
			if (isset($_POST['LogoutBtn_Click'])) {
				self::LogoutBtn_Click();
			}
		}
	}
	
	private static function ChangePasswordBtn_Click() {
		$CurrPassword = $_REQUEST["txt_CurrPassword"];
		$NewPassword = $_REQUEST["txt_NewPassword"];
		
		if (Authentication::ChangePassword($CurrPassword, $NewPassword)) {
			self::$ChangePasswordStatus = "Success";
		}
		else {
			self::$ChangePasswordStatus = "Fail";
		}
	}
	
	private static function ChangePhoneBtn_Click() {
		$Phone = $_REQUEST["txt_Phone"];
		Authentication::updatePhone($Phone);
		self::$Phone = Authentication::getPhone();
	}
	
	private static function ChangeEmailBtn_Click() {
		$Email = $_REQUEST["txt_Email"];
		Authentication::updateEmail($Email);
		self::$Email = Authentication::getEmail();
	}
	
	private static function ChangeAddressBtn_Click() {
		$Address = $_REQUEST["txt_Address"];
		Authentication::updateAddress($Address);
		self::$Address = Authentication::getAddress();
	}
	
	private static function ChangeZipBtn_Click() {
		$Zip = $_REQUEST["txt_Zip"];
		Authentication::updateZip($Zip);
		self::$Zip = Authentication::getZip();
	}
	
	private static function ChangeStateBtn_Click() {
		$State = $_REQUEST["txt_State"];
		Authentication::updateState($State);
		self::$State = Authentication::getState();
	}
	
	private static function LogoutBtn_Click() {
		Authentication::Unauthorize();
		header("Location: /Login.php");
		exit();
	}
}

?>