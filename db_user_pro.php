<?php
    ob_start();
    session_start();
    include_once('connect_db.php');
    

    if (isset($_REQUEST['btn_po_insert'])) {
        try {
        $po_auser = $_REQUEST['txt_po_user_add'];
        $po_adate = $_REQUEST['txt_po_date_add'];
        $po_asite = $_REQUEST['txt_po_site_add'];
        
        $image_file = $_FILES['txt_file']['name'];
            $type = $_FILES['txt_file']['type'];
            $size = $_FILES['txt_file']['size'];
            $temp = $_FILES['txt_file']['tmp_name'];
        
            $path = " order_po_images/" . $image_file; // set upload folder path

         if (empty($po_adate)) {
            $errorMsg = "กรุณาใส่ข้อมูล วันที่";
        }else if (empty($po_asite)) {
            $errorMsg = "กรุณาใส่ข้อมูล เลือกไซต์งาน";
        }else if (empty($image_file)) {
            $errorMsg = "กรุณาใส่ข้อมูล รูปภาพใบสั่งซื้อ";
        }else if ($type == "image/jpg" || $type == 'image/jpeg' || $type == "image/png" || $type == "image/gif") {
            if (!file_exists($path)) {  // check file ตรงที่หรือป่าว

                
                if ($size < 5000000) { // check file size  ขนาด 5MB
                   
                    move_uploaded_file($temp, 'order_po_images/'.$image_file); // move upload file temperory directory to your upload folder
                } else {
                    $errorMsg = "ไซต์มีขนาดมากกว่า 5MB "; // error message file size larger than 5mb
                }


            } else {

                $errorMsg = "อัพโหลดผิดพบาด"; // error message file not exists your upload folder path
            }


        } else {
            
            $errorMsg = "โปรดเช็คว่าเป็นรูปภาพประเภท JPG, JPEG, PNG & GIF ";
        }

        if (!isset($errorMsg)) {
            $insert_stmt = $db->prepare("INSERT INTO po(po_user, po_date, po_site, po_image ) VALUES (:mus, :mda, :msi, :mim)");
            $insert_stmt->bindParam(':mus', $po_auser);
            $insert_stmt->bindParam(':mda', $po_adate);
            $insert_stmt->bindParam(':msi', $po_asite);
            $insert_stmt->bindParam(':mim', $image_file);
            
            
            if ($insert_stmt->execute()) {
                $insertMsg = "แจ้งการสั่งซื้อ สำเร็จ";
                header("refresh:3;user_list.php");
                
            }
        }//as

    } catch(PDOException $e) {
        $e->getMessage();
    }
}

?>