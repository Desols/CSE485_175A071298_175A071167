function emptyText(input) {
    return input.length == 0;
}

function validatePassword(inputPassword) {
    return inputPassword.length > 4;
}

//LOGIN
$(document).ready(function() {
    $('#email').blur(function() {
        var email = $(this).val().trim();
        if (emptyText(email)) {
            $("#notice_email").html("<i>Chưa nhập email</i> ");
        } else {
            $("#notice_email").html("");
        }
    });
    $('#password').blur(function() {
        var password = $(this).val();
        if (!validatePassword(password)) {
            $("#notice_password").html("<i>Mật khẩu phải có nhiều hơn 5 ký tự</i>");
        } else {
            $("#notice_password").html("");
        }
    });
});
