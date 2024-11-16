// thông báo
const notificationIcon = document.getElementById('notificationIcon');
const notificationList = document.getElementById('notificationPopup');
const closePopup = document.getElementById('closePopup');

// Ẩn danh sách thông báo khi nhấn ra ngoài
document.addEventListener('click', (e) => {
    if (!notificationIcon.contains(e.target) && !notificationList.contains(e.target)) {
        notificationList.style.display = 'none';
    }
});

// Ẩn popup khi nhấn vào nút đóng
closePopup.addEventListener('click', () => {
    notificationList.style.display = 'none'; // Sửa đây để sử dụng notificationList
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

console.log("header.js is loaded!");

$(document).ready(function() {
    // Lắng nghe sự kiện click vào biểu tượng thông báo
    $('.notif').click(function() {
        $('.notification-popup').show(); 
    });

    // Lấy thông báo từ cơ sở dữ liệu
    $.ajax({
        url: 'noti.php',
        type: 'GET',
        dataType: 'json',
        success: function (notifications) {
            const notificationList = $('.popup-content');
            notificationList.find('.notification-item').remove(); // Xóa thông báo cũ

            if (notifications.length > 0) {
                notifications.forEach(notification => {
                    const notificationClass = notification.TrangThai === 'unread' ? 'notification-item unread' : 'notification-item';
                    const unreadIndicator = notification.TrangThai === 'unread' ? '<span class="unread-indicator"></span>' : '';

                    const notificationHTML = `
                        <div class="${notificationClass}" data-id="${notification.MaThongBao}">
                            <p class="title">${notification.TieuDe} ${unreadIndicator}</p>
                            <p class="message">${notification.NoiDung}</p>
                            <p class="time">${notification.ThoiGian}</p>
                        </div>
                    `;
                    notificationList.append(notificationHTML);
                });
            } else {
                notificationList.append('<p>Không có thông báo nào.</p>');
            }
        },
        error: function () {
            console.error('Không thể tải thông báo.');
        }
    });

    // Cập nhật trạng thái thông báo khi người dùng tích vào thông báo
    $(document).on('click', '.notification-item', function () {
        const notificationElement = $(this);
        const notificationId = notificationElement.data('id');

        $.ajax({
            url: 'noti.php',
            type: 'POST',
            data: { MaThongBao: notificationId },
            success: function () {
                notificationElement.removeClass('unread').addClass('read');
            },
            error: function () {
                console.error('Không thể cập nhật trạng thái thông báo.');
            }
        });
    });
});

// tìm kiếm
const searchInput = document.getElementById('search-input');
const searchesContainer = document.getElementById('searches-container');

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
