<?php
require_once("connect.php");
    if(isset($_GET["id"])){
        $sql=sprintf("DELETE FROM `schedule_list` WHERE id='%s'",
            $_GET["id"]);
        if($conn->query($sql)===TRUE){
            header("Location: approver_tablebooking.php");
        }else{
            die("เกิดข้อผิดพลาดเนื่องจาก". $conn->error);
        }
    }else{
        header("Location: approver_tablebooking.php");
    }
?>
<?php
    $conn->close();
?>