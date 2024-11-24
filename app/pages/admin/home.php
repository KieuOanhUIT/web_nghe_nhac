<?php
require $_SERVER['DOCUMENT_ROOT'] . "/web_nghe_nhac/app/pages/includes/header.php";
?>
<style>
    .main{
    font-family: Arial, sans-serif;
    box-sizing: border-box;
    display: flex;
    justify-content: center;
    position: absolute;
    width: 68%;
    right: 26px;
    top: 118px;
    height:265px;
    color: #fff;
    background: rgba(255, 255, 255, 0.1);
    border: 1px solid rgba(255, 255, 255, 0.15);
    border-radius: 20px 10px 10px 20px;
    }
</style>
<body>
    <img src="../img/admin-bg.png" class="bgimage">
    <li class="left-li">
        <?php
            require $_SERVER['DOCUMENT_ROOT'] . "/web_nghe_nhac/app/pages/admin/left_side.php";
            ?>
    </li>
    <div class="main">
        <h1>Xin chào admin!</h1>
    </div>
    
    <div class="report" style="display:none">
        <div class="searchBar">
            <label class="label" for="date">Từ móc</label>
            <input type="month" id="start-month" name="month-year" value="Từ móc">

            <label class="label" for="date">Đến móc</label>
            <input type="month" id="end-month" name="month-year">

            <label class="label" for="package">Gói:</label>
            <select id="package" class="package">
                <option value="mini">Mini</option>
                <option value="individual">Individual</option>
                <option value="student">Student</option>
            </select>

            <button id="search-btn" class="search-btn">Tra cứu</button>
        </div>
        <button id="export-btn" class="export-btn">Xuất</button>

        <div class="result-table">
            <table id="result">
                <thead>
                    <tr>
                        <th><input type="checkbox" name="all" value=""></th>
                        <th>Tên gói</th>
                        <th>Mốc thời gian</th>
                        <th>Số người đăng ký</th>
                        <th>Doanh thu</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input type="checkbox" name="row" value=""></td>
                        <td>Mini</td>
                        <td>Từ 01/01/2020 đến 31/12/2020</td>
                        <td>100</td>
                        <td>5000</td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" name="row" value=""></td>
                        <td>Individual</td>
                        <td>Từ 01/01/2020 đến 31/12/2020</td>
                        <td>200</td>
                        <td>10000</td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" name="row" value=""></td>
                        <td>Mini</td>
                        <td>Từ 01/01/2020 đến 31/12/2020</td>
                        <td>100</td>
                        <td>5000</td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" name="row" value=""></td>
                        <td>Student</td>
                        <td>Từ 01/01/2020 đến 31/12/2020</td>
                        <td>200</td>
                        <td>10000</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="total">
            <h3>Tổng doanh thu:</h3>
            <h3>256.234.231 VND</h3>
        </div>

    </div>
</body>
<script src="/web_nghe_nhac/public/assets/script/admin.js"></script>

</html>