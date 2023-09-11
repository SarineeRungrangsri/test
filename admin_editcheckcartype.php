<?php
require_once("connect.php");
//$filename=mktime(date('H'), date('i'), date('s'), date('m'), date('Y')).".jpg";
//$filename=$_POST["member_id"].".jpg";
//copy($_FILES["member_picture"]["tmp_name"], "images/".$filename);
$sql = sprintf(
    "UPDATE `car_type` SET 
        car_typename=\"%s\" WHERE cartype_id=\"%s\" ",
        $_POST['car_typename'],
        $_POST['cartype_id']);
if ($conn->query($sql) === TRUE) {
    header("Location: admin_addcartype.php");
    // echo $_POST['car_typename'];
    exit;
} else {
    die("เกิดข้อผิดพลาด เนื่องจาก " . $conn->error);
}
?>
<?php
$conn->close();
?>