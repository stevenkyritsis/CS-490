<?php 
$host = "sql2.njit.edu";
$user =  "sak76";
$table  = "exam_status";
$pwd = "##Tessy12345";
$db = mysqli_connect($host,$user, $pwd, $user);

$indata = file_get_contents('php://input');

$data = json_decode($indata);

$exam = $data->exam;
$newStatus = $data->status;

if (mysqli_connect_errno())
  {	  
    echo "FAILED CONNECTION: " . mysqli_connect_error();
  }

mysqli_select_db($db,$table); 

$sql = "UPDATE $table WHERE ";
?>