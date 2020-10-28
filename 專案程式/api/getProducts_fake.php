<?php
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
header('Access-Control-Allow-Origin: http://localhost:8080');
header('Access-Control-Allow-Credentials: true');
$post = file_get_contents('php://input');
$res = json_decode($post);

$mysqli = new Mysqli('localhost', 'root', 'llll4315', 'project');
$mysqli->options(MYSQLI_OPT_INT_AND_FLOAT_NATIVE, 1);

if($res->State=="getProducts_fake"){

    $sql = "select* from product";
    $res = $mysqli->query($sql);  
    $arr = array();
    $arrOfProduct = array(); 
    $result = new StdClass();
    while($row = $res->fetch_assoc()){
        $arr[] = $row;
    }
    // echo json_encode($arr);
    
    for($i=0;$i<count($arr);$i++){
        $obj = new StdClass();
        $product_list = new StdClass();
        $arrayOfProductList = array();
        $obj->ID = $arr[$i]["Id"];
        $obj->Name = $arr[$i]["Name"];
        $obj->Price = $arr[$i]["Price"];
        $obj->Despription = $arr[$i]["Despription"];
        $obj->Photo = $arr[$i]["Photo"];
        $obj->Quantity = $arr[$i]["Quantity"];
        $obj->Selling_volume = $arr[$i]["Selling_volume"];
        $obj->On_Market = $arr[$i]["On_Market"];
        $arrOfProduct[$i]=$obj;
        }
    $result->products = $arrOfProduct;
    echo json_encode($result);  
    
    $mysqli->close();
}else if($res->State=="getProduct_fake"){
    $sql = "select* from product where Id = '" . $res->Id . "'";
    $res = $mysqli->query($sql);  
    $arr = array();
    $arrOfProduct = array(); 
    $result = new StdClass();
    while($row = $res->fetch_assoc()){
        $arr[] = $row;
    }
    // echo json_encode($arr);
    
    for($i=0;$i<count($arr);$i++){
        $obj = new StdClass();
        $product_list = new StdClass();
        // $arrayOfProductList = array();
        $obj->ID = $arr[$i]["Id"];
        $obj->Name = $arr[$i]["Name"];
        $obj->Price = $arr[$i]["Price"];
        $obj->Despription = $arr[$i]["Despription"];
        $obj->Photo = $arr[$i]["Photo"];
        $obj->Quantity = $arr[$i]["Quantity"];
        $obj->Selling_volume = $arr[$i]["Selling_volume"];
        $obj->On_Market = $arr[$i]["On_Market"];
        // $arrOfProduct[$i]=$obj;
        }
        $result->products = $obj;
        echo json_encode($result);  
    
    $mysqli->close();
}

?>