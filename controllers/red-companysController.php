<?php

require_once "controller.php";

function red_companys()
{
    if ($_SESSION["login"] == True) {

        require_once __DIR__ . "/../configs/database.php";

        // Pagination variables
        $resultsPerPage = 5;

        // Determine which page number the user is currently on
        if (!isset($_GET['page'])) {
            $page = 1;
        } else {
            $page = $_GET['page'];
        }

        // Calculate the SQL LIMIT starting number for the results on the displaying page
        $startingLimitNumber = ($page - 1) * $resultsPerPage;

        // Build SQL query based on search query
        $redSQL = "SELECT * FROM red";

        // Determine the total number of results
        $redResult = $CONN->query($redSQL);
        $totalRedResults = $redResult->num_rows;
        $totalPages = ceil($totalRedResults / $resultsPerPage);

        // Modify SQL query to include pagination
        $redSQL .= " LIMIT $startingLimitNumber, $resultsPerPage";

        // Fetch data for the current page
        $redResult = $CONN->query($redSQL);

        $CONN->close();

        $context = [
            "countRed" => $_SESSION["countRed"],
            "redResult" => $redResult,
            "totalPages" => $totalPages,
            "page" => $page,
        ];
        render("red-companys", $context);
    } else {
        render("login", ["error_message" => "Please login first!"]);
    }
}
