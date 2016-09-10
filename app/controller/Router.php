<?php

//include_once 'model/DataReport.class.php';
include_once 'model/templateParser.class.php';
include 'vendor/autoload.php';


// router init
$router = new AltoRouter();
$router->setBasePath('/');


/*
* Route map settings
*/
$router->map('GET|POST','/', function(  ){
    $method = "reportlist";
    $arg['format'] = 'html';
    $arg['view'] = 'index';
    include_once 'controller/Controller.php';
});

$router->map('GET|POST','/admin/', function(  ){
    $method = "admin";
    $arg['format'] = 'html';
    $arg['view'] = 'admin';
    include_once 'controller/Controller.php';
});

$router->map('POST','/[i:id]/edit', function( $id ){
    $method = "edit";
    include_once 'controller/Controller.php';
});

$router->map('POST','/[i:id]/update/', function(  ){
    $method = "update";
    include_once 'controller/Controller.php';
});

$router->map('POST','/[i:id]/delete/', function(  ){
    $method = "delete";
    include_once 'controller/Controller.php';
});

$router->map('GET|POST','/login/', function( ){
    $method = "login";
    $arg['view'] = 'login';
    $arg['format'] = 'html';
    include_once 'controller/Controller.php';
});

$router->map('GET|POST','/logout/', function( ){
    $method = "logout";
    $arg['view'] = 'logout';
    $arg['format'] = 'html';
    include_once 'controller/Controller.php';
});

$router->map('GET|POST','/contact/', function(){
    $method = "contact";
    $arg['format'] = 'html';
    $arg['view'] = 'contact';
    include_once 'controller/Controller.php';

});

//matching
$match = $router->match();

// do we have a match?
if( $match && is_callable( $match['target'] ) ) {
	call_user_func_array( $match['target'], $match['params'] );
} else {
    $method = "404";
    $arg['format'] = 'html';
    $arg['view'] = '404';
    include_once 'controller/Controller.php';
}