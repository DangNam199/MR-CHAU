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

<div class="col-lg-4">
    <div class="n-newsevent-right">


        <div class="n-newsevent-right-signup mt-5">
            <h2>Đăng ký nhận tài liệu</h2>
            <form method="post">
                <input type="text"  class="form-control" name="name" placeholder="Họ và tên">
                <input type="number" class="form-control"  name="phone" placeholder="Số điện thoại">
                <input type="email" class="form-control" name="email" placeholder="Email">
                <button type="submit"  name="submit" value="submit">đăng ký ngay</button>
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
