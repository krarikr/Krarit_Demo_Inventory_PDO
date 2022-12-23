<?php
    ob_start();
    include('connect_db.php');

    if (isset($_REQUEST['btn_user_insert'])) {
        $user_name_add = $_REQUEST['txt_user_name_add'];
        $user_fullname_add = $_REQUEST['txt_user_fullname_add'];
        $user_pass_add = $_REQUEST['txt_user_pass_add'];
        $user_role_add = $_REQUEST['txt_role'];
        $user_le = "b";

        if (empty($user_name_add)) {
            $errorMsg = "กรุณาใส่ ไอดี โฟร์แมน";
        }else if (empty($user_fullname_add)) {
            $errorMsg = "กรุณาใส่ ชื่อ โฟร์แมน";
        }else if (empty($user_pass_add)) {
            $errorMsg = "กรุณาใส่ รหัสผ่าน โฟร์แมน";
        }else if (empty($user_role_add)) {
            $errorMsg = "กรุณาเลือกประเภทผู้ใช้งาน";
        }else {
            try {
                if (!isset($errorMsg)) {

                    $select_stmt = $db->prepare("SELECT * FROM user_ptk ");
                    $select_stmt->bindParam(':id', $id);
                    $select_stmt->execute();
                    //$row01 = $select_stmt->fetch(PDO::FETCH_ASSOC)
                    
                    while($row01 = $select_stmt->fetch(PDO::FETCH_ASSOC)) {
                        $dbuser = $row01['user_name'];
                        $dbpassword = $row01['user_password'];
                        $dbrole = $row01['user_role'];
                        
                    }

                    if ($user_name_add != $dbuser AND $user_pass_add != $dbpassword) {
                     //   if ($select_stmt->rowCount() > 0) {
                    
                    $useradd_stmt = $db->prepare("INSERT INTO user_ptk(user_name, user_fullname, user_password, user_role, user_level) VALUES (:uname_up, :ufullname_up, :upass_up, :urole_up, :ule)");
                    $useradd_stmt->bindParam(':uname_up', $user_name_add);
                    $useradd_stmt->bindParam(':ufullname_up', $user_fullname_add);
                    $useradd_stmt->bindParam(':upass_up', $user_pass_add);
                    $useradd_stmt->bindParam(':urole_up', $user_role_add);
                    $useradd_stmt->bindParam(':ule', $user_le);

                    if ($useradd_stmt->execute()) {
                        $insertMsg = "เพิ่มข้อมูลสำเร็จ";
                        echo  $insertMsg ;
                        
                    } else {
                        $errorinsert = "ระบบมีความขัดคล้อง" ;
                        echo  $errorinsert ;
                    }

                    // else ของ if ($select_stmt->rowCount() > 0) {
                 //   } else {
                 //      $errorinsert = "ระบบมีความขัดคล้อง" ;
                 //   }
                     // else ของ if ($user_name_add != $dbuser AND $user_pass_add != $dbpassword AND $user_role_add != $dbrole ) {
                    } else if ($user_name_add == $dbuser AND $user_pass_add == $dbpassword) {
                        $errorinsert = "ข้อมูลพนักงานนี้มีอยู่ในระบบแล้ว";
                    }
               // } else {
               //     $errorinsert = "ระบบมีความขัดคล้อง" ;
               }
            
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }


       
    }

    ?>