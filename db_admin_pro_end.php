<?php 
        ob_start();
       include('connect_db.php');

       if (isset($_REQUEST['enduser_id'])) {
           $id = $_REQUEST['enduser_id'];
   
           $select_stmt = $db->prepare("SELECT * FROM user_ptk WHERE id = :id");
           $select_stmt->bindParam(':id', $id);
           $select_stmt->execute();
           $row = $select_stmt->fetch(PDO::FETCH_ASSOC);
   
           // Update status record from db
           $user_end = $db->prepare("UPDATE user_ptk SET user_level = :ustat WHERE id = :id ");
           $user_end->bindParam(':id', $id);
           $user_end->bindParam(':ustat', $user_stat);
           $user_stat = "a";
           $user_end->execute();
   
           header('Location:admin_pro.php');
       }
    ?>