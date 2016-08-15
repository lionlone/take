var data_list;
var sttph = new Array("Không rõ", "Chưa khớp", "Đã khớp", "Đợi xác nhận", "Thành công");
var sttgh = new Array("Không rõ", "Chưa khớp", "Đợi nhận tiền", "Thành công");
loadPHGH();
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

function loadPHGH() {
	$.ajax({
		type: "post",
		url: "/member/listphgh/",
		data: { "room": $('#room').val() }
	})
	.done(function(data) {
		try {
			var obj = jQuery.parseJSON(data);
			storeDataPHGH(obj);
		} catch(err) {
			alert('Lỗi: ' + err.message);
			console.log(data);
		}
	});
}

$(document).on('click', '.btn-list-receive-ph', function() {
	for (j = 1; j <= 2; j++) {
		$('#code'+j).html('#');
		$('#user'+j).html('');
		$('#name'+j).html('');
		$('#phone'+j).html('');
		$('#email'+j).html('');
		$('#bank'+j).html('');
		$('#branch'+j).html('');
		$('#ref_user'+j).html('');
		$('#ref_phone'+j).html('');
		$('#profit'+j).html('');
		$('#status'+j).html('');
		$('#countdown'+j).html('');
		$('#send'+j).val('');
		$('#send'+j).data('code', '');
		$('#send'+j).hide();
		$('#upanh'+j).hide();
		$('#image'+j).html('<div class="progress-bar progress-bar-success" style="display:none;"></div>');
	}
	var j = 1;
	for (i = 0; i < data_list.length; i++) {
		if (data_list[i].phid == $(this).val() && data_list[i].status != '1') {
			$('#code'+j).html('#' + data_list[i].joinphid);
			$('#user'+j).html(data_list[i].username);
			$('#name'+j).html(data_list[i].name);
			$('#phone'+j).html(data_list[i].phone);
			$('#email'+j).html(data_list[i].email);
			$('#bank'+j).html(data_list[i].bank);
			$('#branch'+j).html(data_list[i].branch);
			$('#ref_user'+j).html(data_list[i].referral);
			$('#ref_phone'+j).html(data_list[i].ref_phone);
			$('#profit'+j).html(data_list[i].profit);
			$('#status'+j).html(sttph[parseInt(data_list[i].status)+parseInt(data_list[i].sent)]);
			$('#countdown'+j).html(data_list[i].endtime);
			$('#countdown'+j).countdown($('#countdown'+j).html(), function(event) {
				$(this).html(event.strftime('%H giờ %M phút %S giây'));
			});
			$('#send'+j).val(data_list[i].joinphid);
			$('#send'+j).data('code', data_list[i].code);
			if (data_list[i].sent != '1') {
				$('#send'+j).show();
			}
			if (data_list[i].report == '1' && data_list[i].image == '') {
				$('#upanh'+j).show();
			}
			if (data_list[i].image != '') {
				$('#image'+j).append('<a href="' + data_list[i].image + '" target="_blank"><img src="' + data_list[i].image + '" class="attachment-thumbnail" alt="Ảnh báo cáo"></a>')
			}
			j++;
		}
	}

	$('#list-receive').modal('show');
});
$(document).on('click', '.btn-sent-ph', function() {
	var btn = $(this);
	if (confirm('Bạn có muốn xác nhận đã gửi tiền?')) {
		$.ajax({
			type: "post",
			url: "/member/verifyPH/",
			data: {
				"joinphid": $(this).val(),
				"code": $(this).data('code'),
				"room": $('#room').val()
			}
		})
		.done(function(data) {
			if (data == '1') {
				alert('Đã xác nhận');
				btn.hide();
			} else {
				alert('Lỗi: ' + data);
			}
		});
	}
});
$(document).on('click', '.btn-sent-gh', function() {
	var btn = $(this);
	if (confirm('Bạn có muốn xác nhận đã nhận tiền?')) {
		$.ajax({
			type: "post",
			url: "/member/verifyGH/",
			data: {
				"joinphid": $(this).val(),
				"code": $(this).data('code')
			}
		})
		.done(function(data) {
			if (data == '1') {
				alert('Đã xác nhận');
				btn.hide();
			} else {
				alert('Lỗi: ' + data);
			}
		});
	}
});
$(document).on('click', '.btn-list-send-ph', function() {
	for (j = 1; j <= 3; j++) {
		$('#code'+j).html('#');
		$('#user'+j).html('');
		$('#name'+j).html('');
		$('#phone'+j).html('');
		$('#email'+j).html('');
		$('#bank'+j).html('');
		$('#branch'+j).html('');
		$('#ref_user'+j).html('');
		$('#ref_phone'+j).html('');
		$('#profit'+j).html('');
		$('#status'+j).html('');
		$('#countdown'+j).html('');
		$('#send'+j).val('');
		$('#send'+j).data('code', '');
		$('#send'+j).hide();
		$('#report'+j).hide();
		$('#image'+j).html('');
	}
	var j = 1;
	for (i = 0; i < data_list.length; i++) {
		if (data_list[i].code == $(this).val()) {
			$('#code'+j).html('#' + data_list[i].joinphid);
			$('#user'+j).html(data_list[i].username);
			$('#name'+j).html(data_list[i].name);
			$('#phone'+j).html(data_list[i].phone);
			$('#email'+j).html(data_list[i].email);
			$('#bank'+j).html(data_list[i].bank);
			$('#branch'+j).html(data_list[i].branch);
			$('#ref_user'+j).html(data_list[i].referral);
			$('#ref_phone'+j).html(data_list[i].ref_phone);
			$('#profit'+j).html(data_list[i].profit);
			$('#status'+j).html(sttgh[data_list[i].status]);
			$('#countdown'+j).html(data_list[i].endtime);
			$('#countdown'+j).countdown($('#countdown'+j).html(), function(event) {
				$(this).html(event.strftime('%H giờ %M phút %S giây'));
			});
			if (data_list[i].sent == '1' && data_list[i].status != '3') {
				$('#send'+j).val(data_list[i].joinphid);
				$('#send'+j).data('code', data_list[i].code);
				$('#send'+j).show();
				if (data_list[i].report == '0') {
					$('#report'+j).val(data_list[i].joinphid);
					$('#report'+j).data('code', data_list[i].code);
					$('#report'+j).show();
				}
			}
			if (data_list[i].image != '') {
				$('#image'+j).append('<a href="' + data_list[i].image + '" target="_blank"><img src="' + data_list[i].image + '" class="attachment-thumbnail" alt="Ảnh báo cáo"></a>')
			}
			j++;
		}
	}
	$('#list-send').modal('show');
});

function storeDataPHGH(data) {
	data_list = data;
}
$('#btn-upanh-1').fileupload({
	add: function(e, data) {
		var acceptFileTypes = /^image\/(gif|jpe?g|png)$/i;
		if (data.originalFiles[0]['type'].length && !acceptFileTypes.test(data.originalFiles[0]['type'])) {
			alert('Tập tin không hợp lệ');
		} else {
			data.submit();
		}
	},
	url: '/server/php/',
	dataType: 'json',
	done: function (e, data) {
		$.each(data.result.files, function (index, file) {
			$('#image1').html('<a href="' + file.url + '" target="_blank"><img src="' + file.url + '" class="attachment-thumbnail" alt="Ảnh báo cáo"></a>');
			$.ajax({
				type: "post",
				url: "/member/updateimage/",
				data: {
					"joinphid": $('#send1').val(),
					"code": $('#send1').data('code'),
					"image": file.url
				}
			});
			loadPHGH();
			$('#upanh1').hide();
		});
	},
	progressall: function (e, data) {
		var progress = parseInt(data.loaded / data.total * 100, 10);
		$('#image1 .progress-bar').show().css('width', progress + '%');
	}
}).prop('disabled', !$.support.fileInput).parent().addClass($.support.fileInput ? undefined : 'disabled');

$('#btn-upanh-2').fileupload({
	add: function(e, data) {
		var acceptFileTypes = /^image\/(gif|jpe?g|png)$/i;
		if (data.originalFiles[0]['type'].length && !acceptFileTypes.test(data.originalFiles[0]['type'])) {
			alert('Tập tin không hợp lệ');
		} else {
			data.submit();
		}
	},
	url: '/server/php/',
	dataType: 'json',
	done: function (e, data) {
		$.each(data.result.files, function (index, file) {
			$('#image2').html('<a href="' + file.url + '" target="_blank"><img src="' + file.url + '" class="attachment-thumbnail" alt="Ảnh báo cáo"></a>');
			$.ajax({
				type: "post",
				url: "/member/updateimage/",
				data: {
					"joinphid": $('#send2').val(),
					"code": $('#send2').data('code'),
					"image": file.url
				}
			});
			loadPHGH();
			$('#upanh2').hide();
		});
	},
	progressall: function (e, data) {
		var progress = parseInt(data.loaded / data.total * 100, 10);
		$('#image2 .progress-bar').show().css('width', progress + '%');
	}
}).prop('disabled', !$.support.fileInput).parent().addClass($.support.fileInput ? undefined : 'disabled');
$(document).on('click', '.btn-report-gh', function() {
	var btn = $(this);
	$.ajax({
		type: "post",
		url: "/member/reportimage/",
		data: {
			"joinphid": $(this).val(),
			"code": $(this).data('code')
		}
	})
	.done(function(data) {
		if (data == '1') {
			alert('Đã báo cáo');
			btn.hide();
		} else {
			alert('Lỗi: ' + data);
		}
	});
});