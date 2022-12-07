<?php 
$host = "sql2.njit.edu";
$user =  "sak76";
$table  = "exam_status";
$pwd = "##Tessy12345";
$db = mysqli_connect($host,$user, $pwd, $user);

$indata = file_get_contents('php://input');

$data = json_decode($indata);

$exam = $data->eID;
$newStatus = $data->status;
$student = $data->student;

if (mysqli_connect_errno())
  {	  
    echo "FAILED CONNECTION: " . mysqli_connect_error();
  }

mysqli_select_db($db,$table); 

if ($student == "all"){
  $sql = "UPDATE $table SET `STATUS`= '$newStatus' WHERE `exam_id`= '$exam'";
  
}


$result = mysqli_query($db,$sql);
if(!($result)){
  echo mysqli_error($db);
}
//echo $result;

mysqli_close($db);

$result_arr = array('STATUS' => $result);

echo(json_encode($result_arr));
?>