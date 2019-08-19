// Sign_up
// Display form

//SIGN_UP_RES
function isEmail(inputEmail) {
    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(inputEmail);
}

function validatePassword(inputPassword) {
    return inputPassword.length > 4;
}

function emptyText(input) {
    return input.length == 0;
}


$(document).ready(function() {
    $('#email').blur(function() {
        var e = $(this).val().trim();
        if (emptyText(e)) {
            $("#notice_email").html("Chưa nhập email ");
        } else {
            $.ajax({
                url: 'sign_up_res.php',
                type: 'POST',
                dataType: 'text',
                data: {
                    email: e,
                    password: $('#password').val(),
                },
                success: function(data) {
                    $("#notice_email").html('Email không hợp lệ');

                },
                error: function(data) {
                	alert('Error');
                }

            });
        }
    });

    $('#password').blur(function() {
        var password = $(this).val();
        if (!validatePassword(password)) {
            $("#notice_password").html("Mật khẩu phải có nhiều hơn 5 ký tự");
        } else {
            $("#notice_password").html("");
        }
    });
    $('#repassword').blur(function() {
        var password = $(this).val();
        var repassword = $('#password').val();
        if (password != repassword) {
            $("#notice_repassword").html("Mật khẩu không trùng khớp");
        } else {
            $("#notice_repassword").html("");
        }
    });
});


$(document).ready(function() {
    $('#bt_code').click(function() {
            $.ajax({
                url: 'sign_code.php',
                type: 'POST',
                dataType: 'text',
                data: {
                    email: e,
                    password: $('#password').val(),
                },
                success: function(data) {
                    $("#notice_email").html('Email không hợp lệ');

                },
                error: function(data) {
                    alert('Error');
                }

            });
    });
     });