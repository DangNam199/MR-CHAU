<?php 
    include '../php/connect.php';
    include '../php/session.php';
    if ($_SESSION['level'] != 6){
      header("location: index.php");
    }
?>


<!DOCTYPE html>
<html lang="en">
  <head>
  <link href="../vendors/pnotify/dist/pnotify.css" rel="stylesheet">
    <link href="../vendors/pnotify/dist/pnotify.buttons.css" rel="stylesheet">
    <link href="../vendors/pnotify/dist/pnotify.nonblock.css" rel="stylesheet">
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

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

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
          
            <div class="page-title">
              <div class="title_left">
                <h3>Duy???t l????ng nh??n vien</h3>
              </div>
                    

            <div class="clearfix"></div>
            <a href="pay_salary.php" class ='btn'>Thanh to??n l????ng nh??n vi??n</a>
            <div class="row">
                <div class="x_panel">
                  <div class="x_content">
                      <div class="col-md-12 col-sm-12  text-center">
                      </div>
                     
                      <div class="clearfix"></div>
                      <div class="table-responsive">
                      <table class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
                          <th class="column-title">M?? Nh??n Vi??n </th>
                            <th class="column-title">T??n </th>
                            <th class="column-title">Ng??y </th>
                            <th class="column-title">Gi??? V??o </th>
                            <th class="column-title">Gi??? ra  </th>
                            <th class="column-title">V??o th???c t??? </th>
                            <th class="column-title">Ra th???c t??? </th>
                            <th class="column-title">T???ng gi??? c???a ca</th>
                            <th class="column-title">T???ng gi??? ch???m c???a nh??n vi??n </th>
                            <th class="column-title">Gi??? ???????c duy???t </th>
                            <th class="column-title"></th>
                            <th class="column-title"></th>
                            <th></th>
                            <th class="bulk-actions" colspan="7">
                              <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                            </th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php  
                            $sql = "SELECT chamcong.id as 'chamcong_id', `shift_begin`, `staff_id`, `shift_end`, `real_begin`, `real_end`, `date`, `real_work_time`, chamcong.state as 'chamcong_state', nhanvien.TenNV FROM `chamcong` INNER JOIN nhanvien on chamcong.staff_id = nhanvien.id where real_work_time is NULL and chamcong.state = 'pending' ORDER BY date";
                            function sub_arr($arr_begin, $arr_end){
                              $hours =  $arr_end[0] - $arr_begin[0];
                              $minute = $arr_end[1] - $arr_begin[1];
                              return round($hours + $minute/60, 2);
                            }
                            $res = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($res) == 0 ){
                              echo '<p>Kh??ng c?? ng??y c??ng ????? duy???t</p>';
                            }
                            else {
                              while($row = mysqli_fetch_assoc($res)){ 
                                  $arr_begin = explode (':', $row['shift_begin'] );
                                  $arr_end = explode (':', $row['shift_end']);
                                  $true_begin = explode (':', $row['real_begin'] );
                                  $true_end = explode (':', $row['real_end']);
                                  $real = sub_arr($arr_begin, $arr_end);
                                  $true = sub_arr($true_begin, $true_end);
                                ?>
                            
                              
                          <tr class="even pointer">
                          <td class=" "id = 'staff-<?=$row['chamcong_id']?>'><?=$row['staff_id']?></td>
                            <td class=" "id = 'staff-<?=$row['staff_id']?>'><?=$row['TenNV']?></td>
                            <td class=" "id="date-<?=$row['chamcong_id'] ?>"><?=$row['date']?></td>
                            <td class=" " id="shift-begin-<?=$row['chamcong_id'] ?>" ><?=$row['shift_begin']?></td>
                            <td class=" " id="shift-end-<?=$row['chamcong_id'] ?>" ><?=$row['shift_end']?></td>
                            <td class=" " id="staff-begin-<?=$row['chamcong_id'] ?>"><?php echo $row['real_begin']?></td>
                            <td class=" " id="staff-end-<?=$row['chamcong_id'] ?>"><?=$row['real_end']?></td>
                            <td class=" " id="shift-<?=$row['chamcong_id'] ?>"><?=$real?></td>
                            <td class=" " ><?=$true?></td>
                            <td class=" " id="real-<?=$row['chamcong_id'] ?>" ><?=$true?></td>
                            <td class=" "><button class='btn btn-primary' id="btn-duyet-<?=$row['chamcong_id']?>" onclick="approve(<?=$row['chamcong_id']?>)">Duy???t</button></td>
                            <td class=" "><button class='btn btn-primary' id="btn-edit-<?=$row['chamcong_id']?>" onclick="edit(<?=$row['chamcong_id']?>)">S???a</button></td>
                            <td class=" "><button class='btn btn-danger' id="btn-edit-<?=$row['chamcong_id']?>" onclick="reject(<?=$row['chamcong_id']?>)">T??? ch???i</button></td>
                          </tr>
                          <?php }
                            }
                          ?>
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

    <div class="modal" id="myModal"
   data-backdrop="static"
   data-keyboard="false"
   tabindex="-1"
   aria-labelledby="myModalLabel"
   aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <!-- Modal Header -->
         <div class="modal-header">
            <h4 class="modal-title">Modal Title</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
         </div>
         <!-- Modal body -->
         <div class="modal-body">
           <input id = "modal-input" class='form input'/>
         </div>
         <!-- Modal footer -->
         <div class="modal-footer">
            <button type="button" class="btn btn-primary" onclick="submit_edit()">Edit</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
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

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
  </body>
  <script>
  var this_id;
   function edit(id){
     this_id = id;
     real = str_hours($("#real-"+id).html());
     $("#myModal").modal('show');
   }
   function submit_edit() {
      var value = parseFloat($('#myModal #modal-input').val());
      console.log(value);
      var shift = $("#shift-"+this_id).html();
      if (value <= parseFloat(shift)){
        console.log(value);
        $("#real-"+this_id).html(value);
        $("#myModal").modal('toggle');
      }
      else {
        alert("Kh??ng th??? nh???p nhi???u h??n s??? gi??? ????ng c???a ca");
      }
   }
   function reject(id){
    date = $("#date-"+id).html();
    $.ajax({
      type: "post",
      url: "../php/nhanvien/duyetcong.php",
      data: {
        id: id,
        date: date,
        approve: false,
      },
      success: function (data) {
        if(data=="success"){
          new PNotify({
                    title: 'Success',
                    text: '???? t??? ch???i.',
                    type: 'success',
                    styling: 'bootstrap3'
                });
          $('#btn-edit-'+id).hide();
          $('#btn-duyet-'+id).hide();
        }
        else {
          new PNotify({
                    title: 'Success',
                    text: 'L???i.',
                    type: 'error',
                    styling: 'bootstrap3'
                });
        }
      }
    }); 
   }
    function approve(id){
      value = $("#real-"+id).html();
      console.log(value);
      date = $("#date-"+id).html();
      $.ajax({
      type: "post",
      url: "../php/nhanvien/duyetcong.php",
      data: {
        id: id,
        date: date,
        value: value,
        approve: true,
      },
      success: function (data) {
        if(data=="success"){
          new PNotify({
                    title: 'Success',
                    text: '???? duy???t.',
                    type: 'success',
                    styling: 'bootstrap3'
                });
          $('#btn-edit-'+id).hide();
          $('#btn-duyet-'+id).hide();
        }
        else {
          new PNotify({
                    title: 'Success',
                    text: 'L???i.',
                    type: 'error',
                    styling: 'bootstrap3'
                });
        }
      }
    }); 
    }
      
  //    var staff = $("#staff-"+id).html();
  //    var staff_end = $("#staff-end-"+id).html().split(":");
  //    var staff_begin = $("#staff-begin-"+id).html().split(":");
  //    var begin = $("#shift-begin-"+id).html();
  //    var end  = $("#shift-end-"+id).html();
  //    var arr_begin = begin.split(":");
  //    var arr_end = end.split(":");
  //    var shift = sub_time(arr_end, arr_begin);
  //    arr_real = real.split(":");
  //    real_hours = to_hours(parseInt(arr_real[0]), parseInt(arr_real[1]));
  //  }
  //  function sub_time(end, begin){
  //    hours = parseInt(end[0]) - parseInt(begin[0]);
  //    minute = parseInt(end[1]) - parseInt(begin[1]);
  //    return to_hours(hours, minute);
  //  }
    function str_hours(str){
      arr_real = str.split(":");
      return to_hours(parseInt(arr_real[0]), parseInt(arr_real[1]));
    }
   function to_hours(hour, minute) {
     return hour + minute * (1/60);
   }
  </script>
      <script src="../vendors/pnotify/dist/pnotify.js"></script>
    <script src="../vendors/pnotify/dist/pnotify.buttons.js"></script>
    <script src="../vendors/pnotify/dist/pnotify.nonblock.js"></script>
</html>