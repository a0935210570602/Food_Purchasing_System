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
$sql = "select* from MEMBERS where Id = '" . $result->Id . "'";
$res = $mysqli->query($sql);  
$arr = array(); 
while($row = $res->fetch_assoc()){
    $arr[] = $row;
}
if ($arr != null)
    echo json_encode($arr[0]);
$mysqli->close();
?>