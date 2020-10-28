<?php
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
header('Access-Control-Allow-Origin: http://localhost:8080');
header('Access-Control-Allow-Credentials: true');
$cart = array(
    "success"=> true,
    "products" => array(
        array(
            "ID"=> 1,
            "Name"=> "【不二家】牛奶袋糖",
            "Price"=> 100,
            "Despription"=> "風行日本經典牛奶糖。使用北海道新鮮牛乳製成，濃濃奶香~香醇好滋味~",
            "Photo"=>"https://img2.momoshop.com.tw/goodsimg/0002/295/861/2295861_B.jpg?t=1566308710",
            "Quantity"=> 9,
            "Selling_Volume"=> 400,
            "On_Market"=> true
        ),
        array(
            "ID"=> 2,
            "Name"=> "【格力高】Pocky極細巧克力棒",
            "Price"=> 158,
            "Despription"=> "推出了把Pocky作為旅遊小夥，細細的巧克力棒，味道也不錯，也可一大把享受滿滿巧克力香甜滋!",
            "Photo"=>"https://img2.momoshop.com.tw/goodsimg/0004/638/152/4638152_R.jpg?t=1569932646",
            "Quantity"=>250,
            "Selling_Volume"=> 374,
            "On_Market"=> true
        ),
        array(
            "ID"=> 3,
            "Name"=> "【哈瑞寶】快樂可樂風味Q軟糖",
            "Price"=> 124,
            "Despription"=> "世界知名品牌，德國原裝進口。大人小孩都喜歡~",
            "Photo"=>"https://img1.momoshop.com.tw/goodsimg/0006/848/254/6848254_R.jpg?t=1563460816",
            "Quantity"=> 184,
            "Selling_Volume"=> 53,
            "On_Market"=> true
        ),
        array(
            "ID"=> 4,
            "Name"=> "【77】松露巧克力234g",
            "Price"=> 120,
            "Despription"=> "口感香濃、入口即化，巧克力味道濃郁絲滑。",
            "Photo"=>"https://img2.momoshop.com.tw/goodsimg/0005/170/993/5170993_R.jpg?t=1527246901",
            "Quantity"=> 93,
            "Selling_Volume"=> 23,
            "On_Market"=> false
        ),
        array(
            "ID"=> 5,
            "Name"=> "【義美】小泡芙巧克力-三入",
            "Price"=> 86,
            "Despription"=> "義美小泡芙，有你好幸芙!每一口都充滿幸芙的滋味!酥脆餅殼包裹濃濃巧克力內餡!",
            "Photo"=>"https://img3.momoshop.com.tw/goodsimg/0004/285/993/4285993_R.jpg?t=1547765822",
            "Quantity"=> 0,
            "Selling_Volume"=> 239,
            "On_Market"=> true
        ),
        array(
            "ID"=> 6,
            "Name"=> "【巧趣多】蛋黃哥巧克力糖造型蛋",
            "Price"=> 165,
            "Despription"=> "2019年限量聖誕節蛋黃哥造型，滑順口感讓人唇齒流著巧克力香!",
            "Photo"=>"https://img1.momoshop.com.tw/goodsimg/0007/229/911/7229911_R.jpg?t=1574353673",
            "Quantity"=> 403,
            "Selling_Volume"=> 104,
            "On_Market"=> true
        ),
        array(
            "ID"=> 7,
            "Name"=> "【Tasto】帝王級麻辣味洋芋片",
            "Price"=> 55,
            "Despription"=> "整顆新鮮馬鈴薯切片製成，一口薯片一口辣椒乾，挑戰你辣覺新極限。",
            "Photo"=>"https://img4.momoshop.com.tw/goodsimg/0006/647/308/6647308_R.jpg?t=1571231224",
            "Quantity"=> 58,
            "Selling_Volume"=> 36,
            "On_Market"=> true
        )
    )
);
echo json_encode( $cart );

?>