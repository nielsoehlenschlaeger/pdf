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
           $this->generator->SetXY(0, 0);
           $this->generator->SetAutoPageBreak(false, 0);
           $this->generator->SetFont('Arial','',10);
           $text = $date[0]."\n".$date[1]."\n".$date[3];
           //MultiCell(float w, float h, string txt [, mixed border [, string align [, boolean fill]]])
           $this->generator->MultiCell(57,2.5,$text, 1);

       }
       $this->generator->Output();

   }




}