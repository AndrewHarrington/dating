<?php

function validName($name){
    return (!empty($name) && ctype_alpha($name));
}

function validAge($age){
    return ($age <= 118 && $age >= 18);
}

function validPhone($phone){
    $stripped = str_replace("-", "", $phone);
    $stripped = str_replace("(", "", $stripped);
    $stripped = str_replace(")", "", $stripped);
    return(strlen($stripped) == 10);
}

function validEmail($email){
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function validIndoor($indoor, $options){
    foreach ($indoor as $key => $value){
        if(!array_key_exists($value, $options)){
            return false;
        }
    }
    return true;
}

function validOutdoor($outdoor, $options){
    foreach ($outdoor as $key => $value){
        if(!array_key_exists($value, $options)){
            return false;
        }
    }
    return true;
}

function validatePersonalInfo($f3){
    $errors = array();

    //prem
    $_SESSION['prem'] = isset($_POST['prem']);

    //fname
    if(!validName($_POST['fname'])){
        $errors['fnameERR'] = 'The first name is invalid';
    }
    else{
        $_SESSION['fname'] = $_POST['fname'];
    }

    //lname
    if(!validName($_POST['lname'])){
        $errors['lnameERR'] = 'The last name is invalid';
    }
    else{
        $_SESSION['lname'] = $_POST['lname'];
    }

    //age
    if(!validAge($_POST['age'])){
        $errors['ageERR'] = 'The age is invalid';
    }
    else{
        $_SESSION['age'] = $_POST['age'];
    }

    //gender
    //no validation needed
    $_SESSION['gender'] = $_POST['gender'];

    //phone
    if(!validPhone($_POST['phone'])){
        $errors['phoneERR'] = 'The phone number is invalid';
    }
    else{
        $_SESSION['phone'] = $_POST['phone'];
    }

    $f3->set('personalInfoERRS', $errors);

    return $errors;
}

function validateProfileEntry($f3){
    $errors = array();
    //email
    if(!validEmail($_POST['email'])){
        $errors['emailERR'] = 'You need to enter an email';
    }
    else{
        $_SESSION['email'] = $_POST['email'];
    }

    $_SESSION['state'] = $_POST['state'];

    $seeking = $_POST['seeking'];
    $_SESSION['seeking'] = $seeking[0];

    $_SESSION['bio'] = $_POST['bio'];

    $f3->set('profileEntryERRS', $errors);
    return $errors;
}

function validateInterests($f3){
    $indoorVals = $f3->get('indoor');
    $outdoorVals = $f3->get('outdoor');
    return ((validIndoor($_POST['indoor'], $indoorVals))&&(validOutdoor($_POST['outdoor'], $outdoorVals)));
}

function storeInterests($f3){

    $indoor = $f3->get('indoor');
    $outdoor = $f3->get('outdoor');

    $newInterests = "";
    foreach ($_POST['indoor'] as $key => $value){
        $newInterests .=  $indoor[$value]. ", ";
    }
    foreach ($_POST['outdoor'] as $key => $value){
        $newInterests .= $outdoor[$value] . ", ";
    }

    $_SESSION['interests'] = substr_replace($newInterests, "", -2);
}

function stringifyOneArray(array $array, array $starter){
    $string = '';
    //loop over the array and grab the necessary conversion in the original array
    foreach ($array as $key => $value){
        if(array_key_exists($value, $starter)){
            $string .= $starter["$value"] . ', ';
        }
    }

    return substr_replace($string, "", -2);
}

function stringifyTwoArrays(array $array1, array $array2, array $starter1, array $starter2){
    $string = '';
    //loop over each array and append the conversions to the final string
    $string .= stringifyOneArray($array1, $starter1);
    $string .= ', ';
    $string .= stringifyOneArray($array2, $starter2);
    return $string;
}