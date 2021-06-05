
<?php
include '../php/connect.php';
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Trung tâm ngoại ngữ</title>
    <link rel="stylesheet" href="../build/css/bootstrap.min.css" >
    <script src="../build/js/jquery-3.3.1.slim.min.js" ></script>
    <script src="../build/js/popper.min.js"  ></script>
    <script src="../build/js/bootstrap.min.js" ></script>
    <script src="../build/js/jquery.min.js"></script>
    <link rel="stylesheet" href="../build/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../build/css/owl.theme.default.min.css">
    <link rel="shortcut icon" type="image/png" href="img/nasao-logo1.png">
    <link rel="stylesheet" href="../build/css/all.css"  crossorigin="anonymous">

    <style>
        .nav-link{
            margin: 0rem 1rem;
        }
        .card, .card-header:first-child, .list-group-item:first-child, .list-group-item:last-child {
            border-radius: 0;
        }
        .border-none{
            border: none;
        }
        body{
            background: #f7f7f7;
        }

        .breadcrumb {
            background-color: #f7f7f7;
            /* box-shadow: 0 2px 3px rgb(209, 209, 209); */
        }
    </style>

    <script>
        $(document).ready(function(){
            $(window).scroll(function(){
                if($(this).scrollTop() > 40){
                    document.getElementById("logo").style.height = "35px";
                } else{
                    document.getElementById("logo").style.height = "50px";
                }
            });
        });
    </script>
</head>
<body>

<header class="blog-header bg-dark py-1">
    <div class="d-flex justify-content-between align-items-center">
        <a class="text-white ml-2" href="../administration/login.php"> Đăng nhập</a>
        <div>
            <a class="text-white mr-4" href="#"><i class="fa fa-phone"></i> Hotline: 0398060479</a>
            <a class="text-white" href="#"><i class="fa fa-clock-o"></i> Time: 8h - 18h</a>
        </div>
    </div>
</header>
