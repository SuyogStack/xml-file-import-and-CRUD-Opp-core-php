<?php

include("../config/db.php");

$data=array();
$date=date("Y-m-d h:i:s");

$sql = "INSERT INTO book (author, title, genre ,price ,publish_date ,description ,record_type ,created_at ,updated_at ,deleted_at) VALUES ('".$_REQUEST['author']."','".$_REQUEST['title']."','".$_REQUEST['genre']."','".$_REQUEST['price']."','".$_REQUEST['publish_date']."','".$_REQUEST['description']."','manually created','".$date."','".$date."','0')";
// die();
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