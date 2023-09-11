<?php
require_once("connect.php");
    if(isset($_GET["cartype_id"])){
        $sql=sprintf("DELETE FROM `car_type` WHERE cartype_id='%s'",
            $_GET["cartype_id"]);
        if($conn->query($sql)===TRUE){
            header("Location: admin_addcartype.php");
        }else{
            die("เกิดข้อผิดพลาดเนื่องจาก". $conn->error);
        }
    }else{
        header("Location: admin_addcartype.php");
    }
?>
<?php
    $conn->close();
?>