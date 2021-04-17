<?php

 session_start();
?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <title>Contact Us</title>

</head>

<style>
    body {
        background-image: url("image/background-3.jpg");
        /*background-color: #cccccc;*/
    }

    .card {
        border: 2px solid black;
        border-radius: 25px 75px;
        box-shadow: 5px 10px black;
    }
</style>

<body>
    <?php


   include "navbar.php";


      ?>

    <div class="container">

        <div class="col-md-8 offset-md-2 my-3">

            <div class="card">
                <div class="card-body">
                    <form action="contactSubmit.php" method="post">

                        <div class="form-group">
                            <label for="user_name"> <i class="fa fa-book mr-1" aria-hidden="true"></i> User Name</label>
                            <input name="user_name" type="text" class="form-control" id="user_name"
                             name="user_name"   aria-describedby="emailHelp" placeholder="Enter name">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1"> <i class="fa fa-reply mr-1" aria-hidden="true"></i> Email
                                address</label>
                            <input name="email" type="email" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" placeholder="Enter email">
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                                else.</small>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlTextarea1"> <i class="fa fa-user mr-1"
                                    aria-hidden="true"></i>About your-self</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" name="message" rows="2"></textarea>
                        </div>

                        <br>

                        <div class="text-center">
                            <button id="sumbimt-btn" value="submit" type="submit" class="btn btn-primary mx-5 ">Submit</button>
                            <button id="sumbimt-btn" type="reset" class="btn btn-danger mx-5">Reset</button>
                        </div>
                    </form>

                    <!-- footer -->
                    <hr>


                    <footer class="container">
                        <p class="float-right"><a href="#"></a></p>
                        <p class="text-center">© 2020 Company, Inc. · <a href="TermAndPrivacy.html">Privacy</a> · <a href="TermAndPrivacy.html">Terms</a>
                        </p>
                    </footer>

                    <!-- Optional JavaScript -->
                    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
                    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
                        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
                        crossorigin="anonymous"></script>
                    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
                        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
                        crossorigin="anonymous"></script>
                    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
                        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
                        crossorigin="anonymous"></script>
</body>

</html>