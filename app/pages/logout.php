<?php
session_start();

// Xóa tất cả session
session_unset();
session_destroy();

// Chuyển hướng về trang đăng nhập
header("Location: /web_nghe_nhac/public/assets/php/views/signinView.php");
exit();
?>