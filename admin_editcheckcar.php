<?php
require_once("connect.php");
//$filename=mktime(date('H'), date('i'), date('s'), date('m'), date('Y')).".jpg";
//$filename=$_POST["member_id"].".jpg";
//copy($_FILES["member_picture"]["tmp_name"], "images/".$filename);
$sql = sprintf(
    "UPDATE `car` SET 
        car_name=\"%s\",
        cartype_id=\"%s\" WHERE car_id=\"%s\" ",
        $_POST['car_name'],
        $_POST['cartype_id'],
        $_POST['car_id']);
if ($conn->query($sql) === TRUE) {
    header("Location: admin_addcar.php");
    exit;
} else {
    die("เกิดข้อผิดพลาด เนื่องจาก " . $conn->error);
}
?>
<?php
$conn->close();
?>