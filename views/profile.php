<?php
require ('model/functions.php');
$name = $_SESSION['fname'] . ' ' . $_SESSION['lname'];
$gender = $_SESSION['gender'];
$age = $_SESSION['age'];
$phone = $_SESSION['phone'];
$email = $_SESSION['email'];
$state = $_SESSION['state'];
$seeking = $_SESSION[''];
$interests = array_merge($_SESSION['indoor'], $_SESSION['outdoor']);
$bio = $_SESSION['bio'];
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="styles/styles.css">
</head>
<body>
<nav class="navbar navbar-light bg-light">
    <a class="navbar-brand" href="/328/dating">Latin Love</a>
</nav>
<div class="p-2 border rounded m-5">
    <div class="form-row ml-2 mt-2">
        <!--Left SIde-->
        <div class="col-md-6 h-100 border rounded">
            <p class="mt-3">Name: <?echo $name?></p>
            <hr>
            <p>Gender: <?echo $gender?></p>
            <hr>
            <p>Age: <?echo $age?></p>
            <hr>
            <p>Phone: <?echo $phone?></p>
            <hr>
            <p>Email: <?echo $email?></p>
            <hr>
            <p>State: <?echo $state?></p>
            <hr>
            <p>Seeking: <?echo $seeking?></p>
            <hr>
            <p>Interests: <?print_r($interests)?></p>

        </div>

        <!--Right Side-->
        <div class="col-md-6 px-3">
            <img src="images/profile-pic.png" class="img-fluid rounded profile-pic" alt="Profile Pic">
            <h4>Biography</h4>
            <p><?echo $bio?></p>
        </div>
    </div>

    <!--Center Button-->
    <div class="text-center">
        <button type="button" class="btn btn-primary btn-lg mt-3" id="contact">Contact Me</button>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
</body>
</html>