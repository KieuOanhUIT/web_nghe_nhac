<?php

include './../core/functions.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $sql = "SELECT taikhoan.MaTaiKhoan, nguoidung.TenNguoiDung, goidichvu.TenGoi, 
                   lichsumua.NgayBatDau, lichsumua.NgayKetThuc, lichsumua.PhuongThuc
            FROM taikhoan
            JOIN nguoidung ON taikhoan.MaNguoiDung = nguoidung.MaNguoiDung
            LEFT JOIN lichsumua ON lichsumua.MaTaiKhoan = taikhoan.MaTaiKhoan
            LEFT JOIN goidichvu ON goidichvu.MaGoi = lichsumua.MaGoi
            WHERE taikhoan.MaTaiKhoan IS NOT NULL
            ORDER BY taikhoan.MaTaiKhoan";

    $data = db_query($sql);
    echo json_encode($data);
}
