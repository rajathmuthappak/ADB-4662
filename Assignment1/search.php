<!DOCTYPE html>
<?php include "Person.php";
include "constants.php"; ?>
<html>
<!-- XAMPP -->

<head>
    <title>Advanced Database-Cloud computing</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" href="style.css" />
</head>

<?php 
echo "<h1><a href='assignment1index.php'>HOME </a></h1>";

$persons = array();
$file = fopen('database/database.csv','r');

if (isset($_POST['search_by_name'])) {
    $query = $_POST['query'];
    
    while (($row = fgetcsv($file, 0, ","))) {
        if(strcasecmp($row[$name], $query) == 0){
            $persons[] = new Person($row[$name], $row[$salary], $row[$room], $row[$telNum], $row[$picture], $row[$keyword]);
        }
    }
} else if (isset($_POST['search_by_salary'])) {
    $startSalary = $_POST['startSalary'];
    $endSalary = $_POST['endSalary'];
    
    while (($row = fgetcsv($file, 0, ","))) {
        if( $row[$salary] >=$startSalary && $row[$salary]<= $endSalary){
            $persons[] = new Person($row[$name], $row[$salary], $row[$room], $row[$telNum], $row[$picture], $row[$keyword]);
        }
    }

} else if (isset($_POST['search_by_room'])){
    $startRoom = $_POST['startRoom'];
    $endRoom = $_POST['endRoom'];
    
    while (($row = fgetcsv($file, 0, ","))) {
        if( $row[$room] >=$startRoom && $row[$room]<= $endRoom){
            $persons[] = new Person($row[$name], $row[$salary], $row[$room], $row[$telNum], $row[$picture], $row[$keyword]);
        }
    }
}

?>
<div class="card-list">
    <?php if (sizeof($persons) > 0) { ?>
    <?php foreach ($persons as $person) { ?>

    <form action="updateDelete.php" method="POST">
        <div class="card">
            <?php $imageSrc = file_exists($person->get_picture())? $person->get_picture() :"images/noImage.png" ?>
            <img class="card--image" src="<?php echo  $imageSrc ?>" />
            <div class="card--content">
                <h3 class="card--title"><?php echo $person->get_name(); ?></h3>
                <input class="input" type="text" name="name" value="<?php echo $person->get_name(); ?>" hidden="true" />
                <p><label style="font-size:1.6em;">
                        Room
                    </label>
                    <input class="input" type="text" name="room" value="<?php echo $person->get_room(); ?>" />
                </p>
                <p><label style="font-size:1.6em;">
                        Salary :
                    </label>
                    <input class="input" type="text" name="salary" value="<?php echo   $person->get_salary(); ?>" />
                </p>
                <p><label style="font-size:1.6em;">
                        Tele No.:
                    </label>
                    <input class="input" type="text" name="telenum" value="<?php echo  $person->get_telNum(); ?>" />
                </p>
                <p class="card--desc"><label style="font-size:1.6em;">
                        Keyword:
                    </label>
                    <input type="text" class="input" name="keywords" value="<?php echo  $person->get_keyword(); ?>" />
                </p>
                <div>
                    <button class="button" type="submit" name="submit">Update </button>
                    <button class="button" type="cancel" name="delete">Delete </button>
                </div>
                <br />
            </div>

        </div>
    </form>
    <?php } ?>
</div>

<?php
    } else {
        echo "<h3 class='card--title'>No results</h3>";
    }
?>

</html>