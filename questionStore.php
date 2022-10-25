<?php

$host = "sql2.njit.edu";
$user =  "sak76";
$table  = "questions";
$pwd = "##Tessy12345";

$indata = file_get_contents('php://input');
$data = json_decode($indata);

$db = mysqli_connect($host,$user, $pwd, $user);

$index = $data->qID;
$question = $data->question;
$test1 = $data->test1;
$test2 = $data->test2;
$topic = $data->topic;
$difficulty = $data->difficulty;

if (mysqli_connect_errno())
  {	  
    echo "FAILED CONNECTION: " . mysqli_connect_error();
  }

mysqli_select_db($db,$table); 

$sql = "INSERT INTO $table VALUES ('$index', '$question', '$test1', '$test2', '$topic', '$difficulty')";

$result = mysqli_query ($db,$sql);
if(!($result)){
  echo mysqli_error($db);
}
//echo $result;

mysqli_close($db);

$result_arr = array('STATUS' => $result);

echo(json_encode($result_arr));

?>