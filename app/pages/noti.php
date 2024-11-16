<?php
require_once '../core/functions.php';
// Kết nối đến database

// Hiển thị lỗi nếu có
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

if (!isset($_SESSION['MaNguoiDung'])) {
    $_SESSION['MaNguoiDung'] = 1; // Giả lập mã người dùng cho thử nghiệm
}
$maNguoiDung = $_SESSION['MaNguoiDung'];

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Truy vấn dữ liệu thông báo
    $query = "SELECT MaThongBao, TieuDe, NoiDung, ThoiGian, TrangThai 
              FROM thongbao 
              WHERE MaNguoiDung = ? 
              ORDER BY ThoiGian DESC";

    $notifications = db_query($query, [$maNguoiDung]);

    // Kiểm tra dữ liệu trả về
    if ($notifications === false) {
        echo "Không thể lấy dữ liệu từ cơ sở dữ liệu.";
        exit;
    }

    // Debug: In ra kết quả trả về từ db_query
    echo '<pre>';
    print_r($notifications); // In ra kết quả từ db_query
    echo '</pre>';
    exit;
}




if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Xử lý cập nhật trạng thái thông báo
    if (isset($_POST['MaThongBao'])) {
        $maThongBao = $_POST['MaThongBao'];

        $query = "UPDATE thongbao 
                  SET TrangThai = 'read' 
                  WHERE MaThongBao = ?";
        
        db_query($query, [$maThongBao]);

        echo 'success';
        exit;
    } else {
        echo 'error';
        exit;
    }
}
?>
