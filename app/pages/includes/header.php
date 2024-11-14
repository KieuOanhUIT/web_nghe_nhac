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
<style>
/* Dấu chấm xanh cho thông báo chưa đọc */
.unread-indicator {
    width: 8px;
    height: 8px;
    background-color: #296265; /* Màu xanh */
    border-radius: 50%;
    margin-right: 10px; /* Khoảng cách giữa dấu chấm và tiêu đề thông báo */
    display: inline-block;
}

/* Các mục thông báo đã đọc không hiển thị dấu chấm */
.notification-item.read .unread-indicator {
    display: none; /* Ẩn dấu chấm nếu đã đọc */
}

/* Popup thông báo */
.notification-popup {
    display: none; /* Ẩn popup mặc định */
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.8); /* Nền tối mờ */
    z-index: 1000;
    display: flex;
    align-items: center;
    justify-content: center; /* Căn giữa theo cả chiều ngang và dọc */
}

/* Cấu trúc nội dung của popup */
.popup-content {
    background-color: #222; /* Nền tối */
    width: 400px;
    max-height: 70vh; /* Giới hạn chiều cao */
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0px 4px 16px rgba(255, 255, 255, 0.2);
    position: relative;
    overflow-y: auto; /* Cho phép cuộn khi có nhiều thông báo */
    text-align: left; /* Căn trái nội dung */
    color: #ddd; /* Chữ màu xám nhạt */
}

.popup-content h3 {
    font-size: 20px;
    color: #fff; /* Chữ tiêu đề màu trắng */
    margin: 0 0 15px;
    text-align:center;
}

/* Nút đóng popup */
.close-popup {
    position: absolute;
    top: 10px;
    right: 15px;
    font-size: 24px;
    cursor: pointer;
    color: #aaa; /* Chữ màu xám nhạt */
    transition: color 0.3s;
}

.close-popup:hover {
    color: #fff; /* Chữ sáng lên khi hover */
}

.notification-item {
    padding: 15px 0;
    border-bottom: 1px solid #555; /* Đường kẻ màu xám nhạt */
}

.notification-item:last-child {
    border-bottom: none;
}

.notification-item .title {
    font-weight: bold;
    font-size: 16px;
    color: #f1f1f1; /* Chữ màu trắng nhạt */
}

.notification-item .message {
    font-size: 14px;
    color: #bbb; /* Chữ màu xám nhạt */
    margin: 5px 0;
    line-height: 1.4;
}

.notification-item .time {
    font-size: 12px;
    color: #888; /* Chữ màu xám đậm hơn */
    text-align: right;
}

/* Hiệu ứng hiện popup */
@keyframes fadeIn {
    from {
        opacity: 0;
        transform: scale(0.9);
    }
    to {
        opacity: 1;
        transform: scale(1);
    }
}
</style>