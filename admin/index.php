<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PesonaBali | Login</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../css/admin-style.css">
    <link rel="shortcut icon" href="../img/PesonaBali.png" type="image/x-icon">
</head>
<body>
    <div class="wrapper">
        <form action="proses-login.php" method="post">
            <h1>ADMIN</h1>

            <?php
                if(isset($_GET['auth']) && $_GET['auth'] == 'false') {
                ?>
                    <div class="alert alert-danger" role="alert">
                        Incorrect Username or Password!!
                    </div>
                <?php
                }
                if(isset($_GET['auth']) && $_GET['auth'] == 'forbidden') {
                    ?>
                        <div class="alert alert-danger" role="alert">
                            You are not allowed to access the page!!!
                        </div>
                    <?php
                    }
                    if(isset($_GET['auth']) && $_GET['auth'] == 'flogout') {
                        ?>
                            <div class="alert alert-danger" role="alert"></div>
                        <?php
                        }
            ?>

            <div class="input-box">
                <input type="text" name="username" class="input" placeholder="Username" required>
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-box">
                <input type="password" name="password" class="input" placeholder="Password" required>
                <i class='bx bxs-lock-alt' ></i>
            </div>
                <button type="submit" class="btn">Login</button>
            <div class="home-link">
                <p><a href="../public">HomePage</a></p>
            </div>
        </form>
    </div>
</body>
</html>