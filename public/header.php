<html lang="en">
<head>
    <meta charset="UTF-8" /> <!-- Menentukan karakter set untuk halaman -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" /> <!-- Memberitahukan browser untuk kompatibilitas dengan versi terbaru dari IE -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" /> <!-- Menetapkan viewport untuk responsif di perangkat mobile -->
    <title>PesonaBali.</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"/>
    <link rel="preconnect" href="https://fonts.googleapis.com"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet"/>
    <link rel="shortcut icon" href="../img/PesonaBali.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/public-style.css"/>
    <link rel="stylesheet" href="../img/">
</head>
<body>
    <nav class="navbar navbar-expand-lg sticky-top" id="navbar">
        <div class="container">
            <a class="navbar-brand" href="index.php" id="logo"><span>P</span>esona<span>B</span>ali.</a>
            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#mynavbar">
                <span><i class="fa-solid fa-bars"></i></span>
            </button>
            <div class="collapse navbar-collapse" id="mynavbar">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <div class="dropdown">
                            <button class="btn dropdown-toggle nav-link" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Home
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link dropdown-item" href="index.php #home">Home</a></li>
                                <li><a class="nav-link dropdown-item" href="index.php #about">About</a></li>
                                <li><a class="nav-link dropdown-item" href="index.php #services">Services</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="destinasi.php">Destination</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="gallery.php">Gallery</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link menu-guide" href="guide.php">Guides</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link menu-book" href="book.php">Book</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>