
<meta charset="UTF-8">
<?php
//1. เชื่อมต่อ database: 
include('connect.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี

//สร้างตัวแปรสำหรับรับค่าที่นำมาแก้ไขจากฟอร์ม
  $person_id = $_POST["person_id"];
        $person_name=$_POST['person_name'];
        $person_username=$_POST['person_username'];
        $dperson_pass=$_POST['person_pass'];
        $depart_id=$_POST['depart_id'];
        $posi_id=$_POST['posi_id'];
        $person_status=$_POST['person_status'];
//ทำการปรับปรุงข้อมูลที่จะแก้ไขลงใน database 
  
  $sql = sprintf(
    "UPDATE `personnel` SET 
        person_name=\"%s\",
        person_username=\"%s\",
        person_pass=\"%s\",
        depart_id=\"%s\",
        posi_id=\"%s\",
        person_status=\"%s\" WHERE person_id=\"%s\" ",
        $_POST['person_name'],
        $_POST['person_username'],
        $_POST['person_pass'],
        $_POST['depart_id'],
        $_POST['posi_id'],
        $_POST['person_status'],
        $_POST['person_id']);
if ($conn->query($sql) === TRUE) {
    header("Location: admin_tableperson.php");
} else {
    die("เกิดข้อผิดพลาด เนื่องจาก " . $conn->error);
}
?>
<?php
$conn->close();
?>

