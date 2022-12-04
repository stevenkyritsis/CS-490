<?php

$host = "sql2.njit.edu";
$user =  "sak76";
$table1  = "answers";
$table2 = "question";
$table3 = "exam_status";
$pwd = "##Tessy12345";

$db = mysqli_connect($host,$user, $pwd, $user);

$indata = file_get_contents('php://input');

$data = json_decode($indata);

$user = $data->username;
$exam_num = $data->exam_id;
$questions[] = $data->questions;

if (mysqli_connect_errno())
  {	  
    echo "FAILED CONNECTION: " . mysqli_connect_error();
  }

mysqli_select_db($db,$table); 

$answers_sql = "SELECT $table1.student_id FROM $table1, $table2 WHERE '$table1'.exam_id = $exam_num
                        AND '$table1'.student_id = '$user'";



$result = mysqli_query($db,$sql);

if((!$result)){
  echo mysqli_error($db);
}



?>