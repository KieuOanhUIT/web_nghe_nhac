<head>
    <link rel="stylesheet" href="../../../public/assets/css/admin_left.css">
    <script src="https://code.iconify.design/iconify-icon/2.1.0/iconify-icon.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>


<div class="adminleft">
    <div class="controlBar">
        <div class="manageSong"> Quản lý bài hát

        </div>

        <div class="manageAccount">
            <div class="content">
                <span id="account">Quản lý tài khoản</span>

                <div class="figure">
                    <p id="figure-addAccount">
                        <iconify-icon icon="line-md:plus-circle-filled" width="1.2em"
                            height="1.2em"></iconify-icon>
                        Thêm tài khoản
                    </p>
                    <p id="figure-updateAccount">
                        <iconify-icon icon="mdi:pencil-circle" width="1.2em" height="1.2em"></iconify-icon>
                        Cập nhật tài khoản
                    </p>
                    <p id="figure-deleteAccount">
                        <iconify-icon icon="streamline:recycle-bin-2-solid" width="1.2em"
                            height="1.2em"></iconify-icon>
                        Xóa tài khoản
                    </p>
                </div>
            </div>
        </div>

        <div class="Report">
            <span id="account">
                <iconify-icon icon="carbon:report" width="1.2em" height="1.2em"
                    style="color: white"></iconify-icon>
                Báo cáo
            </span>


        </div>

    </div>




    <!-- Thêm tài khoản -->
    <div class="addAccount" id="addaccount" style="display: none;">
        <form id="formaddAccount" action="" method="post">
            <table>
                <tr>
                    <!-- Icon quay lai -->
                    <span class="return-add" id="return"><iconify-icon icon="ic:round-arrow-back-ios-new" width="1.2em" height="1.2em" style="color: white"></iconify-icon></span>
                </tr>

                <tr>
                    <h1>Thêm tài khoản</h1>

                </tr>
                <tr>
                    <td><span style="width: 325px;">Tên tài khoản</span></td>
                    <td><input type="text" name="username" required></td>
                </tr>
                <tr>
                    <td>Gói sử dụng</td>
                    <td>
                        <select id="pakage" name="pakage">
                            <option value="Mini">Mini</option>
                            <option value="Individual">Individual</option>
                            <option value="Student">Student</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Ngày Bắt đầu gói</td>
                    <td><input type="date" name="datestart" required></td>
                </tr>
                <tr>
                    <td>Ngày kết thúc gói</td>
                    <td><input type="date" name="datefinish" required></td>
                </tr>
                <tr>
                    <td><button id="add" type="submit">Tạo</button></td>
                </tr>
            </table>
        </form>



    </div>

    <div class="addAccount" id="updateaccount" style="display: none;">
        <form id="formaddAccount" action="" method="post">
            <table>
                <tr>
                    <!-- Icon quay lai -->
                    <span class="return-update" id="return"><iconify-icon icon="ic:round-arrow-back-ios-new" width="1.2em" height="1.2em" style="color: white"></iconify-icon></span>
                </tr>

                <tr>
                    <h1>Cập nhật tài khoản</h1>

                </tr>
                <tr>
                    <td><span style="width: 325px;">Tên tài khoản</span></td>
                    <td><input type="text" name="username" required></td>
                </tr>
                <tr>
                    <td>Gói sử dụng</td>
                    <td>
                        <select id="pakage" name="pakage">
                            <option value="Mini">Mini</option>
                            <option value="Individual">Individual</option>
                            <option value="Student">Student</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Ngày Bắt đầu gói</td>
                    <td><input type="date" name="datestart" required></td>
                </tr>
                <tr>
                    <td>Ngày kết thúc gói</td>
                    <td><input type="date" name="datefinish" required></td>
                </tr>
                <tr>
                    <td><button id="add" type="submit">Cập nhật</button></td>
                </tr>
            </table>
        </form>



    </div>
</div>

<script>
    // Hiển thị thêm tài khoản
    $(document).ready(function() {
        $('#figure-addAccount').click(function() {
            $('#addaccount').show();
        });

        $('.return-add').click(function() {
            $('#addaccount').hide();
        });
    });

    //Hiển thị cập nhật tài khoản
    $(document).ready(function() {
        $('#figure-updateAccount').click(function() {
            $('#updateaccount').show();

        })
        $('.return-update').click(function() {
            $('#updateaccount').hide();
        });
    })
</script>