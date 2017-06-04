<?php

/**
 * Created by PhpStorm.
 * User: niels
 * Date: 04.06.17
 * Time: 14:40
 */
class PdfGenerator
{
   private $data = array();
   private $generator = null;
   private $config = null;


   public function __construct($generator, $config)
   {
       $this->generator = $generator;
       $this->config = $config;
   }

   public function readFile($file){
       if (($handle = fopen($file, "r")) !== FALSE) {
           while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
                $this->data[]=$data;
           }
       }
   }
   public function generatePdf(){
       foreach ($this->data as $date){
           $this->generator->AddPage();
           $this->generator->SetMargins(0, 0);
           $this->generator->SetXY(1, 2);
           $this->generator->SetAutoPageBreak(false, 0);
           $this->generator->SetFont('Arial','',10);
           $text = $date[0]."\n".$date[1]." ".$date[2]."\n".$date[3]." ".$date[4]."\n".$date[5]." ".$date[6]."\n\n".$date[7];
           //MultiCell(float w, float h, string txt [, mixed border [, string align [, boolean fill]]])
           $this->generator->MultiCell(56,4,$text, 0);

       }
       $this->generator->Output();

   }




}