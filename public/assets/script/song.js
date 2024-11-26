// Hàm cập nhật UI với chi tiết bài hát
function displaySong(song) {
    if (!song || typeof song !== 'object') {
        console.error('Song object is undefined, null, or not an object:', song);
        return;
    }

    console.log('Displaying song:', song);

    // Cập nhật hình ảnh bài hát
    const songImage = document.getElementById('songImage');
    songImage.src = song.AnhBaiHat 
        ? `/web_nghe_nhac/public/assets/img/data-songs-image/${song.AnhBaiHat}` 
        : `/web_nghe_nhac/public/assets/img/dsyeuthich.png`;

    // Cập nhật tên bài hát
    const songName = document.getElementById('songName');
    songName.textContent = song.TenBaiHat || 'Unknown Song';

    // Cập nhật tên nghệ sĩ
    const songAuthor = document.getElementById('songAuthor');
    songAuthor.textContent = song.TenNgheSy || 'Unknown Artist';

    // Cập nhật nguồn âm thanh
    const audioPlayer = document.getElementById('audioPlayer');
    audioPlayer.src = song.FileBaiHat 
        ? `/web_nghe_nhac/public/song/${song.FileBaiHat}` 
        : '';

    // Cập nhật lời bài hát
    const lyric = document.getElementById('lyric');
    lyric.innerHTML = song.LoiBaiHat || 'Lời bài hát';
}

// Gọi loadSongs khi trang được tải
document.addEventListener('DOMContentLoaded', loadSongs);