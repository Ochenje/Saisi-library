<?php
include('db_connection.php');
header('Content-Type: application/json'); // Set JSON response header

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_id = $_POST['student_id'];
    $book_name = $_POST['book_name'];
    $return_date = $_POST['return_date'];

    // Find the book in issue_books
    $query = "SELECT * FROM issue_books WHERE student_id = '$student_id' AND book_name = '$book_name'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    if ($row) {
        // Insert into return_books
        $insert_query = "INSERT INTO return_books (student_id, name, class, branch, semester, book_name, isbn, publisher, edition, price, pages, issue_date, return_date)
                         VALUES ('{$row['student_id']}', '{$row['name']}', '{$row['class']}', '{$row['branch']}', '{$row['semester']}', '{$row['book_name']}', '{$row['isbn']}', '{$row['publisher']}', '{$row['edition']}', '{$row['price']}', '{$row['pages']}', '{$row['issue_date']}', '$return_date')";
        mysqli_query($conn, $insert_query);

        // Delete from issue_books
        $delete_query = "DELETE FROM issue_books WHERE student_id = '$student_id' AND book_name = '$book_name'";
        mysqli_query($conn, $delete_query);

        echo json_encode(["status" => "success", "message" => "Book Returned Successfully!", "student" => $row, "return_date" => $return_date]);
    } else {
        echo json_encode(["status" => "error", "message" => "Error: Book Not Found"]);
    }
}
?>
