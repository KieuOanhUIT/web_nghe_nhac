<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Song manage</title>
    <link rel="stylesheet" href="/web_nghe_nhac-main/public/assets/css/song_manage.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.6.0/css/all.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
        rel="stylesheet">
    <title>Playlist Info</title>
    <script src="https://code.iconify.design/2/2.0.3/iconify.min.js"></script>
</head>

<?php
include_once '/xampp/htdocs/web_nghe_nhac-main/public/assets/php/control/song_manage_control.php';
if (!isset($songs)) {
    include_once '/xampp/htdocs/web_nghe_nhac-main/public/assets/php/config/config.php';
    include_once '/xampp/htdocs/web_nghe_nhac-main/public/assets/models/song_manage_model.php';

    $database = new Database();
    $db = $database->getConnection();
    $songManageModel = new SongManageModel($db);
    $songs = $songManageModel->getAllSongs();
}
// Khởi tạo kết nối Database và Controller
if (!isset($song_manage_controller)) {
    include_once '/xampp/htdocs/web_nghe_nhac-main/public/assets/php/control/song_manage_control.php';
    $database = new Database();
    $db = $database->getConnection();
    $song_manage_controller = new SongManageController($db);
}
?>

<body>
    <div id="overlay"></div>
    <div id="menu">
        <div id="qlbh">
            <div id="qlbh-header">
                Quản lý bài hát
            </div>
            <div id="qlbh-body">
                <button id="thembaihat-div">
                    <span id="qlbh-funtion-logo">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="24" height="24" rx="12" fill="white" />
                            <path
                                d="M18 13H13V18C13 18.55 12.55 19 12 19C11.45 19 11 18.55 11 18V13H6C5.45 13 5 12.55 5 12C5 11.45 5.45 11 6 11H11V6C11 5.45 11.45 5 12 5C12.55 5 13 5.45 13 6V11H18C18.55 11 19 11.45 19 12C19 12.55 18.55 13 18 13Z"
                                fill="black" />
                        </svg>
                    </span>
                    <span id="qlbh-funtion-title">
                        Thêm bài hát
                    </span>
                </button>
                <button id="button-cap-nhat-bai-hat">
                    <span id="qlbh-funtion-logo">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="24" height="24" rx="12" fill="white" />
                            <path
                                d="M11.6404 15.6961L16.0778 11.2586C15.3313 10.9468 14.6533 10.4914 14.0823 9.91829C13.5089 9.34714 13.0533 8.66893 12.7414 7.92216L8.30392 12.3596C7.95773 12.7058 7.78433 12.8792 7.63554 13.07C7.45998 13.2953 7.30931 13.5389 7.18615 13.7966C7.08236 14.0149 7.00496 14.2477 6.85017 14.7121L6.033 17.1618C5.99539 17.274 5.98981 17.3944 6.01688 17.5096C6.04396 17.6247 6.10262 17.7301 6.18627 17.8137C6.26993 17.8974 6.37525 17.956 6.49041 17.9831C6.60557 18.0102 6.726 18.0046 6.83817 17.967L9.28788 17.1498C9.75286 16.995 9.98505 16.9176 10.2034 16.8138C10.4622 16.6906 10.7044 16.5409 10.93 16.3645C11.1208 16.2157 11.2942 16.0423 11.6404 15.6961ZM17.309 10.0275C17.7514 9.58504 18 8.98496 18 8.35925C18 7.73354 17.7514 7.13345 17.309 6.69101C16.8665 6.24856 16.2665 6 15.6408 6C15.015 6 14.415 6.24856 13.9725 6.69101L13.4403 7.22319L13.4631 7.28979C13.7253 8.04023 14.1545 8.72133 14.7183 9.28171C15.2954 9.86238 16.0004 10.3 16.7768 10.5597L17.309 10.0275Z"
                                fill="black" />
                        </svg>
                    </span>
                    <span id="qlbh-funtion-title">
                        Cập nhật bài hát
                    </span>
                </button>
                <button id="button-xoa-bai-hat">
                    <span id="qlbh-funtion-logo">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="24" height="24" rx="12" fill="white" />
                            <path
                                d="M7.71429 17.4444C7.71429 18.3 8.35714 19 9.14286 19H14.8571C15.6429 19 16.2857 18.3 16.2857 17.4444V9.66667C16.2857 8.81111 15.6429 8.11111 14.8571 8.11111H9.14286C8.35714 8.11111 7.71429 8.81111 7.71429 9.66667V17.4444ZM16.2857 5.77778H14.5L13.9929 5.22556C13.8643 5.08556 13.6786 5 13.4929 5H10.5071C10.3214 5 10.1357 5.08556 10.0071 5.22556L9.5 5.77778H7.71429C7.32143 5.77778 7 6.12778 7 6.55556C7 6.98333 7.32143 7.33333 7.71429 7.33333H16.2857C16.6786 7.33333 17 6.98333 17 6.55556C17 6.12778 16.6786 5.77778 16.2857 5.77778Z"
                                fill="black" />
                        </svg>
                    </span>
                    <span id="qlbh-funtion-title">
                        Xóa bài hát
                    </span>
                </button>
            </div>
        </div>
        <div id="qltk">
            Quản lý tài khoản
        </div>
        <div id="baocao">
            <span>
                <svg width="17" height="22" viewBox="0 0 17 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M4 12.5H10V14H4V12.5ZM4 8.75H13V10.25H4V8.75ZM4 16.25H7.75V17.75H4V16.25Z" fill="white" />
                    <path
                        d="M15.25 2.75H13V2C13 1.60218 12.842 1.22064 12.5607 0.93934C12.2794 0.658035 11.8978 0.5 11.5 0.5H5.5C5.10218 0.5 4.72064 0.658035 4.43934 0.93934C4.15804 1.22064 4 1.60218 4 2V2.75H1.75C1.35218 2.75 0.970644 2.90804 0.68934 3.18934C0.408035 3.47064 0.25 3.85218 0.25 4.25V20C0.25 20.3978 0.408035 20.7794 0.68934 21.0607C0.970644 21.342 1.35218 21.5 1.75 21.5H15.25C15.6478 21.5 16.0294 21.342 16.3107 21.0607C16.592 20.7794 16.75 20.3978 16.75 20V4.25C16.75 3.85218 16.592 3.47064 16.3107 3.18934C16.0294 2.90804 15.6478 2.75 15.25 2.75ZM5.5 2H11.5V5H5.5V2ZM15.25 20H1.75V4.25H4V6.5H13V4.25H15.25V20Z"
                        fill="white" />
                </svg>
            </span>
            <span>
                Báo cáo
            </span>
        </div>
    </div>
    <div id="main">
        <div id="main-head">
            <div id="search-bar">
                <div id="search-typing">
                    <span>
                        <svg width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M19.5 19L13.5 13M1.5 8C1.5 8.91925 1.68106 9.82951 2.03284 10.6788C2.38463 11.5281 2.90024 12.2997 3.55025 12.9497C4.20026 13.5998 4.97194 14.1154 5.82122 14.4672C6.6705 14.8189 7.58075 15 8.5 15C9.41925 15 10.3295 14.8189 11.1788 14.4672C12.0281 14.1154 12.7997 13.5998 13.4497 12.9497C14.0998 12.2997 14.6154 11.5281 14.9672 10.6788C15.3189 9.82951 15.5 8.91925 15.5 8C15.5 7.08075 15.3189 6.1705 14.9672 5.32122C14.6154 4.47194 14.0998 3.70026 13.4497 3.05025C12.7997 2.40024 12.0281 1.88463 11.1788 1.53284C10.3295 1.18106 9.41925 1 8.5 1C7.58075 1 6.6705 1.18106 5.82122 1.53284C4.97194 1.88463 4.20026 2.40024 3.55025 3.05025C2.90024 3.70026 2.38463 4.47194 2.03284 5.32122C1.68106 6.1705 1.5 7.08075 1.5 8Z"
                                stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </span>
                    <input id="search-input" type="text" placeholder="Tìm kiếm tên bài hát hoặc nghệ sỹ">
                    <!--Thanh tìm kiếm-->
                </div>
                <button id="search-button">
                    Tìm kiếm
                </button>
            </div>
        </div>
        <div id="main-body">
            <div id="songs-title">
                <span>#</span>
                <span>Tên bài hát</span>
                <span>Thể loại</span>
            </div>
            <div id="songs-list">
                <?php
                    if (!empty($songs)) {
                        foreach ($songs as $index => $song) {
                            $maBH = $song['MaBaiHat'];
                            $tenBH = $song['TenBaiHat'];
                            $anhBH = $song['AnhBaiHat'];
                            $anhBHPath = "/web_nghe_nhac-main/public/assets/img/data-songs-image/$anhBH";
                            $tenNgheSy = $song['TenNgheSy'];
                            $theLoai = $song['TenTheLoai'];

                            echo '<div class="song">
                                    <input class="checkbox" type="checkbox" value="' . htmlspecialchars($maBH) . '">
                                    <span class="stt">' . ($index + 1) . '</span>
                                    <img class="img" src="' . htmlspecialchars($anhBHPath) . '" alt="' . htmlspecialchars($tenBH) . '">
                                    <span class="title">
                                        <span class="tenBH">' . htmlspecialchars($tenBH) . '</span>
                                        <span class="tenNS">' . htmlspecialchars($tenNgheSy) . '</span>
                                    </span>
                                    <span class="type">' . htmlspecialchars($theLoai) . '</span>
                                </div>';
                        }
                    } else {
                        echo "<p>Không có bài hát nào để hiển thị.</p>";
                    }
                ?>
            </div>
        </div>
    </div>
    <!--Thêm bài hát-->
    <div id="them-bh-popup">
        <button id="return">
            <svg width="51" height="51" viewBox="0 0 51 51" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect x="0.5" y="0.5" width="49.7412" height="49.7647" rx="24.8706" stroke="white" />
                <path
                    d="M30.3724 16.3672C30.2563 16.2508 30.1184 16.1585 29.9665 16.0955C29.8147 16.0324 29.6519 16 29.4874 16C29.323 16 29.1602 16.0324 29.0084 16.0955C28.8565 16.1585 28.7186 16.2508 28.6024 16.3672L20.2924 24.6772C20.1997 24.7697 20.1262 24.8796 20.076 25.0006C20.0258 25.1216 20 25.2513 20 25.3822C20 25.5132 20.0258 25.6429 20.076 25.7639C20.1262 25.8848 20.1997 25.9947 20.2924 26.0872L28.6024 34.3972C29.0924 34.8872 29.8824 34.8872 30.3724 34.3972C30.8624 33.9072 30.8624 33.1172 30.3724 32.6272L23.1324 25.3772L30.3824 18.1272C30.8624 17.6472 30.8624 16.8472 30.3724 16.3672Z"
                    fill="white" />
            </svg>
        </button>
        <span id="popup-title">Thêm bài hát mới</span>
        <form name="form-them-bh" id=form>
            <button id="choose-image" onclick="document.getElementById('file-upload').click(); return false;">
                <img src="/web_nghe_nhac-main/public/assets/img/insert-img.svg" alt="">
            </button>
            <input type="file" id="file-upload" accept="image/jpeg, image/png, image/jpg" style="display: none;">
            <div id="name-bh">
                <p>Tên bài hát</p>
                <input type="text" name="name-bh" id="them-ten-bai-hat" required>
            </div>
            <div id="name-artist">
                <p>Nghệ sỹ</p>
                <input type="text" name="name-artist" id="them-ten-nghe-sy" required>
            </div>
            <div id="theloai">
                <p>Thể loại</p>
                <select name="theloai" id="select-theloai">
                    <option value="1">Pop</option>
                    <option value="2">K-Pop</option>
                    <option value="3">USUK</option>
                    <option value="4">R&B</option>
                    <option value="5">Hip-hop/Rap</option>
                    <option value="6">EDM</option>
                    <option value="7">Ballad</option>
                    <option value="8">Country</option>
                    <option value="9">Indie</option>
                    <option value="10">Latin</option>
                </select>
            </div>
            <div id="lyrics">
                <p>Lời bài hát</p>
                <textarea name="lyrics" wrap="soft"></textarea>
                <!--Mô tả danh sách phát-->
            </div>
            <div style="display: flex; align-items: center;">
                <button id="upload-bai-hat-button" type="button"
                    onclick="document.getElementById('upload-bai-hat').click()" ; return false;>Upload nhạc</button>
                <input type="file" id="upload-bai-hat" accept=".mp3, .wav" style="display: none;">
                <input type="submit" value="Tạo">
            </div>
        </form>
    </div>
    <!--Sửa bài hát-->
    <div id="cap-nhat-bh-popup">
        <input type="hidden" name="id-bh" id="cap-nhat-id-bh">
        <!--Input ẩn để lưu mã bài hát-->
        <button id="cap-nhat-return">
            <svg width="51" height="51" viewBox="0 0 51 51" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect x="0.5" y="0.5" width="49.7412" height="49.7647" rx="24.8706" stroke="white" />
                <path
                    d="M30.3724 16.3672C30.2563 16.2508 30.1184 16.1585 29.9665 16.0955C29.8147 16.0324 29.6519 16 29.4874 16C29.323 16 29.1602 16.0324 29.0084 16.0955C28.8565 16.1585 28.7186 16.2508 28.6024 16.3672L20.2924 24.6772C20.1997 24.7697 20.1262 24.8796 20.076 25.0006C20.0258 25.1216 20 25.2513 20 25.3822C20 25.5132 20.0258 25.6429 20.076 25.7639C20.1262 25.8848 20.1997 25.9947 20.2924 26.0872L28.6024 34.3972C29.0924 34.8872 29.8824 34.8872 30.3724 34.3972C30.8624 33.9072 30.8624 33.1172 30.3724 32.6272L23.1324 25.3772L30.3824 18.1272C30.8624 17.6472 30.8624 16.8472 30.3724 16.3672Z"
                    fill="white" />
            </svg>
        </button>
        <span id="cap-nhat-popup-title">Cập nhật bài hát</span>
        <form name="form-cap-nhat-bh" id=cap-nhat-bh-form>
            <!--<button id="cap-nhat-choose-image" onclick="document.getElementById('file-upload').click(); return false;">
                <img src="/web_nghe_nhac-main/public/assets/img/insert-img.svg" alt="">
            </button>
            <input type="file" id="cap-nhat-file-upload" accept="image/jpeg, image/png, image/jpg"
                style="display: none;">-->
            <div id="cap-nhat-name-bh">
                <p>Tên bài hát</p>
                <input type="text" name="name-bh" id="cap-nhat-ten-bai-hat" required>
            </div>
            <div id="cap-nhat-name-artist">
                <p>Nghệ sỹ</p>
                <input type="text" name="name-artist" id="cap-nhat-ten-nghe-sy" required>
            </div>
            <div id="cap-nhat-theloai">
                <p>Thể loại</p>
                <select name="theloai" id="cap-nhat-select-theloai">
                    <option value="1">Pop</option>
                    <option value="2">K-Pop</option>
                    <option value="3">USUK</option>
                    <option value="4">R&B</option>
                    <option value="5">Hip-hop/Rap</option>
                    <option value="6">EDM</option>
                    <option value="7">Ballad</option>
                    <option value="8">Country</option>
                    <option value="9">Indie</option>
                    <option value="10">Latin</option>
                </select>
            </div>
            <div id="cap-nhat-lyrics">
                <p>Lời bài hát</p>
                <textarea name="cap-nhat-lyrics" id="cap-nhat-loi-bai-hat" wrap="soft"></textarea>
                <!--Mô tả danh sách phát-->
            </div>
            <div style="display: flex; align-items: center;">
                <!--<button id="cap-nhat-upload-bh" type="button"
                    onclick="document.getElementById('upload-bai-hat').click()" ; return false;>Upload nhạc</button>
                <input type="file" id="cap-nhat-upload-bh" accept=".mp3, .wav" style="display: none;">-->
                <input type="submit" value="Cập nhật" id="cap-nhat-submit">
            </div>
        </form>
    </div>
    <script src="/web_nghe_nhac-main/public/assets/script/song_manage.js"></script>
</body>

</html>