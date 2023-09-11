<?php 
    require_once('connect.php');

    // if($_SERVER['REQUEST_METHOD'] !='POST'){
    //     echo "<script> alert('Error: No data to save.'); location.replace('admin_tablecar.php') </script>";
    //     $conn->close();
    //     exit;
    // }

    // extract($_POST);
    // $allday = isset($allday);

    // if(empty($id_cartype)){
    //     $sql = "INSERT INTO `car_type` (`name_type` ) 
    //                 VALUES ( '$name_type')";
    // }else{
    //     $sql = "UPDATE `car_type` set `name_type` = '{$name_type}'  
    //                                     where `id_cartype` = '{$id_cartype}'
    //                                     ";
    // }

    // $save = $conn->query($sql);

    // // echo "$id_cartype";
    // // echo "$name_type";

    // if($save){
    //     echo "<script> alert('Schedule Successfully Saved.'); location.replace('admin_tablecar.php') </script>";
    // }else{
    //     echo "<pre>";
    //     echo "An Error occured.<br>";
    //     echo "Error: ".$conn->error."<br>";
    //     echo "SQL: ".$sql."<br>";
    //     echo "</pre>";
    // }
    
    // $conn->close();

    $sql=sprintf("INSERT INTO `car_type` (`car_typename`) 
                                        VALUES ( '%s')", 
                                        $_POST['car_typename'],
                                        );
        if($conn->query($sql)===TRUE){
            header("Location: admin_addcartype.php");
        }else{
            die("เกิดข้อผิดพลาด เนื่องจาก ". $conn->error);
        }
?>
<?php 
$conn->close();
?>