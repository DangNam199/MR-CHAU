

<?php
include 'header.php';
?>
<?php
if(isset($_POST['submit'])){
    $usermes = $_POST['name'];
    $Email= $_POST['email'];
    $Phone = $_POST['phone'];
    $Ghichu = $_POST['content'];
    if($usermes==""||$Email==""||$Phone==""||$Ghichu==""){
        echo"<script> alert('bạn hãy nhập đầy đủ thông tin yêu cầu!'); </script>";
    }
    else{
        if($conn-> query("INSERT INTO lienhe(hoten,email,sodienthoai,ghichu, date ,state) VALUES ('$usermes','$Email','$Phone','$Ghichu', now(),'draft')")){
            echo"<script>alert('Gửi thành công !')
                   </script>";
        }
        else{
            echo"<script> alert('Gửi thất bại !!'); </script>";
        }

    }
}
$conn->close();

?>



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

            <li class="nav-item">
                <a class="nav-link text-muted mx-1 hover-a" href="contact_us_form.php">Liên hệ</a>
            </li>

        </ul>

    </div>
</nav>
<div class="container-fluid py-2">
    <div class="container">
        <ol class="breadcrumb mb-0 p-0 pb-2">
            <li class="breadcrumb-item"><a href="http://localhost/assignment_web204/home">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Liên hệ</li>
        </ol>

        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.827622207749!2d105.80170731432445!3d21.03958218599249!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab3e638834e5%3A0xc0757decf12a8bf4!2zMTUgxJDDtG5nIFF1YW4sIFF1YW4gSG9hLCBD4bqndSBHaeG6pXksIEjDoCBO4buZaSwgVmlldG5hbQ!5e0!3m2!1sen!2s!4v1542356725898" width="100%" height="250" frameborder="0" style="border:0" allowfullscreen></iframe>                     <div class="row py-4">
            <div class="col-md-3">
                <p>Địa chỉ: Hải Phòng</p>
                <p>Phone: 11111111111</p>
                <p>Email:  mrchau@gmail.com</p>
            </div>
            <div class="col-md-5">
                <form method="post" >
                    <div class="form-group">
                        <input type="text" class="form-control" name="name" placeholder="Nhập họ tên">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="email" placeholder="Nhập email">
                    </div>
                    <div class="form-group">
                        <input type="text" name="phone" class="form-control" placeholder="Nhập sô điện thoại">
                    </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <textarea name="content"  class="form-control" id="" rows="5" placeholder="Nhập ghi chú"></textarea>
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </form>
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
<?php
include 'footer.php';
?>