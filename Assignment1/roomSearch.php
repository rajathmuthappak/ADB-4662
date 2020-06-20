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
    $found = "false";
    if (isset($_POST['search_by_room'])){
        $startRoom = $_POST['startRoom'];
        $endRoom = $_POST['endRoom'];
        $count = 0; 
        while (($row = fgetcsv($file, 0, ","))) {
            if( $count > 0 && $row[2] >= $startRoom && $row[2] <= $endRoom){?>
        <div class="card">
            <?php 
                if(file_exists("images/".$row[4]) && strcmp($row[4],"")!=0){
                    $src = "images/".$row[4];
                    $found = "true";?>
            <img class="card--image" src="<?php echo $src; ?>" />
            <?php } else {?>
            <h3>no picture available</h3>
            <?php } ?>
            <div class="card--content">
                <label class="label">
                    Name :
                </label>
                <p>
                    <input class="input" type="text" name="room" value="<?php echo $row[0]; ?>" />
                </p>
                <label class="label">
                    Caption :
                </label>
                <p>
                    <input class="input" type="text" name="room" value="<?php echo $row[5]; ?>" />
                </p>
            </div>
        </div>
        <?php }$count++;}} ?>

        <?php 
             if($found == "false"){
                echo "<h1> No data Found ..!</h1>";
             }   
                
                ?>
    </div>
</body>

</html>