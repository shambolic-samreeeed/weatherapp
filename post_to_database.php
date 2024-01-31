<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "city_weather";
$tableName = "dibrugarh";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed " . $conn->connect_error);
}

$day_of_week = $_POST['day_of_week'];
$day_and_date = $_POST['day_and_date'];
$weather_condition = $_POST['weather_condition'];
$weather_icon = $_POST['weather_icon'];
$temperature = $_POST['temperature'];
$wind_speed = $_POST['wind_speed'];
$humidity = $_POST['humidity'];
$pressure = $_POST['pressure'];


$insert_sql = "INSERT INTO $tableName (Day_of_Week, Day_and_Date, Weather_Condition, Weather_Icon, Temperature, Pressure, Wind_Speed, Humidity) VALUES ('$day_of_week', '$day_and_date', '$weather_condition', '$weather_icon', '$temperature', '$pressure', '$wind_speed', '$humidity')";
if ($conn->query($insert_sql) !== TRUE) {
    echo "Error: " . $insert_sql . "<br>" . $conn->error;
} else {
    echo "success";
}

$conn->close();
