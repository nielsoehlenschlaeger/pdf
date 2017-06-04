<?php
/**
 * Created by PhpStorm.
 * User: niels
 * Date: 04.06.17
 * Time: 14:33
 */

$config = ['pageWidth' => 57, 'pageHeight' => 32];
require_once ('lib/fpdf/fpdf.php');
$PdfLib = new FPDF('L','mm',array($config['pageWidth'], $config['pageHeight']));
require_once ('classes/PdfGenerator.php');

$PdfGenerator = new PdfGenerator($PdfLib, $config);
$PdfGenerator->readFile("test1.csv");
$PdfGenerator->generatePdf();
