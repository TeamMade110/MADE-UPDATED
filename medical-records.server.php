<?php

include_once "Authentication.class.php";
include_once "MedicalRecord.class.php";

class MedicalRecordsS {
	
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
	
	public static function Page_Load() {
		// Check Login
		if (!(Authentication::isAuthorized())) {
			header("Location: /login.php");
			exit();
		}
		// Start/load session if not
		if (session_status() == PHP_SESSION_NONE) {
			session_start();
		}
		// Load Last Medical Checkup
		if (!isset($_SESSION["MedicalRecordsS_CurrentIndex"])) {
			$_SESSION["MedicalRecordsS_CurrentIndex"] = MedicalRecord::getCount() - 1;
		}
		self::LoadMedicalCheckup($_SESSION["MedicalRecordsS_CurrentIndex"]);
	}
	
	public static function FormSubmitHandler() {
		// Handle form submit
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			if (isset($_POST['NextRecordBtn_Click'])) {
				self::NextRecordBtn_Click();
			}
			if (isset($_POST['PreviousRecordBtn_Click'])) {
				self::PreviousRecordBtn_Click();
			}
		}
	}
	
	private static function NextRecordBtn_Click() {
		$CurrentIndex = $_SESSION["MedicalRecordsS_CurrentIndex"];
		if ($CurrentIndex < (MedicalRecord::getCount() - 1)) {
			$CurrentIndex++;
		}
		self::LoadMedicalCheckup($CurrentIndex);
		$_SESSION["MedicalRecordsS_CurrentIndex"] = $CurrentIndex;
	}
	
	private static function PreviousRecordBtn_Click() {
		$CurrentIndex = $_SESSION["MedicalRecordsS_CurrentIndex"];
		if ($CurrentIndex > 0) {
			$CurrentIndex--;
		}
		self::LoadMedicalCheckup($CurrentIndex);
		$_SESSION["MedicalRecordsS_CurrentIndex"] = $CurrentIndex;
	}
	
	private static function LoadMedicalCheckup($ID) {
		self::$Temperature = MedicalRecord::getTemperature($ID);
		self::$Pulse = MedicalRecord::getPulse($ID);
		self::$Respiratory = MedicalRecord::getRespiratory($ID);
		self::$Height = MedicalRecord::getHeight($ID);
		self::$Weight = MedicalRecord::getWeight($ID);
		self::$BMI = MedicalRecord::getBMI($ID);
		self::$Nutrition = MedicalRecord::getNutrition($ID);
		self::$AssignedProvider = MedicalRecord::getAssignedProvider($ID);
		self::$TimeStamp = MedicalRecord::getTimeStamp($ID);
		self::$MedicationHTML = self::getMedicationHTML(MedicalRecord::getMedications($ID));
		self::$AllergiesHTML = self::getAllergiesHTML(MedicalRecord::getAllergies($ID));
		self::$DiseasesHTML = self::getDiseasesHTML(MedicalRecord::getDiseases($ID));
		self::$Smoking = MedicalRecord::getSmoking($ID);
		self::$Alcohol = MedicalRecord::getAlcohol($ID);
		self::$DoctorsNotes = str_replace("\n", "<br>", MedicalRecord::getDoctorsNotes($ID));
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