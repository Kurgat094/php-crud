<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $year = $_POST['year'];

    $stmt = $conn->prepare("INSERT INTO books (title, author, year) VALUES (:title, :author, :year)");
    $stmt->execute(['title' => $title, 'author' => $author, 'year' => $year]);

    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add New Book</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Add New Book</h1>
    <form method="POST">
        <label>Title: <input type="text" name="title" required></label><br>
        <label>Author: <input type="text" name="author" required></label><br>
        <label>Year: <input type="year" name="year" required></label><br>
        <button type="submit">Add Book</button>
    </form>
</body>
</html>
