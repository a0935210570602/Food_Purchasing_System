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
$new_data = $input_data->newData;
$old_data = $input_data->oldData;

$mysqli = new Mysqli('localhost', 'root', 'llll4315', 'project');
$sql = "update product SET Despription = '$new_data->Despription',
Price = ".(int)$new_data->Price.", Name ='$new_data->Name', Quantity = ".(int)$new_data->Quantity."
,Photo = '$new_data->Photo',Selling_volume = ".(int)$new_data->Selling_Volume.", On_Market = ".(int)$new_data->On_Market."
where Name = '$old_data->Name'
;";
$res = $mysqli->query($sql);  

$object = new StdClass();
$object->success = true;
echo json_encode($object);
?>