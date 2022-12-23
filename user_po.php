<?php
    ob_start();
    session_start();
    include_once('connect_db.php');
    
    date_default_timezone_set("Asia/Bangkok");
   
    if (isset($_REQUEST['btn_po_insert'])) {
        try {
        $po_auser = $_REQUEST['txt_po_user_add'];
        $po_adate = $_REQUEST['txt_po_date_add'];
        $po_asite = $_REQUEST['txt_po_site_add'];
        $po_lel = "b";
        
        $image_file = $_FILES['txt_file']['name'];
            $type = $_FILES['txt_file']['type'];
            $size = $_FILES['txt_file']['size'];
            $temp = $_FILES['txt_file']['tmp_name'];
        
            $path = " order_po_images/" . $image_file; // set upload folder path

         if (empty($po_adate)) {
            $errorMsg = "กรุณาใส่ข้อมูล วันที่";
        }else if (empty($po_asite)) {
            $errorMsg = "กรุณาใส่ข้อมูล เลือกไซต์งาน";
        }else if (empty($image_file)) {
            $errorMsg = "กรุณาใส่ข้อมูล รูปภาพใบสั่งซื้อ";
        }else if ($type == "image/jpg" || $type == 'image/jpeg' || $type == "image/png" || $type == "image/gif") {
            if (!file_exists($path)) {  // check file ตรงที่หรือป่าว

                
                if ($size < 5000000) { // check file size  ขนาด 5MB
                   
                    move_uploaded_file($temp, 'order_po_images/'.$image_file); // move upload file temperory directory to your upload folder
                } else {
                    $errorMsg = "ไซต์มีขนาดมากกว่า 5MB "; // error message file size larger than 5mb
                }


            } else {

                $errorMsg = "อัพโหลดผิดพบาด"; // error message file not exists your upload folder path
            }


        } else {
            
            $errorMsg = "โปรดเช็คว่าเป็นรูปภาพประเภท JPG, JPEG, PNG & GIF ";
        }

        if (!isset($errorMsg)) {
            $insert_stmt = $db->prepare("INSERT INTO po(po_user, po_date, po_site, po_image , po_level) VALUES (:mus, :mda, :msi, :mim, :lel)");
            $insert_stmt->bindParam(':mus', $po_auser);
            $insert_stmt->bindParam(':mda', $po_adate);
            $insert_stmt->bindParam(':msi', $po_asite);
            $insert_stmt->bindParam(':mim', $image_file);
            $insert_stmt->bindParam(':lel', $po_lel);
            
            
            if ($insert_stmt->execute()) {
                $insertMsg = "แจ้งการสั่งซื้อ สำเร็จ";
                header("refresh:3;user_list.php");
                
                
            }
        }//as

    } catch(PDOException $e) {
        $e->getMessage();
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>ptksystem user </title>
  <!-- Favicon icon -->
  <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png">
  <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <!-- Daterange picker -->
    <link href="./vendor/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- Clockpicker -->
    <link href="./vendor/clockpicker/css/bootstrap-clockpicker.min.css" rel="stylesheet">
    <!-- asColorpicker -->
    <link href="./vendor/jquery-asColorPicker/css/asColorPicker.min.css" rel="stylesheet">
    <!-- Material color picker -->
    <link href="./vendor/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet">
    <!-- Pick date -->
    <link rel="stylesheet" href="./vendor/pickadate/themes/default.css">
    <link rel="stylesheet" href="./vendor/pickadate/themes/default.date.css">
    <!-- Custom Stylesheet -->
    <link href="./css/style.css" rel="stylesheet">
    



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
            <a href="user_list.php" class="brand-logo">
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
                        <h3 class="mt-2">โฟร์แมน : <?php echo $_SESSION['user_login']; ?></h3>
                        </div> 

                        <ul class="navbar-nav header-right">
                            <li class="nav-item dropdown header-profile">
                                <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                                    <i class="mdi mdi-account"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="logout.php" class="dropdown-item">
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
                    
                    <li><a href="user_list.php" aria-expanded="false"><i
                                class="icon icon-layout-25"></i><span class="nav-text">รายการวัสดุอุปกรณ์</span></a>
                    </li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                                class="icon icon-app-store"></i><span class="nav-text">จัดทำรายการต่างๆ</span></a>
                        <ul aria-expanded="false">
                            <li><a href="user_po.php">สั่งซื้อเร่งด่วน</a></li>
                            <li><a href="user_stockout.php">ยืม - อุปกรณ์</a></li>
                            <li><a href="user_stockin.php">คืน - อุปกรณ์</a></li>
                            <li><a href="user_stockin_w.php">เบิก - วัสดุ</a></li>
                        </ul>
                    </li>
                    
                    <li><a  href="user_status.php" aria-expanded="false"><i
                                class="icon icon-single-copy-06"></i><span class="nav-text">รายการที่กำลังเดินงานอยู่</span></a>
                        
                    </li>
                    <li><a  href="user_finish.php" aria-expanded="false"><i
                                class="icon icon-single-copy-06"></i><span class="nav-text">รายการที่เสร็จสิ้น</span></a>
                        
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
                            <h3>สั่งซื้อวัสดุอุปกรณ์</h3>
                            <span class="ml-1">แจ้งการสั่งซื้อวัสดุอุปกรณ์</span>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        
                    </div>
                </div>
                <!-- row -->
                <div class="row">
                    <div class="col-12">
                    <div class="card">
                    <div class="card-header">

                                
                            </div>   
                            
                                    <form id="contact-form" method="post" enctype="multipart/form-data">
                                    <div class="form-group ">
                                    <div class="col-md-12 mt-4">
                                        <label>ชื่อ โฟร์แมน</label>
                                            <input type="text" class="form-control mt-3" name="txt_po_user_add"  id="comment" value="<?php echo $_SESSION['user_login']; ?>" ></input>
                                            </div>            
                                        </div>
                                       
                                        <br>
                                        <div class="form-group ">
                                        <div class="col-md-12 mt-4">
                                        <label>วันที่แจ้งการสั่งซื้อ</label>
                                        <input type="text" class="form-control mt-3" name="txt_po_date_add" readonly  id="comment" value="<?php echo date('d-m-y H:i:s'); ?>" ></input>
                                            </div>            
                                        </div>
                                        <br>


                                        <div class="form-group">
                                        <label for="type" class="col-sm-3 control-label">เลือกไซต์งาน</label>
                                            <div class="col-sm-12 mt-4">  
                                                
                                             <select name="txt_po_site_add" class="form-control">
                                             <?php 
                                             $select_material = $db->prepare("SELECT * FROM site ");
                                             $select_material->execute(); ?>
                                                <option value="" selected="selected">- เลือกไซต์งาน -</option>
                                    
                                             <?php 

                                            while ($row = $select_material->fetch(PDO::FETCH_ASSOC)) {
                                            ?>
                                                
                                                <?php  
                                                            if ($row["site_status"] != 'a'){
                                                            ?>

                                                 <option value="<?php echo $row["site_name"]; ?>"><?php echo $row["site_name"]; ?></option>       

                                                 <?php } ?>
                                                 <?php } ?>
                                                     </select>              

                                             </div>
                                         </div>

<br>
                                         <div class="form-group">
                                        <div class="col-md-12 mt-4">
                                        <label>รูปภาพรายการสั่งซื้อ</label>  <font color="red">    *อัพโหลดได้เฉพาะ .jpeg , .jpg , .png </font><br>
                                            <input type="file" class="mt-3" name="txt_file" accept="image/jpeg, image/png, image/jpg" ></input>
                                            
                                            </div>            
                                        </div>

                                          <br>

                                        <div class="form-group text-center">

                                            <div class="col-md-12 mt-3">
                                                <input type="submit" name="btn_po_insert" class="btn btn-success" value="แจ้งการสั่งซื้อ">
                                                

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
         if (isset($insertMsg)) {
    ?>
        <div class="alert alert-success">
        <strong><font color=#000000>สำเร็จ! <?php echo $insertMsg; ?></font></strong>
        </div>
    <?php } ?>

                    </div>
                    </div>
                </div>


                

              
                    

            </div>
        </div>

        

         <!-- /# ส่วนปิดคอนเทนเนอร์ -->

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
    <!-- Required vendors -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="./vendor/global/global.min.js"></script>
    <script src="./js/quixnav-init.js"></script>
    <script src="./js/custom.min.js"></script>
    


    <!-- Daterangepicker -->
    <!-- momment js is must -->
    <script src="./vendor/moment/moment.min.js"></script>
    <script src="./vendor/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- clockpicker -->
    <script src="./vendor/clockpicker/js/bootstrap-clockpicker.min.js"></script>
    <!-- asColorPicker -->
    <script src="./vendor/jquery-asColor/jquery-asColor.min.js"></script>
    <script src="./vendor/jquery-asGradient/jquery-asGradient.min.js"></script>
    <script src="./vendor/jquery-asColorPicker/js/jquery-asColorPicker.min.js"></script>
    <!-- Material color picker -->
    <script src="./vendor/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
    <!-- pickdate -->
    <script src="./vendor/pickadate/picker.js"></script>
    <script src="./vendor/pickadate/picker.time.js"></script>
    <script src="./vendor/pickadate/picker.date.js"></script>



    <!-- Daterangepicker -->
    <script src="./js/plugins-init/bs-daterange-picker-init.js"></script>
    <!-- Clockpicker init -->
    <script src="./js/plugins-init/clock-picker-init.js"></script>
    <!-- asColorPicker init -->
    <script src="./js/plugins-init/jquery-asColorPicker.init.js"></script>
    <!-- Material color picker init -->
    <script src="./js/plugins-init/material-date-picker-init.js"></script>
    <!-- Pickdate -->
    <script src="./js/plugins-init/pickadate-init.js"></script>

    
</body>

</html>