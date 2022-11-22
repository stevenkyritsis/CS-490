<?php

$host = "sql2.njit.edu";
$user =  "sak76";
$table1  = "answers";
$table2 = "new_exam";
$table3 = "question";
$table4 = "exam_status";
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

$status_sql = "SELECT  exam_status.exam_id,
                exam_status.STATUS,
                exam_status.student_id

                 FROM $table1, $table2, $table3 
                 WHERE exam_status.examid = $exam_num
                 AND exam_status.student_id = $user
                 AND exam_status.STATUS = 'SUBMITTED'
                 ";

$answers_sql = 

$result = mysqli_query($db,$sql);

if((!$result)){
  echo mysqli_error($db);
}



?>