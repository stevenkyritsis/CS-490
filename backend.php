<?php

$recieved = json_decode(file_get_contents("php://input"), true);

$host = "sql2.njit.edu";
$user =  "sak76";
$table  = "users";
$pwd = "##Tessy12345";

$db = mysqli_connect($host,$user, $pwd);

if (mysqli_connect_errno())
  {	  
    echo "FAILED CONNECTION: " . mysqli_connect_error();
  }

mysqli_select_db($db,$table); 

$username = $_POST['user'];
$password = $_POST['passwd'];

$result = mysqli_query ($db,"SELECT * FROM 'users'
	WHERE 'USER' LIKE '$username'
	AND PASSWD LIKE '$password'
	");

if ($row = mysqli_fetch_array($result)) {

  do {
    print $row["USER"];
    print (" ");
    print $row["PASSWD"];
    print("<p>");
  } while($row = mysql_fetch_array($result));
  } else {print "Sorry, no records were found!";
  }
/*
$s = "SELECT * FROM 'users' WHERE USER ='$username'";
$t = mysqli_query($db,$s);
$row = mysqli_fetch_row($t);
$thepassword = $row[1];
*/
/*
//password hash for later
$hash = password_hash($passwd, PASSWORD_DEFAULT);
if(password_verify($thepassword, $hash)){
    $response = 'true';
  }
else $response = 'false';

if ($thepassword == ""){
  $response = 'false';
}

//echo $response;

if ($response == 'true'){
	$q = "SELECT ROLE from USER INFO where USER  ='$username'";
	$w = mysqli_query($db,$q);
	$rowe = mysqli_fetch_row($w);
	$role = $rowe[2];
	echo $role;
}

mysqli_free_result($t);
mysqli_free_result($w);
mysqli_close($db);
exit();
*/
?>