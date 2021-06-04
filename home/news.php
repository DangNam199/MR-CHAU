

<?php
include '../php/connect.php';
?>
<?php
$sql_user = "SELECT * FROM `nhanvien` ";
$res_user = mysqli_query($conn,$sql_user);
?>
<?php
$sql_user4 = "SELECT * FROM `tintuc` ";
$res_user4 = mysqli_query($conn,$sql_user4);
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Trung tâm ngoại ngữ</title>
    <link rel="stylesheet" href="../build/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="../build/js/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="../build/js/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="../build/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="../build/js/jquery.min.js"></script>
    <link rel="stylesheet" href="../build/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link rel="stylesheet" href="../build/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../build/css/owl.theme.default.min.css">
    <link rel="shortcut icon" type="image/png" href="img/nasao-logo1.png">
    <style>
        .nav-link{
            margin: 0rem 1rem;
        }
        .card, .card-header:first-child, .list-group-item:first-child, .list-group-item:last-child {
            border-radius: 0;
        }
        .border-none{
            border: none;
        }
        body{
            background: #f7f7f7;
        }

        .breadcrumb {
            background-color: #f7f7f7;
            /* box-shadow: 0 2px 3px rgb(209, 209, 209); */
        }
        img{
            width: 100%;
        }
    </style>

    <script>
        $(document).ready(function(){
            $(window).scroll(function(){
                if($(this).scrollTop() > 40){
                    document.getElementById("logo").style.height = "35px";
                } else{
                    document.getElementById("logo").style.height = "50px";
                }
            });
        });
    </script>
</head>
<body>

<header class="blog-header bg-dark py-1">
    <div class="d-flex justify-content-between align-items-center">
        <a class="text-white ml-2" href="administration/login.php"> Đăng nhập</a>
        <div>
            <a class="text-white mr-4" href="#"><i class="fa fa-phone"></i> Hotline: 0398060479</a>
            <a class="text-white" href="#"><i class="fa fa-clock-o"></i> Time: 8h - 18h</a>
        </div>
    </div>
</header>

<nav class="navbar navbar-expand-sm shadow-sm bg-white sticky-top">
    <a class="navbar-brand text-muted" href="#"><img id="logo" style="height:50px;transition: ease 0.3s;" src="http://localhost/pro1013/img/nasao-logo.png" alt=""></a>
    <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#collapsibleNavId"
            aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation"></button>
    <div class="collapse navbar-collapse" id="collapsibleNavId">
        <ul class="navbar-nav mr-auto ml-4 mt-2 mt-lg-0">
            <li class="nav-item active hover-a">
                <a class="nav-link text-muted  mx-1 hover-a" href="home.php">Trang chủ</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-muted mx-1  hover-a" href="news.php">Tin tức</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-muted" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Khóa học
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="course.php?id=1">Toiec</a>
                    <a class="dropdown-item" href="course.php?id=2">IELTS</a>
                    <a class="dropdown-item" href="course.php?id=3">Giao tiếp cơ bản</a>
                    <a class="dropdown-item" href="course.php?id=4">Tiếng anh chuyên</a>
                    <a class="dropdown-item" href="course.php?id=5">Chuyên ngành</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link text-muted mx-1 hover-a" href="timetable.php">Lịch khai giảng</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-muted mx-1 hover-a" href="contact.php">Liên hệ</a>
            </li>

        </ul>
        <form class="form-inline my-2 mr-4 my-lg-0" method="post" action="timkiem.php">
            <input class="form-control mr-sm-2" type="text" placeholder="Search" name="search">
            <button class="btn btn-dark my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>
<div class="container-fluid bg-white py-2">
    <div class="container mt-5">
        <div class="row bg-light">
            <?php
            while ($row = mysqli_fetch_array($res_user4)) {
            ?>
        <?php
            echo '<img src="data:image/jpeg;base64,'.base64_encode($row['thumbnail'] ).'" class="img-circle profile_img avatar" />';

            echo"<div"." class='col-md-8  border-bottom mb-5'".">"."<p>".$row["TenTT"]."</p>"."</div>";
            ?>
              <?php
           }
            ?>
        </div>

    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $('#course_id').change(function(){
            var course = $('#course_id').val();
            $.ajax({
                url:"admin/baitap/xulysubject.php",
                method:"post",
                data: {
                    course:course},
                dataType:"text",
                success: function(kq){
                    $('#class_id').html(kq);
                }
            });
        })
    });
</script>
<footer class="bg-dark pt-4">
    <div class="container py-4">
        <div class="row">
            <div class="col-md-4">
                <h5 class="text-white mb-1">LIÊN HỆ</h5>
                <p class="text-light pt-4">Hotline: 0398060479</p>
                <p class="text-light">Email: dienntph06483@fpt.edu.vn</p>
            </div>
            <div class="col-md-4">
                <h5 class="text-white mb-1">ĐỊA CHỈ</h5>
                <iframe src="" width="100%" height="250" frameborder="0" style="border:0" allowfullscreen></iframe>                </div>
            <div class="col-md-4">
                <h5 class="text-white mb-1">FACEBOOK</h5>
                <iframe src="" width="100%" height="250" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>              </div>
        </div>
    </div>
</footer>        <script>
    $(document).ready(function () {
        $(".owl-carousel").owlCarousel({
            loop: true,
            margin: 30,
            responsive: {
                0: {
                    items: 1
                },
                1000: {
                    items: 4
                }
            }
        });

    });
</script>
<script src="../../build/js/owl.carousel.min.js"></script>
<style>
.avatar {
    width: 150px;
}

</style>

</body>
</html>
