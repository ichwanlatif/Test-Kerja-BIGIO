<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "monitoring_nilai_siswa";

    //create connection to database
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>