<?php
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
header('Access-Control-Allow-Origin: http://localhost:8080');
header('Access-Control-Allow-Credentials: true');
$cart = array(
    "carts" => array(
        array(
            "P_ID" => 1,
            "Quantity" => 4,
            "product" => array(
                "Name" => "【不二家】牛奶袋糖",
                "Price" => 100,
                "Photo" => "https://img2.momoshop.com.tw/goodsimg/0002/295/861/2295861_B.jpg?t=1566308710"
            )
        ),
        array(
            "P_ID" => 2,
            "Quantity" => 7,
            "product" => array(
                "Name" => "【格力高】Pocky極細巧克力棒",
                "Price" => 158,
                "Photo" => "https://img2.momoshop.com.tw/goodsimg/0004/638/152/4638152_R.jpg?t=1569932646"
            )
        ),
        array(
            "P_ID" => 6,
            "Quantity" => 3,
            "product" => array(
                "Name" => "【巧趣多】蛋黃哥巧克力糖造型蛋",
                "Price" => 165,
                "Photo" => "https://img2.momoshop.com.tw/goodsimg/0007/229/911/7229911_B.jpg?t=1574353673"
            )
        )
    )
);
echo json_encode( $cart );
?>