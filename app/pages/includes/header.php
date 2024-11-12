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
                <div class="notif">
                    <iconify-icon icon="ri:notification-4-line"></iconify-icon>
                </div>
                <div class="account">
                    <iconify-icon icon="mdi:account"></iconify-icon>

                </div>
                <p class="op_50" href="">ĐĂNG XUẤT</p>
            </div>
        </div>
    </header>