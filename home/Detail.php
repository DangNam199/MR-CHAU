<?php
include 'header1.php';
?>
<?php
$hostname = '127.0.0.1';
$username = 'root';
$password = '';
$dbname = "sd";
$conn = mysqli_connect($hostname, $username, $password,$dbname);

$id = $_GET['id'];
if (isset($_GET['id'])){
    $sql_user4 = "SELECT * FROM `tintuc` WHERE id = '$id'";
    $res_user4 = mysqli_query($conn,$sql_user4);
    if ($res_user4->num_rows > 0) {
        $row = $res_user4->fetch_assoc();
    }
}
?>
<main>
    <div class="n-contact-image">
        <img src="../home/images/1596684326158.jpg" alt="">
    </div>
    <div class="n-newsevent">
        <div class="container">
            <div class="row">
                <div class="col-lg-8" >
                    <div class="n-detail-content">
                        <h2>
                            <a class="title" href="Detail.php?id=<?=$row['id']?>"><?=$row["TenTT"]?></a>
                        </h2>
                        <div class="n-detail-content-news">
                            <p>
                                <?php
                                echo '<a href="Detail.php?id='.$row['id'].'"><img src="data:image/jpeg;base64,'.base64_encode($row['thumbnail'] ).'" class="img-fluid  img-circle profile_img avatar" /></a>';
                                ?>
                            </p>
                            <p>&nbsp;</p>
                            <p>
                                 <?=$row['NoiDungTT']?>
                            </p>
                        </div>
                        <div class="n-detail-content-tagbox">
                            <p>
                                <a href="#">#</a>
                            </p>
                        </div>
                        <div class="n-detail-content-related">
                            <h2>Bài viết nên đọc</h2>
                                <div class="row">
                                    <div class="col-4">
                                     <div class="n-detail-content-related-content">
                                         <a href="#"><img src="../home/images/1569581528792.png" alt=""></a>
                                         <a href="#"> <h3 class="mt-1 mb-1">
                                             Cách sử dụng double,twice thập phân trong so sánh
                                         </h3></a>
                                         <p><a href="#">27/09/2019 | 4623 lượt xem</a></p>
                                     </div>

                                    </div>
                                    <div class="col-4">
                                        <div class="n-detail-content-related-content">
                                            <a href="#"><img src="../home/images/1569581528792.png" alt=""></a>
                                            <a href="#"> <h3 class="mt-1 mb-1">
                                                Cách sử dụng double,twice thập phân trong so sánh
                                            </h3></a>
                                            <p><a href="#">27/09/2019 | 4623 lượt xem</a></p>
                                        </div>

                                    </div>
                                    <div class="col-4">
                                        <div class="n-detail-content-related-content">
                                            <a href="#"><img src="../home/images/1569581528792.png" alt=""></a>
                                            <a href="#"> <h3 class="mt-1 mb-1">
                                                Cách sử dụng double,twice thập phân trong so sánh
                                            </h3></a>
                                            <p><a href="#">27/09/2019 | 4623 lượt xem</a></p>
                                        </div>

                                    </div>

                                </div>
                        </div>
                    </div>
                </div>
                <?php
                    include 'sidebar.php';
                ?>
            </div>
        </div>
    </div>
    <div class="n-contact-btn"></div>
</main>
<?php
include 'footer1.php';
?>


