<?php
/***************************************************************************


  * File name   : pdfclass.php

  * Begin       : 26 March 2020

  * Description : This file create the payment receipt file's Header,
                  and have a defined function which can create table layout
                  on the PDF file.

  * Author: Jishnu Raj P P
  ver 1.1 - Lince 2Aug20
		- added payment mode

***************************************************************************/
class PDF extends FPDF{
        var $angle=0;

        function Rotate($angle,$x=-1,$y=-1)
        {
            if($x==-1)
                $x=$this->x;
            if($y==-1)
                $y=$this->y;
            if($this->angle!=0)
                $this->_out('Q');
            $this->angle=$angle;
            if($angle!=0)
            {
                $angle*=M_PI/180;
                $c=cos($angle);
                $s=sin($angle);
                $cx=$x*$this->k;
                $cy=($this->h-$y)*$this->k;
                $this->_out(sprintf('q %.5F %.5F %.5F %.5F %.2F %.2F cm 1 0 0 1 %.2F %.2F cm',$c,$s,-$s,$c,$cx,$cy,-$cx,-$cy));
            }
        }
        
        function _endpage()
        {
            if($this->angle!=0)
            {
                $this->angle=0;
                $this->_out('Q');
            }
            parent::_endpage();
        }
        function FancyTable4Colom($header, $data,$red,$green,$blue)
        {
            $this->SetLineWidth(.3);
            $this->SetFont('','B');
            // Header
        if(isset($_GET["trans_id"])){
            $width = array(10, 105, 35, 40, );
        }
        else{
            $header[4] = "Receipt No";
            $width = array(10, 70, 35, 40, 30);
        }
            
            for($i=0;$i<count($header);$i++)
                $this->Cell($width[$i],7,$header[$i],1,0,'C',false);
                $this->Ln();
                // Color and font restoration
                $this->SetFillColor(224,235,255);
                $this->SetTextColor(0);
                $this->SetFont('');
                // Data
                $fill = false;
                foreach($data as $row)
                {
                    $this->Cell($width[0],6,$row[0],'LR',0,'L',$fill);
                    $this->Cell($width[1],6,$row[1],'LR',0,'L',$fill);
                    //$this->Cell($w[2],6,number_format($row[2]),'LR',0,'R',$fill);
                    $this->Cell($width[2],6,$row[2],'LR',0,'R',$fill);
                    $this->Cell($width[3],6,$row[3],'LR',0,'R',$fill);
                if(isset($_GET["trans_ids"])){
                    $this->Cell($width[4],6,$row[4],'LR',0,'R',$fill);
                }
                    $this->Ln();
                    $fill = !$fill;
                }

                // Closing line
                $this->Cell(array_sum($width),0,'','T');
        }
        function FancyTable6Colom($header, $data,$red,$green,$blue)
        {
            $this->SetLineWidth(.3);
            $this->SetFont('','B');
            // Header
            $width = array(10, 70, 35, 25, 35, 20);
            for($i=0;$i<count($header);$i++)
                $this->Cell($width[$i],7,$header[$i],1,0,'C',false);
                $this->Ln();
                // Color and font restoration
                $this->SetFillColor(224,235,255);
                $this->SetTextColor(0);
                $this->SetFont('');
                // Data
                $fill = false;
                foreach($data as $row)
                {
                    $this->Cell($width[0],6,$row[0],'LR',0,'L',$fill);
                    $this->Cell($width[1],6,$row[1],'LR',0,'L',$fill);
                    $this->Cell($width[2],6,$row[2],'LR',0,'R',$fill);
                    $this->Cell($width[3],6,$row[3],'LR',0,'R',$fill);
                    $this->Cell($width[4],6,$row[4],'LR',0,'R',$fill);
                    $this->Cell($width[5],6,$row[5],'LR',0,'R',$fill);
                    $this->Ln();
                    //$fill = !$fill;
                }
                // Closing line
                $this->Cell(array_sum($width),0,'','T');
        }
    }

?>