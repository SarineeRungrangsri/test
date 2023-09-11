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
          
          <!-- <li class="sidebar-list-item">
            <a href="logout.php">
              <span class="material-icons-outlined">logout</span> -------- ออกจากระบบ
            </a>
          </li> -->
          <li class="sidebar-list-item">
            <a href="admin_tableperson.php">
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
		<h1 align="center">แก้ไขข้อมูลผู้ใช้</h1><p></p>

    <?php if (isset($_GET['error'])): ?>
        <p><?php echo $_GET['error']?></p>
    <?php endif ?>
 <form action="admin_editcheckperson.php" method="post" class="form-horizontal" enctype="multipart/form-data">
      
      <?php
                        $sql=sprintf("SELECT * FROM `personnel` 
                                                INNER JOIN position ON  personnel.posi_id = position.posi_id
                                                INNER JOIN department ON personnel.depart_id = department.depart_id
                                                WHERE person_id=\"%s\" LIMIT 1", 
                            $_GET['person_id']);
                        $result=$conn->query($sql) or die("เกิดข้อผิดพลาด เนื่องจาก ". $conn->error);
                        $row=$result->fetch_assoc();
                    ?>
  
  <div class="form-group">
  	 <div class=" control-label">
	<div class="input-group mb-3">
  <div class="input-group-prepend">
    <label class="input-group-text" for="inputGroupSelect01">รหัส</label>
  </div>
  <input type="text" name="person_id" required class="form-control" placeholder="ภาษาไทย" value="<?php echo $row["person_id"];?>" readonly>
</div>
  </div>
    </div>

  <div class="form-group">
  	 <div class=" control-label">
	<div class="input-group mb-3">
  <div class="input-group-prepend">
    <label class="input-group-text" for="inputGroupSelect01">ชื่อ-สกุล</label>
  </div>
  <input type="text" name="person_name" required class="form-control" placeholder="ภาษาไทย" value="<?php echo $row["person_name"];?>">
</div>
  </div>
    </div>
 
    <div class="form-group">
  	 <div class=" control-label">
	<div class="input-group mb-3">
  <div class="input-group-prepend">
    <label class="input-group-text" for="inputGroupSelect01">ชื่อผู้ใช้</label>
  </div>
  <input type="text" name="person_username" required class="form-control" placeholder="ชื่อภาษาอังกฤษ" value="<?php echo $row["person_username"];?>">
</div>
  </div>
    </div>
 
  <div class="form-group">
  	 <div class=" control-label">
	<div class="input-group mb-3">
  <div class="input-group-prepend">
    <label class="input-group-text" for="inputGroupSelect01">รหัสผ่าน</label>
  </div>
  <input type="password" name="person_pass" required class="form-control" placeholder="อย่างน้อย 8 ตัว" value="<?php echo $row["person_pass"];?>">
</div>
  </div>
    </div>

  <div class="form-group">
  	 <div class=" control-label">
	<div class="input-group mb-3">
  <div class="input-group-prepend">
    <label class="input-group-text" for="inputGroupSelect01">แผนก</label>
  </div>
                                <?php 
                                    $sql = "SELECT * FROM department";
                                    $query = mysqli_query($conn, $sql);
                                ?>
                                    <select name="depart_id" class="form-control" required>
                                        <option><?php echo $row["depart_id"];?><?php echo $row["depart_name"];?></</option>
                                        <?php while($result = mysqli_fetch_assoc($query)){ ?>
                                            <option value="<?=$result['depart_id']?>"><?=$result['depart_name']?></option>
                                        <?php } ?>
                                    </select>
</div>
  </div>
    </div>

    <div class="form-group">
  	 <div class=" control-label">
	<div class="input-group mb-3">
  <div class="input-group-prepend">
    <label class="input-group-text" for="inputGroupSelect01">ตำแหน่ง</label>
  </div>
                                <?php 
                                    $sql = "SELECT * FROM position ";
                                    $query = mysqli_query($conn, $sql);
                                ?>
                                    <select name="posi_id" class="form-control" required>
                                        <option><?php echo $row["posi_id"];?><?php echo $row["posi_name"];?></option>
                                        <?php while($result = mysqli_fetch_assoc($query)){ ?>
                                            <option value="<?=$result['posi_id']?>"><?=$result['posi_name']?></option>
                                        <?php } ?>
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
  <select name="person_status" class="custom-select" id="inputGroupSelect01" required>
    <option selected><?php echo $row["person_status"];?></option>
    <option value="ผู้ใช้ระบบ">ผู้ใช้ระบบ</option>
    <option value="ผู้จัดสรรรถ">ผู้จัดสรรรถ</option>
    <option value="ผู้อนุมัติ">ผู้อนุมัติ</option>
    <!-- <option value="ผู้ดูแลระบบ">ผู้ดูแลระบบ</option> -->
  </select>
</div>
  </div>
    </div>

	<div class="form-group">
    <div class="">
    </div>
    <div align="center">
       <input class="btn btn-success" type="submit" name="submit" value="บันทึก"> 
       <button href="admin_tableperson.php" class="btn btn-danger">ยกเลิก</button>
    </div>
  </div>
 </form>
	<!-- </form> -->
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

