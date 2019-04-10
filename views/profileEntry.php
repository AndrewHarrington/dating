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
    <title>Document</title>
</head>
<body>
<nav class="navbar navbar-light bg-light">
    <a class="navbar-brand" href="/328/dating">Latin Love</a>
</nav>
<div class=" p-2 border rounded m-5">
    <!--Start of form -->
    <form method="GET" action="interests">
        <!--String fields -->
        <div class="form-row">
            <h1 class="border-bottom col">Profile</h1>
        </div>
        <!--Left side-->
        <div class="form-row">
            <div class="col-md-6 h-100">

                <label class="font-weight-bold" for="email">Email</label>
                <input type="email" class="form-control" id="email" placeholder="Enter Email Here">

                <label class="font-weight-bold" for="state">State</label>
                <select class="form-control" id="state">
                    <option>Washington</option>
                    <option>California</option>
                </select>


                <!-- Radio button -->
                <!--Male-->
                <label class="font-weight-bold d-block col-">Seeking</label>
                <div class="form-check form-check-inline" id="radio button">
                    <input class="form-check-input" type="radio" name="seeking[]" id="Male" value="M" checked>
                    <label class="form-check-label" for="Male">
                        Male
                    </label>
                </div>
                <!--Female-->
                <div class="form-check form-check-inline" id="gender">
                    <input class="form-check-input" type="radio" name="seeking[]" id="Female" value="F">
                    <label class="form-check-label" for="Female">
                        Female
                    </label>
                </div>
            </div>
            <div class="col-md-6 h-100">
                <div class="form-group">
                    <label class="font-weight-bold" for="bio">Biography</label>
                    <textarea class="form-control overflow-auto" id="bio" rows="6"></textarea>
                </div>
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