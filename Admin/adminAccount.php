<?php
//session start.....
session_start();

$server ="localhost";
$username ="root";
$password ="";
$db = "check";


$con = mysqli_connect($server,$username,$password,$db);

if($con){
   echo "datbase connect";
}
else{
    echo"no connection";
    die("no connection". mysqli_connect_error());
}


///login form process.....

if(isset($_POST['admin_name']))
{ 
// for check..............
  echo $admin_name=$_POST['admin_name']; // value get from login field..........
  echo $pass=$_POST['password']; //>>>>>>>>>>>



  //check wheather the data is match or not..............

  $query="SELECT * FROM admin WHERE name='$admin_name' AND password='$pass'";
  $res=mysqli_query($con,$query);
  $count=mysqli_num_rows($res);


// fetch the data.............

  $row=mysqli_fetch_array($res);

           if($count==1)
                 {
              // $session_id=session_id();
              // $_SESSION['auth']=$session_id;
              // $_SESSION['bookingUser_id']=$row['bookingUser_id'];
              // $_SESSION['email_id']=$row['email_id'];
              // $_SESSION['success']="You are succesfully login !!";
      $session_id=session_id();
      $_SESSION['auth']=$session_id;
      header('Location:adminPanel.php');   
     
      }
      else{


         extract($_POST);
            $rs=mysqli_query($con,"SELECT * FROM admin WHERE name='$admin_name' AND password='$pass'");
               if (mysqli_num_rows($rs)>0)
                  {
                     $_SESSION['error']="Wrong Password !! please try Again.";
                     header('Location:AdminLogin.php');
                     exit;
                  }


       $_SESSION['error']="Wrong Email id  and Password !!!";
    
      header('Location:AdminLogin.php');  
        // echo " register kare....";
      }

    }

?>
