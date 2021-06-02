<?php 
    include '../php/connect.php';
    include '../php/weekday.php';
    include '../php/session.php';
    $sql= "SELECT * FROM `my_class` where state='studing' and staff_id = ". $_SESSION['staff_id']." ORDER BY class_id DESC";
    $res = mysqli_query($conn,$sql);
    $number_row = mysqli_num_rows($res);
    $result_per_page = 9;
    $number_page = ceil($number_row/$result_per_page);
    if (!isset($_GET['page'])){
      $page=1;
    }
    else {
      $page = $_GET['page'];
    }
    $this_page_result = ($page-1)*$result_per_page;
    $sql = "SELECT * FROM `my_class` where state='studing' and staff_id = ". $_SESSION['staff_id']." ORDER BY class_id DESC limit ".$this_page_result. ','.$result_per_page;
    $res = mysqli_query($conn,$sql);

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gentelella Alela! | </title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="../build/css/custom.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../dist/css/bootstrap-select.css">
    <script src="../dist/js/bootstrap-select.js" defer></script>

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
                    echo '<img src="data:image/jpeg;base64,'.base64_encode($_SESSION['avatar'] ).'" class="img-circle profile_img" />';
              ?>
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?=$_SESSION['name']?></h2>
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
                      <li><a href="salary.php">Duyệt lương nhân viên</a></li>
                      <li><a href="end_contacts.php">Tất Cả Nhân Viên Đã Lưu Trữ</a></li>
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
                  <li><a> Chi <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="form_spending.php">Chi</a></li>
                      <li><a href="all_spending.php">Tất cả chi</a></li>
                    </ul>
                  </li>
                  <li><a> Báo Cáo <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="report_in.php">Báo cáo thu</a></li>
                      <li><a href="report_out.php">Báo cáo chi</a></li>
                      <li><a href="report_salary.php">Báo lương nhân viên</a></li>
                      <li><a href="report_all.php">Báo Tổng </a></li>
                    </ul>
                  </li>
                 <?php }
                 else {
                 ?>
                 <li><a href="my_class.php">Lớp của tôi</a>
                  </li>
                  <li><a href="schedule.php"> Lịch  </a>
                  </li>
                  <?php }?>
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="../php/logout.php">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
          </div>
        </div>

        <!-- top navigation -->
            <!-- /top navigation -->

            <!-- page content -->
            <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Lớp học của tôi</h3>
              </div>



            <div class="clearfix"></div>

            <div class="row">
                <div class="x_panel">
                  <div class="x_content">
                  <?php 
                    if (isset($_SESSION['nofication'])){
                      echo '<p>'. $_SESSION['nofication'] . '</p>';
                      unset($_SESSION['nofication']);
                    }
                  ?>
                      <div class="col-md-12 col-sm-12  text-center">
                      <ul class="pagination pagination-split">
                        <?php for($page =1; $page<=$number_page;$page++){ 
                           echo '<li><a href="?page='.$page.'">'.$page. '</a></li>';
                        }
                        ?>
                      </ul>
                      </div>
                       
                      <div class="clearfix"></div>
                      <?php while ($row = mysqli_fetch_array($res)){?>
                      <div class="col-md-4 col-sm-4  profile_details">
                        <div class="well profile_view">
                          <div class="col-sm-12"> 
                              <h2><?=$row['class_name'] ?></h2>
                              <p id="course" ><strong>Khoá: </strong> <?=$row['course_name'] ?> </p>
                              <p id="room" ><strong>Phòng: </strong> <?=$row['room_name'] ?> </p>
                              <p id="state" ><strong>Tình trạng: </strong> <?=$row['state'] ?> </p>
                              <p id="date" ><strong>Thời gian học: </strong> <?=$row['date_from'] ?> - <?=$row['date_to']?></p>
                              <p id="time" ><strong>Giờ học: </strong> <?=$row['time_from'] ?> - <?=$row['time_to']?></p>
                              
                              <?php 
                                $arr = getListWeekday($row['weekdays']);
                                echo '<p><strong> Học vào: </strong>';
                                foreach ($arr as $r){
                                  echo $r . ' ';
                                }
                                echo '</p>';
                                $sql_count = "SELECT COUNT(id) as count_id from hocvien where class_id =" . $row['class_id'];
                                $row_count = mysqli_fetch_assoc(mysqli_query($conn,$sql_count));
                                echo '<p id="seat" ><strong> Ghế: <span id="taken-seat-'.$row['class_id'].'">'.$row_count['count_id'] .'</strong>/ <span id = "seat-'.$row['class_id'] .'">'.$row['seat'] .'</p>' ;
                              ?>
                          </div>
                          <div class=" profile-bottom text-center">
                            <div class=" row-sm-6 emphasis">
                              <a class="btn btn-app" id="homework-<?=$row['class_id']?>" onclick="homework(<?=$row['class_id']?>)"> </i> Giao Bài tập</a>
                              <a class="btn btn-app" href='homework.php?class_id=<?=$row['class_id']?>'  > </i> Xem bài tập</a>
                              <a class="btn btn-app" href='mark.php?class_id=<?=$row['class_id']?>'  > </i> Nhập điểm</a>
                              <a class="btn btn-app" href='show_mark.php?class_id=<?=$row['class_id']?>'  > </i> Xem điểm</a>
                            </div>
                          </div>
                        </div>
                      </div>
                      <?php } ?>
                  </div>
                </div>
            </div>
          </div>
        </div>
            <!-- /page content -->

            <!-- footer content -->
            <footer>
            </footer>
            <!-- /footer content -->
        </div>
    </div>
    <div class="modal" id="modal-homework">
        <div class="modal-dialog">
          <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title">Tải file bài tập (Only PDF)</h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
        <form method="post" enctype='multipart/form-data'>
        <div class="field item form-group">
            <label class="col-form-label col-md-3 col-sm-3  label-align">Date<span class="required">*</span></label>
            <div class="col-md-6 col-sm-6">
                <input class="form-control" class='date' type="date" id="deadline" required='required'></div>
              </div>
            <input type="file" id="modal-pdf" class="form-control" name="product_file" /></p>
            <br />
          </form>
          </div>
          
          
        <div class="modal-footer">
          <a href="#" id='modal-click' onclick="submit_homework()" class="btn btn-info" >Thêm Bài tập</a>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>


  </div>
    
  <script type='text/javascript'>
   var id;
    function  homework(class_id) {
      id = class_id;
      $('#modal-homework').modal('show');
    }
    function submit_homework(){
      var deadline = $("#deadline").val();
      var files = $('#modal-pdf')[0].files;
      var formData = new FormData();
      formData.append('homework', files[0]);
      formData.append('deadline', deadline);
      formData.append('class_id', id);
      console.log(deadline);
      console.log(id);
      if (files){
        $.ajax({
        url : '../php/ajax/ajax_add_homework.php',
        type : 'POST',
        data : formData,
        processData: false,  // tell jQuery not to process the data
        contentType: false,  // tell jQuery not to set contentType
        success : function(data) {
          $('#modal-homework').modal('toggle');
            if (data =='empty'){
              console.log('empty');
              new PNotify({
                  title: 'Thất bại',
                  text: 'Vui lòng nhập đủ!',
                  styling: 'bootstrap4'
              });
            }
            else if (data =='success'){
              new PNotify({
                  title: 'Thành công',
                  text: 'Tạo thành công!',
                  type: 'success',
                  styling: 'bootstrap3'
              });
            }
            else if (data =='fail'){
              new PNotify({
                  title: 'Thất bại',
                  text: 'Tạo thất bại!',
                  type: 'error',
                  styling: 'bootstrap3'
              });
            }

           
        }
        });
      }
    }

    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="../vendors/validator/multifield.js"></script>
    <script src="../vendors/validator/validator.js"></script>
    
    <!-- Javascript functions	-->

    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <script src="../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <script src="../vendors/nprogress/nprogress.js"></script>
    <script src="../build/js/custom.min.js"></script>
        
    <script src="../vendors/pnotify/dist/pnotify.js"></script>
    <script src="../vendors/pnotify/dist/pnotify.buttons.js"></script>
    <script src="../vendors/pnotify/dist/pnotify.nonblock.js"></script>


</body>

</html>
