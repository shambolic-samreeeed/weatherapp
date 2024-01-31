<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "city_weather";
$tableName = "dibrugarh";
$connectionStatus = checkConnection();

function checkConnection()
{
    global $servername, $username, $password, $dbname;
    $conn = new mysqli($servername, $username, $password);

    if ($conn->connect_error) {
        die("The Connection To The Database Failed: " . $conn->connect_error);
    }

    $sql = "CREATE DATABASE IF NOT EXISTS $dbname";
    if ($conn->query($sql) !== TRUE) {
        echo "Error Creating Database: " . $conn->error;
    }
    createTable();
    return " Successful";
}

function createTable()
{
    global $servername, $username, $password, $dbname, $tableName;
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection Failed: " . $conn->connect_error);
    }

    // SQL to create table
    $sql = "CREATE TABLE IF NOT EXISTS $tableName (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    Day_of_Week VARCHAR(20),
    Day_and_Date VARCHAR(20),
    Weather_Condition VARCHAR(50),
    Weather_Icon VARCHAR(100),
    Temperature INT(5),
    Pressure INT(6),
    Wind_Speed DECIMAL(5,2),
    Humidity INT(5))";

    if ($conn->query($sql) !== TRUE) {
        echo "Error creating Table: " . $conn->error;
    }
    $conn->close();
}
