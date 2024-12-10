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