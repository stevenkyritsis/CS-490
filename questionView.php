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

$result = mysqli_query ($db,$sql);

if((!$result)){
  echo mysqli_error($db);
}

//$row = mysqli_fetch_array($result);
$result_arr = [];
/*
while ($row = mysqli_fetch_assoc($result)) {
  foreach ($row as $field => $value) {
      $result_arr[$field] = $value; 
  }
}
*/

while($row = $result->fetch_assoc()) {
  /*if (!empty($result_arr)){
    $result_arr = array_merge($result_arr, array('index' => $row['INDEX'], 'question' => $row['question'], 'answer' => $row['answer']));
  }
  else{
    $result_arr = array('index' => $row['INDEX'], 'question' => $row['question'], 'answer' => $row['answer']);
  }*/
  $result_arr = array('index' => $row['INDEX'], 'question' => $row['question'], 'answer' => $row['answer']);
  $json = json_encode($result_arr);
  echo $json;
  
}

mysqli_close($db);

//$json = json_encode($result_arr);

//echo $json;
//$result_arr = array('question' => $row['question'], 'answer' => $row['answer']);

//echo(json_encode($result_arr));

?>