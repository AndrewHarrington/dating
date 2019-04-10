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
<div class="p-2 border rounded m-5">
    <form method="GET" action="profileEntry">
        <div class="form-row">
            <h1 class="border-bottom col">Personal Information</h1>
        </div>
        <div class="form-row">
            <div class="col-md-8 h-100">
                <!--String Fields -->
                <div class="form-group">
                    <label class="font-weight-bold" for="fname">First Name</label>
                    <input type="text" class="form-control" id="fname" placeholder="Enter Your First Name Here">
                </div>

                <div class="form-group">
                    <label class="font-weight-bold" for="lname">Last Name</label>
                    <input type="text" class="form-control" id="lname" placeholder="Enter Your Last Name Here">
                </div>

                <!-- Age field -->
                <div class="form-group">
                    <label class="font-weight-bold"  for="age">Age</label>
                    <input type="text" class="form-control" id="age" placeholder="Enter Your age">
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
                    <input type="tel" class="form-control" id="phone" placeholder="222-333-4444">
                </div>
            </div>
            <div class="col-md-4 h-100">
                <p>Note trial</p>
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