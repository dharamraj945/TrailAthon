<?php
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "grtrading_section";


$conn = new mysqli($servername, $username, $password, $db_name);


if ($conn) {

    // echo "connection Succesfull";
} else {
    echo "connection fail";
}
