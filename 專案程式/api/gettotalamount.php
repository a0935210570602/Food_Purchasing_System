<?php
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
header('Access-Control-Allow-Origin: http://localhost:8080');
header('Access-Control-Allow-Credentials: true');

$mysqli = new Mysqli('localhost', 'root', 'llll4315', 'project');
$mysqli->options(MYSQLI_OPT_INT_AND_FLOAT_NATIVE, 1);
$sql = "select*from product";
$res = $mysqli->query($sql);
$arr = array(); 
while($row = $res->fetch_assoc()){
    $arr[] = $row;
}
$productCount = count($arr);
$result = array();
for($i=0;$i<$productCount;$i++){
    $obj = new StdClass();
    $obj->Name = $arr[$i]["Name"];
    $obj->Amount = $arr[$i]["Selling_volume"]; 
    array_push($result,$obj);
}
$mysqli->close();
echo json_encode($result);
?>