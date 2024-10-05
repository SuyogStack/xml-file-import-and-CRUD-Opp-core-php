<?php
include("../config/db.php");
$data=array();
$date=date("Y-m-d h:i:s");

$record_id=$_REQUEST['record_id'];
$author=$_REQUEST['author'];
$title=$_REQUEST['title'];
$genre=$_REQUEST['genre'];
$price=$_REQUEST['price'];
$publish_date=$_REQUEST['publish_date'];
$description=$_REQUEST['description'];

 $sql = "UPDATE book set author='".$author."',title='".$title."',genre='".$genre."',price='".$price."',publish_date='".$publish_date."',description='".$description."',updated_at='".$date."' WHERE id='".$record_id."'";

if ($conn->query($sql) === TRUE) {
    $data["status"]="201";
    $data["msg"]="success";
    $data["data"]=$conn;

    echo json_encode($data,true);
} else {
    $data["status"]="204";
    $data["msg"]="fail";
    $data["error"]=$sql;
    $data["data"]=$conn;

    echo json_encode($data,true);
}