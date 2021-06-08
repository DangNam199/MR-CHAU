<?php 
include '../php/connect.php';
include '../php/general_setting.php';
    if (isset($_POST['submit']) && $_POST['datepicker'] != ''){
        $all = $_POST['datepicker'];
        $all = explode('-', $all);
        $date = $all[0];
        $year = $all[1];
        $sql_in = "SELECT *  FROM lienhe WHERE month(date) = $date  and YEAR(date) = $year and state = 'contacted' ORDER BY date ";
        $res_in = mysqli_query($conn,$sql_in);
    }
    
    include '../php/session.php';
    if ($_SESSION['level'] != 5 and $_SESSION['level'] != 6){
      header("location: index.php");
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

    <title><?=$res_setting['name']?> </title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">

    <link href="../vendors/pnotify/dist/pnotify.css" rel="stylesheet">
    <link href="../vendors/pnotify/dist/pnotify.buttons.css" rel="stylesheet">
    <link href="../vendors/pnotify/dist/pnotify.nonblock.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">

    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>
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
                            <h3>Học viên tiềm năng</h3>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <p  hidden></p>
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="x_panel">
                            <div class="table-responsive">
                                <p>Học viên tiềm năng đã liên lạc</p>
                                <form method = "post">
                            <input type="text" class="form-control" name="datepicker" id="datepicker" />
                            <input type="submit" class="form-control" name="submit"/>
                            </form>

                      <table class="table table-striped jambo_table bulk_action bulk_action">
                        <thead>
                          <tr class="headings">
                            <th class="column-title">Tên học viên </th>
                            <th class="column-title">Email </th>
                            <th class="column-title">Số điện thoại</th>
                            <th class="column-title">Ghi chú </th>
                            <th class="column-title">Ngày tạo yêu cầu </th>
                            <th class="column-title">Ngày ngày liên lạc lại </th>
                            <th class="column-title">Ngày ngày liên lạc lại </th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php 
                                if(isset($_POST['submit']) && $_POST['datepicker'] != ''){
                                  echo "<p id='date' hidden>$date</p>";
                                  echo "<p id='year' hidden>$year</p>";
                                while($row = mysqli_fetch_assoc($res_in)) {
                            ?>
                        <tr>
                            <td id ='name-<?=$row['id']?>'><?=$row['hoten']?></td>
                            <td id ='email-<?=$row['id']?>' ><?=$row['email']?></td>
                            <td id ='phone-<?=$row['id']?>' ><?=$row['sodienthoai']?></td>
                            <td><?=$row['ghichu']?></td>
                            <td><?=$row['date']?></td>
                            <td><?=$row['date_again']?></td>
                            <td><button class = 'btn btn-primary' onclick="create_student(<?=$row['id']?>)">Tạo học viên</button></td>
                            <?php }}?>
                        </tr>
                        </tbody>
                      </table>
                      <?php 
                        if(isset($_POST['submit'])){
                      ?>
                      <div class='container'>
                      <canvas id="myChart"></canvas>    
                      </div>
                      <?php }?>
                    </div>       
                                </div>
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


    <div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Tạo học viên</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
            <div class="field item form-group">
                <label class="col-form-label col-md-3 col-sm-3  label-align">Họ Và Tên<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6">
                    <input class="form-control" data-validate-length-range="6" data-validate-words="2" id="name_input" required="required" />
                </div>
            </div>
            <div class="field item form-group">
                <label class="col-form-label col-md-3 col-sm-3  label-align">Địa Chỉ<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6">
                    <input class="form-control" class='optional' id="address_input" data-validate-length-range="5,15" type="text" /></div>
            </div>
            <div class="field item form-group">
                <label class="col-form-label col-md-3 col-sm-3  label-align">Email<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6">
                    <input class="form-control" type="email" class='email' id="email_input" data-validate-linked='email' required='required' /></div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Gender</label>
                <div class="col-md-6 col-sm-6 ">
                <select id="gender_input" class="form-control"> 
                    <option value="male">Nam</option>
                    <option value="female">Nữ</option>
                </select>
                </div>
                </div>
            <div class="field item form-group">
                <label class="col-form-label col-md-3 col-sm-3  label-align">Date<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6">
                    <input class="form-control" class='date' type="date" id="dob_input" required='required'></div>
            </div>

            <div class="field item form-group">
                <label class="col-form-label col-md-3 col-sm-3  label-align">Số điện thoại<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6">
                    <input class="form-control" type="tel" class='tel' id="phone_input" required='required' data-validate-length-range="8,20" /></div>
            </div>
            <div class="field item form-group">
                <label class="col-form-label col-md-3 col-sm-3  label-align">Avatar<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6">
                    <input class="form-control" type="file" id='image' name="image" required='required'/></div>
            </div>
            </div>

      <!-- Modal footer -->
      <div class="modal-footer">
      <button type="button" class="btn btn-primary" onclick="submit()">Tạo</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>


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
    var name, email, phone, id;
    function create_student(this_id){
      $("#address_input").val("");
      $("#dob_input").val("");
      $("#image").val("");
      id = this_id;
      name = $("#name-"+id).text();
      email = $("#email-"+id).text();
      phone = $("#phone-"+id).text();
      $("#myModal").modal('show');  
      $("#name_input").val(name);
      $("#email_input").val(email);
      $("#phone_input").val(phone);
    }
    function submit(){
      name = $("#name_input").val();
      email =  $("#email_input").val();
      phone = $("#phone_input").val();
      address = $("#address_input").val();
      dob = $("#dob_input").val();
      gender = $("#gender_input").val();
      var files = $('#image')[0].files;
      console.log(files);
      var formData = new FormData();
      formData.append('name', name);
      formData.append('email', email);
      formData.append('phone', phone);
      formData.append('address', address);
      formData.append('dob', dob);
      formData.append('gender', gender);
      formData.append('lead_id', id);
      formData.append('avatar', files[0]);
      $.ajax({
              type:'post',
              url: '../php/ajax/ajax_lead.php',
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
              window.location.replace("all_student.php");
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
    }
	</script>
  <script>
    var all_data, date, year;
    function getData(){
      date = $("#date").text();
      year = $("#year").text();
      var res = [];
      $.ajax({  
        type: "POST",
        url: "../php/chart_lead.php",
        data : {
          date: date,
          year: year
        },
        async: false,
        success: function(data){
          res = data.split(',');
        },
      });
      console.log("aaaaa"+res);
      return res;
    }
    all_data = getData();
    showGraph(all_data);
    function showGraph(data){    
      console.log(data);
    let myChart = document.getElementById('myChart').getContext('2d');
    // Global Options
    Chart.defaults.global.defaultFontFamily = 'Lato';
    Chart.defaults.global.defaultFontSize = 18;
    Chart.defaults.global.defaultFontColor = '#777';

    let massPopChart = new Chart(myChart, {
      type:'pie', // bar, horizontalBar, pie, line, doughnut, radar, polarArea
      data:{
      labels: [
        'Thành Công',
        'Chưa rõ',
      ],
      datasets: [{
        label: 'Tỉ lệ',
        data: data,
        backgroundColor: [
          'rgb(255, 99, 132)',
          'rgb(54, 162, 235)',
        ],
        hoverOffset: 4
      }]
    },
      options:{
        responsive: true,
        maintainAspectRatio: false,
        title:{
          display:true,
          text:'Tỉ lệ thu hút học viên',
          fontSize:25
        },
        legend:{
          display:true,
          position:'right',
          labels:{
            fontColor:'#000'
          }
        },
        layout:{
          padding:{
            left:50,
            right:0,
            bottom:0,
            top:0
          }
        },
        tooltips:{
          enabled:true
        }
      }
    });}

      
  </script>
      <script type="text/javascript">
    $(function () {  
    $("#datepicker").datepicker({         
        format: "mm-yyyy",
        startView: "months", 
        minViewMode: "months"
    });
    });
    </script>


    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <script src="../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <script src="../vendors/nprogress/nprogress.js"></script>
    <script src="../build/js/custom.min.js"></script>
    <script src="../vendors/pnotify/dist/pnotify.js"></script>
    <script src="../vendors/pnotify/dist/pnotify.buttons.js"></script>
    <script src="../vendors/pnotify/dist/pnotify.nonblock.js"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/css/datepicker.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/js/bootstrap-datepicker.min.js"></script>

</body>

</html>
