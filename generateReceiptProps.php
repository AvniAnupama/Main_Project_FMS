<?php
/*
 * if we pass an institution ID and give false as second parameter, it'll return you the details of that 
 * instituition like name, address and so on.
 * If the second argument is true, it'll do the same + it'll increment the value of next_receipt_number 
 * from table by one.
 */
function generateReceiptProps($institue_id, $increment)
{
   global $instituitons;
   global $obj;
 
   foreach($instituitons as $instituiton)
   {
     /* anil changed this. Have to check */  
     //if($institue_id === $instituiton["institue_id"])  
     if($institue_id == $instituiton["institue_id"])
     {
         if($increment)
         {
             $instituitonDetails = $obj->select_any_one("tbl_bill_recept", "ins_id = ".$institue_id);
             $instituiton["next_receipt_number"] = $instituitonDetails["next_receipt_number"];
             $data = array( 'next_receipt_number'=>$instituiton["next_receipt_number"]+1    );             
             $id = array('institute_id' => $institue_id);             
             $result = $obj->updatetbl($data, "tbl_bill_recept", $id); //Update record
         }
         return $instituitonDetails;
     }
   }
}
function percentageGST($percentage,$totalWidth)
        {
            //$totalWidth=1000;
            
            $new_width = round(($percentage / 100) * $totalWidth);
            return $new_width;
        }
?>