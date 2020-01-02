<?php 

date_default_timezone_get('Asia/Jakarta');

session_start();

$host = 'localhost';
$user = 'root';
$pass = '12'; //change with your password ^_^
$db   = 'db_banksampah';

$conn = mysqli_connect($host, $user, $pass, $db);

if (mysqli_connect_errno()) {
    mysqli_connect_error();
    exit();
}

function idr($idr) {
	$idr = "Rp ".number_format($idr,0,',','.');
	return $idr;
}

function localdate($tgl) {
	$date = substr($tgl, 8, 2);
	$month = substr($tgl, 5, 2);
	$years = substr($tgl, 0, 4);

	return $date."/".$month."/".$years;
}

function export_excel($file) {
    @header("Content-type: application/vnd-ms-excel");
    @header("Content-Disposition: attachment; filename=".$file);
}



?>