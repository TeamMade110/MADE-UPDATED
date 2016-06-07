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
</head>
<body>
       <h1>asdft</h1>
    <header id="admin-header">
         <div id="madeDiv"></div>
    </header>

    <?php include('inc/nav-admin.php'); ?>
    <?php
    
//$myconnect = @mysql_connect('localhost','testing', 'OCd6y.&=ybk#');
$myconnect = @mysql_connect('localhost','nick', 'cheese');
if(!$myconnect) 	{
  die('mysql cannot connect to the mysql server at this time' . mysql_error());	
}

//$dbConnect = @mysql_select_db('made_db', $myconnect);
$dbConnect = @mysql_select_db('made', $myconnect);

if(!$dbConnect) {	
  die('mysql cannot find the wonderful happydatabase at this time' .'<hr>' . mysql_error());	
}
?>

<div id="shadow1"></div>
    <section id="main-admin">
        <h1 style="color: red">Google graphs on weight, bmi, etc. changes</h1>
        <span id="line"></span>
    <form method="post"
    <?php
        if($_GET['prep'] == 'go') 
            echo 'action="health-profile.php?prep=go"';
        else
            echo 'action="health-profile.php"';
    ?>
    >
        <table style="width:100%">
            <input type="hidden" name="prep" value="">
             <?php
             
             if(isset($_POST['insert'])) {
$query = "SELECT firstName, 
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
        primaryCare FROM patient_profile WHERE patientID = 123";
             if (!$result = mysql_query($query)) {
                echo $query . "<br />";
                $message = "<h1 style='color: red;'>Problem with mysql query</h1>" . mysql_error() . "\n";
                echo "$message";
             }
             $array = mysql_fetch_array($result);
             echo '<p>' . $array['firstName'] . '</p><p>' . $array['lastName'] . '</p>';
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
            <td><span id="name">State</span><br /><input class="admin-input" onfocus="on(this)" onblur="off(this)" type="text" name="state" value="Alaska"></td>
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
          $query = "SELECT * FROM patient_profile WHERE id = 1";
     ?>
        </table>
        <input type="hidden" name="insert" value="affirmative">
        <input type="submit" name="submit" value="">
    </form>
   <p style="color: #FFFFFF;">admin.php?prep=go</p>
    </section>


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
        -->
        