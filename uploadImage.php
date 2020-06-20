<?php 
include "constants.php";
if (isset($_POST['upload_images'])) {

    if(!is_uploaded_file($_FILES['image']['tmp_name'])) {
        echo 'No upload';
    }

    $targetFile = 'images/' . basename($_FILES["image"]["name"]);
    $fileExtension = strtolower(pathinfo($targetFile,PATHINFO_EXTENSION)); 
    $fileName = pathinfo($targetFile,PATHINFO_FILENAME);
    
    if($fileExtension != "jpg" && $fileExtension != "png" && $fileExtension != "jpeg") {
        echo "<h3>Invalid file type</h3>";
    } else {
        move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile);
        echo "<h3>Image Uploaded...! <a href='assignment1index.php'>click to go back home </a></h3>";
        
    }

    $file = fopen("database/database.csv","r+");
    $output = fopen('database/temp_database.csv', 'w+');
    while (($row = fgetcsv($file, 0, ","))) {
        if(strcmp($row[$name], $fileName) == 0){
            $row[4] = $targetFile;
        }
        fputcsv($output, $row);
    }

    $output = fopen('database/temp_database.csv', 'r');
    copy("database/temp_database.csv", "database/database.csv");
    unlink("database/temp_database.csv");
    fclose($output);
} else if (isset($_POST['upload_image_files'])) {


    $targetFile = 'images/pics/' . basename($_FILES["image"]["name"]);
    $fileExtension = strtolower(pathinfo($targetFile,PATHINFO_EXTENSION)); 
    $fileName = pathinfo($targetFile,PATHINFO_FILENAME);
    
    if($fileExtension != "jpg" && $fileExtension != "png" && $fileExtension != "jpeg") {
        echo "<h3>Invalid file type</h3>";
    } else {
        move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile);
        echo "<h3>Image Uploaded...! <a href='index.php'>click to go back home </a></h3>";
        
    }
}
?>