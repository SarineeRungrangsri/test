<?php
require_once("connect.php");
    if(isset($_GET['person_id'])){
        $sql=sprintf("DELETE FROM `personnel` WHERE person_id ='%s'",
            $_GET['person_id']);
        if($conn->query($sql)===TRUE){
            header("Location: admin_tableperson.php");
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