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
          <!-- <span class="material-icons-outlined">search</span> -->
          <?php //echo '' ;?>
        </div>
        <div class="header-right">
          <!-- <span class="material-icons-outlined">notifications</span>
          <span class="material-icons-outlined">email</span>
          <span class="material-icons-outlined">account_circle</span> -->
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
          
          <!-- <li class="sidebar-list-item">
            <a href="logout.php">
              <span class="material-icons-outlined">logout</span> -------- ออกจากระบบ
            </a>
          </li> -->
          <li class="sidebar-list-item">
            <a href="admin_tablecar.php">
              <span class="material-symbols-outlined">keyboard_return</span> -------- ย้อนกลับ
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

        <div class="main-cards">
<!--  -->
        </div>

        <div class="charts1">

            <div class="charts-card">
            <!-- <p class="chart-title">Purchase and Sales Orders</p>
            <div id="area-chart"></div> -->
                    <!-- <div class="card-header bg-gradient bg-primary text-light">
                        <h5 class="card-title">Schedule Form</h5>
                    </div> -->
                    <form action="admin_savecheckcar.php" method="post" name="add" class="form-horizontal" id="add">
		<h1 align="center">เพิ่มรถ</h1><p></p>
    
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
                                    <select name="cartype_id" class="form-control" required>
                                        <option value="" >เลือกประเภทรถ</option>
                                        <?php while($result = mysqli_fetch_assoc($query)){ ?>
                                            <option value="<?=$result['cartype_id']?>"><?=$result['car_typename']?></option>
                                        <?php } ?>
                                    </select>
  <!-- <input type="text" name="name_type" required class="form-control"> -->
</div>
  </div>
    </div>

    <div class="form-group">
  	 <div class=" control-label">
	<div class="input-group mb-3">
  <div class="input-group-prepend">
    <label class="input-group-text" for="inputGroupSelect01">เลขทะเบียนรถ</label>
  </div>
  <input type="text" name="car_name" required class="form-control">
</div>
  </div>
    </div>
 
	<div class="form-group">
    <div class="">
    </div>
    <div align="center">
       <button class="btn btn-success" type="submit">บันทึก</button>
       <a href="admin_addcar.php" class="btn btn-danger">ยกเลิก</a>
    </div>
  </div>
	</form>
            </div>

<div class="charts-card">
            <div class="form-group">
              <table id="myTable" class="display" style="width: 100%;">
              <h1 align="center">รถทั้งหมด</h1><p></p>
                        <thead>
            <tr>
                <th>#</th>
                <th>เลขทะเบียนรถ</th>
                <th>ประเภทรถ</th>
                <th>เครื่องมือ</th>
            </tr>
        </thead>
        <tbody>
            <tr>
              <?php
              require_once('connect.php');
    
                                        $sql=sprintf("SELECT * FROM `car` 
                                                               INNER JOIN car_type ON car_type.cartype_id = car.cartype_id
                                                               ");
                                        $result=$conn->query($sql) or die("เกิดข้อผิดพลาด เนื่องจาก".$conn->error);
                                        if($result->num_rows<0){
                                            printf("<tr><td>ไม่มีข้อมูล</td></tr>");
                                        }else{
                                            while($row=$result->fetch_assoc()){
                                    ?>
                                    
                <td><?php echo $row["car_id"];?></td>
                <td><?php echo $row["car_name"];?></td>
                <td><?php echo $row["car_typename"];?></td>
                <td>
                  <a onclick="return confirm('ต้องการที่จะแก้ไขข้อมูล');" class="btn btn-warning" href="admin_editcar.php?car_id=<?php echo $row['car_id']; ?>">แก้ไข</a>           
                  <a onclick="return confirm('ต้องการที่จะลบข้อมูล');" class="btn btn-danger" href="admin_deletecar.php?car_id=<?php echo $row['car_id']; ?>">ลบ</a> 
                </td>
          </tr>
            <?php
                                            }
                                        }
                                    ?>
            
        </tbody>
                    </table>
            </div>
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

