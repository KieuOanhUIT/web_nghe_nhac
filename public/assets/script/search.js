    // Hàm để bật/tắt phần giao diện tìm kiếm
    function toggleSearchContainer(show) {
        const searchContainer = document.getElementById("search-container");
        if (show) {
            searchContainer.style.display = "block";
        } else {
            searchContainer.style.display = "none";
        }
    }

    // Đóng phần tìm kiếm khi nhấn bên ngoài
    document.addEventListener("click", function(event) {
        const searchInput = document.querySelector(".search-input");
        const searchContainer = document.getElementById("search-container");

        if (!searchContainer.contains(event.target) && event.target !== searchInput) {
            toggleSearchContainer(false);
        }
    });

    // Hàm xóa lịch sử tìm kiếm
    function clearSearchHistory() {
        const searchItems = document.getElementById("search-items");
        searchItems.innerHTML = "";  // Xóa tất cả các mục trong danh sách tìm kiếm
    }
