<?php
include "db_connection.php"; // Ensure correct database connection

// Check if request is POST (AJAX request)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_id = $_POST['student_id'];
    $name = $_POST['name'];
    $class = $_POST['class'];
    $branch = $_POST['branch'];
    $semester = $_POST['semester'];

    // Update query with prepared statement
    $query = "UPDATE students SET name = ?, class = ?, branch = ?, semester = ? WHERE student_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssssi", $name, $class, $branch, $semester, $student_id);

    if ($stmt->execute()) {
        echo json_encode(["status" => "success", "message" => "Student updated successfully", "updated_data" => $_POST]);
    } else {
        echo json_encode(["status" => "error", "message" => "Update failed"]);
    }
    exit;
}

// Fetch student data for form population
if (isset($_GET['id'])) {
    $student_id = $_GET['id'];
    $query = "SELECT * FROM students WHERE student_id = ?";
    
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $student_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        die("Error: Student not found.");
    }
} else {
    die("Error: Invalid student ID.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <style>
        body {
            background: linear-gradient(to right, #6a11cb, #2575fc);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .edit-student-container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
            max-width: 450px;
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

<div class="edit-student-container">
    <div class="text-center mb-3">
        <h3 class="text-primary">Edit Student</h3>
    </div>

    <form id="edit-student-form">
        <input type="hidden" name="student_id" value="<?= htmlspecialchars($row['student_id']) ?>">

        <div class="mb-3">
            <label class="form-label">Student Name:</label>
            <input type="text" name="name" class="form-control" value="<?= htmlspecialchars($row['name']) ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Class:</label>
            <input type="text" name="class" class="form-control" value="<?= htmlspecialchars($row['class']) ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Branch:</label>
            <input type="text" name="branch" class="form-control" value="<?= htmlspecialchars($row['branch']) ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Semester:</label>
            <input type="text" name="semester" class="form-control" value="<?= htmlspecialchars($row['semester']) ?>" required>
        </div>

        <button type="submit" class="btn btn-update w-100 text-white">Update Student</button>
    </form>
</div>

<script>
$(document).ready(function() {
    $("#edit-student-form").submit(function(event) {
        event.preventDefault();

        $.ajax({
            url: "edit_student.php",
            type: "POST",
            data: $(this).serialize(),
            dataType: "json",
            success: function(response) {
                if (response.status === "success") {
                    alert(response.message);
                    updateStudentRow(response.updated_data);
                    window.location.href = "dashboard.php"; // Redirect to dashboard
                } else {
                    alert("Error: " + response.message);
                }
            },
            error: function(xhr, status, error) {
                alert("AJAX request failed: " + error);
            }
        });
    });

    function updateStudentRow(data) {
        var row = $("#studentTable").find("tr[data-id='" + data.student_id + "']");
        row.find("td:nth-child(2)").text(data.name);
        row.find("td:nth-child(3)").text(data.class);
        row.find("td:nth-child(4)").text(data.branch);
        row.find("td:nth-child(5)").text(data.semester);
    }
});
</script>

</body>
</html>
