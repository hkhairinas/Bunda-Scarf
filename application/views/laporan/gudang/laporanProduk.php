<?php
    $tgl = date("d - m - Y");
    $user=$this->session->userdata('nama_user');
   	$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false); 
    // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Hutomo Khairinnas');
    $pdf->SetTitle('Laporan Gudang');
  
    // set default header data
    $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' Laporan ', PDF_HEADER_STRING, array(70, 70, 70), array(70, 70, 70));
    $pdf->setFooterData(K_TIMEZONE, array(0,64,0), array(0,64,128)); 
  
    // set header and footer fonts
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
  
    // set default monospaced font
    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED); 
  
    // set margins
    $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
    $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);    
  
    // set auto page breaks
    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM); 
  
    // set image scale factor
    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);  
  
    // set some language-dependent strings (optional)
    if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
        require_once(dirname(__FILE__).'/lang/eng.php');
        $pdf->setLanguageArray($l);
    }   

    $pdf->setFontSubsetting(true);   
    $pdf->SetFont('times', '', 12, '', true);

    $pdf->AddPage();

    $pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));
    $html = <<<EOD
    <h1>
    Laporan Stok Persediaan Produk Toko Bunda Scarf
    </h1>
     
EOD;
    $pdf->Ln(4);
    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, 'C', true);
    $pdf->Ln(4);

    $table = '<table border="1"  cellpadding="0" cellspacing="3" align="center" fontsize="12">';
        $table .= '
            <tr style="background-color:#FFFF00;color:#000000;">
            <th width="45">No</th>
            <th colspan="1" width="120">Nama Produk</th>
            <th width="40">S</th>
            <th width="40">M</th>
            <th width="40">L</th>
            <th width="40">XL</th>
            <th width="40">ALL SIZE</th>
            <th colspan="1">Stok</th>
            <th colspan="1" width="95">Modal</th>
            <th colspan="1" width="95">Harga Jual</th>
            </tr>
            ';
        $no=1;
        foreach ($dataProd as $data) {
        $table .='
            <tr>
            <td width="45">'.$no.'</td>
            <td colspan="1" width="120">'.$data['NAMA_PROD'].'</td>
            <th width="40">'.$data['S'].'</th>
            <th width="40">'.$data['M'].'</th>
            <th width="40">'.$data['L'].'</th>
            <th width="40">'.$data['XL'].'</th>
            <th width="40">'.$data['ALL_SIZE'].'</th>
            <td colspan="1">'.$data['STOK'].'</td>
            <td colspan="1" width="95">Rp. '.$data['HARGA_BELI'].'</td>
            <td colspan="1" width="95">Rp. '.$data['HARGA_JUAL'].'</td>
            </tr>';
        $no++;
        }
        
    $table .= '</table>';

    // set text shadow effect
    $pdf->writeHTMLCell(0, 0, '', '', $table, 0, 1, 0, true, 'C', true);

    $pdf->Ln(50);
    $ttd = '<p>Bagian Gudang, </p>
    <p>Perawang, '.$tgl.'</p>
    <br>
    <p></p>
    <B> '.ucfirst($user).' </B>';

    $pdf->writeHTMLCell(0, 0, '', '', $ttd, 0, 1, 0, true, 'R', true);
    $pdf->LastPage();

    $pdf->Output('Laporan_Produk.pdf', 'I'); 
?>

