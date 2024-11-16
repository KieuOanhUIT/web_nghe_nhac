<?php
// Khởi động session nếu chưa được khởi tạo
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Đường dẫn tương đối tới các file cần thiết
require_once __DIR__ . '/config.php';
require_once __DIR__ . '/functions.php';

// Các file khác nếu cần
// require_once __DIR__ . '/routes.php';
// require_once __DIR__ . '/middleware.php';
