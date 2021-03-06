<!--
- Andrew Harrington
- 4/15/2019
- Interests Form
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
    <link rel="stylesheet" type="text/css" href="../styles/styles.css">
    <title>Interests</title>
</head>
<body>
<!--Nav Bar-->
<nav class="navbar navbar-light bg-light">
    <a class="navbar-brand" href="/328/dating">Latin Love</a>
    <a class="navbar-brand" href="/328/dating/admin">Admin</a>
</nav>
<check if="{{isset(@interestERRS)}}">
    <p class="alert alert-danger" role="alert">
        <repeat group="{{@interestERRS}}" value="{{@err}}">
            {{@err}} <br>
        </repeat>
    </p>
</check>
<div class=" p-2 border rounded m-5">
    <!--Start of form -->
    <form method="POST" action="">
        <!--Form Title -->
        <div class="form-row">
            <h1 class="border-bottom col">Interests</h1>
        </div>

        <!-- ***************Indoor checkbox Button***************************************-->

        <div class="form-row">
            <label class="font-weight-bold d-block col-md-12">Indoor Interests</label>
        </div>
        <div class="ml-2">
            <repeat group="{{@indoor}}" key="{{@key}}" value="{{@val}}">
                <div class="form-check form-check-inline col-md-2">
                    <input class='form-check-input' type='checkbox' name='indoor[]' id='{{@key}}' value='{{@key}}'>
                    <label class='form-check-label' for='{{@key}}'>{{@val}}</label>
                </div>
            </repeat>
        </div>

        <!-- ***************Outdoor checkbox Button***************************************-->

        <div class="form-row">
            <label class="font-weight-bold d-block col-md-12">Outdoor Interests</label>
        </div>
        <div class="ml-2">
            <repeat group="{{@outdoor}}" key="{{@key}}" value="{{@val}}">
                <div class="form-check form-check-inline col-md-2">
                    <input class='form-check-input' type='checkbox' name='outdoor[]' id='{{@key}}' value='{{@key}}'>
                    <label class='form-check-label' for='{{@key}}'>{{@val}}</label>
                </div>
            </repeat>
        </div>
        <div class="text-right">
            <button type="submit" class="btn btn-primary">Next</button>
        </div>
    </form>

    <!--***********End of Form********************************************-->

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