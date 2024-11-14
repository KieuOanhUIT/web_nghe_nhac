// thông báo
const notificationIcon = document.getElementById('notificationIcon');
const notificationList = document.getElementById('notificationPopup');

// Ẩn danh sách thông báo khi nhấn ra ngoài
document.addEventListener('click', (e) => {
    if (!notificationIcon.contains(e.target) && !notificationList.contains(e.target)) {
        notificationList.style.display = 'none';
    }
});
$(document).ready(function() {
    $('.notif').click(function() {
        $('.notification-popup').show(); 
    })
});
// Ẩn popup khi nhấn vào nút đóng
closePopup.addEventListener('click', () => {
    notificationPopup.style.display = 'none';
});

// Giả sử bạn có một chức năng để đánh dấu thông báo đã đọc
function markAsRead(notificationElement) {
    notificationElement.classList.add('read'); // Thêm lớp 'read' vào thông báo đã đọc
}

// Gọi hàm này khi người dùng nhấp vào một thông báo
document.querySelectorAll('.notification-item').forEach(item => {
    item.addEventListener('click', () => {
        markAsRead(item); // Đánh dấu thông báo là đã đọc
    });
});

//tìm kiếm
const searchinput = document.getElementById('searchi-nput');
const searchescontainer = document.getElementById('searches-container');
    $(document.body).ready(function () {
        $('#search-input').click(function () {
            $('.wrapperSlider').toggle();
            $('.searches-container').toggle();
        });
    });

    // Hàm xóa lịch sử tìm kiếm
    function clearSearchHistory() {
        const searchItems = document.getElementById("search-items");
        searchItems.innerHTML = "";  // Xóa tất cả các mục trong danh sách tìm kiếm
    }

    function performSearch(keyword) {
        if (keyword.length === 0) {
            document.getElementById('search-items').innerHTML = ''; // Clear search results
            return;
        }

        // Send AJAX request to search.php
        $.ajax({
            url: '/web_nghe_nhac/app/pages/search.php',
            type: 'GET',
            data: { keyword: keyword },
            success: function(response) {
                // Parse the JSON response
                const results = JSON.parse(response);

                // Clear previous results
                document.getElementById('search-items').innerHTML = '';

                // Populate search results
                results.forEach(item => {
                    document.getElementById('search-items').innerHTML += `
                        <div class="search-item">
                            <a href="/web_nghe_nhac/song_details.php?id=${item.id}">
                                <img src="path/to/image/${item.image}" alt="${item.tenbaihat}">
                                <h3>${item.tenbaihat}</h3>
                            </a>
                            <a href="/web_nghe_nhac/artist_details.php?id=${item.artist_id}">
                                <p>${item.artist}</p>
                            </a>
                        </div>
                    `;
                });
            }
        });
    }
