<?php
    include('connect_db.php');
    date_default_timezone_set("Asia/Bangkok");
    if (isset($_REQUEST['orderpo_id_id'])) {
        $id_po_list = $_REQUEST['orderpo_id_id'];

        $select_poimage = $db->prepare("SELECT * FROM po WHERE id = :id");
        $select_poimage->bindParam(':id', $id_po_list);
        $select_poimage->execute();
        $row01 = $select_poimage->fetch(PDO::FETCH_ASSOC);

        $insertMsg = "order_po_images/";// . $row01['po_image'];
        
    }
 ?>

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
    <link href="./css/lightbox.min.css" rel="stylesheet">
    


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
                        <!-- ??????????????????????????? -->
                        <div class="header-left">
                        <h3 class="mt-2">?????????????????????????????????</h3>
                           
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
                                class="icon icon-single-04"></i><span class="nav-text">?????????????????????????????????????????????????????????</span></a>
                    </li>
                    <li><a href="admin_mat.php" aria-expanded="false"><i
                                class="icon icon-layout-25"></i><span class="nav-text">????????????????????????????????????????????????????????????????????????</span></a>
                    </li>
                    <li><a  href="admin_site.php" aria-expanded="false"><i
                                class="icon icon-world-2"></i><span class="nav-text">???????????????????????????????????????</span></a>
                        
                    </li>
                    <li><a  href="admin_order_po.php" aria-expanded="false"><i
                                class="icon icon-form"></i><span class="nav-text">??????????????????????????????????????????????????????????????????</span></a>
                        
                    </li>
                    <li><a  href="admin_comelist.php" aria-expanded="false"><i
                                class="icon icon-form"></i><span class="nav-text">??????????????????????????????????????? ????????? - ?????????</span></a>
                        
                    </li>
                    <li><a  href="admin_come_w.php" aria-expanded="false"><i
                                class="icon icon-form"></i><span class="nav-text">?????????????????????????????????????????????</span></a>
                        
                    </li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                                class="icon icon-app-store"></i><span class="nav-text">?????????????????????????????????????????????????????????</span></a>
                        <ul aria-expanded="false">
                            <li><a href="admin_list_sto.php">????????????????????? - ??????????????????????????????</a></li>
                            <li><a href="admin_list_sti.php">????????????????????? - ??????????????????????????????</a></li>
                            <li><a href="admin_list_sto_w.php">????????????????????? - ???????????????????????????</a></li>
                            <li><a href="admin_list_po.php">????????????????????? - ????????????????????????????????????????????????</a></li>
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
                            <h4>???????????????????????????????????????????????????</h4>
                            <span class="ml-1">??????????????????????????????????????????????????????????????????</span>
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

                            <div class="card-body">
                                <div class="table-responsive">
                                <table id="example2" class="display table" style="width:100%">

                                        <thead class="thead-primary">
                                            <tr>
                                                <th>????????????????????????????????????</th>
                                                <th>????????????</th>
                                                <th>?????????????????????</th>
                                                <th>???????????????????????????????????????????????????????????????</th>
                                                <th>??????????????????????????????????????????</th>
                                                <th>????????????????????????????????????</th>
                                                
                                                
                                                
                                                
                                            </tr>
                                        </thead>

                                        <form>
                                        <tbody>
                                        <?php 
                                             $select_stin = $db->prepare("SELECT * FROM  po");
                                             $select_stin->execute();

                                            while ($row = $select_stin->fetch(PDO::FETCH_ASSOC)) {
                                            ?>

                                                    <?php  
                                                            if ($row["po_level"] != 'a'){
                                                            ?>
                                            
                                                <tr>
                                                    
                                                    <td> <a href="#" class="btn btn-warning">????????????????????????????????????????????????</a></td>
                                                    <td><?php echo $row["po_user"]; ?></td>
                                                    <td><?php echo $row["po_site"]; ?></td>
                                                    <td><?php echo $row["po_date"]; ?></td>
                                                    <td><a href="order_po_images/<?php echo $row['po_image']; ?>" data-lightbox="image-1" data-title="My caption" class="btn btn-outline-warning">??????????????????????????????????????????????????????????????????</a></td>
                                                    <td><a href="db_admin_po_accep.php?accpo_id=<?php echo $row["id"]; ?>" class="btn btn-outline-primary">?????????????????????????????????</a></td>
                                                    
                                                    
                                                                                                
                                                </tr>
                                                <?php } ?>


                                             <?php } ?>
                                          
                                        </tbody>
                                        </form>
                                        
                                        <tfoot>

                                        </tfoot>
                                    </table>

                                </div>
                            </div>
                            
                        </div>
                    </div>

                  
                </div>
               
                

            </div>
        </div> <!-- /# ?????????????????????????????????????????????????????? -->

        <!--**********************************
            Content body end
        ***********************************-->


        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>???????????????????????????????????? ??????????????? ???????????????  1968</p>
                <p>??????????????????????????? <a href="#" target="_blank">Phimphila Karis</a></p> 
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

    <script type="text/javascript">
	alert("<?php echo $insertMsg;?>");
	window.location ='admin_list_po.php';
</script>

    <!--**********************************
        Scripts
    ***********************************-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="./js/lightbox.min.js"></script>

     <!-- Required vendors -->
     <script src="./vendor/global/global.min.js"></script>
    <script src="./js/quixnav-init.js"></script>
    <script src="./js/custom.min.js"></script>



    <!-- Datatable -->
    <script src="./vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="./js/plugins-init/datatables.init.js"></script>

</body>

</html>