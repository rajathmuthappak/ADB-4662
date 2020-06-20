<!DOCTYPE html>
<?php 

include "Person.php";


if (isset($_POST['upload_file'])) {

    $targetFile = 'database/' . basename($_FILES["file"]["name"]);
    $fileExtension = strtolower(pathinfo($targetFile,PATHINFO_EXTENSION)); 
    $fileName = pathinfo($targetFile,PATHINFO_FILENAME);
    
    if($fileExtension != "csv") {
        echo "<h3>Invalid file type</h3>";
    } else {
        move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile);
        echo "<script>alert('Uploaded..!')</script>";
        
    }
}
if (isset($_POST['check_odd_even'])) {
     
    $value = $_POST["value"];

    if(is_numeric($value)){
        
        if($value %2 ==0){
            $message = $value."\\n even";
            echo "<script>alert('$message')</script>";
        } else {
            $message = $value."\\n odd";
            echo "<script>alert('$message')</script>";
        }

    } else {
        $message = $value."\\n Not Known";
        echo "<script>alert('$message')</script>";
    }
       
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
        <img style="width:20em;height:20rem%;margin-bottom:2em;" src="images/c.png" />
        <h1>Rajath Muthappa Kallichanda</h1>
        <h1>1001724662</h1>

    </div>
    <div style="display:flex;">
        <form class="form" style="width:10%; margin-left:15em" method="POST">
            <label class="label">
                Enter Value...
            </label>
            <input class="input" type="text" name="value" id="value">
            <button class="button" type="submit" name="check_odd_even">
                Submit
            </button>
        </form>

        <form class="form" style="width:10%; margin-left:15em" enctype="multipart/form-data" method="POST">
            <label class="label" for="query">
                Upload CSV file...
            </label>
            <input class="input" type="file" name="file" id="file" required>
            <button class="button" type="submit" name="upload_file">
                Upload CSV
            </button>
        </form>


    </div>
    <form class="form" style="width:10%; margin-left:15em; margin-top:2em;" method="POST" action="roomSearch.php">
        <label class="label">
            Search by rooms...
        </label>
        <input class="input" type="text" name="startRoom" placeholder="eg. 5" required="true" />
        <input class="input" type="text" name="endRoom" placeholder="eg. 5" required="true" />
        <button class="button" type="submit" name="search_by_room">
            Search
        </button>
    </form>

    <form class="form" method="POST" action="updatePicOrName.php" enctype="multipart/form-data">
        <label class="label">
            Enter room or id...
        </label>
        <div style="display:flex">
            <input class="input" style="width:15%;" type="text" name="searchRoom" placeholder="Room" />
            <input class="input" style="width:15%;" type="text" name="searchId" placeholder="ID" />
            <button class="button" type="submit" name="search_by_name">
                Search
            </button>
        </div>
    </form>

    <!-- <div style="display:flex;">
        <form class="form" style="width:25%; margin-left:15em" enctype="multipart/form-data" method="POST">
            <label class="label" for="query">
                Upload CSV file...
            </label>
            <input class="input" type="file" name="file" id="file" required>
            <button class="button" type="submit" name="upload_file">
                Upload CSV
            </button>
        </form>
        <form class="form" style="width:25%; margin-left:15em;" enctype="multipart/form-data" method="POST">
            <label class="label" for="image">
                Upload image files...
            </label>
            <input class="input" type="file" name="image" id="image">
            <button class="button" type="submit" name="upload_images">
                Upload Image
            </button>
        </form>
    </div>
    <div style="display:flex;">
        <form class="form" style="width:25%; margin-left:15em" method="POST" action="quiz1search.php">
            <label style=" margin-top:2em;" class="label" for="query">
                Search by image name....
            </label>
            <div style="display:flex">
                <input class="input" type="text" name="query" placeholder="i.e. a.jpg or a" required />
                <button class="button" type="submit" name="search_by_file_name">
                    Search
                </button>
            </div>
        </form>

        <form class="form" style="width:25%; margin-left:15em" method="POST" action="quiz1search.php">
            <label style=" margin-top:2em;" class="label" for="query">
                Search by ID....
            </label>
            <div style="display:flex">
                <input class="input" type="text" name="query" placeholder="i.e. 1" required />
                <button class="button" type="submit" name="search_by_id">
                    Search
                </button>
            </div>
        </form>
        <form class="form" style="width:25%; margin-left:15em" method="POST" action="quiz1search.php">
            <label style=" margin-top:2em;" class="label" for="query">
                Name whose caption is to be modified....
            </label>
            <div style="display:flex">
                <input class="input" type="text" name="query" placeholder="i.e. Alice" required />
                <button class="button" type="submit" name="search_by_name">
                    Search
                </button>
            </div>
        </form>
    </div> -->
</body>

</html>