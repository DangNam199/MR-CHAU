<?php
include 'connect.php';
session_start();

$ID = isset($_GET['id']) ? (int)$_GET['id'] : '';
$sql_nhanvien = "select * from nhanvien WHERE id = '$ID'";
$query_nhanvien= mysqli_query($conn,$sql_nhanvien);
$result_nhanvien = array();
if($query_nhanvien){
    while($row = mysqli_fetch_assoc($query_nhanvien)){
        $result_nhanvien = $row;
    }
}
if(!empty($_POST['submit'])){//Khi chua bam nut Submit, gia tri cua no la "", trai lai, gia tri no se la "XAC NHAN"
    $user_name = $_POST['user_name'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $date = $_POST['dob'];
    $phone = $_POST['phone'];
    $chungchi = $_POST['chungchi'];
    $chucvu = $_POST['position'];
    $cmnd = $_POST['cmnd'];
    $gender = $_POST['gender'];
    $hsl = $_POST['hsl'];
    list($day,$month,$year,$hour,$min,$sec) = explode("/",date('d/m/Y/h/i/s'));
    $password =  $day.'/'.$month.'/'.$year;
    $password = md5($password)  ;

    $uploaddir = '../images/';
    move_uploaded_file($_FILES['image']['tmp_name'], $uploaddir.time().$_FILES['image']['name']);
    $file = $uploaddir.time().$_FILES['image']['name'];

    $sql = "UPDATE nhanvien SET TenNV = '$user_name',CMND = '$cmnd', NgaySinh = '$date', gender ='$gender', SoDT = '$phone', address ='$address', ChungChi = '$chungchi', HSL = '$hsl', email = '$email', password = '$password', level = '$chucvu',avatar='$file' WHERE id = '$ID'";
    $res = mysqli_query($conn, $sql);
    if($res){
        echo "<script>alert('Tạo mới người dùng thành công');</script>";
        header('location:../administration/contacts.php');
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
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">

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
                  <img src="<?= $row_user['avatar']?>" class="img-circle profile_img" title="avatar" alt="avatar">
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
                  <li><a href="../administration/index.php"><i class="fa fa-home"></i> Home </a>
                  </li>
                  <li><a> Nhân Viên <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="../administration/form_staff.php">Tạo Nhân Viên</a></li>
                      <li><a href="../administration/contacts.php">Tất Cả Nhân Viên</a></li>
                    </ul>
                  </li>
                  <li><a> Lớp <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="../administration/form_class.php">Lớp</a></li>
                      <li><a href="../administration/all_class.php">Tất Cả Lớp</a></li>
                    </ul>
                  </li>
                  <li><a> Phòng Học <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="../administration/form_room.php">Thêm Phòng</a></li>
                      <li><a href="../administration/all_room.php">Tất Cả Phòng</a></li>
                    </ul>
                  </li>
                  <li><a> Chứng chỉ đang đào tạo <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="../administration/form_degree.php">Tạo Chứng Chỉ</a></li>
                      <li><a href="../administration/all_degree.php">Tất Cả Chứng Chỉ</a></li>
                    </ul>
                  </li>
                  <li><a> Khoá Học <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="../administration/form_courses.php">Tạo Khoá Học</a></li>
                      <li><a href="../administration/all_courses.php">Tất Cả Khoá Học</a></li>
                    </ul>
                  </li>
                  <li><a> Tài Liệu <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="../administration/form_document.php">Nhập tài liệu</a></li>
                      <li><a href="../administration/all_document.php">Tất Cả Tài liệu</a></li>
                    </ul>
                  </li>
                  <li><a> Tin Tức <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="../administration/form_news.php">Tạo Tin Tức</a></li>
                      <li><a href="../administration/all_news.php">Tất Cả Tin Tức</a></li>
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
                            <h3>Thêm mới Nhân Viên</h3>
                        </div>
                    </div>
                    <div class="clearfix"></div>

                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Thông tin Nhân Viên</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <form  method="post" enctype="multipart/form-data">
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Họ Và Tên<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" data-validate-length-range="6" data-validate-words="2" name="user_name" required="required" value="<?php echo $result_nhanvien['TenNV']?>"/>
                                            </div>
                                        </div>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Địa Chỉ<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" class='optional' name="address" data-validate-length-range="5,15" type="text" value="<?php echo $result_nhanvien['address']?>"/></div>
                                        </div>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Email<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" type="email" class='email' name="email" data-validate-linked='email' required='required' value="<?php echo $result_nhanvien['email']?>"/></div>
                                        </div>
                                        <div class="item form-group">
											                      <label class="col-form-label col-md-3 col-sm-3 label-align">Gender</label>
											                      <div class="col-md-6 col-sm-6 ">
                                            <select name="gender" class="form-control"   >
                                                <option value="male">Nam</option>
                                                <option value="female">Nữ</option>
                                            </select>
											                      </div>
										                        </div>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Date<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" class='date' type="date" name="dob" required='required' value="<?=$result_nhanvien['NgaySinh']?>"></div>
                                        </div>

                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Số điện thoại<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" type="tel" class='tel' name="phone" required='required' data-validate-length-range="8,20" value="<?php echo $result_nhanvien['SoDT']?> "/></div>
                                        </div>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Chức Vụ<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                            <select name="position" class="form-control"  >
                                                <option value="giangvien">Giảng Viên</option>
                                                <option value="trogiang">Trợ Giảng</option>
                                                <option value="tapvu">Tạp Vụ</option>
                                                <option value="IT">IT</option>
                                                <option value="quantrivien">Quản Trị Viên</option>
                                            </select>
                                        </div>
                                        </div>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Chứng Chỉ<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" class='text' name="chungchi" required='required' data-validate-length-range="5,20" value="<?php echo $result_nhanvien['ChungChi']?> "/></div>
                                        </div>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Số Chứng Minh Thư<span class="required" >*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" type="number" name="cmnd" required='required' data-validate-length-range="10,15" value="<?php echo $result_nhanvien['CMND']?>"/></div>
                                        </div>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Hệ số lương<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" type="number"  name="hsl" required='required' data-validate-length-range="0,10" value="<?php echo $result_nhanvien['HSL']?>"/></div>
                                        </div>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Avatar<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" type="file" id='image' name="image" required='required'/>
                                            </div>
                                        </div>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align"></label>
                                            <div class="col-md-6 col-sm-6">
                                                <?php if (!empty($result_nhanvien['avatar'])):?>
                                                    <img src="<?=$result_nhanvien['avatar']?>" style="height: auto; width: 150px" alt="avatar" title="avatar">
                                                <?php endif;?>
                                            </div>
                                        </div>
                                        <div class="ln_solid">
                                            <div class="form-group">
                                                <div class="col-md-6 offset-md-3">
                                                    <button type='submit' name='submit' value="submit" class="btn btn-primary">Cập nhật</button>
                                                    <button type='reset' class="btn btn-success">Nhập lại</button>
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

</html>
