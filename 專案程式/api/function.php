<?php
class Product{
    // read products
  function search_1($key){
    $mysqli = new Mysqli('localhost', 'root', 'llll4315', 'project');
    $sql = "select P_Id, cart.Quantity,product.Name,product.Price,product.Photo from cart,product
    where cart.P_Id = product.ID and cart.C_Id = $key";
    $mysqli->options(MYSQLI_OPT_INT_AND_FLOAT_NATIVE, 1); 
    $res = $mysqli->query($sql);  //
    $mysqli->close();
    $arr = array(); 
    while($row = $res->fetch_assoc()){
        $arr[] = $row;
    };
    
    $key = array_keys($arr);
    $count = 0;
    $answer=array();
    $ff=new StdClass();
    // $object->Photo = $arr[0]["Photo"];
    // echo json_encode( $arr );
    // print "<br>99999999999999999999999999999<br>";

    function fun_adm_each(&$array){
        $res = array();
        $key = key($array);
        if($key !== null){
            next($array); 
            $res[1] = $res['value'] = $array[$key];
            $res[0] = $res['key'] = $key;
        }else{
            $res = false;
        }
        return $res;
    }
    foreach ($arr as $value) {
        $object = new StdClass();
        $count = 0;
        $product = new StdClass();
        while (list($key, $valu) = fun_adm_each($value)) {
            if ($count<2){
                // print "kkkkk: $key, vvvvv: $valu<br>";
                $object->$key = $valu;
            }else{
                $product->$key = $valu;
            }
            $count = $count+1;
        }
        $object->product = $product;
        array_push($answer,$object);
    } 
    $ff->carts = $answer;
  
    return $ff;
  }
  function add_product($key){
    $mysqli = new Mysqli('localhost', 'root', 'llll4315', 'project');
    $ww = "select count(C_Id) from cart;";
    $mysqli->options(MYSQLI_OPT_INT_AND_FLOAT_NATIVE, 1); 
    $res = $mysqli->query($ww);
    $arr = array(); 
    while($row = $res->fetch_assoc()){
        $arr[] = $row;
    };
    $a1 = $arr[0]['count(C_Id)'];


    $query = "select Price from cart,product
      where $key->P_Id = product.Id;";
    // $totalprice = $price*$key->Quantity;
    $mysqli->options(MYSQLI_OPT_INT_AND_FLOAT_NATIVE, 1); 
    $res = $mysqli->query($query);
    $arr = array(); 
    while($row = $res->fetch_assoc()){
        $arr[] = $row;
    };
    $price =  $arr[0]['Price'];
    $totalprice =  $price*$key->Quantity;
    // echo $totalprice;
    $sql = "insert into cart (C_Id, P_Id, Quantity, Total_price)values
      ($key->C_Id, $key->P_Id,
      $key->Quantity, $totalprice
        )";
    $mysqli->options(MYSQLI_OPT_INT_AND_FLOAT_NATIVE, 1); 
    $mysqli->query($sql);


    $ww = "select count(C_Id) from cart;";
    $mysqli->options(MYSQLI_OPT_INT_AND_FLOAT_NATIVE, 1); 
    $res = $mysqli->query($ww);
    $arr = array(); 
    while($row = $res->fetch_assoc()){
        $arr[] = $row;
    };
    $a2 = $arr[0]['count(C_Id)'];
    
    if($a1 != $a2)
      return true;
    else
      return false;
  }
  function remove_product($key){
    $mysqli = new Mysqli('localhost', 'root', 'llll4315', 'project');
    $ww = "select count(C_Id) from cart;";
    $mysqli->options(MYSQLI_OPT_INT_AND_FLOAT_NATIVE, 1); 
    $res = $mysqli->query($ww);
    $arr = array(); 
    while($row = $res->fetch_assoc()){
        $arr[] = $row;
    };
    $a1 = $arr[0]['count(C_Id)'];
    $ww = "select MAX(Id) from cart where C_Id=$key->C_Id and P_Id=$key->P_Id and Quantity=$key->Quantity;";
    $mysqli->options(MYSQLI_OPT_INT_AND_FLOAT_NATIVE, 1); 
    $res = $mysqli->query($ww);
    $arr = array(); 
    while($row = $res->fetch_assoc()){
        $arr[] = $row;
    };
    $number = $arr[0]['MAX(Id)'];
    $ww = "delete from cart where Id = $number;";
    $mysqli->options(MYSQLI_OPT_INT_AND_FLOAT_NATIVE, 1); 
    $res = $mysqli->query($ww);
    
    $ww = "select count(C_Id) from cart;";
    $mysqli->options(MYSQLI_OPT_INT_AND_FLOAT_NATIVE, 1); 
    $res = $mysqli->query($ww);
    $arr = array(); 
    $object = new StdClass();
    $object->success = true;
    while($row = $res->fetch_assoc()){
        $arr[] = $row;
    };
    $a2 = $arr[0]['count(C_Id)'];

    if($a1 != $a2)
        return true;
    else
        return false;
  }
}
?>