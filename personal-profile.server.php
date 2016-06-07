<?php

include_once "Authentication.class.php";
include_once "MedicalRecord.class.php";
include_once "PrimaryCare.class.php";

class PersonalProfileS {
	
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
	
	public static $PrimaryCareName = "Not Available";
	public static $PrimaryCareAddress = "Not Available";
	public static $PrimaryCareState = "Not Available";
	public static $PrimaryCareHour = "Not Available";
	public static $PrimaryCarePhone = "Not Available";
	
	public static function Page_Load() {
		// Check Login
		if (!(Authentication::isAuthorized())) {
			header("Location: /login.php");
			exit();
		}
		// Load Profile Information
		self::$Username = Authentication::getUsername();
		self::$FirstName = Authentication::getFirstName();
		self::$LastName = Authentication::getLastName();
		self::$Sex = Authentication::getSex();
		self::$Age = Authentication::getAge();
		self::$SSN = Authentication::getSSN();
		self::$DOB = Authentication::getDOB();
		self::$Phone = Authentication::getPhone();
		self::$Email = Authentication::getEmail();
		self::$Address = Authentication::getAddress() . ", " . Authentication::getState() . " " . Authentication::getZip();
		// Load Primary Care Information
		$AssignedProviderIndex = PrimaryCare::getIndexByName(MedicalRecord::getAssignedProvider(MedicalRecord::getCount() - 1));
		if ($AssignedProviderIndex != -1) {
			self::$PrimaryCareName = PrimaryCare::getName($AssignedProviderIndex);
			self::$PrimaryCareAddress = PrimaryCare::getAddress($AssignedProviderIndex);
			self::$PrimaryCareState = PrimaryCare::getState($AssignedProviderIndex);
			self::$PrimaryCareHour = PrimaryCare::getHours($AssignedProviderIndex);
			self::$PrimaryCarePhone = PrimaryCare::getPhone($AssignedProviderIndex);
		}
	}
}

?>