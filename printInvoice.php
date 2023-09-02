<?php
//============================================================+
// File name   : example_001.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 001 for TCPDF class
//               Default Header and Footer
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Default Header and Footer
 * @author Nicola Asuni
 * @since 2008-03-04
 */

// Include the main TCPDF library (search for installation path).
require_once('./tcpdf/examples/tcpdf_include.php');
include './controller/conn.php';

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->setPrintHeader(false);
$pdf->AddPage();

// Query data base
$id = $_GET['id_pemesanan'];
$getdataPemesanan = mysqli_query($conn,"SELECT * FROM tb_pemesanan WHERE id ='$id'");
$dataPemesanan = mysqli_fetch_array($getdataPemesanan);
$created_at_old = strtotime($dataPemesanan['created_at']);
$created_at_new = date('d F Y', $created_at_old);
$sewa_dari_old = strtotime($dataPemesanan['tgk_dari']);
$sewaDari = date('d F Y', $sewa_dari_old);
$sewa_hingga_old = strtotime($dataPemesanan['tgl_hingga']);
$sewaHingga = date('d F Y', $sewa_hingga_old);

// get the current page break margin
$bMargin = $pdf->getBreakMargin();
// get current auto-page-break mode
$auto_page_break = $pdf->getAutoPageBreak();
// disable auto-page-break
$pdf->SetAutoPageBreak(false, 0);
// set bacground image
$img_file = K_PATH_IMAGES . '';
$pdf->Image($img_file, 0, 0, 210, 297, '', '', '', false, 300, '', false, false, 0);
// restore auto-page-break status
$pdf->SetAutoPageBreak($auto_page_break, $bMargin);
// set the starting point for the page content
$pdf->setPageMark();
// Set some content to print
$html = '
<h1 style="text-align:center; margin-bottom:10px;">Kost Buida</h1>';
$html2 = "<p style='text-align:center;'>Invoice</p>";
$html3 = "<p style='font-size:5px;'>".$created_at_new."</p>";
$htmlalamat = "<p style='font-size:5px;'>Jln. Sekeloa Tengah No. 101 Kelurahan Lebakgede Kecamatan Coblong Kota Bandung.</p>";
// Print text using writeHTMLCell()
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
$pdf->writeHTMLCell(0, 0, 95, 20, $html2, 0, 1, 0, true, '', true);
$pdf->writeHTMLCell(0, 0, 25, 25, $htmlalamat, 0, 1, 0, true, '', true);
$pdf->writeHTMLCell(0, 0, 165, 32, $html3, 0, 1, 0, true, '', true);
// Get the position after writing $html2
$positionY = $pdf->getY();

// Set line width
$pdf->SetLineWidth(0.5); // in millimeters

// Draw a horizontal line 10 pixel below $html2
$pdf->Line(10, $positionY + 2, 200, $positionY + 2);

$html4 = "<h3>Nama Pemesan</h3>";
$html5 = "<h3>:</h3>";
$html6 = "<h3>Email</h3>";
$html7 = "<h3>Total Sewa</h3>";
$html8 = "<h3>Lama Sewa</h3>";
$html9 = "<h3>Kamar</h3>";
$html10 = "<h3>Harga Kamar</h3>";
$html11 = "<h3>status Pembayaran</h3>";
$html12 = "<h3>Status Pemesanan</h3>";
$html13 = "<h3>Total Bayar</h3>";
$html14 = "<h3>Sisa Bayar</h3>";
$pdf->writeHTMLCell(0, 0, 10, 40, $html4, 0, 1, 0, true, '', true);
$pdf->writeHTMLCell(0, 0, 70, 40, $html5, 0, 1, 0, true, '', true);
$pdf->writeHTMLCell(0, 0, 70, 50, $html5, 0, 1, 0, true, '', true);
$pdf->writeHTMLCell(0, 0, 70, 60, $html5, 0, 1, 0, true, '', true);
$pdf->writeHTMLCell(0, 0, 70, 70, $html5, 0, 1, 0, true, '', true);
$pdf->writeHTMLCell(0, 0, 70, 80, $html5, 0, 1, 0, true, '', true);
$pdf->writeHTMLCell(0, 0, 70, 90, $html5, 0, 1, 0, true, '', true);
$pdf->writeHTMLCell(0, 0, 70, 100, $html5, 0, 1, 0, true, '', true);
$pdf->writeHTMLCell(0, 0, 70, 110, $html5, 0, 1, 0, true, '', true);
$pdf->writeHTMLCell(0, 0, 70, 120, $html5, 0, 1, 0, true, '', true);
$pdf->writeHTMLCell(0, 0, 70, 130, $html5, 0, 1, 0, true, '', true);
$pdf->writeHTMLCell(0, 0, 10, 50, $html6, 0, 1, 0, true, '', true);
$pdf->writeHTMLCell(0, 0, 10, 60, $html7, 0, 1, 0, true, '', true);
$pdf->writeHTMLCell(0, 0, 10, 70, $html8, 0, 1, 0, true, '', true);
$pdf->writeHTMLCell(0, 0, 10, 80, $html9, 0, 1, 0, true, '', true);
$pdf->writeHTMLCell(0, 0, 10, 90, $html10, 0, 1, 0, true, '', true);
$pdf->writeHTMLCell(0, 0, 10, 100, $html11, 0, 1, 0, true, '', true);
$pdf->writeHTMLCell(0, 0, 10, 110, $html12, 0, 1, 0, true, '', true);
$pdf->writeHTMLCell(0, 0, 10, 120, $html13, 0, 1, 0, true, '', true);
$pdf->writeHTMLCell(0, 0, 10, 130, $html14, 0, 1, 0, true, '', true);

$html15 = "
<style>
h3{
    color:#272829;
    font-weight:normal;
}
</style>
<h3>".$dataPemesanan['nama_pemesan']."</h3>";
$html16 = "
<style>
h3{
    color:#272829;
    font-weight:normal;
}
</style>
<h3>".$dataPemesanan['email_pemesan']."</h3>";
$html17 = "
<style>
h3{
    color:#272829;
    font-weight:normal;
}
</style>
<h3>".$dataPemesanan['total_bulan_sewa']." Bulan</h3>";
$html18 = "
<style>
h3{
    color:#272829;
    font-weight:normal;
}
</style>
<h3>".$sewaDari." - ".$sewaHingga."</h3>";
$html19 = "
<style>
h3{
    color:#272829;
    font-weight:normal;
}
</style>
<h3>".$dataPemesanan['nama_kost']."</h3>";
$html20 = "
<style>
h3{
    color:#272829;
    font-weight:normal;
}
</style>
<h3>Rp.".number_format($dataPemesanan['harga_kost'], 0, ',', '.')."</h3>";
$html21 = "
<style>
h3{
    ".($dataPemesanan['status_pembayaran'] == 'L' ? 'color:green;
    font-weight:normal;' : 'color:#F94C10;
    font-weight:normal;')."
}
</style>
<h3>".($dataPemesanan['status_pembayaran'] == 'L' ? 'Lunas' : 'Belum Lunas')."</h3>";
$html22 = "
<style>
h3{
    ".($dataPemesanan['status_pemesanan'] == 'A' ? 'color:green;
    font-weight:normal;' : 'color:#F94C10;
    font-weight:normal;')."
}
</style>
<h3>".($dataPemesanan['status_pemesanan'] == 'A' ? 'Terkonfirmasi' : 'Menunggu Konfirmasi')."</h3>";
$html23 = "
<style>
h3{
    color:#272829;
    font-weight:normal;
}
</style>
<h3>Rp.".number_format($dataPemesanan['jumlah'], 0, ',', '.')."</h3>";
$html24 = "
<style>
h3{
    color:#272829;
    font-weight:normal;
}
</style>
<h3>Rp.".number_format($dataPemesanan['sisa_bayar'], 0, ',', '.')."</h3>";
$pdf->writeHTMLCell(0, 0, 75, 40, $html15, 0, 1, 0, true, '', true);
$pdf->writeHTMLCell(0, 0, 75, 50, $html16, 0, 1, 0, true, '', true);
$pdf->writeHTMLCell(0, 0, 75, 60, $html17, 0, 1, 0, true, '', true);
$pdf->writeHTMLCell(0, 0, 75, 70, $html18, 0, 1, 0, true, '', true);
$pdf->writeHTMLCell(0, 0, 75, 80, $html19, 0, 1, 0, true, '', true);
$pdf->writeHTMLCell(0, 0, 75, 90, $html20, 0, 1, 0, true, '', true);
$pdf->writeHTMLCell(0, 0, 75, 100, $html21, 0, 1, 0, true, '', true);
$pdf->writeHTMLCell(0, 0, 75, 110, $html22, 0, 1, 0, true, '', true);
$pdf->writeHTMLCell(0, 0, 75, 120, $html23, 0, 1, 0, true, '', true);
$pdf->writeHTMLCell(0, 0, 75, 130, $html24, 0, 1, 0, true, '', true);
// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output('kostbuidainvoice.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+ x