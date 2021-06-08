<?php
include 'header1.php';
?>
<?php
if (isset($_GET['pageno'])) {
    $pageno = $_GET['pageno'];
} else {
    $pageno = 1;
}
$no_of_records_per_page = 10;
$offset = ($pageno - 1) * $no_of_records_per_page;
$total_pages_sql = "SELECT COUNT(*) FROM `tintuc`";
$result = mysqli_query($conn, $total_pages_sql);
$total_rows = mysqli_fetch_array($result)[0];
$total_pages = ceil($total_rows / $no_of_records_per_page);

//
$sql = "SELECT * FROM `tintuc` LIMIT $offset, $no_of_records_per_page";
$res_data  = mysqli_query($conn, $sql);
?>
    <main>
        <div class="n-contact-image">
            <img src="../home/images/1596684326158.jpg" alt="">
        </div>
        <div class="n-newsevent">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <?php
                        while ($row = mysqli_fetch_array($res_data)) {
                            ?>
                            <div class="n-newsevent-left mb-4">
                                <?php echo '<a href="Detail.php?id=' . $row['id'] . '"><img src="data:image/jpeg;base64,' . base64_encode($row['thumbnail']) . '" class="img-fluid  img-circle profile_img avatar" /></a>';
                                ?>
                                <h3>
                                    <a href="Detail.php?id=<?= $row['id'] ?>"><?= $row["TenTT"] ?></a>
                                </h3>
                                <h4>18-03-2021 | 35 lượt xem</h4>
                                <h5>Chương trình học bổng tháng 3 chính thức được khởi động.</h5>
                            </div>
                            <?php
                        }
                        mysqli_close($conn);
                        ?>
                        <div class="n-newsevent">
                            <ul class="pagination">

                                <li class="<?php if ($pageno <= 1) {
                                    echo 'disabled';
                                } ?>">
                                    <a href="<?php if ($pageno <= 1) {
                                        echo '#';
                                    } else {
                                        echo "?pageno=" . ($pageno - 1);
                                    } ?>">Sau</a>
                                </li>
                                       <?php
                                       for ($i = 1; $i <= $total_pages; $i++) {
                                           ?>
                                               <li>
                                                   <a href="?pageno=<?php echo $i ?>">
                                                       <?php echo $i?>
                                                   </a>
                                               </li>
                                           <?php
                                       }
                                       ?>



                                <li class="<?php if ($pageno >= $total_pages) {
                                    echo 'disabled';
                                } ?>">
                                    <a href="<?php if ($pageno >= $total_pages) {
                                        echo '#';
                                    } else {
                                        echo "?pageno=" . ($pageno + 1);
                                    } ?>">Tiếp</a>
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