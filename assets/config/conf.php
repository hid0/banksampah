<?php 

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

function filter_sqli($id) {
    $tolak = ['union','select','group','concat','order by'];
    $p = str_replace(implode("|",$tolak),"",$id);
    $p = abs($id);
    return $p;
}
function create_session($data = array()){
    $np = "";
    if(is_array($data)) {
        foreach($data as $name => $val) {
            $np.= $_SESSION[''.$name.''] = $val;
        }
    }
    return $np;
}
function get_session($name) {
    if(empty($_SESSION[''.$name.''])) {
        $result = "empty";
    } else {
        $result = $_SESSION[''.$name.''];
    }
    return $result;
}
function del_session() {
    return session_destroy();
}

?>