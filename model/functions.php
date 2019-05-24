<?php

/**
 * Determines if the input is valid
 * @param $name - To be checked
 * @return bool - Validity
 */
function validName($name){
    return (!empty($name) && ctype_alpha($name));
}

/**
 * Determines if the input is valid
 * @param $age - To be checked
 * @return bool - Validity
 */
function validAge($age){
    return ($age <= 118 && $age >= 18);
}

/**
 * Determines if the input is valid
 * @param $phone - To be checked
 * @return bool - Validity
 */
function validPhone($phone){
    $stripped = str_replace("-", "", $phone);
    $stripped = str_replace("(", "", $stripped);
    $stripped = str_replace(")", "", $stripped);
    return(strlen($stripped) == 10);
}

/**
 * Determines if the input is valid
 * @param $email - To be checked
 * @return mixed - Validity
 */
function validEmail($email){
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

/**
 * Determines if the input is valid
 * @param $array - To be checked
 * @param $options - To be compared against
 * @return bool - Validity
 */
function validArray($array, $options){
    if(empty($array)){
        return true;
    }
    foreach ($array as $key => $value){
        if(!array_key_exists($value, $options)){
            return false;
        }
    }
    return true;
}

/**
 * Takes all of the data from PersonalInfo.php
 * @param $f3 - The god-object
 * @return array - The list of errors
 */
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

/**
 * Takes all of the data from ProfileEntry.php
 * @param $f3 - The god-object
 * @return array - The list of errors
 */
function validateProfileEntry($f3){
    $errors = array();
    //email
    if(!validEmail($_POST['email'])){
        $errors['emailERR'] = 'You need to enter an email';
    }

    $f3->set('profileEntryERRS', $errors);
    return $errors;
}

/**
 * Are each of the interest arrays valid?
 * @param $f3 - The god-object
 * @return bool - Validity
 */
function validateInterests($f3){
    $indoorVals = $f3->get('indoor');
    $outdoorVals = $f3->get('outdoor');
    return ((validArray($_POST['indoor'], $indoorVals))&&(validArray($_POST['outdoor'], $outdoorVals)));
}

/**
 * Make an array into a pretty string
 * @param array $array - The "on" values
 * @param array $starter - The pretty versions of those values
 * @return mixed - The fancy new string
 */
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

/**
 * Make 2 arrays into one pretty string
 * @param array $array1 - The "on" values
 * @param array $array2 - The "on" values
 * @param array $starter1 - The pretty versions of those values
 * @param array $starter2 - The pretty versions of those values
 * @return string - The fancy new string
 */
function stringifyTwoArrays(array $array1, array $array2, array $starter1, array $starter2){
    $string = '';
    $string .= stringifyOneArray($array1, $starter1);
    $string .= ', ';
    $string .= stringifyOneArray($array2, $starter2);
    return $string;
}