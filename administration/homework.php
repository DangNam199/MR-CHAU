<?php 
    include '../php/connect.php';
    include '../php/session.php';
    if (isset($_GET['class_id'])){
    $class_id = $_GET['class_id'];
    $sql = "SELECT homework.name as 'homework_name', deadline, file, homework.id, homework.state FROM `homework` where  class_id = ". $_GET['class_id'] .' ORDER by homework.id desc';
    $res = mysqli_query($conn,$sql);
    }
      else {
      header('location: my_class.php');
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
                  <li><a> Lịch học </a>
                  </li>
                  <li><a > Điểm </a>
                  </li>
                  <li><a href="../administration/homework.php?student_id=<?=$_SESSION['id']?>"> Bài tập </a>
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
                <h3>Lớp học của tôi</h3>
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
                      </ul>
                      </div>
                       
                      <div class="clearfix"></div>
                      <div class="table-responsive">
                      <table class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
                            <th class="column-title">Tên bài tập</th>
                            <th class="column-title">Ngày hết hạn </th>
                            <th class="column-title"></th>
                            <th class="column-title"></th>
                            <th class="column-title"></th>
                            
                          </tr>
                        </thead>

                        <tbody>
                          <?php 
                            while($row = mysqli_fetch_assoc($res))  {
                            ?>
                          <tr class="even pointer">
                            <td class=" "
                            <?php 
                              if($row['deadline'] < date('Y-m-d')){
                                echo 'style="color:red"';
                              }
                              else if ($row['state'] == 'done'){ 
                                echo 'style="font-weight:bold"';
                              }
                            ?>
                            ><?=$row['homework_name']?></td>
                            <td class=" "><?=$row['deadline']?> </td>
                            <td><a href="downloads.php?file_id=<?php echo $row['id'] ?>">Download</a></td>
                            <?php 
                              if($_SESSION['level'] != 'hocvien'){
                                ?>
                                <td><a href="mark.php?class_id=<?php echo $_GET['class_id'] ?>&homework=<?php echo $row['id'] ?>">Nhập điểm cho bài tập</a></td>
                                <td><a href="student_homework.php?homework_id=<?php echo $row['id'] ?>">Xem danh sách nộp</a></td> 
                            <?php  } 
                              
                              $sql_homework_student = 'SELECT * FROM `homework_student_rel` WHERE homework_id = '.$row['id'].' and student_id = '.$_SESSION['id'];
                              $res_hw_st = mysqli_query($conn, $sql_homework_student);

                            if($_SESSION['level'] == 'hocvien' && $row['state'] !='done' && mysqli_num_rows($res_hw_st) == 0) {?>
                              <td style="width: 25%;">
                                <p id='student-<?=$row['id']?>' hidden><?=$_SESSION['id']?></p>
                                <input type="file" id="my-homework-<?=$row['id']?>" class="form-control" name="product_file" style = "width: 50%;"/>
                                <button onclick="submit(<?=$row['id']?>)" class ='btn btn-primary'>  </button>
                                <br>
                              </td> 
                              
                          </tr>
                          <?php }}?>
                          
                          
                        </tbody>
                      </table>
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
  </div>

  <script>
    function submit(id){
      var files = $('#my-homework-'+id)[0].files;
      var student_id = $('#student-'+id).text();
      var formData = new FormData();
      formData.append('homework', files[0]);
      formData.append('student_id', student_id);
      formData.append('homework_id', id);
      $.ajax({
        url : '../php/student/ajax_submit_homework.php',
        type : 'POST',
        data : formData,
        processData: false,  // tell jQuery not to process the data
        contentType: false,  // tell jQuery not to set contentType
        success: function (data) {
          if (data =='empty'){
              console.log('empty');
              new PNotify({
                  title: 'Thất bại',
                  text: 'Vui lòng nhập đủ!',
                  styling: 'bootstrap4'
              });
            }
            else if (data =='success'){
              new PNotify({
                  title: 'Thành công',
                  text: 'Tạo thành công!',
                  type: 'success',
                  styling: 'bootstrap3'
              });
              setTimeout(function() {
              window.location.replace("homework.php");
              }, 3000);
            }
            else if (data =='fail'){
              new PNotify({
                  title: 'Thất bại',
                  text: 'Tạo thất bại!',
                  type: 'error',
                  styling: 'bootstrap3'
              });
            }
        }
      });
    }

  </script>

  </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="../vendors/validator/multifield.js"></script>
    <script src="../vendors/validator/validator.js"></script>
    
    <!-- Javascript functions	-->

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
