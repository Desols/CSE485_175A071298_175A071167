function emptyText(input) {
    return input.length == 0;
}

function validatePassword(inputPassword) {
    return inputPassword.length > 4;
}


$(document).ready(function() {
    $('#email').blur(function() {
        var email = $(this).val().trim();
        if (emptyText(email)) {
            $("#notice_email").html("<i>Chưa nhập email</i> ");
        } else {
            $("#notice_email").html("");
        }
    });

    $('#password_old').blur(function() {
        var password = $(this).val();
        if (!validatePassword(password)) {
            $("#notice_password_old").html("<i>Chưa nhập mật khẩu</i>");
        } else {
            $("#notice_password_old").html("");
        }
    });

    $('#password_new').blur(function() {
        var password = $(this).val();
        if (!validatePassword(password)) {
            $("#notice_password_new").html("<i>Mật khẩu phải có nhiều hơn 5 ký tự</i>");
        } else {
            $("#notice_password_new").html("");
        }
    });

    $('#repassword').blur(function() {
        var password = $(this).val();
        var repassword = $('#password_new').val();
        if (password != repassword) {
            $("#notice_repassword").html("Mật khẩu không trùng khớp");
        } else {
            $("#notice_repassword").html("");
        }
    });
});
