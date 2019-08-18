$(function() {
    $("#dialog2").dialog({
        autoOpen: false
    });

    $(".row").click(function() {
        var mau = $(this).css("background-color");
        var mau_goc = 'rgb(0, 128, 0)';
        var id = 'nhan' + $(this).attr('id');
        //console.log(id);
        if (mau == mau_goc) {
            $(this).css("background-color", "white");
            document.getElementById(id).checked = false;
        } else {
            $(this).css("background-color", "green");
            document.getElementById(id).checked = true;
        }
    });

});



function Open_box() {
    var person = prompt("Please enter task:", "Code dạo :P");
    if (person == null || person == "") {
        alert("Not null!");
    } else {
        $('#1').before('<div class="row" > ' + person + '</div>');
    }

}

function check_mark_all() {
    dem = 0;
    for (let i = 1; i <= 6; i++) {
        chuoi = "nhan" + i;
        if (document.getElementById(chuoi).checked == true) {
            dem = dem + 1;
        }
    }

    if (dem == 6)
        return true;
    else
        return false;
}

function Mark_All() {

    if (check_mark_all() == false) {
        $(".row").css("background-color", "green");
        for (let i = 1; i <= 6; i++) {
            chuoi = "nhan" + i;
            document.getElementById(chuoi).checked = true;

        }
    } else {
        $(".row").css("background-color", "white");
        for (let i = 1; i <= 6; i++) {
            chuoi = "nhan" + i;
            document.getElementById(chuoi).checked = false;

        }
    }
}

function about() {
    $("#dialog2").dialog("open");
}

function Drak() {
    $("body").css("background-color", "black");
    $(".hoptuongtac").css("background-color", "black");
    $(".hoptuongtac").css("color", "white");
}