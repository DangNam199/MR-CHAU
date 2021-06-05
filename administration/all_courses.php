<?php 
    include '../php/connect.php';
    include '../php/session.php';
    if ($_SESSION['level'] != 5 and $_SESSION['level'] != 6){
      header("location: index.php");
    }
    $sql= "SELECT course.id, course.tenKH, course.duration, course.price, course.time, degree.tenDegree  from `course` INNER JOIN `degree` on course.degree_id = degree.id ORDER BY `course`.`id` DESC";
    $res = mysqli_query($conn,$sql);
    $number_row = mysqli_num_rows($res);
    $result_per_page = 6;
    $number_page = ceil($number_row/$result_per_page);
    if (!isset($_GET['page'])){
      $page=1;
    }
    else {
      $page = $_GET['page'];
    }
    $this_page_result = ($page-1)*$result_per_page;
    $sql = "SELECT course.id, course.tenKH, course.duration, course.price, course.time, degree.tenDegree  from `course` INNER JOIN `degree` on course.degree_id = degree.id ORDER BY `course`.`id` DESC limit ".$this_page_result. ','.$result_per_page;
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

    <title>Contact Form | Gentelella Alela! by Colorlib</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    
    <link href="../vendors/pnotify/dist/pnotify.css" rel="stylesheet">
    <link href="../vendors/pnotify/dist/pnotify.buttons.css" rel="stylesheet">
    <link href="../vendors/pnotify/dist/pnotify.nonblock.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
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
                      <li><a href="all_fee.php">Danh sách học phí</a></li>
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
                  <li><a> Công <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="my_worktime.php">Xem lịch sử chấm công</a></li>
                      <li><a href="my_salary.php">Lương</a></li>
                    </ul>
                  </li>
                  <?php }?>
                </ul>
              </div>

            </div>

            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="../php/logout.php">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /sidebar menu -->

          </div>
      </div>

        <!-- top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Danh sách khoá học</h3>
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
                      <div class="col-md-4 col-sm-4  profile_details" id="course-<?=$row['id']?>">
                        <div class="well profile_view">
                          <div class="col-sm-12">
                              <h2><?=$row['tenKH'] ?></h2>

                              <p id="soluong" ><strong>Tên Chứng chỉ: </strong> <?=$row['tenDegree']?> </p>
                              <p id="noidung" ><strong>Số buổi: </strong> <?=$row['duration'] ?> </p>
                              <p id="soluong" ><strong>Học phí: </strong> <?=$row['price'] ?> </p>
                              <p id="soluong" ><strong>Thời gian dạy mỗi buổi: </strong> <?=$row['time'] ?> </p>

                          </div>
                            <div class=" profile-bottom text-center">
                                <div class=" row-sm-6 emphasis">
                                    <a class="btn btn-app"
                                       href="../php/course/edit_course.php?id=<?php echo $row['id']; ?>"><i
                                                class="fa fa-edit"> </i> Sửa </a>
                                    <button type="button" class="btn btn-secondary" onclick="delete_course(<?php echo $row['id'];?>)">Xóa</button>
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
      </div>
    </div>

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
   <script src="../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>

                        
    <script src="../vendors/pnotify/dist/pnotify.js"></script>
    <script src="../vendors/pnotify/dist/pnotify.buttons.js"></script>
    <script src="../vendors/pnotify/dist/pnotify.nonblock.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
  </body>
  <script>
    $(document).ready(function(){
      var id;
      var noidung = $("#noidung").text();
      var soluong = $("#soluong").text();
      $(document).on("click", "a", function () {
        id = $(this).data('id');  
       
      });
      $('#add-more').click(function(){
        var number = $('#addnumber').val();
        var price = $('#priceper').val();
       
        $.ajax({
          dataType: "json", 
          url: '../php/add_doc.php',
          method: 'POST',
          data: {id: id, number: number},
          success: function(data){
            $('#soluong').html("<strong>Số Lượng: </strong>"+data+ "</p>");
            $('#myModal').modal('toggle');
          }
        });
        
      });
      
    });
    function delete_course(id){
      if (confirm('Xoá khoá học này?')){
      $.ajax({ 
          url: '../php/delete_course.php',
          method: 'POST',
          data: {course_id: id},
          success: function(data){
            if (data =='success'){
              $("#course-"+id).hide();
            }
            else if (data == 'cannot'){
              alert("Không thể xoá khoá này vì khoá đang có lớp đang đào tạo khoá học này");
            }
          }
        });
    }
  }
  </script>
</html>