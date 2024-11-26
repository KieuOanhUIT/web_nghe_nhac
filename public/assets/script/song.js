function displaySong(song) {
    if (!song || typeof song !== 'object') {
        console.error('Song object is undefined, null, or not an object:', song);
        return;
    }

    console.log('Song id:', song.MaBaiHat);

    // Thêm ID bài hát vào listeningSpace
    const listeningSpace = document.getElementById('songID'); // Đảm bảo phần tử này tồn tại
    if (listeningSpace) {
        listeningSpace.setAttribute('data-song-id', song.MaBaiHat || '');
    }

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

    // Gọi hàm loadReviews với MaBaiHat
    loadReviews(song.MaBaiHat);
}

// Gọi loadSongs khi trang được tải
document.addEventListener('DOMContentLoaded', loadSongs);


// Phải - Đánh giá
// Load đánh giá cho bài hát
async function loadReviews(songId) {
    try {
        const response = await fetch(`/web_nghe_nhac/app/pages/reviews.php?MaBaiHat=${songId}`);
        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        }

        const data = await response.json();

        if (!data.success) {
            console.error('Không thể tải đánh giá:', data.message);
            return;
        }

        // Cập nhật giao diện với đánh giá
        const reviews = data.reviews || [];
        const evaluateContainer = document.querySelector('.box-Evaluate .NameEvaluate');
        evaluateContainer.innerHTML = '';

        if (reviews.length === 0) {
            evaluateContainer.innerHTML = '<p>Chưa có đánh giá nào.</p>';
            return;
        }

        reviews.forEach(review => {
            const reviewElement = document.createElement('div');
            reviewElement.classList.add('box-E'); // Thêm class box-E

            // Tạo phần các dot dựa trên điểm đánh giá
            const numDots = review.DiemDG; // Số điểm từ 1 đến 10
            let dotsHTML = '';
            for (let i = 0; i < 5; i++) {
                if (i < numDots) {
                    dotsHTML += '<span class="dot"></span>';
                } else {
                    dotsHTML += '<span class="dot-empty"></span>';
                }
            }

            // Xác định trạng thái dựa trên điểm
            let status = '';
            if (numDots >= 4) {
                status = 'Good';
            } else if (numDots = 3) {
                status = 'Average';
            } else {
                status = 'Poor';
            }

            reviewElement.innerHTML = `
                <div class="Name">
                    <p>${review.TenNguoiDung}</p>
                </div>
                <div class="Eva">
                    <div class="Eva-Oval">
                        ${dotsHTML}
                    </div>
                    <div class="Eva-status">
                        <p>${status}</p>
                    </div>
                </div>
            `;
            evaluateContainer.appendChild(reviewElement);
        });
    } catch (error) {
        console.error('Lỗi khi tải đánh giá:', error);
    }
}