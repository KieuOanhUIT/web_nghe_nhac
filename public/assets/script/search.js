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
