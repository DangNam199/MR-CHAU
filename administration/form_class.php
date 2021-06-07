<?php 
    include '../php/connect.php';    
    include '../php/session.php';
    if ($_SESSION['level'] != 5 and $_SESSION['level'] != 6){
      header("location: index.php");
    }
    $res_degree = mysqli_query($conn, "SELECT * from `degree`");
    $sql_teacher = "SELECT * FROM `nhanvien` WHERE level_id = 1";
    $res_teacher = mysqli_query($conn,$sql_teacher);

    $sql_trogiang = "SELECT * FROM `nhanvien` WHERE level_id = 2";
    $res_trogiang = mysqli_query($conn,$sql_trogiang);

    $sql_room = "SELECT * FROM `room`";
    $res_room = mysqli_query($conn,$sql_room);
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
            <!-- /top navigation -->

            <!-- page content -->
            <div class="right_col" role="main">
                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>Thêm mới lớp</h3>
                        </div>
                    </div>
                    <div class="clearfix"></div>

                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Thông tin lớp</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <form  method="post">
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Tên Lớp<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" data-validate-length-range="6" data-validate-words="2" id="name_class" required="required" />
                                            </div>
                                        </div>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Chứng chỉ dạy<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                            <select name="degree" class="form-control" id="select-degree"> 
                                            <option value="" ></option>
                                            <?php while ($row_degree = mysqli_fetch_array($res_degree)){?>
                                                <option value="<?php echo $row_degree['id'] ?>"><?=$row_degree["tenDegree"] ?></option>
                                                <?php }?>
                                            </div>
                                            </select>
                                            </div>
                                        </div>
                                        
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Thời gian<span class="required">*</span></label>
                                                <input class="form-control" type="date"  required='required' id="date_from" style="width: 25%;"/>
                                                <input class="form-control" type="date" required='required' id="date_to" style="width: 25%;" readonly/>

                                        </div>
                                        
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Giờ Học<span class="required">*</span></label>
                                                <input class="form-control" type="time" name="time_from" id="time_from" required='required' style="width: 25%;"/>
                                                <input class="form-control" type="time" name="time_to" id="time_to" required='required' style="width: 25%;" readonly/>
                                        </div>
                                        <table class="table table-striped jambo_table bulk_action bulk_action">
                                            <thead>
                                            <tr class="headings">
                                                <th class="column-title" id >Thứ 2</th>
                                                <th class="column-title">Thứ 3</th>
                                                <th class="column-title">Thứ 4</th>
                                                <th class="column-title">Thứ 5</th>
                                                <th class="column-title">Thứ 6</th>
                                                <th class="column-title">Thứ 7</th>
                                                <th class="column-title">Chủ Nhật</th>
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody  id='weekday'>
                                            <tr class="even pointer">
                                                <td class="a-center">
                                                <input type="checkbox" class="flat" value="2">
                                                </td>
                                                <td class="a-center">
                                                <input type="checkbox" class="flat" value="4" >
                                                </td>
                                                <td class="a-center">
                                                <input type="checkbox" class="flat" value="8">
                                                </td>
                                                <td class="a-center">
                                                <input type="checkbox" class="flat" value="16">
                                                </td>
                                                <td class="a-center">
                                                <input type="checkbox" class="flat" value="32">
                                                </td>
                                                <td class="a-center">
                                                <input type="checkbox" class="flat" value="64">
                                                </td>
                                                <td class="a-center">
                                                <input type="checkbox" class="flat" value="1">
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        <div class="field item form-group" >
                                          <label class="col-form-label col-md-3 col-sm-3  label-align">Khoá Học<span class="required">*</span></label>
                                            <select id="select-course" class="form-control selectpicker" data-live-search="true">
                                            </select> 
                                        </div>
                                        <table class="table table-striped jambo_table bulk_action bulk_action">
                                            <thead>
                                            <tr class="headings">
                                                <th></th>
                                                <th class="column-title">Tên Khoá Học</th>
                                                <th class="column-title">Số Buổi Học</th>
                                                <th class="column-title">Thời gian mỗi buổi</th>
                                                <th class="column-title">Price</th>
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody id='table-course'>                                                                                                        
                                            </tbody>
                                        </table>
                                        <div class="field item form-group" >
                                          <label class="col-form-label col-md-3 col-sm-3  label-align">Phòng Học<span class="required">*</span></label>
                                            <select id="select-room" class="form-control selectpicker" data-live-search="true"> 
                                              <?php while ($row_room = mysqli_fetch_array($res_room)){?>
                                                <option value="<?php echo $row_room['id'] ?>"><?php echo $row_room['id'] .' - '. $row_room["name"] ?></option>
                                                <?php }?>
                                            </select> 
                                        </div>
                                        <div class="field item form-group" >
                                          <label class="col-form-label col-md-3 col-sm-3  label-align">Giảng Viên<span class="required">*</span></label>
                                            <select id="select-teacher" class="form-control selectpicker" data-live-search="true"> 
                                              <?php while ($row_teacher = mysqli_fetch_array($res_teacher)){?>
                                                <option value="<?php echo $row_teacher['id'] ?>"><?php echo $row_teacher['id'] .' - '. $row_teacher["TenNV"] ?></option>
                                                <?php }?>
                                            </select> 
                                        </div>
                                        <div class="field item form-group" >
                                          <label class="col-form-label col-md-3 col-sm-3  label-align">Trợ Giảng<span class="required">*</span></label>
                                            <select id="select-tutors" class="form-control selectpicker" data-live-search="true" multiple> 
                                              <?php while ($row_trogiang = mysqli_fetch_array($res_trogiang)){?>
                                                <option value="<?php echo $row_trogiang['id'] ?>"><?php echo $row_trogiang['id'] .' - '. $row_trogiang["TenNV"] ?></option>
                                                <?php }?>
                                            </select> 
                                        </div>
                                        <div class="ln_solid">
                                            <div class="form-group">
                                                <div class="col-md-6 offset-md-3" id='submit-button'>
                                                  <input type="button"  class="btn btn-success" id="btnClick" value="Nhập khoá cho lớp"/>
                                                  <input type="button"  class="btn btn-success" id="btnClick1" value="Tạo lớp"/>
                                                </div>  
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script>
            $('#date_from').change(function() {
                var date = $(this).val();
                date.replaceAll('-','/');
                date = new Date(date);
                if (date <= Date.now()){
                  alert("Mở lớp sớm hơn 1 ngày để có thờI gian chuẩn bị");
                  var date = $(this).val("");
                }
            });
                                                
             var id_course, techer , tutors, time_from,time_to, date_from, date_to, weekDay = [];
             var price, time, duration;
            $("#select-course").change(function(){
                id_course = $('#select-course option:selected').val();
                ajax_course(id_course);
            });
            $('#select-degree').change(function(){
              $("#select-course").empty();
              $("#select-course").selectpicker('refresh');
                id_degree = ( $(this).find("option:selected").attr('value'));
                $.ajax({
                    url: '../php/ajax/all_course.php',
                    method: 'post',
                    data: {id_degree: id_degree},
                    success: function(data){
                        data = JSON.parse(data);
                        if (data.length == 0){
                            alert("Chứng chỉ chưa có khoá dạy");    
                        }
                        else {
                          $('#select-course').append(`<option></option>`);
                            data.forEach(function(i){
                               $('#select-course').append(`
                                  <option value="${i.id}">${i.id} - ${i.name}</option>`);
                            });
                            $("#select-course").selectpicker('refresh');
                        }
                    }
                });
            });
            Date.prototype.addDays = function(days) {
              this.setDate(this.getDate() + parseInt(days));
              return this;
                };
            
            function ajax_course(id_course) {
              $.ajax({
                    type: "post",
                    url: "../php/ajax/all_course.php",
                    data: {id_course : id_course},
                    dataType: "json",
                    success: function (data) {
                      price = data.price;
                      duration = data.duration;
                      time = data.time;
                      $("#table-course").html(`<td></td><td>${data.tenKH}</td><td>${data.duration}</td><td>${data.time}</td><td>${data.price}</td>`);
                    }
                  }); 
                }
            
            
            function addTime(time, time_need){
              time = time.split(':');
              console.log(time);
              hours = parseInt(time[0]) + Math.floor(time_need/1);
              min = parseInt(time[1]) + time_need%1;
              min = min *60;
              if (min%1==0){
                time = hours + ':' + min +'0';
              }
              else{
                time = hours + ':' + min;
              }
              return time;
            }

            $("#btnClick").mousedown(function () {
              weekDay = [];
              var is_full = 1
                  $('#weekday input[type=checkbox]:checked').each(function() {
                    weekDay.push($(this).val());
                  });
                  if (weekDay.length == 0) {
                    is_full = 0;
                    new PNotify({
                                  title: 'Missing',
                                  text: 'Chọn ngày học trong tuần.',
                                  type: 'error',
                                  hide: false,
                                  styling: 'bootstrap3'
                              });
                  }
                time_from = $('#time_from').val();
                console.log(time_from);
                date_from = $('#date_from').val();
                
                if(!time_from | !date_from){
                  is_full = 0;
                  new PNotify({
                                  title: 'Missing',
                                  text: 'Chọn thời gian học.',
                                  type: 'error',
                                  hide: false,
                                  styling: 'bootstrap3'
                              });
                }
                if(!duration & !time & !price ){
                  is_full = 0;
                  new PNotify({
                                  title: 'Missing',
                                  text: 'Chọn chứng chỉ.',
                                  type: 'error',
                                  styling: 'bootstrap3'
                              });
                }

                if (is_full == 1){
                var date_temp = new Date(date_from);
                var day_need = 0;
                day_need = (duration / weekDay.length) * 7
                date_temp.addDays(day_need);
                var month = date_temp.getUTCMonth() + 1; //months from 1-12
                var day = date_temp.getUTCDate();
                var year = date_temp.getUTCFullYear();
                date_to = year + "-" + month + "-" + day;
                var today = new Date(date_to).toISOString().split('T')[0];
                console.log( "ASDSAD" + time_from);
                time_to = addTime(time_from, time);
                console.log(time_to + "time_to");
                $("#date_to").val(today);
                $("#time_to").val(time_to);
                }
     
            });
            $("#btnClick1").mousedown(function () {
                name_class = $('#name_class').val();
                room_id = $('#select-room').val();
                teacher = $("#select-teacher").val();
                tutors= $("#select-tutors").val();
                console.log(teacher);
                if (!teacher){
                  new PNotify({
                                  title: 'Missing',
                                  text: 'Chọn Giảng Viên.',
                                  type: 'error',
                                  styling: 'bootstrap3'
                              });
                }
                if (!tutors){
                  new PNotify({
                                  title: 'Missing',
                                  text: 'Chọn Trợ Giảng.',
                                  type: 'error',
                                  styling: 'bootstrap3'
                              });
                }
                if (teacher && tutors){
                  $.ajax({
                    type: "post",
                    url: "../php/ajax/add_class.php",
                    data: {
                      name_class: name_class,
                      teacher: teacher,
                      tutors: tutors,
                      date_from: date_from,
                      date_to: date_to,
                      time_from: time_from,
                      weekDay: sum_arr(weekDay),
                      time_to: time_to,
                      id_course: id_course,
                      id_room: room_id,
                    },
                    success: function (data) {
                      if(data=="success"){
                        new PNotify({
                                  title: 'Success',
                                  text: 'Thêm lớp thành công.',
                                  type: 'success',
                                  styling: 'bootstrap3'
                              });
                        window.location.replace("all_class.php");
                      }
                    }
                  }); 
                }

            });
            function sum_arr(arr){
              var sum =0;
              for (var i=0; i<arr.length; i++){
                sum += parseInt(arr[i]);
              }
              return sum;
            }
            

                // function convertTime(data){
                //   data = data.split(':');
                //   return (parseInt(data[0]*60) + parseInt(data[1]))/60;
                // }   
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="../vendors/validator/multifield.js"></script>
    <script src="../vendors/validator/validator.js"></script>
    
    <!-- Javascript functions	-->
	<script>
		function hideshow(){
			var password = document.getElementById("password1");
			var slash = document.getElementById("slash");
			var eye = document.getElementById("eye");
			
			if(password.type === 'password'){
				password.type = "text";
				slash.style.display = "block";
				eye.style.display = "none";
			}
			else{
				password.type = "password";
				slash.style.display = "none";
				eye.style.display = "block";
			}

		}
	</script>

    <script>
        var validator = new FormValidator({
            "events": ['blur', 'input', 'change']
        }, document.forms[0]);
        // on form "submit" event
        document.forms[0].onsubmit = function(e) {
            var submit = true,
                validatorResult = validator.checkAll(this);
            console.log(validatorResult);
            return !!validatorResult.valid;
        };
        // on form "reset" event
        document.forms[0].onreset = function(e) {
            validator.reset();
            $('#table-course').empty();
        };
        // stuff related ONLY for this demo page:
        $('.toggleValidationTooltips').change(function() {
            validator.settings.alerts = !this.checked;
            if (this.checked)
                $('form .alert').remove();
        }).prop('checked', false);
    </script>
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
