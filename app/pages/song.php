<?php
require_once '../core/functions.php';

// Bật hiển thị lỗi nếu có
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Thiết lập tiêu đề Content-Type là application/json
header('Content-Type: application/json');

// Kết nối cơ sở dữ liệu
require_once '../core/functions.php';

// Truy vấn lấy thông báo từ cơ sở dữ liệu
$query = "SELECT * FROM baihat b JOIN nghesy n ON b.MaNgheSy = n.MaNgheSy ORDER BY MaBaiHat";
$result = db_query($query); // Thực thi câu truy vấn
$results = ['results' => $result];
echo json_encode($results);
?>
