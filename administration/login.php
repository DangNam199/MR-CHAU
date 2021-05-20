<?php
    include '../php/connect.php';
    session_start();
    if ( isset($_POST['submit'])){
        $user = $_POST['user'];
        $password = $_POST['password'];
        $password = md5($password);
        $sql = "SELECT email, password, level_id FROM `nhanvien` WHERE email='$user' and password='$password'";
        $res = mysqli_query($conn, $sql);
        echo $sql;
        if (mysqli_num_rows($res) == 1){
            header("location: ../administration/index.php");
            $_SESSION['user']=$user;
            $_SESSION['level']=mysqli_fetch_assoc($res)['level'];
        }
        else if (mysqli_num_rows($res) == 0){
          $sql_student = "SELECT email, password FROM `hocvien` WHERE email='$user' and password='$password'";
          $res_student = mysqli_query($conn, $sql_student);
            if ($res_student){
            if (mysqli_num_rows($res_student) == 1){
                $row_student = mysqli_fetch_assoc($res_student);
                $_SESSION['level'] = 'hocvien';
                $_SESSION['user'] = $row_student['email'];
                header("location: ../student/index.php");
              }
            }
          
          else {
              echo $sql_student;  
          }
      }
        else {
            $_SESSION['message'] = 'Wrong email or password';   
        }
      }
    
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Trung tâm </title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="../vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form  method="POST" >
              <h1>Đăng Nhập</h1>
              <?php 
                if (isset($_SESSION["message"])){
                  echo "<p>" . $_SESSION["message"] . "</p>";
                  unset($_SESSION["message"]); 
                }
              ?>
              <div>
                <input type="text" class="form-control" placeholder="Username" required="" name="user" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" required="" name="password" />
              </div>
              <div>
                <button class="btn btn-default submit" href="index.html" type="submit" name="submit" >Log in</button>
              </div>

              <div class="clearfix"></div>

            </form>
          </section>
        </div>

      </div>
    </div>
  </body>
</html>
