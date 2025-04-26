<?php
session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: admin_login.html");
    exit();
}

$conn = new mysqli("localhost", "root", "", "library_db");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$bookCount = $conn->query("SELECT COUNT(*) AS count FROM books")->fetch_assoc()['count'];
$studentCount = $conn->query("SELECT COUNT(*) AS count FROM students")->fetch_assoc()['count'];
$issuedBooks = $conn->query("SELECT COUNT(*) AS count FROM issue_books")->fetch_assoc()['count'];
$returnedBooks = $conn->query("SELECT COUNT(*) AS count FROM return_books")->fetch_assoc()['count'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Library Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f4; }
        .hero {
            color: white;
            height: 80vh;
            width: 100%;
            position: relative;
            overflow: hidden;
        }
        .hero .carousel-inner img {
            height: 80vh;
            width: 100%;
            object-fit: cover;
        }
        .hero .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }
        .hero .overlay h1 {
            font-size: 3rem;
            color: white;
            background: rgba(0, 0, 0, 0.6);
            padding: 15px;
            border-radius: 10px;
        }
        .card {
            transition: 0.3s;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        }
        .stats-container { margin-top: 30px; }
        .stat-card {
            padding: 20px; background: #007bff; color: white; border-radius: 10px; text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        .stat-card h3 { font-size: 2rem; margin: 10px 0; }
        .stat-card p { font-size: 1.2rem; }
        .stat-icon { font-size: 2.5rem; margin-bottom: 10px; }
        .footer {
            background: #222;
            color: white;
            text-align: center;
            padding: 15px;
            margin-top: 30px;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
    <img src="images/logo.png" alt="Logo" width="50" height="50" class="me-2">
        <a class="navbar-brand" href="index.php">ST. HENRY SAISI WABUGE</a>
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
        <a href="admin_login.html" class="btn btn-danger">Logout</a>
    </div>
</nav>

<!-- Hero Section -->
<section class="hero">
    <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="images/lib1.jpg" class="d-block w-100" alt="Library Image 1">
            </div>
            <div class="carousel-item">
                <img src="images/lib2.jpg" class="d-block w-100" alt="Library Image 2">
            </div>
            <div class="carousel-item">
                <img src="images/lib3.jpg" class="d-block w-100" alt="Library Image 3">
            </div>
            <div class="carousel-item">
                <img src="images/lib5.jpg" class="d-block w-100" alt="Library Image 4">
            </div>
            <div class="carousel-item">
                <img src="images/lib6.jpg" class="d-block w-100" alt="Library Image 5">
            </div>
            <div class="carousel-item">
                <img src="images/lib8.jpg" class="d-block w-100" alt="Library Image 6">
            </div>
        </div>
    </div>
    <div class="overlay">
        <h1>Welcome to ST. HENRY'S SAISI Library.</h1>
    </div>
</section>


<div class="container mt-5">
    <div class="row">
        <div class="col-md-3">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Books</h5>
                    <p class="card-text">View and manage books.</p>
                    <a href="dashboard.php?tab=books" class="btn btn-primary">Go to Books</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Students</h5>
                    <p class="card-text">Manage student records.</p>
                    <a href="dashboard.php?tab=students" class="btn btn-primary">Go to Students</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Issued Books</h5>
                    <p class="card-text">Check issued books.</p>
                    <a href="dashboard.php?tab=issued" class="btn btn-primary">View Issued Books</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Return Books</h5>
                    <p class="card-text">Manage returned books.</p>
                    <a href="dashboard.php?tab=returned" class="btn btn-primary">View Returned Books</a>
                </div>
            </div>
        </div>
    </div>
</div>
  
<!--statistic section-->
<div class="container stats-container">
    <div class="row">
        <div class="col-md-3">
            <div class="stat-card">
                <i class="fas fa-book stat-icon"></i>
                <h3><?php echo $bookCount; ?></h3>
                <p>Total Books</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stat-card">
                <i class="fas fa-user-graduate stat-icon"></i>
                <h3><?php echo $studentCount; ?></h3>
                <p>Total Students</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stat-card">
                <i class="fas fa-book-reader stat-icon"></i>
                <h3><?php echo $issuedBooks; ?></h3>
                <p>Borrowed Books</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stat-card">
                <i class="fas fa-undo-alt stat-icon"></i>
                <h3><?php echo $returnedBooks; ?></h3>
                <p>Returned Books</p>
            </div>
        </div>
    </div>
</div>

<!-- About Us, Mission, Vision Section -->
<div class="container mt-5">
    <div class="row">
        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">About Us</h5>
                    <p class="card-text">We are committed to providing a world-class library experience with vast resources for students and researchers.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Our Mission</h5>
                    <p class="card-text">To empower learning and research by offering accessible and high-quality library services.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Our Vision</h5>
                    <p class="card-text">To be the leading library in academic excellence, innovation, and digital resources.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="footer text-center bg-dark text-white py-3">
    <p>St. Henry Saisi Library &copy; 2025 | All Rights Reserved</p>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
