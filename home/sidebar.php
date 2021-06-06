<?php
if(isset($_POST['submit'])){
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

<div class="col-lg-4">
    <div class="n-newsevent-right">
        <div class="n-newsevent-right-cake">
            <ul>
                <li >
                    <a href="#">Các khóa học tại ATHENA</a>
                </li>
                <li >
                    <a href="#">Các khóa học tại ATHENA</a>
                </li>
                <li >
                    <a href="#">Các khóa học tại ATHENA</a>
                </li>
            </ul>
        </div>
        <div class="n-newsevent-right-box">
            <h2>
                Các khóa học khác
            </h2>
            <div class="n-newsevent-right-box-content mb-5">
                <div class="row">
                    <div class="col-4">
                        <div class="n-newsevent-right-box-content-left">
                            <a href="#">
                                <img src="../home/images/1594367462699.png" alt="">
                            </a>
                        </div>

                    </div>
                    <div class="col-8">
                        <div class="n-newsevent-right-box-content-right">
                            <h3>
                                <a href="#">Khóa học TOEIC 0 - 500+ từ mất gốc</a>
                            </h3>
                            <h4>01/01/1970</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="n-newsevent-right-box-content mb-5">
                <div class="row">
                    <div class="col-4">
                        <div class="n-newsevent-right-box-content-left">
                            <a href="#">
                                <img src="../home/images/1594367462699.png" alt="">
                            </a>
                        </div>

                    </div>
                    <div class="col-8">
                        <div class="n-newsevent-right-box-content-right">
                            <h3>
                                <a href="#">Khóa học TOEIC 0 - 500+ từ mất gốc</a>
                            </h3>
                            <h4>01/01/1970</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="n-newsevent-right-box-content">
                <div class="row">
                    <div class="col-4">
                        <div class="n-newsevent-right-box-content-left">
                            <a href="#">
                                <img src="../home/images/1594367462699.png" alt="">
                            </a>
                        </div>

                    </div>
                    <div class="col-8">
                        <div class="n-newsevent-right-box-content-right">
                            <h3>
                                <a href="#">Khóa học TOEIC 0 - 500+ từ mất gốc</a>
                            </h3>
                            <h4>01/01/1970</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="n-newsevent-right-signup mt-5">
            <h2>Đăng ký nhận tài liệu</h2>
            <form action="">
                <input type="text" name="name" placeholder="Họ và tên">
                <input type="number" name="phone" placeholder="Số điện thoại">
                <input type="email" name="email" placeholder="Email">
                <button type="submit" name="submit" value="submit">đăng ký ngay</button>
            </form>
        </div>
        <div class="n-newsevent-right-image">
            <a href="#">
                <img src="../home/images/img-15.png" alt="">
            </a>
            <a href="#">
                <img src="../home/images/athena-banner.jpg" alt="">
            </a>
        </div>
    </div>
</div>
