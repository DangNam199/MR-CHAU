<?php 
    include '../php/connect.php';
    include '../php/session.php';
    if ($_SESSION['level'] != 5 and $_SESSION['level'] != 6){
      header("location: index.php");
    }
    //issue: not in currnt id
    $sql= "SELECT * FROM `hocvien` ORDER BY id DESC";
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
    $this_page_result = ($page-1) * $result_per_page;
    $sql = "SELECT * FROM `hocvien` ORDER BY id DESC limit ".$this_page_result. ','.$result_per_page;
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

    <title><?php
        include '../php/general_setting.php';
    echo $res_setting['name'];?> </title>

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
              <a data-toggle="tooltip" data-placement="top" title="Profile" href="profile.php">
                <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
              </a>
              <?php  
                if($_SESSION['level'] == 6){
              ?>
              <a data-toggle="tooltip" data-placement="top" title="Settings" href="setting.php">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <?php }   ?>
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
                <h3>Danh sách học viên</h3> 
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
                      <div class="col-md-12 col-sm-12  text-center">
                      <ul class="pagination pagination-split">
                        <?php for($page =1; $page<=$number_page;$page++){ 
                           echo '<li><a href="?page='.$page.'">'.$page. '</a></li>';
                        }
                        ?>
                      </ul>
                      <div class="clearfix"></div>
                      <?php while ($row = mysqli_fetch_array($res)){?>
                        <div class="col-md-4 col-sm-4  profile_details" id="student-<?php echo $row['id']?>">
                          <div class="well profile_view">
                            <div class="col-sm-12">
                              <div class="left col-md-7 col-sm-7">
                                <div class="row center" >
                                  <?php 
                                  if($row['gender']== 'male'){
                                    echo '<i class="fa fa-male fa-2x"></i>    ';
                                  }
                                  if($row['gender']== 'female'){
                                    echo '<i class="fa fa-female fa-2x"></i>';
                                }
                                ?>
                                <h2><?=$row['name'] ?></h2>
                                </div>
                                
                                
                                <ul class="list-unstyled">
                                <li><i class="fa fa-building"></i>  Address: <?=$row['address'] ?> </li>
                                  <li><i class="fa fa-phone"></i>  Phone #: <?=$row['sdt'] ?> </li>
                                  <?php 
                                    if (empty($row['class_id'])){
                                      echo 'Chưa có lớp';  
                                    }
                                    else {
                                      $sql_class = "SELECT name from class where id =". $row['class_id'];
                                      $res_class = mysqli_fetch_assoc(mysqli_query($conn,$sql_class));
                                      echo '<p> Tên lớp: '.$res_class['name'].'</p>';
                                    }
                                  ?>
                                </ul>
                              </div>
                              <div class="right col-md-5 col-sm-5 text-center">
                                <?php
                                  echo '<img src="data:image/jpeg;base64,'.base64_encode($row['avatar'] ).'" class="img-circle img-fluid" />';
                                ?>
                              </div>
                            </div>
                            <div class=" profile-bottom text-center">
                              <div class=" row-sm-6 emphasis">
                                <!-- mẫu edit -->
                              <a class="btn btn-app" data-toggle="modal" data-target="#myModal" href="#" data-id="<?php echo  $row['id'];?>" data-role='update' ><i  class="fa fa-plus"> </i> Edit </a>
                                <!-- mẫu xoá -->
                                <button type="button" class="btn btn-secondary" onclick="deleteAjax(<?php echo $row['id'];?>)">Delete</button>
                                <?php 
                                $id = $row['id'];
                                  if($row['tinhtranghocphi'] == 1){
                                    echo "<button onclick='show_invoice($id)' class = 'btn btn-success'>Xem hoá đơn</button>";
                                  }
                                  else {
                                    echo "<div  class = 'btn btn-danger'>Chưa đóng học phí</div>";
                                  }
                                ?>
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
     
      <!-- Để edit nhanh thì có thể copy thì form_ ten vào modal-body cho nhanh, xoá thẻ div col-md-6 col-sm-6 để input được to -->
                                <!-- đổ dữ liệu vào -->
      <!-- Modal content-->
         
      
    </div>

    <!-- mẫu xoá -->
    <script type='text/javascript'>
    // delete có thể dùng chung bằng cách truyền id, talbe vào và gọi đến delete.php
      function deleteAjax(id){
        if (confirm('Bạn có chắc xoá học viên này')){
            $.ajax({
              type:'post',
              url: '../php/delete.php',
              data: {
                id: id,
                table: 'hocvien', //ten bang trong csdl
              },
              success: function(data){
                  if(data=="success"){
                    $('#student-'+id).hide();
                new PNotify({
                                  title: 'Thành công',
                                  text: 'Xoá Học Viên thành công',
                                  type: 'success',
                                  styling: 'bootstrap3'
                              });
                  }
              }
            });
        }
      }
      function show_invoice(id){
        var str_url = "/mrchau/administration/invoice_template.php?student_id=" + id;
              printWindow = window.open(str_url, 'Print', 'left=200, top=200, width=950, height=500, toolbar=0, resizable=0');
              console.log(printWindow);
              printWindow.addEventListener('load', function() {
                  if (Boolean(printWindow.chrome)) {
                      printWindow.print();
                      setTimeout(function(){
                          printWindow.close();
                      }, 500);
                  } else {
                      printWindow.print();
                      printWindow.close();
                  }
              }, true);  
      }

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