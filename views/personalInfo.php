<?php
    session_start();
    $errors = array();
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        //validate
        $errorFound = false;
        //fname
        if(empty($_POST['fname'])){
            $errorFound = true;
            //display appropriate error
            array_push($errors, 'You need to enter your first name<br>');
        }
        //lname
        if(empty($_POST['lname'])){
            $errorFound = true;
            //display appropriate error
            array_push($errors, 'You need to enter your last name<br>');
        }
        //age
        if(empty($_POST['age'])){
            $errorFound = true;
            //display appropriate error
            array_push($errors, 'You need to enter your age<br>');
        }
        //phone
        if(empty($_POST['phone'])){
            $errorFound = true;
            //display appropriate error
            array_push($errors, 'You need to enter your phone number<br>');
        }
        if(!$errorFound){
            //store to session
            $_SESSION['fname'] = $_POST['fname'];
            $_SESSION['lname'] = $_POST['lname'];
            $_SESSION['age'] = $_POST['age'];
            $gender = $_POST['gender'];
            if($gender['0'] == 'M'){
                $_SESSION['gender'] = 'M';
            }
            else{
                $_SESSION['gender'] = 'F';
            }
            $_SESSION['phone'] = $_POST['phone'];
            //redirect

            //EESA BROKEE
            header("Location: profileEntry");
        }
    }
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
    <link rel="stylesheet" type="text/css" href="../styles/styles.css">
    <title>Personal Info Form</title>
</head>
<body>
<nav class="navbar navbar-light bg-light">
    <a class="navbar-brand" href="328/dating">Latin Love</a>
</nav>
<div>
    <p><?
        foreach ($errors as $key=>$value){
            echo "$value <br>";
        }
        ?></p>
</div>
<div class="p-2 border rounded m-5">
    <form method="POST" action="personalInfo">
        <div class="form-row">
            <h1 class="border-bottom col">Personal Information</h1>
        </div>
        <div class="form-row">
            <div class="col-md-8 h-100">
                <!--String Fields -->
                <div class="form-group">
                    <label class="font-weight-bold" for="fname">First Name</label>
                    <input type="text" class="form-control" id="fname" name="fname" placeholder="Enter Your First Name Here">
                </div>

                <div class="form-group">
                    <label class="font-weight-bold" for="lname">Last Name</label>
                    <input type="text" class="form-control" id="lname" name="lname" placeholder="Enter Your Last Name Here">
                </div>

                <!-- Age field -->
                <div class="form-group">
                    <label class="font-weight-bold"  for="age">Age</label>
                    <input type="text" class="form-control" id="age" name="age" placeholder="Enter Your age">
                </div>

                <!-- Gender Radio Button-->
                <label class="font-weight-bold d-block col-">Gender</label>
                <div class="form-check form-check-inline" id="radio button">
                    <input class="form-check-input" type="radio" name="gender[]" id="Male" value="M" checked>
                    <label class="form-check-label" for="Male">
                        Male
                    </label>
                </div>
                <div class="form-check form-check-inline" id="gender">
                    <input class="form-check-input" type="radio" name="gender[]" id="Female" value="F">
                    <label class="form-check-label" for="Female">
                        Female
                    </label>
                </div>

                <!-- Phone number -->
                <div class="form-group mt-1">
                    <label class="font-weight-bold"  for="phone">Phone Number</label>
                    <input type="tel" class="form-control" id="phone" name="phone" placeholder="222-333-4444">
                </div>
            </div>
            <div class="col-md-4 h-100 border rounded bg-light mt-2">
                <p class="text-center"><b>Note:</b> All information entered is protected by our
                    <a href="privacyPolicy.php">privacy policy</a>.
                Profile information can only be viewed by others with your permission.</p>
            </div>
        </div>
        <div class="text-right">
            <button type="submit" class="btn btn-primary">Next</button>
        </div>
    </form>
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