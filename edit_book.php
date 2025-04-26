<?php
include('db_connection.php');

$book = null;

if (isset($_GET['id'])) {
    $book_id = intval($_GET['id']); // Sanitize input

    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM books WHERE book_id = ?");
    $stmt->bind_param("i", $book_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $book = $result->fetch_assoc();
    $stmt->close();
}

// Redirect if book not found
if (!$book) {
    echo "<script>alert('Book not found!'); window.location.href='dashboard.php';</script>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Book</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 

    <style>
        body {
            background: linear-gradient(to right, #6a11cb, #2575fc);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .edit-book-container {
            background: white;
            padding: 20px;
            margin-top: 200px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
            max-width: 400px;
            width: 100%;
        }
        .form-label {
            font-weight: bold;
        }
        .btn-update {
            background: #2575fc;
            border: none;
            transition: 0.3s;
        }
        .btn-update:hover {
            background: #1a5cd8;
        }
    </style>
</head>
<body>

<div class="edit-book-container">
    <div class="text-center mb-3">
        <h3 class="text-primary">Edit Book</h3>
    </div>

    <form id="editBookForm">
        <input type="hidden" name="book_id" value="<?= htmlspecialchars($book['book_id'] ?? '') ?>">

        <div class="mb-3">
            <label class="form-label">Book Name:</label>
            <input type="text" name="book_name" class="form-control" value="<?= htmlspecialchars($book['book_name'] ?? '') ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">ISBN:</label>
            <input type="text" name="isbn" class="form-control" value="<?= htmlspecialchars($book['isbn'] ?? '') ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Publisher:</label>
            <input type="text" name="publisher" class="form-control" value="<?= htmlspecialchars($book['publisher'] ?? '') ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Edition:</label>
            <input type="text" name="edition" class="form-control" value="<?= htmlspecialchars($book['edition'] ?? '') ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Price:</label>
            <input type="number" step="0.01" name="price" class="form-control" value="<?= htmlspecialchars($book['price'] ?? '') ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Pages:</label>
            <input type="number" name="pages" class="form-control" value="<?= htmlspecialchars($book['pages'] ?? '') ?>" required>
        </div>

        <button type="submit" class="btn btn-update w-100 text-white">Update Book</button>
    </form>
</div>

<script>
$(document).ready(function() {
    $("#editBookForm").submit(function(event) {
        event.preventDefault(); 

        $.ajax({
            url: "update_book.php",
            type: "POST",
            data: $(this).serialize(),
            success: function(response) {
                alert("Book updated successfully!");
                window.location.href = "dashboard.php"; 
            },
            error: function() {
                alert("Error updating book. Please try again.");
            }
        });
    });
});
</script>



</body>
</html>
