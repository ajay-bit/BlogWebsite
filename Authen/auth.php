<?php

$server ="localhost";
$username ="root";
$password ="";
$db = "check";


$con = mysqli_connect($server,$username,$password,$db);

if($con){
  
}
else{
    echo"no connection";
    die("no connection". mysqli_connect_error());
}


session_start();
if(!isset($_SESSION['auth']))  // SET A SESSION ID IN AUTH.PHP........IF USER IS NOT LOGIN THEN......REDIRECT TO:-----

//if user is not login it redirect to login page because of session id() function......
{

header('Location:index.php');

}

?>