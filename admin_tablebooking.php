<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.10/dist/sweetalert2.min.css">

<a id="alert"></a>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.10/dist/sweetalert2.all.min.js"></script>

<?php 
// if(!isset($_SESSION)) session_start();
// if(!isset($_SESSION["person_status"])){
//     header("Location: index.php?error=3");
//     exit;
// }
// if( $_SESSION["person_status"]!="ผู้ใช้ระบบ" //and
//     // $_SESSION["stt"]!="ผู้จัดสรรรถ" and
//     // $_SESSION["stt"]!="ผู้อนุมัติ" //and
//     // $_SESSION["stt"]!="ผู้ดูแลระบบ" 
//     ){
//     // require_once('sweetalert/sweetalert.php'); 
//     exit;
// }
require_once('connect.php');
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>หน้าหลัก</title>

    <!-- Montserrat Font -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/styles.css">
    <style>
      img {
          border-radius: 50%;
      }
    </style>
  </head>
 
<body>

        <!-- <script>
          Swal.fire({
          position: 'center',
          icon: 'success',
          title: 'ยินดีต้อนรับ',
          showConfirmButton: false,
          timer: 2500,})
        </script> -->

    <div class="grid-container">

      <!-- Header -->
      <header class="header">
        <div class="menu-icon" onclick="openSidebar()">
          <span class="material-icons-outlined">menu</span>
        </div>
        <div class="header-left">
          <?php //echo $_SESSION["stt"] ;?>
        </div>
        <div class="header-right">
          <?php 
          // ECHO '<img src = "pic/'.$_SESSION["pic"].'" alt="Image" style="width:50px;height:50px;">';
              echo 'Admin' ;?>
        </div>
      </header>
      <!-- End Header -->
      <!-- Sidebar -->
      <aside id="sidebar">
        <div class="sidebar-title">
          <div class="sidebar-brand">
            <span class="material-icons-outlined">inventory</span> จัดสรรรถส่วนกลาง
          </div>
          <span class="material-icons-outlined" onclick="closeSidebar()">close</span>
        </div>

        <ul class="sidebar-list">
          <li class="sidebar-list-item">
            <a href="admin_home.php">
              <span class="material-symbols-outlined">keyboard_return</span> -------- ย้อนกลับ
            </a>
          </li>
        </ul>
      </aside>
      <!-- End Sidebar -->
      <main class="main-container">
          <div class="charts1">

              <!-- <div class="form-group col-12"><h3></h3>
                <a type="button" name="button" class="btn btn-info" href="user_addbooking.php">
                  <span class="material-symbols-outlined">add</span>เพิ่มการจอง
                </a>
              </div> -->

          <div class="charts-card">

    <table id="myTable" class="display" style="width: 100%;">
    <h1 align="center">การจองทั้งหมด</h1><p></p>
        <thead>
            <tr>
                <th>รหัส</th>
                <th>งาน</th>
                <th>วัตถุประสงค์</th>
                <th>วัน/เวลา(เริ่ม)</th>
                <th>วัน/เวลา(สิ้นสุด)</th>
                <th>สิ่งของ</th>
                <th>ผู้จอง</th>
                <!-- <th>#</th> -->
            </tr>
        </thead>
        <tbody>
            <tr>
              <?php
              require_once('connect.php');
    
                                        $sql=sprintf("SELECT * FROM `schedule_list` INNER JOIN personnel ON personnel.person_id = schedule_list.person_id");
                                        $result=$conn->query($sql) or die("เกิดข้อผิดพลาด เนื่องจาก".$conn->error);
                                        if($result->num_rows<0){
                                            printf("<tr><td>ไม่มีข้อมูล</td></tr>");
                                        }else{
                                            while($row=$result->fetch_assoc()){
                                    ?>
                                    
                <td><?php echo $row["id"];?></td>
                <td><?php echo $row["title"];?></td>
                <td><?php echo $row["description"];?></td>
                <td><?php echo $row["start_datetime"];?></td>
                <td><?php echo $row["end_datetime"];?></td>
                <td><?php echo $row["inventory"];?></td>
                <td><?php echo $row["person_name"];?></td>
                <!-- <td>
                  <a onclick="return confirm('ต้องการที่จะแก้ไขข้อมูล');" class="text-orange" href="user_editbooking.php?id=<?php echo $row['id']; ?>"><span class="material-symbols-outlined">update</span></a>
                  <a onclick="return confirm('ต้องการที่จะลบข้อมูล');" class="text-danger" href="user_deletebooking.php?id=<?php echo $row['id']; ?>"><span class="material-symbols-outlined">delete</span></a>
                </td> -->
            </tr>
            <?php
                                            }
                                        }
                                    ?>
            
        </tbody>
    </table>

 
</div>
        </div>
</main>
      <!-- End Main -->
    <!-- Scripts -->
    <script src="sweetalert2.all.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="sweetalert2.min.js"></script>
<link rel="stylesheet" href="sweetalert2.min.css">
    <!-- ApexCharts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.35.3/apexcharts.min.js"></script>
    <!-- Custom JS -->
    <script src="js/scripts.js"></script>
    <!-- Calendar -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.js"></script>
    <script src="script.js"></script>
    <script>
        var scheds = $.parseJSON('<?= json_encode($sched_res) ?>')
    </script>
    <!-- ฺBootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.css">
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" />
    <script>
        $(document).ready(function () {
            $("#myTable").DataTable();
        });
    </script>
  </body>
</html>