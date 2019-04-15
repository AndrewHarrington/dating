<?php
session_start();
if($_SERVER['REQUEST_METHOD'] == "POST"){
    //store to session
    $_SESSION['indoor'] = $_POST['indoor'];
    $_SESSION['outdoor'] = $_POST['outdoor'];
    //redirect
    header('Location: profile');
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
    <title>Document</title>
</head>
<body>
<!--Nav Bar-->
<nav class="navbar navbar-light bg-light">
    <a class="navbar-brand" href="/328/dating">Latin Love</a>
</nav>
<div class=" p-2 border rounded m-5">
    <!--Start of form -->
    <form method="POST" action="interests">
        <!--Form Title -->
        <div class="form-row">
            <h1 class="border-bottom col">Interests</h1>
        </div>

        <!-- ***************Indoor checkbox Button***************************************-->

        <div class="form-row">
            <label class="font-weight-bold d-block col-md-12">In-door Interests</label>
        </div>
        <div class="ml-2">
            <div class="form-check form-check-inline col-md-2"><input class='form-check-input' type='checkbox' name='indoor[]' id='tv' value='tv'><label class='form-check-label' for=tv'>Tv</label> </div><div class="form-check form-check-inline col-md-2"><input class='form-check-input' type='checkbox' name='indoor[]' id='mov' value='mov'><label class='form-check-label' for=mov'>Movies</label> </div><div class="form-check form-check-inline col-md-2"><input class='form-check-input' type='checkbox' name='indoor[]' id='cook' value='cook'><label class='form-check-label' for=cook'>Cooking</label> </div><div class="form-check form-check-inline col-md-2"><input class='form-check-input' type='checkbox' name='indoor[]' id='board' value='board'><label class='form-check-label' for=board'>Board Games</label> </div><div class="form-check form-check-inline col-md-2"><input class='form-check-input' type='checkbox' name='indoor[]' id='puzz' value='puzz'><label class='form-check-label' for=puzz'>Puzzles</label> </div><div class="form-check form-check-inline col-md-2"><input class='form-check-input' type='checkbox' name='indoor[]' id='read' value='read'><label class='form-check-label' for=read'>Reading</label> </div><div class="form-check form-check-inline col-md-2"><input class='form-check-input' type='checkbox' name='indoor[]' id='card' value='card'><label class='form-check-label' for=card'>Playing cards</label> </div><div class="form-check form-check-inline col-md-2"><input class='form-check-input' type='checkbox' name='indoor[]' id='video' value='video'><label class='form-check-label' for=video'>Video Games</label> </div>            </div>

        <!-- ***************Outdoor checkbox Button***************************************-->

        <div class="form-row">
            <label class="font-weight-bold d-block col-md-12">Out-door Interests</label>
        </div>
        <div class="ml-2">
            <div class="form-check form-check-inline col-md-2"><input class='form-check-input' type='checkbox' name='outdoor[]' id='hike' value='hike'><label class='form-check-label' for=hike'>Hiking</label> </div><div class="form-check form-check-inline col-md-2"><input class='form-check-input' type='checkbox' name='outdoor[]' id='bike' value='bike'><label class='form-check-label' for=bike'>Biking</label> </div><div class="form-check form-check-inline col-md-2"><input class='form-check-input' type='checkbox' name='outdoor[]' id='swim' value='swim'><label class='form-check-label' for=swim'>Swimming</label> </div><div class="form-check form-check-inline col-md-2"><input class='form-check-input' type='checkbox' name='outdoor[]' id='collect' value='collect'><label class='form-check-label' for=collect'>Collecting</label> </div><div class="form-check form-check-inline col-md-2"><input class='form-check-input' type='checkbox' name='outdoor[]' id='walk' value='walk'><label class='form-check-label' for=walk'>Walking</label> </div><div class="form-check form-check-inline col-md-2"><input class='form-check-input' type='checkbox' name='outdoor[]' id='climb' value='climb'><label class='form-check-label' for=climb'>Climbing</label> </div>            </div>
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