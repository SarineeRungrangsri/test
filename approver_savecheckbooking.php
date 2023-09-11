<?php 
    require_once('connect.php');

    // $sql1 = "SELECT * from `schedule_list `
    //                 INNER JOIN personnel ON personnel.person_name = schedule_list.person_name
    //                 ";

    $sql=sprintf("INSERT INTO `schedule_list` (`title`,`description`,`start_datetime`,`end_datetime`,`inventory`,`person_id`,`car_status`) 
                                        VALUES ( '%s', '%s','%s', '%s', '%s', '%s', '%s')", 
                                        // $_POST['person_id'],
                                        $_POST['title'],
                                        $_POST['description'],
                                        $_POST['start_datetime'],
                                        $_POST['end_datetime'],
                                        $_POST['inventory'],
                                        $_POST['person_id'],
                                        $_POST['car_status']
                                        );
        if($conn->query($sql)===TRUE){
            header("Location: approver_tablebooking.php");
        }else{
            die("เกิดข้อผิดพลาด เนื่องจาก ". $conn->error);
        }
?>
<?php 
$conn->close();
?>