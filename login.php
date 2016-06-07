<?php
include "login.server.php";
LoginS::Page_Load();
LoginS::FormSubmitHandler();
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
	<link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
	<script src="inc/less-1.4.1.min.js"></script>
	<script src="inc/openClose.js" type="text/javascript"></script>
</head>
<body>
    
    <div id="login">
    

<div id="login-header">
	<!--<div id="push-login"></div>-->

	<div id="login-wrap">
	<img id="title" src="images/user-login-title.jpg">
	<div id="clear1"></div>
		<div id="top-border">
			<img id="top-left" src="images/top-left.jpg">
			<img id="top-right" src="images/top-right.jpg">		
		</div>
		<div id="login-box">

			<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
				<span>USER NAME</span>
				<div id="input-wrapper">
				<span id="input-left"></span>
					<input id="login-username" type="text" name="txt_Username" value="">
				<span id="input-right"></span>
				</div>
				<span style="margin-top: 1px;">PASSWORD</span>
				<div id="input-wrapper" style="background: none !important;">
					<div id="input-wrapper2">
						<span id="input-left"></span>
						<input id="login-password" type="text" name="txt_Password" value="">
						<span id="input-right"></span>
					</div>
					<input style="display: block;" id="login-submit" type="submit" name="LoginBtn_Click" value="">
				</div>
			</form>
			<br><br>
			<b><?php echo LoginS::$Authorized; ?></b><br>
			<a href="ForgetPassword.php"><b>Forget Password</b></a>
			
			<input type="hidden" name="engage" value="true">
		</div>
		<div id="bottom-border">
			<img id="bottom-left" src="images/bottom-left.jpg">
			<img id="bottom-right" src="images/bottom-right.jpg">
		</div>
	</div>
</div>
 <div id="clear"></div>
</div>



<div id="user-wrapper">
<div id="cta">	
</div>
<p id="login-p">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec fringilla, sem tristique convallis hendrerit, purus ex volutpat nisl, non laoreet tortor est eu nunc. Donec mollis venenatis turpis, luctus ornare nulla tempus vitae. Aliquam ut elit erat. Duis mattis tortor a dignissim vulputate. Duis consequat lectus vel augue ultrices, condimentum dapibus quam luctus.</p>

</div>
<div id="clear1"></div>
<div id="block"></div>

<footer>
	<?php include('inc/footer.php'); ?>
</footer>
</body>
</html>

