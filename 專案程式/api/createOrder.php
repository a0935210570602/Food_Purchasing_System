<?php
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
header('Access-Control-Allow-Origin: http://localhost:8080');
header('Access-Control-Allow-Credentials: true');
$post = file_get_contents('php://input');
$res = json_decode($post);
$cid = $res->C_Id;

$mysqli = new Mysqli('localhost', 'root', 'llll4315', 'project');
$mysqli->options(MYSQLI_OPT_INT_AND_FLOAT_NATIVE, 1);
$sql = "select*from orders where C_order = '" . $cid . "'";
$res = $mysqli->query($sql);
$arr = array(); 
while($row = $res->fetch_assoc()){
    $arr[] = $row;
}
$orderCount = count($arr);
$sql = "select*from cart where C_Id = '" . $cid . "'";
$res = $mysqli->query($sql);
$arrOfCart = array();  
while($row = $res->fetch_assoc()){
    $arrOfCart[] = $row;
}
$cartCount = count($arrOfCart);
for($i=0;$i<$cartCount;$i++){
    $date = new DateTime();
    $orderCount = $orderCount+1;
    $sql = "insert into orders values('". $orderCount ."', '未取貨','". $arrOfCart[$i]["Total_price"] ."','". $arrOfCart[$i]["Quantity"] ."','". $date->getTimestamp() ."','". $arrOfCart[$i]["P_Id"] ."','". $cid ."')";
    $res = $mysqli->query($sql);
}
$sql = "delete from cart where C_Id = '" . $cid . "'";
$res = $mysqli->query($sql);
$arr = array("success"=> true);
$mysqli->close();
echo json_encode($arr);
?>