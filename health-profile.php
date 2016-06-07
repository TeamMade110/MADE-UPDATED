<!doctype html>
<html>
<head>


 
<title><?php include('inc/title.txt'); ?></title> 
 
<meta name="keywords" content=""> 
<meta name="description" content="" > 
            
<link rel="shortcut icon" href="images/favicon.ico" />
<link rel="stylesheet/less" type="text/css" href="styles.less" />
<link rel="stylesheet" type="text/css" href="styles.css" />
<link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
<script src="inc/less-1.4.1.min.js"></script>
<script type="text/javascript">
    function on(input) {
        input.style.backgroundPosition="top right";   
    }
    function off(input) {//clear background
        input.style.backgroundPosition="top left"; 
    }
    
</script>
</head>
<body>
       
    <header id="admin-header">
         <div id="madeDiv"></div>
    </header>
    <?php include('inc/mysql_connect.inc.php'); ?>
    <?php include('inc/nav-admin.php'); ?>

<div id="shadow1"></div>
    <section id="main-admin"><h1>New Patient</h1>
        <span id="line"></span>
    <form method="post" action="admin.php">
        <table style="width:100%">
            <input type="hidden" name="prep" value="">
             <?php
             
             if($_POST['submit'] == ' ') {
                echo '<h1>asdfasdfasddlifuhqweriufhaspoifh</h1>';
                $query = "INSERT INTO medical_record
                        SET tempature = '" . @$_POST['tempature'] . "',
                            pulse = '" . @$_POST['pulse'] . "',
                            respator '= " . @$_POST['respatory'] . "',
                            height = '" . @$_POST['height'] . "',
                            weight = '" . @$_POST['weight'] . "',
                            bmi = '" . @$_POST['bmi'] . "',
                            nutrition = '" . @$_POST['nutrition'] . "',
                            medications = '" . @$_POST['medications'] . "',
                            allergies = '" . @$_POST['allergies'] . "',
                            diseases = '" . @$_POST['diseases'] . "',
                            doctorNotes = '" . @$_POST['doctorsNotes'] . "',
                            assignedProvider = '" . @$_POST['assignedProvider'] . "',
                            smoking = '" . @$_POST['smoking'] . "',
                            alcohol = '" . @$_POST['alcohol'] . "',
                            timeStamp = '" . @$_POST['timeStamp'] . "',
                            doctorID = '" . @$_POST['doctorID'] . "',
                            pID = '" . @$_POST['pID'] . "'";
             if (!mysql_query($query)) {
                echo $query . "<br />";
                $message = "<h1 style='color: red;'>Problem with mysql query</h1>" . mysql_error() . "\n";
                echo "$message";
             }
             }
             
             if(@$_GET["prep"] == 'go') {
                    $output = '
          <tr>            
            <td><span id="name">Tempature</span><br /><input class="admin-input" onfocus="on(this)" onblur="off(this)" type="range" min="0" max="120" name="tempature" value="Temp"></td>
             <td><span id="name">Pulse</span><br /><input class="admin-input" onfocus="on(this)" onblur="off(this)" type="text" name="pulse" value="pulse"></td>
          </tr>

          <tr>
            <td><span id="name">Weight</span><br /><input class="admin-input" onfocus="on(this)" onblur="off(this)" type="text" name="weight" value="200lbs"></td>
             <td><span id="name">Height</span><br /><input class="admin-input" onfocus="on(this)" onblur="off(this)" type="text" name="height" value="6\'3\""></td>
          </tr>
          <tr>
            <td><span id="name">Respritory</span><br /><input class="admin-input" onfocus="on(this)" onblur="off(this)" type="text" name="respritory" value="respritory"></td>
             <td><span id="name">Body Mass Index</span><br /><input class="admin-input" onfocus="on(this)" onblur="off(this)" type="text" name="bmi" value="bmi"></td>
          </tr>
          <tr>
            <td><span id="name">Nutrition</span><br /><input class="admin-input" onfocus="on(this)" onblur="off(this)" type="text" name="nutrition" value="nutrition"></td>
             <td><span id="name">Medications</span><br /><input class="admin-input" onfocus="on(this)" onblur="off(this)" type="text" name="medications value="medications"></td>
          </tr>
          <tr>
            <td><span id="name">Allergies</span><br /><input class="admin-input" onfocus="on(this)" onblur="off(this)" type="text" name="allergies" value="Allergies"></td>
             <td><span id="name">Disease</span><br /><input class="admin-input" onfocus="on(this)" onblur="off(this)" type="text" name="diseases" value="Diseases"></td>
          </tr>
          <tr>
            <td><span id="name">Doctor Notes</span><br /><input class="admin-input" type="text" onfocus="on(this)" onblur="off(this)" name="doctorsNotes" value="Doctor Notes"></td>
             <td><span id="name">Assignd Provider</span><br /><input class="admin-input" onfocus="on(this)" onblur="off(this)" type="text" name="assignedProvider" value="assignedProvider"></td>
          </tr>
          <tr>
         <tr>
            <td><span id="name">Smoking</span><br /><input class="admin-input" onfocus="on(this)" onblur="off(this)" type="text" name="smoking" value="Smoking"></td>
             <td><span id="name">Alcohol Usage</span><br /><input class="admin-input" onfocus="on(this)" onblur="off(this)" type="text" name="alcohol" value="Alcohol"></td>
          </tr>             
            <td><span id="name">Time Added</span><br /><input class="admin-input" onfocus="on(this)" onblur="off(this)" type="text" name="datetime" value=" DATETIME "></td>
             <td><span id="name">p id</span><br /><input class="admin-input" onfocus="on(this)" onblur="off(this)" type="text" name="pID" value="DON\'T display pID"></td>
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
     ?>
        </table>
        <input type="hidden" name="insert" value="affirmative">
        <input type="submit" name="submit" value=" ">
    </form>
   <p style="color: #FFFFFF;">admin.php?prep=go</p>
    </section>


</body>
</html>

