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
$sql = "delete from product where Id = " . $res->Id . "";
$res = $mysqli->query($sql);  
$object = new StdClass();
$object->success = true;
echo json_encode($object);
$mysqli->close();
?>