<?php
    $server = "localhost";
    $username = "root";
    $password = "";
    $db = "test";
    //// Create Connection
    // รูปแบบ new mysqli("ชื่อเซิร์ฟเวอร์", "ชื่อผู้ใช้", "รหัสผ่าน", "ชื่อฐานข้อมูล");
    $conn = new mysqli($server, $username, $password, $db);
    //ตรวจสอบการเชื่อมต่อ
    if($conn->connect_error) die("Connection failed! ".$conn->connect_error);
    $conn->query("SET NAMES utf8mb4 COLLATE utf8mb4_unicode_ci");
    //$conn->query("SET NAMES UTF8");
    mysqli_query($conn, "SET NAMES UTF8");
    mysqli_query($conn, "SET character_set_results=utf8");
    mysqli_query($conn, "SET character_set_client=utf8");
    mysqli_query($conn, "SET character_set_connection=utf8");
    date_default_timezone_set("Asia/Bangkok");
?>