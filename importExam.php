<?php

$host = "sql2.njit.edu";
$user =  "sak76";
$table  = "exam";
$pwd = "##Tessy12345";
$db = mysqli_connect($host,$user, $pwd, $user);

$indata = file_get_contents('php://input');

$data = json_decode($indata);

$exam_id = $data ->exam_id;
$question_id = $data->q_id;
$status = $data->status;
$grade = $data->grade;
echo $indata;
if (mysqli_connect_errno())
  {	  
    echo "FAILED CONNECTION: " . mysqli_connect_error();
  }

mysqli_select_db($db,$table); 

$sql = "INSERT INTO $table (`exam_id`, `question_id`, `status`, `grade`) VALUES ('$exam_id', '$question_id', '$status', '$grade')";

$result = mysqli_query($db,$sql);
if(!($result)){
  echo mysqli_error($db);
}

mysqli_close($db);

?>