$(document).on('click', '#btnAddGetHelp', function() {
	if ($('#task-number').val() < 1 || $('#task-number').val() > 3) {
		alert('Số lệnh không hợp lệ.');
		$('#task-number').focus();
		return false;
	}
	$.ajax({
		type: "post",
		url: "/member/actph/",
		data: {
			"number": $('#task-number').val(),
			"room": $('#room').val()
		}
	})
	.done(function(data) {
		if ($.isNumeric(data)) {
			window.location.href = '/member/ph' + $('#room').val();
		} else {
			alert(data);
		}
	});
});