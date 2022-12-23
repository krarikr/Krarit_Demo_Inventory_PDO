<?php 
        ob_start();
       include('connect_db.php');

       if (isset($_REQUEST['accpo_id'])) {
           $id = $_REQUEST['accpo_id'];
   
           $select_stmt = $db->prepare("SELECT * FROM po WHERE id = :id");
           $select_stmt->bindParam(':id', $id);
           $select_stmt->execute();
           $row = $select_stmt->fetch(PDO::FETCH_ASSOC);
   
           // Update status record from db
           $user_start = $db->prepare("UPDATE po SET po_level = :ustat WHERE id = :id ");
           $user_start->bindParam(':id', $id);
           $user_start->bindParam(':ustat', $user_stat);
           $user_stat = "a";
           $user_start->execute();
   
           header('Location:admin_list_po.php');
       }
    ?>