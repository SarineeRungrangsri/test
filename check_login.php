<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.10/dist/sweetalert2.min.css">

<a id="alert"></a>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.10/dist/sweetalert2.all.min.js"></script>
 
<?php
if(!isset($_SESSION)) session_start();
    require_once("connect.php");
    if(isset($_POST["username"]) and isset($_POST["password"])){
        $sql=sprintf("SELECT * FROM `personnel` WHERE `person_username`=\"%s\"  and `person_pass`=\"%s\" LIMIT 1",
            $_POST["username"],
            $_POST["password"]);
        $result=$conn->query($sql) or die($conn->error); //เกิดการคิวรี่=สอบถามข้อมูล
        if($_POST["username"] == "admin" and $_POST["password"] == "admin"){
                echo "
                    <script>
                        Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'ยินดีต้อนรับ Admin',
                        showConfirmButton: false,
                        timer: 2500,
                        }).then(function() {
                            window.location = 'admin_home.php';
                        });
                    </script>";
                exit;
        } else
        if($result->num_rows>0){                         //ตรวจสอบว่ามีข้อมูลมั้ยถ้ามีจะ > 0
            $row=$result->fetch_assoc();                 //ใช้สำหรับอ่านข้อมูลครั้งละ 1 แถว
            // printf("username %s <Br>", $row["username"]);
            // print_rใช้แสดงผลเป็นอาร์เรย์
            if($row["person_status"]=="ผู้ใช้ระบบ"){
                $_SESSION["person_id"]=$row["person_id"];
                $_SESSION["person_name"]=$row["person_name"];
                $_SESSION["person_username"]=$row["person_username"];
                $_SESSION["person_pass"]=$row["person_pass"];
                $_SESSION["posi_id"]=$row["posi_id"];
                $_SESSION["person_status"]=$row["person_status"];
                echo "
                    <script>
                        Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'ยินดีต้อนรับ $_SESSION[person_name]',
                        showConfirmButton: false,
                        timer: 2500,
                        }).then(function() {
                            window.location = 'approver_home.php';
                        });
                    </script>";
                exit;
            }
            if($row["person_status"]=="ผู้จัดสรรรถ"){
                $_SESSION["person_id"]=$row["person_id"];
                $_SESSION["person_name"]=$row["person_name"];
                $_SESSION["person_username"]=$row["person_username"];
                $_SESSION["person_pass"]=$row["person_pass"];
                $_SESSION["posi_id"]=$row["posi_id"];
                $_SESSION["person_status"]=$row["person_status"];
                echo "
                    <script>
                        Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'ยินดีต้อนรับ $_SESSION[person_name]',
                        showConfirmButton: false,
                        timer: 2500,
                        }).then(function() {
                            window.location = 'approver_home.php';
                        });
                    </script>";
                exit;
            }
            if($row["person_status"]=="ผู้อนุมัติ"){
                $_SESSION["person_id"]=$row["person_id"];
                $_SESSION["person_name"]=$row["person_name"];
                $_SESSION["person_username"]=$row["person_username"];
                $_SESSION["person_pass"]=$row["person_pass"];
                $_SESSION["posi_id"]=$row["posi_id"];
                $_SESSION["person_status"]=$row["person_status"];
                echo "
                    <script>
                        Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'ยินดีต้อนรับ $_SESSION[person_name]',
                        showConfirmButton: false,
                        timer: 2500,
                        }).then(function() {
                            window.location = 'approver_home.php';
                        });
                    </script>";
                exit;
            }
        }
        else 
            echo "
                    <script>
                        Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'ชื่อผู้ใช้ หรือ รหัสผ่านผิด',
                        showConfirmButton: false,
                        timer: 2500,
                        }).then(function() {
                            window.location = 'index.php';
                        });
                    </script>";
            exit;
    }else {
        echo "
                    <script>
                        Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'ชื่อผู้ใช้ หรือ รหัสผ่านผิด',
                        showConfirmButton: false,
                        timer: 2500,
                        }).then(function() {
                            window.location = 'index.php';
                        });
                    </script>";
        exit;
    }
    $conn->close();
?>