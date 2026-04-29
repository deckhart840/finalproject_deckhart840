<!DOCTYPE html>
<html>
<head>
<title>Search for A Student</title>
<link rel="stylesheet" href="styles/main.css">
<script src="scripts/main.js" defer></script>
</head>
<body>

<h1>The Student Directory</h1>
<p>David Eckhart</p>
<p><?php echo date("Y-m-d"); ?></p>

<form method="POST" action="search.php">
<label>Last Name:</label>
<input type="text" name="lastname" required>
<button type="submit">Search</button>
</form>

</body>
</html>
