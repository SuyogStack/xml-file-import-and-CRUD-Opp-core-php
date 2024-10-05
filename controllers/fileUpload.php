<?php

include("../config/db.php");

if (isset($_FILES["fileToUpload"])) {

    $filename = $_FILES["fileToUpload"]["name"];
    
    $info = pathinfo($filename);
    $ext = $info['extension']; // get the extension of the file
    $newname = $filename; 

    $target = '../files/'.$newname;
    move_uploaded_file( $_FILES['fileToUpload']['tmp_name'], $target);
    

    if (is_readable($filename)) {
        $xml = simplexml_load_file($filename);
    } else {
        echo "Error: File is not readable.";
    }
    $date=date("Y-m-d h:i:s");
    foreach($xml->children() as $child)
        {

            $author =addslashes($child->author);
            $title =addslashes($child->title);
            $genre =addslashes($child->genre);
            $price =$child->price;
            $publish_date =$child->publish_date;
            $description =addslashes($child->description);
            $record_type ="file uploaded";
           
            
            $sql = "INSERT INTO book (author, title, genre ,price ,publish_date ,description ,record_type ,created_at ,updated_at ,deleted_at) VALUES ('".$author."','".$title."','".$genre."','".$price."','".$publish_date."','".$description."','".$record_type."','".$date."','".$date."','0')";
            
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
            header("Refresh:0");

        }

}

?>