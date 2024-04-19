<?php

/**
 * Setup routing and controllers
 */

// Add controller file here
require "authController.php";
require "homeController.php";
require "dashboardController.php";
require "green-companysController.php";
require "red-companysController.php";
require "categoriesController.php";
require "notfoundController.php";
require "add-itemController.php";


// Your website URLs here
function route(string $uri)
{
    // Define routes
    /* ! Make sure is no there to functions have same name ! */
    $routes = [
    //Pages
    //  urls                    controller function
        '/'         =>  'home',             // Done -> Just need some edite on front-end code and search algo
        '/login'            =>  'login',            // Done -> Add session to make sure when logout there not can go forword 
        '/dashboard'        =>  'dashboard',        // 
        '/green-companys'   =>  'green_companys',   // 
        '/red-companys'     =>  'red_companys',     //
        '/categories'       =>  'categories',       //
        '/logout'           =>  'logout',           // need some sessions
        '/add-item'         =>  'add_item',         //
    ];

    // Call functions to pacific routes
    // Match the requested URL to a route
    foreach ($routes as $pattern => $func) {
        if (preg_match("#^$pattern$#", $uri, $matches)) {
            try {
                call_user_func($func);
                exit();
            } catch (Exception $e) {
                http_response_code(404);
                call_user_func('notfound');
                exit();
            }
        }
    }
    
    // If no route matches, display a 404 error
    http_response_code(404);
    call_user_func('notfound');
}

// Render page
function render(string $page, array $context = []) {
    // Just enter the page name without extention 
    if (array_key_exists(0, $context)){
        $context;
        require __DIR__ . "\..\pages\\" . $page . ".php";
        exit();
    } else {
        include __DIR__ . "\..\pages\\" . $page . ".php";
        exit();
    }
}


// Redirect to url
function redirect(string $pageURL){
    header("Location: " . $pageURL);
    exit();
}