<?php
session_start();

if (isset($_SESSION['package_type'], $_SESSION['price'], $_SESSION['name'], $_SESSION['user_id'])) {
    // Lấy thông tin từ session
    $total_amount = $_SESSION['price'];  // Giữ giá trị này nếu không có logic tính toán bổ sung
    $service_package = $_SESSION['package_type'];
    $user_id = $_SESSION['user_id'];
    $buyer_name = $_SESSION['name'];
    
    // Xác định ảnh QR dựa trên gói dịch vụ
    $qr_image = "";
    switch ($service_package) {
        case "Mini":
            $qr_image = "/web_nghe_nhac/public/assets/img/mini-vnpay.jpg";
            break;
        case "Individual":
            $qr_image = "/web_nghe_nhac/public/assets/img/individual-vnpay.jpg";
            break;
        case "Student":
            $qr_image = "/web_nghe_nhac/public/assets/img/student-vnpay.jpg";
            break;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/web_nghe_nhac/public/assets/css/vnpay.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.6.0/css/all.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
        rel="stylesheet">
    <title>VNPay</title>
    <script src="https://code.iconify.design/2/2.0.3/iconify.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="/web_nghe_nhac/public/assets/img/arcticons--v-vnpay.svg" alt="VnPay Logo">
            <h1>Thanh toán bằng Vnpay</h1>
        </div>
        <div class="info">
            <p><strong>Họ tên khách hàng:</strong> <?php echo $buyer_name; ?></p>
            <p><strong>Thông tin gói dịch vụ:</strong> <?php echo $service_package; ?></p>
            <p><strong>Tổng tiền:</strong> <?php echo $total_amount; ?> VND</p>
        </div>
        <form action="process-payment.php" method="POST">
            <div class="form-group">
                <!-- Hiển thị ảnh QR phù hợp với gói dịch vụ -->
                <img src="<?php echo $qr_image; ?>" alt="QR Code for <?php echo $service_package; ?>">
            </div>
            <p class="note">Sau khi quét mã hãy nhấn thanh toán để đợi xử lý giao dịch</p>
            <button type="submit" class="btn">Thanh toán</button>
        </form>
    </div>
</body>
</html>
