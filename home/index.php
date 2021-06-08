<?php
    include 'header1.php';
    include '../php/weekday.php';
    include '../php/general_setting.php';
    
?>
<?php
if(isset($_POST['submit'])){
    $username = $_POST['name'];
    $Email= $_POST['email'];
    $Phone = $_POST['phone'];
    if($username==""||$Email==""||$Phone==""){
        echo"<script> alert('bạn hãy nhập đầy đủ thông tin yêu cầu!'); </script>";
    }
    else{
        $conn->query("INSERT INTO lienhe(hoten,email,sodienthoai) VALUES ('$username','$Email','$Phone')");
    }
}

?>
<?php
$sql_user = "SELECT * FROM `course`";
$res_user = mysqli_query($conn,$sql_user);
?>
<?php
$sql_user3 = "SELECT * FROM `tintuc` ";
$res_user3 = mysqli_query($conn,$sql_user3);
?>
<main>
    <section class="n-main_carousel ">
        <div class="carousel" data-flickity='{ "prevNextButtons: false,groupCells": true,"wrapAround": true}'>
            <?php 
                $sql_slide = "SELECT * FROM slideshow where state='primary'";
                $res_slide = mysqli_fetch_assoc(mysqli_query($conn, $sql_slide));
            ?>
            <div class="carousel-cell">
            <?php
                echo '<img src="data:image/jpeg;base64,'.base64_encode($res_slide['pic1'] ).'"  class="img-circle profile_img" />'; ?>
            </div>
            <div class="carousel-cell">
            <?php
                echo '<img src="data:image/jpeg;base64,'.base64_encode($res_slide['pic2'] ).'"  class="img-circle profile_img" />'; ?>
            </div>
            <div class="carousel-cell">
            <?php
                echo '<img  src="data:image/jpeg;base64,'.base64_encode($res_slide['pic3'] ).'"  class="img-circle profile_img" />'; ?>
            </div>
        </div>
        <div class="n-main-signup d-none d-xl-block">
            <div class="n-main-signup-form" style="background-image: url(../home/images/img-2.png)">
                <div class="n-main-signup-form-header">
                    <p>Đăng ký</p>
                    <p>nhận tư vấn</p>
                </div>
                <div class="n-main-signup-form-main">
                    <form method="post">
                        <input type="text"  class="form-control" name="name" placeholder="Họ và tên">
                        <input type="number" class="form-control"  name="phone" placeholder="Số điện thoại">
                        <input type="email" class="form-control" name="email" placeholder="Email">
                        <button type="submit"  name="submit" value="submit">đăng ký ngay</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <section class="n-main-center ">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="n-main-center-infor">
                        <h2>giới thiệu</h2>
                        <h3><?=$res_setting['name'] ?></h3>
                        <h3>Dare to change</h3>
                        <p class="mt-4">
                            <?=$res_setting['description']?>
                        </p>
                        <a href="#"> Xem chi tiết</a>
                    </div>
                </div>
                <div class="col-lg-6">
                <iframe width="570" height="315" src="<?=$res_social_setting['youtube_video1']?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </section>
    <section class="n-main-reason" style="background-image: url(../home/images/img-3.jpg)">
        <div class="container">
            <h3>Lí do vì sao chọn</h3>
            <div class="row">
                <div class="col-md-4">
                    <div class="n-main-reason-choose">
                        <h4></h4>
                        <p>
                            Được thành lập từ năm 2014, chúng tôi đã trở thành đơn vị đào tạo tiếng Anh hàng đầu tại Việt Nam.
                        </p>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="n-main-reason-tranning">
                        <img src="../home/images/img-4.png" alt="">
                        <p>
                            Đào tạo hơn 10.000 bạn trẻ mất gốc tiếng Anh, sở hữu chứng chỉ IELTS với điểm số cao.
                        </p>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="n-main-reason-tranning">
                        <img src="../home/images/img-5.png" alt="">
                        <p>
                            Lộ trình học tại trung tâm được thiết kế theo giáo trình riêng, rõ ràng, tinh gọn và hiệu quả.
                        </p>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="n-main-reason-tranning">
                        <img src="../home/images/img-6.png" alt="">
                        <p>
                            Đội ngũ giảng viên, trợ giảng chuyên nghiệp đến từ các trường đại học danh tiếng trong và ngoài nước.
                        </p>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="n-main-reason-tranning">
                        <img src="../home/images/img-7.png" alt="">
                        <p>
                            Cam kết đầu ra bằng văn bản với học viên.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="n-main-courses">
        <div class="container">
            <h2 class="ml-1">các khóa học</h2>
            <div class="row">
                <div class="col-lg-4">
                <h3><?=$res_setting['name'] ?></h3>
                </div>
                <div class="col-lg-8">
                    <p>
                        Với sự đa dạng hóa khóa học từ offline đến online, mỗi học viên sẽ có cơ hội trải nghiệm các phương pháp học tiếng Anh độc đáo, chỉ duy nhất tại Ms.Châu. Học viên sẽ dễ dàng tiếp nhận kiến thức mới nhờ phương pháp giảng dạy tinh - gọn - nhẹ từ những giảng viên xuất sắc trên toàn quốc.
                    </p>
                </div>
            </div>
            <div class="n-main-courses-carousel" data-flickity='{"cellAlign": "left", "imagesLoaded": true ,"pageDots": false, "prevNextButtons": true,"groupCells": true,"wrapAround": true}'>
                <?php
                while ($row = mysqli_fetch_array($res_user)) {
                ?>
                <div class="carousel-cell ">
                    <div class="n-main-courses-items">

                        <div class="n-main-courses-items-infor">
                            <h2>Khóa học</h2>
                            <h3><?=$row['tenKH']?></h3>
                            <p>
                                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="user" class="svg-inline--fa fa-user fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm89.6 32h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-41.6c0-74.2-60.2-134.4-134.4-134.4z"></path></svg>
                                <span>Học Phí: <?=$row['price']?></span>
                            </p>
                            <p class="mb-3">
                                <svg aria-hidden="true" focusable="false" data-prefix="far" data-icon="clock" class="svg-inline--fa fa-clock fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm0 448c-110.5 0-200-89.5-200-200S145.5 56 256 56s200 89.5 200 200-89.5 200-200 200zm61.8-104.4l-84.9-61.7c-3.1-2.3-4.9-5.9-4.9-9.7V116c0-6.6 5.4-12 12-12h32c6.6 0 12 5.4 12 12v141.7l66.8 48.6c5.4 3.9 6.5 11.4 2.6 16.8L334.6 349c-3.9 5.3-11.4 6.5-16.8 2.6z"></path></svg>
                                <span>Thời lượng: <?=$row['time']?></span>
                            </p>

                        </div>

                    </div>
                </div>
                    <?php
                }
                ?>
            </div>

        </div>
    </section>
    <section class="n-main-news">
        <div class="container">
            <h2 class="ml-1">tin tức và ưu đãi</h2>
            <div class="row">
                <div class="col-lg-4">
                     <h3><?=$res_setting['name'] ?></h3>
                </div>
                <div class="col-lg-8">
                    <p>
                        Anh ngữ Ms.Châu cập nhật thường xuyên và liên tục những thông tin bên lề kỳ thi IELTS. Không chỉ đem lại tin tức, đây còn là nguồn tài liệu bổ ích về tiếng Anh đồng thời là nơi cung cấp thông tin về những ưu đãi khủng theo từng khóa học.
                    </p>
                </div>
            </div>
            <div class="n-main-news-video mb-5">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="n-main-news-video-left">
                            <iframe width="100%" height="350" src="<?=$res_social_setting['youtube_video2'] ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="n-main-news-video-right">
                            <h2>
                                ưu đãi khóa học học TOEIC
                            </h2>
                            <h3 class="mb-3">
                                <a href="#">
                                    ƯU ĐÃI NGÚT NGÀN - HỌC BỔNG NGẬP TRÀN
                                </a>
                            </h3>
                            <ul>
                                <li>
                                    ĐĂNG KÝ CÀNG SỚM, ƯU ĐÃI CÀNG LỚN
                                </li>
                                <li class="mt-1 mb-1">
                                    Tặng sổ tay mini xinh xắn
                                </li>
                                <li>
                                    Mức giảm lên tới #600k khi đăng ký học theo nhóm từ 3 thành viên
                                </li>


                            </ul>
                            <p class="mt-2 mb-2">
                                <strong > Ưu đãi áp dụng cho những học viên đăng ký khóa học trước ngày khai giảng 10 ngày</strong>
                            </p>
                            <br>
                            <h6>LỊCH KHAI Lớp mới</h6>
                            <?php 
                                $sql_class= "SELECT * FROM `all_class` where state = 'waiting'";
                                $res_class = mysqli_query($conn, $sql_class);
                                while($row_class = mysqli_fetch_assoc($res_class)){
                                    $arr = getListWeekday($row_class['weekdays']);
                            ?>
                            <h5>
                                ➤<?=$row_class['class_name']?>:<br> <?php foreach ($arr as $r){
                                  echo $r . ' ';
                                }?>, Thời gian: <?=$row_class['time_from']?> - <?=$row_class['time_from'] ?>.<br> Khai giảng <?=$row_class['date_from'] ?> - <?=$row_class['date_to'] ?>
                            </h5>

                            <?php } ?>
                        </div>

                    </div>
                </div>
            </div>
            <div class="n-main-news-list">
                <div class="carousel" data-flickity='{"cellAlign": "left", "freeScroll": true }'>
                    <?php
                    while ($row = mysqli_fetch_array($res_user3)) {
                    ?>
                    <div class="carousel-cell col-md-4">
                        <div class="n-main-news-list-items">
                            <?php echo '<a href="Detail.php?id='.$row['id'].'"><img src="data:image/jpeg;base64,'.base64_encode($row['thumbnail'] ).'" class="img-fluid  img-circle profile_img avatar" /></a>';
                            ?>
                            <h3  class="mb-2">
                                <a href="Detail.php?id=<?=$row['id']?>"><?=$row["TenTT"]?></a>
                            </h3>
                            <h4>
                                <a href="#">
                                    <svg aria-hidden="true" focusable="false" data-prefix="far" data-icon="clock" class="svg-inline--fa fa-clock fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm0 448c-110.5 0-200-89.5-200-200S145.5 56 256 56s200 89.5 200 200-89.5 200-200 200zm61.8-104.4l-84.9-61.7c-3.1-2.3-4.9-5.9-4.9-9.7V116c0-6.6 5.4-12 12-12h32c6.6 0 12 5.4 12 12v141.7l66.8 48.6c5.4 3.9 6.5 11.4 2.6 16.8L334.6 349c-3.9 5.3-11.4 6.5-16.8 2.6z"></path></svg>
                                    <span> <?=$row['date']?></span>
                                </a>
                            </h4>
                        </div>
                    </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>
    <section class="n-main-talk" style="background-image: url(../home/images/img-8.jpg)">
        <div class="container">
            <h2 class="ml-1">tin tức và ưu đãi</h2>
            <div class="row">
                <div class="col-lg-4">
                    <h3><?=$res_setting['name'] ?></h3>
                </div>
                <div class="col-lg-8">
                    <p>
                        Đối với chúng tôi, chất lượng giảng dạy luôn được đặt lên hàng đầu. Hơn 6 năm hoạt động, sự thành công trên con đường ngoại ngữ của hơn 10.000 học viên chính là minh chứng rõ ràng nhất cho chất lượng đào tạo tuyệt vời của trung tâm Anh ngữ Ms.Châu.
                    </p>
                </div>
            </div>
            <div class="n-main-talk-carousel">
                <div class="carousel" data-flickity='{ "prevNextButtons: false,groupCells": true,"wrapAround": true}'>
                    <div class="carousel-cell">
                        <div class="items">
                            <div class="content">
                                <a href="#">
                                    <img src="../home/images/156825968616.jpg" alt="">
                                </a>
                                <h2>
                                    Nguyễn Thị Lan
                                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="star" class="svg-inline--fa fa-star fa-w-18" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></path></svg>
                                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="star" class="svg-inline--fa fa-star fa-w-18" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></path></svg>
                                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="star" class="svg-inline--fa fa-star fa-w-18" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></path></svg>
                                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="star" class="svg-inline--fa fa-star fa-w-18" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></path></svg>
                                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="star" class="svg-inline--fa fa-star fa-w-18" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></path></svg>
                                </h2>
                                <h3>
                                    SINH VIÊN
                                </h3>
                                <p>
                                    Giảng viên rất đáng yêu và các bạn trợ giảng luôn take care tận tình, cảm giác đi học ở trung tâm mọi người gắn bó như gia đình
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-cell">
                        <div class="items">
                            <div class="content">
                                <a href="#">
                                    <img src="../home/images/156825968616.jpg" alt="">
                                </a>
                                <h2>
                                    Nguyễn Thị Lan
                                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="star" class="svg-inline--fa fa-star fa-w-18" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></path></svg>
                                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="star" class="svg-inline--fa fa-star fa-w-18" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></path></svg>
                                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="star" class="svg-inline--fa fa-star fa-w-18" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></path></svg>
                                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="star" class="svg-inline--fa fa-star fa-w-18" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></path></svg>
                                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="star" class="svg-inline--fa fa-star fa-w-18" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></path></svg>
                                </h2>
                                <h3>
                                    SINH VIÊN
                                </h3>
                                <p>
                                    Giảng viên rất đáng yêu và các bạn trợ giảng luôn take care tận tình, cảm giác đi học ở trung tâm mọi người gắn bó như gia đình
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-cell">
                        <div class="items">
                            <div class="content">
                                <a href="#">
                                    <img src="../home/images/156825968616.jpg" alt="">
                                </a>
                                <h2>
                                    Nguyễn Thị Lan
                                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="star" class="svg-inline--fa fa-star fa-w-18" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></path></svg>
                                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="star" class="svg-inline--fa fa-star fa-w-18" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></path></svg>
                                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="star" class="svg-inline--fa fa-star fa-w-18" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></path></svg>
                                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="star" class="svg-inline--fa fa-star fa-w-18" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></path></svg>
                                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="star" class="svg-inline--fa fa-star fa-w-18" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></path></svg>
                                </h2>
                                <h3>
                                    SINH VIÊN
                                </h3>
                                <p>
                                   Giảng viên rất đáng yêu và các bạn trợ giảng luôn take care tận tình, cảm giác đi học ở trung tâm mọi người gắn bó như gia đình
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-cell">
                        <div class="items">
                            <div class="content">
                                <a href="#">
                                    <img src="../home/images/156825968616.jpg" alt="">
                                </a>
                                <h2>
                                    Nguyễn Thị Lan
                                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="star" class="svg-inline--fa fa-star fa-w-18" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></path></svg>
                                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="star" class="svg-inline--fa fa-star fa-w-18" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></path></svg>
                                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="star" class="svg-inline--fa fa-star fa-w-18" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></path></svg>
                                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="star" class="svg-inline--fa fa-star fa-w-18" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></path></svg>
                                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="star" class="svg-inline--fa fa-star fa-w-18" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></path></svg>
                                </h2>
                                <h3>
                                    SINH VIÊN
                                </h3>
                                <p>
                                    Giảng viên rất đáng yêu và các bạn trợ giảng luôn take care tận tình, cảm giác đi học ở trung tâm mọi người gắn bó như gia đình
                                </p>
                            </div>
                        </div>
                    </div>


                </div>

            </div>

        </div>
    </section>
</main>
<?php
include 'footer1.php';
?>