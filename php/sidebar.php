<?php
function url(){
    return sprintf(
        "%s://%s",
        isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
        $_SERVER['SERVER_NAME']
    );
}
?>

<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <h3>General</h3>
        <ul class="nav side-menu">
            <li><a href="index.php"><i class="fa fa-home"></i> Home </a>
            </li>
            <li><a> Nhân Viên <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="<?php echo url() ?>/administration/form_staff.php">Tạo Nhân Viên</a></li>
                    <li><a href="<?php echo url() ?>/administration/contacts.php">Tất Cả Nhân Viên</a></li>
                </ul>
            </li>
            <li><a> Lớp <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="<?php echo url() ?>/administration/form_class.php">Lớp</a></li>
                    <li><a href="<?php echo url() ?>/administration/all_class.php">Tất Cả Lớp</a></li>
                </ul>
            </li>
            <li><a> Phòng Học <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="<?php echo url() ?>/administration/form_room.php">Thêm Phòng</a></li>
                    <li><a href="<?php echo url() ?>/administration/all_room.php">Tất Cả Phòng</a></li>
                </ul>
            </li>
            <li><a> Chứng chỉ đang đào tạo <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="<?php echo url() ?>/administration/form_degree.php">Tạo Chứng Chỉ</a></li>
                    <li><a href="<?php echo url() ?>/administration/all_degree.php">Tất Cả Chứng Chỉ</a></li>
                </ul>
            </li>
            <li><a> Khoá Học <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="<?php echo url() ?>/administration/form_courses.php">Tạo Khoá Học</a></li>
                    <li><a href="<?php echo url() ?>/administration/all_courses.php">Tất Cả Khoá Học</a></li>
                </ul>
            </li>
            <li><a> Tài Liệu <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="<?php echo url() ?>/administration/form_document.php">Nhập tài liệu</a></li>
                    <li><a href="<?php echo url() ?>/administration/all_document.php">Tất Cả Tài liệu</a></li>
                </ul>
            </li>
            <li><a> Tin Tức <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="<?php echo url() ?>/administration/form_news.php">Tạo Tin Tức</a></li>
                    <li><a href="<?php echo url() ?>/administration/all_news.php">Tất Cả Tin Tức</a></li>
                </ul>
            </li>
        </ul>
    </div>

</div>
<!-- /sidebar menu -->

</div>
