<?php
include('db_connection.php');
header('Content-Type: application/json'); // Set JSON response header

if ($_SERVER["REQUEST_METHOD"] == "POST" || $_SERVER["REQUEST_METHOD"] == "GET") {
    $book_id = $_REQUEST['book_id'] ?? $_GET['id'];  // Support both GET and POST

    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("DELETE FROM books WHERE book_id=?");
    $stmt->bind_param("i", $book_id);
    $stmt->execute();
    $stmt->close();
    
    $sql = "DELETE FROM books WHERE book_id='$book_id'";
    if (mysqli_query($conn, $sql)) {
        echo json_encode(["status" => "success", "message" => "Book deleted successfully!"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Error deleting book: " . $conn->error]);
    }
}
?>
