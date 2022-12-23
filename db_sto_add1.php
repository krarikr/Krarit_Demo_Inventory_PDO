<?php
    session_start();
    include_once('connect_db.php');
    date_default_timezone_set("Asia/Bangkok");

    if (isset($_REQUEST['btn_sto_insert'])) {
        $sto_auser = $_REQUEST['txt_sto_name_add'];
        $sto_adate = $_REQUEST['txt_sto_date_add'];
        $sto_asite = $_REQUEST['txt_sto_site_add'];
        $sto_stat = "1";
        $sto_ty = "2";
		
        


         if (empty($sto_adate)) {
            $errorMsg = "กรุณาใส่ข้อมูล วันที่";
        }else if (empty($sto_asite)) {
            $errorMsg = "กรุณาใส่ข้อมูล เลือกไซต์งาน";
        }else {
            try {
                if (!isset($errorMsg)) {
                    $insert_odmt01 = $db->prepare("INSERT INTO order_list(od_name, od_date, od_site, od_status, od_ty ) VALUES (:mus, :mda, :msi, :stat, :tys)");
                    $insert_odmt01->bindParam(':mus', $sto_auser);
                    $insert_odmt01->bindParam(':mda', $sto_adate);
                    $insert_odmt01->bindParam(':msi', $sto_asite);
					$insert_odmt01->bindParam(':stat', $sto_stat);
                    $insert_odmt01->bindParam(':tys', $sto_ty);
					
                    
                    
                    
                    if ($insert_odmt01->execute()) {

						$select_odmt01 = $db->prepare("SELECT max(od_id) as od_id FROM order_list WHERE od_name = :od_n AND od_date = :od_d AND od_site = :od_s");
						$select_odmt01->bindParam(':od_n', $sto_auser);
						$select_odmt01->bindParam(':od_d', $sto_adate);
						$select_odmt01->bindParam(':od_s', $sto_asite);
						$select_odmt01->execute();
						$row01 = $select_odmt01->fetch(PDO::FETCH_ASSOC);	
						$oss_id = $row01["od_id"];

					

						foreach($_SESSION['carts'] as $p_id=>$qty)
							{

                                    
		
									$insert_odmt02	= $db->prepare("INSERT INTO order_details (d_id, o_id, m_id, qty ) VALUES (null,:oto, :otm, :qty)");
									$insert_odmt02->bindParam(':oto', $oss_id);
                   					$insert_odmt02->bindParam(':otm', $p_id);
                    				$insert_odmt02->bindParam(':qty', $qty);
									$insert_odmt02->execute();

							}


							if($insert_odmt01 && $insert_odmt02){
										
										
								foreach($_SESSION['carts'] as $p_id)
								{	
									//unset($_SESSION['cart'][$p_id]);
									
									unset($_SESSION['carts']);
									$insertMsg = "แจ้งการเบิก เรียบร้อย";
									

									

								}
							}
							


                    }
                }//as
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }//asd
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
                                class="icon icon-single-copy-06"></i><span class="nav-text">สถานะรายการ</span></a>
                        
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
                            <h3>เบิกวัสดุ</h3>
                            <span class="ml-1">แจ้งการเบิกวัสดุสำหรับไซต์งาน</span>
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
                                <h4 class="card-title">รายการวัสดุ/อุปกรณ์ที่เลือก</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example2" class="display table" style="width:100%">
                                        <thead class="thead-primary">
                                            <tr>
                                                <th>รหัส</th>
                                                <th>ประเภท</th>
                                                <th>ชื่อ</th>
                                                <th>ยี่ห้อ</th>
                                                <th class="col-2">จำนวน</th>
                                                
                                            </tr>
                                        </thead>

                                        <form>
                                        <tbody>
                                        <?php 

                                            if(!empty($_SESSION['carts'])){

                                                foreach($_SESSION['carts'] as $p_id=>$qty)
                                                {

                                                    $select_stmt = $db->prepare("SELECT * FROM  material where id=$p_id");
                                                    $select_stmt->execute();
                                                    
                                            while ($rowss = $select_stmt->fetch(PDO::FETCH_ASSOC)) {
                                                
                                            ?>
                                            
                                                <tr>
                                                    <td><?php echo $rowss["id"]; ?></td>
                                                    <td><?php  
                                                            if ($rowss["type_id"] == '1'){
                                                            ?>
                                                            <span class="badge badge-success">วัสดุ</span>
                                                            
                                                            

                                                            <?php }else{?>

                                                                <span class="badge badge-dark">อุปกรณ์</span>

                                                            <?php } ?></td>
                                                    <td><?php echo $rowss["mat_name"]; ?></td>
                                                    <td><?php echo $rowss["mat_brand"]; ?></td>
                                                    <td><?php echo $qty ?></td>
                                                    
                                                    
                                                    
                                                </tr>



                                             <?php  } 
                                                } 
                                         } ?>
                                          
                                        </tbody>
                                       
								
                                        </form>
                                    </table>

                                </div>
                                
                            
                            </div>
                        </div>
                    </div>
                </div>






                    <div class="col-12">
                    <div class="card">
                    <div class="card-header">

                                
                            </div>   
                            
                                    <form id="contact-form" method="post">
                                    <div class="form-group ">
                                    <div class="col-md-12 mt-4">
                                        <label>ชื่อ โฟร์แมน</label>
                                            <input type="text" class="form-control mt-3" name="txt_sto_name_add"  id="comment" value="<?php echo $_SESSION['user_login']; ?>" ></input>
                                            </div>            
                                        </div>
                                       
                                        <br>
                                        <div class="form-group ">
                                        <div class="col-md-12 mt-4">
                                        <label>วันเวลาที่ทำรายการ</label>
                                        
                                        <input type="text" class="form-control" name="txt_sto_date_add" readonly  id="comment" value="<?php echo date('d-m-y H:i:s'); ?>" ></input>
                                            </div>            
                                        </div>
                                        <br>

                                        <div class="form-group">
                                        <label for="type" class="col-sm-3 control-label">เลือกไซต์งาน</label>
                                            <div class="col-sm-12 mt-4">  
                                                
                                             <select name="txt_sto_site_add" class="form-control">
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
                                        

                                          <br>

                                        <div class="form-group text-center">

                                            <div class="col-md-12 mt-3">
                                                <input type="submit" name="btn_sto_insert" class="btn btn-success" value="แจ้งการเบิกวัสดุ" >
                                                

                                            </div>
                                         </div>
                                    </form>



                                    
                                

                    
    

    <?php 
         if (isset($errorMsg)) {
    ?>
         <div class="alert alert-danger mt-2">
            <strong><font color=#000000>ระวัง!    <?php echo $errorMsg; ?></font></strong>

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
    <script type="text/javascript">
	alert("<?php echo $insertMsg;?>");
	window.location ='user_status.php';
</script>

<script src="./vendor/global/global.min.js"></script>
    <script src="./js/quixnav-init.js"></script>
    <script src="./js/custom.min.js"></script>



    <!-- Datatable -->
    <script src="./vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="./js/plugins-init/datatables.init.js"></script>
    
</body>

</html>