<?php include "connect.php"; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Browse Books</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<h1>Browse Books</h1>

<h2>Browse by Author</h2>
<form method="POST">
    <select name="author">
        <option value="">-- Select Author --</option>
        <?php
        $authors = $conn->query("SELECT Author FROM authors ORDER BY Author");
        while ($row = $authors->fetch_assoc()) {
            echo "<option value='" . $row['Author'] . "'>" . $row['Author'] . "</option>";
        }
        ?>
    </select>
    <button type="submit" name="browse_author">Search</button>
</form>

<h2>Browse by Genre</h2>
<form method="POST">
    <select name="genre">
        <option value="">-- Select Genre --</option>
        <?php
        $genres = $conn->query("SELECT Genre FROM genres ORDER BY Genre");
        while ($row = $genres->fetch_assoc()) {
            echo "<option value='" . $row['Genre'] . "'>" . $row['Genre'] . "</option>";
        }
        ?>
    </select>
    <button type="submit" name="browse_genre">Search</button>
</form>

<hr>

<?php
if (isset($_POST["browse_author"])) {
    $author = $_POST["author"];
    $query = "SELECT * FROM books WHERE Author='$author'";
    $result = $conn->query($query);

    echo "<h2>Books by $author</h2>";
}

if (isset($_POST["browse_genre"])) {
    $genre = $_POST["genre"];
    $query = "SELECT * FROM books WHERE Genre='$genre'";
    $result = $conn->query($query);

    echo "<h2>Books in $genre</h2>";
}

if (!empty($result) && $result->num_rows > 0) {
    while ($book = $result->fetch_assoc()) {
        echo "<div class='result-box'>";
        echo "<h3>" . $book['BookTitle'] . "</h3>";
        echo "<p><strong>Author:</strong> " . $book['Author'] . "</p>";
        echo "<p><strong>Description:</strong> " . $book['Description'] . "</p>";
        echo "</div>";
    }
}
?>

</body>
</html>

