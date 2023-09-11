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
    <title>หน้าหลัก</title>

    <!-- Montserrat Font -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/styles.css">
    
  </head>
  <body>
    <script>
        Swal.fire('Any fool can use a computer')
    </script>
    <style>
      img {
          border-radius: 50%;
      }
    </style>
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
          <li class="sidebar-list-item" >
            <a href="admin_home.php">
              <span class="material-symbols-outlined">keyboard_return</span> -------- ย้อนกลับ
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
        </div> 

        <div class="charts1">
              <div class="form-group col-12"><h3></h3>
                <a type="button" name="button" class="btn btn-primary" href="admin_addperson.php">
                  <span class="material-symbols-outlined">add</span>เพิ่ม
                </a>
              </div>
          <div class="charts-card">
            <!-- <p class="chart-title">Top 5 Products</p>
            <div id="bar-chart"></div> -->
            <!-- <div id="calendar"></div>  -->
            <?php
    include_once "connect.php";

    // $contrasena = "";
    // $usuario = "root";
    // $nombre_bd = "my_db";
    // try {
    //     $bd = new PDO (
    //         'mysql:host=localhost;
    //         dbname='.$nombre_bd,
    //         $usuario,
    //         $contrasena,
    //         array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
    //     );
    // } catch (Exception $e) {
    //     echo "Problema con la conexion: ".$e->getMessage();
    // }

    // $sentencia = $bd -> query("select * from personnel
    //                                             INNER JOIN position ON  personnel.id_posi = position.id_posi
    //                                             INNER JOIN department ON personnel.id_depart = department.id_depart
    //                                             ");
    // $schedule_list = $sentencia->fetchAll(PDO::FETCH_OBJ);
    //print_r($persona);
?>

<!-- <div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="container none"> -->
              
            <!-- </div> -->
            <!-- inicio alerta -->
            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'falta'){
            ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Rellena todos los campos.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?>


            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'registrado'){
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Registrado!</strong> Se agregaron los datos.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?>   
            
            

            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'error'){
            ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Vuelve a intentar.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?>   



            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'editado'){
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Cambiado!</strong> Los datos fueron actualizados.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?> 


            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'eliminado'){
            ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Eliminado!</strong> ข้อมูลถูกลบ
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?> 
                    <table id="myTable" class="display" style="width: 100%;">
                    <h1 align="center">ผู้ใช้ทั้งหมด</h1><p></p>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>ชื่อ</th>
                                <th>ตำแหน่ง</th>
                                <th>สาขาวิชา</th>
                                <th>สถานะ</th>
                                <th>เครื่องมือ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                              <?php
                                  require_once('connect.php');
    
                                        $sql=sprintf("SELECT * FROM `personnel`
                                                            INNER JOIN position ON  personnel.posi_id = position.posi_id
                                                            INNER JOIN department ON personnel.depart_id = department.depart_id
                                                            ORDER BY person_id ASC");
                                        $result=$conn->query($sql) or die("เกิดข้อผิดพลาด เนื่องจาก".$conn->error);
                                        if($result->num_rows<0){
                                            printf("<tr><td>ไม่มีข้อมูล</td></tr>");
                                        }else{
                                            while($row=$result->fetch_assoc()){
                                    ?>
                                <td><?php echo $row['person_id']; ?></td>
                                <td><?php echo $row['person_name']; ?></td>
                                <td><?php echo $row['posi_name']; ?></td>
                                <td><?php echo $row['depart_name']; ?></td>
                                <td><?php echo $row['person_status']; ?></td>
                                <td>
                                  <a onclick="return confirm('ต้องการที่จะแก้ไขข้อมูล');" class="btn btn-warning" href="admin_editperson.php?person_id=<?php echo $row['person_id']; ?>">แก้ไข</a>           
                                  <a onclick="return confirm('ต้องการที่จะลบข้อมูล');" class="btn btn-danger" href="admin_deleteperson.php?person_id=<?php echo $row['person_id']; ?>">ลบ</a> 
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
      </main>
      <!-- End Main -->

    </div>

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

