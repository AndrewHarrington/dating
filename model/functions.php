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

function validArray($array, $options){
    if(empty($indoor)){
        return true;
    }
    foreach ($indoor as $key => $value){
        if(!array_key_exists($value, $options)){
            return false;
        }
    }
    return true;
}

function validatePersonalInfo($f3){
    $errors = array();

    //fname
    if(!validName($_POST['fname'])){
        $errors['fnameERR'] = 'The first name is invalid';
    }

    //lname
    if(!validName($_POST['lname'])){
        $errors['lnameERR'] = 'The last name is invalid';
    }

    //age
    if(!validAge($_POST['age'])){
        $errors['ageERR'] = 'The age is invalid';
    }

    //phone
    if(!validPhone($_POST['phone'])){
        $errors['phoneERR'] = 'The phone number is invalid';
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

    $f3->set('profileEntryERRS', $errors);
    return $errors;
}

function validateInterests($f3){
    $indoorVals = $f3->get('indoor');
    $outdoorVals = $f3->get('outdoor');
    return ((validArray($_POST['indoor'], $indoorVals))&&(validArray($_POST['outdoor'], $outdoorVals)));
}

function stringifyOneArray(array $array, array $starter){
    $string = '';
    //loop over the array and grab the necessary conversion in the original array
    foreach ($array as $key => $value){
        //make sure the key is in there
        if(array_key_exists($value, $starter)){
            //add the conversion to the final string
            $string .= $starter["$value"] . ', ';
        }
    }

    //fix the fencepost issue
    return substr_replace($string, "", -2);
}

function stringifyTwoArrays(array $array1, array $array2, array $starter1, array $starter2){
    $string = '';
    $string .= stringifyOneArray($array1, $starter1);
    $string .= ', ';
    $string .= stringifyOneArray($array2, $starter2);
    return $string;
}