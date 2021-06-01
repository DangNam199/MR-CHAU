<?php   
      include '../php/session.php'; 
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
    <!-- bootstrap-daterangepicker -->
    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Gentelella Alela!</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="images/img.jpg" alt="..." class="img-circle profile_img">
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
                  <li><a href="schedule.php"> Lịch học </a>
                  </li>
                  <li><a href='my_mark.php'> Điểm </a>
                  </li>
                  <li><a href="../administration/homework.php?student_id=<?=$_SESSION['id']?>"> Bài tập </a>
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


        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="row" style="display: inline-block;">
            <div class="top_tiles">
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 ">
                <div class="tile-stats">
                <div class="icon"><i class="fa fa-check-square-o"></i></div>
                  <?php 
                    $sql_homework = "SELECT COUNT(id) as 'count_id' FROM homework where state != 'done'"; 
                    $res = mysqli_fetch_assoc(mysqli_query($conn, $sql_homework));
                    echo '<div class="count">'.$res['count_id'].'</div>';
                    $sql_count_homework = "SELECT count(homework.id) as 'count_homework'  FROM homework INNER JOIN hocvien on homework.class_id = hocvien.class_id where hocvien.id =". $_SESSION['id'];  
                    $sql_count_my_homework = "SELECT COUNT(homework_id) as count_id FROM `homework_student_rel` WHERE student_id  = ". $_SESSION['id'];
                    $res_count = mysqli_fetch_assoc(mysqli_query($conn, $sql_count_homework));
                    $res_count_my_homework = mysqli_fetch_assoc(mysqli_query($conn, $sql_count_my_homework));
                    echo '<p>'.$res_count_my_homework['count_id'].'/'.$res_count['count_homework'].' được giao </p>';
                  ?>
                  <h3>Bài tập cần phải hoàn thành</h3>
                  
                </div>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 ">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-comments-o"></i></div>
                  <div class="count">179</div>
                  <h3>New Sign ups</h3>
                  <p>Lorem ipsum psdea itgum rixt.</p>
                </div>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 ">
                <div class="tile-stats">
                  <?php 
                    $sql_avg = "SELECT AVG(mark) as avg FROM student_mark where student_id = ". $_SESSION['id'];
                    $res_avg = mysqli_query($conn, $sql_avg);
                    $row_avg = mysqli_fetch_assoc($res_avg);
                    echo '<div class="count">'.$row_avg['avg'].'</div>';
                  ?>
                  <h3>Điểm trung bình</h3>
                </div>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 ">
                <div class="tile-stats">
                  
                  <div class="count">179</div>
                  <h3>New Sign ups</h3>
                  <p>Lorem ipsum psdea itgum rixt.</p>
                </div>
              </div>
            </div>
          </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
   <script src="../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->

    <!-- NProgress -->

    
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
  </body>
</html>