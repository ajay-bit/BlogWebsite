<?php
//session start......
include "Authen/auth.php";
?>
<?php  if(isset($_SESSION['success'])): ?>
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong><?php echo $_SESSION['success']; ?></strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">&times;</span>
  </button>
</div>
<?php endif; ?>
<?php unset($_SESSION['success']); ?>
<!-- fetch the data from session -->
<?php  if(isset($_SESSION['bookingUser_id']))  ?>
<?php   $id = $_SESSION['bookingUser_id']; ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/mystyle.css">
    <title>Profile</title>
  </head>
  <body>
    <div class="container-fluid py-0">
      <ul class="nav justify-content-end">
        <li class="nav-item">
          <a class="nav-link active text-success" href="#">Profile</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-danger" href="logout.php">Logout</a>
        </li>
        
      </ul>
      
    </div>
    <section id="hero" class="d-flex align-items-center">
      
      <div class="container">
        <div class="row">
          <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
            <?php
            $query="Select * FROM register WHERE bookingUser_id=$id";
            $res=mysqli_query($con,$query);
            $data=mysqli_fetch_array($res) 
            ?>
            <h1><span id="hello"> Hello ! <?php echo $data['name'] ?></span></h1>
            <h2 class="text-light">We are team of talanted designers.</h2>
            <h3 class="text-light">your Contact : <?php echo $data['mobile'] ?></h3>
            <h3 class="text-light">your Email : <?php echo $data['email_id'] ?> </h3>
            <!-- <h3 class="text-light">your booking :  <?php  echo $row['bookingUser_id']; ?></h3> -->
            <div class="d-lg-flex">
              <!-- <a href="blog.php  ?>" class="btn-get-started scrollto">Add Blog</a> -->
              <form action="blog.php" method="post">
                <input type="submit" value="Add Blog"  id="btn-get-started" class="btn btn-primary">
                
              </form>
            </div>
          </div>
          <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
            <img src="img/hero-img.png" class="img-fluid animated" alt="">
          </div>
        </div>
      </div>
    </section>
    
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>