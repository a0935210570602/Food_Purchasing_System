<?php
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
header('Access-Control-Allow-Origin: http://localhost:8080');
header('Access-Control-Allow-Credentials: true');
$cart = array(
    "shipping_fee" => array(
        "Name" => "達標免運",
        "Shipping_fee" => 500
    ),
    "member_class" => array(
        "Name" => "會員優惠",
        "Customer_class_rate" => 0.7
    ),
    "event" => array(
        "Name" => "年末特惠",
        "Event_rate" => 0.8
    )
);
echo json_encode( $cart );
?>