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
    $file = fopen('quiz0/csv/names.csv','r');
    if (isset($_POST['search_by_room'])){
        $startGrade = $_POST['startGrade'];
        $endGrade = $_POST['endGrade'];
        $count = 0; 
        while (($row = fgetcsv($file, 0, ","))) {
            if( $count > 0 && ($row[1] >= $startGrade && $row[1] <= $endGrade)){?>

        <div class="card">
            <?php 
                if(file_exists("quiz0/images/".$row[4]) && strcmp($row[4],"")!=0){
                    $src = "quiz0/images/".$row[4];?>
            <img class="card--image" src="<?php echo $src; ?>" />
            <?php } else {?>
            <h3>no picture available</h3>
            <?php } ?>
            <div class="card--content">
                <p>
                    <input class="input" type="text" name="room" value="<?php echo $row[0]; ?>" />
                </p>
                <p>
                    <input class="input" type="text" name="room" value="<?php echo $row[3]; ?>" />
                </p>
            </div>
        </div>
        <?php }$count++;}} ?>
    </div>
</body>

</html>