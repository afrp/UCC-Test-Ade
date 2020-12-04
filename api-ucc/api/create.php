<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header("content-type: multipart/form-data");
include dirname(dirname(__FILE__)).'/db/Db.class.php';
$db = new Db();

$received_data=json_decode(file_get_contents("php://input"));
$ucc_name = $received_data->ucc_name;
$ucc_type = $received_data->ucc_engine_disp_type;
$hurup= "UCC";
$date=date('Ymd-His');
$new_code= $hurup ."-" . $ucc_name."-".$date;

if (empty($ucc_name)) {
    $arr = array();
    $arr['info'] = 'error';
    $arr['msg'] = 'no more data';
    echo json_encode($arr);
    exit();
}


if ($ucc_type == "Centimetres Cubic"){
    $cm_cubik = $received_data->ucc_engine_disp;
    $inc_cubik = $cm_cubik*0.061024;
    $liter = $cm_cubik/1000.0;
}elseif ($ucc_type == "Cubic Inches"){
    $inc_cubik = $received_data->ucc_engine_disp;
    $cm_cubik = $inc_cubik/0.061024;
    $liter = $inc_cubik/61.024;
} elseif ($ucc_type == "Liter"){
    $liter = $received_data->ucc_engine_disp;
    $inc_cubik = $liter*61.024;
    $cm_cubik = $liter*0.0010000;
}

$datas = array();
$datas['ucc_id']= $new_code; 
$datas['ucc_name'] = $ucc_name;
$datas['ucc_engine_cm'] = $cm_cubik;
$datas['ucc_engine_inc'] = $inc_cubik;
$datas['ucc_engine_lit'] = $liter;
$datas['ucc_engine_pow'] = $received_data->ucc_engine_pow;
$datas['ucc_price'] = $received_data->ucc_price;
$datas['ucc_loc'] = $received_data->ucc_loc;
$exec = $db->insert('engine', $datas);

if (!$exec) {
    $arr = array();
    $arr['info'] = 'error';
    $arr['msg'] = 'Query not working.';
    echo json_encode($arr);
    exit();
}
$arr = array();
$arr['info'] = 'success';
$arr['msg'] = 'get the data.';
echo json_encode($arr);