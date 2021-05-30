<?php
include 'connect.php';
session_start();
if (!isset($_SESSION['user'])) {
    header('location: login.php');
} else {
    $sql_user = "SELECT * FROM `nhanvien` WHERE email='" . $_SESSION['user'] . "' limit 1";
    $res_user = mysqli_query($conn, $sql_user);
    $row_user = mysqli_fetch_assoc($res_user);
};
$result = array();
if (!empty($_POST['search'])){
    $name = $_POST['search'];
    $sql = "SELECT * FROM nhanvien WHERE TenNV LIKE '%".$name."%'";
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
                        <img src="<?= $row_user['avatar'] ?>" class="img-circle profile_img"/>
                    </div>
                    <div class="profile_info">
                        <span>Welcome,</span>
                        <h2><?= $row_user['TenNV'] ?></h2>
                    </div>
                </div>
                <!-- /menu profile quick info -->

                <br/>

                <!-- sidebar menu -->
               <?php
               include 'sidebar.php';
               ?>
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
                            <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true"
                               id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                                <?= $row_user['TenNV'] ?>
                            </a>
                            <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="profile.php  "> Profile</a>
                                <a class="dropdown-item" href="login.php"><i class="fa fa-sign-out pull-right"></i> Log
                                    Out</a>
                            </div>
                        </li>

                        </li>
                    </ul>
                </nav>
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
                            <form method="post" action="../php/search_nhan_vien.php">
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
<!--                                    --><?php //for ($page = 1; $page <= $number_page; $page++) {
//                                        echo '<li><a href="?page=' . $page . '">' . $page . '</a></li>';
//                                    }
//                                    ?>
<!--                                </ul>-->
                                <div class="clearfix"></div>
                                <?php if (!empty($name)):?>
                                    <?php while ($row = mysqli_fetch_array($query)) : ?>
                                        <div class="col-md-4 col-sm-4  profile_details"
                                             id="employee-<?php echo $row['id'] ?>">
                                            <div class="well profile_view">
                                                <div class="col-sm-12">
                                                    <?php
                                                    switch ($row['level']) {
                                                        case "giangvien":
                                                            $level = 'Giảng Viên';
                                                            break;
                                                        case "trogiang":
                                                            $level = 'Trợ Giảng';
                                                            break;
                                                        case "tapvu":
                                                            $level = 'Tạp Vụ';
                                                            break;
                                                        case "IT":
                                                            $level = 'Nhân Viên Kỹ Thuật';
                                                            break;
                                                        case "quantrivien":
                                                            $level = 'Quản Trị Viên';
                                                            break;
                                                        default:
                                                            $level = 'Giảng Viên';
                                                    }
                                                    echo "<h4 class='brief'><i>" . $level . "</i></h4>";
                                                    ?>
                                                    <div class="left col-md-7 col-sm-7">
                                                        <h2><?= $row['TenNV'] ?></h2>

                                                        <p><strong>Certificate: </strong> <?= $row['ChungChi'] ?> </p>
                                                        <ul class="list-unstyled">
                                                            <li>
                                                                <i class="fa fa-building"></i>Address: <?= $row['address'] ?>
                                                            </li>
                                                            <li><i class="fa fa-phone"></i> Phone #: <?= $row['SoDT'] ?>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="right col-md-5 col-sm-5 text-center">
                                                        <img src="<?= $row['avatar'] ?>" class="img-circle img-fluid"/>
                                                    </div>
                                                </div>
                                                <div class=" profile-bottom text-center">
                                                    <div class=" row-sm-6 emphasis">
                                                        <!-- mẫu edit -->
                                                        <a class="btn btn-app"
                                                           href="../php/edit_nhan_vien.php?id=<?php echo $row['id']; ?>"><i
                                                                class="fa fa-plus"> </i> Edit </a>
                                                        <!-- mẫu xoá -->
                                                        <button type="button" class="btn btn-secondary"
                                                                onclick="deleteAjax(<?php echo $row['id']; ?>)">Delete
                                                        </button>
                                                        <button class="btn btn-secondary source" onclick="new PNotify({
                                          title: 'Regular Success',
                                          text: 'That thing that you were trying to do worked!',
                                          type: 'success',
                                          styling: 'bootstrap3'
                                      });">Success
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endwhile; ?>
                                <?php endif;?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

            <!-- Để edit nhanh thì có thể copy thì form_ ten vào modal-body cho nhanh, xoá thẻ div col-md-6 col-sm-6 để input được to -->
            <!-- đổ dữ liệu vào -->
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">Họ Và Tên<span
                                class="required">*</span></label>
                        <input class="form-control" data-validate-length-range="6" data-validate-words="2"
                               name="user_name" required="required"/>
                    </div>
                    <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">Địa Chỉ<span
                                class="required">*</span></label>

                        <input class="form-control" class='optional' name="address" data-validate-length-range="5,15"
                               type="text"/>
                    </div>
                    <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">Email<span
                                class="required">*</span></label>
                        <input class="form-control" type="email" class='email' name="email" data-validate-linked='email'
                               required='required'/>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align">Gender</label>
                        <select name="gender" class="form-control" value="<?= $row['level'] ?>">
                            <option value="male">Nam</option>
                            <option value="female">Nữ</option>
                        </select>
                    </div>
                    <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">Date<span class="required">*</span></label>
                        <input class="form-control" class='date' type="date" name="dob" required='required'>
                    </div>

                    <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">Số điện thoại<span
                                class="required">*</span></label>
                        <input class="form-control" type="tel" class='tel' name="phone" required='required'
                               data-validate-length-range="8,20"/>
                    </div>
                    <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">Chức Vụ<span
                                class="required">*</span></label>
                        <select name="position" class="form-control">
                            <option value="giangvien">Giảng Viên</option>
                            <option value="trogiang">Trợ Giảng</option>
                            <option value="tapvu">Tạp Vụ</option>
                            <option value="IT">IT</option>
                            <option value="quantrivien">Quản Trị Viên</option>
                        </select>

                    </div>
                    <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">Chứng Chỉ<span
                                class="required">*</span></label>
                        <input class="form-control" class='text' name="chungchi" required='required'
                               data-validate-length-range="5,20"/></div>
                    <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">Số Chứng Minh Thư<span
                                class="required">*</span></label>

                        <input class="form-control" type="number" name="cmnd" required='required'
                               data-validate-length-range="10,15"/></div>
                    <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">Hệ số lương<span
                                class="required">*</span></label>
                        <input class="form-control" type="number" name="hsl" required='required'
                               data-validate-length-range="0,10"/></div>

                </div>
                <div class="modal-footer">
                    <a href="#" id='add-more' class="btn btn-primary pull-right">Add</a>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>

        <!-- mẫu xoá -->
        <script type='text/javascript'>
            // delete có thể dùng chung bằng cách truyền id, talbe vào và gọi đến delete.php
            function deleteAjax(id) {
                if (confirm('Are you sure delete this employee')) {
                    $.ajax({
                        type: 'post',
                        url: '../php/delete.php',
                        data: {
                            id: id,
                            table: 'nhanvien', //ten bang trong csdl
                        },
                        success: function (data) {
                            $('#employee-' + id).hide();
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
        <!-- hết mẫu xoá -->
        <!-- jQuery -->

        <!-- jQuery -->
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

