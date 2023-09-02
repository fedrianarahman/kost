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
require_once('../tcpdf/examples/tcpdf_include.php');
include './controller/conn.php';

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->setPrintHeader(false);
$pdf->AddPage();

// query databse
$tglDari = $_GET['tgl_awal'];
$tglHingga = $_GET['tgl_akhir'];
$tglSaatIni = "";
$totalTransaksi = 0;
if ($tglDari!= null && $tglHingga != null) {
    $tglDari1 = strtotime($tglDari);
    $tglHingga1 = strtotime($tglHingga);
    $tglSaatIni =  date('d F Y', $tglDari1) ." - ". date('d F Y', $tglHingga1);
    $getData = mysqli_query($conn, "SELECT * FROM tb_pemesanan WHERE created_at BETWEEN '$tglDari' AND DATE_ADD('$tglHingga', INTERVAL 1 DAY) AND status_pemesanan !='P' ORDER BY tb_pemesanan.id ASC");
} else {
    $tglSaatIni = date('F Y');
    $getData = mysqli_query($conn, "SELECT * FROM tb_pemesanan WHERE DATE_FORMAT(created_at, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m') AND status_pemesanan !='P' ORDER BY tb_pemesanan.id ASC");
}



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
<h1 style="text-align:center; margin-bottom:10px;">Rekap Data Penyewa</h1>';
$html2 = "<p style='text-align:center;'>Periode</p>";
$html3 = "<p style='font-size:5px;'></p>";
$htmlalamat = "<p style='font-size:5px;'>".$tglSaatIni."</p>";
// Print text using writeHTMLCell()
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
$pdf->writeHTMLCell(0, 0, 95, 20, $html2, 0, 1, 0, true, '', true);

if ($tglDari!= null && $tglHingga != null) {
    $pdf->writeHTMLCell(0, 0, 70, 25, $htmlalamat, 0, 1, 0, true, '', true);    
}else {
    $pdf->writeHTMLCell(0, 0, 92, 25, $htmlalamat, 0, 1, 0, true, '', true);
}

// Get the position after writing $html2
$positionY = $pdf->getY();

// Set line width
$pdf->SetLineWidth(0.5); // in millimeters

// Draw a horizontal line 10 pixel below $html2
$pdf->Line(10, $positionY + 2, 200, $positionY + 2);

// tabel
$htmlTabel = '
<style>
table {
    background-repeat: no-repeat;
    background-position: center;
    background-size: cover;
    border-collapse: collapse; /* Menggabungkan garis tabel */
    width: 100%;
    
}
th {
    background-color: #E4E9FF; /* Menambahkan latar belakang biru pada header */
    color: #000; /* Mengubah warna teks menjadi putih */
    border: 1px solid black;
}
.border {
    border: 1px solid black; /* Menambahkan garis pada sel */
    margin-bottom:10px;
}
.no {
    width: 5%;
    font-weight: bold;
    text-align:center;
}
.nama_pemesan{
    width:16.7%;
    text-align:center;
    font-size:10px;
}
.transaksi{
    margin-top:10px;
}
</style>
<table>
<tr>
<th class="no">No</th>
<th class="nama_pemesan">Nama </th>
<th class="nama_pemesan">No Hp</th>
<th class="nama_pemesan">Kamar</th>
<th class="nama_pemesan">Lama Sewa</th>
<th class="nama_pemesan">Sewa Dari</th>
<th class="nama_pemesan">Sewa Hingga</th>
</tr>';
$no = 1;
while ($dataPesanan = mysqli_fetch_array($getData)) {
    $totalTransaksi += $dataPesanan['jumlah'];
    $tgk_dari = strtotime($dataPesanan['tgk_dari']);
    $tgl_hingga = strtotime($dataPesanan['tgl_hingga']);
    $htmlTabel.='<tr>
    <td class="border" >'.$no++.'</td>
    <td class="border">'.$dataPesanan['nama_pemesan'].'</td>
    <td class="border">'.$dataPesanan['no_hp_pemesan'].'</td>
    <td class="border">'.$dataPesanan['nama_kost'].'</td>
    <td class="border">'.$dataPesanan['total_bulan_sewa'].' Bulan</td>
    <td class="border">'.date('d F Y', $tgk_dari).'</td>
    <td class="border">'.date('d F Y', $tgl_hingga).'</td>
    </tr>';
}

$htmlTabel.='

<tr class="transaksi">
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
</tr>
</table>
';

$pdf->writeHTMLCell(0, 0, 0, 40, $htmlTabel, 0, 1, 0, true, '', true);

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output('kostbuidainvoice.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+ x