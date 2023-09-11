<?php 
if(!isset($_SESSION)) session_start();
if(!isset($_SESSION["person_status"])){
    header("Location: index.php?error=3");
    exit;
}
if(
    $_SESSION["person_status"]!="ผู้ใช้ระบบ" and
    $_SESSION["person_status"]!="ผู้จัดสรรรถ" and
    $_SESSION["person_status"]!="ผู้อนุมัติ" 
    ){
    // require_once('sweetalert/sweetalert.php');
    exit;
}
require_once('connect.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>ทดสอบ</title>

    <!-- Montserrat Font -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/styles.css">

    <!-- ฺBootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.css">
    
    <!--  -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha256-aAr2Zpq8MZ+YA/D6JtRD3xtrwpEz2IqOS+pWD/7XKIw=" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha256-OFRAJNoaD8L3Br5lglV7VyLRf0itmoBzWUoM+Sji4/8=" crossorigin="anonymous"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script> -->
<style>
      img {
          border-radius: 50%;
      }
    </style>
  </head>
  <body>

  <?php
            require_once('connect.php');

            $schedules = $conn->query("SELECT * FROM `schedule_list`
                                              WHERE car_status = 'อนุมัติ'
                                              -- INNER JOIN status ON status.status_id = schedule_list.status  
                                              ORDER BY id ASC");
            $sched_res = [];

            foreach($schedules->fetch_all(MYSQLI_ASSOC) as $row){
                $row['sdate'] = date("F d, Y h:i A",strtotime($row['start_datetime']));
                $row['edate'] = date("F d, Y h:i A",strtotime($row['end_datetime']));
                $sched_res[$row['id']] = $row;
            }

            if(isset($conn)) //$conn->close();
        ?>
        
    <div class="grid-container">

      <!-- Header -->
      <header class="header">
        <div class="menu-icon" onclick="openSidebar()">
          <span class="material-icons-outlined">menu</span>
        </div>
        <div class="header-left">
          <?php echo $_SESSION["person_status"] ;?>
        </div>
        <div class="header-right">
          <?php 
                // ECHO '<img src = "pic/'.$_SESSION["pic"].'" alt="Image" style="width:50px;height:50px;">';
                echo $_SESSION["person_name"] ;?>
          
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
            <a href="approver_tablebooking.php">
              <span class="material-symbols-outlined">table</span> -------- การจองของฉัน
            </a>
          </li>
          <li class="sidebar-list-item">
            <a href="approver_tableallbooking.php">
              <span class="material-symbols-outlined">table</span> -------- การจองทั้งหมด
            </a>
          </li>
          <li class="sidebar-list-item">
            <a href="approver_bookingcar.php">
              <span class="material-symbols-outlined">table</span> -------- การจัดรถ
            </a>
          </li>
          <li class="sidebar-list-item">
            <a href="approver_approver.php">
              <span class="material-symbols-outlined">table</span> -------- การอนุมัติ
            </a>
          </li>
          <li class="sidebar-list-item">
            <a href="approver_print.php">
              <span class="material-symbols-outlined">table</span> -------- พิมพ์
            </a>
          </li>
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
          <!-- <p class="font-weight-bold">ผู้ใช้</p> -->
        </div>

        <!-- <div class="main-cards">

          <div class="card">
            <div class="card-inner">
              <p class="text-primary">ทั้งหมด</p>
              <span class="material-icons-outlined text-blue">inventory_2</span>
            </div>
            <span class="text-primary font-weight-bold">
                <?php
                    $sql1 = mysqli_query($conn, "SELECT COUNT(*) FROM schedule_list");
                    $x1 = mysqli_fetch_assoc($sql1);
                ?>
                <?php echo end($x1) ?>
            </span>
          </div>

          <div class="card">
            <div class="card-inner">
              <p class="text-primary">กำลังดำเนินการ</p>
              <span class="material-icons-outlined text-orange">hourglass_top</span>
            </div>
            <span class="text-primary font-weight-bold">
                <?php
                    $sql1 = mysqli_query($conn, "SELECT COUNT(*) FROM schedule_list WHERE status = '1' ");
                    $x2 = mysqli_fetch_assoc($sql1);
                ?>
                <?php echo end($x2) ?>
            </span>
          </div>

          <div class="card">
            <div class="card-inner">
              <p class="text-primary">อนุมัติ</p>
              <span class="material-icons-outlined text-green">event_available</span>
            </div>
            <span class="text-primary font-weight-bold">
                <?php
                    $sql1 = mysqli_query($conn, "SELECT COUNT(*) FROM schedule_list WHERE status = '2' ");
                    $x2 = mysqli_fetch_assoc($sql1);
                ?>
                <?php echo end($x2) ?>
            </span>
          </div>

          <div class="card">
            <div class="card-inner">
              <p class="text-primary">ไม่อนุมัติ</p>
              <span class="material-icons-outlined text-red">event_busy</span>
            </div>
            <span class="text-primary font-weight-bold">
                <?php
                    $sql1 = mysqli_query($conn, "SELECT COUNT(*) FROM schedule_list WHERE status = '3' ");
                    $x2 = mysqli_fetch_assoc($sql1);
                ?>
                <?php echo end($x2) ?>
            </span>
          </div>

        </div> -->

        <div class="charts1">

            <div class="charts-card">
              <div id="calendar"></div>
            </div>

  <div class="modal fade" tabindex="-1" data-bs-backdrop="static" id="event-details-modal">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content rounded-0">
                        <div class="modal-header rounded-0">
                            <h5 class="modal-title">Schedule Details</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body rounded-0">
                            <div class="container-fluid">
                                <dl>
                                    <dt class="text-muted">สถานะ</dt>
                                    <dd id="status_name" class="fw-bold fs-4"></dd>
                                    <dt class="text-muted">ในงาน</dt>
                                    <dd id="title" class="fw-bold fs-4"></dd>
                                    <dt class="text-muted">วัตถุประสงค์</dt>
                                    <dd id="description" class=""></dd>
                                    <dt class="text-muted">วัน/เวลาที่เริ่ม</dt>
                                    <dd id="start" class=""></dd>
                                    <dt class="text-muted">วันเวลาที่สิ้นสุด</dt>
                                    <dd id="end" class=""></dd>
                                    <dt class="text-muted">ผู้โดยสาร</dt>
                                    <dd id="addper" class=""></dd>
                                    <dt class="text-muted">ประเภทรถ</dt>
                                    <dd id="id_cartype" class=""></dd>
                                    <dt class="text-muted">เลขทะเบียนรถ</dt>
                                    <dd id="id_car" class=""></dd>
                                </dl>
                            </div>
                        </div>
                        <div class="modal-footer rounded-0">
                            <div class="text-end">
  <!-- <button type="button" class="btn btn-primary btn-sm rounded-0" id="edit" data-id="">Add car</button> -->
  <!-- <button type="button" class="btn btn-danger btn-sm rounded-0" id="delete" data-id="">Delete</button> -->
  <button type="button" class="btn btn-secondary btn-sm rounded-0" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
  <!--End Event Details Modal -->
  
      </main>
      <!-- End Main -->

    </div>
    <!-- End grid-container-->
    
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

    <!-- <title>php select2 multiple select example tutorial</title> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha256-aAr2Zpq8MZ+YA/D6JtRD3xtrwpEz2IqOS+pWD/7XKIw=" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha256-OFRAJNoaD8L3Br5lglV7VyLRf0itmoBzWUoM+Sji4/8=" crossorigin="anonymous"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>


    <script type="text/javascript">
        $(document).ready(function() {
            $('.category').select2();
        });
    </script>
  </body>
</html>
