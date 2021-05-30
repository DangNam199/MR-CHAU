
<?php
include '../../php/connect.php';
?>
<?php
$sql_user = "SELECT * FROM `nhanvien` ";
$res_user = mysqli_query($conn,$sql_user);
?>
<?php
$sql_user2 = "SELECT * FROM `course` ";
$res_user2 = mysqli_query($conn,$sql_user2);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Trung tâm ngoại ngữ</title>
    <link rel="stylesheet" href="../../build/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="../../build/js/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="../../build/js/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="../../build/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="../../build/js/jquery.min.js"></script>
    <link rel="stylesheet" href="../../build/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link rel="stylesheet" href="../../build/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../../build/css/owl.theme.default.min.css">
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
        <a class="text-white ml-2" href="http://localhost/pro1013/login.php"> Đăng nhập</a>
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
                <a class="nav-link text-muted  mx-1 hover-a" href="http://localhost/pro1013/index.php">Trang chủ</a>
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
</nav><div id="carouselId" class="carousel slide my-2" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselId" data-slide-to="0" class="active"></li>
        <li data-target="#carouselId" data-slide-to="1" class=""></li>
        <li data-target="#carouselId" data-slide-to="2" class=""></li>
    </ol>
    <div class="carousel-inner" role="listbox">

        <div class="carousel-item active">
            <a href="https://www.youtube.com/watch?v=ooGDTbaFK34&t=274s">
                <img src="http://localhost/pro1013/img/DK-học-ielts-footer.jpg" style="width:100%"></a>
        </div>
        <div class="carousel-item ">
            <a href="http://localhost/pro1013/admin/anh/edit.php?id=2">
                <img src="http://localhost/pro1013/img/ANDY-2.jpg" style="width:100%"></a>
        </div>
        <div class="carousel-item ">
            <a href="http://localhost/pro1013/admin/anh/edit.php?id=2">
                <img class="" src="http://localhost/pro1013/img/trungtamanhngu1.jpg" style="width:100%"></a>
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselId" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselId" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div><!-- WhatsHelp.io widget -->
<script type="text/javascript">
    (function () {
        var options = {
            facebook: "324300561744512", // Facebook page ID
            call_to_action: "Message us", // Call to action
            position: "right", // Position may be 'right' or 'left'
        };
        var proto = document.location.protocol, host = "whatshelp.io", url = proto + "//static." + host;
        var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
        s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
        var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
    })();
</script>
<!-- /WhatsHelp.io widget -->
<div class="container-fluid py-4 bg-white">
    <div class="container py-4">
        <h2  class="text-center">CHÀO MỪNG BẠN ĐẾN VỚI MR-Châu </h2>
        <div class="row py-4">
            <div class="col-md-6">
                <img class="w-100" src="../../administration/images/american-express.png" alt="">
            </div>
            <div class="col-md-6 pt-2">
                <p>Chị Nguyễn Hồng Hạnh (Hà Nội) Tôi rất tin tưởng vào chất lượng dạy và học tại AMES ENGLISH. Các thầy cô có phương pháp giảng dạy tốt, đồ dùng dạy học rất phong phú. Hai cháu nhà tôi đã học tại đây 4 năm rồi, cứ đến thứ Bảy, Chủ Nhật là các cháu lại háo hức đến trung tâm để học với các thầy cô giáo nước ngoài. chị Nguyễn Hồng Hạnh (Hà Nội)  Tôi rất tin tưởng vào chất lượng dạy và học tại AMES ENGLISH. Các thầy cô có phương pháp giảng dạy tốt, đồ dùng dạy học rất phong phú. Hai cháu nhà tôi đã học tại đây 4 năm rồi, cứ đến thứ Bảy, Chủ Nhật là các cháu lại háo hức đến trung tâm để học với các thầy cô giáo nước ngoài.</p>
                <a name="" id="" class="btn btn-primary" href="introduct.php" role="button">Xem thêm</a>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid py-4" style="background: #f8f8f8;">
    <div class="container py-4">
        <h2  class="text-center">GIẢNG VIÊN MR-Châu </h2>

        <div class="row py-4">
            <div class="owl-carousel owl-theme">
                <?php
                while ($row = mysqli_fetch_array($res_user)) {
                    ?>
                <?php
                echo"<div "." class='card-body bg-while'". "style='background:#fff'".">"."<img src='../".$row["avatar"]."'><br>"."<h5 >Giáo viên:".$row['TenNV']."</h5><br>"."<h6 >Certificate:".$row["ChungChi"]."</h6><br>".
                    "<h6> Address:".$row["address"]."</h6><br>".
                    "<h6 >Phone:".$row["SoDT"]."</h6><br>"."</div";

                ?>
                </div>
            <?php
            }
            ?>

            </div>
        </div>
    </div>
</div>


<div class="container-fluid py-4 " style="background-color: #f8f8f8">
    <div class="container py-4">
        <h2 class="text-center">KHÓA HỌC MR-Châu MỚI</h2>
        <div class="row my-4">
            <?php
            while ($row = mysqli_fetch_array($res_user2)) {
            ?>
            <?php
            echo"<div"." class='col-md-3 text-center p-3 mr-5 mb-3'"."style='background:#fff '".">"."<h5 >Tên chứng chỉ: ".$row['tenKH']."</h5><br>"."<h6 >Số buổi: ".$row["time"]."</h6><br>".
                "<h6> Học phí: ".$row["price"]."</h6><br>"
               ."</div";

            ?>
        </div>
        <?php
        }
        ?>
        </div>
    </div>
</div>
</div>

<div class="container-fluid py-4" style="background: #f7f7f7;">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h1 class="text-danger">ĐĂNG KÝ LỘ TRÌNH HỌC TẬP</h1>
                <p><i>Hãy để lại thông tin của bạn, ACET sẽ giúp xây dựng lộ trình Anh ngữ tốt nhất dành riêng cho bạn.</i></p>
                <div class="embed-responsive embed-responsive-16by9">                                         <iframe width="560" height="315" src="https://www.youtube.com/embed/dfpAnFVKcLs" frameborder="0" allow="accelerometer; autoplay; en                                <!-- <div class="embed-responsive embed-responsive-16by9">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/dfpAnFVKcLs" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div> -->
            </div>
            <div class="col-md-5">
                <div class="card shadow-sm rounded">
                    <img class="card-img-top" src="holder.js/100px180/" alt="">
                    <div class="card-body">
                        <h2>Đăng ký</h2>
                        <form method="post" action="dangky.php">
                            <div class="form-group">
                                <label for="">Họ tên</label>
                                <input type="text" class="form-control" name="fullname">
                            </div>
                            <div class="form-group">
                                <label for="">Số điện thoại</label>
                                <input type="text" class="form-control" name="phone">
                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" class="form-control" name="email">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Chọn khóa học</label>
                                <select class="form-control" id="course_id" name="course_id">
                                    <option value="0">--Chọn khóa học--</option>
                                    <option value="1">Toiec</option>
                                    <option value="2">IELTS</option>
                                    <option value="3">Giao tiếp cơ bản</option>
                                    <option value="4">Tiếng anh chuyên</option>
                                    <option value="5">Chuyên ngành</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Chọn lớp học</label>
                                <select class="form-control" id="class_id" name="class_id">
                                    <option value="0">--Chọn lớp học--</option>
                                    <option value="27">Toiec_1ứdsd</option>
                                    <option value="28">IELTS_1</option>
                                    <option value="29">IELTS_2</option>
                                    <option value="30">Toiec_2</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
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
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.827622207749!2d105.80170731432445!3d21.03958218599249!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab3e638834e5%3A0xc0757decf12a8bf4!2zMTUgxJDDtG5nIFF1YW4sIFF1YW4gSG9hLCBD4bqndSBHaeG6pXksIEjDoCBO4buZaSwgVmlldG5hbQ!5e0!3m2!1sen!2s!4v1542356725898" width="100%" height="250" frameborder="0" style="border:0" allowfullscreen></iframe>                </div>
            <div class="col-md-4">
                <h5 class="text-white mb-1">FACEBOOK</h5>
                <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Ffacebook&tabs=timeline&width=340&height=450&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId=191565505069352" width="100%" height="250" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>              </div>
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

</body>
</html>