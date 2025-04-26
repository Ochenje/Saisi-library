<?php
include('db_connection.php');
header('Content-Type: application/json'); // Set JSON response header

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_id = $_POST['student_id'];
    $book_name = $_POST['book_name'];
    $issue_date = $_POST['issue_date'];

    // Fetch Student Details
    $student_query = "SELECT * FROM students WHERE student_id = '$student_id'";
    $student_result = mysqli_query($conn, $student_query);
    $student = mysqli_fetch_assoc($student_result);

    // Fetch Book Details
    $book_query = "SELECT * FROM books WHERE book_name = '$book_name'";
    $book_result = mysqli_query($conn, $book_query);
    $book = mysqli_fetch_assoc($book_result);

    if ($student && $book) {
        $insert_query = "INSERT INTO issue_books (student_id, name, class, branch, semester, book_id, book_name, isbn, publisher, edition, price, pages, issue_date) 
                         VALUES ('$student_id', '{$student['name']}', '{$student['class']}', '{$student['branch']}', '{$student['semester']}', '{$book['book_id']}', '$book_name', '{$book['isbn']}', '{$book['publisher']}', '{$book['edition']}', '{$book['price']}', '{$book['pages']}', '$issue_date')";

        if (mysqli_query($conn, $insert_query)) {
            echo json_encode(["status" => "success", "message" => "Book issued successfully!", "student" => $student, "book" => $book, "issue_date" => $issue_date]);
        } else {
            echo json_encode(["status" => "error", "message" => "Error issuing book: " . mysqli_error($conn)]);
        }
    } else {
        echo json_encode(["status" => "error", "message" => "Invalid Student ID or Book Name!"]);
    }
}
?>
