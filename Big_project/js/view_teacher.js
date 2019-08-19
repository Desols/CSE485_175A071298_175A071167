
$(document).ready(function() {
	$('#submit').click(function () {
		var a=$('#inputState').val();
		 $.ajax({
                 url: '../../login_res.php',
                 type: 'POST',
                 dataType: 'text',
                 data: {
                     abc: $('#inputState').val(),
                 },
                 success: function(data) {
                 	// alert(data)

                 },
                 error: function(data) {
                 }

             });

	})
});
