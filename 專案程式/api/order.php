
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
if ($result->State == "orderHistory")
{
    $sql = "select* from orders where C_order = '" . $result->Id . "'";
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
}
else if($result->State == "changeOrderState")
{
    $sql = "update orders set State = '已取貨' where Id = '" . $result->OrderID . "' and C_order = '" . $result->Cid . "'";
    $res = $mysqli->query($sql);  
    $arr = array("success"=> true);
    echo json_encode($arr);
}
else if($result->State == "createOrder")
{
    $cid = $result->C_Id;
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
    echo json_encode($arr);
}

$mysqli->close();

?>