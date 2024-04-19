<?php

require_once "controller.php";

function home()
{
    require_once __DIR__ . "/../configs/database.php";
    
    // Pagination variables
    $resultsPerPage = 3;
    
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
    $redSQL = "SELECT * FROM red";
    $greenSQL = "SELECT * FROM green";
    if (!empty($search)) {
        $redSQL .= " WHERE name LIKE '%" . $search . "%'";
        $greenSQL .= " WHERE name LIKE '%" . $search . "%'";
    }

    // Determine the total number of results
    $redResult = $CONN->query($redSQL);
    $greenResult = $CONN->query($greenSQL);
    $totalRedResults = $redResult->num_rows;
    $totalGreenResults = $greenResult->num_rows;
    $totalPages = ceil(($totalRedResults + $totalGreenResults) / $resultsPerPage);

    // Modify SQL query to include pagination
    $redSQL .= " LIMIT $startingLimitNumber, $resultsPerPage";
    $greenSQL .= " LIMIT $startingLimitNumber, $resultsPerPage";

    // Fetch data for the current page
    $redResult = $CONN->query($redSQL);
    $greenResult = $CONN->query($greenSQL);


    $context = [
        "redResult" => $redResult,
        "greenResult" => $greenResult,
        "totalPages" => $totalPages,
        "search" => $search,
        "page" => $page,
    ];

    render("home", $context);
}
