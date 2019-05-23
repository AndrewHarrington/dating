<?php
/**\
 * User: Andrew Harrington
 * Date: 5/14/2019
 */

//error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once('vendor/autoload.php');
require('model/functions.php');

//start the session
session_start();

$f3 = Base::instance();

$db= new Database();
$indoor = array('tv'=>'TV',
                'mov'=>'Movies',
                'cook'=>'Cooking',
                'board'=>'Board Games',
                'puzz'=>'Puzzles',
                'read'=>'Reading',
                'card'=>'Card Games',
                'video'=>'Video Games');
$outdoor = array('hike'=>'Hiking',
                'bike'=>'Biking',
                'swim'=>'Swimming',
                'collect'=>'Collecting',
                'walk'=>'Walking',
                'climb'=>'Climbing');
$f3->set('indoor', $indoor);
$f3->set('outdoor', $outdoor);

$f3->route('GET|POST /', function (){
    $view = new Template();
    echo $view->render('views/home.html');
});

$f3->route("GET|POST /personalInfo", function($f3){

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $errors = validatePersonalInfo($f3);

        if(empty($errors)){
            if(isset($_POST['prem'])){
                $member = new PremiumMember($_POST['fname'], $_POST['lname'], $_POST['age'],
                    $_POST['gender'], $_POST['phone']);
            }
            else{
                $member = new Member($_POST['fname'], $_POST['lname'], $_POST['age'],
                    $_POST['gender'], $_POST['phone']);
            }

            $_SESSION['user'] = $member;

            //reroute
            $f3->reroute("/profileEntry");
        }
    }
    $view = new Template();
    echo $view->render("views/personalInfo.php");
});

$f3->route("GET|POST /profileEntry", function($f3){
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $errors = validateProfileEntry($f3);

        if(empty($errors)){
            //get the user
            $user = $_SESSION['user'];
            $user->setBio($_POST['bio']);
            $user->setEmail($_POST['email']);
            $user->setState($_POST['state']);
            $user->setSeeking($_POST['seeking'][0]);

            if($user instanceof PremiumMember){
                //reroute
                $f3->reroute("/interests");
            }
            else{
                //reroute
                $f3->reroute('/summary');
            }
        }
    }
    $view = new Template();
    echo $view->render("views/profileEntry.php");
});

$f3->route("GET|POST /interests", function($f3){
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $valid = validateInterests($f3);

        if($valid){
            //get the user
            $user = $_SESSION['user'];
            $user->setInDoorInterests($_POST['indoor']);
            $user->setOutDoorInterests($_POST['outdoor']);
            //reroute
            $f3->reroute("/summary");
        }
    }
    $view = new Template();
    echo $view->render("views/interests.php");
});

$f3->route("GET|POST /summary", function($f3){
    //save the user to the db
    global $db;
    $f3->set('db', $db);
    $db->insertMember($_SESSION['user']);

    $view = new Template();
    echo $view->render("views/profile.php");
});

$f3->route("GET|POST /admin", function ($f3){
    global $db;
    //get all of the user data
    $data = $db->getMembers();
    $f3->set('data', $data);
    //display the data to a table
    $view = new Template();
    echo $view->render("views/admin.html");
});

$f3->run();