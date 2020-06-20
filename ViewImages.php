<!DOCTYPE html>

<?php
if (isset($_POST['move_to_save'])) {
    $directory = getcwd()."/images/pics/"; 
    $files2 = glob( $directory ."*" ); 
    $count = count($files2) + 1;
    $src = $_POST["fileName"];
    copy("images/pics/".$src, "images/pics/cpy".$count.".jpg");
    rename("images/pics/cpy".$count.".jpg","images/save/cpy".$count.".jpg");
}
?>
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
    <div style="display:flex">
        <div class="card-list">
            <h2 style="text-align:center">Original Pics </h2>
            <?php 
    $fileSystemIterator = new FilesystemIterator('images/pics/');
    foreach ($fileSystemIterator as $file){
       $src =  $file->getPath() ."/". $file->getFileName();
        ?>
            <form method="POST">
                <div class="card">
                    <img class="card--image" style="width:30%;" src="<?php echo  $src; ?>" />
                    <input type="text" name="fileName" hidden="true" value="<?php echo $file->getFileName(); ?> " />
                    <div class="card--content">
                        <p>
                            <button class="button" type="submit" name="move_to_save">Move To Save Folder </button>
                        </p>
                    </div>
                </div>
            </form>
            <?php }
    ?>
        </div>
        <div class="card-list">
            <h2 style="text-align:center">Saved Pics </h2>
            <?php 
    $fileSystemIterator = new FilesystemIterator('images/save/');
    foreach ($fileSystemIterator as $file){
       $src =  $file->getPath() ."/". $file->getFileName();
        ?>
            <form method="POST">
                <div class="card">
                    <img class="card--image" style="width:30%;" src="<?php echo  $src; ?>" />
                    <input type="text" name="fileName" hidden="true" value="<?php echo $file->getFileName(); ?> " />
                </div>
            </form>
            <?php }
    ?>
        </div>
    </div>
</body>

</html>