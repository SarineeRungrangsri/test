<?php 
// if(!isset($_SESSION)) session_start();
// if(!isset($_SESSION["stt"])){
//     header("Location: index.php?error=3");
//     exit;
// }
// if(// $_SESSION["stt"]!="ผู้ใช้ระบบ" and
//     // $_SESSION["stt"]!="ผู้จัดสรรรถ" and
//     // $_SESSION["stt"]!="ผู้อนุมัติ" and
//     $_SESSION["stt"]!="ผู้ดูแลระบบ" ){
//     require_once('sweetalert/sweetalert.php');
//     exit;
// }
include_once('connect.php');
?>
<!DOCTYPE html>
<html lang="en">
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
    <?php
require_once('connect.php');

$schedules = $conn->query("SELECT * FROM `schedule_list`
                                              WHERE car_status = 'อนุมัติ' 
                                              -- INNER JOIN status ON status.status_id = schedule_list.status  
                                              ORDER BY id ASC");
$sched_res = [];

foreach ($schedules->fetch_all(MYSQLI_ASSOC) as $row) {
  $row['sdate'] = date("F d, Y h:i A", strtotime($row['start_datetime']));
  $row['edate'] = date("F d, Y h:i A", strtotime($row['end_datetime']));
  $sched_res[$row['id']] = $row;
}

if (isset($conn)) //$conn->close();
?>
  </head>
  <body>
    <div class="grid-container">

      <!-- Header -->
      <header class="header">
        <div class="menu-icon" onclick="openSidebar()">
          <span class="material-icons-outlined">menu</span>
        </div>
        <div class="header-left">
          <?php //echo $_SESSION["preson_status"] ;?>
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
            <a href="admin_tableperson.php" >
              <span class="material-symbols-outlined">person_add</span> -------- เพิ่มข้อมูลผู้ใช้
            </a>
          </li>
          <li class="sidebar-list-item">
            <a href="admin_tablecar.php" >
              <span class="material-symbols-outlined">garage</span> -------- เพิ่มข้อมูลรถ
            </a>
          </li>
          <li class="sidebar-list-item">
            <a href="admin_tablebooking.php">
              <span class="material-symbols-outlined">table</span> -------- ตารางกาจอง
            </a>
          </li>
          <!-- <li class="sidebar-list-item">
            <a href="table_print.php">
              <span class="material-symbols-outlined">print</span> -------- พิมพ์
            </a>
          </li> -->
          <li class="sidebar-list-item">
            <a href="logout.php">
              <span class="material-icons-outlined">logout</span> -------- ออกจากระบบ
            </a>
          </li>
        </ul>
      </aside>
      <!-- End Sidebar -->

      <!-- Main -->
      <main class="main-container">
        <div class="main-title">
          <!-- <p class="font-weight-bold">หน้าหลัก</p> -->
        </div>

        <div class="main-cards">

          <div class="card">
            <div class="card-inner">
              <p class="text-primary">ทั้งหมด</p>
              <span class="material-icons-outlined text-blue">inventory_2</span>
            </div>
            <span class="text-primary font-weight-bold">
                <?php
                    // $sql1 = mysqli_query($conn, "SELECT COUNT(*) FROM schedule_list");
                    // $x1 = mysqli_fetch_assoc($sql1);
                ?>
                <?php //echo end($x1) ?>
            </span>
          </div>

          <div class="card">
            <div class="card-inner">
              <p class="text-primary">กำลังดำเนินการ</p>
              <span class="material-icons-outlined text-orange">hourglass_top</span>
            </div>
            <span class="text-primary font-weight-bold">
                <?php
                    // $sql1 = mysqli_query($conn, "SELECT COUNT(*) FROM schedule_list WHERE status = '1' ");
                    // $x2 = mysqli_fetch_assoc($sql1);
                ?>
                <?php //echo end($x2) ?>
            </span>
          </div>

          <div class="card">
            <div class="card-inner">
              <p class="text-primary">อนุมัติ</p>
              <span class="material-icons-outlined text-green">event_available</span>
            </div>
            <span class="text-primary font-weight-bold">
                <?php
                    // $sql1 = mysqli_query($conn, "SELECT COUNT(*) FROM schedule_list WHERE status = '2' ");
                    // $x2 = mysqli_fetch_assoc($sql1);
                ?>
                <?php //echo end($x2) ?>
            </span>
          </div>

          <div class="card">
            <div class="card-inner">
              <p class="text-primary">ไม่อนุมัติ</p>
              <span class="material-icons-outlined text-red">event_busy</span>
            </div>
            <span class="text-primary font-weight-bold">
                <?php
                    // $sql1 = mysqli_query($conn, "SELECT COUNT(*) FROM schedule_list WHERE status = '3' ");
                    // $x2 = mysqli_fetch_assoc($sql1);
                ?>
                <?php //echo end($x2) ?>
            </span>
          </div>

        </div>

        <div class="charts">

          <div class="charts-card">
            <div id="calendar"></div> 
          </div>

          <div class="charts-card">
            <a target="_blank" href="report_user.php">รายงานรายชื่อผู้ใช้</a><br>
            <a target="_blank" href="#">รายงานรายชื่อผู้ใช้</a>
          </div>
          
        </div>
      </main>
      <!-- End Main -->

    </div>

    <!-- Scripts -->
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
    
  </body>
</html>