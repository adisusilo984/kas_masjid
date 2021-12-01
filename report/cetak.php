<?php

include "../inc/koneksi.php";

//FUNGSI RUPIAH
include "../inc/rupiah.php";

$sql = $koneksi->query("SELECT SUM(masuk) as tot_masuk  from kas_masjid where jenis='Masuk'");
while ($data = $sql->fetch_assoc()) {
  $masuk = $data['tot_masuk'];
}


$sql = $koneksi->query("SELECT SUM(keluar) as tot_keluar  from kas_masjid where jenis='Keluar'");
while ($data = $sql->fetch_assoc()) {
  $keluar = $data['tot_keluar'];
}

$saldo = $masuk - $keluar;

require_once '../vendor/autoload.php';


$mpdf = new \Mpdf\Mpdf();

$html = '
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel ="stylesheet" href="../style/print.css">
    <title>Laporan keungan Mushalla</title>
</head>

<body>
<img src="../dist/img/avatar.png" style="float: left; height: 120px">
<div>
  <div style="font-size: 35px"; align="center">Laporan Rekapitulasi Kas MUSHALLA AL-IKHLAS
  <p style="font-size: 12px"; align="center">Perum Graha Namrina Tahap 2 Rt 07/ Rw 13, Tanjung Riau-Sekupang, Batam</p></div>
  <div style="font-size: 12px"></div>
</div>
<hr style="height: 5px;border-width:0;color:black;background-color:gray">
<div align="right">Tanggal Cetak: ' . date("d-m-y") . '</div>
<br>
<br>

<style>
td{
  padding: 5px;
  font-size: 14px;
  font-family: arial;
}
</style>
<table border="1" 
cellspacing="1" 
width="100%">
      <thead>
        <tr>
          <th>No.</th>
          <th>Tanggal</th>
          <th>Uraian</th>
          <th>Pemasukan</th>
          <th>Pengeluaran</th>
        </tr>
      </thead>';
$html .= '
<tbody>' .
  $i = 1;

$sql_tampil = "select * from kas_masjid order by tgl_km asc";
$query_tampil = mysqli_query($koneksi, $sql_tampil);
while ($data = mysqli_fetch_array($query_tampil, MYSQLI_BOTH)) {
  $html .= '
      <tr>
      <td width="5%">' . $i++ . '</td>
      <td width="15%" align="center">' . $tgl = $data['tgl_km'] . date("d-m-y", strtotime($tgl)) . '</td>
      <td width="45%">' . $data['uraian_km'] . '</td>
      <td width="20%" align="right">' . rupiah($data['masuk']) . '</td>
      <td width="20%" align="right">' . rupiah($data['keluar']) . '</td>
      </tr>
      </tbody>';
}
$html .= ' 
<tr>
<td colspan="5"><br></td>
</tr> 
  <tr>
      <td colspan="3" style="font-family:monospace;"><b>Total Pemasukan</b></td>
      <td colspan="2"><b>' . rupiah($masuk) . '</b></td>
      </tr>';
$html .= ' 
  <tr>
      <td colspan="3" style="font-family:monospace;"><b>Total Pengeluaran</b></td>
      <td colspan="2" align="right"><b>' . rupiah($keluar) . '</b></td>
      </tr>';
$html .= ' 
  <tr>
      <td colspan="3" style="font-family:monospace;"><b>SISA SALDO</b></td>
      <td colspan="2" align="center"><b>' . rupiah($saldo) . '</b></td>
      </tr>';
$html .= '
    </table>
</body>

</html>
';
$mpdf->WriteHTML($html);
$mpdf->Output();
