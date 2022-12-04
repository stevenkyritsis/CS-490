<?php

$host = "sql2.njit.edu";
$user =  "sak76";
$table1  = "questions";
$table2 = "answers";
$pwd = "##Tessy12345";

$db = mysqli_connect($host,$user, $pwd, $user);

$sql1 = "SELECT * FROM $table1";
$sql2 = "SELECT * FROM $table2";

$result1 = mysqli_query($db,$sql1);
$result2 = mysqli_query($db,$sql2);

if((!$result1)){
  echo mysqli_error($db);
}

$result_arr1 = [];
$result_arr2 = [];

//This while loop is for the questions table data
while($row1 = $result1->fetch_assoc()) {
    $result1_arr1[] = array('index' => $row['INDEX'],
       'question' => $row['question'],
       'test1' => $row['test1'],
       'test2' => $row['test2'],
       'test3' => $row['test3'],
       'test4' => $row['test4'],
       'test5' => $row['test5']);  
  }
  
//This while loop is for the users' answers table data
while($row2 = $result2->fetch_assoc()) {
    $result_arr2[] = array('index' => $row['INDEX'],
        'question' => $row['question'],
        'test1' => $row['test1'],
        'test2' => $row['test2'],
        'topic' => $row['topic'], 
        'difficulty' => $row['difficulty']);  
    }

?>