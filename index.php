<?php
/**
 * Created by PhpStorm.
 * User: niels
 * Date: 04.06.17
 * Time: 14:33
 */

require_once ('lib/fpdf/fpdf.php');
$PdfLib = new FPDF();
require_once ('classes/PdfGenerator.php');

$PdfGenerator = new PdfGenerator($PdfLib);
$PdfGenerator->readFile("test.csv");
$PdfGenerator->generatePdf();
