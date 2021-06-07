<?php 
    include '../php/connect.php';
    include '../php/session.php';
    include '../php/auto_admin.php';
    if ( $_SESSION['level'] != 6){
      header("location: index.php");
    }
    if (isset($_POST['submit']) && $_POST['level'] != '' && $_POST['type']){
      $type = $_POST['type'];
      $level =$_POST['level'];
      $sql = "SELECT * FROM staff where level_id = $level and type = '$type' and state = 'working'" ;
      $res = mysqli_query($conn, $sql);
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
      $sql = "SELECT * FROM staff where level_id = $level and type = '$type' and state='working' ORDER BY id DESC limit ".$this_page_result. ','.$result_per_page;
      $res = mysqli_query($conn,$sql);
    }
    if(isset($_GET['end_contract']) && $_GET['end_contract'] == 'true'){
      $sql_end =  "SELECT staff_id FROM contract_end";
      $res_end = mysqli_query($conn, $sql_end);
      $num_end = mysqli_num_rows($res_end);
      if($num_end > 0 ){
        $total_count = $num_end;
        $temp_id = "(";
        $count = 0;
        while($row_end = mysqli_fetch_assoc($res_end)){
          $uid = $row_end['staff_id'];
          $temp_id .= "$uid";
          $count ++;
          if ($count == $total_count){
            $temp_id .= ')';
          }
          else {
            $temp_id .= ',';
          }
        }
        $sql = "SELECT * FROM staff where id in $temp_id";
        $res = mysqli_query($conn,$sql);
      }
      else {
        $noti = "Không có nhân viên hết hợp đồng";
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
                <h3>Danh sách nhân viên</h3>
                <?php 
                  if (isset($_SESSION['notification'])){
                    echo '<p>'. $notification . '</p>';
                    unset($_SESSION['notification']);
                  }
                  if(isset($noti)){
                    echo '<p>'. $noti . '</p>';
                  }
                ?>
              </div>


            <div class="clearfix"></div>

            <div class="row">
                <div class="x_panel">
                  <div class="x_content">
                      <?php  if (!isset($_GET['end_contract'])) { ?>
                      <form method = "POST">
                        <select class= "form-control" name='type'>
                            <option value = "official">Chính Thức</option>
                            <option value = "probation">Thử việc</option>
                        </select>
                        <select class= "form-control" name='level'>
                            <option value = "1">Giảng viên</option>
                            <option value = "2">Trợ giảng</option>
                            <option value = "3">IT</option>
                            <option value = "4">Tạp vụ</option>
                            <option value = "6">Giám đốc</option>
                            <option value = "5">Quản trị viên</option>
                        </select>
                        <input type = "submit" class = "form-control" name="submit">
                      </form>
                      <?php }?>
                      <div class="col-md-12 col-sm-12  text-center">

                      <ul class="pagination pagination-split">
                        <?php
                        if(isset($number_page)){
                        for($page =1; $page<=$number_page;$page++){ 
                           echo '<li><a href="?page='.$page.'">'.$page. '</a></li>';
                        }}
                        ?>
                      </ul>
                      <div class="clearfix"></div>
                      <?php while ($row = mysqli_fetch_array($res)){?>
                        <div class="col-md-4 col-sm-4  profile_details" id="employee-<?php echo $row['id']?>">
                          <div class="well profile_view">
                            <div class="col-sm-12">
                            <?php 
                          // if(isset($_GET['end_contract'])){
                          //   echo '<p style="color: red;">Hết hợp đồng</p>';
                          // }
                        ?>
                                  <h4 class='brief'><?=$row['level_name']?></h4>
                                  <p hidden id="level-id-<?=$row['id']?>"><?=$row['level_id']?></p>  
                              <div class="left col-md-7 col-sm-7">
                                <div class="row center" >
                                  <span id="gender-<?=$row['id']?>">
                                    <?php 
                                      if($row['gender']== 'male'){
                                        echo '<i class="fa fa-male fa-2x"></i>';
                                      }
                                      if($row['gender']== 'female'){
                                        echo '<i class="fa fa-female fa-2x"></i>';
                                      }
                                      ?>
                                      </span>
                                <h2><span id="name-<?=$row['id']?>"><?=$row['TenNV']?></span></h2>
                                </div>
                                <p><strong>Certificate: </strong> <span id="certi-<?=$row['id']?>"><?=$row['ChungChi']?></span></p>
                                <ul class="list-unstyled">
                                <li>Email: <span id="email-<?=$row['id']?>"><?=$row['email']?></span> </li>
                                <li>
                                  <i class="fa fa-building"></i> Address: <span id="address-<?=$row['id']?>"> <?=$row['address'] ?> </span>
                                </li>
                                <li>
                                   Ngày Sinh:<span id="dob-<?=$row['id']?>"> <?=$row['NgaySinh'] ?> </span>
                                </li>
                                  <li><i class="fa fa-phone"></i>  Phone #: <span id="phone-<?=$row['id']?>"><?=$row['sdt']?></span> </li>
                                </ul>
                              </div>
                              <div class="right col-md-5 col-sm-5 text-center">
                                <?php
                                  echo '<img src="data:image/jpeg;base64,'.base64_encode($row['avatar'] ).'" class="img-circle img-fluid" />';
                                ?>
                              </div>
                            </div>
                            <p hidden id="cmnd-<?=$row['id']?>"><?=$row['CMND']?></p> 
                            <p hidden id="hsl-<?=$row['id']?>"><?=$row['HSL']?></p>  
                            <div class=" profile-bottom text-center">
                              <div class=" row-sm-6 emphasis">
                              <a class="btn btn-app" data-toggle="modal" onclick="open_modal(<?php echo $row['id']?>)" data-id="<?php echo  $row['id'];?>" data-role='update' ><i  class="fa fa-plus"> </i> Edit </a>
                                <button type="button" class="btn btn-secondary" onclick="deleteAjax(<?php echo $row['id'];?>)">Delete</button>
                                <button type="button" class="btn btn-primary" onclick="show_contract(<?php echo $row['id'];?>)">Xem hợp đồng</button>
                                <button type="button" class="btn btn-secondary" onclick="end_contract(<?php echo $row['id'];?>)">Chấm dứt hợp đồng và lưu trữ nhân viên</button>
                                      <?php 
                                if(isset($_GET['end_contract'])){ ?>
                                   <button type="button" class="btn btn-secondary" onclick="contract(<?php echo $row['id'];?>)">Gia hạn hợp đồng</button>
                               <?php }
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
    <div class="modal fade" id="modal-contract" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Gia hạn hợp đồng nhân viên</h4>
              </div>
              <div class="modal-body">
              <label>Tên hợp đồng</label>
              <input type ="text" class="form-control" id="name-contract" />
                <p>Loại hợp đồng.</p>
                
                <select id="contract-type" class="form-control">
                  <option value="offical">Chính thức</option>
                  <option value="probation">Thử việc</option>
                </select>
                <label>Nhập hệ số lương mới(Không nhập sẽ giữ cũ></label>
                <input type ="number" class="form-control" id="input-salary"  name="input-salary"/>
                <label>Thêm khoảng thời gian hiệu lực hợp đồng(tháng)</label>
                <input type ="number" class="form-control" id="month-effected" name="month-effected"/>
              </div>
              <div class="modal-footer">
              <button type="button"  onclick="btn_submit()" class="btn btn-primary">Submit</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
          <div class="field item form-group">
              <label class="col-form-label col-md-3 col-sm-3  label-align">Họ Và Tên<span class="required">*</span></label>
              <input class="form-control" data-validate-length-range="6" data-validate-words="2" id="modal-name" required="required" />
          </div>
          <div class="field item form-group">
              <label class="col-form-label col-md-3 col-sm-3  label-align">Địa Chỉ<span class="required">*</span></label>
              
                  <input class="form-control" class='optional' id="modal-address" data-validate-length-range="5,15" type="text" />
          </div>
          <div class="field item form-group">
              <label class="col-form-label col-md-3 col-sm-3  label-align">Email<span class="required">*</span></label>
                  <input class="form-control" type="email" class='email'  id="modal-email" data-validate-linked='email' required='required' />
          </div>
          <div class="item form-group">
              <label class="col-form-label col-md-3 col-sm-3 label-align">Giới tính</label>
              <select name="gender" class="form-control" id="modal-gender" > 
                  <option value="male">Nam</option>
                  <option value="female">Nữ</option>
              </select>
              </div>
          <div class="field item form-group">
              <label class="col-form-label col-md-3 col-sm-3  label-align">Ngày Sinh<span class="required">*</span></label>
                  <input class="form-control" class='date' type="date"  id="modal-dob" required='required'>
          </div>

          <div class="field item form-group">
              <label class="col-form-label col-md-3 col-sm-3  label-align">Số điện thoại<span class="required">*</span></label>
                  <input class="form-control" type="tel" class='tel'  id="modal-phone" required='required' data-validate-length-range="8,20" />
                </div>
          <div class="field item form-group">
              <label class="col-form-label col-md-3 col-sm-3  label-align">Chức Vụ<span class="required">*</span></label>
              <select name="position" class="form-control"  id="modal-level"> 
                  <option value="1">Giảng Viên</option>
                  <option value="2">Trợ Giảng</option>
                  <option value="4">Tạp Vụ</option>
                  <option value="3">IT</option>
                  <option value="5">Quản Trị Viên</option>
              </select>
          </div>
          <div class="field item form-group">
              <label class="col-form-label col-md-3 col-sm-3  label-align">Chứng Chỉ<span class="required">*</span></label>
                  <input class="form-control" class='text'  id="modal-certi" required='required' data-validate-length-range="5,20" /></div>
          <div class="field item form-group">
              <label class="col-form-label col-md-3 col-sm-3  label-align">Số Chứng Minh Thư<span class="required">*</span></label>
            
                  <input class="form-control" type="number"  id="modal-cmnd" required='required' data-validate-length-range="10,15" /></div>
          <div class="field item form-group">
              <label class="col-form-label col-md-3 col-sm-3  label-align">Hệ số lương<span class="required">*</span></label>
                  <input class="form-control" type="number"  id="modal-hsl" required='required' data-validate-length-range="0,10" /></div>
          </div>
          <div class="field item form-group">
              <label class="col-form-label col-md-3 col-sm-3  label-align">Avatar<span class="required">*</span></label>
                  <input class="form-control" type="file"  id="modal-image" style="width: 72%"/>
          </div>
        <div class="modal-footer">
        <button  id='modal-edit' class="btn btn-primary pull-right" onclick='edit()'>Sửa</a>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
    </div>

  
<!-- Modal -->
    <div id="myModal-contract" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
          <table class="table table-striped jambo_table bulk_action bulk_action">
              <thead>
              <tr class="headings">
                  <th class="column-title">Mã hợp đồng</th>
                  <th class="column-title">Tên hợp đồng</th>
                  <th class="column-title">Ngày bắt đầu</th>
                  <th class="column-title">Ngày kết thúc</th>
                  <th class="column-title">Loại hợp đồng</th>
                  <th class="column-title">Tình trạng</th>
              </tr>
              </thead>
              <tbody id='table-contract'>                                                                                                        
              </tbody>
          </table>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>

      </div>
    </div>




    <!-- mẫu xoá -->
    <script type='text/javascript'>
    function end_contract(id) { 
      if (confirm("Kết thức hợp đồng với nhân viên!")){
      $.ajax({
        type: "post",
        url: "../php/nhanvien/end.php",
        data: {
          id: id,
        },
        success: function (data) {
          if (data =="success"){
            new PNotify({
                title: 'Thành công',
                text: 'Lưu trữ nhân thành công',
                type: 'success',
                styling: 'bootstrap3'
              });
            setTimeout(function() {
              window.location.replace("contacts.php");
              }, 3000);
           }
           else if (data == 'cannot'){
             alert("Nhân viên có lớp đang phụ trách, không thể lưu trữ");
           }
           else {
            new PNotify({
                  title: 'Thất bại',
                  text: 'Lưu trữ nhân viên thất bại',
                  type: 'error',
                  styling: 'bootstrap3'
              });
           }
        }
      });
      }
     }


    var id;
    function contract(this_id) {
      $('#modal-contract').modal('show');
      id = this_id;
    }
    function btn_submit() { 
      name = $("#name-contract").val();
      contract_type = $("#modal-contract #contract-type").val();
       salary = parseInt($("#modal-contract #input-salary").val());
       month = parseInt($("#modal-contract #month-effected").val());
       $.ajax({
         type: "post",
         url: "../php/nhanvien/contract.php",
         data: {
            staff_id : id,
            name: name,
            contract_type : contract_type,
            salary: salary,
            month: month,
         },
         success: function (data) {
          $('#modal-contract').modal('toggle');
           if (data =="success"){
            new PNotify({
                                  title: 'Thành công',
                                  text: 'Gia hạn hợp đồng thành công',
                                  type: 'success',
                                  styling: 'bootstrap3'
                              });
            setTimeout(function() {
              window.location.replace("contacts.php");
              }, 3000);
           }
           
           else {
            new PNotify({
                      title: 'Thất bại',
                      text: 'Gia hạn hợp đồng thất bại',
                      type: 'error',
                      styling: 'bootstrap3'
                  });
           }
         }
       });

     }


    // delete có thể dùng chung bằng cách truyền id, talbe vào và gọi đến delete.php
      function deleteAjax(id){
        if (confirm('Xoá nhân viên này?')){
            $.ajax({
              type:'post',
              url: '../php/nhanvien/delete.php',
              data: {
                id: id,
              },
              success: function(data){
                  if(data=="success"){
                    $('#employee-'+id).hide();
                new PNotify({
                                  title: 'Thành công',
                                  text: 'Đã xoá',
                                  type: 'success',
                                  styling: 'bootstrap3'
                              });
                  }
                  else if (data =="cannot"){
                  alert("Nhân viên có lớp để phụ trách, không thể xoá");
                }
              }
            });
        }
      }

      var temp_gender, name, certi, address, phone, gender, level_name, email, hsl, cmnd, id;
      function open_modal(this_id){
        id = this_id;
         temp_gender ='';
         name = $("#name-"+id).text().trim();
         certi = $("#certi-"+id).text().trim();
         address = $("#address-"+id).text().trim();
         dob = $("#dob-"+id).text().trim();
         phone = $("#phone-"+id).text().trim();
         gender = $("#gender-"+id).html().trim();
         level_id = $("#level-id-"+id).text().trim();
         email = $("#email-"+id).text().trim();
         hsl = $("#hsl-"+id).text().trim();
         cmnd = $("#cmnd-"+id).text().trim();
        $('#myModal').modal('show'); 
        $('#myModal #modal-name').val(name);  
        $('#myModal #modal-certi').val(certi);
        $('#myModal #modal-address').val(address); 
        $('#myModal #modal-phone').val(phone); 
        if (gender =='<i class="fa fa-male fa-2x"></i>'){
          temp_gender ='male';
        }
        else if (gender =='<i class="fa fa-female fa-2x"></i>')
        {
          temp_gender ='female';
        }
        $('#myModal #modal-gender').val(temp_gender);
        $('#myModal #modal-email').val(email);
        $('#myModal #modal-cmnd').val(hsl);
        $('#myModal #modal-hsl').val(cmnd);
        $('#myModal #modal-level').val(level_id);
        $('#myModal #modal-dob').val(dob);
      }
      function  edit() {
        var files = $('#modal-image')[0].files;
        var formData = new FormData();
        formData.append('name', $('#myModal #modal-name').val());
        formData.append('certi', $('#myModal #modal-certi').val());
        formData.append('address', $('#myModal #modal-address').val());
        formData.append('gender', $('#myModal #modal-gender').val());
        formData.append('dob', $('#myModal #modal-dob').val());
        formData.append('level_id', $('#myModal #modal-level').val());
        formData.append('phone', $('#myModal #modal-phone').val());
        formData.append('email', $('#myModal #modal-email').val());
        formData.append('hsl', $('#myModal #modal-hsl').val());
        formData.append('cmnd', $('#myModal #modal-cmnd').val());
        formData.append('id', id);
        formData.append('avatar', files[0]);
        $.ajax({
              type:'post',
              url: '../php/ajax/update/ajax_update_staff.php',
              contentType: false,
              processData: false,
              data: formData,
              success: function(data){
                if (data == "success"){
                  new PNotify({
                                  title: 'Thành công',
                                  text: 'Cập nhật thành công',
                                  type: 'success',
                                  styling: 'bootstrap3'
                              });
                              setTimeout(function() {
              window.location.replace("contacts.php");
              }, 3000);
                }
                else if (data =="fail"){
                  new PNotify({
                                  title: 'Thất bại',
                                  text: 'Cập nhật thất bại',
                                  type: 'success',
                                  styling: 'bootstrap3'
                              });
                }
                $('#myModal').modal('toggle');
              }
              });
            };
    function show_contract(id){
      $("#myModal-contract").modal("show");
      var html_temp = '';
      $.ajax({
              type:'post',
              url: '../php/ajax/ajax_show_contract.php',
              dataType: 'json',
              data: {id: id},
              success: function(data){
                for(var i = 0; i < data.length; i++) {
                  html_temp += `<tr><td style="color: ${data[i].color}">${data[i].id}</td><td>${data[i].name}</td>
                    <td>${data[i].date_from}</td><td>${data[i].date_to}</td><td>${data[i].type}</td><td style="color: ${data[i].color}">${data[i].state}</td></tr>`;
                    $("#table-contract").html(html_temp);
                }
              }
              });
      
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