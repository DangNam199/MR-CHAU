<?php
include '../../php/connect.php';
session_start();
if (!isset($_SESSION['user'])) {
    header('location: login.php');
} else {
    $sql_user = "SELECT * FROM `nhanvien` WHERE email='" . $_SESSION['user'] . "' limit 1";
    $res_user = mysqli_query($conn, $sql_user);
    $row_user = mysqli_fetch_assoc($res_user);
};
if (!empty($_POST['search'])){
    $name = $_POST['search'];
    $sql = "SELECT * FROM degree WHERE tenDegree LIKE '%".$name."%'";
    $query= mysqli_query($conn,$sql);
}else{
    $message = "chưa nhập kết quả tìm kiếm";
    echo "<script type='text/javascript'>alert('$message');</script>";
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

    <title>Contact Form | Gentelella Alela! by Colorlib</title>

    <!-- Bootstrap -->
    <link href="../../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../../vendors/nprogress/nprogress.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Custom Theme Style -->
    <link href="../../build/css/custom.min.css" rel="stylesheet">
    <!-- thư viên để thông báo -->
    <link href="../../vendors/pnotify/dist/pnotify.css" rel="stylesheet">
    <link href="../../vendors/pnotify/dist/pnotify.buttons.css" rel="stylesheet">
    <link href="../../vendors/pnotify/dist/pnotify.nonblock.css" rel="stylesheet">
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
                        <img src="<?=$row_user['avatar']?>" class="img-circle profile_img" alt="avatar" title="avatar">
                    </div>
                    <div class="profile_info">
                        <span>Welcome,</span>
                        <h2><?=$row_user['TenNV'] ?></h2>
                    </div>
                </div>
                <!-- /menu profile quick info -->

                <br />

                <!-- sidebar menu -->
                <?php
                include '../sidebar.php';
                ?>
                <!-- /sidebar menu -->

            </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <div class="nav toggle">
                    <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                </div>
                <nav class="nav navbar-nav">
                    <ul class=" navbar-right">
                        <li class="nav-item dropdown open" style="padding-left: 15px;">
                            <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                                <?=$row_user['TenNV'] ?>
                            </a>
                            <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item"  href="profile.php  "> Profile</a>
                                <a class="dropdown-item"  href="login.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                            </div>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- page content -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Contacts Design</h3>
                    </div>

                    <div class="title_right">
                        <div class="col-md-5 col-sm-5  form-group pull-right top_search">
                            <form method="post" action="../../php/degree/search_degree.php">
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
<!--                                <ul class="pagination pagination-split">-->
<!--                                    --><?php //for($page =1; $page<=$number_page;$page++){
//                                        echo '<li><a href="?page='.$page.'">'.$page. '</a></li>';
//                                    }
//                                    ?>
<!--                                </ul>-->
                            </div>

                            <div class="clearfix"></div>
                            <?php while ($row = mysqli_fetch_array($query)){?>
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

<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class='form-group'>
                    <label>Số lượng </label>
                    <input type='number' id='addnumber' class='form-control'/>
                </div>
                <div class='form-group'>
                    <label>Chi phí trên mỗi quyển</label>
                    <input type='number' id='priceper' class='form-control'/>
                </div>
            </div>
            <div class="modal-footer">
                <a href="#" id='add-more' class="btn btn-primary pull-right" >Add</a>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
<!-- jQuery -->
<script src="../../vendors/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="../../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<!-- FastClick -->
<script src="../../vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="../../vendors/nprogress/nprogress.js"></script>
<!-- thư viên để thông báo -->
<script src="../../vendors/pnotify/dist/pnotify.js"></script>
<script src="../../vendors/pnotify/dist/pnotify.buttons.js"></script>
<script src="../../vendors/pnotify/dist/pnotify.nonblock.js"></script>
<!-- Custom Theme Scripts -->
<script src="../../build/js/custom.min.js"></script>
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
</body>
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


