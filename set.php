<html>
<head>
    <title>Set Creation</title>
</head>
<body>

<h2>Select Confectionaries</h2>

<form method="post" action="process_form.php">
    <?php
 
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "confectionary_db";

    // Create connection
    $conn = mysqli_connect($host, $username, $password, $database);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Function to fetch items based on category
    function fetchItems($category, $conn) {
        $result = mysqli_query($conn, "SELECT item_id, item_name FROM Item WHERE category_id = $category AND item_stock > 0");
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<option value='{$row['item_id']}'>{$row['item_name']}</option>";
        }
    }
    ?>

    <label for="chocolate">Chocolate:</label>
    <select name="chocolate" id="chocolate">
        <?php fetchItems(1, $conn); ?>
    </select>
    <br>

    <label for="candy">Candy:</label>
    <select name="candy" id="candy">
        <?php fetchItems(4, $conn); ?>
    </select>
    <br>

    <label for="cake">Cake:</label>
    <select name="cake" id="cake">
        <?php fetchItems(3, $conn); ?>
    </select>
    <br>

    <label for="pastry">Pastry:</label>
    <select name="pastry" id="pastry">
        <?php fetchItems(2, $conn); ?>
    </select>
    <br>

    <input type="submit" value="Submit">
</form>

<?php
// Close the database connection
mysqli_close($conn);
?>

</body>
</html>
