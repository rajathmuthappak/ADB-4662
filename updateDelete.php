<?php include 'dbConnection.php';?>
<!DOCTYPE html>
<html>
<!-- XAMPP -->

<head>
    <title>Advanced Database-Cloud computing</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <div style="text-align: center;">
        <h2>Rajath Muthappa Kallichanda</h2>
        <h2>1001724662</h2>
    </div>
    <h1><a href='index.php'>HOME </a></h1>

    <?php 
    $formName = $_POST["Place"];
    $id = $_POST["id"];

    
if (isset($_POST['submit'])) {   
    
    $sql = "update assignment2 set place ='". $formName."' where id = '".$id."'";
    echo $sql;
    $statement = db2_prepare($conn, $sql);
    db2_exec($conn, $sql);
    echo "Updated..!";

}

if (isset($_POST['delete'])) {
    $sql = "delete from all_month where id = '".$id."'";
    $statement = db2_prepare($conn, $sql);
    db2_exec($conn, $sql);

}
?>
</body>

</html>