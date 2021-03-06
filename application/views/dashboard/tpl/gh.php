<div class="side-body padding-top">
  <div class="row">
    <h1 class="text-center fa-5x"><?php // echo $room; ?></h1>
		<div class="col-lg-12">
			<div class="row">
				<div class="panel panel-flat">
					<div class="panel-heading">
						<h5 class="panel-title">Chờ GH</h5>
					</div>
					<div class="panel-body">
						<div class="table-responsive">
							<table class="table text-nowrap">
								<thead>
									<tr>
										
										<th class="col-md-2">Ngày bắt đầu</th>
										<th class="col-md-2">Thời gian chờ</th>
										<th class="col-md-2">Tổng tiền</th>
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
										<th class="col-md-2">Tổng tiền</th>
										<th>Nguồn lệnh</th>
										<th class="col-md-2">Danh sách nhận</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($join as $key => $value): ?>
										<tr>
											<td><?= date('d/m/Y', $value['starttime']); ?></td>
											<td> <?= $value['profit']*3; ?></td>
											<td><?= $this->session->userdata('login'); ?></td>
											<td>
											<button type="button" class="btn btn-primary btn-list-send-ph" value="<?= $value['ghid']; ?>" id="btn-submit" data-toggle="modal">Xem danh sách</button></td>
											
											
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
						<h5 class="panel-title">GH thành công</h5>
					</div>
					<div class="panel-body">
						<div class="table-responsive">
							<table class="table text-nowrap">
								<thead>
									<tr>
										
										<th class="col-md-2">Ngày đặt lệnh</th>
										<th class="col-md-2">Ngày kết thúc</th>
										<th>Nguồn Lệnh</th>
										<th class="col-md-2">Trạng thái</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($historyGH as $key => $value): ?>
										<tr>
											<td><?= date('d/m/Y ', $value['starttime']); ?></td>
											<td><?= date('d/m/Y ', $value['endtime']); ?></td>
											<td><?= $this->session->userdata('login'); ?></td>
											<td>
											<button type="button" class="btn btn-primary btn-list-send-ph" value="<?= $value['ghid']; ?>" id="btn-submit" data-toggle="modal">Xem danh sách</button></td>
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
		<div class="modal fade" id="list-send" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">
					<span aria-hidden="true">&times;</span>
					<span class="sr-only">Close</span>
				</button>
				<h4 class="modal-title" id="myModalLabel">Danh sách nhận</h4>
			  </div>
			  <div class="modal-body">
				<div class="card green  summary-inline flat-item">
					<div class="card-body">
						<i class="icon fa fa-1x"></i>Người chuyển 1
						<div class="content">
							<div class="code" id="code1">#</div>
						</div>
						<div class="clear-both"></div>
					</div>
				</div>
				<div class="list-send" id="content-alert1">
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
									<td id="user1"></td>
								</tr>
								<tr>
									<td><i class="icon fa icon-user-check fa-1x"> </i> Tên người chuyển</td>
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
									<td><i class="icon fa fa-usd fa-1x"> </i> Số tiền nhận</td>
									<td id="profit1"></td>
								</tr>
								<tr>
									<td><i class="icon glyphicon glyphicon-time fa-1x"> </i> Thời gian còn lại</td>
									<td id="countdown1"></td>
								</tr>
								<tr>
									<td><i class="icon fa fa-active fa-1x"> </i> Tình trạng</td>
									<td id="status1">Đợi</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
				<div class="text-center">
					<button type="button" class="btn btn-default card green btn-sent-gh" id="send1" style="display:none;">Đã nhận tiền</button>
					<button type="button" class="btn btn-default card green btn-report-gh" id="report1" style="display:none;">Báo cáo</button>
					<div class="col-md-12" id="image1"></div>
				</div>
				<div class="card green  summary-inline flat-item">
					<div class="card-body">
						<i class="icon fa fa-1x"></i>Người chuyển 2
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
									<td><i class="icon fa icon-user-check fa-1x"> </i> ID người chuyển</td>
									<td id="user2"></td>
								</tr>
								<tr>
									<td><i class="icon fa icon-user-check fa-1x"> </i> Tên người chuyển</td>
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
									<td><i class="icon fa fa-usd fa-1x"> </i> Số tiền</td>
									<td id="profit2"></td>
								</tr>
								<tr>
									<td><i class="icon glyphicon glyphicon-time fa-1x"> </i> Thời gian còn lại</td>
									<td id="countdown2"></td>
								</tr>
								<tr>
									<td><i class="icon fa fa-active fa-1x"> </i> Tình trạng</td>
									<td id="status2">Đợi</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
				<div class="text-center">
					<button type="button" class="btn btn-default card green btn-sent-gh" id="send2" style="display:none;">Đã nhận tiền</button>
					<button type="button" class="btn btn-default card green btn-report-gh" id="report2" style="display:none;">Báo cáo</button>
					<div class="col-md-12" id="image2"></div>
				</div>
				<div class="card green  summary-inline flat-item">
					<div class="card-body">
						<i class="icon fa fa-1x"></i>Người chuyển 3
						<div class="content">
							<div class="code" id="code3">#</div>
						</div>
						<div class="clear-both"></div>
					</div>
				</div>
				<div class="list-send" id="content-alert3">
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
									<td id="user3"></td>
								</tr>
								<tr>
									<td><i class="icon fa icon-user-check fa-1x"> </i> Tên người chuyển</td>
									<td id="name3"></td>
								</tr>
								<tr>
									<td><i class="icon fa icon-phone fa-1x"> </i> Số điện thoại</td>
									<td id="phone3"></td>
								</tr>
								<tr>
									<td><i class="icon fa icon-mention fa-1x"> </i> Email</td>
									<td id="email3"></td>
								</tr>
								<tr>
									<td><i class="icon fa icon-credit-card  fa-1x"> </i> Số tài khoản</td>
									<td id="bank3"></td>
								</tr>
								<tr>
									<td><i class="icon fa fa-home fa-1x"> </i> Chi nhánh</td>
									<td id="branch3"></td>
								</tr>
								<tr>
									<td><i class="icon fa icon-user-lock fa-1x"> </i> Người bảo trợ </td>
									<td id="ref_user3"></td>
								</tr>
								<tr>
									<td><i class="icon fa icon-phone fa-1x"> </i> Số điện thoại bảo trợ </td>
									<td id="ref_phone3"></td>
								</tr>
								<tr>
									<td><i class="icon fa fa-usd fa-1x"> </i> Số tiền</td>
									<td id="profit3"></td>
								</tr>
								<tr>
									<td><i class="icon glyphicon glyphicon-time fa-1x"> </i> Thời gian còn lại</td>
									<td id="countdown3"></td>
								</tr>
								<tr>
									<td><i class="icon fa fa-active fa-1x"> </i> Tình trạng</td>
									<td id="status3">Đợi</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
				<div class="text-center">
					<button type="button" class="btn btn-default card green btn-sent-gh" id="send3" style="display:none;">Đã nhận tiền</button>
					<button type="button" class="btn btn-default card green btn-report-gh" id="report3" style="display:none;">Báo cáo</button>
					<div class="col-md-12" id="image3"></div>
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