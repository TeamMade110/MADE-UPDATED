<?php
include "personal-profile.server.php";
PersonalProfileS::Page_Load();
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
<h1>Your Acccount Information</h1>
<div id="h1"></div>
<table id="prof" class="info1">
	<tbody>
	<tr>
		<th style="border-right: none;">Profile Info</th>
		<th style="
		padding-right: 20px;
		border-left: none;
		text-align: right;
		"><i><a href="UpdateProfile.php">Edit / Change</a></i></th>
	</tr>
	<tr>
		<td class="content">
		   <b>First Name</b>
		</td>
		<td class="content"><?php echo PersonalProfileS::$FirstName; ?></td>
	</tr>
	<tr>
		<td class="content">
		   <b>Last Name</b>
		</td>
		<td class="content"><?php echo PersonalProfileS::$LastName; ?></td>
	</tr>
	<tr>
		<td class="content">
		   <b>Sex</b>
		</td>
		<td class="content"><?php echo PersonalProfileS::$Sex; ?></td>
	</tr>
	<tr>
		<td class="content">
		   <b>Age</b>
		</td>
		<td class="content"><?php echo PersonalProfileS::$Age; ?></td>
	</tr>
	<tr>
		<td class="content">
		   <b>SSN</b>
		</td>
		<td class="content"><?php echo PersonalProfileS::$SSN; ?></td>
	</tr>
	<tr>
		<td class="content">
		   <b>Date of Birth</b>
		</td>
		<td class="content"><?php echo PersonalProfileS::$DOB; ?></td>
	</tr>
	<tr>
		<td class="content">
		   <b>Phone</b>
		</td>
		<td class="content"><?php echo PersonalProfileS::$Phone; ?></td>
	</tr>
	<tr>
		<td class="content">
		   <b>Email</b>
		</td>
		<td class="content"><?php echo PersonalProfileS::$Email; ?></td>
	</tr>
	<tr>
		<td class="content">
		   <b>Address</b>
		</td>
		<td class="content"><?php echo PersonalProfileS::$Address; ?></td>
	</tr>
	<tr>
		<td class="content">
		   <b>User Name</b>
		</td>
		<td class="content"><?php echo PersonalProfileS::$Username; ?></td>
	</tr>
	</tbody>
</table>
<table class="info1">
	<tbody>
	<tr>
		<th style="border-right: none;">Primary Care Unit</th>
		<th style="border-left: none;"></th>
	</tr>
	<tr>
		<td class="content">
		   <b>Name</b>
		</td>
		<td class="content"><?php echo PersonalProfileS::$PrimaryCareName; ?></td>
	</tr>
	<tr>
		<td class="content">
		   <b>Address</b>
		</td>
		<td class="content"><?php echo PersonalProfileS::$PrimaryCareAddress; ?></td>
	</tr>
	<tr>
		<td class="content">
		   <b>State</b>
		</td>
		<td class="content"><?php echo PersonalProfileS::$PrimaryCareState; ?></td>
	</tr>
	<tr>
		<td class="content">
		   <b>Phone</b>
		</td>
		<td class="content"><?php echo PersonalProfileS::$PrimaryCarePhone; ?></td>
	
	</tr>
	<tr>
		<td class="content">
		   <b>Hours</b>
		</td>
		<td class="content"><?php echo PersonalProfileS::$PrimaryCareHour; ?></td>
	
	</tr>
	</tbody>
</table>
<!------------------------ Mobile ---------------------->
<table class="mobile">
	<tbody>
	<tr>
		<th style="border-right: none;">Profile Info<i><a style="float: right;" href="UpdateProfile.php">Edit / Change</a></i></th>
	</tr>
	<tr>
		<td class="content">
		   <b>First Name - </b>
		   <?php echo PersonalProfileS::$FirstName; ?>
		</td>
	</tr>
	<tr>
		<td class="content">
		   <b>Last Name</b>
		   <?php echo PersonalProfileS::$LastName; ?>
		</td>
	</tr>
	<tr>
		<td class="content">
		   <b>Sex</b>
		   <?php echo PersonalProfileS::$Sex; ?>
		</td>
	</tr>
	<tr>
		<td class="content">
		   <b>Age</b>
		   <?php echo PersonalProfileS::$Age; ?>
		</td>
	</tr>
	<tr>
		<td class="content">
		   <b>SSN</b>
		   <?php echo PersonalProfileS::$SSN; ?>
		</td>
	</tr>
	<tr>
		<td class="content">
		   <b>Date of Birth</b>
		   <?php echo PersonalProfileS::$DOB; ?>
		</td>
	</tr>
	<tr>
		<td class="content">
		   <b>Phone</b>
		   <?php echo PersonalProfileS::$Phone; ?>
		</td>
	</tr>
	<tr>
		<td class="content">
		   <b>Email</b>
		   <?php echo PersonalProfileS::$Email; ?>
		</td>
	</tr>
	<tr>
		<td class="content">
		   <b>Address</b>
		   <?php echo PersonalProfileS::$Address; ?>
		</td>
	</tr>
	<tr>
		<td class="content">
		   <b>User Name</b>
		   <?php echo PersonalProfileS::$Username; ?>
		</td>
	</tr>
	</tbody>
</table>
<table class="mobile">
	<tbody>
	<tr>
		<th>Primary Care Unit</th>
		
	</tr>
	<tr>
		<td class="content">
		   <b>Name</b>
		   <?php echo PersonalProfileS::$PrimaryCareName; ?>
		</td>
	</tr>
	<tr>
		<td class="content">
		   <b>Address</b>
		   <?php echo PersonalProfileS::$PrimaryCareAddress; ?>
		</td>
	</tr>
	<tr>
		<td class="content">
		   <b>State</b>
		   <?php echo PersonalProfileS::$PrimaryCareState; ?>
		</td>
	</tr>
	<tr>
		<td class="content">
		   <b>Phone</b>
		   <?php echo PersonalProfileS::$PrimaryCarePhone; ?>
		</td>
	
	</tr>
	<tr>
		<td class="content">
		   <b>Hours</b>
		   <?php echo PersonalProfileS::$PrimaryCareHour; ?>
		</td>
	
	</tr>
	</tbody>
</table>


</div>
<div id="clear1"></div>
<div id="block"></div>
<footer>
	<?php include('inc/footer.php'); ?>
</footer>
</body>
</html>

