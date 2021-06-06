<?php 
    include '../php/connect.php';
    include '../php/session.php';

    $id = $_SESSION['id'];
    $sql = "SELECT * FROM student_mark where student_id = " .$id;
    $res = mysqli_query($conn, $sql);
    
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
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.php" class="site_title"><i class="fa fa-paw"></i> <span>Gentelella Alela!</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
              <?php
                echo '<img src="data:image/jpeg;base64,'.base64_encode($_SESSION['avatar'] ).'" class="img-circle profile_img" />'; ?>  
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?=$_SESSION['name']?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->


            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a href="index.php"><i class="fa fa-home"></i> Home </a>
                  </li>
                  <li><a href="schedule.php"> Lịch học </a>
                  </li>
                  <li><a href='my_mark.php'> Điểm </a>
                  </li>
                  <li><a href="my_homework.php"> Bài tập </a>
                  </li>
                </ul>
              </div>
            </div>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="../php/logout.php">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>


        <!-- top navigation -->
        <!-- top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Điểm của tôi</h3> 
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
                      <div class="clearfix"></div>
                      <div class="table-responsive">
                      
                      <form  method="post" >
                      <table class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
                            <th class="column-title">Tên bài kiểm tra </th>
                            <th class="column-title">Điểm </th>
                            <th class="column-title">Loại </th>
                            </th>
                          </tr>
                        </thead>
                      
                        <tbody>
                            <?php while($row = mysqli_fetch_assoc($res)) { ?> 
                                <tr class="even pointer">
                            <td class=" "><?=$row['homework_name']?></td>
                            <td class=" "><?=$row['mark']?></td>
                            <?php 
                              $sql_type = "SELECT type from mark where id = ". $row['mark_id'];
                              $res_type = mysqli_fetch_assoc(mysqli_query($conn, $sql_type))['type'];
                            ?>
                            <td class=" "><?=$res_type?></td>
                          </tr>
                          <?php }?>
                          <tr><td colspan="4"><hr style="border-top: 3px solid black;"></td></tr>
                          <tr>
                              <td></td>
                              <?php 
                                $sql_avg = "SELECT AVG(mark) as avg FROM student_mark where student_id = ". $_SESSION['id'];
                                $res_avg = mysqli_query($conn, $sql_avg);
                                $row_avg = mysqli_fetch_assoc($res_avg);
                                echo '<td> Điểm trung bình '.$row_avg['avg'].'</td>';
                              ?>
                              <td></td>
                          </tr>
                        </tbody>
                        </table>

                        <?php 
                          $sql_official = "SELECT * FROM `officail_mark` where student_id = ". $id;
                          $res_official = mysqli_query($conn, $sql_official);
                          if (mysqli_num_rows($res_official) > 0){
                        ?>

                        <table class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
                            <th class="column-title">Điểm nghe </th>
                            <th class="column-title">Điểm đọc </th>
                            <th class="column-title">Điểm viết </th>
                            <th class="column-title">Điểm nói </th>
                            </th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php while($row_official = mysqli_fetch_assoc($res_official)) { ?> 
                                <tr class="even pointer">
                            <td class=" "><?=$row_official['listening']?></td>
                            <td class=" "><?=$row_official['reading']?></td>
                            <td class=" "><?=$row_official['writing']?></td>
                            <td class=" "><?=$row_official['speaking']?></td>
                          </tr>
                          <?php }?>
                        </tbody>
                        </table>
                        <?php }?>
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
    function showGraph(data){    
    console.log(data);
    let myChart = document.getElementById('myChart').getContext('2d');
    // Global Options
    Chart.defaults.global.defaultFontFamily = 'Lato';
    Chart.defaults.global.defaultFontSize = 18;
    Chart.defaults.global.defaultFontColor = '#777';

    let massPopChart = new Chart(myChart, {
      type:'line', // bar, horizontalBar, pie, line, doughnut, radar, polarArea
      data:{
        labels: data[0],
        datasets:[{
          label:'Nghe',
          data: data[1],
          //backgroundColor:'green'
          borderWidth:6,
          borderColor:'#4287f5',
          hoverBorderWidth:3,
          hoverBorderColor:'#000'
        },
        {
          label:'Nói',
          data: data[2],
          //backgroundColor:'green'
          borderWidth:6,
          borderColor:'#42c5f5',
          hoverBorderWidth:3,
          hoverBorderColor:'#000'
        },
        {
          label:'Đọc',
          data: [10,,10],
          //backgroundColor:'green'
          borderWidth:6,
          borderColor:'#f59e42',
          hoverBorderWidth:3,
          hoverBorderColor:'#000'
        },
        {
          label:'Viết',
          data: data[4],
         // backgroundColor:'white',
          borderWidth:6,
          borderColor:'#eb4034',
          hoverBorderWidth:3,
          hoverBorderColor:'#eb4034'
        }
      ]
      },
      options: {
        scales: {
          spanGaps: true,
        }
    }      
    });}
    var all_data;
    function getData(){
      var res = [];
      $.ajax({
        type: "POST",
        url: "../php/mark_chart.php",
        async: false,
        success: function(data){
          res = JSON.parse(data);
        },
      });
      return res;
    }
    all_data = getData();
    showGraph(all_data);
      

  </script>


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