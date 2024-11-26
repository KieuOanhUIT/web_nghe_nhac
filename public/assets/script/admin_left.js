    // Hiển thị thêm tài khoản
    $(document).ready(function() {
        $('#figure-addAccount').click(function() {
            $('.addAccount').show();
        });

        $('#return').click(function() {
            $('.addAccount').hide();
        });
    });

$(document).ready(function () { 
    $('#figure-updateAccount').click(function () { 
        $('.updateAccount').show();

    })
    $('#return').click(function () {
        $('.updateAccount').hide();
    });
})