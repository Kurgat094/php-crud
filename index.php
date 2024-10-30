<?php
require 'db.php';

$stmt = $conn->prepare("SELECT * FROM books");
$stmt->execute();
$books = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Bookstore CRUD</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Book List</h1>
    <button>  <a href="create.php">Add New Book</a></button>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Author</th>
            <th>Year</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($books as $book): ?>
            <tr>
                <td><?= $book['id'] ?></td>
                <td><?= $book['title'] ?></td>
                <td><?= $book['author'] ?></td>
                <td><?= $book['year'] ?></td>
                <td>
                    <button><a href="update.php?id=<?= $book['id'] ?>">Edit</a></button>
                    <button><a href="delete.php?id=<?= $book['id'] ?>">Delete</a></button>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
