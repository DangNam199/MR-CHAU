<?php
<<<<<<< Updated upstream
include '../php/general_setting.php';
if(isset($_POST['submit'])){
=======
if(isset($_POST['send'])){
>>>>>>> Stashed changes
    $username = $_POST['name'];
    $Email= $_POST['email'];
    $Phone = $_POST['phone'];
    if($username==""||$Email==""||$Phone==""){
        echo"<script> alert('bạn hãy nhập đầy đủ thông tin yêu cầu!'); </script>";
    }
    else{
        if($conn->query("INSERT INTO lienhe(hoten,email,sodienthoai) VALUES ('$username','$Email','$Phone')")){
            echo"<script>alert('Gửi thành công !')</script>";
        }
        else{
            echo"<script> alert('Gửi thất bại !!'); </script>";
        }

    }
}

?>

<footer>
    <div class="n-footer position-relative">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="n-footer-company">
                        <p class="mt-3">
                        <?php 
                    echo '<img src="data:image/jpeg;base64,'.base64_encode($res_setting['avatar'] ).'" class="img-circle profile_img" />';
              ?>

                        </p>
                        <div class="n-footer-company-SocialNetwork mt-2">
                            <a href="<?=$res_social_setting['facebook']?>"><svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="facebook-f" class="svg-inline--fa fa-facebook-f fa-w-10 mr-3" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path fill="currentColor" d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z"></path></svg></a>
                            <a href="<?=$res_social_setting['youtube']?>"><svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="youtube" class="svg-inline--fa fa-youtube fa-w-18 mr-3" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M549.655 124.083c-6.281-23.65-24.787-42.276-48.284-48.597C458.781 64 288 64 288 64S117.22 64 74.629 75.486c-23.497 6.322-42.003 24.947-48.284 48.597-11.412 42.867-11.412 132.305-11.412 132.305s0 89.438 11.412 132.305c6.281 23.65 24.787 41.5 48.284 47.821C117.22 448 288 448 288 448s170.78 0 213.371-11.486c23.497-6.321 42.003-24.171 48.284-47.821 11.412-42.867 11.412-132.305 11.412-132.305s0-89.438-11.412-132.305zm-317.51 213.508V175.185l142.739 81.205-142.739 81.201z"></path></svg></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="n-footer-information ">
                        <h5>THÔNG TIN LIÊN HỆ</h5>
                        <div class="n-footer-information-location">
                            <a href="#">
                                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="map-marker-alt" class="svg-inline--fa fa-map-marker-alt fa-w-12 mr-1" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path fill="currentColor" d="M172.268 501.67C26.97 291.031 0 269.413 0 192 0 85.961 85.961 0 192 0s192 85.961 192 192c0 77.413-26.97 99.031-172.268 309.67-9.535 13.774-29.93 13.773-39.464 0zM192 272c44.183 0 80-35.817 80-80s-35.817-80-80-80-80 35.817-80 80 35.817 80 80 80z"></path></svg>
                                <span><?=$res_setting['address'] ?></span>
                            </a>
                        </div>
                        <div class="n-footer-information-location">
                            <a href="#">
                                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="phone" class="svg-inline--fa fa-phone fa-w-16 mr-1" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M493.4 24.6l-104-24c-11.3-2.6-22.9 3.3-27.5 13.9l-48 112c-4.2 9.8-1.4 21.3 6.9 28l60.6 49.6c-36 76.7-98.9 140.5-177.2 177.2l-49.6-60.6c-6.8-8.3-18.2-11.1-28-6.9l-112 48C3.9 366.5-2 378.1.6 389.4l24 104C27.1 504.2 36.7 512 48 512c256.1 0 464-207.5 464-464 0-11.2-7.7-20.9-18.6-23.4z"></path></svg>
                                <span><?=$res_setting['contact']?> </span>
                            </a>
                        </div>
                        <div class="n-footer-information-location">
                            <a href="#">
                                <svg aria-hidden="true" focusable="false" data-prefix="far" data-icon="clock" class="svg-inline--fa fa-clock fa-w-16 mr-1" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm0 448c-110.5 0-200-89.5-200-200S145.5 56 256 56s200 89.5 200 200-89.5 200-200 200zm61.8-104.4l-84.9-61.7c-3.1-2.3-4.9-5.9-4.9-9.7V116c0-6.6 5.4-12 12-12h32c6.6 0 12 5.4 12 12v141.7l66.8 48.6c5.4 3.9 6.5 11.4 2.6 16.8L334.6 349c-3.9 5.3-11.4 6.5-16.8 2.6z"></path></svg>
                                <span><?=$res_setting['working_time']?></span>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="n-footer-fanpage">
                        <h5>
                            FANPAGE FACEBOOK
                        </h5>
                        <iframe src="<?=$res_social_setting['facebook_plugin']?>" width="340" height="150" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>                    </div>
                </div>
            </div>
            <div class="n-footer-form position-absolute " style="background-image:url(../home/images/img-9.png)">
                <h2>
                    Đăng ký nhận tư vẫn từ
                </h2>
                <h3>ANH NGỮ Ms.Châu</h3>
                <form method="post">
                    <input type="text" name="name" placeholder="Họ và tên">
                    <input type="number" name="phone" placeholder="Số điện thoại">
                    <input type="text" name="email" placeholder="Email của bạn">
                    <button type="submit" name="send">Gửi</button>
                </form>
            </div>
        </div>
    </div>
</footer>
<!-- Javascript -->
<script src="../build/js/jquery.min.js "></script>
<script src="../build/js/bootstrap.min.js "></script>
<!-- Flickity -->
<script src="../build/js/flickity.pkgd.min.js "></script>
<!-- AOS -->
<script src="../build/js/main.js "></script>
</body>

</html>