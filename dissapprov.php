<?php 
        ob_start();
       include('connect_db.php');

       if (isset($_REQUEST['apr_id'])) {
           $id = $_REQUEST['apr_id'];
   
           $select_stmt = $db->prepare("SELECT * FROM order_list WHERE od_id = :id");
           $select_stmt->bindParam(':id', $id);
           $select_stmt->execute();

           $row = $select_stmt->fetch(PDO::FETCH_ASSOC);

           // Update status record from db
           $site_end = $db->prepare("UPDATE order_list SET od_status = :stat WHERE od_id = :id ");
           $site_end->bindParam(':id', $id);
           $site_end->bindParam(':stat', $site_stat);
           $site_stat = "2";
           $site_end->execute();
   
           if ($row["od_ty"] == '1'){
           header('Location:admin_comelist.php');
           } else {
            header('Location:admin_comelist_w.php');
           }
       }
    ?>