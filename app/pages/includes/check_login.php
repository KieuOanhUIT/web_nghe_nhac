<?php
session_start();
    if (!isset($_SESSION['user'])) {
        // Nếu chưa đăng nhập, chuyển hướng đến trang đăng nhập
        header('Location: /web_nghe_nhac/public/assets/php/views/signinView.php');  // Chuyển hướng đến trang đăng nhập nếu chưa đăng nhập
        exit();
    }
?>
