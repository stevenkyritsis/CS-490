<?php

$host = "sql2.njit.edu";
$user =  "sak76";
$table  = "questions";
$pwd = "##Tessy12345";

$indata = file_get_contents('php://input');
$data = json_decode($indata);

$db = mysqli_connect($host,$user, $pwd, $user);

$index = $data->index;
$question = $data->question;
$answer = $data->answer;

if (mysqli_connect_errno())
  {	  
    echo "FAILED CONNECTION: " . mysqli_connect_error();
  }

mysqli_select_db($db,$table); 

?>