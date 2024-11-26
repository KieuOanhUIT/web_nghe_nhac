<?php
session_start();

// Kiểm tra nếu dữ liệu đã có trong session
if (isset($_SESSION['package_type'], $_SESSION['price'], $_SESSION['duration'], $_SESSION['description'])) {
    // Lấy thông tin từ session
    $time = $_SESSION['duration'];
    $price = $_SESSION['price'];
    $total = $_SESSION['price'];  // Nếu tổng là giá, bạn có thể thay đổi tùy theo logic
    $description = $_SESSION['description'];
    $pack = $_SESSION['package_type'];

    // Nếu bạn muốn hiển thị ngày bắt đầu, bạn có thể lấy ngày hiện tại hoặc truyền thêm thông tin từ session
    $start_date = date('d-m-Y');  // Giả sử ngày bắt đầu là ngày hiện tại
    echo "<p>Bắt đầu từ: $start_date</p>";

    // Bạn có thể tiếp tục xử lý thanh toán, ví dụ: kết nối với cổng thanh toán.

} else {
    // Nếu không có dữ liệu trong session, chuyển hướng về trang pack-info.php
    echo "Không có thông tin đơn hàng. Vui lòng quay lại và chọn gói.";
    exit();
}
?>


<!DOCTYPE html>

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/d1b353cfc4.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/web_nghe_nhac/public/assets/css/payment.css">
    <title>Thanh toán</title>
    <style>
        /* cyrillic-ext */
        @font-face {
            font-family: 'Inter';
            font-style: italic;
            font-weight: 100 900;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/inter/v18/UcCm3FwrK3iLTcvnUwkT9nA2.woff2) format('woff2');
            unicode-range: U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F;
        }

        /* cyrillic */
        @font-face {
            font-family: 'Inter';
            font-style: italic;
            font-weight: 100 900;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/inter/v18/UcCm3FwrK3iLTcvnUwAT9nA2.woff2) format('woff2');
            unicode-range: U+0301, U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
        }

        /* greek-ext */
        @font-face {
            font-family: 'Inter';
            font-style: italic;
            font-weight: 100 900;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/inter/v18/UcCm3FwrK3iLTcvnUwgT9nA2.woff2) format('woff2');
            unicode-range: U+1F00-1FFF;
        }

        /* greek */
        @font-face {
            font-family: 'Inter';
            font-style: italic;
            font-weight: 100 900;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/inter/v18/UcCm3FwrK3iLTcvnUwcT9nA2.woff2) format('woff2');
            unicode-range: U+0370-0377, U+037A-037F, U+0384-038A, U+038C, U+038E-03A1, U+03A3-03FF;
        }

        /* vietnamese */
        @font-face {
            font-family: 'Inter';
            font-style: italic;
            font-weight: 100 900;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/inter/v18/UcCm3FwrK3iLTcvnUwsT9nA2.woff2) format('woff2');
            unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+0300-0301, U+0303-0304, U+0308-0309, U+0323, U+0329, U+1EA0-1EF9, U+20AB;
        }

        /* latin-ext */
        @font-face {
            font-family: 'Inter';
            font-style: italic;
            font-weight: 100 900;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/inter/v18/UcCm3FwrK3iLTcvnUwoT9nA2.woff2) format('woff2');
            unicode-range: U+0100-02AF, U+0304, U+0308, U+0329, U+1E00-1E9F, U+1EF2-1EFF, U+2020, U+20A0-20AB, U+20AD-20C0, U+2113, U+2C60-2C7F, U+A720-A7FF;
        }

        /* latin */
        @font-face {
            font-family: 'Inter';
            font-style: italic;
            font-weight: 100 900;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/inter/v18/UcCm3FwrK3iLTcvnUwQT9g.woff2) format('woff2');
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+0304, U+0308, U+0329, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
        }

        /* cyrillic-ext */
        @font-face {
            font-family: 'Inter';
            font-style: normal;
            font-weight: 100 900;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/inter/v18/UcCo3FwrK3iLTcvvYwYL8g.woff2) format('woff2');
            unicode-range: U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F;
        }

        /* cyrillic */
        @font-face {
            font-family: 'Inter';
            font-style: normal;
            font-weight: 100 900;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/inter/v18/UcCo3FwrK3iLTcvmYwYL8g.woff2) format('woff2');
            unicode-range: U+0301, U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
        }

        /* greek-ext */
        @font-face {
            font-family: 'Inter';
            font-style: normal;
            font-weight: 100 900;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/inter/v18/UcCo3FwrK3iLTcvuYwYL8g.woff2) format('woff2');
            unicode-range: U+1F00-1FFF;
        }

        /* greek */
        @font-face {
            font-family: 'Inter';
            font-style: normal;
            font-weight: 100 900;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/inter/v18/UcCo3FwrK3iLTcvhYwYL8g.woff2) format('woff2');
            unicode-range: U+0370-0377, U+037A-037F, U+0384-038A, U+038C, U+038E-03A1, U+03A3-03FF;
        }

        /* vietnamese */
        @font-face {
            font-family: 'Inter';
            font-style: normal;
            font-weight: 100 900;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/inter/v18/UcCo3FwrK3iLTcvtYwYL8g.woff2) format('woff2');
            unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+0300-0301, U+0303-0304, U+0308-0309, U+0323, U+0329, U+1EA0-1EF9, U+20AB;
        }

        /* latin-ext */
        @font-face {
            font-family: 'Inter';
            font-style: normal;
            font-weight: 100 900;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/inter/v18/UcCo3FwrK3iLTcvsYwYL8g.woff2) format('woff2');
            unicode-range: U+0100-02AF, U+0304, U+0308, U+0329, U+1E00-1E9F, U+1EF2-1EFF, U+2020, U+20A0-20AB, U+20AD-20C0, U+2113, U+2C60-2C7F, U+A720-A7FF;
        }

        /* latin */
        @font-face {
            font-family: 'Inter';
            font-style: normal;
            font-weight: 100 900;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/inter/v18/UcCo3FwrK3iLTcviYwY.woff2) format('woff2');
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+0304, U+0308, U+0329, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
        }
    </style>
</head>

<body>
    <!--Nút điều hướng-->
    <div class="navigation-buttons" onclick="goBack()">
        <button class="left-button">
            <img src="/web_nghe_nhac/public/assets/img/bx--caret-left-circle.svg" alt="icon_left" id="icon1">
        </button>
    </div>

    <div class="container">
        <p>Gói của bạn</p>
        <div class="info">
            <div class="info-1">
                <div class="row">
                    <h3 class="pack">Premium <?php echo $pack; ?></h3>
                    <label class="time"><?php echo $time; ?></label>
                </div>
                <div class="row">
                    <label class="description"><?php echo $description; ?></label>
                    <label class="price"></label>
                </div>
            </div>
            <div class="info-2">
                <div class="row">
                    <label class="title">Tổng:</label>
                    <label for="total" id="total" class="total"><?php echo $total; ?></label>
                </div>
                <div class="row">
                    <label class="title">Bắt đầu từ:</label>
                    <label class="start-date"><?php echo $start_date; ?></label>
                </div>
            </div>
        </div>
        <div class="method">
            <div class="radio-item">
                <input type="radio" name="payment-method" id="method" value="Momo">
                <img src="/web_nghe_nhac/public/assets/img/arcticons--momo.svg" alt="icon" class="icon">
                <label>Momo</label>
            </div>
            <div class="radio-item">
                <input type="radio" name="payment-method" id="method" value="VNPay">
                <img src="/web_nghe_nhac/public/assets/img/arcticons--v-vnpay.svg" alt="icon" class="icon">
                <label>VNPay</label>
            </div>
        </div>
        <div class="Thanh-toan">
            <button type="submit" class="Thanhtoan">Thanh toán</button>
        </div>
    </div>
    <script>
        // Hàm quay lại trang trước đó
        function goBack() {
            window.history.back(); // Quay lại trang trước đó trong lịch sử trình duyệt
        }
    </script>
</body>

</html>