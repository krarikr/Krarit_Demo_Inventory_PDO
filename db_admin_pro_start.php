<?php
        ob_start();
       include('connect_db.php');

       if (isset($_REQUEST['startuser_id'])) {
           $id = $_REQUEST['startuser_id'];
   
           $select_stmt = $db->prepare("SELECT * FROM user_ptk WHERE id = :id");
           $select_stmt->bindParam(':id', $id);
           $select_stmt->execute();
           $row = $select_stmt->fetch(PDO::FETCH_ASSOC);
   
           // Update status record from db
           $user_start = $db->prepare("UPDATE user_ptk SET user_level = :ustat WHERE id = :id ");
           $user_start->bindParam(':id', $id);
           $user_start->bindParam(':ustat', $user_stat);
           $user_stat = "b";
           $user_start->execute();
   
           header('Location:admin_pro.php');
       }
    ?>