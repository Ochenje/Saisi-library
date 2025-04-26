<?php
include('db_connection.php');
header('Content-Type: application/json'); // Set JSON response header

if ($_SERVER["REQUEST_METHOD"] == "POST" || $_SERVER["REQUEST_METHOD"] == "GET") {
    $student_id = $_REQUEST['student_id'] ?? $_GET['id'];  // Support both GET and POST

    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("DELETE FROM students WHERE student_id=?");
    $stmt->bind_param("i", $student_id);
    $stmt->execute();
    $stmt->close();

    $sql = "DELETE FROM students WHERE student_id='$student_id'";
    if (mysqli_query($conn, $sql)) {
        echo json_encode(["status" => "success", "message" => "student deleted successfully!"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Error deleting student: " . $conn->error]);
    }
}
?>
