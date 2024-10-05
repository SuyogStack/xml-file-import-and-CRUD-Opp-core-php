<?php

include("../config/db.php");

$record_id=$_REQUEST['record_id'];

// $sql = "DELETE FROM book WHERE id='".$record_id."'";
$sql = "UPDATE book set deleted_at='1' WHERE id='".$record_id."'";

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