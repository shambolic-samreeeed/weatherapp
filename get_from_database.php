<?php
$q = $_REQUEST["q"];
$city = $_REQUEST["city"];
if ($q == "getCityWeatherDataFromDb") {
    getCityWeatherDataFromDb($city);
}

if ($q === "checkConnection") {
    checkConnection();
}

function checkConnection()
{
    $servername = "localhost";
    $username = "root";
    $password = "";

    $conn = new mysqli($servername, $username, $password);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected successfully";
}

function getCityWeatherDataFromDb($city)
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "city_weather";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection Failed. " . $conn->connect_error);
    }

    

    $sql = "SELECT * FROM dibrugarh ORDER BY id ASC";
    $result = $conn->query($sql);
    $final = array();
    if ($result->num_rows > 0) {
        $all_data = array();
        while ($row = $result->fetch_assoc()) {
            array_push($all_data, $row);
        }
        $finalRes = [
            "result" => "success",
            "data" => array_values($all_data)
        ];
        array_push($final, $finalRes);
    } else {
        $finalRes = [
            "result" => "no data"
        ];
        array_push($final, $finalRes);
    }
    echo json_encode($final);
    $conn->close();
}
