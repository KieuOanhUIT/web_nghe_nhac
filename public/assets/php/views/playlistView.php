<?php
include_once '/xampp/htdocs/web_nghe_nhac/public/assets/php/control/playlistControl.php';
if (!isset($playlists)) {
    include_once '/xampp/htdocs/web_nghe_nhac/public/assets/php/config/config.php';
    include_once '/xampp/htdocs/web_nghe_nhac/public/assets/models/playlistModel.php';

    $database = new Database();
    $db = $database->getConnection();
    $playlistModel = new PlaylistModel($db);
    $playlists = $playlistModel->getAllPlaylists();
}
// Khởi tạo kết nối Database và Controller
if (!isset($controller)) {
    include_once '/xampp/htdocs/web_nghe_nhac/public/assets/php/control/playlistControl.php';
    $database = new Database();
    $db = $database->getConnection();
    $controller = new PlaylistController($db);
}
?>
<div class="header">
    <?php
    require $_SERVER['DOCUMENT_ROOT'] . "/web_nghe_nhac/app/pages/includes/header.php";
    ?>
</div>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.6.0/css/all.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap">
    <title>Artist</title>
    <script src="https://code.iconify.design/2/2.0.3/iconify.min.js"></script>
</head>



<body>
    <div id="overlay"></div>
    <!--lớp phủ làm tối màn hình cho pop up-->
    <!-- Insert header vào đây nhé -->
    <!-- kết thúc div thanh tìm kiếm -->
    <div class="main">
        <!-- div phần thân -->
        <div id="library">
            <!--div thư viện-->
            <div style="width: auto; display: flex;">
                <i id="library-icon" class="fa-solid fa-books"></i>
                <span id="library-text">Thư viện</span>
                <button type="submit" id="plus-button" style="cursor: pointer;"><i
                        class="fa-solid fa-plus"></i></button>
                <!--plus-->
            </div>
            <div id="type-playlist" style="width: auto;">
                <button id="playlist-button">Playlist</button>
                <button id="artist-button">Nghệ sĩ</button>
            </div>
            <div id="list-scroll">
                <?php
                if (!empty($playlists)) {
                    foreach ($playlists as $playlist) {
                        $maDSP = $playlist['MaDSP'];
                        $tenDSP = $playlist['TenDSP'];
                        $loaiDSP = $playlist['LoaiDSP'];
                        $imgName = $playlist['AnhDSP'];
                        $imgPath = "/web_nghe_nhac/public/assets/img/playlist/$imgName";

                        // Dữ liệu truyền vào JavaScript: mã, tên, loại, đường dẫn ảnh
                        echo "<div id='playlist$maDSP' onclick=\"updateArtistView('$maDSP', '$tenDSP', '$loaiDSP', '$imgPath')\">
                                <span id='chillingwithheart-icon'>
                                    <img src='$imgPath' alt='$tenDSP'>
                                </span>
                                <span id='chillingwithheart-text'>
                                    $tenDSP
                                    <br><span id='playlist-text'>" . ($loaiDSP === 'Playlist' ? 'Playlist' : 'Nghệ sĩ') . "</span>
                                </span>
                            </div>";
                    }
                } else {
                    echo "Không có danh sách phát nào!";
                }
            ?>
            </div>
        </div>

        <div id="artist">
            <!--div nghệ sĩ-->
            <div id="main-artist">
                <span id="avatar-artist">
                    <img src="/web_nghe_nhac/public/assets/img/playlist/playlist<?php echo $maDSP; ?>.jpg"
                        alt="Playlist">
                </span>
                <div class="info-artist">
                    <div id="artist-text">
                        <?php 
                        // Hiển thị "Nghệ sĩ" hoặc "Danh sách phát" dựa trên LoaiDSP
                        echo $loaiDSP === 'Nghệ sĩ' ? 'Nghệ sĩ' : 'Playlist'; 
                        ?>
                        <br>
                    </div>
                    <div id="artist-name">
                        <b><?php echo isset($tenPlaylist) ? $tenPlaylist : 'Loading tên playlist...'; ?></b><br>
                    </div>
                    <div id="artist-follower">
                        <?php 
                        // Hiển thị số người theo dõi hoặc số lượng bài hát
                        if ($loaiDSP === 'Nghệ sĩ') {
                            echo "123.456.789 người theo dõi";
                        } else {
                            echo isset($songCount) ? "$songCount bài hát" : "Loading số lượng bài hát...";;
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div id="play">
                <button id="circle" onclick="togglePlayPause()"><i id="playbutton"
                        class="fa-solid fa-play"></i></button>
                <button id="threedots"><i class="fa-solid fa-ellipsis"></i></button>
                <button id="follow-button">Thegto dõi</button>
                <button id="add-song-button"><i class="fa-solid fa-plus-large"></i></button>
                <button id="delete-playlist-button"><i class="fa-solid fa-trash"></i></button>
                <button id="threebars"><i class="fa-solid fa-bars"></i></button>
            </div>
            <div id="listsong">
                <div id="listsong-title">
                    <span id="sharp-title">#</span>
                    <span id="tenbaihat-title">Tên bài hát</span>
                    <span id="ngaythem-title">Ngày thêm</span>
                </div>
                <div id="songs"></div>
                <!--listsong của playlist-->
                <audio id="audio-player" controls style="display: none;"></audio> <!-- Thẻ audio để phát nhạc -->
            </div>
        </div>

        <div id="info-div">
            <!--Thông tin bài hát nghệ sĩ-->
            <div id="info-2icon">
                <button id="info-plus"><svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M14.4998 9.08122H9.08317V14.4979C9.08317 14.7852 8.96903 15.0608 8.76587 15.2639C8.5627 15.4671 8.28715 15.5812 7.99984 15.5812C7.71252 15.5812 7.43697 15.4671 7.2338 15.2639C7.03064 15.0608 6.9165 14.7852 6.9165 14.4979V9.08122H1.49984C1.21252 9.08122 0.936969 8.96708 0.733805 8.76392C0.530641 8.56075 0.416504 8.2852 0.416504 7.99788C0.416504 7.71057 0.530641 7.43502 0.733805 7.23185C0.936969 7.02869 1.21252 6.91455 1.49984 6.91455H6.9165V1.49788C6.9165 1.21057 7.03064 0.935016 7.2338 0.731851C7.43697 0.528687 7.71252 0.414551 7.99984 0.414551C8.28715 0.414551 8.5627 0.528687 8.76587 0.731851C8.96903 0.935016 9.08317 1.21057 9.08317 1.49788V6.91455H14.4998C14.7872 6.91455 15.0627 7.02869 15.2659 7.23185C15.469 7.43502 15.5832 7.71057 15.5832 7.99788C15.5832 8.2852 15.469 8.56075 15.2659 8.76392C15.0627 8.96708 14.7872 9.08122 14.4998 9.08122Z"
                            fill="white" />
                    </svg>
                </button>
                <button id="info-exit"><svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M14.8252 1.18583C14.725 1.0854 14.606 1.00573 14.4749 0.951363C14.3439 0.897 14.2034 0.869017 14.0615 0.869017C13.9196 0.869017 13.7791 0.897 13.6481 0.951363C13.517 1.00573 13.398 1.0854 13.2977 1.18583L8.00024 6.4725L2.70274 1.175C2.60245 1.0747 2.48338 0.995141 2.35233 0.94086C2.22129 0.88658 2.08083 0.858643 1.93899 0.858643C1.79715 0.858643 1.6567 0.88658 1.52565 0.94086C1.39461 0.995141 1.27554 1.0747 1.17524 1.175C1.07494 1.27529 0.995385 1.39436 0.941105 1.52541C0.886824 1.65645 0.858887 1.79691 0.858887 1.93875C0.858887 2.08059 0.886824 2.22104 0.941105 2.35209C0.995385 2.48313 1.07494 2.6022 1.17524 2.7025L6.47274 8L1.17524 13.2975C1.07494 13.3978 0.995385 13.5169 0.941105 13.6479C0.886824 13.779 0.858887 13.9194 0.858887 14.0612C0.858887 14.2031 0.886824 14.3435 0.941105 14.4746C0.995385 14.6056 1.07494 14.7247 1.17524 14.825C1.27554 14.9253 1.39461 15.0049 1.52565 15.0591C1.6567 15.1134 1.79715 15.1414 1.93899 15.1414C2.08083 15.1414 2.22129 15.1134 2.35233 15.0591C2.48338 15.0049 2.60245 14.9253 2.70274 14.825L8.00024 9.5275L13.2977 14.825C13.398 14.9253 13.5171 15.0049 13.6482 15.0591C13.7792 15.1134 13.9196 15.1414 14.0615 15.1414C14.2033 15.1414 14.3438 15.1134 14.4748 15.0591C14.6059 15.0049 14.7249 14.9253 14.8252 14.825C14.9255 14.7247 15.0051 14.6056 15.0594 14.4746C15.1137 14.3435 15.1416 14.2031 15.1416 14.0612C15.1416 13.9194 15.1137 13.779 15.0594 13.6479C15.0051 13.5169 14.9255 13.3978 14.8252 13.2975L9.52774 8L14.8252 2.7025C15.2369 2.29083 15.2369 1.5975 14.8252 1.18583Z"
                            fill="white" />
                    </svg>
                </button>
            </div>
            <div id="info-body">
                <div id="infodiv-song">
                    <img src="https://avatar-ex-swe.nixcdn.com/song/2024/10/21/b/c/1/6/1729510339340_640.jpg" alt="">
                    <span id="info-namesong">Cung tên tình yêu<br><span id="info-authorsong">Pháp Kiều</span></span>
                </div>
                <div id="custom-rate">
                    <div id="custom-rate-header" style="margin-bottom: 20px;">
                        <span id="rate-danhgia">Đánh giá</span>
                        <span id="rate-tatca">Tất cả</span>
                    </div>
                    <div id="user-rate">
                        <span id="custom-name">Hoang Trinh Anh Khoa<br></span>
                        <div id="rating-container" style="margin-top: 5px; margin-bottom: 4px;">
                            <span id="rate1"><i class="fa-solid fa-circle"></i></span>
                            <span id="rate2"><i class="fa-solid fa-circle"></i></span>
                            <span id="rate3"><i class="fa-solid fa-circle"></i></span>
                            <span id="rate4"><i class="fa-solid fa-circle"></i></span>
                            <span id="rate5"><i class="fa-solid fa-circle"></i></span>
                        </div>
                        <span id="rate-comment">good</span>
                    </div>
                </div>
                <div id="info-artist-follow">
                    <span style="position: relative; overflow: hidden;" id="info-artist-follow-img">
                        <span style="position: absolute; left: 16px; top: 8px; z-index: 1;">Nghệ sĩ</span>
                        <img style="width: 100%; height: 100%; display: block; object-fit: cover;"
                            src="data:image/jpeg;base64,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"
                            alt="">
                    </span>
                    <div id="info-artist-follow-title">
                        <span id="info-artist-follow-name">Pháp Kiều</span>
                        <button>Theo dõi</button>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- kết thúc div phần thân -->
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/web_nghe_nhac/app/pages/includes/listeningSpace.php"; ?>
    <!--kết thúc div chân play pause-->
    <div id="create-newlist">
        <div id="return">
            <img src="/web_nghe_nhac/public/assets/icon/ic-return.svg" alt="">
        </div>

        <div id="lbl-create">
            <p>Tạo danh sách mới</p>
        </div>

        <form name="create-newlist" id="newlist-form">
            <button id="choose-image" onclick="document.getElementById('file-upload').click(); return false;">
                <img src="/web_nghe_nhac/public/assets/img/insert-img.svg" alt="">
            </button>
            <input type="file" id="file-upload" style="display: none;" accept="image/jpeg, image/png, image/jpg">
            <!--upload ảnh-->
            <div id="name-list">
                <p>Tên danh sách</p>
                <input type="text" name="name-list" required>
                <!--tên danh sách phát-->
            </div>

            <div id="scription">
                <p>Mô tả</p>
                <textarea name="scription" wrap="soft"></textarea>
                <!--Mô tả danh sách phát-->
            </div>
            <input type="submit" value="Tạo">
        </form>
    </div>
    <div id="them-bh-playlist">
        <div id="return">
            <img src="/web_nghe_nhac/public/assets/icon/ic-return.svg" alt="">
        </div>
        <p style="margin: 28px 0;">Thêm bài hát</p>
        <form id="form-them-bh">
            <div id="them-ten-bh">
                <label for="tenbh">Tên bài hát</label>
                <input type="text" name="tenbh" id="tenbh" required>
            </div>
            <input type="submit" value="Thêm">
        </form>
    </div>
    <div id="xoa-bh-playlist">
        <p>Bạn muốn xóa bài hát?</p>
        <div id="div-form-xoa-bh">
            <button id="cancel-button">Cancel</button>
            <form id="form-xoa-bh">
                <input type="hidden" id="song-id" name="songId" value="">
                <input type="submit" value="Xóa" id="xoa-bh-submit">
            </form>
        </div>
    </div>
    <div id="popup-xoa-playlist">
        <p>Bạn muốn xóa danh sách phát?</p>
        <div id="div-form-xoa-playlist">
            <button id="cancel-button-playlist">Cancel</button>
            <form id="form-xoa-playlist">
                <input type="hidden" id="song-id" name="songId" value="">
                <input type="submit" value="Xóa" id="xoa-playlist-submit">
            </form>
        </div>
    </div>
    <script src="/web_nghe_nhac/public/assets/script/playlist.js"></script>
</body>

</html>