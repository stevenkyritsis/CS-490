<?php

$host = "sql2.njit.edu";
$user =  "sak76";
$table  = "questions";
$pwd = "##Tessy12345";

$db = mysqli_connect($host,$user, $pwd, $user);

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

//$row = mysqli_fetch_array($result);
$result_arr = [];

while($row = $result->fetch_assoc()) {
  $result_arr[] = array('index' => $row['INDEX'],
     'question' => $row['question'],
     'test1' => $row['test1'],
     'test2' => $row['test2'],
     'topic' => $row['topic'], 
     'difficulty' => $row['difficulty']);  
}

$json = json_encode($result_arr);

echo $json;

mysqli_close($db);
?>