<?php 
    include '../php/connect.php';
    include '../php/session.php';
    if ($_SESSION['level'] != 5 and $_SESSION['level'] != 6){
      header("location: index.php");
    }
    $sql= "SELECT * FROM `degree` ORDER BY id DESC";
    $res = mysqli_query($conn,$sql);
    $number_row = mysqli_num_rows($res);
    $result_per_page = 6;
    $number_page = ceil($number_row/$result_per_page);
    if (!isset($_GET['page'])){
      $page=1;
    }
    else {
      $page = $_GET['page'];
    }
    $this_page_result = ($page-1)*$result_per_page;
    $sql = "SELECT * FROM `degree` ORDER BY id DESC limit ".$this_page_result. ','.$result_per_page;
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

    <title>Contact Form | Gentelella Alela! by Colorlib</title>

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
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Contacts Design</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5  form-group pull-right top_search">
                    <form method="post" action="../php/degree/search_degree.php">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control" placeholder="Search for...">
                            <span class="input-group-btn">
                                     <button class="btn btn-default" type="submit">Go!</button>
                                    </span>
                        </div>
                    </form>
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
                      <div class="col-md-4 col-sm-4  profile_details" id="degree-<?=$row['id']?>">
                        <div class="well profile_view">
                          <div class=" profile-bottom text-center">
                          <h2>&nbsp &nbsp <?=$row['tenDegree'] ?></h2>
                            <div class=" row-sm-6 emphasis">
                              <a class="btn btn-app" href="../php/degree/edit_degree.php?id=<?php echo  $row['id'];?>"><i class="fa fa-edit"> </i>Sửa</a>
                                <button type="button" class="btn btn-secondary" onclick="deleteAjax(<?php echo $row['id'];?>)">Xóa</button>
                                <button class="btn btn-secondary source" onclick="new PNotify({
                                  title: 'Regular Success',
                                  text: 'That thing that you were trying to do worked!',
                                  type: 'success',
                                  styling: 'bootstrap3'
                              });">Success</button>
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
  <script type='text/javascript'>
        // delete có thể dùng chung bằng cách truyền id, talbe vào và gọi đến delete.php
        function deleteAjax(id){
            if (confirm('Are you sure delete this employee')){
                $.ajax({
                    type:'post',
                    url: '../php/delete.php',
                    data: {
                        id: id,
                        table: 'degree', //ten bang trong csdl
                    },
                    success: function(data){
                        $('#degree-'+id).hide();
                        new PNotify({
                            title: 'Success',
                            text: 'Delete Employee Success',
                            type: 'success',
                            styling: 'bootstrap3'
                        });
                    }
                });
            }
        }

    </script>
  <script>
    $(document).ready(function(){
      var id;
      var noidung = $("#noidung").text();
      var soluong = $("#soluong").text();
      $(document).on("click", "a", function () {
        id = $(this).data('id');  
       
      });
      $('#add-more').click(function(){
        var number = $('#addnumber').val();
        var price = $('#priceper').val();
       
        $.ajax({
          dataType: "json", 
          url: '../php/add_doc.php',
          method: 'POST',
          data: {id: id, number: number},
          success: function(data){
            $('#soluong').html("<strong>Số Lượng: </strong>"+data+ "</p>");
            $('#myModal').modal('toggle');
          }
        });
        
      });
      
    })
  </script>
</html>