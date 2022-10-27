<?php

$host = "sql2.njit.edu";
$user =  "sak76";
$table  = "answers";
$pwd = "##Tessy12345";

$indata = file_get_contents('php://input');
$data = json_decode($indata);

$db = mysqli_connect($host,$user, $pwd, $user);

$exam_id = $data->eID;
$question_id = $data->qID;
$answer = $data->answer;
$student_id = $data->stuID;

if (mysqli_connect_errno())
  {	  
    echo "FAILED CONNECTION: " . mysqli_connect_error();
  }

mysqli_select_db($db,$table); 

$sql = "INSERT INTO $table (`exam_id`, `question_id`, `answer`, `student_id`) VALUES ('$exam_id', '$question_id', '$answer', '$student_id')";

$result = mysqli_query($db,$sql);
if(!($result)){
  echo mysqli_error($db);
}
//echo $result;

mysqli_close($db);

$result_arr = array('STATUS' => $result);

echo(json_encode($result_arr));

?>