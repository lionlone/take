<div class="side-body padding-top">
  <div class="row">
    <h1 class="text-center fa-5x"><?= $room; ?></h1>
		<div class="col-lg-12">
			<!-- Quick stats boxes -->
			<div class="row">
				<div class="panel panel-flat">
					<div class="panel-heading">
						<h5 class="panel-title">Đặt lệnh</h5>
					<div class="panel-body">
						<form id="add-new-gh" role="form">
							<div class="form-group">
								<label>Số lệnh muốn đặt</label>
								<input type="text" class="hidden" name="room" id="room" value="<?= $room; ?>">
								<input type="number" name="number" id="task-number" max="3" min="1" class="form-control" placeholder="Trong phòng chờ tối đa là 3 lệnh">
								<h6 class="text-info">Số PIN hiện có: <?= $count_pin; ?> </h6>
							</div>
							<button type="button" id="btnAddGetHelp" class="btn btn-primary">Kích PIN</button>
						</form>
					</div>
				</div>
			</div>
			<!-- /quick stats boxes -->
		</div>
		<div class="col-lg-12">
			<div class="row">
				<div class="panel panel-flat">
					<div class="panel-heading">
						<h5 class="panel-title">Chờ PH</h5>
					</div>
					<div class="panel-body">
						<div class="table-responsive">
							<table class="table text-nowrap">
								<thead>
									<tr>
										<th class="col-md-2">Ngày bắt đầu</th>
										<th class="col-md-2">Thời gian chờ</th>
										<th class="col-md-2">Lợi nhuận</th>
										<th>Nguồn lệnh</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($wait as $key => $value): ?>
										<tr>
											<td><?= date('d/m/Y H:i:s', $value['starttime']); ?></td>
											<td class="countdown"><?= date('H:i:s m/d/Y', $value['endtime']); ?></td>
											<td><?= $value['profit']; ?></td>
											<td><?= $this->session->userdata('login'); ?></td>
										</tr>
									<?php endforeach ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-12">
			<div class="row">
				<div class="panel panel-flat">
					<div class="panel-heading">
						<h5 class="panel-title">Khớp lệnh GH</h5>
					</div>
					<div class="panel-body">
						<div class="table-responsive">
							<table class="table text-nowrap">
								<thead>
									<tr>
										<th class="col-md-2">Ngày khớp lệnh</th>
										<th class="col-md-2">Thời gian chờ</th>
										<th>Nguồn lệnh</th>
										<th class="col-md-2">Danh sách chuyển</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($join as $key => $value): ?>
										<tr>
											<td><?= date('d/m/Y H:i:s', $value['starttime']); ?></td>
											<td class="countdown"><?= date('H:i:s m/d/Y', $value['endtime']); ?></td>
											<td><?= $this->session->userdata('login'); ?></td>
											<td id="<?= $value['phid']; ?>"><button type="button" class="btn btn-primary btn-listsend" id="btn-submit" data-toggle="modal" data-target="#listsend">Xem danh sách</button></td>
										</tr>
									<?php endforeach ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-12">
			<div class="row">
				<div class="panel panel-flat">
					<div class="panel-heading">
						<h5 class="panel-title">Lịch sử thành công</h5>
					</div>
					<div class="panel-body">
						<div class="table-responsive">
							<table class="table text-nowrap">
								<thead>
									<tr>
										<th class="col-md-2">Ngày đặt lệnh</th>
										<th class="col-md-2">Thời kết thúc</th>
										<th>Nguồn lệnh</th>
										<th class="col-md-2">Trạng thái</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>31/07/2016 09:24:02</td>
										<td>1/08/2016 09:24:02</td>
										<td>tailoc</td>
										<td>Đã thành công</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	<!-- Modal -->
		<div class="modal fade" id="listsend" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">
					<span aria-hidden="true">&times;</span>
					<span class="sr-only">Close</span>
				</button>
				<h4 class="modal-title" id="myModalLabel">Danh sách chuyển</h4>
			  </div>
			  <div class="modal-body">
				<div class="card green  summary-inline flat-item">
					<div class="card-body">
						<i class="icon fa fa-1x"></i>Người chuyển 1
						<div class="content">
							<div class="code">#132132</div>
						</div>
						<div class="clear-both"></div>
					</div>
				</div>
				<div class="list-send" id="content-alert2">
					<div class="table-responsive">
						<table class="table table-hover">
							<thead>
								<tr>
									<th>
										<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">	
										</div>
									</th>
									<th>
										<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">	
										</div>
									</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td><i class="icon fa icon-user-check fa-1x"> </i> ID người chuyển</td>
									<td>Tailoc</td>
								</tr>
								<tr>
									<td><i class="icon fa icon-user-check fa-1x"> </i> Tên người chuyển</td>
									<td>NGUYEN MANH THANG</td>
								</tr>
								<tr>
									<td><i class="icon fa icon-phone fa-1x"> </i> Số điện thoại</td>
									<td>0123456789</td>
								</tr>
								<tr>
									<td><i class="icon fa icon-mention fa-1x"> </i> Email</td>
									<td>rmail@gmail.com</td>
								</tr>
								<tr>
									<td><i class="icon fa icon-credit-card  fa-1x"> </i> Số tài khoản</td>
									<td>0011001515</td>
								</tr>
								<tr>
									<td><i class="icon fa fa-home fa-1x"> </i> Chi nhánh</td>
									<td>Hà Nội</td>
								</tr>
								<tr>
									<td><i class="icon fa icon-user-lock fa-1x"> </i> ID bảo trợ </td>
									<td>admin</td>
								</tr>
								<tr>
									<td><i class="icon fa icon-phone fa-1x"> </i> Số điện thoại bảo trợ </td>
									<td>0123456789</td>
								</tr>
								<tr>
									<td><i class="icon fa fa-usd fa-1x"> </i> Số tiền chuyển</td>
									<td>1,500,000</td>
								</tr>
								<tr>
									<td><i class="icon fa fa-times fa-1x"> </i> Thời gian còn lại</td>
									<td class="countdown"></td>
								</tr>
								<tr>
									<td><i class="icon fa fa-active fa-1x"> </i> Tình trạng</td>
									<td>Chưa chuyển</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
				<div class="text-center">
					<button type="button" class="btn btn-default card green" data-dismiss="modal" id="send">Đã nhận tiền</button>
					<button type="button" class="btn btn-default card green" data-dismiss="modal" id="send">Báo cáo</button>
				</div>
			  </div>
			  <div class="modal-body">
				<div class="card green  summary-inline flat-item">
					<div class="card-body">
						<i class="icon fa fa-1x"></i>Người chuyển 2
						<div class="content">
							<div class="code">#132133</div>
						</div>
						<div class="clear-both"></div>
					</div>
				</div>
				<div class="list-send" id="content-alert2">
					<div class="table-responsive">
						<table class="table table-hover">
							<thead>
								<tr>
									<th>
										<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">	
										</div>
									</th>
									<th>
										<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">	
										</div>
									</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td><i class="icon fa icon-user-check fa-1x"> </i> ID người chuyển</td>
									<td>Tailoc</td>
								</tr>
								<tr>
									<td><i class="icon fa icon-user-check fa-1x"> </i> Tên người chuyển</td>
									<td>NGUYEN MANH THANG</td>
								</tr>
								<tr>
									<td><i class="icon fa icon-phone fa-1x"> </i> Số điện thoại</td>
									<td>0123456789</td>
								</tr>
								<tr>
									<td><i class="icon fa icon-mention fa-1x"> </i> Email</td>
									<td>rmail@gmail.com</td>
								</tr>
								<tr>
									<td><i class="icon fa icon-credit-card  fa-1x"> </i> Số tài khoản</td>
									<td>0011001515</td>
								</tr>
								<tr>
									<td><i class="icon fa fa-home fa-1x"> </i> Chi nhánh</td>
									<td>Hà Nội</td>
								</tr>
								<tr>
									<td><i class="icon fa icon-user-lock fa-1x"> </i> ID bảo trợ </td>
									<td>admin</td>
								</tr>
								<tr>
									<td><i class="icon fa icon-phone fa-1x"> </i> Số điện thoại bảo trợ </td>
									<td>0123456789</td>
								</tr>
								<tr>
									<td><i class="icon fa fa-usd fa-1x"> </i> Số tiền chuyển</td>
									<td>1,500,000</td>
								</tr>
								<tr>
									<td><i class="icon fa fa-times fa-1x"> </i> Thời gian còn lại</td>
									<td>10 giờ 20 phút</td>
								</tr>
								<tr>
									<td><i class="icon fa fa-active fa-1x"> </i> Tình trạng</td>
									<td>Chưa chuyển</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
				<div class="text-center">
					<button type="button" class="btn btn-default card green" data-dismiss="modal" id="send">Đã nhận tiền</button>
					<button type="button" class="btn btn-default card green" data-dismiss="modal" id="send">Báo cáo</button>
				</div>
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal"><!--  -->OK</button>
			  </div> 
			</div>
		  </div>
		</div>
	</div>
</div>