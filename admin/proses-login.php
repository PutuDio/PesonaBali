<?php
    session_start();
    require_once '../include/koneksi.php';

    // Fungsi untuk login
    function login($username, $password) {
        global $conn;
        $sql = "SELECT * FROM tb_admin WHERE username=? AND password=?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, 'ss', $username, $password);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        return mysqli_num_rows($result);
    }

// Pemanggilan fungsi login
if(login($_POST['username'], $_POST['password']) == 1) {
    $_SESSION['auth'] = true;
    header('Location: home.php');
} else {
    header('Location: index.php?auth=false');
}

?>