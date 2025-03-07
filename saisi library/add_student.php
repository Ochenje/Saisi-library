<?php
include('db_connection.php');

header('Content-Type: application/json'); // Ensure JSON response

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_id = $_POST['student_id'];
    $name = $_POST['name'];
    $class = $_POST['class'];
    $branch = $_POST['branch'];
    $semester = $_POST['semester'];

    // Validate student ID (must be exactly 4 digits)
    if (!preg_match("/^\d{4}$/", $student_id)) {
        echo json_encode(["status" => "error", "message" => "Student ID must be exactly 4 digits."]);
        exit();
    }

    // Prepare SQL statement
    $stmt = $conn->prepare("INSERT INTO students (student_id, name, class, branch, semester) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $student_id, $name, $class, $branch, $semester);

    if ($stmt->execute()) {
        echo json_encode(["status" => "success", "message" => "Student added successfully!"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Error: " . $stmt->error]);
    }

    $stmt->close();
    $conn->close();
} else {
    echo json_encode(["status" => "error", "message" => "Invalid request."]);
}
?>
