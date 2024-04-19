<?php

require_once "controller.php";

function add_item()
{
    if ($_SESSION["login"] == True) {
        require_once __DIR__ . "/../configs/database.php";

        $cateSQL = "SELECT * FROM categories";
        $cateList = $CONN->query($cateSQL);

        if ($_SERVER['REQUEST_METHOD'] == "GET") {
            render("add-item", ["cateList" => $cateList]);

        } else if ($_SERVER['REQUEST_METHOD'] == "POST") {

            $proNameAr = $_POST["proNameAr"];
            $proNameEn = $_POST["proNameEn"];
            $comName = $_POST["comName"];
            $redGreen = ($_POST["redgreen"] == "green") ? "green" : "red";
            $cate = $_POST["cate"];
            $url = $_POST["url"];

            $sql = "INSERT INTO $redGreen (Name, English_Name, Manufacturer, Category , Link) VALUES ('$proNameAr', '$proNameEn', '$comName', '$cate', '$url')";

            try {
                $CONN->query($sql);

                $context = [
                    "message" => "New record created successfully",
                    "cateList" => $cateList
                ];

                render("add-item", $context);

            } catch (Exception $e) {
                render("add-item", ["message" => $e, "cateList" => $cateList]);
            }

        }
    } else {
        render("login", ["error_message" => "Please login first!"]);
    }
}
