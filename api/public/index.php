<?php
header('Content-Type: application/json');
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../vendor/autoload.php';

$app = new \Slim\App;

require_once('Common_model.php');
require_once ('../app/user.php');
require_once ('../app/organizer.php');
require_once ('../app/flyers.php');
require_once ('../app/funcies.php');
require_once ('../app/contactus.php');
//require_once ('../app/crimecount.php');
//require_once ('../app/forum.php');
//require_once ('../app/forumchat.php');
//require_once ('../app/userreport.php');


//require_once ('../app/image.php');


// $app->response()->status(404);


$app->run();