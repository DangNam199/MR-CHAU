<?php 
    include '../php/connect.php';
    include '../php/session.php';
    include '../php/general_setting.php';
    if ($_SESSION['level'] != 5 and $_SESSION['level'] != 6){
      header("location: index.php");
    }
    $sql= "SELECT * FROM `tailieu` ORDER BY id DESC";
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
    $sql = "SELECT * FROM `tailieu` ORDER BY id DESC limit ".$this_page_result. ','.$result_per_page;
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

    <title><?=$res_setting['name']?> </title>

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
                <h3>Danh s??ch t??i li???u</h3>
              </div>
<!-- 
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
            </div> -->

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
                      <div class="col-md-4 col-sm-4  profile_details" id='doc-<?=$row['id']?>'>
                        <div class="well profile_view">
                          <div class="col-sm-12">
                            <div class="left col-md-7 col-sm-7">
                              <h2><?=$row['tenTL'] ?></h2>
                              <p id="noidung" ><strong>N???i Dung: </strong> <?=$row['noidung'] ?> </p>
                              <p><strong>S??? L?????ng:</strong><span  id="soluong-<?php echo $row['id']?>"><?=$row['soluong'] ?> </span> </p>
                              <p><strong>Gi??: </strong> <?=$row['price'] ?> </p>
                            </div>
                            
                            <div class="right col-md-5 col-sm-5 text-center">
                              <?php
                                echo '<img src="data:image/jpeg;base64,'.base64_encode($row['image'] ).'" class="img-circle img-fluid" />';
                              ?>
                            </div>
                          </div>
                          <div class=" profile-bottom text-center">
                            <div class=" row-sm-6 emphasis">
                              <!-- <a class="btn btn-app" href="./.php?id=<?php echo  $row['id'];?>"><i class="fa fa-edit"> </i> View News</a> -->
                               <button class="btn btn-app" onclick="delete_doc(<?php echo  $row['id'];?>)" ><i  class="fa fa-close"> </i> Delete Document</button>
                               <a class="btn btn-app" data-toggle="modal" data-target="#myModal" href="#" data-id="<?php echo  $row['id'];?>" data-role='update' ><i  class="fa fa-plus"> </i> Add  </a>
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

    <div class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <div class='form-group'>
              <label>S??? l?????ng </label>
              <input type='number' id='addnumber' class='form-control'/>
          </div>
        </div>
        <div class="modal-footer">
        <a href="#" id='add-more' class="btn btn-primary pull-right" >Add</a>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
    function delete_doc(id){
      $.ajax({ 
          url: '../php/delete.php',
          method: 'POST',
          data: {id: id, table: 'tailieu'},
          success: function(data){
            $("#doc-"+id).hide();
          }
        });
    }

    $(document).ready(function(){
      var id;
      $(document).on("click", "a", function () {
        id = $(this).data('id');  
        var soluong = $("#soluong-"+id).text();
        console.log(soluong);
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
            $('#soluong-'+id).html("<strong>S??? L?????ng: </strong>"+data+ "</p>");
            $('#myModal').modal('toggle');
          }
        });
        
      });
      
    })
  </script>
</html>