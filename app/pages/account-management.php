<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/assets/css/account-management.css">
    <script src="https://code.iconify.design/iconify-icon/2.1.0/iconify-icon.min.js"></script>

    <title>Document</title>
</head>

<body>
    <!-- header -->
    <?php
    include './includes/header.php';
    ?>

    <main>
        <!-- Định dạng mcolumn;nền của trang -->
        <div class="mainLight"></div>
        </div>

        <!-- màn hình chính -->
        <div class="main-Space">
            <!--Chèn controlbar vào -->
            <?php
            // Hiển thị menu chức năng
            include_once '../pages/includes/admin_left.php';
            ?>




        </div>

        <div class="accountSpace">
            <div class="findSong">

                <div class="boxInput">
                    <input id="boxFind" type="text">
                    <iconify-icon class="search-ic" icon="material-symbols:search" width="1.2em" height="1.2em"
                        style="color: white"></iconify-icon>
                </div>


                <button id="find" type="submit">
                    Tìm Kiếm
                </button>

            </div>


            <!-- Tạo bảng -->
            <div class="tableAccount">
                <table>
                    <colgroup>
                        <col style="width: 34px;">
                        <col style="width: 50px;">
                        <col style="width: 240px;">
                        <col style="width: 240px;">
                        <col style="width: 240px;">
                        <col style="width: 240px;">

                    </colgroup>
                    <thead>

                        <tr>
                            <th><input type="checkbox" id="selectAll"></th>
                            <th>#</th>
                            <th>Tên tài khoản</th>
                            <th>Gói đang dùng</th>
                            <th>Ngày bắt đầu gói</th>
                            <th>Ngày kết thúc gói</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td><input type="checkbox" id="checkbox"></td>
                            <td>1</td>
                            <td>Nguyen Van An</td>
                            <td>Premium</td>
                            <td>11/11/2024</td>
                            <td>10/12/2024</td>
                        </tr>

                        <tr>
                            <td><input type="checkbox" id="checkbox"></td>
                            <td>1</td>
                            <td>Nguyen Van An</td>
                            <td>Premium</td>
                            <td>11/11/2024</td>
                            <td>10/12/2024</td>
                        </tr>

                        <tr>
                            <td><input type="checkbox" id="checkbox"></td>
                            <td>1</td>
                            <td>Nguyen Van An</td>
                            <td>Premium</td>
                            <td>11/11/2024</td>
                            <td>10/12/2024</td>
                        </tr>

                        <tr>
                            <td><input type="checkbox" id="checkbox"></td>
                            <td>1</td>
                            <td>Nguyen Van An</td>
                            <td>Premium</td>
                            <td>11/11/2024</td>
                            <td>10/12/2024</td>
                        </tr>

                        <tr>
                            <td><input type="checkbox" id="checkbox"></td>
                            <td>1</td>
                            <td>Nguyen Van An</td>
                            <td>Premium</td>
                            <td>11/11/2024</td>
                            <td>10/12/2024</td>
                        </tr>

                        <tr>
                            <td><input type="checkbox" id="checkbox"></td>
                            <td>1</td>
                            <td>Nguyen Van An</td>
                            <td>Premium</td>
                            <td>11/11/2024</td>
                            <td>10/12/2024</td>
                        </tr>

                    </tbody>
                </table>


            </div>

        </div>

        </div>





    </main>


</body>

</html>