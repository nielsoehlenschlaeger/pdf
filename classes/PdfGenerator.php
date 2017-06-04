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


   public function __construct($generator)
   {
       $this->generator = $generator;
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
           $this->generator->SetFont('Arial','B',16);
           $this->generator->Cell(40,10,$date[0]);
           $this->generator->Cell(40,10,$date[1]);
           $this->generator->Cell(40,10,$date[3]);
       }
       $this->generator->Output();

   }




}