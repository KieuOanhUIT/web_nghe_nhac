<?php
session_start();
?>


<!--kết nối csdl-->
<?php
// Thông tin kết nối
$servername = "localhost";
$username = "root";
$password = ""; // Để trống nếu bạn đang dùng XAMPP và chưa đặt mật khẩu
$database = "letchill_data"; // Thay bằng tên cơ sở dữ liệu của bạn

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $database);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}
echo "Kết nối thành công";
?>


<!-- Lấy mã người dùng từ email và mật khẩu, tên đăng nhập -->
<?php
$email = 'minhanh.nguyen@gmail.com';
//$email = $_SESSION['email'];
//$password = $_SESSION['password'];

$sqlMaNguoiDung = "SELECT nguoidung.MaNguoiDung 
FROM taikhoan 
JOIN nguoidung ON taikhoan.MaNguoiDung = nguoidung.MaNguoiDung 
WHERE nguoidung.Email = '" . $email . "'";

$resultMaNguoiDung = mysqli_query($conn, $sqlMaNguoiDung);
$rowMaNguoiDung = mysqli_fetch_assoc($resultMaNguoiDung);

// Lấy thông tin người dùng từ mã người dùng
$MaNguoiDung = null;  // Khởi tạo biến trước khi sử dụng
if (isset($rowMaNguoiDung['MaNguoiDung'])) {
    $MaNguoiDung = $rowMaNguoiDung['MaNguoiDung'];
} else {
    echo "Không có mã người dùng trong kết quả.";
}
?>


<?php
// Lấy dữ liệu mã nghệ sỹ để hiện thị thông tin nghệ sỹ
$mans = '1';
//$mans = $_REQUEST["manghesy"];


//ham lay anh bai hat
function AddImageSong($name_image_Song)
{
    $base_url = "../img/data-songs-image/"; // Đường dẫn gốc đến thư mục chứa ảnh
    return $base_url . $name_image_Song; // Trả về đường dẫn đầy đủ
}
//Ham lay anh nghe si
function AddImageArtist($name_image_Artist)
{
    $base_url = "../img/data-artists-image/"; // ĐĐường dẫn gốc đến thư mục chứa ảnh
    return $base_url . $name_image_Artist; // Trả về Đường dẫn đầy đủ
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/artist-info.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.6.0/css/all.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
        rel="stylesheet">
    <title>Artist Info</title>
    <script src="https://code.iconify.design/2/2.0.3/iconify.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>
<?php
require $_SERVER['DOCUMENT_ROOT'] . "/web_nghe_nhac/app/pages/includes/header.php";
?>
    <div class="main">
        <!-- div phần thân -->
<?php
require $_SERVER['DOCUMENT_ROOT'] . "/web_nghe_nhac/app/pages/includes/left_side.php";
?>

        <div id="artist">
            <!--div nghệ sĩ-->
            <!--Lay thong tin nghe si -->
            <?php
            //Code lấy thông tin nghe si từ database và hiển thị ảnh, tên, số lượt theo dõi ở đây.
            $mans = isset($_GET['manghesy']) ? $_GET['manghesy'] : null;
            if ($mans) {
                $sql = "SELECT nghesy.MaNgheSy,nghesy.TenNgheSy, nghesy.SoNguoiTheoDoi, nghesy.AnhNgheSy, baihat.TenBaiHat, baihat.AnhBaiHat, baihat.NgayDang
                    FROM baihat join nghesy on baihat.MaNgheSy = nghesy.MaNgheSy
                    WHERE nghesy.MaNgheSy= '" . $mans . "' ";
            } else {
                echo "Không tìm thấy mã nghệ sĩ.";
            }
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);

            //Code lay số người theo dõi của nghệ sĩ này
            $sqlSoNguoiTheoDoi = " SELECT COUNT(DISTINCT theodoi.MaNguoiDung) as numberFollower
                                    FROM theodoi
                                    WHERE theodoi.MaNgheSy = '" . $mans . "' ";
            $resultSoNguoiTheoDoi = mysqli_query($conn, $sqlSoNguoiTheoDoi);
            $rowSoNguoiTheoDoi = mysqli_fetch_assoc($resultSoNguoiTheoDoi);
            ?>

            <div id="main-artist">
                <span id="avatar-artist"><img src="<?php echo AddImageArtist($row['AnhNgheSy']); ?>"></span>
                <div class="info-artist">
                    <div id="artist-text">Nghệ sĩ<br></div>
                    <div id="artist-name"><b> <?php echo $row["TenNgheSy"] ?> </b><br></div>
                    <div id="artist-follower"> <?php echo $rowSoNguoiTheoDoi['numberFollower']  ?> người theo dõi</div>
                </div>
            </div>


            <div id="play">
                <button id="circle"><i id="playbutton" class="fa-solid fa-play"></i></button>
                <button id="threedots"><i class="fa-solid fa-ellipsis"></i></button>


                <!-- kiem tra xem nguoi dùng này đã theo dõi nghệ sĩ này chưa -->
                <?php
                $sqlTest = "SELECT *
                    from theodoi
                    where theodoi.MaNguoiDung ='" . $MaNguoiDung . "' and theodoi.MaNgheSy ='" . $mans . "' ";
                $resultTest = mysqli_query($conn, $sqlTest);
                $FollowerTest = '';

                if ($rowTest = mysqli_fetch_array($resultTest)) {
                    $FollowerTest = 'Đã theo dõi';
                    //Nếu đã theo dõi thì thay đổi chiều dài của button submit cho dài thêm 
                    echo '<style> #follow-button { width: 200px; } </style>';
                } else {
                    $FollowerTest = 'Theo dõi';
                }
                ?>

                <!--Nhan nut the doi-->
                    <button name="follow" id="follow-button"><?php echo $FollowerTest ?></button>

                <button id="threebars"><i class="fa-solid fa-bars"></i></button>
            </div>
            <div id="listsong">
                <div id="listsong-title">
                    <span id="sharp-title">#</span>
                    <span id="tenbaihat-title">Tên bài hát</span>
                    <span id="ngaythem-title">Ngày thêm</span>
                </div>
                <div id="songs">

                    <?php
                    $i = 1;
                    if ($result->num_rows > 0) {
                        while ($row) {
                            echo '<div id="song1">';
                            echo '<span id="stt">' . $i . '</span>';
                            echo '<span><img src="' . AddImageSong($row["AnhBaiHat"]) . '" alt="Ảnh bài hát"></span>';
                            echo '<span id="namesong">' . $row["TenBaiHat"] . '<br>';
                            echo '<span id="author">' . $row["TenNgheSy"] . '</span>';
                            echo '</span>';
                            echo '<span id="date">' . $row["NgayDang"] . '</span>';
                            echo '</div>';
                            $i++;
                            $row = $result->fetch_assoc();
                        }
                    }
                    ?>

                </div>
            </div>
        </div>

        <?php
require $_SERVER['DOCUMENT_ROOT'] . "/web_nghe_nhac/app/pages/includes/right_side.php";
?>
    </div> <!-- kết thúc div phần thân -->
    
    <?php
require $_SERVER['DOCUMENT_ROOT'] . "/web_nghe_nhac/app/pages/includes/listeningSpace.php";
?>
</body>

</html>