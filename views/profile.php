<?php
/*$name = $_SESSION['fname'] . ' ' . $_SESSION['lname'];
$gender = $_SESSION['gender'];
$age = $_SESSION['age'];
$phone = $_SESSION['phone'];
$email = $_SESSION['email'];
$state = $_SESSION['state'];
$seeking = $_SESSION[''];
$interests = array_merge($_SESSION['indoor'], $_SESSION['outdoor']);
$bio = $_SESSION['bio'];
*/
?>
<!--
- Andrew Harrington
- 4/15/2019
- Profile Display Page
-->
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Profile</title>
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
            <p class="mt-3">Name: {{@SESSION.fname}} {{@SESSION.lname}}</p>
            <hr>
            <p>Gender: {{@SESSION.gender}}</p>
            <hr>
            <p>Age: {{@SESSION.age}}</p>
            <hr>
            <p>Phone: {{ $_SESSION['phone'] }}</p>
            <hr>
            <p>Email: {{ @SESSION.email }}</p>
            <hr>
            <p>State: {{ @SESSION['state'] }}</p>
            <hr>
            <p>Seeking: {{ @SESSION.seeking }}</p>
            <hr>
            <p>Interests: {{@SESSION.interests}}</p>

        </div>

        <!--Right Side-->
        <div class="col-md-6 px-3">
            <img src="images/profile-pic.png" class="img-fluid rounded profile-pic" alt="Profile Pic">
            <h4>Biography</h4>
            <p>{{@SESSION.bio}}</p>
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