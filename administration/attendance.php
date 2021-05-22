<?php 
    include '../php/connect.php';
    include '../php/session.php';
    include '../php/weekday.php';
    if(isset($_GET['lession']) && isset($_GET['class_id']))
    {
      $lession = $_GET['lession'];
      $class_id = $_GET['class_id'];
     
      $sql_check_lession = "SELECT max(lession) as max_lession FROM `attendance` WHERE class_id = ". $class_id;
      $res = mysqli_query($conn, $sql_check_lession);
      $sql_class_name = "SELECT id,name from class WHERE id = ". $class_id;
      $row_class_name = mysqli_fetch_assoc(mysqli_query($conn,$sql_class_name)); 
      if (mysqli_num_rows($res) == 0){
        if ($lession != 1){
          $nofication = "Chưa đến buổi học: ".$lession;
        }
      }
      else if (mysqli_num_rows($res) == 1){
          $row = mysqli_fetch_assoc($res);
          if ($lession == $row['max_lession'] + 1){
            if (check_day($lession, $class_id, $conn)){
            $sql_student =  "SELECT * FROM hocvien WHERE class_id =". $class_id;
            $res_student = mysqli_query($conn, $sql_student);
            echo 'true';
            }
            else {
              $nofication = "Chưa đến ngày học buổi học: ".$lession;
            }
          }
          else if ($lession <= $row['max_lession'] + 1){
            $nofication = "Đã qua buổi học: ".$lession;
          }
          else{
            $nofication = "Chưa đến buổi học: ".$lession;
          }
      }
    }
    function check_day($lession, $class_id, $conn){
      $count = 1;
      $sql_class = "SELECT date_from, date_to, weekdays from class WHERE id = ". $class_id;
      $res = mysqli_fetch_assoc(mysqli_query($conn,$sql_class));
      $date_from = $res['date_from'];
      $date_to =  $res['date_to'];
      $weekdays = getListWeekdayInFull($res['weekdays']);
      while (strtotime($date_from) <= strtotime($date_to)) {       
        if (in_array(date('l', strtotime($date_from)), $weekdays)){
          if ($count == $lession){
            if ($date_from == "2021-05-26"){
              return 'true';
              break;
            }
          }
          else {
            $count++;
          }
      }
      $date_from = date ("Y-m-d", strtotime("+1 days", strtotime($date_from)));
      }  
    }

    
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Trung tâm MR.CHAU</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <!-- thư viên để thông báo -->
    <link href="../vendors/pnotify/dist/pnotify.css" rel="stylesheet">
    <link href="../vendors/pnotify/dist/pnotify.buttons.css" rel="stylesheet">
    <link href="../vendors/pnotify/dist/pnotify.nonblock.css" rel="stylesheet">


 
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">

              <div class="clearfix"></div>

              <!-- menu profile quick info -->
              <div class="profile clearfix">
                <div class="profile_pic">
                  <?php
                echo '<img src="data:image/jpeg;base64,'.base64_encode($_SESSION['avatar'] ).'" class="img-circle profile_img" />'; ?>
                </div>
                <div class="profile_info">
                  <span>Welcome,</span>
                  <h2><?=$_SESSION['name'] ?></h2>
                </div>
              </div>
              <!-- /menu profile quick info -->

              <br />

              <!-- sidebar menu -->
              <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a href="index.php"><i class="fa fa-home"></i> Home </a>
                  </li>
                  <?php 
                    if ($_SESSION['level'] == 5 or $_SESSION['level'] == 6){
                      ?>
                  <li><a> Nhân Viên <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="form_staff.php">Tạo Nhân Viên</a></li>
                      <li><a href="contacts.php">Tất Cả Nhân Viên</a></li>
                    </ul>
                  </li>
                  <li><a> Học Viên <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="form_student.php">Tạo Học Viên</a></li>
                      <li><a href="csv_student.php">Nhập Học Viên bằng file csv</a></li>
                      <li><a href="all_student.php">Tất Cả Học Viên</a></li>
                    </ul>
                  </li>
                  <li><a> Học phí <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="fee.php">Học viên đóng học phí</a></li>
                      <li><a href="all_room.php">Tất Cả Phòng</a></li>
                    </ul>
                  </li>
                  <li><a> Lớp <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="form_class.php">Lớp</a></li>
                      <li><a href="all_class.php">Tất Cả Lớp</a></li>
                    </ul>
                  </li>
                  <li><a> Phòng Học <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="form_room.php">Thêm Phòng</a></li>
                      <li><a href="all_room.php">Tất Cả Phòng</a></li>
                    </ul>
                  </li>
                  <li><a> Chứng chỉ đang đào tạo <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="form_degree.php">Tạo Chứng Chỉ</a></li>
                      <li><a href="all_degree.php">Tất Cả Chứng Chỉ</a></li>
                    </ul>
                  </li>
                  <li><a> Khoá Học <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="form_courses.php">Tạo Khoá Học</a></li>
                      <li><a href="all_courses.php">Tất Cả Khoá Học</a></li>
                    </ul>
                  </li>
                  <li><a> Tài Liệu <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="form_document.php">Nhập tài liệu</a></li>
                      <li><a href="all_document.php">Tất Cả Tài liệu</a></li>
                    </ul>
                  </li>
                  <li><a> Tin Tức <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="form_news.php">Tạo Tin Tức</a></li>
                      <li><a href="all_news.php">Tất Cả Tin Tức</a></li>
                    </ul>
                  </li>
                 <?php }
                 else {
                 ?>
                 <li><a href="form_news.php">Lớp của tôi</a>
                  </li>
                  <li><a href="schedule.php"> Lịch  </a>
                  </li>
                  <?php }?>
                </ul>
              </div>

            </div>
              <!-- /sidebar menu -->

            </div>
        </div>

        <!-- top navigation -->
        <!-- top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Học Viên</h3> 
                <?php 
                  if (isset($_SESSION['notification'])){
                    echo '<p>'. $_SESSION['notification'] . '</p>';
                    unset($_SESSION['notification']);
                  }
                ?>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5  form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="x_panel">
                  <div class="x_content">
                    <h3>Điểm danh lớp -<?=$row_class_name['name']?> <span hidden id='class_id'><?=$row_class_name['id']?></span></h3>
                    <h4>Buổi <span id="lession"><?=$lession?></span> </h4>
                      <div class="col-md-12 col-sm-12  text-center">
                      <div class="clearfix"></div>
                      <div class="table-responsive">
                      <?php 
                        if(isset($nofication)){
                          echo '<p>'.$nofication.'</p>';
                        }
                        else {
                      ?>
                      <table class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
                            <th>
                              Điểm danh
                            </th>
                            <th class="column-title">Tên</th>
                          </tr>
                        </thead>

                        <tbody>
                            <?php while($row_student = mysqli_fetch_assoc($res_student)) { ?>
                              <tr class="even pointer">
                            <td class="a-center ">
                              <input type="checkbox" value="<?=$row_student['id']?>" id='checkbox-dd'>
                            </td>
                            <td class=" "><?=$row_student['name']?></td>
                            </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                      </table>
                      
                    </div>
                      <button class = "btn btn-success" id='submit-btn'>Xác nhận điểm danh </button>
                      <?php }?>
                  </div>
                </div>
            </div>
          </div>
        </div>
              
      </div>
    </div>



    <!-- mẫu xoá -->
    <script type='text/javascript'>
    $('#submit-btn').click(function() {
        var student_ids = [];
        $('input[type=checkbox]:checked').each(function () {
          student_ids.push(this.value);
        });
        var class_id = $('#class_id').text();
        var lession = $('#lession').text();
        if (student_ids){
        $.ajax({
          type: "post",
          url: "../php/ajax/ajax_attendance.php",
          data: {
            class_id: class_id,
            student_ids: student_ids,
            lession: lession,
          },
          success: function (response) {
            if (response == 'success'){
              new PNotify({
                  title: 'thành công',
                  text: 'Điểm danh thành công!',
                  type: 'success',
                  styling: 'bootstrap3'
              });
              setTimeout(function() {
              window.location.replace("index.php");
              }, 3000);
            }
          }
        });
        }
        else {
          new PNotify({
              title: 'Hãy chọn sinh viên',
              text: 'Chọn sinh viên điểm danh.',
              styling: 'bootstrap3'
          });
        }
        // now names contains all of the names of checked checkboxes
        // do something with it
    });

    </script>
    <!-- hết mẫu xoá -->
    <!-- jQuery -->
    
    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
   <script src="../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- PNotify -->
    <!-- thư viên để thông báo -->
    <script src="../vendors/pnotify/dist/pnotify.js"></script>
    <script src="../vendors/pnotify/dist/pnotify.buttons.js"></script>
    <script src="../vendors/pnotify/dist/pnotify.nonblock.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
  </body>
</html>