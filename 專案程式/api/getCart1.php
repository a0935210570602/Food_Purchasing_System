<?php
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
header('Access-Control-Allow-Origin: http://localhost:8080');
header('Access-Control-Allow-Credentials: true');
include_once './function.php';
// initialize object
$product = new Product();
 
// get keywords
$keywords=file_get_contents('php://input');
$keywords_1 = json_decode($keywords);
// echo gettype($keywords_1);
// echo $keywords_1->ss;

// if $keywords_1->s 
//     echo $keywords_1->s;
// if $keywords_1->ss 
//     echo $keywords_1->ss;
if(!$keywords_1){
    // $mysqli = new Mysqli('localhost', 'root', 'llll4315', 'project');
    // $sql = "select P_ID, cart.Quantity,product.Name,product.Price,product.Photo from cart,product
    // where cart.P_ID = product.ID and cart.C_ID = 1";
    // $mysqli->options(MYSQLI_OPT_INT_AND_FLOAT_NATIVE, 1); 
    // $res = $mysqli->query($sql);  //
    // $mysqli->close();
    // $arr = array(); 
    // while($row = $res->fetch_assoc()){
    //     $arr[] = $row;
    // };
    // $key = array_keys($arr);
    // echo "<br>arr<br>";
    // echo json_encode($arr);
    // $count = 0;
    // $answer=array();
    // function fun_adm_each(&$array){
    //     $res = array();
    //     $key = key($array);
    //     if($key !== null){
    //         next($array); 
    //         $res[1] = $res['value'] = $array[$key];
    //         $res[0] = $res['key'] = $key;
    //     }else{
    //         $res = false;
    //     }
    //     return $res;
    // }
    // foreach ($arr as $value) {
    //     $object = new StdClass();
    //     $count = 0;
    //     $product = new StdClass();
    //     while (list($key, $valu) = fun_adm_each($value)) {
    //         if ($count<2){
    //             print "key: $key, valu: $valu\n\n";
    //             $object->$key = $valu;
    //             print "object: ";
    //             echo json_encode($object);
    //             print "\n\n";
    //         }else{
    //             $product->$key = $valu;
    //             print "\n\n";
    //         }
    //         $count = $count+1;
    //     }
    //     $object->product = $product;
    //     print "GGGGGGGGGGGGGG\n\n";
    //     echo json_encode($object);

    //     $answer[] = $object;
    //     print "\nGGGGGGGGGGGGGG\n\n";
    //     echo json_encode($answer);
    //     print "\n++++++++++++++\n\n";
    //     // print "<br>***********<br>";
    //     // echo json_encode( $object );
    //     // print "<br>***********<br>";
    //     // echo json_encode( $answer );
    //     // foreach ($key as $a) {
    //     //     $k = json_encode($a);
    //     //     // $object->Name = $ca["Name"];
    //     //     print "Key: $k<br>";
    //     // } 
    //     // foreach ($value as $ca) {
    //     //     $j = json_encode($ca);
    //     //     // $object->Name = $ca["Name"];
    //     //     print "Value: $j<br>";
    //     // } 
    // } 
    // $ff=new StdClass();
    // $ff->carts = $answer;
    // echo json_encode( $ff );

    // echo gettype($arr[0]);
}
else if (array_key_exists('s',$keywords_1) ){
    //  echo 11111111111;
    $stmt = $product->search_1($keywords_1->s);
    echo json_encode($stmt);
}
else if (array_key_exists('ss',$keywords_1) ){
    $object = new StdClass();
    $object->success = true;
    // echo json_encode($object);
    if($product->add_product($keywords_1->ss));
    {
        echo json_encode($object);
    }
}
else if (array_key_exists('sss',$keywords_1) ){
    $object = new StdClass();
    $object->success = true;
    // echo json_encode($object);
    if($product->remove_product($keywords_1->sss));
    {
        echo json_encode($object);
    }
}
//     $cart = array(
//         "carts" => array(
//             array(
//                 "P_ID" => 1,
//                 "Quantity" => 4,
//                 "product" => array(
//                     "Name" => "【不二家】牛奶袋糖",
//                     "Price" => 100,
//                     "Photo" => "https://img2.momoshop.com.tw/goodsimg/0002/295/861/2295861_B.jpg?t=1566308710"
//                 )
//             ),
//             array(
//                 "P_ID" => 2,
//                 "Quantity" => 7,
//                 "product" => array(
//                     "Name" => "【格力高】Pocky極細巧克力棒",
//                     "Price" => 158,
//                     "Photo" => "https://img2.momoshop.com.tw/goodsimg/0004/638/152/4638152_R.jpg?t=1569932646"
//                 )
//             ),
//             array(
//                 "P_ID" => 6,
//                 "Quantity" => 3,
//                 "product" => array(
//                     "Name" => "【巧趣多】蛋黃哥巧克力糖造型蛋",
//                     "Price" => 165,
//                     "Photo" => "https://img2.momoshop.com.tw/goodsimg/0007/229/911/7229911_B.jpg?t=1574353673"
//                 )
//             )
//         )
//     );
//     echo json_encode( $cart );
?>