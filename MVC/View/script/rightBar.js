
$(document).ready(function() {
    // Khi nhấn vào icon cộng (+), hiển thị phần bình luận
    $('.All').click(function() {
        $('.seeReview').show(); // Hiển thị phần có class seeReview
        
    

    });

    // Khi nhấn vào icon đóng (×), ẩn phần bình luận
    $('#exit-ic').click(function() {
        $('.seeReview').hide(); // Ẩn phần có class seeReview
    });



});


$(document).ready(function() {
    $('.dot-oval').click(function() {
      // Lấy index của ô hiện tại trong danh sách các ô
      const index = $('.dot-oval').index(this);
  
      // Lấy tất cả các ô từ đầu đến ô hiện tại và đổi màu
      $('.dot-oval').slice(0, index + 1).css('background-color', '#007d79');

    });
  });
