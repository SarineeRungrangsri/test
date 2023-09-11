<?php 
if(!isset($_SESSION)) session_start();
if(!isset($_SESSION["person_status"])){
    header("Location: index.php?error=3");
    exit;
}
if(
    // $_SESSION["stt"]!="ผู้ใช้ระบบ" and
    // $_SESSION["person_status"]!="ผู้จัดสรรรถ" //and
    $_SESSION["person_status"]!="ผู้อนุมัติ" 
    // $_SESSION["stt"]!="ผู้ดูแลระบบ" 
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
                //echo $_SESSION["name_person"] ;?>
          
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
            <a href="approver_bookingcar.php">
              <span class="material-symbols-outlined">table</span> -------- ย้อนกลับ
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
                    
                        <h1 align="center">จัดสรรถ</h1><p></p>

                            <form action="approver_editcheckbookingcar.php" method="post" id="schedule-form">
                   
                            <?php
                        $sql=sprintf("SELECT * FROM `schedule_list` 
                                                INNER JOIN personnel ON personnel.person_id = schedule_list.person_id
                                                -- INNER JOIN department ON personnel.depart_id = department.depart_id
                                                WHERE id=\"%s\" LIMIT 1", 
                            $_GET["id"]);
                        $result=$conn->query($sql) or die("เกิดข้อผิดพลาด เนื่องจาก ". $conn->error);
                        $row=$result->fetch_assoc();
                    ?>
                                <div class="form-group">
                                <div class=" control-label">
                              <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01">รหัสการจอง</label>
                              </div>
                              <input type="text" name="id" required class="form-control" value="<?php echo $row["id"] ?>" readonly>
                            </div>
                              </div>
                                </div>

                                <div class="form-group">
                                <div class=" control-label">
                              <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01">ผู้จอง</label>
                              </div>
                              <input type="text" name="person_name" required class="form-control" value="<?php echo $row["person_name"] ?>" readonly>
                            </div>
                              </div>
                                </div>

                                <div class="form-group">
                                <div class=" control-label">
                              <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01">หัวเรื่อง</label>
                              </div>
                              <input type="text" name="title" required class="form-control" value="<?php echo $row["title"]?>" readonly>
                            </div>
                              </div>
                                </div>

                                <div class="form-group">
                                <div class=" control-label">
                              <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01">วัตถุประสงค์</label>
                              </div>
                              <input type="text" name="description" required class="form-control" value="<?php echo $row["description"]?>" readonly>
                            </div>
                              </div>
                                </div>

                                <div class="form-group">
                                <div class=" control-label">
                              <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01">ตั้งแต่วัน/เวลา</label>
                              </div>
                              <input type="datetime-local" class="form-control " name="start_datetime" id="start_datetime" required value="<?php echo $row["start_datetime"]?>" readonly>
                            </div>
                              </div>
                                </div>

                                <div class="form-group">
                                <div class=" control-label">
                              <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01">ถึงวัน/เวลา</label>
                              </div>
                              <input type="datetime-local" class="form-control " name="end_datetime" id="end_datetime" required value="<?php echo $row["end_datetime"]?>" readonly>
                            </div>
                              </div>
                                </div>

                                <?php 
                                    $sql = "SELECT * FROM personnel";
                                    $result = mysqli_query($conn, $sql);
                                ?>
                                <!-- <div class="form-group md-2">
                                    <label for="addper" class="control-label">ผู้โดยสาร</label>
                                    <select class="category related-post form-control" name="addper" id="addper" multiple>
                                        <option class="" value="" disabled="disabled">เลือกผู้โดยสาร</option>
                                        <?php  while ($fetch = mysqli_fetch_assoc($result)) { ?>
                                            <option value="<?php echo $fetch['name_person'] ?>"></option>
                                        <?php } ?> 
                                    </select>
                                </div> -->
                                <!-- <input type="hidden" name="id_cartype" value="รอ.....">
                                <input type="hidden" name="id_car" value="รอ....."> -->


                                <div class="form-group">
                                <div class=" control-label">
                              <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01">รายการนำสิ่งของออกนอกสถานที่</label>
                              </div>
                              <input type="text" name="inventory" required class="form-control" value="<?php echo $row["inventory"]?>" readonly>
                            </div>
                              </div>
                                </div>

                                <div class="form-group">
                                <div class=" control-label">
                              <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01">ประเภทรถ</label>
                              </div>
                              <?php 
                                    $sql = "SELECT * FROM car_type";
                                    $query = mysqli_query($conn, $sql);
                                ?>
                                    <select name="cartype_id" id="car_type" class="form-control" required>
                                        <option value="" >เลือกประเภทรถ</option>
                                        <?php while($result = mysqli_fetch_assoc($query)): ?>
                                            <option value="<?=$result['cartype_id']?>"><?=$result['car_typename']?></option>
                                        <?php endwhile; ?>
                                    </select>
                            </div>
                              </div>
                                </div>

                                 <div class="form-group">
                                <div class=" control-label">
                              <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01">ป้ายทะเบียน</label>
                              </div>
                              <select name="car_id" id="car" class="form-control" >
                                        <option value="">เลือกป้ายทะเบียน</option>
                                    </select>
                            </div>
                              </div>
                                </div>

                                <div class="form-group">
                                <div class=" control-label">
                              <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01">สถานะ</label>
                              </div>
                                <select class="form-control" name="car_status">
                                        <!-- <option value="รอดำเนินการ" <?php if($row["car_status"]=='รอดำเนินการ') echo "selected";?>>รอดำเนินการ</option> -->
                                        <option value="รอการอนุมัติ" <?php if($row["car_status"]=='รอการอนุมัติ') echo "selected";?>>รอการอนุมัติ</option>
                                    </select>
                            </div>
                              </div>
                                </div>

                                <script src="http://code.jquery.com/jquery-latest.js"></script>

                            <div class="form-group">
                                <div class="">
                                </div>
                                <div align="center">
                                <input onclick="return confirm('ต้องการที่จะบันทึกข้อมูล');" class="btn btn-success" type="submit" name="submit" value="บันทึก"> 
                                <a onclick="return confirm('ต้องการที่จะยกเลิกการเลือกรถ');" class="btn btn-danger" href="approver_bookingcar.php" role="button">ยกเลิก</a>
                                </div>
                            </div>

              

                            </form>
            </div>

        </div>
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

