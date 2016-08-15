<div class="container-fluid">
	<div class="side-body padding-top">
		<form action="" method="POST" role="form">
			<input type="text" class="hidden" name="config" value="config">
			<legend>Cấu hình hệ thống</legend>
		
			<div class="form-group">
				<label for="">Thời gian chờ PH:</label>
				<input type="number" class="form-control" id="" name="time_ph" value="<?= $data_config['time_ph']; ?>" placeholder="Thời gian được tính bằng phút">
			</div>

			<div class="form-group">
				<label for="">Thời gian khớp PH:</label>
				<input type="number" class="form-control" id="" name="time_join_ph" value="<?= $data_config['time_join_ph']; ?>" placeholder="Thời gian được tính bằng phút">
			</div>

			<div class="form-group">
				<label for="">Thời gian chờ GH:</label>
				<input type="number" class="form-control" id="" name="time_gh" value="<?= $data_config['time_gh']; ?>" placeholder="Thời gian được tính bằng phút">
			</div>

			<div class="form-group">
				<label for="">Thời gian khớp GH:</label>
				<input type="number" class="form-control" id="" name="time_join_gh" value="<?= $data_config['time_join_gh']; ?>" placeholder="Thời gian được tính bằng phút">
			</div>

			<div class="form-group">
				<label for="">Danh sách tài khoản quỹ ( Mỗi tài khoản cách nhau bởi dấu "," ):</label>
				<input type="text" class="form-control" id="" name="preciousGH" value="<?= $data_config['preciousGH']; ?>" placeholder="Mỗi tài khoản cách nhau bởi dấu ','">
				<label for="">Số Lệnh cho 1 tài khoản:</label>
				<input type="number" class="form-control" id="" name="sumGH" value="<?= $data_config['sumGH']; ?>" placeholder="Số lệnh GH">
			</div>
		
			
		
			<button type="submit" class="btn btn-primary">Cập nhập</button>
		</form>
	</div>
</div>