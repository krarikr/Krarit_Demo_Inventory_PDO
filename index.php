<?php
    session_start();
    include ('connect_db.php');
?>

<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>ptksystem</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png">
    <link href="./css/style.css" rel="stylesheet">

    <style>
    body {
	background-image: url("https://cdn-cms.pgimgs.com/static/2019/01/Construction-site-4.jpeg");
   
    } 


</style>

</head>

<body class="h-100">
    <div class="authincation h-100">
        <div class="container-fluid h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                
                            <div class="auth-form">
                                    <h4 class="text-center mb-4">กรุณาใส่ข้อมูลเข้าระบบ PTK-ICS</h4>

                                    <form action="db_login.php" method="post">

                                        <div class="form-group" >
                                            <label><strong>ไอดีผู้ใช้งาน</strong></label>
                                            <input type="text" class="form-control" name="txt_username" placeholder="ไอดีใช้งาน">
                                        </div>
                                        <div class="form-group">
                                            <label><strong>รหัสผ่าน</strong></label>
                                            <input type="password" class="form-control" name="txt_password" placeholder="รหัสผ่าน">
                                        </div>

                                        <div class="form-group">
                                            <label for="type" class="col-sm-3 control-label">ประเภทผู้ใช้งาน</label>
                                                <div class="col-sm-12">
                                                    <select name="txt_role" class="form-control">
                                                        <option value="" selected="selected">- ประเภทผู้ใช้ -</option>
                                                        <option value="a">ผู้ดูแลระบบ</option>
                                                        <option value="u">โฟร์แมน</option>
                                                    </select>
                                                </div>
                                        </div>

                                        <br>
                                        <div class="text-center">
                                            <button type="submit" name="btn_login" class="btn btn-primary btn-block">เข้าสู่ระบบ</button>
                                        </div>
                                    </form>

                                    <?php if(isset($_SESSION['success'])) : ?>
            <div class="alert alert-success">
                
                    <?php 
                        echo $_SESSION['success'];
                        unset($_SESSION['success']);
                    ?>
                
            </div>
        <?php endif ?>

        <?php if(isset($_SESSION['error'])) : ?>
            <div class="alert alert-danger">
            <center><strong><font color=#000000 >
                    <?php 
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                    ?>
                </font></strong></center>
            </div>
        <?php endif ?>

                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="./vendor/global/global.min.js"></script>
    <script src="./js/quixnav-init.js"></script>
    <script src="./js/custom.min.js"></script>

</body>

</html>