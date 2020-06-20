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

    <?php if(isset($_POST['search_by_file_name'])){?>
    <div class="card-list">
        <?php 
        $fileName = $_POST['query'];
        $found = "false";
    $fileSystemIterator = new FilesystemIterator('images/');
    foreach ($fileSystemIterator as $file){
       $src =  $file->getPath() ."/". $file->getFileName();
       if(substr($file->getFileName(), 0, strlen($fileName)) == $fileName){
        $found = "true";
        ?>
        <div class="card">
            <img class="card--image" style="width:30%;" src="<?php echo  $src; ?>" />

            <div class="card--content">
                <p>
                    <h3> <?php echo $file->getFileName(); ?>
                </p>
            </div>
        </div>
        <?php }}

        if($found == "false"){?>
        <div class="card">

            <div class="card--content">
                <h3> No Image Found </h3>
            </div>
        </div>
        <?php } ?>
    </div>
    <?php } ?>


    <?php if(isset($_POST['search_by_id'])){?>
    <?php 
        $file = fopen('database/names-1.csv','r');
        $id = $_POST['query'];
        while (($row = fgetcsv($file, 0, ","))) {
            if( ($row[1] == $id)){?>

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
                <input class="input" type="text" name="room" value="<?php echo $row[5]; ?>" />
            </p>

        </div>
    </div>

    <?php }}} ?>


    <?php if(isset($_POST['search_by_name'])){?>
    <?php 
        $file = fopen('database/names-1.csv','r');
        $formName = $_POST['query'];
        while (($row = fgetcsv($file, 0, ","))) {
            if(strcasecmp($row[0], $formName) == 0){
                ?>
    <form action="viewUpdatedInfo.php" method="POST">
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
                    <input class="input" type="text" name="caption" value="<?php echo $row[5]; ?>" />
                    <input class="input" type="text" name="captionName" hidden="true" value="<?php echo $row[0]; ?>" />
                </p>
                <button class="button" type="submit" name="update_caption">update </button>
            </div>
        </div>
    </form>
    <?php }}} ?>
</body>

</html>