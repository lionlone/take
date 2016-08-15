var editor, notice_data, id_notice;
var config = '/ckfinder/upload/html';
loadHistory();
loadNotice();
loadPolicy();
$(document).on('click', '#recover-password2', function() {
	if (confirm('Một liên kết khôi phục mật khẩu cấp 2 sẽ được gửi về email.\nBạn có đồng ý?')) {
		$.get('/member/recoverpass2/', function(data) {
			if (isValidEmailAddress(data)) {
				alert('Đã gửi liên kết khôi phục mật khẩu cấp 2 về địa chỉ email ' + data);
			} else {
				alert('Lỗi: ' + data);
			}
		});
	}
});
function isValidEmailAddress(emailAddress) {
	var pattern = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	return pattern.test(emailAddress);
};
function isValidPhone(phone) {
	var pattern = /^\d{3,15}$/i;
	return pattern.test(phone);
};
$(document).on('click', '#btn-update', function() {
	$('.help-block').html('');
	$('.form-group').removeClass('has-error');
	if ($('#updateform-phone').val() == '' || !isValidPhone($('#updateform-phone').val())) {
		$('#updateform-phone').parents('.form-group').addClass('has-error').find('.help-block').html('Số điện thoại không hợp lệ.');
		$('#updateform-phone').focus();
		return false;
	}
	if ($('#updateform-email').val() == '' || !isValidEmailAddress($('#updateform-email').val())) {
		$('#updateform-email').parents('.form-group').addClass('has-error').find('.help-block').html('Địa chỉ email không đúng.');
		$('#updateform-email').focus();
		return false;
	}
	if ($('#updateform-branch').val() == '') {
		$('#updateform-branch').parents('.form-group').addClass('has-error').find('.help-block').html('Hãy nhập chi nhánh ngân hàng Vietcombank.');
		$('#updateform-branch').focus();
		return false;
	}
	if ($('#updateform-pass2update').val() == '') {
		$('#updateform-pass2update').parents('.form-group').addClass('has-error').find('.help-block').html('Hãy nhập mật khẩu cấp 2.');
		$('#updateform-pass2update').focus();
		return false;
	}
	$.ajax({
		type: "post",
		url: "/member/update/",
		data: {
			"password2": $('#updateform-pass2update').val(),
			"phone": $('#updateform-phone').val(),
			"email": $('#updateform-email').val(),
			"branch": $('#updateform-branch').val()
		}
	})
	.done(function(data) {
		alert(data);
	});
});
$(document).on('click', '#btn-update-password1', function() {
	$('.help-block').html('');
	$('.form-group').removeClass('has-error');
	if ($('#updateform-password').val() == '') {
		$('#updateform-password').parents('.form-group').addClass('has-error').find('.help-block').html('Hãy nhập mật khẩu hiện tại.');
		$('#updateform-password').focus();
		return false;
	}
	if ($('#updateform-newpassword').val() == '') {
		$('#updateform-newpassword').parents('.form-group').addClass('has-error').find('.help-block').html('Hãy nhập mật khẩu mới.');
		$('#updateform-newpassword').focus();
		return false;
	}
	if ($('#updateform-repassword').val() != $('#updateform-newpassword').val()) {
		$('#updateform-repassword').parents('.form-group').addClass('has-error').find('.help-block').html('Nhập lại mật khẩu không đúng.');
		$('#updateform-repassword').focus();
		return false;
	}
	$.ajax({
		type: "post",
		url: "/member/changepass1/",
		data: {
			"password": $('#updateform-password').val(),
			"newpassword": $('#updateform-newpassword').val()
		}
	})
	.done(function(data) {
		alert(data);
	});
});
$(document).on('click', '#btn-update-password2', function() {
	$('.help-block').html('');
	$('.form-group').removeClass('has-error');
	if ($('#updateform-password2').val() == '') {
		$('#updateform-password2').parents('.form-group').addClass('has-error').find('.help-block').html('Hãy nhập mật khẩu hiện tại.');
		$('#updateform-password2').focus();
		return false;
	}
	if ($('#updateform-newpassword2').val() == '') {
		$('#updateform-newpassword2').parents('.form-group').addClass('has-error').find('.help-block').html('Hãy nhập mật khẩu mới.');
		$('#updateform-newpassword2').focus();
		return false;
	}
	if ($('#updateform-repassword2').val() != $('#updateform-newpassword2').val()) {
		$('#updateform-repassword2').parents('.form-group').addClass('has-error').find('.help-block').html('Nhập lại mật khẩu không đúng.');
		$('#updateform-repassword2').focus();
		return false;
	}
	$.ajax({
		type: "post",
		url: "/member/changepass2/",
		data: {
			"password": $('#updateform-password2').val(),
			"newpassword": $('#updateform-newpassword2').val()
		}
	})
	.done(function(data) {
		alert(data);
	});
});
$(document).on('click', '#btn-transferpin', function() {
	if (!$.isNumeric($('#pin').val()) || !$('#pin').val() >= 1) {
		alert('Hãy nhập số PIN.');
		$('#pin').focus();
		return false;
	}
	if ($('#touser').val() == '') {
		alert('Hãy nhập ID người nhận PIN.');
		$('#touser').focus();
		return false;
	}
	if ($('#pin-password2').val() == '') {
		alert('Hãy nhập mật khẩu cấp 2.');
		$('#pin-password2').focus();
		return false;
	}
	$.ajax({
		type: "post",
		url: "/member/pin/",
		data: {
			"transferpin": "transferpin",
			"pin": $('#pin').val(),
			"touser": $('#touser').val(),
			"password2": $('#pin-password2').val()
		}
	})
	.done(function(data) {
		alert(data);
		loadHistory();
	});
});
$(document).on('click', '#btn-push-notice', function() {
	var content = CKEDITOR.instances.content.getData();
	if ($('#title').val() == '' && content == '') {
		alert('Bạn phải nhập tiêu đề hoặc nội dung.');
		$('#title').focus();
		return false;
	}
	if (!$('input[name=noticeType]:checked').val()) {
		alert('Bạn phải chọn màu thông báo.');
		$('.radio').focus();
		return false;
	}
	if (!$('input[name=noticeStatus]:checked').val()) {
		alert('Bạn phải chọn trạng thái thông báo.');
		$('.radio').focus();
		return false;
	}
	$.ajax({
		type: "post",
		url: "/member/push/",
		data: {
			"title": $('#title').val(),
			"content": content,
			"type": $('input[name=noticeType]:checked').val(),
			"status": $('input[name=noticeStatus]:checked').val()
		}
	})
	.done(function(data) {
		alert(data);
		loadNotice();
	});
});
$(document).on('click', '#btn-delete-notice', function() {
	if (confirm('Bạn có muốn xóa thông báo này?')) {
		$.ajax({
			type: "post",
			url: "/member/delnotice/",
			data: { "id": $(this).val() }
		})
		.done(function(data) {
			alert(data);
			loadNotice();
		});
	}
});
$(document).on('click', '#btn-edit-notice', function() {
	$('#btn-cancel-notice').show();
	$('.btn-submit').attr('id', 'btn-update-notice').html('Sửa thông báo');
	i = $(this).data('id');
	id_notice = $(this).val();
	$('#title').val(notice_data[i].title);
	CKEDITOR.instances.content.setData(notice_data[i].content);
	$('input[name=noticeType][value=' + notice_data[i].type + ']').prop('checked', true);
	$('input[name=noticeStatus][value=' + notice_data[i].status + ']').prop('checked', true);
	$('#title').focus();
});
$(document).on('click', '#btn-update-notice', function() {
	var content = CKEDITOR.instances.content.getData();
	if ($('#title').val() == '' && content == '') {
		alert('Bạn phải nhập tiêu đề hoặc nội dung.');
		$('#title').focus();
		return false;
	}
	if (!$('input[name=noticeType]:checked').val()) {
		alert('Bạn phải chọn màu thông báo.');
		$('.radio').focus();
		return false;
	}
	if (!$('input[name=noticeStatus]:checked').val()) {
		alert('Bạn phải chọn trạng thái thông báo.');
		$('.radio').focus();
		return false;
	}
	$.ajax({
		type: "post",
		url: "/member/updatenotice/",
		data: {
			"id": id_notice,
			"title": $('#title').val(),
			"content": content,
			"type": $('input[name=noticeType]:checked').val(),
			"status": $('input[name=noticeStatus]:checked').val()
		}
	})
	.done(function(data) {
		alert(data);
		loadNotice();
		$('#btn-cancel-notice').trigger('click');
	});
});
$(document).on('click', '#btn-cancel-notice', function() {
	$('.btn-submit').attr('id', 'btn-push-notice').html('Đăng thông báo');
	$('#title').val('');
	CKEDITOR.instances.content.setData('');
	$('input[name=noticeType][value=success]').prop('checked', true);
	$('input[name=noticeStatus][value=1]').prop('checked', true);
	$(this).hide();
});
function loadHistory() {
	if ($('#pin-table>tbody').length) {
		$.get("/member/pintable/", function(data) {
			$('#pin-table>tbody').html(data);
		});
	}
}
function loadPolicy() {
	if ($('#btn-update-policy').length) {
		CKEDITOR.env.isCompatible = true;
		editor = CKEDITOR.replace('content');
		CKFinder.setupCKEditor(editor, config);
		$.get("/member/loadpolicy/", function(data) {
			try {
				var obj = jQuery.parseJSON(data);
				$('#title-policy').val(obj.title);
				CKEDITOR.instances.content.setData(obj.content);
			} catch(err) {
				alert('Lỗi: ' + err.message);
				console.log(data);
			}
		});
	}
}
$(document).on('click', '#btn-update-policy', function() {
	var content = CKEDITOR.instances.content.getData();
	if ($('#title-policy').val() == '' && content == '') {
		alert('Bạn phải nhập tiêu đề hoặc nội dung.');
		$('#title-policy').focus();
		return false;
	}
	$.ajax({
		type: "post",
		url: "/member/updatepolicy/",
		data: {
			"title": $('#title-policy').val(),
			"content": content
		}
	})
	.done(function(data) {
		alert(data);
	});
});
function loadNotice() {
	if ($('#notice-table').length) {
		var color = {
			'success': 'Xanh lá',
			'info': 'Xanh dương',
			'warning': 'Vàng',
			'danger': 'Đỏ'
		};
		var status = {
			'0': 'Tắt',
			'1': 'Bật'
		};
		if (!editor) {
			CKEDITOR.env.isCompatible = true;
			editor = CKEDITOR.replace('content');
			CKFinder.setupCKEditor(editor, config);
		}
		$.ajax({
			type: "post",
			url: "/member/noticetable/",
			data: { "page": "notice" }
		})
		.done(function(data) {
			try {
				var obj = jQuery.parseJSON(data);
				var html = '<table class="table table-hover"><thead><tr><th>Tiêu đề</th><th>Màu</th><th>Trạng thái</th><th></th></tr></thead><tbody>';
				storeData(obj);
				for (var i = 0; i < obj.length; i++) {
					html += '<tr><td>' + obj[i].title + '</td><td>' + color[obj[i].type] + '</td><td>' + status[obj[i].status] + '</td>';
					html += '<td><button type="button" class="btn btn-primary btn-xs" data-id="' + i + '" id="btn-edit-notice" value="' + obj[i].id + '"><span class="glyphicon glyphicon-pencil"></span></button> ';
					html += '<button type="button" class="btn btn-danger btn-xs" id="btn-delete-notice" value="' + obj[i].id + '"><span class="glyphicon glyphicon-trash"></span></button></td></tr>';
				}
				html += '</tbody></table>';
				$('#notice-table').html(html);
			} catch(err) {
				alert('Lỗi: ' + err.message);
				console.log(data);
			}
		});
	} else if ($('#notice-index').length) {
		//Do something...
	}
}
function storeData(data) {
	notice_data = data;
}