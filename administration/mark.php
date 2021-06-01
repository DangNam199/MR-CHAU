<?php 
    include '../php/connect.php';
    include '../php/session.php';

    if (isset($_GET['class_id'])){
      $class_id = $_GET['class_id'];
      $sql = "SELECT * FROM hocvien WHERE class_id = " .$_GET['class_id']. " and state = 'studing' ORDER BY id ASC";
      $res = mysqli_query($conn, $sql);
    }
    if (isset($_POST['submit']) && isset($_POST['mark']) && isset($_POST['type'])){
      if (isset($_GET['homework'])){
        $homework_id = $_GET['homework'];
      }
      $type = $_POST['type'];
      $marks = $_POST['mark'];
      $count = 0;
      $sql_mark ='';
      while ($row_mark = mysqli_fetch_assoc($res)){
        $student_id = $row_mark['id'];
        if (!isset($_GET['homework'])){
        $sql_mark .= "INSERT INTO `mark`(`id`, `class_id`, `student_id`, `mark`, `date`, `type`) VALUES (null,'$class_id','$student_id','$marks[$count]',now(), '$type');";
        }
        else {
          $sql_mark .= "INSERT INTO `mark`(`id`, `class_id`, `student_id`, `mark`, `date`,`homework_id`, `type`) VALUES (null,'$class_id','$student_id','$marks[$count]',now(), $homework_id, '$type');";
        }
        $count ++;
      }
      if (mysqli_multi_query($conn,$sql_mark)){
        $_SESSION['nofication'] = 'Nhập điểm thành công';
        header("location: my_class.php");
      }
      else {
        echo $sql_mark;
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
                <h3>Điểm Học Viên</h3> 
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
                      <div class="clearfix"></div>
                      <div class="table-responsive">
                      <div class="form-group">
                      <form  method="post" >
                        <label for="sel1">Bài kĩ năng:</label>
                        <select class="form-control" name="type">
                          <option value='nghe'>Nghe</option>
                          <option value = 'noi'>Nói</option>
                          <option value='doc' >Đọc</option>
                          <option value='viet '>Viết</option>
                        </select>
                      </div> 
                      
                      <table class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
                            <th class="column-title">Tên học viên </th>
                            <th class="column-title">Điểm </th>
                            </th>
                          </tr>
                        </thead>
                      
                        <tbody>
                            <?php while($row = mysqli_fetch_assoc($res)) { ?> 
                                <tr class="even pointer">
                            <td class=" "><?=$row['name']?></td>
                            <td>
                            <input type="number" name="mark[]" min="0" max="10">
                            </td>
                          </tr>
                          <?php }?>
                        </tbody>
                        </table>
                        <div class="ln_solid">
                            <div class="form-group">
                                <div class="col-md-6 offset-md-3">
                                    <button type='submit' name='submit' class="btn btn-primary">Tạo mới</button>
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