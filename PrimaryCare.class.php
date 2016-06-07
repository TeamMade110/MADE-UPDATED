<?php

class PrimaryCare {
	
	// Database access infomation
	private static $DBLink = "localhost";
	private static $DBUsername = "root";
	private static $DBPassword = "password";
	private static $DBName = "made";
	// Cached Information
	private static $Count = -1;
	private static $CurrIndex = -1;
	private static $PrimaryCareID = -1;
	private static $Name = "";
	private static $Address = "";
	private static $Zip = "";
	private static $State = "";
	private static $Phone = "";
	private static $Hours = "";
	
	// Get number of messages belong to the current user
	public static function getCount() {
		if (self::$Count == -1) {
			// Create connection
			$Conn = mysqli_connect(self::$DBLink, self::$DBUsername, self::$DBPassword, self::$DBName);
			if ($Conn->connect_error) {
				$Conn->close();   // Close connection
				return -1;   // Cannot connect to database
			}

			$Sql = $Conn->prepare("SELECT COUNT(*) AS `count` FROM `primary_care`");
			//$Sql->bind_param("s", $PatientID);
			$Sql->execute();
			$Result = $Sql->get_result();

			$Row = $Result->fetch_assoc();
			self::$Count = $Row["count"];
			$Conn->close();
		}
		return self::$Count;
	}
	
	// Get PrimaryCareID
	public static function getPrimaryCareID($Index) {
		if (self::IndexIsValid($Index)) {
			if (self::$CurrIndex != $Index) {
				if (self::loadData($Index) == false) {
					return -1;
				}
			}
			return self::$PrimaryCareID;
		}
		return -1;
	}
	
	// Get Name
	public static function getName($Index) {
		if (self::IndexIsValid($Index)) {
			if (self::$CurrIndex != $Index) {
				if (self::loadData($Index) == false) {
					return "";
				}
			}
			return self::$Name;
		}
		return "";
	}
	
	// Get Address
	public static function getAddress($Index) {
		if (self::IndexIsValid($Index)) {
			if (self::$CurrIndex != $Index) {
				if (self::loadData($Index) == false) {
					return "";
				}
			}
			return self::$Address;
		}
		return "";
	}
	
	// Get Zip
	public static function getZip($Index) {
		if (self::IndexIsValid($Index)) {
			if (self::$CurrIndex != $Index) {
				if (self::loadData($Index) == false) {
					return "";
				}
			}
			return self::$Zip;
		}
		return "";
	}
	
	// Get State
	public static function getState($Index) {
		if (self::IndexIsValid($Index)) {
			if (self::$CurrIndex != $Index) {
				if (self::loadData($Index) == false) {
					return "";
				}
			}
			return self::$State;
		}
		return "";
	}
	
	// Get Phone
	public static function getPhone($Index) {
		if (self::IndexIsValid($Index)) {
			if (self::$CurrIndex != $Index) {
				if (self::loadData($Index) == false) {
					return "";
				}
			}
			return self::$Phone;
		}
		return "";
	}
	
	// Get Hours
	public static function getHours($Index) {
		if (self::IndexIsValid($Index)) {
			if (self::$CurrIndex != $Index) {
				if (self::loadData($Index) == false) {
					return "";
				}
			}
			return self::$Hours;
		}
		return "";
	}
	
	// Get the index of a given Name (Smallest PrimaryCareID)
	// Return the index if found, otherwise return -1
	public static function getIndexByName($Name) {
		// Do a linear search for the provided Name
		for ($i = 0; $i < self::getCount(); $i++) {
			if (self::getName($i) == $Name) {
				return $i;
			}
		}
		return -1;
	}
	
	// Load all database field of given index
	private static function loadData($Index) {
		if (self::IndexIsValid($Index)) {
			// Create connection
			$Conn = mysqli_connect(self::$DBLink, self::$DBUsername, self::$DBPassword, self::$DBName);
			if ($Conn->connect_error) {
				$Conn->close();   // Close connection
				return false;   // Cannot connect to database
			}

			$Sql = $Conn->prepare("SELECT `primaryCareID`, `name`, `address`, `zip`, `state`, `phone`, `hours` FROM `primary_care` ORDER BY `primaryCareID` ASC LIMIT " . $Index . ",1");
			//$Sql->bind_param("s", $PatientID);
			$Sql->execute();
			$Result = $Sql->get_result();

			$Row = $Result->fetch_assoc();
			self::$PrimaryCareID = $Row["primaryCareID"];
			self::$Name = $Row["name"];
			self::$Address = $Row["address"];
			self::$Zip = $Row["zip"];
			self::$State = $Row["state"];
			self::$Phone = $Row["phone"];
			self::$Hours = $Row["hours"];
			
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