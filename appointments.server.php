<?php

include_once "Authentication.class.php";
include_once "Appointment.class.php";

class AppointmentsS {
	
	public static $UpcomingAppointmentHTML = "<table id='appoint' class='info1'><tr><th>No Upcoming Appointment</th></tr></table>";
	public static $HistoryAppointmentHTML = "<table id='appoint' class='info1'><tr><th>No Past Appointment</th></tr></table>";
	public static $MobileAppointmentHTML = "<table id='appoint' class='mobile'><tr><th>No Upcoming Appointment</th></tr></table>";
	
	public static function Page_Load() {
		// Check Login
		if (!(Authentication::isAuthorized())) {
			header("Location: /login.php");
			exit();
		}
		// Load Appointment HTML
		for ($i = (Appointment::getCount() - 1); $i >= 0; $i--) {
			if (date("Ymd") <= Appointment::getDateX($i)) {
				if (self::$UpcomingAppointmentHTML == "<table id='appoint' class='info1'><tr><th>No Upcoming Appointment</th></tr></table>") {
					self::$UpcomingAppointmentHTML = "";
				}
				self::$UpcomingAppointmentHTML = self::$UpcomingAppointmentHTML . self::getAppointmentHTML(Appointment::getDateX($i), Appointment::getTime($i), Appointment::getLocationName($i), Appointment::getLocationAddress($i), Appointment::getDoctorName($i), Appointment::getPurpose($i));
			}
			else {
				if (self::$HistoryAppointmentHTML == "<table id='appoint' class='info1'><tr><th>No Past Appointment</th></tr></table>") {
					self::$HistoryAppointmentHTML = "";
				}
				self::$HistoryAppointmentHTML = self::$HistoryAppointmentHTML . self::getAppointmentHTML(Appointment::getDateX($i), Appointment::getTime($i), Appointment::getLocationName($i), Appointment::getLocationAddress($i), Appointment::getDoctorName($i), Appointment::getPurpose($i));
			}
		}
		// Load the First Upcoming Appointment for Mobile
		for ($i = 0; $i < Appointment::getCount(); $i++) {
			if (date("Ymd") <= Appointment::getDateX($i)) {
				self::$MobileAppointmentHTML = self::getAppointmentHTMLMobile(Appointment::getDateX($i), Appointment::getTime($i), Appointment::getLocationName($i), Appointment::getLocationAddress($i), Appointment::getDoctorName($i), Appointment::getPurpose($i));
				$i = Appointment::getCount();   // Quit loop
			}
		}
	}
	
	private static function getAppointmentHTML($Date, $Time, $Unit, $Address, $Physician, $Purpose) {
		$HTML = "<table id='appoint' class='info1'><tbody><tr><th style='border-right: none;'>Appointment</th><th style='border-left: none;'></th></tr>";
		$HTML = $HTML . "<tr><td class='content'><b>Date</b></td><td class='content'>" . $Date . "</td></tr>";
		$HTML = $HTML . "<tr><td class='content'><b>Time</b></td><td class='content'>" . $Time . "</td></tr>";
		$HTML = $HTML . "<tr><td class='content'><b>Unit</b></td><td class='content'>" . $Unit . "</td></tr>";
		$HTML = $HTML . "<tr><td class='content'><b>Address</b></td><td class='content'>" . $Address . "</td></tr>";
		$HTML = $HTML . "<tr><td class='content'><b>Assigned Physician</b></td><td class='content'>" . $Physician . "</td></tr>";
		$HTML = $HTML . "<tr><td class='content'><b>Purpose</b></td><td class='content'>" . str_replace("\n", "<br>", $Purpose) . "</td></tr>";
		$HTML = $HTML . "</tbody></table>";
		return $HTML;
	}
	
	private static function getAppointmentHTMLMobile($Date, $Time, $Unit, $Address, $Physician, $Purpose) {
		$HTML = "<table id='appoint' class='mobile'><tbody><tr><th>Appointment</th></tr>";
		$HTML = $HTML . "<tr><td class='content'><b>Date</b></td><td class='content'>" . $Date . "</td></tr>";
		$HTML = $HTML . "<tr><td class='content'><b>Time</b></td><td class='content'>" . $Time . "</td></tr>";
		$HTML = $HTML . "<tr><td class='content'><b>Unit</b></td><td class='content'>" . $Unit . "</td></tr>";
		$HTML = $HTML . "<tr><td class='content'><b>Address</b></td><td class='content'>" . $Address . "</td></tr>";
		$HTML = $HTML . "<tr><td class='content'><b>Assigned Physician</b></td><td class='content'>" . $Physician . "</td></tr>";
		$HTML = $HTML . "<tr><td class='content'><b>Purpose</b></td><td class='content'>" . str_replace("\n", "<br>", $Purpose) . "</td></tr>";
		$HTML = $HTML . "</tbody></table>";
		return $HTML;
	}
}

?>