<?php 
    include '../php/connect.php';
    session_start();
    if(!isset($_SESSION['user'])){
        header('location: login.php');
        }
    else{
        $sql_user = "SELECT * FROM `nhanvien` WHERE email='". $_SESSION['user']. "' limit 1";
        $res_user = mysqli_query($conn,$sql_user);
        $row_user = mysqli_fetch_assoc($res_user);
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
                echo '<img src="data:image/jpeg;base64,'.base64_encode($row_user['avatar'] ).'" class="img-circle profile_img" />'; ?>
                </div>
                <div class="profile_info">
                  <span>Welcome,</span>
                  <h2><?=$row_user['TenNV'] ?></h2>
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
                    <li><a> Nhân Viên <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                        <li><a href="form_staff.php">Tạo Nhân Viên</a></li>
                        <li><a href="contacts.php">Tất Cả Nhân Viên</a></li>
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
                        <li><a href="php">Tạo Tin Tức</a></li>
                        <li><a href="all_news.php">Tất Cả Tin Tức</a></li>
                      </ul>
                    </li>
                  </ul>
                </div>

              </div>
              <!-- /sidebar menu -->

            </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
              <nav class="nav navbar-nav">
              <ul class=" navbar-right">
                <li class="nav-item dropdown open" style="padding-left: 15px;">
                  <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                  <?=$row_user['TenNV'] ?>
                  </a>
                  <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item"  href="profile.php  "> Profile</a>
                    <a class="dropdown-item"  href="login.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                  </div>
                </li>

                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="x_panel">
                  <div class="x_content">
                      <div class="col-md-12 col-sm-12  text-center">
                      <div class="clearfix"></div>
                      <div class="table-responsive">
                      <table class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
                            <th class="column-title">Mã Học Viên </th>
                            <th class="column-title">Tên Học Viên </th>
                            <th class="column-title">Số điện thoại</th>
                            <th class="column-title">Ngày nhập học</th>
                            <th class="column-title">Lớp </th>
                            <th class="column-title">Tên khoá</th>
                            <th class="column-title">Giá Khoá</th>
                            <th class="column-title">Phụ(Tài liệu) </th>
                            <th class="column-title">Tổng </th>
                            <th></th>
                            
                          </tr>
                        </thead>

                        <tbody>
                          <?php 
                            $sql_fee = "SELECT student_not_pay.id as 'student_id', student_not_pay.name as 'student_name', student_not_pay.tinhtranghocphi, student_not_pay.ngaynhaphoc, student_not_pay.sdt, course.tenKH as 'course_name', course.id as 'course_id', course.price as 'course_price', class.name 'class_name', class.id as 'class_id' FROM student_not_pay INNER JOIN class on student_not_pay.class_id = class.id INNER JOIN course on class.course_id = course.id";
                            $res_fee = mysqli_query($conn,$sql_fee);
                            while ($row_fee = mysqli_fetch_assoc($res_fee)){
                          ?>
                           <tr >
                            <td><?=$row_fee['student_id']?></td>
                            <td class=" "><?=$row_fee['student_name']?></td>
                            <td class=" "><?=$row_fee['sdt']?></td>
                            <td class=" "><?=$row_fee['ngaynhaphoc']?></td>
                            <td> <span id="class-<?=$row_fee['student_id']?>"><?=$row_fee['class_id']?></span>-<?=$row_fee['class_name']?></td>
                            <td class=" "><span id="course-<?=$row_fee['student_id']?>" hidden><?=$row_fee['course_id']?></span><?=$row_fee['course_name']?></td>
                            <td ><?php echo number_format($row_fee['course_price'], 0, ',', '.') . "đ";?></td>
                            <td>
                            <?php 
                              $sql_doc = "SELECT * from sum_doc where id_khoahoc = ". $row_fee['course_id'];
                              $res_doc = mysqli_query($conn,$sql_doc);
                              $doc_price = 0;
                              while ($row_doc = mysqli_fetch_assoc($res_doc)){
                                $doc_price = $row_doc['sum_doc'];
                                echo number_format($row_doc['sum_doc'], 0, ',', '.') . "đ";
                                echo ' ('.$row_doc['total_doc'].')';
                              }
                            ?>
                            </td>
                            
                            <td class=" "><?php 
                              $total = $row_fee['course_price'] + $doc_price;
                              echo number_format($total, 0, ',', '.') . "đ";?> <span hidden id="price-<?=$row_fee['student_id']?>"><?=$total?></span></td>
                            <td class=" "><button onclick="pay(<?=$row_fee['student_id']?>)" class='btn btn-success' >Đóng</button></td>
                          </tr>
                          
                          <?php }?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
            </div>
          </div>
        </div>
              
      </div>
    </div>

    <div class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog">
     
      <!-- Để edit nhanh thì có thể copy thì form_ ten vào modal-body cho nhanh, xoá thẻ div col-md-6 col-sm-6 để input được to -->
                                <!-- đổ dữ liệu vào -->
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
        <p>Tổng phải đóng: <span id="modal-total"></span></p>
        <div class="modal-footer">
        <button id='add-more' class="btn btn-primary pull-right" >Xác nhận thanh toán</button>
        <button id='print' class="btn btn-primary pull-right" style="display: none;" >In Hoá Đơn</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
    <!-- mẫu xoá -->
    <script type='text/javascript'>
    var class_id, student_id, invoice_id, course_id, paid, price;
    $("#add-more").click(function () { 
      id = student_id;
      console.log(course_id);
      price = parseInt($('#price-'+id).text());
      paid = parseInt($('#input-money').val());
      console.log(paid);
      $.ajax({
          type: "post",
          url: "../php/ajax/ajax_pay_fee.php",
          data: {
            student_id: student_id,
            course_id: course_id,
            price: price,
            paid: paid, 
          },
          success: function (data) {
            if (data == 'fail'){
              console.log('fail');
            }
            else {
              invoice_id = parseInt(data);
              console.log("data" + parseInt(data));
              $("#print").show();
              $("#add-more").hide();
            }
          }
        }); 
    });


    // delete có thể dùng chung bằng cách truyền id, talbe vào và gọi đến delete.php
    function pay(id){  
      course_id = parseInt($('#course-'+id).text());
      student_id = id;
      var price = parseInt($('#price-'+id).text());
      temp_price =  price.toLocaleString('it-IT', {style : 'currency', currency : 'VND'});
      $("#myModal").modal('show');
      $("#myModal #modal-total").text(temp_price);
      $("#input-money").change(function(){
        form_input = parseInt($("#input-money").val());
        temp_debt = price - form_input;
        temp_debt =  temp_debt.toLocaleString('it-IT', {style : 'currency', currency : 'VND'});
        $("#modal-debit").text(temp_debt);
      });
    }

    $("#print").click(function () { 
      $("#myModal").modal('toggle');
      console.log(paid);
      if (invoice_id){
              var str_url = "/mrchau/administration/invoice_template.php?student_id=" + student_id +"&course_id="+ course_id + "&invoice_id=" +invoice_id+"&paid="+paid+"&price="+price;
              console.log(str_url);
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
              location.reload(); 
      }
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