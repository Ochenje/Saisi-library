<?php
session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: admin_login.html");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Library Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }
        .hero {
            background: url('library.jpg') no-repeat center center/cover;
            color: white;
            height: 60vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }
        .hero h1 {
            font-size: 3rem;
            background: rgba(0, 0, 0, 0.6);
            padding: 15px;
            border-radius: 10px;
        }
        .card {
            transition: 0.3s;
        }
        .card:hover {
            transform: scale(1.05);
        }
        .search-bar {
            width: 50%;
            margin: auto;
        }
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

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
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
        <div class="d-flex">
            <a href="logout.php" class="btn btn-danger">Logout</a>
        </div>
    </div>
</nav>


<!-- Hero Section -->
<section class="hero">
    <h1>Welcome to ST. HENRRY'S SAISI Library.</h1>
</section>


<div class="container mt-5">
    <div class="row">
        <div class="col-md-3">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Books</h5>
                    <p class="card-text">View and manage books.</p>
                    <a href="dashboard.php#books" class="btn btn-primary">Go to Books</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Students</h5>
                    <p class="card-text">Manage student records.</p>
                    <a href="dashboard.php#students" class="btn btn-primary">Go to Students</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Issued Books</h5>
                    <p class="card-text">Check issued books.</p>
                    <a href="dashboard.php#issued" class="btn btn-primary">View Issued Books</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Return Books</h5>
                    <p class="card-text">Manage returned books.</p>
                    <a href="dashboard.php#returned" class="btn btn-primary">View Returned Books</a>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Footer -->
<div class="footer">
    <p>Library Management System &copy; 2025 | All Rights Reserved</p>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
