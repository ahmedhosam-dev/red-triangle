<?php

$DB_HOST = "localhost";
$DB_USERNAME = "root";
$DB_PASSWORD = "";
$DB_NAME = "redtriangledb";

$CONN = new mysqli($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);

if ($CONN->connect_error) {
    die("connection errors" . $CONN->connect_error);
}