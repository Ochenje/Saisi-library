<?php
include('db_connection.php');

if(isset($_POST['query'])){
    $search = mysqli_real_escape_string($conn, $_POST['query']);
    
    $query = "SELECT * FROM students WHERE 
              name LIKE '%$search%' 
              OR class LIKE '%$search%' 
              OR branch LIKE '%$search%' 
              OR semester LIKE '%$search%'";

    $result = mysqli_query($conn, $query);
    
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            echo "<tr>
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
    } else {
        echo "<tr><td colspan='6' class='text-center'>No students found.</td></tr>";
    }
}
?>
