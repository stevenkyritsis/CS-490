<?php

$host = "sql2.njit.edu";
$user =  "sak76";
$table  = "exam";
$pwd = "##Tessy12345";
$db = mysqli_connect($host,$user, $pwd, $user);

$indata = file_get_contents('php://input');

$data = json_decode($indata);

$exam_id = $data->exam_id;

if (mysqli_connect_errno())
  {	  
    echo "FAILED CONNECTION: " . mysqli_connect_error();
  }

mysqli_select_db($db,$table); 

$sql = "SELECT * FROM $table WHERE exam_id = '$exam_id'";
$result = mysqli_query ($db,$sql);

while($row = $result->fetch_assoc()) {
    $result_arr[] = array('exam_id' => $row['exam_id'],
       'q_id' => $row['question_id'],
       'grade' => $row['grade']);  
  }

mysqli_close($db);

$json = json_encode($result_arr);

echo $json;
?>