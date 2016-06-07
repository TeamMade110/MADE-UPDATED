<?php

include_once "Authentication.class.php";
include_once "MedicalRecord.class.php";
include_once "PrimaryCare.class.php";

class IndexS {
	
	public static $FirstName = "";
	public static $LastName = "";
	
	public static $Temperature = "";
	public static $Pulse = "";
	public static $Respiratory = "";
	public static $Height = "";
	public static $Weight = "";
	public static $BMI = "";
	public static $Nutrition = "";
	public static $AssignedProvider = "";
	public static $TimeStamp = 0;
	public static $MedicationHTML = "";
	public static $AllergiesHTML = "";
	public static $DiseasesHTML = "";
	public static $Smoking = "";
	public static $Alcohol = "";
	public static $DoctorsNotes = "";
	
	public static $PrimaryCareName = "Not Available";
	public static $PrimaryCareAddress = "Not Available";
	public static $PrimaryCareHour = "Not Available";
	public static $PrimaryCarePhone = "Not Available";
	
	public static function Page_Load() {
		// Check Login
		if (!(Authentication::isAuthorized())) {
			header("Location: /login.php");
			exit();
		}
		// Load FirstName and LastName
		self::$FirstName = Authentication::getFirstName();
		self::$LastName = Authentication::getLastName();
		// Load Last Medical Checkup
		$LastID = MedicalRecord::getCount() - 1;
		self::$Temperature = MedicalRecord::getTemperature($LastID);
		self::$Pulse = MedicalRecord::getPulse($LastID);
		self::$Respiratory = MedicalRecord::getRespiratory($LastID);
		self::$Height = MedicalRecord::getHeight($LastID);
		self::$Weight = MedicalRecord::getWeight($LastID);
		self::$BMI = MedicalRecord::getBMI($LastID);
		self::$Nutrition = MedicalRecord::getNutrition($LastID);
		self::$AssignedProvider = MedicalRecord::getAssignedProvider($LastID);
		self::$TimeStamp = MedicalRecord::getTimeStamp($LastID);
		self::$MedicationHTML = self::getMedicationHTML(MedicalRecord::getMedications($LastID));
		self::$AllergiesHTML = self::getAllergiesHTML(MedicalRecord::getAllergies($LastID));
		self::$DiseasesHTML = self::getDiseasesHTML(MedicalRecord::getDiseases($LastID));
		self::$Smoking = MedicalRecord::getSmoking($LastID);
		self::$Alcohol = MedicalRecord::getAlcohol($LastID);
		self::$DoctorsNotes = str_replace("\n", "<br>", MedicalRecord::getDoctorsNotes($LastID));
		// Load Primary Care Information
		$AssignedProviderIndex = PrimaryCare::getIndexByName(MedicalRecord::getAssignedProvider($LastID));
		if ($AssignedProviderIndex != -1) {
			self::$PrimaryCareName = PrimaryCare::getName($AssignedProviderIndex);
			self::$PrimaryCareAddress = PrimaryCare::getAddress($AssignedProviderIndex) . ", " . PrimaryCare::getState($AssignedProviderIndex) . " " . PrimaryCare::getZip($AssignedProviderIndex);
			self::$PrimaryCareHour = PrimaryCare::getHours($AssignedProviderIndex);
			self::$PrimaryCarePhone = PrimaryCare::getPhone($AssignedProviderIndex);
		}
	}
	
	private static function getMedicationHTML($Medications) {
		$NewMedications = "<tr><td class='content'>" . $Medications . "</td></tr>";
		$NewMedications = str_replace("\n", "</td></tr><tr><td class='content'>", $NewMedications);
		return $NewMedications;
	}
	
	private static function getAllergiesHTML($Allergies) {
		$NewAllergies = "<tr><td class='content'>" . $Allergies . "</td></tr>";
		$NewAllergies = str_replace("\n", "</td></tr><tr><td class='content'>", $NewAllergies);
		return $NewAllergies;
	}
	
	private static function getDiseasesHTML($Diseases) {
		$NewDiseases = "<tr><td class='content'>" . $Diseases . "</td></tr>";
		$NewDiseases = str_replace("\n", "</td></tr><tr><td class='content'>", $NewDiseases);
		return $NewDiseases;
	}
}

?>