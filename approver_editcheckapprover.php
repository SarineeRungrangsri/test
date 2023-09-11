<?php
require_once("connect.php");
//$filename=mktime(date('H'), date('i'), date('s'), date('m'), date('Y')).".jpg";
//$filename=$_POST["member_id"].".jpg";
//copy($_FILES["member_picture"]["tmp_name"], "images/".$filename);
$sql = sprintf(
    "UPDATE `schedule_list` SET 
            car_status=\"%s\" WHERE id=\"%s\" ",
        $_POST['car_status'],
        $_POST['id']);
if ($conn->query($sql) === TRUE) {
    header("Location: approver_approver.php");
    exit;
} else {
    die("เกิดข้อผิดพลาด เนื่องจาก " . $conn->error);
}
?>
<?php
$conn->close();
?>
