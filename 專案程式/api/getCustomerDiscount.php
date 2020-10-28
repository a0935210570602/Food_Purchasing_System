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
$sql = "select*from decide where C_id = '" . $cid . "'";
$res = $mysqli->query($sql);  
$arr = array(); 
while($row = $res->fetch_assoc()){
    $arr[] = $row;
}
$decideCount = count($arr);


$result=array();
for($i=0;$i<$decideCount;$i++){
    //shipping
    $sql = "select * from SHIPPING where S_id = '" . $arr[$i]["DD_id"] . "'";
    $res = $mysqli->query($sql);
    $arrOfShipping = array(); 
    while($row = $res->fetch_assoc()){
        $arrOfShipping[] = $row;
    }
    if($arrOfShipping != null)
    {
        $object = new StdClass();
        $sql = "select * from discount where Id = '" . $arrOfShipping[0]["S_id"] . "'";
        $res = $mysqli->query($sql);
        $arrOfDiscount = array(); 
        while($row = $res->fetch_assoc()){
            $arrOfDiscount[] = $row;
        }

        $object->Name = $arrOfDiscount[0]["Name"];
        $object->Shipping_fee = $arrOfShipping[0]["Shipping_fee"];
        $result['shipping_fee'] = $object;

        continue;
    }
    //level
    $sql = "select * from LEVEL where L_id = '" . $arr[$i]["DD_id"] . "'";
    $res = $mysqli->query($sql);
    $arrOfLevel = array(); 
    while($row = $res->fetch_assoc()){
        $arrOfLevel[] = $row;
    }
    if($arrOfLevel != null)
    {
        $object = new StdClass();
        $sql = "select * from discount where Id = '" . $arrOfLevel[0]["L_id"] . "'";
        $res = $mysqli->query($sql);
        $arrOfDiscount = array(); 
        while($row = $res->fetch_assoc()){
            $arrOfDiscount[] = $row;
        }
        $object->Name = $arrOfDiscount[0]["Name"];
        $object->Customer_class_rate = $arrOfLevel[0]["Customer_class_rate"];
        $result['member_class'] = $object;

        continue;
    }
    //event
    $sql = "select * from event where E_id = '" . $arr[$i]["DD_id"] . "'";
    $res = $mysqli->query($sql);
    $arrOfLevel = array(); 
    while($row = $res->fetch_assoc()){
        $arrOfEvent[] = $row;
    }
    if($arrOfEvent != null)
    {
        $object = new StdClass();
        $sql = "select * from discount where Id = '" . $arrOfEvent[0]["E_id"] . "'";
        $res = $mysqli->query($sql);
        $arrOfDiscount = array(); 
        while($row = $res->fetch_assoc()){
            $arrOfDiscount[] = $row;
        }
        $object->Name = $arrOfDiscount[0]["Name"];
        $object->Event_rate = $arrOfEvent[0]["Event_rate"];
        $result['event'] = $object;

        continue;
    }

}

echo json_encode($result);
$mysqli->close();
?>