<?php
    session_start();
    include('connect_db.php');
    


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
                        <!-- ??????????????????????????? -->
                        <div class="header-left">
                        <h3 class="mt-2">????????????????????? : <?php echo $_SESSION['user_login']; ?></h3>
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
                                class="icon icon-layout-25"></i><span class="nav-text">??????????????????????????????????????????????????????</span></a>
                    </li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                                class="icon icon-app-store"></i><span class="nav-text">????????????????????????????????????????????????</span></a>
                        <ul aria-expanded="false">
                            <li><a href="user_po.php">????????????????????????????????????????????????</a></li>
                            <li><a href="user_stockout.php">????????? - ?????????????????????</a></li>
                            <li><a href="user_stockin.php">????????? - ?????????????????????</a></li>
                            <li><a href="user_stockin_w.php">???????????? - ???????????????</a></li>
                        </ul>
                    </li>
                    
                    <li><a  href="user_status.php" aria-expanded="false"><i
                                class="icon icon-single-copy-06"></i><span class="nav-text">???????????????????????????????????????????????????????????????????????????</span></a>
                        
                    </li>
                    <li><a  href="user_finish.php" aria-expanded="false"><i
                                class="icon icon-single-copy-06"></i><span class="nav-text">??????????????????????????????????????????????????????</span></a>
                        
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
                            <h3>???????????????????????????????????????????????????</h3>
                            <span class="ml-1">??????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????</span>
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
                                            <th class="col-1">???????????????</th>
                                            <th class="col-1">??????????????????????????????????????????</th>
                                                <th class="col-2">????????????????????????????????????</th>
                                                <th class="col-2">???????????????</th>
                                                <th class="col-2">????????????</th>
                                                
                                                <th class="col-3">?????????????????????</th>
                                                <th class="col-1">??????????????????????????????</th>
                                                
                                               
                                                
                                                
                                                
                                            </tr>
                                        </thead>

                                        <form>
                                        <tbody>
                                        <?php 
                                             $select_material = $db->prepare("SELECT * FROM  order_list");
                                             $select_material->execute();
                                             $name_f = $_SESSION['user_login']; 

                                            while ($row = $select_material->fetch(PDO::FETCH_ASSOC)) {

                                                if ($row["od_name"] == $name_f) {
                                                    if ($row["od_status"] != '5') {
                                            ?>

                                                <tr>
                                                <td><?php echo $row["od_id"]; ?></td>
                                                <td><?php echo $row["od_date"]; ?></td>

                                                <td> 
                                                <?php  
                                                            if ($row["od_ty"] == '1'){
                                                            ?>
                                                            <span class="badge badge-info">?????????-??????????????????????????????</span>
                                                            
                                                            <?php }else if ($row["od_ty"] == '2') { 
                                                                ?>

                                                            <span class="badge badge-success">???????????????????????????</span>

                                                            <?php } ?>
                                                        
                                                        </td>
                                                <td> 
                                                <?php  
                                                            if ($row["od_status"] == '1'){
                                                            ?>
                                                            
                                                            <span class="badge badge-warning">?????????????????????????????????</span>
                                                            
                                                            <?php }else if ($row["od_status"] == '2') { 
                                                                ?>

                                                                
                                                                <span class="badge badge-danger">?????????????????????????????????????????????</span>

                                                            <?php } else if ($row["od_status"] == '3') { 
                                                                ?>

                                                                
                                                                <span class="badge badge-primary">????????????????????????????????????</span>

                                                            <?php } else if ($row["od_status"] == '4') { 
                                                                ?>

                                                                
                                                                <span class="badge badge-warning">?????????????????????????????????-??????????????????????????????</span>

                                                            <?php } ?>
                                                        
                                                        </td>
                                                    <td><?php echo $row["od_name"]; ?></td>
                                                    <td><?php echo $row["od_site"]; ?></td>
                                                    <td><a href="list_order.php?od_id=<?php echo $row["od_id"]; ?>" class="btn btn-outline-warning">??????????????????</a></td>
                                                    
                                                    
                                                
                                                </td>
                                                                                           
                                                </tr>



                                             <?php } } }?>
                                          
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
        </div>
         <!-- /# ?????????????????????????????????????????????????????? -->

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