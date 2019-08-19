
$(document).ready(function() {
	$('#submit').click(function () {
		var a=$('#inputState').val();
		 $.ajax({
                 url: '../../php/view_teacher/insert_subject.php',
                 type: 'POST',
                 dataType: 'text',
                 data: {
                     email:$('#email').val(),
                     subject: $('#inputState').val(),
                 },
                 success: function(data) {
                 	alert(data)

                 },
                 error: function(data) {
                 }

             });

	})
});
