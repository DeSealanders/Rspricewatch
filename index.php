<?php
require('php/config/conf.default.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>OS runescape high alch calc</title>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/default.css">
    <script src="js/documentready.js"></script>
    <script src="js/jquery.autocomplete.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</head>
<body>

<div class="content">

    <div class="formContainer">
        <h1>Add Item</h1>
        <p>Add an item to the table using this field</p>
        <form class="form" role="form" name="input" action="import.php" method="get">
            <div class="form-group">
                <label for="item">Item name or id</label>
                <input type="text" class="form-control" name="item" id="item" placeholder="Enter Item name or id">
            </div>
            <button class="btn btn-default" id="addbutton" type="submit">Add</button>
            <div class="messages"></div>
        </form>
    </div>

    <div class="tableContainer">
        <?php
        require('table.php');
        ?>
    </div>
</div>
</body>
</html>