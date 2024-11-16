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

$(document).ready(function() {
    // Lắng nghe sự kiện click vào biểu tượng thông báo
    $('.notif').click(function() {
        $('.notification-popup').show(); 
    });

    // Lấy thông báo từ cơ sở dữ liệu
    $.ajax({
        url: '/web_nghe_nhac/app/pages/noti.php', // Đảm bảo đường dẫn chính xác
        type: 'GET',
        dataType: 'json',
        success: function (notifications) {
            const notificationList = $('.popup-content');
            notificationList.find('.notification-item').remove(); // Xóa các thông báo cũ

            // Kiểm tra nếu có thông báo
            if (notifications.length > 0) {
                notifications.forEach(notification => {
                    // Kiểm tra trạng thái của thông báo (0: chưa đọc, 1: đã đọc)
                    const notificationClass = notification.TrangThai === 0 ? 'notification-item unread' : 'notification-item';
                    const unreadIndicator = notification.TrangThai === 0 ? '<span class="unread-indicator"></span>' : '';

                    // Tạo HTML cho mỗi thông báo
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
        error: function (xhr, status, error) {
            console.error('Không thể tải thông báo.', status, error);
            console.log(xhr.responseText);  // In thông báo lỗi chi tiết nếu có
        }
    });

    // Cập nhật trạng thái thông báo khi người dùng nhấp vào thông báo
    $(document).on('click', '.notification-item', function () {
        const notificationElement = $(this);
        const notificationId = notificationElement.data('id');

        // Gửi yêu cầu POST để cập nhật trạng thái thông báo
        $.ajax({
            url: '/web_nghe_nhac/app/pages/noti.php',
            type: 'POST',
            data: { MaThongBao: notificationId },
            success: function(response) {
                const data = JSON.parse(response);
                if (data.status === 'success') {
                    // Loại bỏ chấm xanh và thay đổi lớp
                    notificationElement.removeClass('unread').addClass('read');
                    notificationElement.find('.unread-indicator').remove();
                } else {
                    console.error('Không thể cập nhật trạng thái thông báo.');
                }
            },
            error: function() {
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
