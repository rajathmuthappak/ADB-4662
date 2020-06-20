<?php 

include "Person.php";


if (isset($_POST['upload_file'])) {

    $sourceFile = basename($_FILES["file"]["name"]);
    $fileExtension = strtolower(pathinfo($sourceFile,PATHINFO_EXTENSION));

    if($fileExtension != "csv") {
        echo "<h3>Invalid file type..!</h3>";
    } else{
        move_uploaded_file($_FILES["file"]["tmp_name"], "people.csv");
        $file = fopen("people.csv","r");
        $output = fopen('database/database.csv', 'w');

        $count = 0;
        while (($row = fgetcsv($file, 0, ","))) {
            if($count > 0){
                $row[4] = "images/". $row[4];
                fputcsv( $output, $row);
            }
        $count++;
        }
        fclose($file);
        fclose($output);
    echo "<h3>Uploaded..! <a href='assignment1index.php'>click to go back home </a></h3>";
    }
}

?>