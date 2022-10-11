<?php

$data = $_POST;

$host = "sql2.njit.edu";
$user =  "sak76";
$table  = "users";
$pwd = "##Tessy12345";

$db = mysqli_connect($host,$user, $pwd, $user);

if (mysqli_connect_errno())
  {	  
    echo "FAILED CONNECTION: " . mysqli_connect_error();
  }

mysqli_select_db($db,$table); 

$username = $data['username'];
$password = $data['password'];
$sql = "SELECT * FROM 'users' WHERE UNAME = '$username' AND PASSWD = '$password'";
$result = mysqli_query ($db,$sql);

$row = mysqli_fetch_array($result);
mysqli_close($db);
if($row['PASSWD']!=NULL)
    $hash_pass = password_hash($row['PASSWD'],1);
$result_arr = array('username' => $row['UNAME'], 'password' => $hash_pass, 'role' => $row['ROLE']);
echo (json_encode($result_arr));

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