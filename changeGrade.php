<?php
$host = "sql2.njit.edu";
$user =  "sak76";
$table  = "answers";
$pwd = "##Tessy12345";
$db = mysqli_connect($host,$user, $pwd, $user);

$indata = file_get_contents('php://input');

$data = json_decode($indata);

$newGrade = $data->grade;
$index = $data->index;
$student = $data->student_id;

$sql = "UPDATE $table SET `grade`= $newGrade WHERE `INDEX`= '$index' AND `student_id`= '$student'";

//Query 
$result = mysqli_query($db,$sqlUpdate);
if(!($result)){
    echo mysqli_error($db);
}

mysqli_close($db);

echo json_encode($result);
?>