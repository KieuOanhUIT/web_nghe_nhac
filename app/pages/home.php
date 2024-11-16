<?php
require $_SERVER['DOCUMENT_ROOT'] . "/web_nghe_nhac/app/pages/includes/header.php";
?>

    <!-- Popup thông báo -->
    <div id="notificationPopup" class="notification-popup" style="display: none;">
        <div class="popup-content">
            <h3>Thông báo</h3>
            <span id="closePopup" class="close-popup">&times;</span>
            <!-- Thông báo động sẽ được thêm vào đây bởi JavaScript -->
        </div>
    </div>

    <main>
        <!-- Main space -->
        <div class="mainSpace">
            <!-- leftBar -->
            <?php
            require $_SERVER['DOCUMENT_ROOT'] . "/web_nghe_nhac/app/pages/includes/left_side.php";
            ?>

            <!-- Create new list -->
            <div class="create-newlist">
                <div class="return">
                    <img src="/web_nghe_nhac/public/assets/icon/ic-return.svg" alt="">
                </div>


                <div class="lbl-create">
                    <p>Tạo danh sách mới</p>
                </div>

                <form name="create-newlist" action="">
                    <button class="choose-image">
                        <img src="/web_nghe_nhac/public/assets/img/insert-img.svg" alt="">
                    </button>
                    <input type="file" id="file-upload" style="display: none;">
                    <!-- <img id="image-preview" src="" alt="Preview"> -->

                    <div class="name-list">
                        <p>Tên danh sách</p>
                        <input type="text" name="name-list">
                    </div>

                    <div class="scription">
                        <p>Mô tả</p>
                        <input type="textarea" name="scription">
                    </div>

                    <input type="submit" value="Tạo">
                </form>
            </div>

            <div class="centerSpace scrollable">

                <div class="wrapperSlider">
                    <!-- Slider -->
                    <div class="sliderContainer">
                        <div class="trending">
                            <iconify-icon icon="solar:fire-bold"></iconify-icon>
                            <div class="trendingTopic">
                                <h3>Top bài hát&nbsp;</h3>
                                <h3 style="color: #296265;"> thịnh hành</h3>
                            </div>
                        </div>


                        <div id="slider">
                            <div class="info">
                                <h3 id="nameInfo" class="name">Ngáo ngơ</h3>
                                <p id="authodInfo" class="author p2">Erik, Jsol, Orange, HIEUTHUHAI, Anh Tú Atus</p>
                            </div>
                            <ul class="dots">
                                <li class="active"></li>
                                <li></li>
                                <li></li>
                                <li></li>
                                <li></li>
                            </ul>
                            <div class="shadow"></div>
                            <div class="imgList">
                                <div class="itemImg">
                                    <img id="imageSlider1" src="/web_nghe_nhac/public/assets/img/slider/ngao_ngo.jpg" alt="">
                                </div>
                                <div class="itemImg">
                                    <img id="imageSlider1" src="/web_nghe_nhac/public/assets/img/slider/dlttad.jpg" alt="">
                                </div>
                                <div class="itemImg">
                                    <img id="imageSlider1" src="/web_nghe_nhac/public/assets/img/slider/mong_yu.jpg" alt="">
                                </div>
                                <div class="itemImg">
                                    <img id="imageSlider1" src="/web_nghe_nhac/public/assets/img/slider/seenderella.jpg" alt="">
                                </div>
                                <div class="itemImg">
                                    <img id="imageSlider1" src="/web_nghe_nhac/public/assets/img/slider/mong_yu.jpg" alt="">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Popular Artist -->
                    <div class="popularArtistContainer">
                        <div class="popularArtistTopic">
                            <h4>Nghệ sĩ phổ biến</h4>
                        </div>

                        <div id="artistScroll" class="scrollable">
                            <div class="artistItem">
                                <img src="/web_nghe_nhac/public/assets/img/artists/hieuthuhai.jpg" alt="" class="avatarArtist">
                                <div class="info">
                                    <p class="ui_semibold">HIEUTHUHAI</p>
                                    <p class="ui_regular op_75">Nghệ sĩ</p>
                                </div>
                            </div>

                            <div class="artistItem">
                                <img src="/web_nghe_nhac/public/assets/img/artists/amee.webp" alt="" class="avatarArtist">
                                <div class="info">
                                    <p class="ui_semibold">AMEE</p>
                                    <p class="ui_regular op_75">Nghệ sĩ</p>
                                </div>
                            </div>

                            <div class="artistItem">
                                <img src="/web_nghe_nhac/public/assets/img/artists/son_tung_mtp.jpg" alt="" class="avatarArtist">
                                <div class="info">
                                    <p class="ui_semibold">Sơn Tùng MTP</p>
                                    <p class="ui_regular op_75">Nghệ sĩ</p>
                                </div>
                            </div>

                            <div class="artistItem">
                                <img src="/web_nghe_nhac/public/assets/img/artists/soobin.jpg" alt="" class="avatarArtist">
                                <div class="info">
                                    <p class="ui_semibold">Soobin</p>
                                    <p class="ui_regular op_75">Nghệ sĩ</p>
                                </div>
                            </div>

                            <div class="artistItem">
                                <img src="/web_nghe_nhac/public/assets/img/artists/vu.jpg" alt="" class="avatarArtist">
                                <div class="info">
                                    <p class="ui_semibold">Vũ</p>
                                    <p class="ui_regular op_75">Nghệ sĩ</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- search -->
                <div class="searches-container" id="search-container" style="display: none;">
                    <div class="header">
                        <h2>Tìm kiếm gần đây</h2>
                        <span class="clear-history" onclick="clearSearchHistory()">Xóa lịch sử tìm kiếm</span>
                    </div>
                    <div class="search-items" id="search-items">
                        <div class="search-item">
                            <a href="/web_nghe_nhac/song.php"> <!-- Đường dẫn đến trang chi tiết bài hát -->
                                <img src="/web_nghe_nhac/public/assets/img/MY.png" alt="Seenderella">
                                <h3>Mộng Yu</h3>
                            </a>
                            <a href="/web_nghe_nhac/artist_details.php?id=1"> <!-- Đường dẫn đến trang chi tiết nghệ sĩ -->
                                <p>AMEE</p>
                            </a>
                        </div>
                        <div class="search-item">
                            <a href="/web_nghe_nhac/song.php"> <!-- Đường dẫn đến trang chi tiết bài hát -->
                                <img src="/web_nghe_nhac/public/assets/img/MY.png" alt="Seenderella">
                                <h3>Mộng Yu</h3>
                            </a>
                            <a href="/web_nghe_nhac/artist_details.php?id=1"> <!-- Đường dẫn đến trang chi tiết nghệ sĩ -->
                                <p>AMEE</p>
                            </a>
                        </div>
                        <!-- Thêm các phần tử tìm kiếm gần đây khác tương tự -->
                </div>

                <!-- lyric -->
                <div class="wrapper-lyric" style="display: none;">
                    <p>I can read your mind</br>"She's having the time of her life"</br>There in her glittering prime</br>The lights
                        refract
                        sequined stars off her silhouette every night</br>I can show you lies (one, two, three, four)
                        'Cause I'm a real tough kid, I can handle my shit</br>They said, "Babe, you gotta fake it 'til you
                        make it" and I
                        did</br>Lights, camera, bitch smile, even when you wanna die</br>He said he'd love me all his life</br>But
                        that life was too
                        short</br>/breaking down, I hit the floor</br>All the pieces of me shattered as the crowd was chanting,
                        "More"</br>I was
                        grinning like I'm winning, I was hitting my marks</br>'Cause I can do it with a /broken heart (one,
                        two, three, four)
                        I'm so depressed, I act like it's my birthday every day</br>I'm so obsessed with him but he avoids
                        me like the
                        plague</br>I cry a lot but I am so productive, it's an art</br>You know you're good when you can even do
                        it</br>With a
                        /broken heart
                        I can hold my /breath</br>I've been doing it since he left</br>I keep finding his things in
                        drawers</br>Crucial evidence, I
                        didn't imagine the whole thing</br>I'm sure I can pass this test (one, two, three, four)
                        'Cause I'm a real tough kid, I can handle my shit</br>They said, "Babe, you gotta fake it 'til you
                        make it" and I
                        did</br>Lights, camera, bitch smile, in stilettos for miles</br>He said he'd love me for all time</br>But
                        that time was
                        quite short</br>/breaking down, I hit the floor</br>All the pieces of me shattered as the crowd was
                        chanting, "More"</br>I
                        was grinning like I'm winning, I was hitting my marks</br>'Cause I can do it with a /broken heart
                        (one, two, three)
                        I'm so depressed, I act like it's my birthday every day</br>I'm so obsessed with him but he avoids
                        me like the
                        plague (he avoids me)</br>I cry a lot but I am so productive, it's an art</br>You know you're good when
                        you can even do
                        it</br>With a /broken heart
                        You know you're good when you can even do it</br>With a /broken heart</br>You know you're good, I'm
                        good</br>'Cause I'm
                        miserable</br>And nobody even knows</br>Try and come for my job</p>
                </div>
            </div>

            
        </div>
<!-- rightBar -->
<div class="rightBar">
            <?php
            require $_SERVER['DOCUMENT_ROOT'] . "/web_nghe_nhac/app/pages/includes/right_side.php";
            ?>
            </div>

            <!--See review-->
            <div class="seeReview">
                <div class="seeReview-exit">
                    <div class="letter">
                        <p id="Review">Đánh giá</p>
                    </div>

                    <iconify-icon icon="hugeicons:multiplication-sign" id="exit-ic"></iconify-icon>
                </div>

                <div class="seeReview-content">
                    <div class="box-E1">
                        <div class="Name">
                            <p>Nguyen Khoa Quan</p>
                        </div>
                        <div class="Eva">
                            <div class="Eva-Oval">
                                <span class="dot"></span>
                                <span class="dot"></span>
                                <span class="dot"></span>
                                <span class="dot"></span>
                                <span class="dot-empty"></span>
                            </div>
                            <div class="Eva-status">

                                <p>good</p>
                            </div>
                        </div>
                    </div>
                    <div class="box-E1">
                        <div class="Name">
                            <p>Nguyen Khoa Quan</p>
                        </div>
                        <div class="Eva">
                            <div class="Eva-Oval">
                                <span class="dot"></span>
                                <span class="dot"></span>
                                <span class="dot"></span>
                                <span class="dot"></span>
                                <span class="dot-empty"></span>
                            </div>
                            <div class="Eva-status">

                                <p>good</p>
                            </div>
                        </div>
                    </div>
                    <div class="box-E1">
                        <div class="Name">
                            <p>Nguyen Khoa Quan</p>
                        </div>
                        <div class="Eva">
                            <div class="Eva-Oval">
                                <span class="dot"></span>
                                <span class="dot"></span>
                                <span class="dot"></span>
                                <span class="dot"></span>
                                <span class="dot-empty"></span>
                            </div>
                            <div class="Eva-status">

                                <p>good</p>
                            </div>
                        </div>
                    </div>
                    <div class="box-E1">
                        <div class="Name">
                            <p>Nguyen Khoa Quan</p>
                        </div>
                        <div class="Eva">
                            <div class="Eva-Oval">
                                <span class="dot"></span>
                                <span class="dot"></span>
                                <span class="dot"></span>
                                <span class="dot"></span>
                                <span class="dot-empty"></span>
                            </div>
                            <div class="Eva-status">

                                <p>good</p>
                            </div>
                        </div>
                    </div>
                    <div class="box-E1">
                        <div class="Name">
                            <p>Nguyen Khoa Quan</p>
                        </div>
                        <div class="Eva">
                            <div class="Eva-Oval">
                                <span class="dot"></span>
                                <span class="dot"></span>
                                <span class="dot"></span>
                                <span class="dot"></span>
                                <span class="dot-empty"></span>
                            </div>
                            <div class="Eva-status">

                                <p>good</p>
                            </div>
                        </div>
                    </div>
                    <div class="box-E1">
                        <div class="Name">
                            <p>Nguyen Khoa Quan</p>
                        </div>
                        <div class="Eva">
                            <div class="Eva-Oval">
                                <span class="dot"></span>
                                <span class="dot"></span>
                                <span class="dot"></span>
                                <span class="dot"></span>
                                <span class="dot-empty"></span>
                            </div>
                            <div class="Eva-status">

                                <p>good</p>
                            </div>
                        </div>
                    </div>
                    <div class="box-E1">
                        <div class="Name">
                            <p>Nguyen Khoa Quan</p>
                        </div>
                        <div class="Eva">
                            <div class="Eva-Oval">
                                <span class="dot"></span>
                                <span class="dot"></span>
                                <span class="dot"></span>
                                <span class="dot"></span>
                                <span class="dot-empty"></span>
                            </div>
                            <div class="Eva-status">

                                <p>good</p>
                            </div>
                        </div>
                    </div>
                    <div class="box-E1">
                        <div class="Name">
                            <p>Nguyen Khoa Quan</p>
                        </div>
                        <div class="Eva">
                            <div class="Eva-Oval">
                                <span class="dot"></span>
                                <span class="dot"></span>
                                <span class="dot"></span>
                                <span class="dot"></span>
                                <span class="dot-empty"></span>
                            </div>
                            <div class="Eva-status">

                                <p>good</p>
                            </div>
                        </div>
                    </div>
                    <div class="box-E1">
                        <div class="Name">
                            <p>Nguyen Khoa Quan</p>
                        </div>
                        <div class="Eva">
                            <div class="Eva-Oval">
                                <span class="dot"></span>
                                <span class="dot"></span>
                                <span class="dot"></span>
                                <span class="dot"></span>
                                <span class="dot-empty"></span>
                            </div>
                            <div class="Eva-status">

                                <p>good</p>
                            </div>
                        </div>
                    </div>
                </div>




                <form name="myform" action="">
                    <div class="seeReview-nDot">
                        <span class="dot-oval"></span>
                        <span class="dot-oval"></span>
                        <span class="dot-oval"></span>
                        <span class="dot-oval"></span>
                        <span class="dot-oval"></span>
                    </div>


                    <div class="seeReview-comment">
                        <input class="writeComment" type="text" placeholder="Thêm bình luận của bạn">



                        <div class="sendComment">
                            <input type="image" value="" src="/web_nghe_nhac/public/assets/icon/ic-send.svg">
                        </div>
                    </div>
                </form>

            </div>
        <!-- Listening Space -->
        <div class="listeningSpace">
            <div class="info">
                <img src="/web_nghe_nhac/public/song/Taylor_Swift_-_I_Can_Do_It_With_a_broken_Heart.png" alt="" class="picOfSong">

                <div class="infoText">
                    <p class="name ui_semibold">I can do this with the /broken heart</p>
                    <p class="author ui_regular op_75">Taylor Switf</p>
                </div>

                <div class="addToPlaylist">
                    <iconify-icon icon="ic:round-plus"></iconify-icon>
                </div>
            </div>

            <!-- Music player -->
            <div class="musicPlayer">
                <audio id="audioPlayer" src="/web_nghe_nhac/public/song/Bầu Trời Mới - Da LAB ft. Minh Tốc & Lam (Official MV).mp3"></audio>
                <div class="controlbar">
                    <button id="lyricsBtn">
                        <iconify-icon id="lyricsIcon" class="" icon="maki:karaoke"></iconify-icon>
                    </button>

                    <button id="backBtn">
                        <iconify-icon id="backIcon" class="" icon="solar:skip-previous-bold"></iconify-icon>
                    </button>

                    <button id="mainControlBtn">
                        <iconify-icon id="mainControlIcon" class="" icon="solar:play-bold"></iconify-icon>
                    </button>

                    <button id="nextBtn">
                        <iconify-icon id="nextIcon" class="" icon="solar:skip-next-bold"></iconify-icon>
                    </button>

                    <button id="returnBtn">
                        <iconify-icon id="returnIcon" class="" icon="icon-park-outline:return"></iconify-icon>
                    </button>
                </div>

                <div class="timeDisplay">
                    <span id="currentTime" class="progressTime current">0:00</span>
                    <div class="progressContainer" id="progressContainer">
                        <div class="progress" id="progress"></div>
                    </div>
                    <span id="duration" class="progressTime remaining">0:00</span>
                </div>
            </div>

            <!-- General space -->
            <div class="general">
                <button id="info">
                    <iconify-icon id="infoIcon" icon="ic:round-info"></iconify-icon>
                </button>

                <div class="volumnSpace">
                    <button id="output">
                        <iconify-icon id="outputIcon" class="icon-active" icon="solar:volume-loud-bold"></iconify-icon>
                    </button>
                    <input type="range" id="volumnContainer" class="volumnContainer" min="0" max="100" value="100">
                </div>
            </div>
        </div>
    </main>

    <!-- File javaScript -->
    <script src="/web_nghe_nhac/public/assets/script/listeningSpace.js"></script>
    <script src="/web_nghe_nhac/public/assets/script/main_cpn.js"></script>
    <script src="/web_nghe_nhac/public/assets/script/leftBar.js"></script>
    <script src="/web_nghe_nhac/public/assets/script/rightBar.js"></script>
    <script src="/web_nghe_nhac/public/assets/script/header.js"></script>

</body>

</html>