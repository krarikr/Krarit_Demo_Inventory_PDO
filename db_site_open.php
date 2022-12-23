<?php 
        ob_start();
       include('connect_db.php');

       if (isset($_REQUEST['opensite_id'])) {
           $id = $_REQUEST['opensite_id'];
   
           $select_stmt = $db->prepare("SELECT * FROM site WHERE id = :id");
           $select_stmt->bindParam(':id', $id);
           $select_stmt->execute();
           $row = $select_stmt->fetch(PDO::FETCH_ASSOC);
   
           // Update status record from db
           $site_end = $db->prepare("UPDATE site SET site_status = :stat WHERE id = :id ");
           $site_end->bindParam(':id', $id);
           $site_end->bindParam(':stat', $site_stat);
           $site_stat = "b";
           $site_end->execute();
   
           header('Location:admin_site.php');
       }
    ?>