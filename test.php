<?php

$frontendurl= "https://web.njit.edu/~ga288/";
//$frontendurl1= https://web.njit.edu/~sak76/
$backendurl = "https://web.njit.edu/~rpd35/";
$username = $_POST['ucid'];
$password = $_POST['password'];
$post = "user_name=$username&password=$password";
/*
//$passwordRepeat = $_POST ['pwd-repeat'];

//if (isset($POST'login submit'){
//to check if there is a actually a name attribute called login , if not user will go to the front page
//require '    ' ;

//}
//else {
*/
$send = curl_init();
curl_setopt($send, CURLOPT_URL, "https://web.njit.edu/~rpd35/backend.php%22");
curl_setopt($send, CURLOPT_POST, true);
curl_setopt($send, CURLOPT_RETURNTRANSFER,true);
curl_setopt($send, CURLOPT_HTTPHEADER, $headers);
$resp=curl_exec($send);
curl_close($send);
$jsonDecoded = json_decode($resp);
echo $jsonDecoded;
$resp=1;
echo $resp;
?>