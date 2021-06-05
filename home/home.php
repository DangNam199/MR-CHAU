<?php
include 'header.php';
?>
<?php
$hostname = '127.0.0.1';
$username = 'root';
$password = '';
$dbname = "doan";
$conn = mysqli_connect($hostname, $username, $password,$dbname);
$sql_user = "SELECT * FROM `nhanvien` ";
$res_user = mysqli_query($conn,$sql_user);
?>
<?php
$sql_user2 = "SELECT * FROM `course` ";
$res_user2 = mysqli_query($conn,$sql_user2);
?>
<nav class="navbar navbar-expand-sm shadow-sm bg-white sticky-top">
    <a class="navbar-brand text-muted" href="#"><img id="logo" style="height:50px;transition: ease 0.3s;" src="" alt=""></a>
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
            <li class="nav-item">
                <a class="nav-link text-muted mx-1 hover-a" href="contact_us_form.php">Liên hệ</a>
            </li>

        </ul>

    </div>
</nav>
    <div id="carouselId" class="carousel slide my-2 d-none" data-ride="carousel">
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
                <img class="w-100" src="../administration/images/american-express.png" alt="">
            </div>
            <div class="col-md-6 pt-2">
                <p>Chị Nguyễn Thị Châu Hạnh (Hải Phòng) Tôi rất tin tưởng vào chất lượng dạy và học tại MR Châu . Các thầy cô có phương pháp giảng dạy tốt, đồ dùng dạy học rất phong phú. Hai cháu nhà tôi đã học tại đây 4 năm rồi, cứ đến thứ Bảy, Chủ Nhật là các cháu lại háo hức đến trung tâm để học với các thầy cô giáo nước ngoài. chị Nguyễn Thị Châu (Hà Nội)  Tôi rất tin tưởng vào chất lượng dạy và học tại Mr Châu Ielts. Các thầy cô có phương pháp giảng dạy tốt, đồ dùng dạy học rất phong phú. Hai cháu nhà tôi đã học tại đây 4 năm rồi, cứ đến thứ Bảy, Chủ Nhật là các cháu lại háo hức đến trung tâm để học với các thầy cô giáo nước ngoài.</p>
                <a name="" id="" class="btn btn-primary" href="introduct.php" role="button">Xem thêm</a>
            </div>
        </div>
    </div>
</div>
<?php  ?>
<div class="container-fluid py-4" style="background: #f8f8f8;">
    <div class="container py-4">
        <h2  class="text-center">GIẢNG VIÊN MR-Châu </h2>

        <div class="row py-4">
            <div class="owl-carousel owl-theme">
                <?php
                while ($row = mysqli_fetch_array($res_user)) {
                    ?>
                <div class="class='card-body bg-while" style="background: #fff">
                    <?php             echo '<img src="data:image/jpeg;base64,'.base64_encode($row['avatar']).'" class="img-circle profile_img avatar" />';
                    ?>
                    <h5 >Giáo viên: <?=$row['TenNV']?></h5>
                    <h6 >Certificate: <?=$row["ChungChi"]?></h6>
                    <h6> Address:<?=$row["address"]?></h6>
                    <h6 >Phone: <?=$row["sdt"]?></h6>
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
<?php
include 'footer.php';
?>