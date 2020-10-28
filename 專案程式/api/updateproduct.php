<?php
    // read products
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
header('Access-Control-Allow-Origin: http://localhost:8080');
header('Access-Control-Allow-Credentials: true');
// initialize object

// get keywords
$input_data = file_get_contents('php://input');
$input_data = json_decode($input_data);
$input_data = $input_data->data;
$mysqli = new Mysqli('localhost', 'root', 'llll4315', 'project');
$ww = "select MAX(Id) from product;";
$mysqli->options(MYSQLI_OPT_INT_AND_FLOAT_NATIVE, 1); 
$res = $mysqli->query($ww);
$arr = array(); 
while($row = $res->fetch_assoc()){
    $arr[] = $row;
};
$Id_number = $arr[0]['MAX(Id)'];
$Id_number += 1;
$sql = "insert into product values($Id_number, '$input_data->Despription'
,".(int)$input_data->Price.", '$input_data->Name', ".(int)$input_data->Quantity."
    , '$input_data->Photo', ".(int)$input_data->Selling_Volume.", ".(int)$input_data->On_Market."
);";
$res = $mysqli->query($sql);  
$ww = "select count(Id) from product;";
$mysqli->options(MYSQLI_OPT_INT_AND_FLOAT_NATIVE, 1); 
$res = $mysqli->query($ww);
$mysqli->close();
$arr = array(); 
while($row = $res->fetch_assoc()){
    $arr[] = $row;
};
$Id_number_1 = $arr[0]['count(Id)'];
$object = new StdClass();
$object->success = true;

echo json_encode($object);

?>