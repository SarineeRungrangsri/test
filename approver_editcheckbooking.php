<?php
require_once("connect.php");
//$filename=mktime(date('H'), date('i'), date('s'), date('m'), date('Y')).".jpg";
//$filename=$_POST["member_id"].".jpg";
//copy($_FILES["member_picture"]["tmp_name"], "images/".$filename);
$sql = sprintf(
    "UPDATE `schedule_list` SET 
        	title=\"%s\",
            description=\"%s\",
            start_datetime=\"%s\",
            end_datetime=\"%s\",
            inventory=\"%s\",
            person_id=\"%s\" WHERE id=\"%s\" ",
        $_POST['title'],
        $_POST['description'],
        $_POST['start_datetime'],
        $_POST['end_datetime'],
        $_POST['inventory'],
        $_POST['person_id'],
        $_POST['id']);
if ($conn->query($sql) === TRUE) {
    header("Location: approver_tablebooking.php");
    exit;
} else {
    die("เกิดข้อผิดพลาด เนื่องจาก " . $conn->error);
}
?>
<?php
$conn->close();
?>
