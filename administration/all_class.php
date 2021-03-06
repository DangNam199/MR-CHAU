<?php 
    include '../php/connect.php';
    include '../php/weekday.php'; 
    include '../php/auto_student.php';
    include '../php/session.php';
    include '../php/general_setting.php';
    if ($_SESSION['level'] != 5 and $_SESSION['level'] != 6){
      header("location: index.php");
    }
    $state = 'studing';
    if (!isset($_POST['submit']) && isset($_POST['state'])){
      $state = $_POST['state'];
    }

    $sql= "SELECT * FROM `all_class` where state = '$state' ORDER BY class_id DESC";
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
    $sql = "SELECT * FROM `all_class` where state = '$state' ORDER BY class_id DESC limit ".$this_page_result. ','.$result_per_page;
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

    <title><?=$res_setting['name'] ?></title>

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
                  <?php 
                    if ($_SESSION['level'] == 5 or $_SESSION['level'] == 6){
                      ?>
                  <li><a> Nh??n Vi??n <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="form_staff.php">T???o Nh??n Vi??n</a></li>
                      <li><a href="contacts.php">T???t C??? Nh??n Vi??n</a></li>
                      <li><a href="salary.php">Duy???t l????ng nh??n vi??n</a></li>
                      <li><a href="end_contacts.php">T???t C??? Nh??n Vi??n ???? L??u Tr???</a></li>
                    </ul>
                  </li>
                  <li><a> H???c Vi??n <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="form_student.php">T???o H???c Vi??n</a></li>
                      <li><a href="csv_student.php">Nh???p H???c Vi??n b???ng file csv</a></li>
                      <li><a href="all_student.php">T???t C??? H???c Vi??n</a></li>
                      
                    </ul>
                  </li>
                  <li><a> H???c ph?? <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="fee.php">H???c vi??n ????ng h???c ph??</a></li>
                      <li><a href="all_fee.php">Danh s??ch h???c ph??</a></li>
                    </ul>
                  </li>
                  <li><a> L???p <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="form_class.php">L???p</a></li>
                      <li><a href="all_class.php">T???t C??? L???p</a></li>
                    </ul>
                  </li>
                  <li><a> Ph??ng H???c <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="form_room.php">Th??m Ph??ng</a></li>
                      <li><a href="all_room.php">T???t C??? Ph??ng</a></li>
                    </ul>
                  </li>
                  <li><a> Ch???ng ch??? ??ang ????o t???o <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="form_degree.php">T???o Ch???ng Ch???</a></li>
                      <li><a href="all_degree.php">T???t C??? Ch???ng Ch???</a></li>
                    </ul>
                  </li>
                  <li><a> Kho?? H???c <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="form_courses.php">T???o Kho?? H???c</a></li>
                      <li><a href="all_courses.php">T???t C??? Kho?? H???c</a></li>
                    </ul>
                  </li>
                  <li><a> T??i Li???u <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="form_document.php">Nh???p t??i li???u</a></li>
                      <li><a href="all_document.php">T???t C??? T??i li???u</a></li>
                    </ul>
                  </li>
                  <li><a> Tin T???c <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="form_news.php">T???o Tin T???c</a></li>
                      <li><a href="all_news.php">T???t C??? Tin T???c</a></li>
                    </ul>
                  </li>
                  <li><a> Chi <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="form_spending.php">Chi</a></li>
                      <li><a href="all_spending.php">T???t c??? chi</a></li>
                    </ul>
                  </li>
                  <li><a> B??o C??o <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="report_in.php">B??o c??o thu</a></li>
                      <li><a href="report_out.php">B??o c??o chi</a></li>
                      <li><a href="report_salary.php">B??o l????ng nh??n vi??n</a></li>
                      <li><a href="report_all.php">B??o T???ng </a></li>
                    </ul>
                  </li>
                 <?php }
                 else {
                 ?>
                 <li><a href="my_class.php">L???p c???a t??i</a>
                  </li>
                  <li><a href="schedule.php"> L???ch  </a>
                  </li>
                  <li><a> C??ng <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="my_worktime.php">Xem l???ch s??? ch???m c??ng</a></li>
                      <li><a href="my_salary.php">L????ng</a></li>
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
                <h3>Danh s??ch L???p</h3>
              </div>
            <div class="clearfix"></div>

            <div class="row">
                <div class="x_panel">
                  <div class="x_content">
                  <div class="form-group">
                    <form method = "POST">
                    <select class="form-control" name="state">
                      <option value='studing'>??ang H???c</option>
                      <option value='done' >???? h???c xong</option>
                      <option value='waiting' >??ang ch??? l???ch</option>
                      <option value='waiting_exam' >??ang ch??? l???ch thi </option>
                      <option value='marking' >??ang ch???m ??i???m </option>
                    </select>
                    <input type='submit' class ='btn btn-primary' value="L???c L???p"/>
                    </form>
                  </div> 
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
                              <p id="course" ><strong>Kho??: </strong> <?=$row['course_name'] ?> </p>
                              <p id="room" ><strong>Ph??ng: </strong> <?=$row['room_name'] ?> </p>
                              <p id="date" ><strong>Th???i gian h???c: </strong> <?=$row['date_from'] ?> - <span id='date-end-<?=$row['class_id']?>'> <?=$row['date_to']?></span></span></p>
                              <p id="time" ><strong>Gi??? h???c: </strong> <?=$row['time_from'] ?> - <?=$row['time_to']?></p>
                              <p id="time" ><strong>Nh??n vi??n ph??? tr??ch: 
                              <?php 
                                $sql_staff = "SELECT * FROM `class_staff_rel` inner JOIN nhanvien on class_staff_rel.staff_ref = nhanvien.id inner join level on nhanvien.level_id = level.id where class_id = ". $row['class_id'];
                                $res_staff = mysqli_query($conn, $sql_staff);
                                while($row_staff = mysqli_fetch_array($res_staff)){
                                  echo $row_staff['TenNV']. " - ". $row_staff['name'] . "<br>" ;
                                }
                              ?>

                              </p>
                              
                              <?php 
                                $arr = getListWeekday($row['weekdays']);
                                echo '<p><strong> H???c v??o: </strong>';
                                foreach ($arr as $r){
                                  echo $r . ' ';
                                }
                                echo '</p>';
                                $sql_count = "SELECT COUNT(id) as count_id from hocvien where class_id =" . $row['class_id'];
                                $row_count = mysqli_fetch_assoc(mysqli_query($conn,$sql_count));
                                echo '<p id="seat" ><strong> Gh???: <span id="taken-seat-'.$row['class_id'].'">'.$row_count['count_id'] .'</strong>/ <span id = "seat-'.$row['class_id'] .'">'.$row['seat'] .'</p>' ;
                              ?>
                              <?php 
                              $sql_date_exam = "SELECT `date_exam` from class where id = ". $row['class_id'];
                              $res_date_exam = mysqli_query($conn, $sql_date_exam);
                              $date_exam = mysqli_fetch_assoc($res_date_exam)['date_exam'];
                              echo "<p><strong>Ng??y Thi: </strong> $date_exam</p>"
                              
                              ?>

                              
                          </div>
                          <div class=" profile-bottom text-center">
                            <div class=" row-sm-6 emphasis">
                              <?php 
                                if ($row['state'] == 'waiting'){
                              ?>
                              <a class="btn btn-app"><i  class="fa fa-close"> </i> Xo?? L???p</a>
                              <?php }?>
                               <?php 
                                $class_id = $row['class_id'];
                                if($row['state'] == 'waiting' && $row_count['count_id'] < $row['seat']){
                                  echo '<a class="btn btn-app" data-toggle="modal" onclick="add_student('.$row['class_id'].')"  data-role="update"q ><i  class="fa fa-plus"> </i> Th??m h???c vi??n </a>';
                                }
                                if($row['state'] != 'done' && $row['state'] != 'marking'){
                                  echo '<a class="btn btn-app" data-toggle="modal-exam" onclick="exam('.$row['class_id'].')"  data-role="update"q > Nh???p ng??y thi c???p ch???ng ch??? </a>';
                                }
                                if($row['state'] == 'marking'){
                                 
                                  echo '<a class="btn btn-app" href="official_mark.php?class_id='.$class_id.'"> Nh???p ??i???m thi ch??nh th???c </a>';
                                }
                                if($row['state'] == 'done'){
                                 
                                  echo '<a class="btn btn-app" href="show_official_mark.php?class_id='.$class_id.'"> Xem ??i???m thi ch??nh th???c </a>';
                                }
                                echo '<a class="btn btn-app" href="student_class.php?class_id='.$class_id.'"> Xem danh s??ch h???c vi??n </a>';
                               ?>
                               <a class="btn btn-app" href='show_mark.php?class_id=<?=$row['class_id']?>'> </i> Xem ??i???m</a>
                               <a class="btn btn-app" href='homework.php?class_id=<?=$row['class_id']?>'  > </i> Xem b??i t???p</a>
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
        <h5 class="modal-title">Th??m h???c vi??n cho l???p</h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <div class='form-group'>
              <h2><span id ="modal-taken-seat">S??? gh??? l???y</span>/<span id ="modal-seat">S??? gh???</span></h2>
          </div>
        </div>
        <div class="field item form-group" >
          <label class="col-form-label col-md-3 col-sm-3  label-align">H???c vi??n<span class="required">*</span></label>
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
          <a href="#" id='modal-click' onclick="submit_modal()" class="btn btn-primary pull-right" >Th??m h???c vi??n</a>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
    </div>


    <div class="modal" id="modal-exam">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Modal Heading</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <input type='date' id = 'date-exam' onchange="date_exam_change()"> 
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="submit_exam()" >Nh???p ng??y thi</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
      
    </div>

  </div>

  <script>
    var date_end;
    var this_id;
    function exam(id){
      $("#modal-exam").modal("show");
      this_id = id;
      date_end = $("#date-end-"+this_id).text();
      date_end = new Date(date_end.replaceAll("-","/"));
      console.log(date_end);
    }
    function date_exam_change(){
      date_exam = $("#date-exam").val();
      date_exam = new Date(date_exam.replaceAll("-","/"));
      if (date_exam < date_end){
        alert("H??y nh???p ng??y thi l???n h??n ng??y k???t th??c");
        $("#date-exam").val('');
      }
    }
    function submit_exam(){
      $.ajax({
        url : '../php/ajax/ajax_add_date_exam.php',
        type : 'POST',
        data : {
          id: this_id,
          date_exam: date_exam = $("#date-exam").val(),
        },
        success : function(data) {
          new PNotify({
                  title: 'Th??nh c??ng',
                  text: 'T???o th??nh c??ng!',
                  type: 'success',
                  styling: 'bootstrap3'
              });

        }
        });
    }
      // else {
      //   $.ajax({
      //   url : '../php/ajax/ajax_add_homework.php',
      //   type : 'POST',
      //   data : formData,
      //   processData: false,  // tell jQuery not to process the data
      //   contentType: false,  // tell jQuery not to set contentType
      //   success : function(data) {
      //     $('#modal-homework').modal('toggle');
      //       if (data =='empty'){
      //         console.log('empty');
      //         new PNotify({
      //             title: 'Th???t b???i',
      //             text: 'Vui l??ng nh???p ?????!',
      //             styling: 'bootstrap4'
      //         });
      //       }
      //       else if (data =='success'){
      //         new PNotify({
      //             title: 'Th??nh c??ng',
      //             text: 'T???o th??nh c??ng!',
      //             type: 'success',
      //             styling: 'bootstrap3'
      //         });
      //       }
      //       else if (data =='fail'){
      //         new PNotify({
      //             title: 'Th???t b???i',
      //             text: 'T???o th???t b???i!',
      //             type: 'error',
      //             styling: 'bootstrap3'
      //         });
      //       }
      //   }
      //   });
      // }

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
        alert("H??y ch???n h???c vi??n"); 
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
            alert('Th??m h???c vi??n th??nh c??ng');
        location.reload(); 
          }
          else if (data ="fail"){
                new PNotify({
                title: 'Error',
                text: 'Th??m h???c vi??n th???t b???i.',
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
