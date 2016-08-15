<div class="side-body padding-top">
	<div class="col-xs-12 col-sm-12 col-md-12">
		<div class="text-center"><h5 class="content-group">Thông báo</h5></div>
		<div class="form-group">
			<label for="title">Tiêu đề:</label>
			<input type="text" class="form-control" id="title" placeholder="Tiêu đề">
		</div>
		<div class="form-group">
			<label for="content">Nội dung:</label>
			<textarea class="form-control" rows="10" id="content"></textarea>
		</div>
		<div class="form-group">
			<label for="noticeType">Màu thông báo:</label>
			<div class="radio">
				<label class="radio-inline"><input type="radio" name="noticeType" value="success" checked>Xanh lá</label>
				<label class="radio-inline"><input type="radio" name="noticeType" value="info">Xanh dương</label>
				<label class="radio-inline"><input type="radio" name="noticeType" value="warning">Vàng</label>
				<label class="radio-inline"><input type="radio" name="noticeType" value="danger">Đỏ</label>
			</div>
		</div>
		<div class="form-group">
			<label for="noticeStatus">Trạng thái thông báo:</label>
			<div class="radio">
				<label class="radio-inline"><input type="radio" name="noticeStatus" value="1" checked>Bật</label>
				<label class="radio-inline"><input type="radio" name="noticeStatus" value="0">Tắt</label>
			</div>
		</div>
		<button type="button" class="btn btn-primary btn-submit" id="btn-push-notice">Đăng thông báo</button>
		<button type="button" class="btn btn-danger" id="btn-cancel-notice" style="display:none;">Hủy</button>
		<div id="notice-table" class="table-responsive"></div>
	</div>
</div>