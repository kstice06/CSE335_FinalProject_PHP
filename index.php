<!DOCTYPE html>
<html>
<head>
    <title>Classic Books</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<h1>Classic Books Website</h1>

<div class="menu-container">
    <label for="action">Choose an option:</label>
    <select id="action" onchange="goToPage()">
        <option value="">-- Select --</option>
        <option value="randomize.php">Randomize by Genre</option>
        <option value="browse.php">Browse</option>
    </select>
</div>

<script>
function goToPage() {
    let page = document.getElementById("action").value;
    if (page !== "") {
        window.location.href = page;
    }
}
</script>

</body>
</html>

