<?php
include "medical-records.server.php";
MedicalRecordsS::Page_Load();
MedicalRecordsS::FormSubmitHandler();
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
<h1>Medical Records</h1>
<div id="h1"></div>
<!--<h3 style="color: red;">We need pagination here and at the bottom for multiple records</h3>-->

<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
	<input type="submit" id="next" name="NextRecordBtn_Click" value=""> <input type="submit" id="previous" name="PreviousRecordBtn_Click" value="">
</form>

<h2>Record Date: <?php echo MedicalRecordsS::$TimeStamp; ?></h2>
<table id="info">
	<tbody>
	<tr>
		<th>Temperature</th>
		<th>Pulse</th>
		<th>Respiratory</th>
		<th>Height</th>
		<th>Weight</th>
		<th>Body Mass Index</th>
		<th>Nutrition</th>
		<th>Assigned Provider</th>
		<th>Time of Visit</th>
	</tr>
	<tr>            
        <td class="content"><?php echo MedicalRecordsS::$Temperature; ?></td>
		<td class="content"><?php echo MedicalRecordsS::$Pulse; ?></td>
		<td class="content"><?php echo MedicalRecordsS::$Respiratory; ?></td>
		<td class="content"><?php echo MedicalRecordsS::$Height; ?></td>
		<td class="content"><?php echo MedicalRecordsS::$Weight; ?></td>
		<td class="content"><?php echo MedicalRecordsS::$BMI; ?></td>
		<td class="content"><?php echo MedicalRecordsS::$Nutrition; ?></td>
		<td class="content"><?php echo MedicalRecordsS::$AssignedProvider; ?></td>
		<td class="content"><?php echo MedicalRecordsS::$TimeStamp; ?></td>
    </tr>
	</tbody>
</table>
<table class="info1" id="med">
	<tbody>
	<tr><!-- all medications link to drugs.com/somemed -->	
		<th>Medications</th>
	</tr>
	<?php echo MedicalRecordsS::$MedicationHTML; ?>
	<!--<tr>
		<td class="content">stuff</td>
	</tr>
	<tr>
		<td class="content">more of the same</td>
	</tr>
	<tr>
		<td class="content">Cheese</td>
	</tr>
	<tr>
		<td class="content">Crackers</td>
	</tr>-->
	</tbody>
</table>
<table class="info1" id="aller">
	<tbody>
	<tr>
		<th>Allergies</th>
    </tr>
	<?php echo MedicalRecordsS::$AllergiesHTML; ?>
	<!--<tr>
		<td class="content">allergy 1</td>
	</tr>
	<tr>
		<td class="content">allergy 2</td>
	</tr>
	<tr>
		<td class="content">allergy 3</td>
	</tr>-->
	</tbody>
</table>
<table id="dis" class="info1">
	<tbody><!-- http://www.cdc.gov/arthritis/ -->
	<tr>
		<th>Diseases</th>
	</tr>
	<?php echo MedicalRecordsS::$DiseasesHTML; ?>
	<!--<tr>
	    <td class="content">stuff</td>
	</tr>
	<tr>
		<td class="content">Pain</td>
	</tr>-->
	</tbody>
</table>
<table id="smoke" class="info1">
	<tbody>
	<tr>
		<th>Smoking</th>
	</tr>
	<tr>
		<td class="content"><?php echo MedicalRecordsS::$Smoking; ?></td>
	</tr>
	</tbody>
</table>
<table id="alcho" class="info1">
	<tbody>
	<tr>
		<th>Alcohol</th>
	</tr>
	<tr>            
        <td class="content"><?php echo MedicalRecordsS::$Alcohol; ?></td>
	</tr>
	</tbody>
</table>
<div id="clear"></div>
<table id="doctor" class="info1">
	<tbody>
	<tr>
		<th id="doctor">Doctor's Notes</th>
	</tr>
	<tr>
		<td id="doctor" class="content"><?php echo MedicalRecordsS::$DoctorsNotes; ?></td>
    </tr>
	</tbody>
</table>
        <!--------------------- mobile devices ----------------->

<table class="mobile">
	<tbody>
	<tr>
		<th>Temperature</th>
	</tr>
	<tr>            
        <td class="content"><?php echo MedicalRecordsS::$Temperature; ?></td>
        </tr>
	<tr>
		<th>Pulse</th>
	</tr>
	<tr>            
        <td class="content"><?php echo MedicalRecordsS::$Pulse; ?></td>
    </tr>
	<tr>
		<th>Respiratory</th>
	</tr>
	<tr>            
        <td class="content"><?php echo MedicalRecordsS::$Respiratory; ?></td>
    </tr>
	<tr>
		<th>Height</th>
	</tr>
	<tr>            
        <td class="content"><?php echo MedicalRecordsS::$Height; ?></td>
    </tr>
	<tr>
		<th>Weight</th>
	</tr>
	<tr>            
        <td class="content"><?php echo MedicalRecordsS::$Weight; ?></td>
    </tr>
	<tr>
		<th>Body Mass Index</th>
	</tr>
	<tr>            
        <td class="content"><?php echo MedicalRecordsS::$BMI; ?></td>
    </tr>
	<tr>
		<th>Nutrition</th>
	</tr>
	<tr>            
        <td class="content"><?php echo MedicalRecordsS::$Nutrition; ?></td>
    </tr>
	<tr>
		<th>Assigned Provider</th>
	</tr>
	<tr>            
        <td class="content"><?php echo MedicalRecordsS::$AssignedProvider; ?></td>
    </tr>
	<tr>
		<th>Date of Visit</th>
	</tr>
	<tr>            
        <td class="content"><?php echo MedicalRecordsS::$TimeStamp; ?></td>
    </tr>
	</tbody>
</table>
<table class="mobile">
	<tbody>
	<tr>
		<th>Alcohol</th>
	</tr>
	<tr>
		<td class="content"><?php echo MedicalRecordsS::$Alcohol; ?></td>
	</tr>
	<tr>
		<th>Smoking</th>
	</tr>
	<tr>
		<td><?php echo MedicalRecordsS::$Smoking; ?></td>
	</tr>
	<tr>
		<th>Medication</th>
	</tr>
	<?php echo MedicalRecordsS::$MedicationHTML; ?>
	<tr>
		<th>Alergies</th>
	</tr>
	<?php echo MedicalRecordsS::$AllergiesHTML; ?>
	<tr>
		<th>Doctor's Notes</th>
	</tr>
	<tr>
		<td class="content"><?php echo MedicalRecordsS::$DoctorsNotes; ?></td>
	</tr>
	</tbody>
</table>

</div>

<div id="clear1"></div>
<!--<h3 style="color: red;">We need pagination down here for multiple records</h3>-->
<!--<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
	<input type="submit" id="previous" name="PreviousRecordBtn_Click" value=""> <input type="submit" id="next" name="NextRecordBtn_Click" value="">
</form>-->
<div id="block"></div>
<footer>
	<?php include('inc/footer.php'); ?>
</footer>
</body>
</html>

