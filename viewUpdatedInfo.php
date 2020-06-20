<!DOCTYPE html>
<html>

<head>
    <title>Advanced Database-Cloud computing</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" href="style.css" />
</head>

<body style="margin-top:5em">
    <h1><a href='index.php'>HOME </a></h1>
    <div style="text-align: center;">
        <h1>Rajath Muthappa Kallichanda</h1>
        <h1>1001724662</h1>
        <img style="width:20em;height:20rem%;margin-bottom:2em;" src="images/v.jpg" />
    </div>

    <?php 
        $caption = $_POST['caption'];
        $captionName = $_POST['captionName'];

        $file = fopen("database/names-1.csv","r+");
    $output = fopen('database/temp_names-1.csv', 'w+');
    
    while (($row = fgetcsv($file, 0, ","))) {
        if(strcmp($row[0], $captionName) == 0){
           
            $row[5] = $caption;
        }
        fputcsv($output, $row);
    }

    $output = fopen('database/temp_names-1.csv', 'r');
    copy("database/temp_names-1.csv", "database/names-1.csv");
    unlink("database/temp_names-1.csv");
    fclose($output);
    
    $file = fopen("database/names-1.csv","r+");
        while (($row = fgetcsv($file, 0, ","))) {
            if( ($row[0] == $captionName)){?>
    <form>
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
                    <input class="input" type="text" name="room" value="<?php echo $row[0]; ?>" />
                </p>
                <p>
                    <input class="input" type="text" name="room" value="<?php echo $row[5]; ?>" />
                </p>
            </div>
        </div>
    </form>
    <?php }} ?>

</body>

</html>