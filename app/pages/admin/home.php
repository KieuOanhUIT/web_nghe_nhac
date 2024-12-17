<?php
require $_SERVER['DOCUMENT_ROOT'] . "/web_nghe_nhac/app/pages/admin/header.php";
?>
<style>
    .main-content{
    flex: 6;
    gap: 18px;
    box-sizing: border-box;
    display: flex;
    justify-content: center;
    position: absolute;
    left: 310px;
    right: 10px;
    top: 118px;
    height:456px;
    color: #fff;
    background: rgba(255, 255, 255, 0.1);
    border: 1px solid rgba(255, 255, 255, 0.15);
    border-radius: 20px 10px 10px 20px;
    }
</style>
<body>
    <img src="../../../public/assets/img/admin-bg.png" class="bgimage">
    <div class="admin-main">
        <div class="admin-left">
            <?php
                require $_SERVER['DOCUMENT_ROOT'] . "/web_nghe_nhac/app/pages/admin/left_side.php";
            ?>        
        </div>
        <div class="main-content">
            <h1>Xin chào admin!</h1>
        </div>
    </div>
</body>
<!-- <script src="/web_nghe_nhac/public/assets/script/admin.js"></script> -->
<!-- <script src="/web_nghe_nhac/public/assets/script/report.js"></script> -->

</html>