<?php include('db_connection.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Library Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f4f4;
            font-family: Arial, sans-serif;
        }
        .container {
            margin-top: 20px;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        .search-bar {
            margin-bottom: 10px;
        }
        .btn {
            padding: 5px 10px;
            border-radius: 5px;
        }
        .edit-btn {
            background-color: #ffc107;
            color: white;
        }
        .delete-btn {
            background-color: #dc3545;
            color: white;
        }
    </style>
</head>
<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="w-100 d-flex justify-content-between px-3">
        <a class="navbar-brand" href="#">ST. HENRRY SAISI WABUGE</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="books.html">Books</a></li>
                <li class="nav-item"><a class="nav-link" href="student.html">Students</a></li>
                <li class="nav-item"><a class="nav-link" href="issue_book.html">Issue Books</a></li>
                <li class="nav-item"><a class="nav-link" href="return_book.html">Return Books</a></li>
            </ul>
        </div>
        <a href="logout.php" class="btn btn-danger">Logout</a>
    </div>
</nav>

<div class="container">
    <h2 class="text-center">Library Management System</h2>

    <!-- Tabs -->
    <ul class="nav nav-tabs">
        <li class="nav-item"><a class="nav-link active" data-bs-toggle="tab" href="#books">Books</a></li>
        <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#students">Students</a></li>
        <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#issued">Issued Books</a></li>
        <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#returned">Returned Books</a></li>
    </ul>

    <div class="tab-content mt-3">
        <!-- Books Section -->
        <div class="tab-pane container active" id="books">
            <h3>Books List</h3>
            <input type="text" id="bookSearch" class="form-control search-bar" placeholder="Search Books...">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Book Name</th>
                        <th>ISBN</th>
                        <th>Publisher</th>
                        <th>Edition</th>
                        <th>Price</th>
                        <th>Pages</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="bookTable">
                    <?php
                    $result = mysqli_query($conn, "SELECT * FROM books");
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>
                                <td>{$row['book_id']}</td>
                                <td>{$row['book_name']}</td>
                                <td>{$row['isbn']}</td>
                                <td>{$row['publisher']}</td>
                                <td>{$row['edition']}</td>
                                <td>{$row['price']}</td>
                                <td>{$row['pages']}</td>
                                <td>
                                    <a href='edit_book.php?id={$row['book_id']}' class='btn edit-btn'>Edit</a>
                                    <button class='btn delete-btn delete-book' data-id='{$row['book_id']}'>Delete</button>
                                </td>
                              </tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>

 <!-- Students Section -->
 <div class="tab-pane container fade" id="students">
            <h3>Students List</h3>
            <input type="text" id="studentSearch" class="form-control search-bar" placeholder="Search Students...">
            <table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Class</th>
            <th>Branch</th>
            <th>Semester</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody id="studentTable">
        <?php
        $result = mysqli_query($conn, "SELECT * FROM students");
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr data-id='{$row['student_id']}'>
                    <td>{$row['student_id']}</td>
                    <td>{$row['name']}</td>
                    <td>{$row['class']}</td>
                    <td>{$row['branch']}</td>
                    <td>{$row['semester']}</td>
                    <td>
                        <a href='edit_student.php?id={$row['student_id']}' class='btn edit-btn'>Edit</a>
                        <button class='btn delete-btn delete-student' data-id='{$row['student_id']}'>Delete</button>

                    </td>
                  </tr>";
        }
        ?>
    </tbody>
</table>

</div>
        
        <!-- Returned Books Section -->
        <div class="tab-pane container fade" id="issued">
    <h3>Issued Books</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Student ID</th>
                <th>Name</th>
                <th>Class</th>
                <th>Branch</th>
                <th>Semester</th>
                <th>Book Name</th>
                <th>Issue Date</th>
            </tr>
        </thead>
        <tbody id="issuedBooksTable">
            <?php
            $result = mysqli_query($conn, "SELECT * FROM issue_books");
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                        <td>{$row['student_id']}</td>
                        <td>{$row['name']}</td>
                        <td>{$row['class']}</td>
                        <td>{$row['branch']}</td>
                        <td>{$row['semester']}</td>
                        <td>{$row['book_name']}</td>
                        <td>{$row['issue_date']}</td>
                      </tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<div class="tab-pane container fade" id="returned">
    <h3>Returned Books</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Student ID</th>
                <th>Name</th>
                <th>Class</th>
                <th>Branch</th>
                <th>Semester</th>
                <th>Book Name</th>
                <th>Return Date</th>
            </tr>
        </thead>
        <tbody id="returnedBooksTable">
            <?php
            $result = mysqli_query($conn, "SELECT * FROM return_books");
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                        <td>{$row['student_id']}</td>
                        <td>{$row['name']}</td>
                        <td>{$row['class']}</td>
                        <td>{$row['branch']}</td>
                        <td>{$row['semester']}</td>
                        <td>{$row['book_name']}</td>
                        <td>{$row['return_date']}</td>
                      </tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function(){
    $(".delete-book").click(function(){
        let bookId = $(this).data("id");
        if(confirm("Are you sure you want to delete this book?")) {
            $.ajax({
                url: "delete_book.php",
                type: "POST",
                data: { book_id: bookId },
                dataType: "json",
                success: function(response) {
                    if(response.status === "success") {
                        alert(response.message);
                        location.reload();  // Reload the page to update the table
                    } else {
                        alert(response.message);
                    }
                },
                error: function() {
                    alert("Error deleting book.");
                }
            });
        }
    });
 // Delete Student
 $(".delete-student").click(function(){
        let studentId = $(this).data("id");
        if(confirm("Are you sure you want to delete this student?")) {
            $.ajax({
                url: "delete_student.php",
                type: "POST",
                data: { student_id: studentId },
                dataType: "json",
                success: function(response) {
                    if(response.status === "success") {
                        alert(response.message);
                        location.reload();
                    } else {
                        alert(response.message);
                    }
                },
                error: function() {
                    alert("Error deleting student.");
                }
            });
        }
    });
});
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
