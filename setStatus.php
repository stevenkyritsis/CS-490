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

//mysqli_select_db($db,$table);
mysqli_select_db($db,"users");

if ($student == "all"){

  $getStudents_sql = "SELECT * FROM `users` WHERE `ROLE`= 'STUDENT'";
  $result = mysqli_query($db,$getStudents_sql);
  if(!($result)){
    echo mysqli_error($db);
  }

  while($row = $result->fetch_assoc()) {
  $result_arr[] = array('student_id' => $row['UNAME']);
  }

  $i = 0;
  
  while($i < count($result_arr)){
    $sID = $result_arr[$i]->student_id;
    $newStatus_sql = "INSERT INTO $table (exam_id,student_id,grade) VALUES('$exam', '$sID', 0)";
    
    $result_new = mysqli_query($db,$getStudents_sql);
    if(!($result_new)){
      echo mysqli_error($db);
    }
    
    $i = $i + 1;
  }

}

/*$sqlUpdate = "UPDATE $table SET `STATUS`= '$newStatus' WHERE `exam_id`= '$exam'";

$result = mysqli_query($db,$sql);
if(!($result)){
  echo mysqli_error($db);
}*/
echo json_encode($result_arr);
echo count($result_arr);
mysqli_close($db);
/*
$result_arr = array('STATUS' => $result);

echo(json_encode($result_arr));
*/?>