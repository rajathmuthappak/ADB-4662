<!DOCTYPE html>
<html>

<head>
    <title>Advanced Database-Cloud computing</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" href="style.css" />
</head>

<body style="margin-top:5em">

    <div style="text-align: center;">
        <h2>Rajath Muthappa Kallichanda</h2>
        <h2>1001724662</h2>
    </div>
    <h1><a href='index.php'>HOME </a></h1>
    <div class="card-list">
        <?php 
    $file = fopen('database/names.csv','r');
    if (isset($_POST['search_by_name'])){
        $room = $_POST['searchRoom'];
        $id = $_POST['searchId'];
        $count = 0; 
        while (($row = fgetcsv($file, 0, ","))) {
            if( $count > 0 && (($row[2] == $room && $room != "") || ($id == $row[1] && $id != ""))){?>
        <form class="form" method="POST" enctype="multipart/form-data">
            <div class="card">
                <?php 
                if(file_exists("images/".$row[4]) && strcmp($row[4],"")!=0){
                    $src = "images/".$row[4];?>
                <img class="card--image" src="<?php echo $src; ?>" />
                <?php } else {?>
                <h3>no picture available</h3>
                <?php } ?>
                <div class="card--content">
                    <p>
                        <input class="input" type="text" name="personName" value="<?php echo $row[0]; ?>" />

                        <input class="input" type="text" name="personID" value="<?php echo $row[1]; ?>" hidden="true" />
                    </p>
                    <p>
                        <input class="input" type="file" name="image" id="image" />
                    </p>
                    <button class="button" type="submit" name="updateDetails"> Update </button>
                </div>
            </div>
        </form>
        <?php }$count++;}}
        fclose($file); ?>
    </div>
</body>

</html>


<!-- Method to update pic and grade-->
<?php 
if(isset($_POST['updateDetails'])){
    
   $name = $_POST['personName'];
   $personID = $_POST['personID'];

   $fileName = "";
   if(is_uploaded_file($_FILES['image']['tmp_name'])) {
    $targetFile = 'images/' . basename($_FILES["image"]["name"]);
    
    $fileExtension = strtolower(pathinfo($targetFile,PATHINFO_EXTENSION)); 
    $fileName = $_FILES["image"]["name"];
    
    if($fileExtension != "jpg" && $fileExtension != "png" && $fileExtension != "jpeg") {
        echo "<h3>Invalid file type</h3>";
    } else {
        move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile);
    }
    }

    $file = fopen("database/names.csv","r+");
    $output = fopen('database/temp_names.csv', 'w+');
    
    while (($row = fgetcsv($file, 0, ","))) {
        if(strcmp($row[1], $personID) == 0){
           
            $row[0] = $name;
            if(strcmp($fileName,"")!=0){
                $row[4] = $fileName;
            }
        }
        fputcsv($output, $row);
    }

    $output = fopen('database/temp_names.csv', 'r');
    copy("database/temp_names.csv", "database/names.csv");
    unlink("database/temp_names.csv");
    fclose($output);
    echo "Update Successful..!<a href='index.php'>click to go back home </a></h3>";
} 
?>