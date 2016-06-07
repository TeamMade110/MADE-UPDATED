<?php

include_once "Authentication.class.php";

class Appointment {
	
	// Database access infomation
	private static $DBLink = "localhost";
	private static $DBUsername = "root";
	private static $DBPassword = "password";
	private static $DBName = "made";
	// Cached Information
	private static $Count = -1;
	private static $CurrIndex = -1;
	private static $AppointmentID = -1;
	private static $PatientID = -1;
	private static $Date = "";
	private static $Time = "";
	private static $LocationName = "";
	private static $LocationAddress = "";
	private static $DoctorName = "";
	private static $Purpose = "";
	
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

			$Sql = $Conn->prepare("SELECT COUNT(*) AS `count` FROM `appointment` WHERE `patientID`=?");
			$Sql->bind_param("s", $PatientID);
			$Sql->execute();
			$Result = $Sql->get_result();

			$Row = $Result->fetch_assoc();
			self::$Count = $Row["count"];
			$Conn->close();
		}
		return self::$Count;
	}
	
	// Get AppointmentID
	public static function getAppointmentID($Index) {
		if (self::IndexIsValid($Index)) {
			if (self::$CurrIndex != $Index) {
				if (self::loadData($Index) == false) {
					return -1;
				}
			}
			return self::$AppointmentID;
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
	
	// Get Date
	public static function getDateX($Index) {
		if (self::IndexIsValid($Index)) {
			if (self::$CurrIndex != $Index) {
				if (self::loadData($Index) == false) {
					return "";
				}
			}
			return self::$Date;
		}
		return "";
	}
	
	// Get Time
	public static function getTime($Index) {
		if (self::IndexIsValid($Index)) {
			if (self::$CurrIndex != $Index) {
				if (self::loadData($Index) == false) {
					return "";
				}
			}
			return self::$Time;
		}
		return "";
	}
	
	// Get LocationName
	public static function getLocationName($Index) {
		if (self::IndexIsValid($Index)) {
			if (self::$CurrIndex != $Index) {
				if (self::loadData($Index) == false) {
					return "";
				}
			}
			return self::$LocationName;
		}
		return "";
	}
	
	// Get LocationAddress
	public static function getLocationAddress($Index) {
		if (self::IndexIsValid($Index)) {
			if (self::$CurrIndex != $Index) {
				if (self::loadData($Index) == false) {
					return "";
				}
			}
			return self::$LocationAddress;
		}
		return "";
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
	
	// Get Purpose
	public static function getPurpose($Index) {
		if (self::IndexIsValid($Index)) {
			if (self::$CurrIndex != $Index) {
				if (self::loadData($Index) == false) {
					return "";
				}
			}
			return self::$Purpose;
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

			$Sql = $Conn->prepare("SELECT `appointmentID`, `patientID`, `date`, `time`, `locationName`, `locationAddress`, `doctorName`, `purpose` FROM `appointment` WHERE `patientID`=? ORDER BY `date`,`time` ASC LIMIT " . $Index . ",1");
			$Sql->bind_param("s", $PatientID);
			$Sql->execute();
			$Result = $Sql->get_result();

			$Row = $Result->fetch_assoc();
			self::$AppointmentID = $Row["appointmentID"];
			self::$PatientID = $Row["patientID"];
			self::$Date = $Row["date"];
			self::$Time = $Row["time"];
			self::$LocationName = $Row["locationName"];
			self::$LocationAddress = $Row["locationAddress"];
			self::$DoctorName = $Row["doctorName"];
			self::$Purpose = $Row["purpose"];
			
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