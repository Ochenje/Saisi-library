<?php
include('db_connection.php');

if(isset($_POST['query'])){
    $search = mysqli_real_escape_string($conn, $_POST['query']);
    
    $query = "SELECT * FROM books WHERE 
              book_name LIKE '%$search%' 
              OR isbn LIKE '%$search%' 
              OR publisher LIKE '%$search%' 
              OR edition LIKE '%$search%'";

    $result = mysqli_query($conn, $query);
    
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
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
    } else {
        echo "<tr><td colspan='8' class='text-center'>No books found.</td></tr>";
    }
}
?>
