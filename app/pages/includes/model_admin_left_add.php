<?php
include '../../core/functions.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Kiểm tra và chuyển đổi định dạng ngày
    $datestart = isset($_POST['datestart']) ? date('Y-m-d', strtotime($_POST['datestart'])) : null;
    $datefinish = isset($_POST['datefinish']) ? date('Y-m-d', strtotime($_POST['datefinish'])) : null;

    if (!$datestart || !$datefinish) {
        echo "Ngày không hợp lệ!";
        exit;
    }

    // Kiểm tra phương thức thanh toán hợp lệ
    $validMethods = ['Momo', 'VNPay'];
    $phuongthuc = $_POST['phuongthuc'];
    if (!in_array($phuongthuc, $validMethods)) {
        echo "Phương thức thanh toán không hợp lệ!";
        exit;
    }

    // Lấy thông tin người dùng
    $sql1 = "SELECT * FROM nguoidung WHERE TenNguoiDung = :username";
    $params1 = [':username' => $_POST['username']];
    $result1 = db_query($sql1, $params1);

    if (!$result1 || count($result1) == 0) {
        echo "Không tìm thấy người dùng!";
        exit;
    }

    $MaNguoiDung = $result1[0]['MaNguoiDung'];
    $email = $result1[0]['Email'];
    $matkhau = $result1[0]['MatKhau'];

    // Lấy mã gói
    $sql2 = "SELECT MaGoi FROM goidichvu WHERE TenGoi = :pakage";
    $params2 = [':pakage' => $_POST['pakage']];
    $result2 = db_query($sql2, $params2);

    if (!$result2 || count($result2) == 0) {
        echo "Không tìm thấy gói dịch vụ!";
        exit;
    }

    $MaGoi = $result2[0]['MaGoi'];

    // Thêm tài khoản nếu chưa tồn tại
    $sql5 = "INSERT INTO taikhoan (Email, MatKhau, MaNguoiDung, Quyen) 
             VALUES (:email, :matkhau, :manguoidung, 'User')";
    $params5 = [
        ':email' => $email,
        ':matkhau' => $matkhau,
        ':manguoidung' => $MaNguoiDung
    ];

    if (!db_query($sql5, $params5)) {
        echo "Lỗi khi thêm tài khoản!";
        exit;
    }

    // Lấy mã tài khoản vừa thêm
    $sqlGetAccount = "SELECT MaTaiKhoan FROM taikhoan WHERE MaNguoiDung = :manguoidung";
    $resultAccount = db_query($sqlGetAccount, [':manguoidung' => $MaNguoiDung]);
    if (!$resultAccount || count($resultAccount) == 0) {
        echo "Không thể lấy mã tài khoản!";
        exit;
    }
    $MaTaiKhoan = $resultAccount[0]['MaTaiKhoan'];

    // Thêm lịch sử mua
    $sql3 = "INSERT INTO lichsumua (MaGoi, MaTaiKhoan, NgayBatDau, NgayKetThuc, PhuongThuc)
             VALUES (:magoi, :mataikhoan, :ngaybatdau, :ngayketthuc, :phuongthuc)";
    $params3 = [
        ':magoi' => $MaGoi,
        ':mataikhoan' => $MaTaiKhoan,
        ':ngaybatdau' => $datestart,
        ':ngayketthuc' => $datefinish,
        ':phuongthuc' => $phuongthuc
    ];

    if (!db_query($sql3, $params3)) {
        echo "Lỗi khi thêm lịch sử mua!";
        exit;
    }

    // Thêm thông báo
    $sql4 = "INSERT INTO thongbao (TieuDe, NoiDung, ThoiGian, TrangThai, MaNguoiDung)
             VALUES ('Thông tin thanh toán', 'Bạn đã đăng ký thành công gói dịch vụ!', :thoigiandangky, 0, :manguoidung)";
    $params4 = [
        ':thoigiandangky' => date('Y-m-d H:i:s'),
        ':manguoidung' => $MaNguoiDung
    ];

    if (db_query($sql4, $params4)) {
        echo "success";
    } else {
        echo "Lỗi khi thêm thông báo!";
    }
}
