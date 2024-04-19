<?php

// Get route function from controllers
include './controllers/controller.php';

// Get the requested URL
$request_url = $_SERVER['REQUEST_URI'];

// Remove query string from URL if present
$request_url = explode('?', $request_url, 2);

// Manage route and send request data
route($request_url[0]);