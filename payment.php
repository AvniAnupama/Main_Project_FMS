<?php
/***************************************************************************


  * File name   : generateReceipt.php

  * Begin       : 24 March 2020

  * Description : This file can generate payment receipts of both individual
                  and multiple payments.

  * Author: Merin Sunny


***************************************************************************/
ob_start();
require_once"../config/db_connect.php";
$obj=new db_connect;
require_once('fpdf181/fpdf.php');
require_once('pdfclass.php');
$instituitons=array('0'=>array('institue_id'=>1));

require_once('generateReceiptProps.php');
$purpose="Product Purchase : ";
$total=0;
$user=$obj->select_any_one("tbl_customer_customer_registration","customer_customer_registration_id='".$_SESSION['user_id']."'");

foreach($_SESSION['cart_data_final'] as $cartData)
{
	$purpose_array[]=$cartData['product_name'];
	$total=$total+($cartData['count']*$cartData['price']);
}
$purpose.=implode(',',$purpose_array);
$_SESSION['cart_data_final']=array();
$total_gee= $total;
    $sgst=percentageGST(8,$total_gee);
    $cgst=percentageGST(8,$total_gee);
    $cess=percentageGST(1,$total_gee);
    $gst_total_gst=$sgst+$cgst+$cess;
$data['amount']=$total;
$data['purpose']=$purpose;
$data['name']=$user['name'];
$data['phone']=$user['phone'];
$data['email']=$user['email'];
$data['payment_status']='Credit';
$data['dd_date']=date('d-m-Y h:i:s');
$data['tax']=$gst_total_gst;
$data['with_out_tax']='';
$data['user_id']=$_SESSION['user_id'];
$data['payment_mode']='Online';

$result=$obj->inserttblReturnId($data,"tbl_ins_payment_payment_report");
//exit();
$_GET["trans_id"]=$result;

$_SESSION["Id"]=$_SESSION['user_id'];
$_SESSION["getUser"]["isStudent"]=$_SESSION['user_id'];

  
$transactions = array();
$approvedAll = 1;
$total =0;
if(isset($_GET["studID"])){
    $transactions = $obj->select_any("tbl_ins_payment_payment_report", "dd_date='".$data['dd_date']."' and user_id = ".$_GET["studID"]);
}
else if(isset($_GET["trans_id"])){
    
    $transactions = $obj->select_any("tbl_ins_payment_payment_report", "ins_payment_payment_report_id = ".$_GET["trans_id"]);
}
else
{
     $transactions=array();
}

$_GET["studID"]=$_SESSION['user_id'];


    $pay_mode="Online";

    $total_gee= $transactions[0]["amount"];
    $sgst=percentageGST(8,$total_gee);
    $cgst=percentageGST(8,$total_gee);
    $cess=percentageGST(1,$total_gee);
    $gst_total_gst=$sgst+$cgst+$cess;
    $sub_total=$transactions[0]["amount"]-$gst_total_gst;
    $gst_array=array('purpose'=>'GST (TAX)','dd_date'=>date("d-m-Y", strtotime($transactions[0]["dd_date"])),$pay_mode,'amount'=>$gst_total_gst, 'ins_payment_payment_report_id'=>$transactions[0]["ins_payment_payment_report_id"]);
   $transactions[0]["amount"]=$sub_total;
$transactions[]=$gst_array;
//print_r($transactions);
//exit();
for($i = 0; $i<count($transactions);$i++){
    // echo ($transactions[$i]["status"] === "0");
   
   
	$dataAll[$i] = array($i+1,$transactions[$i]["purpose"], date("d-m-Y", strtotime($transactions[$i]["dd_date"])),$pay_mode,  $transactions[$i]["amount"], $transactions[$i]["ins_payment_payment_report_id"]);
    $total += $transactions[$i]["amount"];
}



$student = $user;
$course["Courses_name"] = $transactions[0]['purpose'];

$student["institute_id"] = 1;

$instituitonDetails = generateReceiptProps(1, 1);


//print_r($instituitonDetails);
$pdf = new PDF();
$pdf->AddPage();

//Put the watermark
$pdf->SetFont('Arial','B',50);
//echo "test2";

$logopat =$instituitonDetails["logo"];

$pdf-> Image($logopat, 10, 6, 40);  //Logo
$approvedAll=1;
if($approvedAll !== 0){
$pdf->SetTextColor(255, 84, 41);//Text rotated around its origin
$pdf->Rotate(45,35,190);
    if($approvedAll === 1)
$pdf->Text(130,190, 'PAID');
    if($approvedAll === -1)
        $pdf->Text(130,190, 'REJECTED');
$pdf->Rotate(0);
$pdf->SetTextColor(0,0,0);//Text rotated around its origin

}


$pdf->SetFont('Arial', 'B', 15);   //Ariant font with size 15 and bold style

$pdf->Cell(0, 15, $instituitonDetails["name"], 0, 1, "C");  //Printing the title ( Intitution name)
$pdf->SetFont('Arial', '', 10);   //Ariant font with size 15 and bold style

$pdf->Cell(0, 5, $instituitonDetails["addr"], 0, 1, "C");  //Printing the address

$pdf->Cell(0, 5, "Phone: ".$instituitonDetails["phNo"], 0, 1, "C");  //Printing the phoneNo

$pdf->Cell(0, 5, "Email: ".$instituitonDetails["email"], 0, 1, "C");  //Printing the email
$pdf->Ln(8);  //Line break

$pdf->Cell(75);    //Move to the right
$pdf->Cell(45, 5, "Fee Receipt - User Copy", "B", 0, "C");  //Printing the email
$pdf->Ln(8);

 if(isset($_GET["trans_ids"])){
    
    $pdf->Cell(21, 5, "Total Payments:", 0, 0, "L");
    $pdf->Cell(35, 5, count($transactions), 0, 0, "R");
    $pdf->Cell(10);    //Move to the right
    $pdf->Cell(25, 5, "Admission No:", 0, 0, "L");
    $pdf->Cell(35, 5, $student["students_details_id"], 0, 0, "R");
    $pdf->Cell(15);    //Move to the right
    $pdf->Cell(11, 5, "Date:", 0, 0, "L");
    //$pdf->Cell(35, 5, date("d/m/y  H:i A", strtotime($transactions[0]["payment_time"])), 0, 0, "R");   
	//$pdf->Cell(35, 5, date("d/m/y", strtotime($transactions[0]["payment_time"])), 0, 0, "R");  
	$pdf->Cell(35, 5, date("Y-m-d"), 0, 0, "R");  	
}
else{
    
    $pdf->Cell(21, 5, "Receipt ID:", 0, 0, "L");
    $pdf->Cell(27, 5, $transactions[0]["ins_payment_payment_report_id"], 0, 0, "R");
    $pdf->Cell(10);    //Move to the right
    $pdf->Cell(21, 5, "Transaction Id:", 0, 0, "L");
    $pdf->Cell(50, 5, str_replace("MOJO","",$transactions[0]["payment_id"]), 0, 0, "R");
    $pdf->Cell(10);    //Move to the right
    $pdf->Cell(11, 5, "Date:", 0, 0, "L");
    //$pdf->Cell(35, 5, date("d/m/y  H:i A", strtotime($transactions[0]["payment_time"])), 0, 0, "R");  
    $pdf->Cell(35, 5, date("d-m-Y"), 0, 0, "R"); 	
}


$pdf->Ln(8);
$pdf->Cell(26, 5, "Name:", 0, 0, "L");

//$pdf->Cell(30, 5, $student["first_name"].$student["last_name"], 0, 0, "R");
$pdf->Cell(30, 5, ucwords($student["name"]), 0, 0, "L");

$pdf->Ln(8);


    
    $pdf->Cell(35, 5, "Purpose: ".$course["Courses_name"], 0, 0, "L");

$pdf->Ln(10);



$header = array('No.', 'Description', 'Payment Date', 'Pay-Mode','Amount Paid (Rs.)','Receipt No');

$pdf->FancyTable6Colom($header,$dataAll,0,255,0);

$pdf->Ln(5);

    // $pdf->Cell(27, 5, "Payment Mode:", 0, 0, "L");
    // $pdf->Cell(35, 5, "Card", 0, 0, "R");
    $pdf->Cell(62);    //Move to the right
    $pdf->Cell(15);    //Move to the right
    // $pdf->Cell(12, 5, "Fine:", 0, 0, "L");
    // $pdf->Cell(35, 5, "0", 0, 0, "R");
    $pdf->Cell(47);    //Move to the right
    $pdf->Cell(11);    //Move to the right
    $pdf->Cell(12, 5, "Total:", 0, 0, "L");
    $pdf->Cell(44, 5, $total, 0, 1, "R");

$pdf->Ln(15);    
$pdf->SetFont('','B');
$pdf->Cell(11, 5, "Note:", 0, 1, "L");
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(10);
$pdf->Cell(0, 5, "All payments are non-refundable. Cheque Payments are subject to realisation. In case of cheque bounce Rs. 500 will be levied", 0, 1, "L");
$pdf->Cell(10);
$pdf->Cell(0, 5, "This is a computer generated fee receipt, signature is not required.", 0, 1, "L");
$path="images/receipt-".$_GET["trans_id"].".pdf";
$file_path=$path;
$pdf->Output($path,'F');
//$pdf->Output();
//echo $file_path;
$_SESSION['cart_data']=array();
header("location:my_order.php");


?>