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
$sql = "SELECT * FROM users WHERE UNAME = '$username' AND PASSWD = '$password'";
$result = mysqli_query ($db,$sql);
if(!($result)){
  echo mysqli_error($db);
}
$row = mysqli_fetch_array($result);

mysqli_close($db);
if($row['PASSWD']!=NULL)
    $hash_pass = password_hash($row['PASSWD'],1);
$result_arr = array('username' => $row['UNAME'], 'password' => $hash_pass, 'role' => $row['ROLE']);
echo (json_encode($result_arr)); 
?>