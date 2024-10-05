<?php

include("../config/db.php");
$data=array();

$sql = "SELECT * FROM book where deleted_at='0' and id='".$_REQUEST['record_id']."'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {

    $row = $result->fetch_assoc();

    $data['status']="201";
    $data['msg']="success";
    $data['id']=$row['id'];
    $data['author']=$row['author'];
    $data['title']=$row['title'];
    $data['genre']=$row['genre'];
    $data['price']=$row['price'];
    $data['publish_date']=$row['publish_date'];
    $data['description']=$row['description'];
    
    echo json_encode($data,true);
}
else
{
    $data['status']="204";
    $data['msg']="fail";
    
    echo json_encode($data,true);
}