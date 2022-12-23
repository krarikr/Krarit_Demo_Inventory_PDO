<?php
    ob_start();
    include_once('connect_db.php');

    if (isset($_REQUEST['user_update_id'])) {
        try {
            $id = $_REQUEST['user_update_id'];
            $select_stmt = $db->prepare("SELECT * FROM user_ptk WHERE id = :id");
            $select_stmt->bindParam(':id', $id);
            $select_stmt->execute();
            $row = $select_stmt->fetch(PDO::FETCH_ASSOC);
            extract($row);
        } catch(PDOException $e) {
            $e->getMessage();
        }
    }

    if (isset($_REQUEST['btn_user_update'])) { 
        $user_name_up = $_REQUEST['txt_user_name_up'];
        $user_fullname_up = $_REQUEST['txt_user_fullname_up'];
        $user_pass_up = $_REQUEST['txt_user_pass_up'];

        if (empty( $user_name_up)) {
            $errorMsg = "กรุณาใส่ ไอดี โฟร์แมน";
        }else
        if (empty( $user_fullname_up)) {
            $errorMsg = "กรุณาใส่ ชื่อ โฟร์แมน";
        }else
        if (empty( $user_pass_up)) {
            $errorMsg = "กรุณาใส่ รหัสผ่าน โฟร์แมน";
        }else {
            try {
                if (!isset($errorMsg)) {
                    $user_update = $db->prepare("UPDATE user_ptk SET user_name = :uname_up, user_fullname = :ufullname_up, user_password = :upass_up WHERE id = :id");
                    $user_update->bindParam(':uname_up', $user_name_up);
                    $user_update->bindParam(':ufullname_up', $user_fullname_up);
                    $user_update->bindParam(':upass_up', $user_pass_up);
                    $user_update->bindParam(':id', $id);

                    if ($user_update->execute()) {
                        $updateMsg = "กำลังอัพเดตข้อมูล สักครู่...";
                        header("refresh:2;admin_pro.php");
                    }
                }
            } catch(PDOException $e) {
                echo $e->getMessage();
            }
        }
    }


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>ptksystem_user_profile </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png">
    <!-- Datatable -->
    <link href="./vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
    <!-- Custom Stylesheet -->
    <link href="./css/style.css" rel="stylesheet">
    <link href="./css/h3head.css" rel="stylesheet">



</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="admin_pro.php" class="brand-logo">
                <img class="logo-abbr" src="./images/logo_ptk.png" height="40" alt="">
                <img class="logo-compact" src="./images/brand_name.png" alt=""> 
                <img class="brand-title" src="./images/brand_name.png" height="75%" alt="">
            </a>

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <!-- ส่วนค้นหา -->
                        <div class="header-left">
                        <h3 class="mt-2">ผู้ดูแลระบบ</h3>
                           
                        </div> 

                        <ul class="navbar-nav header-right">
                            <li class="nav-item dropdown header-profile">
                                <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                                    <i class="mdi mdi-account"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="./index.php" class="dropdown-item">
                                        <i class="icon-key"></i>
                                        <span class="ml-2">Logout </span>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="quixnav">
            <div class="quixnav-scroll">
            <ul class="metismenu" id="menu">
                     <li class="nav-label first"><h3><font color=#44ECF3>Main Menu</font></h3></li>
                    <li><a href="admin_pro.php" aria-expanded="false"><i
                                class="icon icon-single-04"></i><span class="nav-text">จัดการข้อมูลโฟร์แมน</span></a>
                    </li>
                    <li><a href="admin_mat.php" aria-expanded="false"><i
                                class="icon icon-layout-25"></i><span class="nav-text">จัดการข้อมูลวัสดุอุปกรณ์</span></a>
                    </li>
                    <li><a  href="admin_site.php" aria-expanded="false"><i
                                class="icon icon-world-2"></i><span class="nav-text">จัดการไซต์งาน</span></a>
                        
                    </li>
                    <li><a  href="admin_order_po.php" aria-expanded="false"><i
                                class="icon icon-form"></i><span class="nav-text">รายการสั่งซื้อเร่งด่วน</span></a>
                        
                    </li>
                    <li><a  href="admin_comelist.php" aria-expanded="false"><i
                                class="icon icon-form"></i><span class="nav-text">รายการอุปกรณ์ ยืม - คืน</span></a>
                        
                    </li>
                    <li><a  href="admin_come_w.php" aria-expanded="false"><i
                                class="icon icon-form"></i><span class="nav-text">รายการเบิกวัสดุ</span></a>
                        
                    </li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                                class="icon icon-app-store"></i><span class="nav-text">ประวัติการดำเนินงาน</span></a>
                        <ul aria-expanded="false">
                            <li><a href="admin_list_sto.php">ประวัติ - ยืมอุปกรณ์</a></li>
                            <li><a href="admin_list_sti.php">ประวัติ - คืนอุปกรณ์</a></li>
                            <li><a href="admin_list_sto_w.php">ประวัติ - เบิกวัสดุ</a></li>
                            <li><a href="admin_list_po.php">ประวัติ - สั่งซื้อเร่งด่วน</a></li>
                        </ul>
                    </li>
                                 
                </ul>
            </div>


        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
            <div class="container-fluid">
            <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h3>แก้ไขข้อมูลโฟร์แมน</h3>
                            <span class="ml-1">แก้ไขข้อมูลโฟร์แมนในปัจจุบัน</span>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                    <div class="card">
                    <div class="card-header">
                                
                                
                            </div>   
                            
                                    <form method="post">

                                        <div class="form-group">
                                        <div class="col-md-12 mt-4">
                                        <span class="m1-1">ชื่อโฟร์แมน</span>
                                            <input type="text" class="form-control mt-3" name="txt_user_fullname_up"  id="comment" value="<?php echo $user_fullname; ?>" ></input>
                                            </div>            
                                        </div>

                                        <div class="form-group">
                                        <div class="col-md-12 mt-4">
                                        <span class="m1-1">ไอดีผู้ใช้งาน</span>
                                            <input type="text" class="form-control mt-3" name="txt_user_name_up" readonly  id="comment" value="<?php echo $user_name; ?>" ></input>
                                            </div>            
                                        </div>

                                        <div class="form-group">
                                        <div class="col-md-12 mt-4">
                                        <span class="m1-1">รหัสผ่าน</span>
                                            <input type="text" class="form-control mt-3" name="txt_user_pass_up"  id="comment" value="<?php echo $user_password; ?>" ></input>
                                            </div>            
                                        </div>

                                        <div class="form-group text-center">

                                            <div class="col-md-12 mt-3">
                                                <input type="submit" name="btn_user_update" class="btn btn-success" value="บันทึก">
                                                <a href="admin_pro.php" class="btn btn-danger">กลับ</a>

                                            </div>
                                         </div>
                                    </form>
                                

                            <?php 
         if (isset($errorMsg)) {
    ?>
        <div class="alert alert-danger">
            <strong><font color=#000000>ระวัง!    <?php echo $errorMsg; ?></font></strong>
        </div>
    <?php } ?>
    

    <?php 
         if (isset($updateMsg)) {
    ?>
        <div class="alert alert-success">
            <strong><font color=#000000>สำเร็จ! <?php echo $updateMsg; ?></font></strong>
        </div>
    <?php } ?>

                    </div>
                    </div>
                </div>


            </div>
        </div> <!-- /# ส่วนปิดคอนเทนเนอร์ -->

        <!--**********************************
            Content body end
        ***********************************-->


        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>บริษัทพัฒการ กรุ็ป จำกัด  1968</p>
                <p>ออกแบบโดย <a href="#" target="_blank">Phimphila Karis</a></p> 
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->

        <!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->


    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    
     <!-- Required vendors -->
     <script src="./vendor/global/global.min.js"></script>
    <script src="./js/quixnav-init.js"></script>
    <script src="./js/custom.min.js"></script>



    <!-- Datatable -->
    <script src="./vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="./js/plugins-init/datatables.init.js"></script>

</body>

</html>