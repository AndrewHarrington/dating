<?php
/**\
 * User: Andrew Harrington
 * Date: 4/8/2019
 */

//error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once('vendor/autoload.php');

$f3 = Base::instance();

$f3->route('GET|POST /', function (){
    $view = new View();
    echo $view->render('views/home.html');
});

$f3->route("GET|POST /personalInfo", function(){
    $view = new View();
    echo $view->render("views/personalInfo.php");
});

$f3->route("GET|POST /profileEntry", function(){
    $view = new View();
    echo $view->render("views/profileEntry.php");
});

$f3->route("GET|POST /interests", function(){
    $view = new View();
    echo $view->render("views/interests.php");
});

$f3->run();