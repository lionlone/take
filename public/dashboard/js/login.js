var stk = false;
var ref = false;
var user = false;
var delay = (function() {
	var timer = 0;
	return function(callback, ms) {
		clearTimeout(timer);
		timer = setTimeout(callback, ms);
	};
})();
$('#signupform-username').keyup(function() {
	delay(function() {
		$.ajax({
			type: "post",
			url: "login/refuser/",
			data: {"username": $('#signupform-username').val()}
		})
		.done(function(data) {
			if (data > 0) {
				user = true;
			} else {
				user = false;
			}
		});
	}, 500);
});
$('#signupform-bank').keyup(function() {
	delay(function() {
		$.ajax({
			type: "post",
			url: "bank/number/",
			data: {"account": $('#signupform-bank').val()}
		})
		.done(function(data) {
			data = $.parseJSON(data);
			if (data.status) {
				$('#signupform-bankname').val(data.name);
				$.ajax({
					type: "post",
					url: "login/bank/",
					data: {"bank": $('#signupform-bank').val()}
				})
				.done(function(data) {
					if (data > 0) {
						stk = true;
					} else {
						stk = false;
					}
				});
			} else {
				$('#signupform-bankname').val('');
			}
		});
	}, 500);
});
$('#signupform-refuser').keyup(function() {
	delay(function() {
		$.ajax({
			type: "post",
			url: "login/refuser/",
			data: {"username": $('#signupform-refuser').val()}
		})
		.done(function(data) {
			if (data > 0) {
				ref = true;
			} else {
				ref = false;
			}
		});
	}, 500);
});
function checkForm() {
	$('.help-block').html('');
	$('.form-group').removeClass('has-error');
	if ($('#signupform-username').val() == '') {
		$('#signupform-username').parents('.form-group').addClass('has-error').find('.help-block').html('Tài khoản không được bỏ trống.');
		$('#signupform-username').focus();
		return false;
	}
	if (!isValidUsername($('#signupform-username').val())) {
		$('#signupform-username').parents('.form-group').addClass('has-error').find('.help-block').html('Tài khoản không được có dấu, ký tự đặc biệt.');
		$('#signupform-username').focus();
		return false;
	}
	if (user) {
		$('#signupform-username').parents('.form-group').addClass('has-error').find('.help-block').html('Tài khoản đã tồn tại.');
		$('#signupform-username').focus();
		return false;
	}
	if ($('#signupform-password').val() == '') {
		$('#signupform-password').parents('.form-group').addClass('has-error').find('.help-block').html('Mật khẩu không được bỏ trống.');
		$('#signupform-password').focus();
		return false;
	}
	if ($('#signupform-repassword').val() != $('#signupform-password').val()) {
		$('#signupform-repassword').parents('.form-group').addClass('has-error').find('.help-block').html('Nhập lại mật khẩu không đúng.');
		$('#signupform-repassword').focus();
		return false;
	}
	if ($('#signupform-password2').val() == '') {
		$('#signupform-password2').parents('.form-group').addClass('has-error').find('.help-block').html('Mật khẩu cấp 2 không được bỏ trống.');
		$('#signupform-password2').focus();
		return false;
	}
	if ($('#signupform-password2').val() == $('#signupform-password').val()) {
		$('#signupform-password2').parents('.form-group').addClass('has-error').find('.help-block').html('Mật khẩu cấp 2 không được trùng với mật khẩu cấp 1.');
		$('#signupform-password2').focus();
		return false;
	}
	if ($('#signupform-repassword2').val() != $('#signupform-password2').val()) {
		$('#signupform-repassword2').parents('.form-group').addClass('has-error').find('.help-block').html('Nhập lại mật khẩu cấp 2 không đúng.');
		$('#signupform-repassword2').focus();
		return false;
	}
	if ($('#signupform-phone').val() == '' || !isValidPhone($('#signupform-phone').val())) {
		$('#signupform-phone').parents('.form-group').addClass('has-error').find('.help-block').html('Số điện thoại không hợp lệ.');
		$('#signupform-phone').focus();
		return false;
	}
	if ($('#signupform-email').val() == '' || !isValidEmailAddress($('#signupform-email').val())) {
		$('#signupform-email').parents('.form-group').addClass('has-error').find('.help-block').html('Địa chỉ email không hợp lệ.');
		$('#signupform-email').focus();
		return false;
	}
	if ($('#signupform-bank').val() == '' || $('#signupform-bankname').val() == '') {
		$('#signupform-bank').parents('.form-group').addClass('has-error').find('.help-block').html('Số tài khoản Vietcombank không đúng.');
		$('#signupform-bank').focus();
		return false;
	}
	if ($('#signupform-branch').val() == '') {
		$('#signupform-branch').parents('.form-group').addClass('has-error').find('.help-block').html('Hãy điền tên chi nhánh Vietcombank.');
		$('#signupform-branch').focus();
		return false;
	}
	if (stk) {
		$('#signupform-bank').parents('.form-group').addClass('has-error').find('.help-block').html('Số tài khoản VCB này đã được sử dụng cho tài khoản khác.');
		$('#signupform-bank').focus();
		return false;
	}
	if ($('#signupform-refuser').val() == '' || !ref) {
		$('#signupform-refuser').parents('.form-group').addClass('has-error').find('.help-block').html('ID người giới thiệu không đúng.');
		$('#signupform-refuser').focus();
		return false;
	}
	if (!$('#accept-sign').is(':checked')) {
		alert('Bạn phải đồng ý với điều khoản dịch vụ.');
		return false;
	}
	return true;
}
function isValidPhone(phone) {
	var pattern = /^\d{3,15}$/i;
	return pattern.test(phone);
};
function isValidUsername(username) {
	var pattern = /^\w+$/i;
	return pattern.test(username);
};
function isValidEmailAddress(emailAddress) {
	var pattern = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	return pattern.test(emailAddress);
};
$(document).on('click', '#btn-signup', function() {
	if (checkForm()) {
		$.ajax({
			type: "post",
			url: "login/sign/",
			data: {
				"username": $('#signupform-username').val(),
				"password": $('#signupform-password').val(),
				"password2": $('#signupform-password2').val(),
				"email": $('#signupform-email').val(),
				"phone": $('#signupform-phone').val(),
				"vcb": $('#signupform-bank').val(),
				"name": $('#signupform-bankname').val(),
				"branch": $('#signupform-branch').val(),
				"ref": $('#signupform-refuser').val()
			}
		})
		.done(function(data) {
			if (data == '99') {
				alert('Đăng ký thành công.');
				$('#form-signup').trigger('reset');
				$('a[href="#basic-tab1"]').trigger('click');
			} else if (data == '0') {
				alert('Đăng ký thất bại.');
			} else if (data == '1') {
				$('#signupform-username').parents('.form-group').addClass('has-error').find('.help-block').html('Tài khoản đã tồn tại.');
				$('#signupform-username').focus();
			} else if (data == '2') {
				$('#signupform-password2').parents('.form-group').addClass('has-error').find('.help-block').html('Mật khẩu cấp 2 không được trùng với mật khẩu cấp 1.');
				$('#signupform-password2').focus();
			} else if (data == '3') {
				$('#signupform-bank').parents('.form-group').addClass('has-error').find('.help-block').html('Số tài khoản không hợp lệ.');
				$('#signupform-bank').focus();
			} else if (data == '4') {
				$('#signupform-refuser').parents('.form-group').addClass('has-error').find('.help-block').html('Tài khoản người giới thiệu không đúng.');
				$('#signupform-refuser').focus();
			} else {
				alert(data);
			}
		});
	}
});
$(document).on('submit', 'form', function(e) {
	e.preventDefault();
});
$(document).on('click', '#btn-signin', function() {
	$('.help-block').html('');
	$('.form-group').removeClass('has-error');
	if ($('#loginform-username').val() == '') {
		$('#loginform-username').parents('.form-group').addClass('has-error').find('.help-block').html('Tài khoản không được bỏ trống.');
		$('#loginform-username').focus();
		return false;
	}
	if ($('#loginform-password').val() == '') {
		$('#loginform-password').parents('.form-group').addClass('has-error').find('.help-block').html('Mật khẩu không được bỏ trống.');
		$('#loginform-password').focus();
		return false;
	}
	$.ajax({
		type: "post",
		url: "/login/ckeck_login",
		data: {
			"username": $('#loginform-username').val(),
			"password": $('#loginform-password').val()
		}
	})
	.done(function(data) {
		if (data == '1') {
			window.location.href = '/member';
		}
		else if (data == '0') {
			$('#loginform-username').parents('.form-group').addClass('has-error').find('.help-block').html('Tài khoản hoặc mật khẩu không đúng.');
			$('#loginform-username').focus();
		} else {
			alert(data);
		}
	});
});
$(document).on('click', '#recover-password', function() {
	$('#recover-form').trigger('reset');
	$('#recoverModal').modal('show');
});
$(document).on('click', '#btn-recover-info', function() {
	$('.help-block').html('');
	$('div.col-md-7').removeClass('has-error');
	if ($('#recover-username').val() == '') {
		$('#recover-username').parents('div.col-md-7').addClass('has-error').find('.help-block').html('Tài khoản không được bỏ trống.');
		$('#recover-username').focus();
		return false;
	}
	if ($('#recover-email').val() == '' || !isValidEmailAddress($('#recover-email').val())) {
		$('#recover-email').parents('div.col-md-7').addClass('has-error').find('.help-block').html('Địa chỉ email không hợp lệ.');
		$('#recover-email').focus();
		return false;
	}
	$.ajax({
		type: "post",
		url: "/login/recover/",
		data: {
			"username": $('#recover-username').val(),
			"email": $('#recover-email').val()
		}
	})
	.done(function(data) {
		if (data == '99') {
			alert('Đã gửi thông tin tài khoản vào email.');
			$('#recover-form').trigger('reset');
		} else if (data == '0') {
			alert('Tài khoản hoặc email không đúng.');
		} else if (data == '1') {
			alert('Lỗi, vui lòng liên hệ quản trị.');
		} else {
			alert(data);
		}
	});
});
$(document).on('click', '#btn-recover-password', function() {
	$('.help-block').html('');
	$('.form-group').removeClass('has-error');
	if ($('#recover-newpassword').val() == '') {
		$('#recover-newpassword').parents('.form-group').addClass('has-error').find('.help-block').html('Hãy nhập mật khẩu mới.');
		$('#recover-newpassword').focus();
		return false;
	}
	if ($('#recover-repassword').val() != $('#recover-newpassword').val()) {
		$('#recover-repassword').parents('.form-group').addClass('has-error').find('.help-block').html('Nhập lại mật khẩu không đúng.');
		$('#recover-repassword').focus();
		return false;
	}
	$.ajax({
		type: "post",
		url: "/login/recoverpw/",
		data: {
			"username": $('#recover-input1').val(),
			"password": $('#recover-input2').val(),
			"newpassword": $('#recover-newpassword').val()
		}
	})
	.done(function(data) {
		if (data == '99') {
			alert('Khôi phục mật khẩu thành công.');
			$('#form-recover-password').trigger('reset');
		} else if (data == '0') {
			alert('Khôi phục mật khẩu thất bại.');
		} else if (data == '-1') {
			alert('Đường dẫn khôi phục mật khẩu đã hết hiệu lực.');
		} else {
			alert(data);
		}
	});
});
$(document).on('click', '#btn-recover-password2', function() {
	$('.help-block').html('');
	$('.form-group').removeClass('has-error');
	if ($('#recover-newpassword').val() == '') {
		$('#recover-newpassword').parents('.form-group').addClass('has-error').find('.help-block').html('Hãy nhập mật khẩu mới.');
		$('#recover-newpassword').focus();
		return false;
	}
	if ($('#recover-repassword').val() != $('#recover-newpassword').val()) {
		$('#recover-repassword').parents('.form-group').addClass('has-error').find('.help-block').html('Nhập lại mật khẩu không đúng.');
		$('#recover-repassword').focus();
		return false;
	}
	$.ajax({
		type: "post",
		url: "/login/recoverpw2/",
		data: {
			"username": $('#recover-input1').val(),
			"password": $('#recover-input2').val(),
			"newpassword": $('#recover-newpassword').val()
		}
	})
	.done(function(data) {
		if (data == '99') {
			alert('Khôi phục mật khẩu thành công.');
			$('#form-recover-password').trigger('reset');
		} else if (data == '0') {
			alert('Khôi phục mật khẩu thất bại.');
		} else if (data == '-1') {
			alert('Đường dẫn khôi phục mật khẩu đã hết hiệu lực.');
		} else {
			alert(data);
		}
	});
});