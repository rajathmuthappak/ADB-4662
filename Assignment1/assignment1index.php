<!DOCTYPE html>
<html>

<head>
    <title>Advanced Database-Cloud computing</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" href="style.css" />
</head>

<body style="margin-top:5em">
    <form class="form" method="POST" action="search.php">
        <label class="label" for="query">
            Search by name....
        </label>
        <input class="input" type="text" name="query" placeholder="i.e. Jhonson" required />
        <button class="button" type="submit" name="search_by_name">
            Search
        </button>
    </form>
    <br />
    <br />
    <form class="form" method="POST" action="search.php">
        <label class="label">
            Search by salary range...
        </label>
        <div style="display:flex">
            <input class="input" style="width:15%;" type="text" name="startSalary" placeholder="start" required />
            <input class="input" style="width:15%;margin-left:1em;" type="text" name="endSalary" placeholder="end"
                required />
        </div>
        <button class="button" type="submit" name="search_by_salary">
            Search
        </button>
    </form>
    <br />
    <br />
    <form class="form" method="POST" action="search.php">
        <label class="label">
            Search by room range...
        </label>
        <div style="display:flex">
            <input class="input" style="width:15%;" type="text" name="startRoom" placeholder="start" required />
            <input class="input" style="width:15%;margin-left:1em;" type="text" name="endRoom" placeholder="end"
                required />
        </div>
        <button class="button" type="submit" name="search_by_room">
            Search
        </button>
    </form>
    <br />
    <br />
    <div style="display:flex;margin:2em auto;">
        <form class="form" style="width:25%; margin-left:15em" enctype="multipart/form-data" method="POST"
            action="uploadFile.php">
            <label class="label" for="query">
                Upload CSV file...
            </label>
            <input class="input" type="file" name="file" id="file" required>
            <button class="button" type="submit" name="upload_file">
                Upload CSV
            </button>
        </form>
        <form class="form" style="width:25%; margin-left:15em;" enctype="multipart/form-data" method="POST"
            action="uploadImage.php">
            <label class="label" for="image">
                Upload image files...
            </label>
            <input class="input" type="file" name="image" id="image">
            <button class="button" type="submit" name="upload_images">
                Upload Image
            </button>
        </form>
    </div>
</body>

</html>