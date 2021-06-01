<?php 
    include '../php/connect.php';
    include '../php/weekday.php';
    include '../php/session.php';
    if ($_SESSION['level'] != 5 and $_SESSION['level'] != 6){
      header("location: index.php");
    }
    $sql= "SELECT * FROM `all_class` ORDER BY class_id DESC";
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
    $sql = "SELECT * FROM `all_class` ORDER BY class_id DESC limit ".$this_page_result. ','.$result_per_page;
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
                      <li><a href="form_news.php">Tạo Tin Tức</a></li>
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
            <!-- /top navigation -->

            <!-- page content -->
            <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Contacts Design</h3>
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
                              <a class="btn btn-app"><i  class="fa fa-close"> </i> Xoá Lớp</a>
                               <?php 
                                if($row['state']!= 'done' && $row_count['count_id'] < $row['seat']){
                                  echo '<a class="btn btn-app" data-toggle="modal" onclick="add_student('.$row['class_id'].')"  data-role="update"q ><i  class="fa fa-plus"> </i> Thêm học viên </a>';
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
            <!-- /page content -->

            <!-- footer content -->
            <footer>
            </footer>
            <!-- /footer content -->
        </div>
    </div>
    <div class="modal" id="modal-student">
        <div class="modal-dialog">
          <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title">Thêm học viên cho lớp</h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <div class='form-group'>
              <h2><span id ="modal-taken-seat">Số ghế lấy</span>/<span id ="modal-seat">Số ghế</span></h2>
          </div>
        </div>
        <div class="field item form-group" >
          <label class="col-form-label col-md-3 col-sm-3  label-align">Học viên<span class="required">*</span></label>
          <select id="select-student" class="form-control selectpicker" data-live-search="true" data-max-options="1" multiple> 
            <?php 
              $sql_free = "SELECT id,name FROM hocvien WHERE class_id IS NULL";    
              $res_free = mysqli_query($conn, $sql_free);
              while ($row_free = mysqli_fetch_assoc($res_free)){ ?>
                <option value="<?php echo $row_free['id'] ?>"><?php echo $row_free['id'] .' - '. $row_free["name"] ?></option>
                <?php }?>
           </select> 
         </div>

        <div class="modal-footer">
          <a href="#" id='modal-click' onclick="submit_modal()" class="btn btn-primary pull-right" >Thêm học viên</a>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>

  <script>
    var taken_seat = 0;
    var temp_id;
    function add_student(id){
      temp_id = id;
      taken_seat = $('#taken-seat-'+id).text();
      var seat = $('#seat-'+id).text();
      $('#modal-student').modal('show');
      $('#modal-taken-seat').text(taken_seat);
      $('#modal-seat').text(seat);
      $('#select-student  option').prop("selected", false);
      $("#select-student").selectpicker("refresh");
      $('#select-student').selectpicker({
        maxOptions: seat - taken_seat
      }); 
    }
    function submit_modal(){
      taken_seat = $('#taken-seat-'+temp_id).text();
      var selected = $('#select-student').val();
      if (selected.length <=0){
        alert("Hãy chọn học viên"); 
      }
      $.ajax({
        type: "post",
        url: "../php/ajax/add_student_to_class.php",
        data: {
          id: temp_id,
          student: selected,
        },
        success: function (data) {
          if(data =="success"){
            $('#modal-student').modal('toggle');
            alert('Thêm học viên thành công');
        location.reload(); 
          }
          else if (data ="fail"){
                new PNotify({
                title: 'Error',
                text: 'Thêm học viên thất bại.',
                type: 'error',
                styling: 'bootstrap3'
            });
          }
        }
      });
    }

    $('#select-student').on('change', function(e){
        var selected = $('#select-student').val();
        try{
        var temp_seat = parseInt(taken_seat) + parseInt(selected.length);
        $('#modal-taken-seat').text(taken_seat);
        }
        catch(err){
          temp_seat = parseInt(taken_seat);
        }
        $('#modal-taken-seat').text(temp_seat);
    });
      function sum_arr(arr){
        var sum =0;
        for (var i=0; i<arr.length; i++){
          sum += parseInt(arr[i]);
        }
        return sum;
      }

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
        // on form "reset" event
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