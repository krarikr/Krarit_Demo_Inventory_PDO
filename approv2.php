<?php 
      ob_start();
       include('connect_db.php');
       date_default_timezone_set("Asia/Bangkok");

       if (isset($_REQUEST['apr_id'])) {
           $id = $_REQUEST['apr_id'];
   
           $select_stmt = $db->prepare("SELECT * FROM order_list WHERE od_id = :id");
           $select_stmt->bindParam(':id', $id);
           $select_stmt->execute();

          
          
           // อัปเดตสถานะ
           $site_end = $db->prepare("UPDATE order_list SET od_status = :stat, od_date = :dat WHERE od_id = :id ");
           $site_end->bindParam(':id', $id);
           $site_end->bindParam(':stat', $site_stat);
           $site_end->bindParam(':dat', $site_dat);
           //$site_end->bindParam(':tys', $site_ty);
           $site_stat = "4";
           $site_dat = date('d-m-y H:i:s');
          // $site_ty = "2";
           
          $site_end->execute();

          

          
          header('Location:user_status.php');


       }
    ?>