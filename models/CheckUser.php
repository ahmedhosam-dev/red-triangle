<?php



function check_user(string $userName, string $password)
{
    require __DIR__ . "/../configs/database.php";

    $sql = "SELECT * FROM admin WHERE name='" . $userName . "'";

    $result = $CONN->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            if (password_verify($password, $row["password"])) {
                return true;
            }
        }
    } else {
        return false;
    }
}
