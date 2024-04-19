<?php

require_once "controller.php";


function dashboard()
{
    if ($_SESSION["login"] == True) {

        require_once __DIR__ . "/../configs/database.php";

        $redSQL = "SELECT * FROM red";
        $greenSQL = "SELECT * FROM green";
        $cateSQL = "SELECT * FROM categories";

        $redResult = $CONN->query($redSQL);
        $greenResult = $CONN->query($greenSQL);
        $cateResult = $CONN->query($cateSQL);

        $_SESSION["countRed"] = $redResult->num_rows;
        $_SESSION["countGreen"] = $greenResult->num_rows;
        $_SESSION["countCate"] = $cateResult->num_rows;

        $CONN->close();

        $context = [
            "countGreen" => $_SESSION["countGreen"],
            "countRed" => $_SESSION["countRed"],
            "userName" => $_SESSION["userName"],
        ];
        render("dashboard", $context);
    } else {
        render("login", ["error_message" => "Please login first!"]);
    }
}
