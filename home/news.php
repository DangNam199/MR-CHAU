
<?php
include 'header.php';
?>
<?php
$hostname = '127.0.0.1';
$username = 'root';
$password = '';
$dbname = "doan";
$conn = mysqli_connect($hostname, $username, $password,$dbname);
$sql_user4 = "SELECT * FROM `tintuc` ";
$res_user4 = mysqli_query($conn,$sql_user4);
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
<div class="container-fluid bg-white py-2">
    <div class="container mt-5">
        <div class="row bg-light">
            <?php
            while ($row = mysqli_fetch_array($res_user4)) {
            ?>
        <?php
                echo '<div class="col-md-6 mb-5 border">';
            echo '<a href="detailnew.php?id='.$row['id'].'"><img width="150" src="data:image/jpeg;base64,'.base64_encode($row['thumbnail'] ).'" class="img-fluid  img-circle profile_img avatar" /></a>';
                echo '</div>';
            ?>
                <div class="col-md-6  border-bottom mb-5">
                    <h2><a href="detailnew.php?id=<?=$row['id']?>"><?=$row["TenTT"]?></a></h2>
                </div>
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
<?php
include 'footer.php';
?>