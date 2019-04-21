<?php
/**\
 * User: Andrew Harrington
 * Date: 4/8/2019
 */

//error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

//start the session
session_start();

# {{ $_SESSION['varName'} }} || {{ @SESSION.varName }}
require_once('vendor/autoload.php');
require ('model/functions.php');

$f3 = Base::instance();

$f3->route('GET|POST /', function (){
    $view = new Template();
    echo $view->render('views/home.html');
});

$f3->route("GET|POST /personalInfo", function($f3){
    $view = new Template();
    echo $view->render("views/personalInfo.php");
});

$f3->route("GET|POST /profileEntry", function($f3){

    storePersonalInfo();

    $view = new Template();
    echo $view->render("views/profileEntry.php");
});

$f3->route("GET|POST /interests", function($f3){

    storeProfileEntry();

    $view = new Template();
    echo $view->render("views/interests.php");
});

$f3->route("GET|POST /profile", function($f3){

    storeInterests();

    $view = new Template();
    echo $view->render("views/profile.php");
});

$f3->run();