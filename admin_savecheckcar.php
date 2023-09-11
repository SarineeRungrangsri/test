<?php 
    require_once('connect.php');

    $sql=sprintf("INSERT INTO `car` (`car_name`,`cartype_id` ) 
                                        VALUES ( '%s','%s')", 
                                        $_POST['car_name'],
                                        $_POST['cartype_id'],
                                        );
        if($conn->query($sql)===TRUE){
            header("Location: admin_addcar.php");
        }else{
            die("เกิดข้อผิดพลาด เนื่องจาก ". $conn->error);
        }
?>
<?php 
$conn->close();
?>