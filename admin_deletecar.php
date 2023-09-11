<?php
require_once("connect.php");
    if(isset($_GET["car_id"])){
        $sql=sprintf("DELETE FROM `car` WHERE car_id='%s'",
            $_GET["car_id"]);
        if($conn->query($sql)===TRUE){
            header("Location: admin_addcar.php");
        }else{
            die("เกิดข้อผิดพลาดเนื่องจาก". $conn->error);
        }
    }else{
        header("Location: admin_addcar.php");
    }
?>
<?php
    $conn->close();
?>