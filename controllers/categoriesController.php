<?php

require_once "controller.php";

function categories()
{
    if ($_SESSION["login"] == True) {
        require_once __DIR__ . "/../configs/database.php";

        // Pagination variables
        $resultsPerPage = 4;

        // Determine which page number the user is currently on
        if (!isset($_GET['page'])) {
            $page = 1;
        } else {
            $page = $_GET['page'];
        }

        // Calculate the SQL LIMIT starting number for the results on the displaying page
        $startingLimitNumber = ($page - 1) * $resultsPerPage;


        // Build SQL query based on search query
        $cateSQL = "SELECT * FROM categories";

        // Determine the total number of results
        $cateResult = $CONN->query($cateSQL);
        $totalCateResults = $cateResult->num_rows;
        $totalPages = ceil($totalCateResults / $resultsPerPage);

        // Modify SQL query to include pagination
        $cateSQL .= " LIMIT $startingLimitNumber, $resultsPerPage";

        // Fetch data for the current page
        $cateResult = $CONN->query($cateSQL);


        $context = [
            "countCate" => $_SESSION["countCate"],
            "cateResult" => $cateResult,
            "totalPages" => $totalPages,
            "page" => $page,
        ];
        render("categories", $context);
    } else {
        render("login", ["error_message" => "Please login first!"]);
    }
}
