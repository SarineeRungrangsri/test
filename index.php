<html>
<link href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

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

<!-- <link href="index.css" rel="stylesheet"> -->
<!------ Include the above in your HEAD tag ---------->
<style type="text/css">
  @import url("//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css");

  .login-block {
    background: #80eaee;
    /* fallback for old browsers */
    background: -webkit-linear-gradient(to bottom, #8cffff, #62dede);
    /* Chrome 10-25, Safari 5.1-6 */
    background: linear-gradient(to bottom, #8cdbff, #62dede);
    /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    float: left;
    width: 100%;
    padding: 50px 0;
  }

  .banner-sec {
    background: url(https://static.pexels.com/photos/33972/pexels-photo.jpg) no-repeat left bottom;
    background-size: cover;
    min-height: 500px;
    border-radius: 0 10px 10px 0;
    padding: 0;
  }

  .container {
    background: #fff;
    border-radius: 10px;
    box-shadow: 15px 20px 0px rgba(0, 0, 0, 0.1);
  }

  .carousel-inner {
    border-radius: 0 10px 10px 0;
  }

  .carousel-caption {
    text-align: left;
    left: 5%;
  }

  .login-sec {
    padding: 50px 30px;
    position: relative;
  }

  .login-sec .copy-text {
    position: absolute;
    width: 80%;
    bottom: 20px;
    font-size: 13px;
    text-align: center;
  }

  .login-sec .copy-text i {
    color: #8afef8;
  }

  .login-sec .copy-text a {
    color: #62bee3;
  }

  .login-sec h2 {
    margin-bottom: 30px;
    font-weight: 800;
    font-size: 30px;
    color: #62a6de;
  }

  .login-sec h2:after {
    content: " ";
    width: 100px;
    height: 5px;
    background: #8ab8fe;
    display: block;
    margin-top: 20px;
    border-radius: 3px;
    margin-left: auto;
    margin-right: auto
  }

  .btn-login {
    background: #6279de;
    color: #fff;
    font-weight: 600;
  }

  .banner-text {
    width: 70%;
    position: absolute;
    bottom: 40px;
    padding-left: 20px;
  }

  .banner-text h2 {
    color: #fff;
    font-weight: 600;
  }

  .banner-text h2:after {
    content: " ";
    width: 100px;
    height: 5px;
    background: #FFF;
    display: block;
    margin-top: 20px;
    border-radius: 3px;
  }

  .banner-text p {
    color: #fff;
  }
</style>
<!-- <link rel="stylesheet" href="css/index.css"> -->
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

<section class="login-block">
  <div class="container">
    <div class="row">
      <div class="col-md-4 login-sec">
        <h2 class="text-center">เข้าสู่ระบบ</h2>
        <form class="login-form" action="check_login.php" method="POST">
          <div class="form-group">
            <label for="exampleInputEmail1" class="text-uppercase">ชื่อผู้ใช้</label>
            <input type="text" name="username" class="form-control" placeholder="Username" required>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1" class="text-uppercase">รหัสผ่าน</label>
            <input type="password" name="password" class="form-control" placeholder="Password" required>
          </div>
          <div class="form-check">
            <input type="submit" name="submit" class="btn btn-login float-right" value="เข้าสู่ระบบ">
          </div>
        </form>
      </div>
      <!-- <div class="col-md-8 banner-sec"></div> -->
      <div class="col-md-8" id="calendar"></div>
    </div>
  </div>
  </div>
  </div>
  </div>

  <!-- Event Details Modal -->
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
                                    <dd id="status" class="fw-bold fs-4"></dd>
                                    <dt class="text-muted">ในงาน</dt>
                                    <dd id="title" class="fw-bold fs-4"></dd>
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
  <!-- <button type="button" class="btn btn-primary btn-sm rounded-0" id="edit" data-id="">Add car</button> -->
  <!-- <button type="button" class="btn btn-danger btn-sm rounded-0" id="delete" data-id="">Delete</button> -->
  <button type="button" class="btn btn-secondary btn-sm rounded-0" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
  <!--End Event Details Modal -->
</section>

<!-- Calendar -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.js"></script>
<script src="script.js"></script>
<script>
  var scheds = $.parseJSON('<?= json_encode($sched_res) ?>')
</script>

</html>
