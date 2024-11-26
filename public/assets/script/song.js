// Hàm cập nhật UI với chi tiết bài hát
// function displaySong(song) {
//     if (!song || typeof song !== 'object') {
//         console.error('Song object is undefined, null, or not an object:', song);
//         return;
//     }

//     console.log('Displaying song:', song);

//     // Cập nhật hình ảnh bài hát
//     const songImage = document.getElementById('songImage');
//     songImage.src = song.AnhBaiHat 
//         ? `/web_nghe_nhac/public/assets/img/data-songs-image/${song.AnhBaiHat}` 
//         : `/web_nghe_nhac/public/assets/img/dsyeuthich.png`;

//     // Cập nhật tên bài hát
//     const songName = document.getElementById('songName');
//     songName.textContent = song.TenBaiHat || 'Unknown Song';

//     // Cập nhật tên nghệ sĩ
//     const songAuthor = document.getElementById('songAuthor');
//     songAuthor.textContent = song.TenNgheSy || 'Unknown Artist';

//     // Cập nhật nguồn âm thanh
//     const audioPlayer = document.getElementById('audioPlayer');
//     audioPlayer.src = song.FileBaiHat 
//         ? `/web_nghe_nhac/public/song/${song.FileBaiHat}` 
//         : '';

//     // Cập nhật lời bài hát
//     const lyric = document.getElementById('lyric');
//     lyric.innerHTML = song.LoiBaiHat || 'Lời bài hát';
// }

function displaySong(song) {
    if (!song || typeof song !== 'object') {
        console.error('Song object is undefined, null, or not an object:', song);
        return;
    }

    console.log('Displaying song:', song);

    // Cập nhật hình ảnh bài hát
    const songImages = document.querySelectorAll('.songImage');
    songImages.forEach(img => {
        img.src = song.AnhBaiHat 
            ? `/web_nghe_nhac/public/assets/img/data-songs-image/${song.AnhBaiHat}` 
            : `/web_nghe_nhac/public/assets/img/dsyeuthich.png`;
    });

    // Cập nhật hình ảnh bài hát
    const artistImages = document.querySelectorAll('.artist-image');
    artistImages.forEach(img => {
        img.src = song.AnhNgheSy 
            ? `/web_nghe_nhac/public/assets/img/data-artists-image/${song.AnhNgheSy}` 
            : `/web_nghe_nhac/public/assets/img/dsyeuthich.png`;
    });

    // Cập nhật tên bài hát
    const songNames = document.querySelectorAll('.songName');
    songNames.forEach(name => {
        name.textContent = song.TenBaiHat || 'Unknown Song';
    });

    // Cập nhật tên nghệ sĩ
    const songAuthors = document.querySelectorAll('.songAuthor');
    songAuthors.forEach(author => {
        author.textContent = song.TenNgheSy || 'Unknown Artist';
    });

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