<?php
    ob_start();
    session_start();
    include_once('connect_db.php');
    
    date_default_timezone_set("Asia/Bangkok");

    if (isset($_REQUEST['p_id'])) {
    $p_id = $_REQUEST['p_id'];
	$act = $_REQUEST['act'];

   // $select_stmt = $db->prepare("SELECT * FROM material WHERE id = :id");
  //  $select_stmt->bindParam(':id', $p_id);
  //  $select_stmt->execute();
  //  $row = $select_stmt->fetch(PDO::FETCH_ASSOC);

  

	if($act=='add' && !empty($p_id))
	{
		if(isset($_SESSION['carts'][$p_id]))
		{
			$num = $_SESSION['carts'][$p_id];
            $num = $num + 1;
			$_SESSION['carts'][$p_id]=$num;
		}
		else
		{
			$_SESSION['carts'][$p_id]=1;
		}
	}

	if($act=='remove' && !empty($p_id))  //ยกเลิกการสั่งซื้อ
	{
		unset($_SESSION['carts'][$p_id]);
	}

	if($act=='cancle')
	{
		unset($_SESSION['carts']);
	}

    if($act=='update')
	{
        
		$amount_array = $_POST['amount'];
		foreach($amount_array as $p_id=>$amount)
		{
			$_SESSION['carts'][$p_id]=$amount;
		}
	}

}

   // if(isset($_REQUEST['qt_id'])){

      //  $qttt = $_REQUEST['qt_id'];

    //    if($qttt >= $row["mat_amount"] ){
       //     header("refresh;db_sto_add2.php");
     //   }else{
      //      $insertEMsg = "ท่านมียอดเบิกมากกว่าของในสต็อก ค่ะ!";
            
     //   }

  //  }
	
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
    <!-- Datatable -->
    <link href="./vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
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
            <div class="container-fluid">
                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h3>เบิกวัสดุ</h3>
                            <span class="ml-1">เบิกถอนวัสดุ สำหรับใช้ในไซต์งาน</span>
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
                                <h4 class="card-title">ตารางรายการวัสดุ/อุปกรณ์</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="display table" style="min-width: 845px">
                                        <thead class="thead-primary">
                                            <tr>
                                                <th class="col-1">รหัส</th>
                                                <th class="col-1">ประเภท</th>
                                                <th class="col-4">ชื่อ</th>
                                                <th class="col-3">ยี่ห้อ</th>
                                                <th class="col-1">จำนวน</th>    
                                                <th class="col-1">เบิกวัสดุ/อุปกรณ์</th>
                                                <th class="col-1">สถานะ</th>
            
                                            </tr>
                                        </thead>
                                        <tbody>
                                              <!--**********************************
            โชวตารางข้อมูลวัสดุอุปกรณ์ที่มี
        ***********************************-->
                                        <?php 
                                             $select_material = $db->prepare("SELECT * FROM material");
                                             $select_material->execute();
                                             
                                             while ($row = $select_material->fetch(PDO::FETCH_ASSOC)) {

                                                    if ($row["type_id"] == '1'){
                                                ?>
                                                
                                                    <tr>
                                                        <td><?php echo $row["id"]; ?></td>
                                                        <td><span class="badge badge-success">วัสดุ</span></td>
                                                        <td><?php echo $row["mat_name"]; ?></td>
                                                        <td><?php echo $row["mat_brand"]; ?></td>
                                                        <td><?php echo $row["mat_amount"]; ?></td>
                                                        <td ><?php  
                                                            if ($row["mat_amount"] > 0){
                                                            ?>
                                                            <a href="user_stockin_w.php?p_id=<?php echo $row["id"];?>&act=add" class="btn btn-outline-primary">เบิก&nbsp;</a>
                                                            
                                                            

                                                            <?php }else{?>

                                                                <span class="badge badge-dark">หมด</span>

                                                            <?php } ?></td>
                                                        
                                                            <td><?php  
                                                                if ($row["mat_amount"] > 0){
                                                                ?>
                                                                <span class="badge btn-outline-warning">มีของ</span>
    
                                                                <?php }else{?>
                                                
                                                                 <span class="badge btn-outline-danger">ไม่มีของ</span>
                                                
                                                                <?php } ?>          
                                                            
                                                                
                                                                
                                                        </td>
                                                        
                                                    </tr>
    
    
    
                                                 <?php } }?>            
                                        </tbody>
                                        <tfoot>

                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">รายการวัสดุ/อุปกรณ์ที่เลือก</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">

                                <form method="post" action="?act=update&p_id=0" >
                                    <table id="example2" class="display table" style="width:100%">
                                        <thead class="thead-primary">
                                            <tr>
                                            <th class="col-1">รหัส</th>
                                                <th class="col-1">ประเภท</th>
                                                <th class="col-5">ชื่อ</th>
                                                <th class="col-3">ยี่ห้อ</th>
                                                <th class="col-1">จำนวน</th>
                                                <th class="col-1">ยกเลิก</th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>

                                        <?php 

                                            if(!empty($_SESSION['carts'])){

                                                foreach($_SESSION['carts'] as $p_id=>$qty)
                                                {

                                                    $select_stmt = $db->prepare("SELECT * FROM  material where id=$p_id");
                                                    $select_stmt->execute();
                                                    
                                            while ($rowss = $select_stmt->fetch(PDO::FETCH_ASSOC)) {
                                                $p_qty = $rowss["mat_amount"];
                                            ?>
                                            
                                                <tr>
                                                    <td><?php echo $p_id; ?></td>
                                                    <td><?php  
                                                            if ($rowss["type_id"] == '1'){
                                                            ?>
                                                            <span class="badge badge-success">วัสดุ</span>
                                                            
                                                            

                                                            <?php }else{?>

                                                                <span class="badge badge-dark">อุปกรณ์</span>

                                                            <?php } ?></td>
                                                    <td><?php echo $rowss["mat_name"]; ?></td>
                                                    <td><?php echo $rowss["mat_brand"]; ?></td>
                                                    <?php echo "<td> <input type='number' name='amount[$p_id]' value='$qty' min='1' max='$p_qty'/> </td> ";?>
                                                    <td><a href="user_stockin_w.php?p_id=<?php echo $p_id ;?>&act=remove" class="btn btn-outline-danger">ลบ</a></td>
                                                    
                                                    
                                                </tr>



                                             <?php  } 
                                                }
                                         ?>
                                       <?php  
                                 }  ?>
                                          
                                        </tbody>
                                        <input type="submit" name="button" class="btn btn-success" id="button" value="ตรวจสอบรายการวัสดุ" /> 
                                    </table>
                                    <br>
                                    <?php if(isset($_REQUEST['act']) && $act == "update"){ ?>

                                <a href="db_sto_add1.php" class="btn btn-success col-md-12 mt-3 ">แจ้งการเบิกวัสดุ</a>

                                <?php } else { ?>
                                    <font color="red" align='center' > *กรุณากดปุ่ม " ตรวจสอบรายการวัสดุ "  ก่อนการทำรายการถัดไป!! </font>
                                <?php } ?>
                                    </form>
                                </div>
                                <br>
                                
                                
                                
                                

                            </div>
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
    <script type="text/javascript">
	alert("<?php echo $insertEMsg;?>");
	window.location ='user_stockout.php';
</script>
    
    <!-- Required vendors -->
    <script src="./vendor/global/global.min.js"></script>
    <script src="./js/quixnav-init.js"></script>
    <script src="./js/custom.min.js"></script>



    <!-- Datatable -->
    <script src="./vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="./js/plugins-init/datatables.init.js"></script>

    
</body>

</html>