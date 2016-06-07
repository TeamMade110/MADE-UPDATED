<?php
include "messages.server.php";
MessagesS::Page_Load();
MessagesS::FormSubmitHandler();
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

<script type="text/javascript">

	function Initialize() {
		getAllMessage();
	}

	function getAllMessage() {
		if (window.XMLHttpRequest) {
			xmlhttp = new XMLHttpRequest();
		}
		else {
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("txt_AllMessage").innerHTML = xmlhttp.responseText;
			}
		}
		xmlhttp.open("GET", "messages.ajax.php", true);
		xmlhttp.send();
		setTimeout(getAllMessage, 1000);
	}
	
</script>

<body onload="Initialize()">
    
<header>
    
<?php include('inc/nav.php'); ?>
 
</header>
<div id="mobile-header">
<?php include('inc/nav-mobile.php'); ?>
</div>

<div id="clear"></div>
<div id="user-wrapper">
<h1>Messages</h1>
<div id="h1"></div>

	<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
		<table>
			<tr>
				<td>Message Title: </td><td><input type="text" name="txt_SendMessageTitle"></td>
			</tr>
			<tr>
				<td>Message: </td><td><textarea rows="4" name="txt_SendMessageBody"></textarea></td>
			</tr>
			<tr>
				<td>To Doctor: </td><td><input type="text" name="txt_SendMessageDoctorName"></td>
			</tr>
			<tr>
				<td></td><td align="right"><input type="submit" id="SendMessageBtn" name="SendMessageBtn_Click" value=""></td>
			</tr>
			<tr>
				<td></td><td><?php echo MessagesS::$SendMessageStatus; ?></td>
			</tr>
		</table>
	</form>
	<br><br>
	<div id="txt_AllMessage"></div>

</div>
<div id="clear1"></div>
<div id="block"></div>
<footer>
	<?php include('inc/footer.php'); ?>
</footer>
</body>
</html>

