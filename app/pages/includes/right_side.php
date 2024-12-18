<!-- rightBar -->
<div class="rightBar">
                <div class="boxWrapper">
                    <div class="exit">
                        <iconify-icon icon="ic:outline-plus" id="plus-lbl"></iconify-icon>
                        <iconify-icon icon="hugeicons:multiplication-sign" id="exit-lbl"></iconify-icon>
                    </div>

                    <div class="boxSongEvalute">
                        <div class="boxSong">
                            <div class="imageSong">
                                <!--chèn hình ảnh-->
                                <img src="/web_nghe_nhac/public/assets/img/data-songs-image/dgtrr.jpg" alt="" class="hinhanh songImage">

                            </div>

                            <div class="nameSong">
                                <div class="nameSong-Song songName">
                                    Đi giữa trời rực rỡ
                                </div>

                                <div class="nameSong-Artist songAuthor">
                                    Ngô Lan Hương
                                </div>
                            </div>
                        </div>

                        <div class="box-Evaluate">
                            <div class="box-head">
                                <div class="Evaluate-Lable">
                                    Đánh giá
                                </div>
                                <div class="All" id="show-all-review">
                                    Tất cả
                                </div>
                            </div>

                            <div id="user-rate">
                            <span id="custom-name">Trống<br></span>
                            <div id="rating-container" style="margin-top: 5px; margin-bottom: 4px;">
                                <span id="rate1"><i class="fa-solid fa-circle"></i></span>
                                <span id="rate2"><i class="fa-solid fa-circle"></i></span>
                                <span id="rate3"><i class="fa-solid fa-circle"></i></span>
                                <span id="rate4"><i class="fa-solid fa-circle"></i></span>
                                <span id="rate5"><i class="fa-solid fa-circle"></i></span>
                            </div>
                            <span id="rate-comment">Trống</span>
                        </div>
                        </div>

                        <div class="artist1">

                            <div class="artist-image">
                                <div class="textNgheSi">Nghệ sỹ</div>
                                <a href="/web_nghe_nhac/public/assets/php/artist-info.php?manghesy=17" id="artist-info"><img src="/web_nghe_nhac/public/assets/img/data-artists-image/nlh.jpg" alt="" class="hinhanh1 artist-image"></a>
                            </div>

                            <div class="folow-artist">
                                <div class="name songAuthor">
                                    <p>Ngô Lan Hương</p>
                                </div>
                                <button id="follow">Theo dõi</button>
                            </div>
                        </div>

                    </div>

                </div>

            </div>
<!--See review-->
<div class="seeReview">
    <div class="seeReview-exit">
        <div class="letter">
            <p id="Review">Đánh giá</p>
        </div>

        <iconify-icon icon="hugeicons:multiplication-sign" id="exit-ic"></iconify-icon>
    </div>

    <div class="seeReview-content"></div> <!--Hiển thị danh sách đánh giá-->

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
                <input type="submit" value="" style="display: none;">
                <button>
                    <svg width="43" height="44" viewBox="0 0 43 44" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect y="0.500244" width="43.0001" height="42.9995" rx="21.4997" fill="#296265"/>
                    <path d="M21 22.5003L24.5 19.0003M30.548 13.0533C28.37 10.7073 11.986 16.4533 12 18.5503C12.015 20.9293 18.398 21.6603 20.167 22.1573C21.231 22.4563 21.516 22.7613 21.761 23.8773C22.872 28.9293 23.431 31.4433 24.701 31.4993C26.728 31.5893 32.673 15.3423 30.548 13.0533Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </button>
            </div>
        </div>
    </form>

</div>
            <script src="/web_nghe_nhac/public/assets/script/rightBar.js"></script>
