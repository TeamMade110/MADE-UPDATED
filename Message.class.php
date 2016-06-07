<?php

include_once "Authentication.class.php";

class Message {
	
	// Database access infomation
	private static $DBLink = "localhost";
	private static $DBUsername = "root";
	private static $DBPassword = "password";
	private static $DBName = "made";
	// Cached Information
	private static $Count = -1;
	private static $CurrIndex = -1;
	private static $MessageID = -1;
	private static $PatientID = -1;
	private static $MessageSubject = "";
	private static $MessageText = "";
	private static $DoctorName = "";
	private static $TimeStamp = 0;
	
	// Send message to doctor
	public static function SendMessage($MessageSubject, $MessageText, $DoctorName) {
		self::resetCache();
		$PatientID = Authentication::getPatientID();
		if ($MessageSubject != "" && $MessageText != "" && $DoctorName != "") {
			$MessageSubject = Authentication::getFirstName() . " " . Authentication::getLastName() . ": " . $MessageSubject;
			// Create connection
			$Conn = mysqli_connect(self::$DBLink, self::$DBUsername, self::$DBPassword, self::$DBName);
			if ($Conn->connect_error) {
				$Conn->close();   // Close connection
				return false;   // Cannot connect to database
			}
			// Get MessageID
			$Sql = $Conn->prepare("SELECT @MsgId := MAX(`messageID`) AS `MAX` FROM `message_doctor`;");
			$Sql->execute();
			$Result = $Sql->get_result();
			$Row = $Result->fetch_assoc();
			$MaxMessageID = $Row["MAX"] + 1;
			// Update Meessage
			$Sql2 = $Conn->prepare("INSERT INTO `message_doctor` (`messageID`, `patientID`, `messageSubject`, `messageText`, `doctorName`, `timeStamp`) VALUES (?, ?, ?, ?, ?, NOW());");
			$Sql2->bind_param("iisss", $MaxMessageID, $PatientID, $MessageSubject, $MessageText, $DoctorName);
			$Sql2->execute();
			$Conn->close();
			return true;
		}
		return false;
	}
	
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

			$Sql = $Conn->prepare("SELECT COUNT(*) AS `count` FROM `message_doctor` WHERE `patientID`=?");
			$Sql->bind_param("s", $PatientID);
			$Sql->execute();
			$Result = $Sql->get_result();

			$Row = $Result->fetch_assoc();
			self::$Count = $Row["count"];
			$Conn->close();
		}
		return self::$Count;
	}
	
	// Get MessageID
	public static function getMessageID($Index) {
		if (self::IndexIsValid($Index)) {
			if (self::$CurrIndex != $Index) {
				if (self::loadData($Index) == false) {
					return -1;
				}
			}
			return self::$MessageID;
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
	
	// Get MessageSubject
	public static function getMessageSubject($Index) {
		if (self::IndexIsValid($Index)) {
			if (self::$CurrIndex != $Index) {
				if (self::loadData($Index) == false) {
					return "";
				}
			}
			return self::$MessageSubject;
		}
		return "";
	}
	
	// Get MessageText
	public static function getMessageText($Index) {
		if (self::IndexIsValid($Index)) {
			if (self::$CurrIndex != $Index) {
				if (self::loadData($Index) == false) {
					return "";
				}
			}
			return self::$MessageText;
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

			$Sql = $Conn->prepare("SELECT `messageID`, `patientID`, `messageSubject`, `messageText`, `doctorName`, `timeStamp` FROM `message_doctor` WHERE `patientID`=? ORDER BY `timeStamp` ASC LIMIT " . $Index . ",1");
			$Sql->bind_param("s", $PatientID);
			$Sql->execute();
			$Result = $Sql->get_result();

			$Row = $Result->fetch_assoc();
			self::$MessageID = $Row["messageID"];
			self::$PatientID = $Row["patientID"];
			self::$MessageSubject = $Row["messageSubject"];
			self::$MessageText = $Row["messageText"];
			self::$DoctorName = $Row["doctorName"];
			self::$TimeStamp = $Row["timeStamp"];
			
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
	
	// Reset cache
	private static function resetCache() {
		self::$MessageID = -1;
		self::$PatientID = -1;
		self::$MessageSubject = "";
		self::$MessageText = "";
		self::$DoctorName = "";
		self::$TimeStamp = 0;
	}
}

?>