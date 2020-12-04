<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
include dirname(dirname(__FILE__)).'/db/Db.class.php';
$db = new Db();
$limit = isset($_GET['limit']) ? (int) $_GET['limit'] : 0;
$name = isset($_GET['name']) ? $_GET['name'] : '';
$sql_limit = '';
if (!empty($limit)) {
    $sql_limit = ' LIMIT 0,'.$limit;
}
$sql_name = '';
if (!empty($name)) {
    $sql_name = ' where ucc_name LIKE \'%'.$name.'%\' ';
}
$ucc_list = $db->query('select * from engine '.$sql_name.' '.$sql_limit);
$arr = array();
$arr['status'] = 'success';
$arr['message'] = 'all data';
$arr['num'] = count($ucc_list);
$arr['data'] = $ucc_list;
echo json_encode($arr);