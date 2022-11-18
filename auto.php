<?php

$host = "sql2.njit.edu";
$user =  "sak76";
$table1  = "answers";
$table2 = "new_exam";
$pwd = "##Tessy12345";

$db = mysqli_connect($host,$user, $pwd, $user);

$indata = file_get_contents('php://input');

$exam_num = $indata->exam_id;

if (mysqli_connect_errno())
  {	  
    echo "FAILED CONNECTION: " . mysqli_connect_error();
  }

mysqli_select_db($db,$table); 

$sql = "SELECT * FROM $table";

$result = mysqli_query($db,$sql);

if((!$result)){
  echo mysqli_error($db);
}



?>