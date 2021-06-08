<?php
include '../php/connect.php';
include '../php/session.php';
$ID = isset($_GET['id']) ? (int)$_GET['id'] : '';
if(!empty($_POST['submit'])){//Khi chua bam nut Submit, gia tri cua no la "", trai lai, gia tri no se la "XAC NHAN"
    $id = $_SESSION['id'];
    echo $id;
    $user_name = $_POST['user_name'];
    $email =  $_POST['email'];
    $address =  $_POST['address'];
    $SoDT =  $_POST['SoDT'];
    $gender =  $_POST['gender'];
    $sql = "UPDATE hocvien SET name = '$user_name', email = '$email', address = '$address', sdt = '$SoDT', gender = '$gender'  WHERE id = '$id'";
    $res = mysqli_query($conn, $sql);
    if($res){
        header('location:../student/index.php');
    }
    else{
        echo $sql;
    }
}else{
    $ID = isset($_GET['id']) ? (int)$_GET['id'] : '';
}
if(!isset($_SESSION['user'])){
    header('location: login.php');
}
else{
    $sql_user = "SELECT * FROM `hocvien` WHERE email='". $_SESSION['user']. "' limit 1";
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
    <title><?php
        include '../php/general_setting.php';
    echo $res_setting['name'];?> </title>

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

                <div class="clearfix"></div>

                <!-- menu profile quick info -->
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
              <a data-toggle="tooltip" data-placement="top" title="Profile" href="profile_student.php">
                <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
              </a>
            </div>
                <!-- /sidebar menu -->

            </div>
        </div>

        <!-- page content -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Thông tin học viên</h3>
                    </div>
                </div>
                <div class="clearfix"></div>

                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Đổi mật khẩu thông tin Nhân Viên</h2>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <form  action="#" method="post" enctype="multipart/form-data">
                                    <div class="field item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3  label-align">Họ Và Tên<span class="required">*</span></label>
                                        <div class="col-md-6 col-sm-6">
                                            <input class="form-control" value="<?=$row_user['name']?>"  data-validate-length-range="6" data-validate-words="2" name="user_name" required="required" />
                                        </div>
                                    </div>
                                    <div class="field item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3  label-align">Email<span class="required">*</span></label>
                                        <div class="col-md-6 col-sm-6">
                                            <input class="form-control" value="<?=$row_user['email']?>" name="email" data-validate-length-range="5,15" type="text" /></div>
                                    </div>
                                    <div class="field item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3  label-align">Địa chỉ<span class="required">*</span></label>
                                        <div class="col-md-6 col-sm-6">
                                            <input class="form-control" value="<?=$row_user['address']?>" name="address" data-validate-length-range="5,15" type="text" /></div>
                                    </div>
                                    <div class="field item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3  label-align">Số điện thoại<span class="required">*</span></label>
                                        <div class="col-md-6 col-sm-6">
                                            <input class="form-control" value="<?=$row_user['sdt']?>" name="SoDT" data-validate-length-range="5,15" type="text" /></div>
                                    </div>
                                    <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Giới tính</label>
                                    <div class="col-md-6 col-sm-6 ">
                                            <select name="gender" class="form-control"> 
                                              <?php 
                                                if ($row_user['gender'] == 'male'){
                                              ?>
                                                <option value="male" selected>Nam</option>
                                                <option value="female">Nữ</option>
                                                <?php } 
                                                if ($row_user['gender'] == 'female'){
                                                ?>
                                                <option value="male" >Nam</option>
                                                <option value="female" selected>Nữ</option>
                                                <?php } ?>
                                            </select>
											                      </div>
                                          </div>

                                    <div class="ln_solid">
                                        <div class="form-group">
                                            <div class="col-md-6 offset-md-3">
                                                <button type='submit' name='submit' class="btn btn-primary" value="submit">Lưu lại</button>
                                                <a href="change_password.php" class="btn btn-primary" value="submit">Đổi mật khẩu</a>
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
<script src="../vendors/validator/multifield.js"></script>
<script src="../vendors/validator/validator.js"></script>

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

</script>

<script src="../vendors/jquery/dist/jquery.min.js"></script>
<script src="../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="../vendors/fastclick/lib/fastclick.js"></script>
<script src="../vendors/nprogress/nprogress.js"></script>
<script src="../build/js/custom.min.js"></script>

</body>
<!-- jQuery -->
<script src="../vendors/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<!-- FastClick -->
<script src="../vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="../vendors/nprogress/nprogress.js"></script>
<!-- morris.js -->
<script src="../vendors/raphael/raphael.min.js"></script>
<script src="../vendors/morris.js/morris.min.js"></script>
<!-- bootstrap-progressbar -->
<script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
<!-- bootstrap-daterangepicker -->
<script src="../vendors/moment/min/moment.min.js"></script>
<script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

<!-- Custom Theme Scripts -->
<script src="../build/js/custom.min.js"></script>
</html>