<?php
include('db_connection.php');

header('Content-Type: application/json'); // Return JSON response

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $book_name = $_POST['book_name'];
    $isbn = $_POST['isbn'];
    $publisher = $_POST['publisher'];
    $edition = $_POST['edition'];
    $price = $_POST['price'];
    $pages = $_POST['pages'];

    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO books (book_name, isbn, publisher, edition, price, pages) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssii", $book_name, $isbn, $publisher, $edition, $price, $pages);

    if ($stmt->execute()) {
        echo json_encode(["status" => "success", "message" => "Book added successfully!"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Error: " . $stmt->error]);
    }

    $stmt->close();
    $conn->close();
} else {
    echo json_encode(["status" => "error", "message" => "Invalid request."]);
}
?>
