<?php

$recieved = json_decode(file_get_contents("php://input"), true);

$host = "sql1.njit.edu";
$user =  "sak76";
$table  = "users";
$pwd = "##Tessy12345";

$db = mysqli_connect($host,$user, $pwd, $table);

//$db = mysqli_connect($hostname,$user, $pwd);

if (mysqli_connect_errno())
  {	  
    echo "FAILED CONNECTION: " . mysqli_connect_error();
  }

mysqli_select_db( $db, $table ); 

$username = $_POST [ "username" ] ;
$password = $_POST [ "password" ] ;

$s = "SELECT pwd from USER INFO where USER ='$username'";
$t = mysqli_query($db,$s);
$row = mysqli_fetch_row($t);
$thepassword = $row[1];

$hash = password_hash($password, PASSWORD_DEFAULT);
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

?>