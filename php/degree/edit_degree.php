<?php
include '../connect.php';

$ID = isset($_GET['id']) ? (int)$_GET['id'] : '';
$sql_degree = "select * from degree WHERE id = '$ID'";
$query_degree= mysqli_query($conn,$sql_degree);
$result_degree = array();
if($query_degree){
    while($row = mysqli_fetch_assoc($query_degree)){
        $result_degree = $row;
    }
}

if (isset($_POST['submit'])){
    $name = $_POST['name'];
    $sql = "UPDATE degree SET tenDegree = '$name' WHERE id = '$ID'";
    $res = mysqli_query($conn, $sql);
    if($res){
        header("location: ../../administration/all_degree.php");
    }
}
session_start();
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
                        <img src="../<?=$row_user['avatar']?>" class="img-circle profile_img" title="avatar" alt="avatar">
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
                            <li><a> Nh??n Vi??n <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="form_staff.php">T???o Nh??n Vi??n</a></li>
                                    <li><a href="contacts.php">T???t C??? Nh??n Vi??n</a></li>
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
                        <h3>Th??m m???i kho?? h???c</h3>
                    </div>
                </div>
                <div class="clearfix"></div>

                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Th??ng tin kho?? h???c</h2>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <form  method="post">
                                    <div class="field item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3  label-align">T??n Ch???ng Ch???<span class="required">*</span></label>
                                        <div class="col-md-6 col-sm-6">
                                            <input class="form-control" data-validate-length-range="6" data-validate-words="2" name="name" required="required" value="<?=$result_degree['tenDegree']?>" />
                                        </div>
                                    </div>
                                    <div class="ln_solid">
                                        <div class="form-group">
                                            <div class="col-md-6 offset-md-3">
                                                <button type='submit' name='submit' class="btn btn-primary">T???o m???i</button>
                                                <button type='reset' class="btn btn-success">Nh???p l???i</button>
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
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="../../vendors/validator/multifield.js"></script>
<script src="../../vendors/validator/validator.js"></script>

<!-- Javascript functions	-->
<script>
    function hideshow(){
        var password = document.getElementById("password1");
        var slash = document.getElementById("slash");
        var eye = document.getElementById("eye");

        if(password.type === 'password'){
            password.type = "text";
            slash.style.display = "block";
            eye.style.display = "none";
        }
        else{
            password.type = "password";
            slash.style.display = "none";
            eye.style.display = "block";
        }

    }
</script>

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
    }

</script>

<script src="../../vendors/jquery/dist/jquery.min.js"></script>
<script src="../../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="../../vendors/fastclick/lib/fastclick.js"></script>
<script src="../../vendors/nprogress/nprogress.js"></script>
<script src="../../build/js/custom.min.js"></script>

</body>

</html>
