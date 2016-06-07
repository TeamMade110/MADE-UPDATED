<?php

include_once "Authentication.class.php";

class MedicalRecord {
	
	// Database access infomation
	private static $DBLink = "localhost";
	private static $DBUsername = "root";
	private static $DBPassword = "password";
	private static $DBName = "made";
	// Cached Information
	private static $Count = -1;
	private static $CurrIndex = -1;
	private static $MedicalRecordID = -1;
	private static $PatientID = -1;
	private static $Temperature = "";
	private static $Pulse = "";
	private static $Respiratory = "";
	private static $Height = "";
	private static $Weight = "";
	private static $BMI = "";
	private static $Nutrition = "";
	private static $Medications = "";
	private static $Allergies = "";
	private static $Diseases = "";
	private static $DoctorsNotes = "";
	private static $AssignedProvider = "";
	private static $Smoking = "";
	private static $Alcohol = "";
	private static $TimeStamp = 0;
	private static $DoctorName = "";
	
	// Get number of messages belong to the current user
	public static function getCount() {
		if (self::$Count == -1) {
			$PatientID = Authentication::getPatientID();

			// Create connection
			$Conn = mysqli_connect(self::$DBLink, self::$DBUsername, self::$DBPassword, self::$DBName);
			if ($Conn->connect_error) {
				$Conn->close();   // Close connection
				return -1;   // Cannot connect to database
			}

			$Sql = $Conn->prepare("SELECT COUNT(*) AS `count` FROM `medical_record` WHERE `patientID`=?");
			$Sql->bind_param("s", $PatientID);
			$Sql->execute();
			$Result = $Sql->get_result();

			$Row = $Result->fetch_assoc();
			self::$Count = $Row["count"];
			$Conn->close();
		}
		return self::$Count;
	}
	
	// Get MedicalRecordID
	public static function getMedicalRecordID($Index) {
		if (self::IndexIsValid($Index)) {
			if (self::$CurrIndex != $Index) {
				if (self::loadData($Index) == false) {
					return -1;
				}
			}
			return self::$MedicalRecordID;
		}
		return -1;
	}
	
	// Get PatientID
	public static function getPatientID($Index) {
		if (self::IndexIsValid($Index)) {
			if (self::$CurrIndex != $Index) {
				if (self::loadData($Index) == false) {
					return -1;
				}
			}
			return self::$PatientID;
		}
		return -1;
	}
	
	// Get Temperature
	public static function getTemperature($Index) {
		if (self::IndexIsValid($Index)) {
			if (self::$CurrIndex != $Index) {
				if (self::loadData($Index) == false) {
					return "";
				}
			}
			return self::$Temperature;
		}
		return "";
	}
	
	// Get Pulse
	public static function getPulse($Index) {
		if (self::IndexIsValid($Index)) {
			if (self::$CurrIndex != $Index) {
				if (self::loadData($Index) == false) {
					return "";
				}
			}
			return self::$Pulse;
		}
		return "";
	}
	
	// Get Respiratory
	public static function getRespiratory($Index) {
		if (self::IndexIsValid($Index)) {
			if (self::$CurrIndex != $Index) {
				if (self::loadData($Index) == false) {
					return "";
				}
			}
			return self::$Respiratory;
		}
		return "";
	}
	
	// Get Height
	public static function getHeight($Index) {
		if (self::IndexIsValid($Index)) {
			if (self::$CurrIndex != $Index) {
				if (self::loadData($Index) == false) {
					return "";
				}
			}
			return self::$Height;
		}
		return "";
	}
	
	// Get Weight
	public static function getWeight($Index) {
		if (self::IndexIsValid($Index)) {
			if (self::$CurrIndex != $Index) {
				if (self::loadData($Index) == false) {
					return "";
				}
			}
			return self::$Weight;
		}
		return "";
	}
	
	// Get BMI
	public static function getBMI($Index) {
		if (self::IndexIsValid($Index)) {
			if (self::$CurrIndex != $Index) {
				if (self::loadData($Index) == false) {
					return "";
				}
			}
			return self::$BMI;
		}
		return "";
	}
	
	// Get Nutrition
	public static function getNutrition($Index) {
		if (self::IndexIsValid($Index)) {
			if (self::$CurrIndex != $Index) {
				if (self::loadData($Index) == false) {
					return "";
				}
			}
			return self::$Nutrition;
		}
		return "";
	}
	
	// Get Medications
	public static function getMedications($Index) {
		if (self::IndexIsValid($Index)) {
			if (self::$CurrIndex != $Index) {
				if (self::loadData($Index) == false) {
					return "";
				}
			}
			return self::$Medications;
		}
		return "";
	}
	
	// Get Allergies
	public static function getAllergies($Index) {
		if (self::IndexIsValid($Index)) {
			if (self::$CurrIndex != $Index) {
				if (self::loadData($Index) == false) {
					return "";
				}
			}
			return self::$Allergies;
		}
		return "";
	}
	
	// Get Diseases
	public static function getDiseases($Index) {
		if (self::IndexIsValid($Index)) {
			if (self::$CurrIndex != $Index) {
				if (self::loadData($Index) == false) {
					return "";
				}
			}
			return self::$Diseases;
		}
		return "";
	}
	
	// Get DoctorsNotes
	public static function getDoctorsNotes($Index) {
		if (self::IndexIsValid($Index)) {
			if (self::$CurrIndex != $Index) {
				if (self::loadData($Index) == false) {
					return "";
				}
			}
			return self::$DoctorsNotes;
		}
		return "";
	}
	
	// Get AssignedProvider
	public static function getAssignedProvider($Index) {
		if (self::IndexIsValid($Index)) {
			if (self::$CurrIndex != $Index) {
				if (self::loadData($Index) == false) {
					return "";
				}
			}
			return self::$AssignedProvider;
		}
		return "";
	}
	
	// Get Smoking
	public static function getSmoking($Index) {
		if (self::IndexIsValid($Index)) {
			if (self::$CurrIndex != $Index) {
				if (self::loadData($Index) == false) {
					return "";
				}
			}
			return self::$Smoking;
		}
		return "";
	}
	
	// Get Alcohol
	public static function getAlcohol($Index) {
		if (self::IndexIsValid($Index)) {
			if (self::$CurrIndex != $Index) {
				if (self::loadData($Index) == false) {
					return "";
				}
			}
			return self::$Alcohol;
		}
		return "";
	}
	
	// Get TimeStamp
	public static function getTimeStamp($Index) {
		if (self::IndexIsValid($Index)) {
			if (self::$CurrIndex != $Index) {
				if (self::loadData($Index) == false) {
					return 0;
				}
			}
			return self::$TimeStamp;
		}
		return 0;
	}
	
	// Get DoctorName
	public static function getDoctorName($Index) {
		if (self::IndexIsValid($Index)) {
			if (self::$CurrIndex != $Index) {
				if (self::loadData($Index) == false) {
					return "";
				}
			}
			return self::$DoctorName;
		}
		return "";
	}
	
	// Load all database field of given index
	private static function loadData($Index) {
		if (self::IndexIsValid($Index)) {
			$PatientID = Authentication::getPatientID();
			
			// Create connection
			$Conn = mysqli_connect(self::$DBLink, self::$DBUsername, self::$DBPassword, self::$DBName);
			if ($Conn->connect_error) {
				$Conn->close();   // Close connection
				return false;   // Cannot connect to database
			}

			$Sql = $Conn->prepare("SELECT `medicalRecordID`, `patientID`, `temperature`, `pulse`, `respiratory`, `height`, `weight`, `bmi`, `nutrition`, `medications`, `allergies`, `diseases`, `doctorsNotes`, `assignedProvider`, `smoking`, `alcohol`, `timeStamp`, `doctorName` FROM `medical_record` WHERE `patientID`=? ORDER BY `timeStamp` ASC LIMIT " . $Index . ",1");
			$Sql->bind_param("s", $PatientID);
			$Sql->execute();
			$Result = $Sql->get_result();

			$Row = $Result->fetch_assoc();
			self::$MedicalRecordID = $Row["medicalRecordID"];
			self::$PatientID = $Row["patientID"];
			self::$Temperature = $Row["temperature"];
			self::$Pulse = $Row["pulse"];
			self::$Respiratory = $Row["respiratory"];
			self::$Height = $Row["height"];
			self::$Weight = $Row["weight"];
			self::$BMI = $Row["bmi"];
			self::$Nutrition = $Row["nutrition"];
			self::$Medications = $Row["medications"];
			self::$Allergies = $Row["allergies"];
			self::$Diseases = $Row["diseases"];
			self::$DoctorsNotes = $Row["doctorsNotes"];
			self::$AssignedProvider = $Row["assignedProvider"];
			self::$Smoking = $Row["smoking"];
			self::$Alcohol = $Row["alcohol"];
			self::$TimeStamp = $Row["timeStamp"];
			self::$DoctorName = $Row["doctorName"];
			
			$Conn->close();
			self::$CurrIndex = $Index;
			return true;
		}
		return false;
	}
	
	// Check if Index is valid
	private static function IndexIsValid($Index) {
		if ($Index >= 0 && $Index < self::getCount()) {
			return true;
		}
		else {
			return false;
		}
	}
}

?>