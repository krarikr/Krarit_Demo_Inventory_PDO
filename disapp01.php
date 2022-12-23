<?php 
       include('connect_db.php');

       if (isset($_REQUEST['apr_id'])) {
           $id = $_REQUEST['apr_id'];
   
           $select_stmt = $db->prepare("SELECT * FROM order_list WHERE od_id = :id");
           $select_stmt->bindParam(':id', $id);
           $select_stmt->execute();

           //เรียมากเพื่่อเอาไอดีมาตัดสต็อก
           $select_st01 = $db->prepare("SELECT * FROM order_details WHERE o_id = :id");
           $select_st01->bindParam(':id', $id);
           $select_st01->execute();
           $row01 = $select_st01->fetch(PDO::FETCH_ASSOC);
           $mm_id = $row01["m_id"];

            //เทียบค่า ไอดีของรายการ
           $select_stmt02 = $db->prepare("SELECT * FROM material WHERE id = :mid");
           $select_stmt02->bindParam(':mid', $mm_id);
           $select_stmt02->execute();
           $row02 = $select_stmt02->fetch(PDO::FETCH_ASSOC);
           $row_count = $select_stmt02->rowCount();
           

           // อัปเดตสถานะ
           $site_end = $db->prepare("UPDATE order_list SET od_status = :stat WHERE od_id = :id ");
           $site_end->bindParam(':id', $id);
           $site_end->bindParam(':stat', $site_stat);
           //$site_end->bindParam(':tys', $site_ty);
           $site_stat = "5";
          // $site_ty = "2";
           $site_end->execute();

           $insert_odmt= $db->prepare("INSERT INTO his_sto_w (hto_id, hto_od_id, hto_od_name, hto_od_date, hto_od_site ) VALUES (null, :ot1, :ot2, :ot3, :ot4)");
			$insert_odmt->bindParam(':ot1', $oss_id1);
            $insert_odmt->bindParam(':ot2', $oss_id2);
            $insert_odmt->bindParam(':ot3', $oss_id3);
            $insert_odmt->bindParam(':ot4', $oss_id4);
			$insert_odmt->execute();

           $sum1 = $row02["mat_amount"];
            $sum2 = $row01["qty"];

           //ตัดสต็อก
           for($i=0; $i<$row_count; $i++){ 
            $sumqty = $sum1 - $sum2 ;
           $qty_sto = $db->prepare("UPDATE material SET mat_amount = :summe WHERE id = :mid ");
           $qty_sto->bindParam(':mid', $mm_id);
           $qty_sto->bindParam(':summe', $sumqty);
           $qty_sto->execute();
           
           }

           

           header('Location:admin_comelist.php');
       }
    ?>