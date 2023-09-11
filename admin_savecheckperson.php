<?php 
    require_once('connect.php');

    $sql=sprintf("INSERT INTO `personnel` (`person_name`,`person_username`,`person_pass`,`depart_id`,`posi_id`,`person_status`) 
                                        VALUES ( '%s', '%s','%s', '%s', '%s', '%s')", 
                                        // $_POST['person_id'],
                                        $_POST['person_name'],
                                        $_POST['person_username'],
                                        $_POST['person_pass'],
                                        $_POST['depart_id'],
                                        $_POST['posi_id'],
                                        $_POST['person_status']
                                        );
        if($conn->query($sql)===TRUE){
            header("Location: admin_tableperson.php");
        }else{
            die("เกิดข้อผิดพลาด เนื่องจาก ". $conn->error);
        }
?>
<?php 
$conn->close();
?>