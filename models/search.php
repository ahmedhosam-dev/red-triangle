<?php


function red_green_db(string $searchTerm) {
    require __DIR__ . "/../configs/database.php";

    $greenSQL = "SELECT * FROM green WHERE name LIKE ? OR english_name LIKE ? OR manufacturer LIKE ? OR category LIKE ? LIMIT 0, 5";
    $redSQL = "SELECT * FROM red WHERE name LIKE ? OR english_name LIKE ? OR manufacturer LIKE ? OR category LIKE ? LIMIT 0, 5";

    try {
        // Prepare and execute the green query
        $greenStmt = $CONN->prepare($greenSQL);
        $greenSearchTerm = "%$searchTerm%"; // Adding wildcards to the search term
        $greenStmt->bind_param("ssss", $greenSearchTerm, $greenSearchTerm, $greenSearchTerm, $greenSearchTerm);
        $greenStmt->execute();
        $greenResult = $greenStmt->get_result()->fetch_all(MYSQLI_ASSOC);

        // Prepare and execute the red query
        $redStmt = $CONN->prepare($redSQL);
        $redSearchTerm = "%$searchTerm%"; // Adding wildcards to the search term
        $redStmt->bind_param("ssss", $redSearchTerm, $redSearchTerm, $redSearchTerm, $redSearchTerm);
        $redStmt->execute();
        $redResult = $redStmt->get_result()->fetch_all(MYSQLI_ASSOC);

        return [$greenResult, $redResult];

    } catch (Exception $e) {
        // Proper error handling
        return "Query error: " . $e->getMessage();
    } finally {
        // Close prepared statements
        if (isset($greenStmt)) {
            $greenStmt->close();
        }
        if (isset($redStmt)) {
            $redStmt->close();
        }
        // Close database connection
        $CONN->close();
    }
}

