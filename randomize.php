<?php include "connect.php"; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Randomize a Book</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<h1>Random Book by Genre</h1>

<form method="POST">
    <label for="genre">Choose a genre:</label>
    <select name="genre" id="genre" required>
        <option value="">-- Select Genre --</option>

        <?php
        $result = $conn->query("SELECT Genre FROM genres ORDER BY Genre");
        while ($row = $result->fetch_assoc()) {
            echo "<option value='" . $row['Genre'] . "'>" . $row['Genre'] . "</option>";
        }
        ?>
    </select>

    <button type="submit">Randomize</button>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $genre = $_POST['genre'];

    $query = "SELECT * FROM books WHERE Genre='$genre' ORDER BY RAND() LIMIT 1";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $book = $result->fetch_assoc();

        echo "<div class='result-box'>";
        echo "<h2>" . $book['BookTitle'] . "</h2>";
        echo "<p><strong>Author:</strong> " . $book['Author'] . "</p>";
        echo "<p><strong>Genre:</strong> " . $book['Genre'] . "</p>";
        echo "<p><strong>Description:</strong> " . $book['Description'] . "</p>";
        echo "</div>";
    } else {
        echo "<p>No books found in this genre.</p>";
    }
}
?>

</body>
</html>

