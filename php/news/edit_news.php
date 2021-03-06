<?php
include '../connect.php';
session_start();

$ID = isset($_GET['id']) ? (int)$_GET['id'] : '';
$sql_news = "select * from tintuc WHERE id = '$ID'";
$query_news= mysqli_query($conn,$sql_news);
$result_news = array();
if($query_news){
    while($row = mysqli_fetch_assoc($query_news)){
        $result_news = $row;
    }
}
if (isset($_POST['submit']) && empty($_FILES['image']['tmp_name'])==false){
    // thêm ảnh thư mục images
    $uploaddir = '../../images/'.time();
    move_uploaded_file($_FILES['image']['tmp_name'], $uploaddir.$_FILES['image']['name']);
    $file = substr($uploaddir,3).$_FILES['image']['name'];

    $name = $_POST['news_name'];
    $context = $_POST["textarea"];
    $sql = "UPDATE tintuc SET TenTT = '$name',NoiDungTT = '$context', thumbnail = '$file' WHERE id = '$ID'";
    if(mysqli_query($conn, $sql)){
        header("location: ../../administration/all_news.php");
    }
}
if(!isset($_SESSION['user'])){
    header('location: login.php');
}
else{
    $sql_user = "SELECT * FROM `nhanvien` WHERE email='". $_SESSION['user']. "' limit 1";
    $res_user = mysqli_query($conn,$sql_user);
    $row_user = mysqli_fetch_assoc($res_user);
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
    <link href="../../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../../vendors/nprogress/nprogress.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../../build/css/custom.min.css" rel="stylesheet">
    <script src="../../build/js/ckeditor/ckeditor.js"></script>
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
                        echo '<img src="data:image/jpeg;base64,'.base64_encode($row_user['avatar'] ).'" class="img-circle profile_img" />';
                        ?>
                    </div>
                    <div class="profile_info">
                        <span>Welcome,</span>
                        <h2><?=$row_user['TenNV'] ?></h2>
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
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Tin Tức</h3>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Tạo tin tức</h2>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <form method="post" enctype="multipart/form-data">
                                    <div class="field item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3  label-align">Tên tin tức<span class="required">*</span></label>
                                        <div class="col-md-6 col-sm-6">
                                            <input class="form-control" data-validate-length-range="6" data-validate-words="2" name="news_name" required="required" value="<?=$result_news['TenTT']?>"/>
                                        </div>
                                    </div>
                                    <div class="field item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3  label-align">Thumbnail<span class="required">*</span></label>
                                        <div class="col-md-6 col-sm-6">
                                            <input class="form-control" type="file" id='image' name="image" required='required'/>
                                        </div>
                                    </div>
                                    <div class="field item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3  label-align">Thumbnail<span class="required">*</span></label>
                                        <div class="col-md-6 col-sm-6">
                                            <img src="../<?=$result_news['thumbnail']?>" style="height: 150px;width: 150px" alt="thumbnail" title="thumbnail">
                                        </div>
                                    </div>
                                    <textarea class="ckeditor" id="ckeditor1" name = "textarea" >
                                        <?php echo htmlspecialchars($result_news['NoiDungTT']); ?>
                                    </textarea>
                                    <div class="ln_solid"></div>
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
    <!-- /page content -->

    <!-- footer content -->
    <footer>
    </footer>
    <!-- /footer content -->
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="../../vendors/validator/multifield.js"></script>
<script src="../../vendors/validator/validator.js"></script>

<!-- Javascript functions	-->

<script>
    // initialize a validator instance from the "FormValidator" constructor.
    // A "<form>" element is optionally passed as an argument, but is not a must
    var validator = new FormValidator({
        "events": ['blur', 'input', 'change']
    }, document.forms[0]);
    // on form "submit" event
    document.forms[0].onsubmit = function(e) {
        var submit = true,
            validatorResult = validator.checkAll(this);
        console.log(validatorResult);
        return !!validatorResult.valid;
    };
    // on form "reset" event
    document.forms[0].onreset = function(e) {
        validator.reset();
    };
    // stuff related ONLY for this demo page:
    $('.toggleValidationTooltips').change(function() {
        validator.settings.alerts = !this.checked;
        if (this.checked)
            $('form .alert').remove();
    }).prop('checked', false);

</script>

<script src="../../vendors/jquery/dist/jquery.min.js"></script>
<script src="../../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="../../vendors/fastclick/lib/fastclick.js"></script>
<script src="../../vendors/nprogress/nprogress.js"></script>
<script src="../../build/js/custom.min.js"></script>

</body>

</html>
