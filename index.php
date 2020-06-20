<?php #include 'dbConnection.php';?>
<!DOCTYPE html>

<html>

<head>
    <title>Advanced Database-Cloud computing</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" href="style.css" />
</head>

<body style="margin-top:5em">

    <div style="text-align: center;">

        <h1>Rajath Muthappa Kallichanda</h1>
        <h1>1001724662</h1>
        <img src="images/s.jpg" style="width:20%" />
        <h1> total number of earthquakes : 19756</h1>
        <h1> Latitude -7.0058</h1>
        <h1>Longitude 116.9276</h1>
        <h1>Place: 167 km NNW of Pototano, Indonesia</h1>
        <h1>ID : usd000crm9 </h1>

    </div>
    <hr />
    <form class="form" style="margin-left:15em;" method="POST" action="searchData.php">
        <label class="label" for="query">
            Question 6
        </label>
        <div style="display:flex">
            <div>
                <h2>left botton lattitude</h2><input class="input" type="text" name="leftBottomLat" id="file">
                <h2>right top lattitude</h2><input class="input" type="text" name="rightTopLat" id="file">
            </div>
            <div>
                <h2>left bottom longitude</h2><input class="input" type="text" name="leftBottomLong" id="file">
                <h2>right top longitude</h2><input class="input" type="text" name="rightTopLong" id="file">
            </div>

        </div>
        <h2>Depth Value </h2><input class="input" type="number" name="depthValue" />
        <button class="button" type="submit" name="ques6">
            Update
        </button>
    </form>
    <hr />
    <form class="form" style="margin-left:15em;" method="POST" action="searchData.php">
        <label class="label" for="query">
            Question 7
        </label>
        <div style="display:flex">
            <div>
                <h2>location name</h2><input class="input" type="text" name="location" required="true" />
                <h2>Min Mag</h2><input class="input" type="text" name="mag" required="true" />
            </div>
        </div>
        <button class="button" type="submit" name="ques7">
            Get data
        </button>
    </form>
    <hr />
    <form class="form" style="margin-left:15em;" method="POST" action="searchData.php">
        <label class="label" for="query">
            Question 8
        </label>
        <div style="display:flex">
            <div>
                <h2>location name</h2><input class="input" type="text" name="location" required="true" />
                <h2>Radius</h2><input class="input" type="number" name="radius" required="true" />
            </div>
        </div>
        <button class="button" type="submit" name="ques8">
            Get data
        </button>
    </form>
    <hr />
    <!-- <hr />
    <form class="form" style="width:10%; margin-left:15em" enctype="multipart/form-data" method="POST"
        action="UploadDataDB2.php">
        <label class="label" for="query">
            Upload CSV file...
        </label>
        <input class="input" type="file" name="file" id="file">
        <button class="button" type="submit" name="upload_file">
            Upload CSV
        </button>
    </form>
    <hr />
    <form class="form" style="margin:0 auto;width:50%;" action="searchData.php" method="POST">
        <h1>What were largest 5 quakes?</h1>
        <button class="button" type="submit" name="largest_five_quakes">
            Click to view Data
        </button>
    </form>
    <hr />
    <form class="form" style="margin-left:15em;" method="POST" action="searchData.php">
        <label class="label" for="query">
            Question 3
        </label>
        <div style="display:flex;">
            <h2>Radius from the current location(in kms)</h2>
            <input class="input" style="width:20%;" type="text" name="file" id="file">
        </div> -->
    <!--<div style="display:flex;">
            <h2>Start Date:</h2><input class="input" type="date" name="startDate" />
            <h2> End Date:</h2><input class="input" type="date" name="endDate" />
            <div style="display:flex;">
                <h2>Magnitude</h2>
                <select style="width:auto;margin-left:1em;margin-right:1em;height:3em;" name="queryOption">
                    <option value="=">Equals</option>
                    <option value=">">Greater Than</option>
                    <option value=">=">Greater Than and equal to</option>
                    <option value=">">Within</option>
                    <option value="<">Lesser Than and equal to</option>
                </select>
                <input class="input" style="width:20%;" type="text" name="magnitude" id="magnitude">
            </div>
        </div>
        <button class="button" type="submit" name="search_data_with_date">
            Get data
        </button>
    </form>
    <hr />
    <form class="form" style="margin-left:15em;width:auto;" method="POST" action="searchData.php">
        <h2>What quakes within about X KM from y,z location(What quakes occurred within 500 km of Arlington, Texas)</h2>
        <div style="display:flex;">
            <h2>Lattitude</h2><input class="input" type="text" name="Lattitude" id="Lattitude" required="true" />
            <h2 style="margin-left:1em;">Longitude</h2><input class="input" type="text" name="Longitude" id="Longitude"
                required="true" />
            </input>
        </div>
        <div style="display:flex;">
            <h2>Distance in KMS</h2>
            <select style="width:auto;margin-left:1em;margin-right:1em;height:3em;" name="queryOption">
                <option value=">">Within</option>
                <option value="<">Outside</option>
            </select>
            <input class="input" style="width:20%;" type="number" name="distance" id="distance" required="true" />
        </div>
        <button class="button" type="submit" name="quakes_in_x_kms">
            Get data
        </button>
    </form>
    <hr />
    <form class="form" style="margin:0 auto;width:50%;" action="searchData.php" method="POST">
        <h1>recent 3 days</h1>
        <div style="display:flex;">
            <h2>Magnitude Range</h2><input class="input" type="text" name="startRange" required="true" />
            <input class="input" style="margin-left:1em;" type=" text" name="endRange" required="true" />
            </input>
        </div>
        <button class="button" type="submit" name="recent_three_days">
            Click to view Data
        </button>
    </form>
    <hr />
    <form class="form" style="margin-left:15em;width:auto;" method="POST" action="searchData.php">
        <h2>Where did largest quake occur within 200 km of Dallas?</h2>
        <div style="display:flex;">
            <h2>Lattitude</h2><input class="input" type="text" name="Lattitude" id="Lattitude" required="true" />
            <h2 style="margin-left:1em;">Longitude</h2><input class="input" type="text" name="Longitude" id="Longitude"
                required="true" />
            </input>
        </div>
        <div style="display:flex;">
            <h2>Distance in KMS</h2>
            <select style="width:auto;margin-left:1em;margin-right:1em;height:3em;" name="queryOption">
                <option value=">">Within</option>
                <option value="<">Outside</option>
            </select>
            <input class="input" style="width:20%;" type="number" name="distance" id="distance" required="true" />
        </div>
        <button class="button" type="submit" name="largest_within_x_kms">
            Get data
        </button>
    </form>
    <hr />
    <form class="form" style="margin-left:15em;width:auto;" method="POST" action="searchData.php">
        <h2>Are quakes more common within 1000 km of Anchorage (61 N, 150 W) than
            Dallas (32.8 N, 96.8 W)?</h2>
        <div style="display:flex;">
            <h2>Lattitude</h2><input class="input" type="text" name="firstLattitude" id="Lattitude" required="true" />
            <h2 style="margin-left:1em;">Longitude</h2><input class="input" type="text" name="firstLongitude"
                id="Longitude" required="true" />
            </input>
        </div>
        <h2> and</h2>
        <div style="display:flex;">
            <h2>Lattitude</h2><input class="input" type="text" name="secondLattitude" id="Lattitude" required="true" />
            <h2 style="margin-left:1em;">Longitude</h2><input class="input" type="text" name="secondLongitude"
                id="Longitude" required="true" />
            </input>
        </div>
        <div style="display:flex;">
            <h2>Distance in KMS</h2>
            <select style="width:auto;margin-left:1em;margin-right:1em;height:3em;" name="queryOption">
                <option value=">">Within</option>
                <option value="<">Outside</option>
            </select>
            <input class="input" style="width:20%;" type="number" name="distance" id="distance" required="true" />
        </div>
        <button class="button" type="submit" name="quakes_count_in_2_places">
            Get data
        </button>
    </form>
    <hr />
    <form class="form" style="margin-left:15em;">
        <div style="display:flex;">
            <h2>Magnitude</h2>
            <select style="width:auto;margin-left:1em;margin-right:1em;height:3em;" name="queryOption">
                <option value="=">Equals</option>
                <option value=">">Greater Than</option>
                <option value=">=">Greater Than and equal to</option>
                <option value=">">Within</option>
                <option value="<">Lesser Than and equal to</option>
            </select>
            <input class="input" style="width:20%;" type="text" name="file" id="file">
        </div>
    </form>
    <hr />
    <form class="form" style="margin:0 auto;width:50%;" action="searchData.php" method="POST">
        <h1>question 1</h1>
        <div style="display:flex;">
            <h2>Magnitude Range</h2><input class="input" type="text" name="startRange" required="true" />
            <input class="input" style="margin-left:1em;" type=" text" name="endRange" required="true" />
            <h2 style="margin-left:1em;">Partition</h2><input class="input" style="margin-left:1em;" type=" text"
                name="partition" required="true" />
        </div>
        <button class="button" type="submit" name="ques1">
            Submit
        </button>
    </form>
    <hr />
    <form class="form" style="margin-left:15em;" method="POST" action="searchData.php">
        <label class="label" for="query">
            Question 3
        </label>
        <div style="display:flex">
            <div>
                <h2>left botton lattitude</h2><input class="input" type="text" name="leftBottomLat" id="file">
                <h2>right top lattitude</h2><input class="input" type="text" name="rightTopLat" id="file">
            </div>
            <div>
                <h2>left bottom longitude</h2><input class="input" type="text" name="leftBottomLong" id="file">
                <h2>right top longitude</h2><input class="input" type="text" name="rightTopLong" id="file">
            </div>
        </div>
        <button class="button" type="submit" name="ques2">
            Get data
        </button>
    </form>
    <hr />
    <form class="form" style="margin-left:15em;" method="POST" action="searchData.php">
        <label class="label" for="query">
            Question 4
        </label>
        <div style="display:flex">
            <div>
                <h2>location name</h2><input class="input" type="text" name="location" />
            </div>
            <button class="button" type="submit" name="ques4">
                Get data
            </button>
    </form>
    <hr /> -->
</body>

</html>