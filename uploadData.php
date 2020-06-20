<?php 
if (isset($_POST['upload_file'])) {

    $connection = mysqli_connect('localhost', 'root', '','advdb');

    $sourceFile = basename($_FILES["file"]["name"]);
    $fileExtension = strtolower(pathinfo($sourceFile,PATHINFO_EXTENSION));

    if($fileExtension != "csv") {
        echo "<h3>Invalid file type..!</h3>";
    } else{
        move_uploaded_file($_FILES["file"]["tmp_name"], $sourceFile);
        $file = fopen($sourceFile,"r");

        $count = 0;
        if(strpos($sourceFile, "lat") === 0){
            while (($row = fgetcsv($file, 0, ","))) {
                if($count > 0){
                    $sql = "insert into latlong (country, latitude, longitude, name) values (\"".$row [0] ."\", ".$row [1] .",".$row [2] .",\"".$row [3] ."\")";
                    $connection->query($sql); 
                }
            $count++;
            }
        } else {
            while (($row = fgetcsv($file, 0, ","))) {
                if($count > 0){
                    $row [1] = ($row [1] == "") ? 0.0:$row [1];
                    $row [2] = ($row [2] == "") ? 0.0:$row [2];
                    $row [3] = ($row [3] == "") ? 0.0:$row [3];
                    $row [4] = ($row [4] == "") ? 0.0:$row [4];
                    $row [6] = ($row [6] == "") ? 0.0:$row [6];
                    $row [7] = ($row [7] == "") ? 0.0:$row [7];
                    $row [8] = ($row [8] == "") ? 0.0:$row [8];
                    $row [9] = ($row [0] == "") ? 0.0:$row [9];
                    $row [15] = ($row [15] == "") ? 0.0:$row [15];
                    $row [16] = ($row [16] == "") ? 0.0:$row [16];
                    $row [17] = ($row [17] == "") ? 0.0:$row [17];
                    $row [18] = ($row [18] == "") ? 0.0:$row [18];

                    $sql = "insert into all_month (time, latitude, longitude, depth, mag, magType, nst, gap, dmin, rms, net, id, updated, place, type, horizontalError, depthError, magError, magNst, status, locationSource, magSource) VALUES (\"".$row [0]."\", ".$row [1]."," .$row [2]."," .$row [3]."," .$row [4].", \"" .$row [5]."\"," .$row [6]."," .$row [7]."," .$row [8].", ".$row [9].",\"" .$row [10]."\",\"" .$row [11]."\", \"" .$row [12]."\", \"".$row [13]."\", \"" .$row [14]."\", ".$row [15].", "  .$row [16].", " .$row [17].", " .$row [18].", \"" .$row [19]. "\", \"" .$row [20]."\", \"" .$row [21]."\")";
                    $connection->query($sql); 
                }
            $count++;
            }
        }
        
        fclose($file);
    echo "<h3>Uploaded..! <a href='uploadData.php'>click to go back home </a></h3>";
    }
}

?>


<html>
</body>
<form class="form" style="width:25%; margin-left:15em" enctype="multipart/form-data" method="POST">
    <label class="label" for="query">
        Upload CSV file...
    </label>
    <input class="input" type="file" name="file" id="file" required>
    <button class="button" type="submit" name="upload_file">
        Upload CSV
    </button>
</form>
</body>

</html>