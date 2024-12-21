<?php
include '../../core/functions.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Lấy dữ liệu từ AJAX
    $MaTaiKhoan = $_POST['mataikhoan'];
    $TenNguoiDung = $_POST['username'];
    $TenGoi = $_POST['pakage'];
    $NgayBatDau = $_POST['datestart'];
    $NgayKetThuc = $_POST['datefinish'];
    $PhuongThuc = $_POST['phuongthuc'];

    // Kiểm tra dữ liệu
    if (empty($MaTaiKhoan) || empty($TenNguoiDung) || empty($TenGoi) || empty($NgayBatDau) || empty($NgayKetThuc) || empty($PhuongThuc)) {
        echo "Dữ liệu không hợp lệ!";
        exit;
    }

    // Lấy mã gói
    $sql2 = "SELECT MaGoi FROM goidichvu WHERE TenGoi = :pakage";
    $params2 = [':pakage' => $_POST['pakage']];
    $result2 = db_query($sql2, $params2);

    if (!$result2 || count($result2) == 0) {
        echo "Không tìm thấy gói dịch vụ!";
        exit;
    }

    $MaGoi = $result2[0]['MaGoi'];    

    // Lấy mã người dùng từ tài khoản
    $sqlGetUser = "SELECT MaNguoiDung FROM taikhoan WHERE MaTaiKhoan = :mataikhoan";
    $resultUser = db_query($sqlGetUser, [':mataikhoan' => $MaTaiKhoan]);

    if (!$resultUser || count($resultUser) == 0) {
        echo "Không tìm thấy tài khoản!";
        exit;
    }

    $MaNguoiDung = $resultUser[0]['MaNguoiDung'];

    // Cập nhật tên người dùng trong bảng nguoidung
    $sqlUpdateUser = "UPDATE nguoidung SET TenNguoiDung = :tennguoidung WHERE MaNguoiDung = :manguoidung";
    $paramsUpdateUser = [
        ':tennguoidung' => $TenNguoiDung,
        ':manguoidung' => $MaNguoiDung
    ];
    if (!db_query($sqlUpdateUser, $paramsUpdateUser)) {
        echo "Lỗi khi cập nhật tên người dùng!";
        exit;
    }

    // Kiểm tra sự tồn tại của dữ liệu trong lichsumua
    $sqlCheckPurchase = "SELECT COUNT(*) AS count FROM lichsumua WHERE MaTaiKhoan = :mataikhoan";
    $resultCheckPurchase = db_query($sqlCheckPurchase, [':mataikhoan' => $MaTaiKhoan]);

    if ($resultCheckPurchase[0]['count'] > 0) {
        // Nếu đã tồn tại, thực hiện cập nhật
        $sqlUpdatePurchase = "UPDATE lichsumua 
                              SET MaGoi = :magoi, NgayBatDau = :ngaybatdau, NgayKetThuc = :ngayketthuc, PhuongThuc = :phuongthuc 
                              WHERE MaTaiKhoan = :mataikhoan";
        $paramsUpdatePurchase = [
            ':magoi' => $MaGoi,
            ':ngaybatdau' => $NgayBatDau,
            ':ngayketthuc' => $NgayKetThuc,
            ':phuongthuc' => $PhuongThuc,
            ':mataikhoan' => $MaTaiKhoan
        ];
        if (!db_query($sqlUpdatePurchase, $paramsUpdatePurchase)) {
            echo "Lỗi khi cập nhật lịch sử mua!";
            exit;
        }
    } else {
        // Nếu chưa tồn tại, thực hiện thêm mới
        $sqlInsertPurchase = "INSERT INTO lichsumua (MaTaiKhoan, MaGoi, NgayBatDau, NgayKetThuc, PhuongThuc) 
                              VALUES (:mataikhoan, :magoi, :ngaybatdau, :ngayketthuc, :phuongthuc)";
        $paramsInsertPurchase = [
            ':mataikhoan' => $MaTaiKhoan,
            ':magoi' => $MaGoi,
            ':ngaybatdau' => $NgayBatDau,
            ':ngayketthuc' => $NgayKetThuc,
            ':phuongthuc' => $PhuongThuc
        ];
        if (!db_query($sqlInsertPurchase, $paramsInsertPurchase)) {
            echo "Lỗi khi thêm mới lịch sử mua!";
            exit;
        }
    }

    // Thêm thông báo
    $sqlAddNotification = "INSERT INTO thongbao (TieuDe, NoiDung, ThoiGian, TrangThai, MaNguoiDung) 
                           VALUES ('Cập nhật tài khoản', 'Tài khoản của bạn đã được cập nhật.', :thoigian, 0, :manguoidung)";
    $paramsAddNotification = [
        ':thoigian' => date('Y-m-d H:i:s'),
        ':manguoidung' => $MaNguoiDung
    ];
    if (!db_query($sqlAddNotification, $paramsAddNotification)) {
        echo "Lỗi khi thêm thông báo!";
        exit;
    }

    echo "Cập nhật tài khoản thành công!";
}
?>
