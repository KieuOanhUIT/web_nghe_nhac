// Function to fetch songs from the API
async function loadSongs() {
    try {
        const response = await fetch('/web_nghe_nhac/app/pages/song.php');
        if (!response.ok) {
            throw new Error('Failed to fetch songs');
        }

        const data = await response.json();
        const songs = data.results; // Danh sách bài hát từ API

        if (songs.length > 0) {
            // Hiển thị bài hát đầu tiên lên Listening Space
            displaySong(songs[0]);
        }
    } catch (error) {
        console.error('Error loading songs:', error);
    }
}

// Function to update the UI with a song's details
function displaySong(song) {
    // Update song image
    const songImage = document.getElementById('songImage');
    songImage.src = song.AnhBaiHat 
    ? `/web_nghe_nhac/public/assets/img/data-songs-image/${song.AnhBaiHat}` 
    : `/web_nghe_nhac/public/assets/img/dsyeuthich.png`; // Ảnh mặc định nếu không có

    // Update song name
    const songName = document.getElementById('songName');
    songName.textContent = song.TenBaiHat || 'Unknown Song';

    // Update artist name
    const songAuthor = document.getElementById('songAuthor');
    songAuthor.textContent = song.TenNgheSy || 'Unknown Artist';

    // Update audio player source
    const audioPlayer = document.getElementById('audioPlayer');
    audioPlayer.src = song.FileBaiHat 
    ? `/web_nghe_nhac/public/song/${song.FileBaiHat}` 
    : `/web_nghe_nhac/public/song/Hẹn Gặp Em Dưới Ánh Trăng - HURRYKNG, HIEUTHUHAI, MANBO Lyrics Video .mp3`; // Đường dẫn file âm thanh
}
// Gọi loadSongs khi trang được tải
document.addEventListener('DOMContentLoaded', loadSongs);
