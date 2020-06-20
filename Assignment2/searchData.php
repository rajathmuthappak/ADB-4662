<!DOCTYPE html>
<?php include "dbConnection.php" ; ?>
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
    <?php 

    if (isset($_POST['search_data'])){
        $sql = "SELECT * FROM all_month where depth > 10";
        $stmt = db2_prepare($conn, $sql);
         if (!$stmt) {
             echo "error in statement";
         }

        $result = db2_exec($conn, $sql);

        } else if (isset($_POST['quakes_in_x_kms'])){
            $lattitude = $_POST['Lattitude']; 
            $longitude = $_POST['Longitude'];
            $queryOption = $_POST['queryOption'];
            $distance = $_POST['distance'];

            $sql = "SELECT * FROM all_month WHERE ".$distance." ".$queryOption." (2 * 3961 * asin(sqrt( power((sin(radians((latitude-(".$lattitude.")) / 2))) , 2) + cos(radians((".$lattitude."))) * cos(radians(latitude)) * power((sin(radians((longitude-(".$longitude.")) / 2))) , 2) )))*1.6";
            $stmt = db2_prepare($conn, $sql);
            if (!$stmt) {
                echo "error in statement";
            }
            $result = db2_exec($conn, $sql);
        } else if (isset($_POST['search_data_with_date'])){
            $startDate = $_POST["startDate"];
            $endDate = $_POST["endDate"];
            $queryOption = $_POST["queryOption"];
            $magnitude = $_POST["magnitude"];

            $sql = "select count(*) from all_month where time between '".$startDate."' and  '".$endDate."' and mag ".$queryOption." ".$magnitude.""; 
            $stmt = db2_prepare($conn, $sql);
            if (!$stmt) {
                echo "error in statement";
            }
            $result = db2_exec($conn, $sql);
            while ($row = db2_fetch_array($result)) {
                echo "The number Of eatch Quakes is : ". $row[0];
            }

        }else if(isset($_POST['largest_five_quakes'])){
            $sql = "SELECT * FROM all_month ORDER BY  MAG DESC  FETCH FIRST 5 ROWS ONLY;";
        $stmt = db2_prepare($conn, $sql);
         if (!$stmt) {
             echo "error in statement";
         }
        $result = db2_exec($conn, $sql);
        } else if (isset($_POST['largest_within_x_kms'])){
            $lattitude = $_POST['Lattitude']; 
            $longitude = $_POST['Longitude'];
            $queryOption = $_POST['queryOption'];
            $distance = $_POST['distance'];

            $sql = "select * from all_month where id in (select id from all_month where mag = (select max(mag) from all_month WHERE ".$distance." ".$queryOption." ( 2 * 3961 * asin(sqrt(power((sin(radians((latitude -(".$lattitude.")) / 2))), 2) + cos(radians((".$lattitude."))) * cos(radians(latitude)) * power((sin(radians((longitude -(".$longitude.")) / 2))), 2))))*1.6))";

            echo $sql;
            $stmt = db2_prepare($conn, $sql);
            if (!$stmt) {
                echo "error in statement";
            }
            $result = db2_exec($conn, $sql);
        } else if (isset($_POST['recent_three_days'])){
            $startRange = $_POST['startRange']; 
            $endRange = $_POST['endRange'];

            $sql = "select * from all_month where time between '". date('Y-m-d',strtotime("-3 days")) ."' and '".date("Y-m-d")."' and mag between ".$startRange." and ".$endRange." order by mag asc;";
            $stmt = db2_prepare($conn, $sql);
            if (!$stmt) {
                echo "error in statement";
            }
            $result = db2_exec($conn, $sql);
        } else if (isset($_POST['quakes_count_in_2_places'])){
            $firstLattitude = $_POST['firstLattitude']; 
            $firstLongitude = $_POST['firstLongitude'];
            $secondLattitude = $_POST['secondLattitude']; 
            $secondLongitude = $_POST['secondLongitude'];
            $queryOption = $_POST['queryOption']; 
            $distance = $_POST['distance'];
            
            $sql1 = "SELECT count(*) FROM all_month WHERE ".$distance." ".$queryOption." ( 2 * 3961 * asin(sqrt(power((sin(radians((latitude -(".$firstLattitude.")) / 2))), 2) + cos(radians((".$firstLattitude."))) * cos(radians(latitude)) * power((sin(radians((longitude -(".$firstLongitude.")) / 2))), 2)))) * 1.6;";
            echo $sql1;
            $sql2 = "SELECT count(*) FROM all_month WHERE ".$distance." ".$queryOption." ( 2 * 3961 * asin(sqrt(power((sin(radians((latitude -(".$secondLattitude.")) / 2))), 2) + cos(radians((".$secondLattitude."))) * cos(radians(latitude)) * power((sin(radians((longitude -(".$secondLongitude.")) / 2))), 2)))) * 1.6;";
            echo $sql2;
            
            $stmt1 = db2_prepare($conn, $sql1);
            $stmt2 = db2_prepare($conn, $sql2);
            
            if (!$stmt1 || !$stmt2) {
                echo "error in statement";
            }

            $result1 = db2_exec($conn, $sql1);
            $result2 = db2_exec($conn, $sql2);
            
            $firstCountry =0;
            $secondCountry =0;
            while($row = db2_fetch_array($result1)){
                echo "inside ".$row[0];
                $firstCountry = $row[0];
            }
            while($row = db2_fetch_array($result2)){
                echo "inside ".$row[0];
                $secondCountry = $row[0];
            }
            if($firstCountry > $secondCountry){
                echo "<h1>FIRST place has more Quakes</h1>";
            } else if ($firstCountry > $secondCountry){
                echo "<h1>SECOND place has more Quakes</h1>";   
            } else {
                echo "<h1>BOTH places has same count</h1>";
            }
        }else if (isset($_POST['ques1'])){
            $startRange = $_POST['startRange']; 
            $endRange = $_POST['endRange'];
            $partition = $_POST['partition'];
            $part = ($endRange - $startRange) / $partition;
            while($startRange < $endRange){
                $newEnd = $startRange +$part;
                
                $sql3 = "select count(*) from all_month where mag > ".$startRange." and mag <=".$newEnd.";";
                $sql4 = "select time, place from all_month where mag > ".$startRange." and mag <=".$newEnd." order by mag desc fetch first 1 row only;";
                
                $stmt1 = db2_prepare($conn, $sql3);
                $stmt2 = db2_prepare($conn, $sql4);

                $result1 = db2_exec($conn, $sql3);
                $result2 = db2_exec($conn, $sql4);
            
                while($row = db2_fetch_array($result1)){
                    
                echo "<h2>no of quakes between mag ".$startRange." and ".$newEnd. " ".$row[0]. " \r\n.    </h2><br>";
                }
                while($row = db2_fetch_array($result2)){
                    
                    echo "<p>time = ".$row[0]."</p>";
                    echo "<p>place = ".$row[1]."</p>";
                    echo "<hr/>";
                }

                $startRange += $part;
            }

        }else if (isset($_POST['ques2'])){
            $leftBottomLat = $_POST['leftBottomLat']; 
            $rightTopLat = $_POST['rightTopLat'];
            $leftBottomLong = $_POST['leftBottomLong'];
            $rightTopLong = $_POST['rightTopLong'];
                
            $sql3 = "SELECT * FROM all_month where latitude > ".$leftBottomLat." and latitude < ".$rightTopLat." and longitude > ".$leftBottomLong." and longitude < ".$rightTopLong.";";
            
            $stmt1 = db2_prepare($conn, $sql3);

            $result = db2_exec($conn, $sql3);
        }
        ?>
    <?php if(!isset($_POST['quakes_count_in_2_places']) && !isset($_POST['ques1'])){?>
    <table>
        <tr>
            <th>Place</th>
            <th>LocationSource</th>
            <th>Lattitude</th>
            <th>Longitude</th>
            <th>Magnitude</th>
        </tr>
        <?php
        if(isset($_POST['recent_three_days'])){
            $count = $startRange;
            while ($row = db2_fetch_array($result)) {
                if($row[4] >= $count){
                    echo"<tr>";
                    echo "<td colspan='5' style='height:3em;text-align:center;'><h3>Data between mag ".$count." and mag ".++$count."</h3></td>";
                    echo "</tr>";
                }
                echo"<tr>";
                echo "<td>".  $row[13] ."</td>";
                echo "<td>".$row[20] ."</td>";
                echo "<td>". $row[1] ."</td>";
                echo "<td>".$row[2] ."</td>";
                echo "<td>". $row[4] ."</td>";
                echo "</tr>";
        }
        } else {
            while ($row = db2_fetch_array($result)) {
                echo"<tr>";
                echo "<td>".  $row[13] ."</td>";
                echo "<td>".$row[20] ."</td>";
                echo "<td>". $row[1] ."</td>";
                echo "<td>".$row[2] ."</td>";
                echo "<td>". $row[4] ."</td>";
                echo "</tr>";
        }
    }
    ?>
    </table>
    <?php } ?>
</body>

</html>