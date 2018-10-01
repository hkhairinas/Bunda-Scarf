<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
  
require_once dirname(__FILE__) . '/tcpdf/tcpdf.php';
require_once('tcpdf/examples/lang/eng.php');
require_once('tcpdf/tcpdf.php');
class pdf extends TCPDF
{
 function __construct()
 {
 parent::__construct();
 	
 }
 // public function Header() {
	// 	// Logo
	// 	$image_file = K_PATH_IMAGES.'logo-lap.png';
	// 	$this->Image($image_file, 10, 10, 15, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
	// 	// Set font
	// 	$this->SetFont('times', 'B', 20);
	// 	// Title
	// 	$this->Cell(0, 15, '<< TCPDF Example 003 >>', 0, false, 'C', 0, '', 0, false, 'M', 'M');
	// }

	// // Page footer
	// public function Footer() {
	// 	// Position at 15 mm from bottom
	// 	$this->SetY(-15);
	// 	// Set font
	// 	$this->SetFont('times', 'I', 8);
	// 	// Page number
	// 	$this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
	// }
}
  
?>