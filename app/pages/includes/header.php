<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="/web_nghe_nhac/public/assets/css/header_main.css">
    <link rel="stylesheet" href="/web_nghe_nhac/public/assets/css/main.css">
    <link rel="stylesheet" href="/web_nghe_nhac/public/assets/css/listeningSpace.css">
    <link rel="stylesheet" href="/web_nghe_nhac/public/assets/css/main_cpm.css">
    <link rel="stylesheet" href="/web_nghe_nhac/public/assets/css/left_side.css">
    <link rel="stylesheet" href="/web_nghe_nhac/public/assets/css/right_side.css">
    <link rel="stylesheet" href="/web_nghe_nhac/public/assets/css/lyric.css">
    <link rel="stylesheet" href="/web_nghe_nhac/public/assets/css/search.css">

    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <title>Document</title>
    <script src="https://code.iconify.design/iconify-icon/2.1.0/iconify-icon.min.js"></script>
</head>

<body>
    <!-- header -->
    <header>
        <div class="controlbar">
            <div class="logo">
                <img src="/web_nghe_nhac/public/assets/img/logo.svg" alt="logo">
            </div>

            <div class="searching">
                <div class="home">
                    <iconify-icon icon="ic:round-home"></iconify-icon>
                </div>
                <div class="input-wrapper" id="search-input">
                    <iconify-icon icon="lucide:search" name="search"></iconify-icon>
                    <input type="text" class="search-input" placeholder="Tìm kiếm..." onclick="toggleSearchContainer(true)" name="keyword">

                </div>

                <div class="voice-searching">
                    <iconify-icon icon="mingcute:mic-fill"></iconify-icon>
                </div>
            </div>

            <div class="general">
                <div class="notif" id="notificationIcon">
                    <iconify-icon icon="ri:notification-4-line"></iconify-icon>
                </div>
                <div class="account">
                    <iconify-icon icon="mdi:account"></iconify-icon>

                </div>
                <p class="op_50" href="">ĐĂNG XUẤT</p>
            </div>
        </div>
    </header>

    <!-- Popup thông báo -->
    <div id="notificationPopup" class="notification-popup" style="display: none;">
        <div class="popup-content">
            <h3>Thông báo</h3>
            <span id="closePopup" class="close-popup">&times;</span>
            <div class="notification-item unread">
            <p class="title">Tin nhắn mới <span class="unread-indicator"></span></p>
             <!-- Dấu chấm xanh cho thông báo chưa đọc -->
                <p class="message">Bạn có tin nhắn mới từ quản trị viên.</p>
                <p class="time">2024-11-13 3:45 PM</p>
            </div>
            <div class="notification-item">
                <p class="title">Cập nhật hệ thống</p>
                <p class="message">Hệ thống sẽ bảo trì vào ngày mai lúc 10:30 AM.</p>
                <p class="time">2024-11-14 10:30 AM</p>
            </div>
            <div class="notification-item unread">
            <p class="title">Cảnh báo bảo mật <span class="unread-indicator"></span></p>
             <!-- Dấu chấm xanh cho thông báo chưa đọc -->
                <p class="message">Đã phát hiện đăng nhập bất thường từ thiết bị lạ.</p>
                <p class="time">2024-11-13 7:00 PM</p>
            </div>
            </div>
        </div>
    </div>