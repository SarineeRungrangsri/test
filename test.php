 <!-- <?php

//Database
$data = array();


$link = mysqli_connect("localhost", "root", "", "test");

mysqli_set_charset($link, 'utf8');

if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

$query = "SELECT * FROM schedule_list";

if ($result = $link->query($query)) {

    /* fetch object array */
    while ($obj = $result->fetch_object()) {
       $data[] = array(
                    'id' => $obj->id,
                    'title'=> $obj->title,
                    'start_datetime'=> $obj->start_datetime,
                    'end_datetime'=> $obj->end_datetime
                    );
    }

    /* free result set */
    $result->close();
}

mysqli_close($link);

/*
$array = array(
            array('title'=> 'Long Event',
                    'start'=> '2015-02-07',
                    'end'=> '2015-02-10'),
            array('id'=> 999,
                    'title'=> 'Repeating Event',
                    'start'=> '2015-02-16T16:00:00')
         );
         */

?>

<script>

    $(document).ready(function() {
       
        $('#calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,basicWeek,basicDay'
            },
            defaultDate: '<?php echo date('Y-m-d');?>',
            editable: true,
            eventLimit: true, // allow "more" link when too many events
            events : <?php echo json_encode($data);?>
        });
       
    });

</script>
<h3>ทดสอบ Fullcalendar</h2>


<div id='calendar'></div> -->




<?php 

    $server = "localhost";
    $username = "root";
    $password = "";
    $db = "test";
    //// Create Connection
    // รูปแบบ new mysqli("ชื่อเซิร์ฟเวอร์", "ชื่อผู้ใช้", "รหัสผ่าน", "ชื่อฐานข้อมูล");
    $conn = new mysqli($server, $username, $password, $db);
    //ตรวจสอบการเชื่อมต่อ
    if($conn->connect_error) die("Connection failed! ".$conn->connect_error);
    $conn->query("SET NAMES utf8mb4 COLLATE utf8mb4_unicode_ci");
    //$conn->query("SET NAMES UTF8");
    mysqli_query($conn, "SET NAMES UTF8");
    mysqli_query($conn, "SET character_set_results=utf8");
    mysqli_query($conn, "SET character_set_client=utf8");
    mysqli_query($conn, "SET character_set_connection=utf8");
    date_default_timezone_set("Asia/Bangkok");

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

  </head>
  <body>

  <?php
                $server = "localhost";
    $username = "root";
    $password = "";
    $db = "test";
    //// Create Connection
    // รูปแบบ new mysqli("ชื่อเซิร์ฟเวอร์", "ชื่อผู้ใช้", "รหัสผ่าน", "ชื่อฐานข้อมูล");
    $conn = new mysqli($server, $username, $password, $db);
    //ตรวจสอบการเชื่อมต่อ
    if($conn->connect_error) die("Connection failed! ".$conn->connect_error);
    $conn->query("SET NAMES utf8mb4 COLLATE utf8mb4_unicode_ci");
    //$conn->query("SET NAMES UTF8");
    mysqli_query($conn, "SET NAMES UTF8");
    mysqli_query($conn, "SET character_set_results=utf8");
    mysqli_query($conn, "SET character_set_client=utf8");
    mysqli_query($conn, "SET character_set_connection=utf8");
    date_default_timezone_set("Asia/Bangkok");

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
          
        </div>
        <div class="header-right">
          
          
        </div>
      </header>
      <!-- End Header -->


      <!-- Main -->
      <main class="main-container">
        <div class="main-title">
        </div>

        

        <div class="charts1">

            <div class="charts-card">
              <div id="calendar"></div>
            </div>

  <div class="modal fade" tabindex="-1" data-bs-backdrop="static" id="event-details-modal">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content rounded-0">
                        <div class="modal-header rounded-0">
                            <h5 class="modal-title">รายละเอียดกาจอง</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body rounded-0">
                            <div class="container-fluid">
                                <dl>
                                    <dt class="text-muted">สถานะ</dt>
                                    <dd id="car_status" class="fw-bold fs-4"></dd>
                                    <dt class="text-muted">ในงาน</dt>
                                    <dd id="title" class=""></dd>
                                    <dt class="text-muted">วัตถุประสงค์</dt>
                                    <dd id="description" class=""></dd>
                                    <dt class="text-muted">วัน/เวลาที่เริ่ม</dt>
                                    <dd id="start" class=""></dd>
                                    <dt class="text-muted">วัน/เวลาที่สิ้นสุด</dt>
                                    <dd id="end" class=""></dd>
                                    <dt class="text-muted">ผู้โดยสาร</dt>
                                    <dd id="addper" class=""></dd>
                                    <dt class="text-muted">ปะเภทรถ</dt>
                                    <dd id="id_cartype" class=""></dd>
                                    <dt class="text-muted">เลขทะเบียนรถ</dt>
                                    <dd id="id_car" class=""></dd>
                                </dl>
                            </div>
                        </div>
                        <div class="modal-footer rounded-0">
                            <div class="text-end">
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
