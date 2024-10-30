<?php
require 'db.php';

$id = $_GET['id'];
$stmt = $conn->prepare("SELECT * FROM books WHERE id = :id");
$stmt->execute(['id' => $id]);
$book = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $year = $_POST['year'];

    $stmt = $conn->prepare("UPDATE books SET title = :title, author = :author, year = :year WHERE id = :id");
    $stmt->execute(['title' => $title, 'author' => $author, 'year' => $year, 'id' => $id]);

    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Book</title>
    <link rel="stylesheet" href="style.css"> 
</head>
<body>
    <h1>Edit Book</h1>
    <form method="POST">
        <label>Title: <input type="text" name="title" value="<?= $book['title'] ?>" required></label><br>
        <label>Author: <input type="text" name="author" value="<?= $book['author'] ?>" required></label><br>
        <label>Year: <input type="number" name="year" value="<?= $book['year'] ?>" required></label><br>
        <button type="submit">Update Book</button>
    </form>
</body>
</html>
