<?php
    session_start();
    if(empty($_SESSION['auth'])) {
        header('location: index.php?auth=forbidden');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN PAGE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/header-style.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="shortcut icon" href="../img/PesonaBali.png" type="image/x-icon">
</head>

<body class="admin-body">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                    <div class="container-fluid">
                        <div class="navbar-brand">
                            ADMIN
                        </div>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="nav navbar-nav navbar-center">
                                <li class="nav-item">
                                    <a class="nav-link" aria-current="page" href="../public">MainPage</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link menu-home" aria-current="page" href="home.php">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link menu-kategori" href="kategori.php">Category</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link menu-wisata" href="wisata.php">Obyek Wisata</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link menu-gallery" href="gallery.php">Gallery</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link menu-booking" href="book.php">Booking List</a>
                                </li>
                            </ul>
                            <a class="btn btn-danger ms-auto" href="logout.php">Logout</a>
                        </div>
                    </div>
                </nav>