<?php
include "appointments.server.php";
AppointmentsS::Page_Load();
?>

<!doctype html>
<html>
<head>
	<title><?php include('inc/title.txt');?></title>
	<meta name="description" content="<?php include('inc/meta-d.txt"');?>
	<meta name="keywords" content="">
	<meta name="viewport" content="width=device-width">
	<link rel="shortcut icon" href="images/favicon.ico" />
	<link rel="stylesheet/less" type="text/css" href="styles.less" />
	<link rel="stylesheet" type="text/css" href="styles.css" />
	<script src="inc/less-1.4.1.min.js"></script>
	<link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
	<script src="inc/openClose.js" type="text/javascript"></script>
</head>
<body>
    
<header>
    
<?php include('inc/nav.php'); ?>
 
</header>
<div id="mobile-header">
<?php include('inc/nav-mobile.php'); ?>
</div>

<div id="clear"></div>
<div id="user-wrapper">
<h1>Apointments</h1>
<div id="h1"></div>
<h2>Upcoming</h2>
<!--<h3 style="color: red;">Request appointment needed</h3>-->
<div id="inner-wrapper">

<?php echo AppointmentsS::$UpcomingAppointmentHTML; ?>

<!--
<table id="appoint" class="info1">
	<tbody>
	<tr>
		<th style="border-right: none;">Appointment</th>
		<th style="border-left: none;"></th>
	</tr>
	<tr>
		<td class="content">
		   <b>Date</b>
		</td>
		<td class="content">
		   02/20/09
		</td>
	</tr>
	<tr>
		<td class="content">
		   <b>Time</b>
		</td>
		<td class="content">
		   1 pm
		</td>
	</tr>
	<tr>
		<td class="content">
		   <b>Unit</b>
		</td>
		<td class="content">
		   Name of unit
		</td>
	</tr>
	<tr>
		<td class="content">
		   <b>Address</b>
		</td>
		<td class="content">
		   1234 happy st. ca 92056
		</td>
	
	</tr>
	<tr>
		<td class="content">
		   <b>Assigned Physician</b>
		</td>
		<td class="content">
		Dr. Terry Chan
		</td>
	
	</tr>
	<tr>
		<td class="content">
		   <b>Purpose</b>
		</td>
		<td class="content">
		   I have a condition
		</td>
	
	</tr>
	</tbody>
</table>
-->

</div>
<div id="clear1"></div>
<!--<h3 style="color: red;">We need pagination - appointment history may have multiple tables</h3>-->
<div id="block"></div>
<h2 id="hide">Appointment History</h2>

<div id="inner-wrapper">

<?php echo AppointmentsS::$HistoryAppointmentHTML; ?>

<!--
<table id="appoint" class="info1">
	<tbody>
	<tr>
		<th style="border-right: none;">Appointment</th>
		<th style="border-left: none;"></th>
	</tr>
	<tr>
		<td class="content">
		   <b>Date</b>
		</td>
		<td class="content">
		   02/20/09
		</td>
	</tr>
	<tr>
		<td class="content">
		   <b>Time</b>
		</td>
		<td class="content">
		   1 pm
		</td>
	</tr>
	<tr>
		<td class="content">
		   <b>Unit</b>
		</td>
		<td class="content">
		   Name of unit
		</td>
	</tr>
	<tr>
		<td class="content">
		   <b>Address</b>
		</td>
		<td class="content">
		   1234 happy st. ca 92056
		</td>
	
	</tr>
	<tr>
		<td class="content">
		   <b>Assigned Physician</b>
		</td>
		<td class="content">
		Dr. Terry Chan
		</td>
	
	</tr>
	<tr>
		<td class="content">
		   <b>Purpose</b>
		</td>
		<td class="content">
		   I have a condition
		</td>
	</tr>
	</tbody>
</table>
<table id="appoint" class="info1">
	<tbody>
	<tr>
		<th style="border-right: none;">Appointment</th>
		<th style="border-left: none;"></th>
	</tr>
	<tr>
		<td class="content">
		   <b>Date</b>
		</td>
		<td class="content">
		   02/20/09
		</td>
	</tr>
	<tr>
		<td class="content">
		   <b>Time</b>
		</td>
		<td class="content">
		   1 pm
		</td>
	</tr>
	<tr>
		<td class="content">
		   <b>Unit</b>
		</td>
		<td class="content">
		   Name of unit
		</td>
	</tr>
	<tr>
		<td class="content">
		   <b>Address</b>
		</td>
		<td class="content">
		   1234 happy st. ca 92056
		</td>
	
	</tr>
	<tr>
		<td class="content">
		   <b>Assigned Physician</b>
		</td>
		<td class="content">
		Dr. Terry Chan
		</td>
	
	</tr>
	<tr>
		<td class="content">
		   <b>Purpose</b>
		</td>
		<td class="content">
		   I have a condition
		</td>
	
	</tr>
	</tbody>
</table>
<table id="appoint" class="info1">
	<tbody>
	<tr>
		<th style="border-right: none;">Appointment</th>
		<th style="border-left: none;"></th>
	</tr>
	<tr>
		<td class="content">
		   <b>Date</b>
		</td>
		<td class="content">
		   11/22/99
		</td>
	</tr>
	<tr>
		<td class="content">
		   <b>Time</b>
		</td>
		<td class="content">
		   100 pm
		</td>
	</tr>
	<tr>
		<td class="content">
		   <b>Unit</b>
		</td>
		<td class="content">
		   A place on Mars
		</td>
	</tr>
	<tr>
		<td class="content">
		   <b>Address</b>
		</td>
		<td class="content">
		 123 never never land
		</td>
	
	</tr>
	<tr>
		<td class="content">
		   <b>Assigned Physician</b>
		</td>
		<td class="content">
		Dr. Terry Chan the Great
		</td>
	
	</tr>
	<tr>
		<td class="content">
		   <b>Purpose</b>
		</td>
		<td class="content">
		   Someone is going to die
		</td>
	</tr>
	</tbody>
</table>
-->
</div>
<!-- Mobile View -->

<?php echo AppointmentsS::$MobileAppointmentHTML; ?>

<!--
<table id="appoint" class="mobile">
	<tbody>
	<tr>
		<th>Appointment</th>
	</tr>
	<tr>
		<td class="content">
		   <b>Date</b>
		   02/20/09
		</td>
	</tr>
	<tr>
		<td class="content">
		   <b>Time </b>
		   1 pm
		</td>
	</tr>
	<tr>
		<td class="content">
		   <b>Unit</b>
		   Name of unit
		</td>
	</tr>
	<tr>
		<td class="content">
		   <b>Address</b>
		   1234 happy st. ca 92056
		</td>
	
	</tr>
	<tr>
		<td class="content">
		   <b>Assigned Physician</b>
		Dr. Terry Chan
		</td>
	
	</tr>
	<tr>
		<td class="content">
		   <b>Purpose</b>
		   I have a condition
		</td>
	
	</tr>
	</tbody>
</table>
-->
</div>
<div id="clear1"></div>
<div id="block"></div>
<footer>
	<?php include('inc/footer.php'); ?>
</footer>
</body>
</html>

