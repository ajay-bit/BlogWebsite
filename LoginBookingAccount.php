<?php

//session start.....
session_start();


$server ="localhost";
$username ="root";
$password ="";
$db = "check";


$con = mysqli_connect($server,$username,$password,$db);

if($con){
    echo"Sucessfully established...............";
}
else{
    echo"no connection";
    die("no connection". mysqli_connect_error());

}
///login form process.....

if(isset($_POST['email']))
{ 
// for check..............
  echo  $email=$_POST['email']; // value get from login field..........
  echo $pass=$_POST['password']; //>>>>>>>>>>>



  //check wheather the data is match or not..............

  $query="SELECT * FROM register WHERE email_id='$email' AND password='$pass'";
  $res=mysqli_query($con,$query);
  $count=mysqli_num_rows($res);




// fetch the data.............

  $row=mysqli_fetch_array($res);

           if($count==1)
                 {
              $session_id=session_id();
              $_SESSION['auth']=$session_id;
              $_SESSION['bookingUser_id']=$row['bookingUser_id'];
              $_SESSION['email_id']=$row['email_id'];
              $_SESSION['success']="You are succesfully login !!";
    
      header('Location:profile.php');   
     
      }
      else{


         extract($_POST);
            $rs=mysqli_query($con,"SELECT * FROM `register` WHERE `register`.`email_id`='$email'");
               if (mysqli_num_rows($rs)>0)
                  {
                     $_SESSION['error']="Wrong Password !! please try Again.";
                     header('Location:bookingLogin.php');
                     exit;
                  }


       $_SESSION['error']="Wrong Email id  and Password !!! Please register";
    
      header('Location:index.php');  
        // echo " register kare....";
      }

    }
?>