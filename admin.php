<!doctype html>
<html>
<head>


 
<title><?php include('inc/title.txt'); ?></title> 
 
<meta name="keywords" content=""> 
<meta name="description" content="" > 
            
<link rel="shortcut icon" href="images/favicon.ico" />
<link rel="stylesheet/less" type="text/css" href="styles.less" />
<link rel="stylesheet" type="text/css" href="styles.css" />
<script src="inc/less-1.4.1.min.js"></script>
<script type="text/javascript">
    function on(input) {
        input.style.backgroundPosition="top right";   
    }
    function off(input) {//clear background
        input.style.backgroundPosition="top left"; 
    }
    
</script>
<link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
</head>
<body id="admin">
       
    <header id="admin-header">
         <div id="madeDiv"></div>
    </header>
    <?php include('inc/mysql_connect.inc.php'); ?>
    <div id="wrapper">
    <?php include('inc/nav-admin.php'); ?>


<div id="shadow1"></div>
    <section id="main-admin"><h1>New Patient</h1>
        <span id="line"></span>
    <form method="post"
    <?php
        if(@$_GET['prep'] == 'go') 
            echo 'action="health-profile.php?prep=go"';
        else
            echo 'action="health-profile.php"';
    ?>>
        <table style="width:100%">
            <input type="hidden" name="prep" value="">
             <?php
             //strip_tags
             //htmlspecialchars
             //mysql_real_escape_string
             if(isset($_POST['insert'])) {
                $query = "INSERT INTO patientprofile
                SET firstName = '" . $_POST['first-name'] . "',
                    lastName = '" . $_POST['last-name'] . "',
                    age = '" . $_POST['age'] . "',
                    sex = '" . $_POST['sex'] . "',
                    phone = '" . $_POST['phone'] . "',
                    email = '" . $_POST['email'] . "',
                    address = '" . $_POST['address'] . "',
                    zip = '" . $_POST['zip-code'] . "',
                    state = '"  . $_POST['state'] . "',
                    ssn = '"  . $_POST['ssn'] . "',
                    birthday = '" . $_POST['birthday'] . "',
                    primary = '" . $_POST['primary'] . "',
                    pUsername = '" . $_POST['username'] . "'
                    ";
             if (!mysql_query($query)) {
                echo $query . "<br />";
                $message = "<h1 style='color: red;'>Problem with mysql query</h1>" . mysql_error() . "\n";
                echo "$message";
             }
             }
             
             if(@$_GET["prep"] == 'go') {
                    $output = '
          <tr>            
            <td><span id="name">First Name</span><br /><input class="admin-input" onfocus="on(this)" onblur="off(this)" type="text" name="first-name" value="Jacob"></td>
             <td><span id="name">Last Name</span><br /><input class="admin-input" onfocus="on(this)" onblur="off(this)" type="text" name="last-name" value="Marley"></td>
          </tr>

          <tr>
            <td><span id="name">Age</span><br /><input class="admin-input" onfocus="on(this)" onblur="off(this)" type="text" name="age" value="67"></td>
             <td><span id="name">Sex</span><br /><input class="admin-input" onfocus="on(this)" onblur="off(this)" type="text" name="sex" value="male"></td>
          </tr>
          <tr>
            <td><span id="name">Phone</span><br /><input class="admin-input" onfocus="on(this)" onblur="off(this)" type="text" name="phone" value="760-564-9987"></td>
             <td><span id="name">Email</span><br /><input class="admin-input" onfocus="on(this)" onblur="off(this)" type="text" name="email" value="jmarley/@ghosts.com"></td>
          </tr>
          <tr>
            <td><span id="name">Address</span><br /><input class="admin-input" onfocus="on(this)" onblur="off(this)" type="text" name="address" value="224 Bakers street"></td>
             <td><span id="name">Zip Code</span><br /><input class="admin-input" onfocus="on(this)" onblur="off(this)" type="text" name="zip-code" value="92037"></td>
          </tr>
          <tr>
            <td><span id="name">State</span><br />
            <input class="admin-input" type="text" name="state" value="Alaska"></td>
             <td><span id="name">SSN</span><br /><input class="admin-input" onfocus="on(this)" onblur="off(this)" type="text" name="ssn" value="111223333"></td>
          </tr>
          <tr>
            <td><span id="name">Birthday</span><br /><input class="admin-input" type="text" onfocus="on(this)" onblur="off(this)" name="birthday" value="01/02/1887"></td>
             <td><span id="name">Primary Care Unit</span><br /><input class="admin-input" onfocus="on(this)" onblur="off(this)" type="text" name="primary" value="Kaiser Permanente La Jolla"></td>
          </tr>
          <tr>
              
            <td><span id="name">Username</span><br /><input class="admin-input" onfocus="on(this)" onblur="off(this)" type="text" name="username" value="ghost"></td>
             <td><span id="name">Password</span><br /><input class="admin-input" onfocus="on(this)" onblur="off(this)" type="text" name="password" value="12345"></td>
          </tr>
          ';
          }
          else {
            $output = '
          <tr>            
            <td><span id="name">First Name</span><br /><input class="admin-input" onfocus="on(this)" onblur="off(this)" type="text" name="first-name" value=""></td>
             <td><span id="name">Last Name</span><br /><input class="admin-input" onfocus="on(this)" onblur="off(this)" type="text" name="last-name" value=""></td>
          </tr>

          <tr>
            <td><span id="name">Age</span><br /><input class="admin-input" onfocus="on(this)" onblur="off(this)" type="text" name="age" value=""></td>
             <td><span id="name">Sex</span><br /><input class="admin-input" onfocus="on(this)" onblur="off(this)" type="text" name="sex" value=""></td>
          </tr>
          <tr>
            <td><span id="name">Phone</span><br /><input class="admin-input" onfocus="on(this)" onblur="off(this)" type="text" name="phone" value=""></td>
             <td><span id="name">Email</span><br /><input class="admin-input" onfocus="on(this)" onblur="off(this)" type="text" name="email" value=""></td>
          </tr>
          <tr>
            <td><span id="name">Address</span><br /><input class="admin-input" onfocus="on(this)" onblur="off(this)" type="text" name="address" value=""></td>
             <td><span id="name">Zip Code</span><br /><input class="admin-input" onfocus="on(this)" onblur="off(this)" type="text" name="zip-code" value=""></td>
          </tr>
          <tr>
            <td><span id="name">State</span><br /><input class="admin-input" onfocus="on(this)" onblur="off(this)" type="text" name="state" value=""></td>
             <td><span id="name">SSN</span><br /><input class="admin-input" onfocus="on(this)" onblur="off(this)" type="text" name="ssn" value=""></td>
          </tr>
          <tr>
            <td><span id="name">Birthday</span><br /><input class="admin-input" type="text" onfocus="on(this)" onblur="off(this)" name="birthday" value=""></td>
             <td><span id="name">Primary Care Unit</span><br /><input class="admin-input" onfocus="on(this)" onblur="off(this)" type="text" name="primary" value=""></td>
          </tr>
          <tr>
              
            <td><span id="name">Username</span><br /><input class="admin-input" onfocus="on(this)" onblur="off(this)" type="text" name="username" value=""></td>
             <td><span id="name">Password</span><br /><input class="admin-input" onfocus="on(this)" onblur="off(this)" type="text" name="password" value=""></td>
          </tr>
          ';
          }
          echo $output;
          //testing query
          $query = "SELECT * FROM patient_profile WHERE id = 1";?>
        </table>
        <input type="hidden" name="insert" value="affirmative">
        <input type="submit" name="submit" value="">
    </form>
   <p style="color: #FFFFFF;">admin.php?prep=go</p>
    </section>
</div>

</body>
</html>
<!--
 SELECT firstName, 
        lastName, 
        sex, 
        age, 
        ssn, 
        phone, 
        email, 
        address, 
        zip, 
        state, 
        pUsername, 
        password, 
        primaryCare FROM patient_profile WHERE patientID = 123
        
    user pass: OCd6y.&=ybk#
    username: made_testing
                   <select name="state" class="admin-input">
            ';
            foreach($states as $key => $value) {
                $output .= "\t\t<option value=" . $key . ">" . $value . "</option>\r\n";  
            }
            
            
     $output .='</select></td>
       
        -->
        