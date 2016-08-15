<div class="side-body padding-top">
  <div class="row">
    <h1 class="text-center fa-5x"><?php // echo $room; ?></h1>
		<div class="col-lg-12">
			<!-- Quick stats boxes -->
			<div class="row">
				<div class="panel panel-flat">
					<div class="panel-heading">
						<!-- <h5 class="panel-title">Phòng PH </h5> -->
						
						
					<div class="panel-body">
						<form id="add-new-gh" action="/gh" method="post" role="form">									<p id="error-order" class="text-warning"></p>
						<p id="success-order" class="text-success"></p>
						
						<div class="form-group">
							<label>Nhập số hoa hồng rút</label>
							<input type="text" class="form-control" placeholder="Hệ số của 1.500.000 VNĐ">
							<h6 class="text-info">Hoa hồng hiện có: 1,000,000 VNĐ</h6>
						</div>
						
						<button type="button" id="btnAddGetHelp" class="btn btn-primary">Đặt lệnh rút</button>
						</form>
					</div>
				</div>

			</div>
			<!-- /quick stats boxes -->

		</div>
	</div>
</div>