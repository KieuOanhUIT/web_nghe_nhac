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

<body>
    <div id="overlay"></div>
    <!--lớp phủ làm tối màn hình cho pop up-->
    <!-- Insert header vào đây nhé -->
    <?php include '/xampp/htdocs/web_nghe_nhac/app/pages/includes/header.php'; ?>
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
                <button id="follow-button">Theo dõi</button>
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
                    <img src="../img/song3.png" alt="">
                    <span id="info-namesong">I can do it with a broken heart<br><span id="info-authorsong">Taylor
                            Swift</span></span>
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
                    <span id="info-artist-follow-img">
                        <span>Nghệ sĩ</span>
                    </span>
                    <div id="info-artist-follow-title">
                        <span id="info-artist-follow-name">Taylor Swift</span>
                        <button>Theo dõi</button>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- kết thúc div phần thân -->
    <!--Insert footer vào đây nhé-->
    <?php include '/xampp/htdocs/web_nghe_nhac/app/pages/includes/footer.php'; ?>
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