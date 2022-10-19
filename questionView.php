<?php

$host = "sql2.njit.edu";
$user =  "sak76";
$table  = "questions";
$pwd = "##Tessy12345";

$indata = file_get_contents('php://input');
$data = json_decode($indata);

$db = mysqli_connect($host,$user, $pwd, $user);

$index = $data->index;
$question = $data->question;
$answer = $data->answer;

if (mysqli_connect_errno())
  {	  
    echo "FAILED CONNECTION: " . mysqli_connect_error();
  }

mysqli_select_db($db,$table); 

$sql = "SELECT * FROM $table";

$result = mysqli_query ($db,$sql);
if(!($result)){
  echo mysqli_error($db);
}
//$row = mysqli_fetch_array($result);

while ($row = mysqli_fetch_assoc($result)) { // Important line !!! Check summary get row on array ..
  foreach ($row as $field => $value) { // I you want you can right this line like this: foreach($row as $value) {
      echo $value; // I just did not use "htmlspecialchars()" function. 
  }
}
mysqli_close($db);
//$result_arr = array('question' => $row['question'], 'answer' => $row['answer']);

//echo(json_encode($result_arr));

?>