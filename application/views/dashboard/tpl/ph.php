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
						<form id="add-new-ph" role="form">
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
										<th>Ngày bắt đầu</th>
										<th>Thời gian chờ</th>
										<th>Lợi nhuận</th>
										<th>Nguồn lệnh</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($wait as $key => $value): ?>
										<tr>
											<td class="col-md-2"><?= date('d/m/Y', $value['starttime']); ?></td>
											<td class="countdown"><?= date('H:i:s m/d/Y', $value['endtime']); ?></td>
											<td class="col-md-2"><?= $value['profit']; ?></td>
											<td class="col-md-2"><?= $this->session->userdata('login'); ?></td>
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
						<h5 class="panel-title">Khớp lệnh PH</h5>
					</div>
					<div class="panel-body">
						<div class="table-responsive">
							<table class="table text-nowrap">
								<thead>
									<tr>
										<th class="col-md-2">Ngày khớp lệnh</th>
										<!-- <th class="col-md-2">Thời gian thực hiện</th> -->
										<th>Số tiền</th>
										<th>Nguồn lệnh</th>
										<th class="col-md-2">Danh sách chuyển</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($join as $key => $value): ?>
										<tr>
											<td class="col-md-2"><?= date('d/m/Y', $value['starttime']); ?></td>
											<td class="col-md-2"><?= $value['profit']*2; ?></td>
											<td class="col-md-2"><?= $this->session->userdata('login'); ?></td>
											<td class="col-md-2"><button type="button" class="btn btn-primary btn-list-receive-ph" value="<?= $value['phid']; ?>" id="btn-submit" data-toggle="modal">Xem danh sách</button></td>
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
						<h5 class="panel-title">PH thành công</h5>
					</div>
					<div class="panel-body">
						<div class="table-responsive">
							<table class="table text-nowrap">
								<thead>
									<tr>
										<th class="col-md-2">Ngày đặt lệnh</th>
										<th class="col-md-2">Ngày kết thúc</th>
										<th class="col-md-2">Nguồn lệnh</th>
										<th class="col-md-2">Danh sách chuyển</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($historyPH as $key => $value): ?>
										<tr>
											<td><?= date('d/m/Y', $value['starttime']); ?></td>
											<td><?= date('d/m/Y', $value['endtime']); ?></td>
											<td><?= $value['username']; ?> 
											<?php if ($value['levelkey'] == 1): ?>
												<a href="<?= base_url(); ?>/member/unlook/<?= $value['idsource']; ?>/<?= $value['phid']; ?>/<?= $room; ?>" class="btn btn-primary ">Mở khóa</a>
											<?php endif ?>
											</td>
											<td><button type="button" class="btn btn-primary btn-list-receive-ph" value="<?= $value['phid']; ?>" id="btn-submit" data-toggle="modal">Xem danh sách</button></td>
										</tr>
									<?php endforeach ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	<!-- Modal -->
		<div class="modal fade" id="list-receive" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
						<i class="icon fa fa-1x"></i>Người nhận 1
						<div class="content">
							<div class="code" id="code1">#</div>
						</div>
						<div class="clear-both"></div>
					</div>
				</div>
				<div class="list-receive" id="content-alert2">
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
									<td><i class="icon fa icon-user-check fa-1x"> </i> ID người nhận</td>
									<td id="user1"></td>
								</tr>
								<tr>
									<td><i class="icon fa icon-user-check fa-1x"> </i> Tên người nhận</td>
									<td id="name1"></td>
								</tr>
								<tr>
									<td><i class="icon fa icon-phone fa-1x"> </i> Số điện thoại</td>
									<td id="phone1"></td>
								</tr>
								<tr>
									<td><i class="icon fa icon-mention fa-1x"> </i> Email</td>
									<td id="email1"></td>
								</tr>
								<tr>
									<td><i class="icon fa icon-credit-card  fa-1x"> </i> Số tài khoản</td>
									<td id="bank1"></td>
								</tr>
								<tr>
									<td><i class="icon fa fa-home fa-1x"> </i> Chi nhánh</td>
									<td id="branch1"></td>
								</tr>
								<tr>
									<td><i class="icon fa icon-user-lock fa-1x"> </i> Người bảo trợ </td>
									<td id="ref_user1"></td>
								</tr>
								<tr>
									<td><i class="icon fa icon-phone fa-1x"> </i> Số điện thoại bảo trợ </td>
									<td id="ref_phone1"></td>
								</tr>
								<tr>
									<td><i class="icon fa fa-usd fa-1x"> </i> Số tiền </td>
									<td id="profit1"></td>
								</tr>
								<tr>
									<td><i class="icon glyphicon glyphicon-time fa-1x"> </i> Thời gian còn lại</td>
									<td id="countdown1"></td>
								</tr>
								<tr>
									<td><i class="icon fa fa-active fa-1x"> </i> Tình trạng</td>
									<td id="status1"></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
				<div class="text-center">
					<button type="button" class="btn btn-default card green btn-sent-ph" id="send1">Đã gửi tiền</button>
					<span class="btn btn-default card green fileinput-button" id="upanh1" style="display:none;">
						<span>Up ảnh</span>
						<input id="btn-upanh-1" type="file" name="files[]" accept="image/*">
					</span>
					<div class="col-md-12" id="image1">
						<div class="progress-bar progress-bar-success" style="display:none;"></div>
					</div>
				</div>
				<div class="card green  summary-inline flat-item">
					<div class="card-body">
						<i class="icon fa fa-1x"></i>Người nhận 2
						<div class="content">
							<div class="code" id="code2">#</div>
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
									<td><i class="icon fa icon-user-check fa-1x"> </i> ID người nhận</td>
									<td id="user2"></td>
								</tr>
								<tr>
									<td><i class="icon fa icon-user-check fa-1x"> </i> Tên người nhận</td>
									<td id="name2"></td>
								</tr>
								<tr>
									<td><i class="icon fa icon-phone fa-1x"> </i> Số điện thoại</td>
									<td id="phone2"></td>
								</tr>
								<tr>
									<td><i class="icon fa icon-mention fa-1x"> </i> Email</td>
									<td id="email2"></td>
								</tr>
								<tr>
									<td><i class="icon fa icon-credit-card  fa-1x"> </i> Số tài khoản</td>
									<td id="bank2"></td>
								</tr>
								<tr>
									<td><i class="icon fa fa-home fa-1x"> </i> Chi nhánh</td>
									<td id="branch2"></td>
								</tr>
								<tr>
									<td><i class="icon fa icon-user-lock fa-1x"> </i> Người bảo trợ </td>
									<td id="ref_user2"></td>
								</tr>
								<tr>
									<td><i class="icon fa icon-phone fa-1x"> </i> Số điện thoại bảo trợ </td>
									<td id="ref_phone2"></td>
								</tr>
								<tr>
									<td><i class="icon fa fa-usd fa-1x"> </i> Số tiền </td>
									<td id="profit2"></td>
								</tr>
								<tr>
									<td><i class="icon glyphicon glyphicon-time fa-1x"> </i> Thời gian còn lại</td>
									<td id="countdown2"></td>
								</tr>
								<tr>
									<td><i class="icon fa fa-active fa-1x"> </i> Tình trạng</td>
									<td id="status2"></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
				<div class="text-center">
					<button type="button" class="btn btn-default card green btn-sent-ph" id="send2">Đã gửi tiền</button>
					<span class="btn btn-default card green fileinput-button" id="upanh2" style="display:none;">
						<span>Up ảnh</span>
						<input id="btn-upanh-2" type="file" name="files[]" accept="image/*">
					</span>
					<div class="col-md-12" id="image2">
						<div class="progress-bar progress-bar-success" style="display:none;"></div>
					</div>
				</div>
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">OK</button>
			  </div> 
			</div>
		  </div>
		</div>
	</div>
</div>