<?php
include '../../core/functions.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!isset($_POST['MaTaiKhoan'])) {
        echo "Thiếu mã tài khoản.";
        exit();
    }

    // Xóa tài khoản trong bảng taikhoan
    $sql = "DELETE FROM taikhoan WHERE MaTaiKhoan = :MaTaiKhoan";
    $params = [':MaTaiKhoan' => $_POST['MaTaiKhoan']];
    $affectedRows = db_query($sql, $params);

    if ($affectedRows) {
        echo "Tài khoản đã được xóa thành công.";
    } else {
        echo "Không thể xóa tài khoản hoặc tài khoản không tồn tại.";
    }
}
