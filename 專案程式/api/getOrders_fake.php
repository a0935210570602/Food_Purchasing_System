<?php
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
header('Access-Control-Allow-Origin: http://localhost:8080');
header('Access-Control-Allow-Credentials: true');
$post = file_get_contents('php://input');
$result = json_decode($post);


$mysqli = new Mysqli('localhost', 'root', 'llll4315', 'project');
$mysqli->options(MYSQLI_OPT_INT_AND_FLOAT_NATIVE, 1);


$sql = "select* from orders";
$res = $mysqli->query($sql);  
$arr = array();
$arrOfProduct = array(); 
$result = array();
while($row = $res->fetch_assoc()){
    $arr[] = $row;
}
for($i=0;$i<count($arr);$i++){
    $obj = new StdClass();
    $product_list = new StdClass();
    $arrayOfProductList = array();
    $obj->ID = $arr[$i]["ID"];
    $obj->Date = $arr[$i]["Date"];
    $obj->Price = $arr[$i]["Price"];
    $obj->State = $arr[$i]["State"];
    $obj->C_Order = $arr[$i]["C_order"];

    $sql = "select* from product where Id = '" . $arr[$i]["P_order"] . "'";
    $res = $mysqli->query($sql);
    $arrOfProduct = array(); 
    while($row = $res->fetch_assoc()){
        $arrOfProduct[] = $row;
    }
    $product_list->P_order = $arr[$i]["P_order"];
    $product_list->Name = $arrOfProduct[0]["Name"];
    $product_list->Quantity = $arr[$i]["Quantity"];
    // echo json_encode($product_list);  
    $arrayOfProductList[0]=$product_list;
    $obj->Product_List = $arrayOfProductList;
    array_push($result,$obj);
}
echo json_encode($result);

$mysqli->close();

?>