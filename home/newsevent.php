<?php
include 'header1.php';
?>
<?php
$sql_user3 = "SELECT * FROM `tintuc` ";
$res_user3 = mysqli_query($conn,$sql_user3);

?>
<main>
    <div class="n-contact-image">
        <img src="../home/images/1596684326158.jpg" alt="">
    </div>
    <div class="n-newsevent">
        <div class="container">
            <div class="row">
                <div class="col-lg-8" >
                    <?php
                    while ($row = mysqli_fetch_array($res_user3)) {
                    ?>
                    <div class="n-newsevent-left mb-4">
                        <?php echo '<a href="Detail.php?id='.$row['id'].'"><img src="data:image/jpeg;base64,'.base64_encode($row['thumbnail'] ).'" class="img-fluid  img-circle profile_img avatar" /></a>';
                        ?>
                            <h3>
                                <a href="Detail.php?id=<?=$row['id']?>"><?=$row["TenTT"]?></a>
                            </h3>
                            <h4>18-03-2021 | 35 lượt xem</h4>
                            <h5>Chương trình học bổng tháng 3 chính thức được khởi động.</h5>
                    </div>
                        <?php
                    }
                    ?>
                    <div class="n-newsevent">
                        <ul class="pagination">
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">4</a></li>
                            <li class="page-item"><a class="page-link" href="#">5</a></li>

                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        </ul>
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


