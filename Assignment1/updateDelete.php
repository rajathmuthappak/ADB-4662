<!DOCTYPE html>
<html>
<!-- XAMPP -->

<head>
    <title>Advanced Database-Cloud computing</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" href="style.css" />
</head>

<?php 
    include "constants.php";
    $formName = $_POST["name"];
    $formRoom = $_POST["room"];
    $formSalary = $_POST["salary"];
    $formKeywords = $_POST["keywords"];
    $formTele = $_POST["telenum"];
    
if (isset($_POST['submit'])) {   
    
    $file = fopen("database/database.csv","r+");
    $output = fopen('database/temp_database.csv', 'w+');
    while (($row = fgetcsv($file, 0, ","))) {
        if(strcasecmp($row[$name], $formName) == 0){
            $row[$name] = $formName;
            $row[$salary] = $formSalary;
            $row[$room] = $formRoom;
            $row[$telNum] = $formTele;
            $row[$keyword] = $formKeywords;
        }
        fputcsv($output, $row);
    }
    
    $output = fopen('database/temp_database.csv', 'r');
    copy("database/temp_database.csv", "database/database.csv");
    unlink("database/temp_database.csv");
    fclose($file);
    echo "<h3>Updated";
}

if (isset($_POST['delete'])) {
    
    $file = fopen("database/database.csv","r+");
    $output = fopen('database/temp_database.csv', 'w+');
    while (($row = fgetcsv($file, 0, ","))) {
        if(strcasecmp($row[$name], $formName) != 0){
            fputcsv($output, $row);
        }
    }
    
    $output = fopen('database/temp_database.csv', 'r');
    copy("database/temp_database.csv", "database/database.csv");
    unlink("database/temp_database.csv");
    fclose($file);
    echo "<h3>deleted";

}
?>

<a href="assignment1index.php">click to go back home </a></h3>

</html>