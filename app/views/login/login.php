<?php

$data = json_decode(file_get_contents("php://input"), true);
$username = $data["username"];
$password = $data["password"];

// check if the username and password are correct
if ($username === "admin" && $password === "password") {
    $response = [
        "status" => "success",
        "message" => "Logged in successfully."
    ];
} else {
    $response = [
        "status" => "error",
        "message" => "Invalid username or password."
    ];
}

header("Content-Type: application/json");
echo json_encode($response);