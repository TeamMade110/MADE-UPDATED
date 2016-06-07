<?php

/*
Functions you can call/use: 

	Sample Call: if (Authentication::Authenticate("Terry", "SoGood")) {echo "SoGood";} else {echo "SoBad";}

	// Authenticate a user login attempt
	// Return: true if authorized, false if otherwise
	public static function Authenticate($Username, $Password);
		
	// Check if the user is authorized in current session (logined)
	// Return true if is authorized, false if otherwise
	public static function isAuthorized();
	
	// Change password for current user
	// Return true if change success, false if fail
	public static function ChangePassword($CurrentPassword, $NewPassword);
	
	// Change a user's password if he/she forget the password
	// Return true if change success, false if fail
	public static function ForgetPassword($Username, $DOB, $SSN, $NewPassword);
	
	// Set a user as unauthorized in current session (logout)
	public static function Unauthorize();
	
	// Get PatientID
	public static function getPatientID();
	
	// Get Username
	public static function getUsername();
	
	// Get FirstName
	public static function getFirstName();
	
	// Get LastName
	public static function getLastName();
	
	// Get Sex
	public static function getSex();
	
	// Get Age
	public static function getAge();
	
	// Get SSN
	public static function getSSN();
	
	// Get DOB
	public static function getDOB();
	
	// Get Phone
	public static function getPhone();
	
	// Get Email
	public static function getEmail();
	
	// Get Address
	public static function getAddress();
	
	// Get Zip
	public static function getZip();
	
	// Get State
	public static function getState();
	
	// Get PrimaryCare
	public static function getPrimaryCare();
	
	// Update Phone
	// Return true for success, false for fail
	public static function updatePhone($Phone);
	
	// Update Email
	// Return true for success, false for fail
	public static function updateEmail($Email);
	
	// Update Address
	// Return true for success, false for fail
	public static function updateAddress($Address);
	
	// Update Zip
	// Return true for success, false for fail
	public static function updateZip($Zip);
	
	// Update State
	// Return true for success, false for fail
	public static function updateState($State);
*/

class Authentication {
	
	// Database access infomation
	private static $DBLink = "localhost";
	private static $DBUsername = "root";
	private static $DBPassword = "password";
	private static $DBName = "made";
	
	// Authenticate a user login attempt
	// Return: true if authorized, false if otherwise
	public static function Authenticate($Username, $Password) {
		
		if ($Username == "" || $Password == "") {
			return false;   // Username or password cannot empty
		}
		
		$Username = strtoupper($Username);
		$Password = self::PasswordHash($Password);
		
		// Create connection
		$Conn = mysqli_connect(self::$DBLink, self::$DBUsername, self::$DBPassword, self::$DBName);
		if ($Conn->connect_error) {
			$Conn->close();   // Close connection
			self::Unauthorize();
			return false;   // Cannot connect to database
		}

		$Sql = $Conn->prepare("SELECT `patientID`, `pUsername`, `password`, `firstName`, `lastName`, `sex`, `age`, `ssn`, `DOB`, `phone`, `email`, `address`, `zip`, `state`, `primaryCare` FROM `patient_profile` WHERE `pUsername`=?");
		$Sql->bind_param("s", $Username);
		$Sql->execute();
		$Result = $Sql->get_result();

		if ($Result->num_rows != 1) {
			$Conn->close();   // Close connection
			self::Unauthorize();
			return false;   // Either username not exist or something wrong with the database
		}
		
		$Row = $Result->fetch_assoc();
		if (strtoupper($Row["pUsername"]) == $Username && $Row["password"] == $Password) {
			// Authorize the user
			self::Authorize($Row["patientID"], strtoupper($Row["pUsername"]), $Row["password"], $Row["firstName"], $Row["lastName"], $Row["sex"], $Row["age"], $Row["ssn"], $Row["DOB"], $Row["phone"], $Row["email"], $Row["address"], $Row["zip"], $Row["state"], $Row["primaryCare"]);
			$Conn->close();
			return true;
		}
		else {
			// Unauthorized
			self::Unauthorize();
			$Conn->close();
			return false;
		}
	}
	
	// Check if the user is authorized in current session (logined)
	public static function isAuthorized() {
		// Start/load session if not
		if (session_status() == PHP_SESSION_NONE) {
			session_start();
		}
		// Check if authorized
		if (isset($_SESSION["Authentication_isAuthorized"]) && $_SESSION["Authentication_isAuthorized"] == "TRUE") {
			return true;
		}
		else {
			return false;
		}
	}
	
	// Change password for current user
	public static function ChangePassword($CurrentPassword, $NewPassword) {
		if ($CurrentPassword == "" || $NewPassword == "") {
			return false;   // CurrentPassword or NewPassword cannot empty
		}
		$NewPassword = self::PasswordHash($NewPassword);   // Hash password
		$CurrentPassword = self::PasswordHash($CurrentPassword);   // Hash password
		if (self::isAuthorized() && $CurrentPassword == self::getPassword()) {
			// Create connection
			$Conn = mysqli_connect(self::$DBLink, self::$DBUsername, self::$DBPassword, self::$DBName);
			if ($Conn->connect_error) {
				$Conn->close();   // Close connection
				self::Unauthorize();
				return false;   // Cannot connect to database
			}
			// Update password
			$Username = self::getUsername();
			$Sql = $Conn->prepare("UPDATE `patient_profile` SET `password`=? WHERE `pUsername`=?");
			$Sql->bind_param("ss", $NewPassword, $Username);
			$Sql->execute();
			$Conn->close();
			// Update password in session
			$_SESSION["Authentication_Password"] = $NewPassword;
			return true;
		}
		return false;
	}
	
	// Change a user's password if he/she forget the password
	// Return true if change success, false if fail
	public static function ForgetPassword($Username, $DOB, $SSN, $NewPassword) {
		
		if ($Username == "" || $DOB == "" || $SSN == "" || $NewPassword == "") {
			return false;   // Username or DOB or SSN or NewPassword cannot empty
		}
		
		$Username = strtoupper($Username);
		$NewPassword = self::PasswordHash($NewPassword);
		
		// Create connection
		$Conn = mysqli_connect(self::$DBLink, self::$DBUsername, self::$DBPassword, self::$DBName);
		if ($Conn->connect_error) {
			$Conn->close();   // Close connection
			return false;   // Cannot connect to database
		}

		$Sql = $Conn->prepare("SELECT `pUsername`, `ssn`, `DOB` FROM `patient_profile` WHERE `pUsername`=?");
		$Sql->bind_param("s", $Username);
		$Sql->execute();
		$Result = $Sql->get_result();

		if ($Result->num_rows != 1) {
			$Conn->close();   // Close connection
			self::Unauthorize();
			return false;   // Either username not exist or something wrong with the database
		}
		
		$Row = $Result->fetch_assoc();
		if (strtoupper($Row["pUsername"]) == $Username && $Row["DOB"] == $DOB && $Row["ssn"] == $SSN) {
			// Authorized to change password
			$Sql2 = $Conn->prepare("UPDATE `patient_profile` SET `password`=? WHERE `pUsername`=?");
			$Sql2->bind_param("ss", $NewPassword, $Username);
			$Sql2->execute();
			$Conn->close();
			return true;
		}
		else {
			// Unauthorized
			self::Unauthorize();
			$Conn->close();
			return false;
		}
	}
	
	
	// Set a user as authorized in current session and record all parameters
	private static function Authorize($PatientID, $Username, $Password, $FirstName, $LastName, $Sex, $Age, $SSN, $DOB, $Phone, $Email, $Address, $Zip, $State, $PrimaryCare) {
		// Start/load session if not
		if (session_status() == PHP_SESSION_NONE) {
			session_start();
		}
		// Record all user parameters
		$_SESSION["Authentication_isAuthorized"] = "TRUE";
		$_SESSION["Authentication_PatientID"] = $PatientID;
		$_SESSION["Authentication_Username"] = $Username;
		$_SESSION["Authentication_Password"] = $Password;
		$_SESSION["Authentication_FirstName"] = $FirstName;
		$_SESSION["Authentication_LastName"] = $LastName;
		$_SESSION["Authentication_Sex"] = $Sex;
		$_SESSION["Authentication_Age"] = $Age;
		$_SESSION["Authentication_SSN"] = $SSN;
		$_SESSION["Authentication_DOB"] = $DOB;
		$_SESSION["Authentication_Phone"] = $Phone;
		$_SESSION["Authentication_Email"] = $Email;
		$_SESSION["Authentication_Address"] = $Address;
		$_SESSION["Authentication_Zip"] = $Zip;
		$_SESSION["Authentication_State"] = $State;
		$_SESSION["Authentication_PrimaryCare"] = $PrimaryCare;
	}
	
	// Set a user as unauthorized in current session (logout)
	public static function Unauthorize() {
		// Start/load session if not
		if (session_status() == PHP_SESSION_NONE) {
			session_start();
		}
		// Remove all user parameters
		session_unset();
		$_SESSION["Authentication_isAuthorized"] = "FALSE";
	}
	
	// Hash a password(string) using SHA1
	private static function PasswordHash($Str) {
		return sha1($Str);
	}
	
	// Get PatientID
	public static function getPatientID() {
		if (self::isAuthorized()) {
			return $_SESSION["Authentication_PatientID"];
		}
		return "";
	}
	
	// Get Username
	public static function getUsername() {
		if (self::isAuthorized()) {
			return $_SESSION["Authentication_Username"];
		}
		return "";
	}
	
	// Get Password
	private static function getPassword() {
		if (self::isAuthorized()) {
			return $_SESSION["Authentication_Password"];
		}
		return "";
	}
	
	// Get FirstName
	public static function getFirstName() {
		if (self::isAuthorized()) {
			return $_SESSION["Authentication_FirstName"];
		}
		return "";
	}
	
	// Get LastName
	public static function getLastName() {
		if (self::isAuthorized()) {
			return $_SESSION["Authentication_LastName"];
		}
		return "";
	}
	
	// Get Sex
	public static function getSex() {
		if (self::isAuthorized()) {
			return $_SESSION["Authentication_Sex"];
		}
		return "";
	}
	
	// Get Age
	public static function getAge() {
		if (self::isAuthorized()) {
			return $_SESSION["Authentication_Age"];
		}
		return "";
	}
	
	// Get SSN
	public static function getSSN() {
		if (self::isAuthorized()) {
			return $_SESSION["Authentication_SSN"];
		}
		return "";
	}
	
	// Get DOB
	public static function getDOB() {
		if (self::isAuthorized()) {
			return $_SESSION["Authentication_DOB"];
		}
		return "";
	}
	
	// Get Phone
	public static function getPhone() {
		if (self::isAuthorized()) {
			return $_SESSION["Authentication_Phone"];
		}
		return "";
	}
	
	// Get Email
	public static function getEmail() {
		if (self::isAuthorized()) {
			return $_SESSION["Authentication_Email"];
		}
		return "";
	}
	
	// Get Address
	public static function getAddress() {
		if (self::isAuthorized()) {
			return $_SESSION["Authentication_Address"];
		}
		return "";
	}
	
	// Get Zip
	public static function getZip() {
		if (self::isAuthorized()) {
			return $_SESSION["Authentication_Zip"];
		}
		return "";
	}
	
	// Get State
	public static function getState() {
		if (self::isAuthorized()) {
			return $_SESSION["Authentication_State"];
		}
		return "";
	}
	
	// Get PrimaryCare
	public static function getPrimaryCare() {
		if (self::isAuthorized()) {
			return $_SESSION["Authentication_PrimaryCare"];
		}
		return "";
	}
	
	// Update Phone
	// Return true for success, false for fail
	public static function updatePhone($Phone) {
		if (self::isAuthorized()) {
			// Validity Checks
			if ($Phone == "") {
				return false;
			}
			// Create connection
			$Conn = mysqli_connect(self::$DBLink, self::$DBUsername, self::$DBPassword, self::$DBName);
			if ($Conn->connect_error) {
				$Conn->close();   // Close connection
				self::Unauthorize();
				return false;   // Cannot connect to database
			}
			// Update database
			$Username = self::getUsername();
			$Sql = $Conn->prepare("UPDATE `patient_profile` SET `phone`=? WHERE `pUsername`=?");
			$Sql->bind_param("ss", $Phone, $Username);
			$Sql->execute();
			$Conn->close();
			// Update password in session
			$_SESSION["Authentication_Phone"] = $Phone;
			return true;
		}
		return false;
	}
	
	// Update Email
	// Return true for success, false for fail
	public static function updateEmail($Email) {
		if (self::isAuthorized()) {
			// Validity Checks
			if ($Email == "") {
				return false;
			}
			// Create connection
			$Conn = mysqli_connect(self::$DBLink, self::$DBUsername, self::$DBPassword, self::$DBName);
			if ($Conn->connect_error) {
				$Conn->close();   // Close connection
				self::Unauthorize();
				return false;   // Cannot connect to database
			}
			// Update database
			$Username = self::getUsername();
			$Sql = $Conn->prepare("UPDATE `patient_profile` SET `email`=? WHERE `pUsername`=?");
			$Sql->bind_param("ss", $Email, $Username);
			$Sql->execute();
			$Conn->close();
			// Update password in session
			$_SESSION["Authentication_Email"] = $Email;
			return true;
		}
		return false;
	}
	
	// Update Address
	// Return true for success, false for fail
	public static function updateAddress($Address) {
		if (self::isAuthorized()) {
			// Validity Checks
			if ($Address == "") {
				return false;
			}
			// Create connection
			$Conn = mysqli_connect(self::$DBLink, self::$DBUsername, self::$DBPassword, self::$DBName);
			if ($Conn->connect_error) {
				$Conn->close();   // Close connection
				self::Unauthorize();
				return false;   // Cannot connect to database
			}
			// Update database
			$Username = self::getUsername();
			$Sql = $Conn->prepare("UPDATE `patient_profile` SET `address`=? WHERE `pUsername`=?");
			$Sql->bind_param("ss", $Address, $Username);
			$Sql->execute();
			$Conn->close();
			// Update password in session
			$_SESSION["Authentication_Address"] = $Address;
			return true;
		}
		return false;
	}
	
	// Update Zip
	// Return true for success, false for fail
	public static function updateZip($Zip) {
		if (self::isAuthorized()) {
			// Validity Checks
			if ($Zip == "") {
				return false;
			}
			// Create connection
			$Conn = mysqli_connect(self::$DBLink, self::$DBUsername, self::$DBPassword, self::$DBName);
			if ($Conn->connect_error) {
				$Conn->close();   // Close connection
				self::Unauthorize();
				return false;   // Cannot connect to database
			}
			// Update database
			$Username = self::getUsername();
			$Sql = $Conn->prepare("UPDATE `patient_profile` SET `zip`=? WHERE `pUsername`=?");
			$Sql->bind_param("ss", $Zip, $Username);
			$Sql->execute();
			$Conn->close();
			// Update password in session
			$_SESSION["Authentication_Zip"] = $Zip;
			return true;
		}
		return false;
	}
	
	// Update State
	// Return true for success, false for fail
	public static function updateState($State) {
		if (self::isAuthorized()) {
			// Validity Checks
			if ($State == "") {
				return false;
			}
			// Create connection
			$Conn = mysqli_connect(self::$DBLink, self::$DBUsername, self::$DBPassword, self::$DBName);
			if ($Conn->connect_error) {
				$Conn->close();   // Close connection
				self::Unauthorize();
				return false;   // Cannot connect to database
			}
			// Update database
			$Username = self::getUsername();
			$Sql = $Conn->prepare("UPDATE `patient_profile` SET `state`=? WHERE `pUsername`=?");
			$Sql->bind_param("ss", $State, $Username);
			$Sql->execute();
			$Conn->close();
			// Update password in session
			$_SESSION["Authentication_State"] = $State;
			return true;
		}
		return false;
	}
}

?>