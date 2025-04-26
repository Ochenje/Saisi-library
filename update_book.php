<?php
include('db_connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $book_id = $_POST['book_id'];
    $book_name = $_POST['book_name'];
    $isbn = $_POST['isbn'];
    $publisher = $_POST['publisher'];
    $edition = $_POST['edition'];
    $price = $_POST['price'];
    $pages = $_POST['pages'];

    // Use prepared statement to prevent SQL injection
    $stmt = $conn->prepare("UPDATE books SET book_name=?, isbn=?, publisher=?, edition=?, price=?, pages=? WHERE book_id=?");
    $stmt->bind_param("ssssiii", $book_name, $isbn, $publisher, $edition, $price, $pages, $book_id);
    
    if ($stmt->execute()) {
        echo "Book updated Successfully"; // AJAX will capture this response
    } else {
        echo "Error";
    }

    $stmt->close();
}
?>
