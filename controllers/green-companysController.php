<?php

require_once "controller.php";

function green_companys()
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

        // Fetch search query
        $search = "";
        if (isset($_GET['search'])) {
            $search = $_GET['search'];
        }

        // Build SQL query based on search query
        $greenSQL = "SELECT * FROM green";

        // Determine the total number of results
        $greenResult = $CONN->query($greenSQL);
        $totalGreenResults = $greenResult->num_rows;
        $totalPages = ceil($totalGreenResults / $resultsPerPage);

        // Modify SQL query to include pagination
        $greenSQL .= " LIMIT $startingLimitNumber, $resultsPerPage";

        // Fetch data for the current page
        $greenResult = $CONN->query($greenSQL);

        $CONN->close();

        $context = [
            "countGreen" => $_SESSION["countGreen"],
            "greenResult" => $greenResult,
            "totalPages" => $totalPages,
            "page" => $page,
        ];
        render("green-companys", $context);
    } else {
        render("login", ["error_message" => "Please login first!"]);
    }
}
