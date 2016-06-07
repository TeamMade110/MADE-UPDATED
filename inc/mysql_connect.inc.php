<?php
$myconnect = @mysql_connect('localhost','nick', 'cheese');
//$myconnect = @mysql_connect('localhost','testing', 'OCd6y.&=ybk#');
if(!$myconnect) 	{
  die('mysql cannot connect to the mysql server at this time');	
}
//le;=9TQ1oEW?
$dbConnect = @mysql_select_db('made', $myconnect);
//$dbConnect = @mysql_select_db('made', $myconnect);

if(!$dbConnect) {	
  die('mysql cannot find the wonderful happydatabase at this time' .'<hr>' . mysql_error());	
}
?>