<?php

require_once "controller.php";
require_once __DIR__ . "/../models/CheckUser.php";

session_start();

function login() {
    
    if ($_SERVER['REQUEST_METHOD'] == "GET"){
        $_SESSION["login"] = False;
        render("login");
    }

    else if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_REQUEST['submit'])){
        $userName = $_REQUEST['username'];
        $password = $_REQUEST['password'];

        if (check_user($userName, $password)) {
            $_SESSION["login"] = True;
            $_SESSION["userName"] = $userName;
            redirect("/dashboard");
        } else {
            render("login", ["error_message" => "User or Password Not Found"]);
        }
    }
}

function logout() {
    session_unset();
    session_destroy();
    redirect("/login");
}