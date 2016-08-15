<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view('dashboard/tpl/head'); ?>
</head>
<body class="flat-blue login-page">
	<div class="container">
		<div class="login-box">
			<div>
				<div class="login-form row">
					<div class="col-sm-12 text-center login-header">
						<!-- <i class="login-logo fa fa-twitter fa-5x"></i> -->
						<div class="logo">
							<img src="<?= base_url(); ?>public/dashboard/img/takemove.png" alt="" style="max-height: 100px;">
						</div>
						<h4 class="login-title">Takemove.net</h4>
					</div>
					<div class="col-sm-12">
						<div class="tabbable panel login-form width-400">
							<ul class="nav nav-tabs nav-justified">
								<li class="active"><a href="#basic-tab1" data-toggle="tab" aria-expanded="false"><h6>Đăng nhập</h6></a>
								</li>
								<li><a href="#basic-tab2" data-toggle="tab" aria-expanded="true"><h6>Đăng ký</h6></a>
								</li>
							</ul>
							<div class="tab-content panel-body">
								<div class="tab-pane fade active in" id="basic-tab1">
									<form id="login-form" action="/login/ckeck_login" method="post" role="form">
										<input type="hidden" name="" value="">
										<div class="text-center">
											<h5 class="content-group">Đăng nhập vào tài khoản của bạn<br /></h5>
										</div>
										<div class="form-group has-feedback has-feedback-left">
											<div class="form-group field-loginform-username required has-success">
												<input type="text" id="loginform-username" class="form-control" name="username" autofocus="" placeholder="Tài khoản">
												<p class="help-block help-block-error"></p>
											</div>
											<div class="form-control-feedback">
												<i class="icon-user text-muted"></i>
											</div>
										</div>
										<div class="form-group has-feedback has-feedback-left">
											<div class="form-group field-loginform-password required has-success">
												<input type="password" id="loginform-password" class="form-control" name="password" autofocus="" placeholder="Mật khẩu">
												<p class="help-block help-block-error"></p>
											</div>
											<div class="form-control-feedback">
												<i class="icon-lock2 text-muted"></i>
											</div>
										</div>
										<div class="form-group login-options">
											<div class="row">
												<div class="col-sm-6">
													<label class="checkbox-inline">
														<input type="checkbox" name="LoginForm[rememberMe]" class="styled" value="1" checked="checked"> Ghi nhớ
													</label>
												</div>
												<div class="col-sm-6 text-right">
													<a href="#recover" id="recover-password">Quên mật khẩu?</a>
												</div>
											</div>
										</div>
										<div class="form-group">
											<button type="submit" class="btn bg-blue btn-block" id="btn-signin">Đăng nhập <i class="icon-arrow-right14 position-right"></i>
											</button>
										</div>
									</form>
									<span class="help-block text-center no-margin">Bằng cách tiếp tục, bạn xác nhận rằng bạn đã đọc <a href="#" style="color: #08A7FF;">Điều khoản & Điều kiện</a> và <a href="#" style="color: #08A7FF;"> Chính sách Cookie</a> của chúng tôi</span>
								</div>
								<div class="tab-pane fade " id="basic-tab2">
									<form id="form-signup" role="form">
										<input type="hidden" name="action" value="sign">
										<div class="text-center">
											<h5 class="content-group">Đăng ký tài khoản
											<br /><small class="display-block"></small></h5>
										</div>
										<div class="error-summary" style="display:none">
											<p>Vui lòng kiểm tra lỗi:</p>
											<ul></ul>
										</div>
										<div class="form-group has-feedback has-feedback-left">
											<div class="form-group field-signupform-username required">
												<input type="text" id="signupform-username" class="form-control" name="sign[username]" autofocus="" placeholder="Tài khoản">
												<p class="help-block help-block-error"></p>
											</div>
											<div class="form-control-feedback">
												<i class="icon-user-check text-muted"></i>
											</div>
										</div>
										<div class="form-group has-feedback has-feedback-left">
											<div class="form-group field-signupform-password required">
												<input type="password" id="signupform-password" class="form-control" name="sign[password]" autofocus="" placeholder="Mật khẩu">
												<p class="help-block help-block-error"></p>
											</div>
											<div class="form-control-feedback">
												<i class="icon-user-lock text-muted"></i>
											</div>
										</div>
										<div class="form-group has-feedback has-feedback-left">
											<div class="form-group field-signupform-repassword required">
												<input type="password" id="signupform-repassword" class="form-control" name="sign[repassword]" autofocus="" placeholder="Nhập lại mật khẩu">
												<p class="help-block help-block-error"></p>
											</div>
											<div class="form-control-feedback">
												<i class="icon-user-lock text-muted"></i>
											</div>
										</div>
																				<div class="form-group has-feedback has-feedback-left">
											<div class="form-group field-signupform-password2 required">
												<input type="password" id="signupform-password2" class="form-control" name="sign[password]" autofocus="" placeholder="Mật khẩu cấp 2">
												<p class="help-block help-block-error"></p>
											</div>
											<div class="form-control-feedback">
												<i class="icon-user-lock text-muted"></i>
											</div>
										</div>
										<div class="form-group has-feedback has-feedback-left">
											<div class="form-group field-signupform-repassword2 required">
												<input type="password" id="signupform-repassword2" class="form-control" name="sign[repassword]" autofocus="" placeholder="Nhập lại mật khẩu cấp 2">
												<p class="help-block help-block-error"></p>
											</div>
											<div class="form-control-feedback">
												<i class="icon-user-lock text-muted"></i>
											</div>
										</div>
										<div class="form-group has-feedback has-feedback-left">
											<div class="form-group field-signupform-phone required">
												<input type="text" id="signupform-phone" class="form-control" name="sign[phone]" autofocus="" placeholder="Nhập số điện thoại của bạn">
												<p class="help-block help-block-error"></p>
											</div>
											<div class="form-control-feedback">
												<i class="icon-phone text-muted"></i>
											</div>
										</div>
										<div class="form-group has-feedback has-feedback-left">
											<div class="form-group field-signupform-email required">
												<input type="text" id="signupform-email" class="form-control" name="sign[email]" autofocus="" placeholder="Nhập Email của bạn">
												<p class="help-block help-block-error"></p>
											</div>
											<div class="form-control-feedback">
												<i class="icon-mention text-muted"></i>
											</div>
										</div>
										<div class="form-group has-feedback has-feedback-left">
											<div class="form-group field-signupform-bank required">
												<input type="text" id="signupform-bank" class="form-control" name="sign[bank]" value="" autofocus="" placeholder="Số tài khoản Vietcombank">
												<p class="help-block help-block-error"></p>
											</div>
											<div class="form-control-feedback">
												<i class="icon-credit-card text-muted"></i>
											</div>
										</div>
										<div class="form-group has-feedback has-feedback-left">
											<div class="form-group field-signupform-bankname required">
												<input type="text" id="signupform-bankname" class="form-control" name="sign[bankname]" value="" autofocus="" placeholder="Tên tài khoản Vietcombank" readonly>
												<p class="help-block help-block-error"></p>
											</div>
											<div class="form-control-feedback">
												<i class="icon-credit-card text-muted"></i>
											</div>
										</div>
										<div class="form-group has-feedback has-feedback-left">
											<div class="form-group field-signupform-branch required">
												<input type="text" id="signupform-branch" class="form-control" name="sign[branch]" value="" autofocus="" placeholder="Tên chi nhánh">
												<p class="help-block help-block-error"></p>
											</div>
											<div class="form-control-feedback">
												<i class="icon-credit-card text-muted"></i>
											</div>
										</div>
										<div class="form-group has-feedback has-feedback-left">
											<div class="form-group field-signupform-refuser required">
												<input type="text" id="signupform-refuser" class="form-control" name="sign[refUser]" value="" autofocus="" placeholder="Người giới thiệu">
												<p class="help-block help-block-error"></p>
											</div>
											<div class="form-control-feedback">
												<i class="icon-user-check text-muted"></i>
											</div>
										</div>
										<div class="content-divider text-muted form-group"><span></span>
										</div>
										<div class="form-group">
											<div class="checkbox">
												<label>
													<input type="checkbox" class="styled" id="accept-sign"> Chấp nhận <a href="#" style="color: #08A7FF;">điều khoản dịch vụ</a>
												</label>
											</div>
										</div>
										<button type="button" class="btn bg-indigo-400 btn-block" id="btn-signup">Đăng ký <i class="icon-circle-right2 position-right"></i>
										</button>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="modal fade" id="recoverModal" tabindex="-1" role="dialog" aria-labelledby="myInfo" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">
							<span aria-hidden="true">&times;</span>
							<span class="sr-only">Thoát</span>
					</button>
					<h4 class="modal-title" id="myInfo">Quên mật khẩu</h4>
				</div>
				<div class="modal-body">
					<form id="recover-form" class="form-horizontal" role="form">
						<div class="form-group">
							<label for="recover-username" class="col-md-4 control-label">Tài khoản</label>
							<div class="col-md-7">
								<input type="text" class="form-control" id="recover-username" placeholder="Tài khoản">
								<p class="help-block help-block-error"></p>
							</div>
						</div>
						<div class="form-group">
							<label for="recover-email" class="col-md-4 control-label">Email</label>
							<div class="col-md-7">
								<input type="text" class="form-control" id="recover-email" placeholder="Địa chỉ Email">
								<p class="help-block help-block-error"></p>
							</div>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Thoát</button>
					<button type="button" class="btn btn-primary" id="btn-recover-info"><span class="glyphicon glyphicon-repeat" aria-hidden="true"></span> Khôi phục</button>
				</div>
			</div>
		</div>
	</div>

	</div>
	<!-- Javascript Libs -->
	<script type="text/javascript" src="<?= base_url('') ?>/public/dashboard/lib/js/jquery.min.js"></script>
	<script type="text/javascript" src="<?= base_url('') ?>/public/dashboard/lib/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?= base_url('') ?>/public/dashboard/lib/js/Chart.min.js"></script>
	<script type="text/javascript" src="<?= base_url('') ?>/public/dashboard/lib/js/bootstrap-switch.min.js"></script>
	<script type="text/javascript" src="<?= base_url('') ?>/public/dashboard/lib/js/jquery.matchHeight-min.js"></script>
	<script type="text/javascript" src="<?= base_url('') ?>/public/dashboard/lib/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="<?= base_url('') ?>/public/dashboard/lib/js/dataTables.bootstrap.min.js"></script>
	<script type="text/javascript" src="<?= base_url('') ?>/public/dashboard/lib/js/select2.full.min.js"></script>
	<script type="text/javascript" src="<?= base_url('') ?>/public/dashboard/lib/js/ace/ace.js"></script>
	<script type="text/javascript" src="<?= base_url('') ?>/public/dashboard/lib/js/ace/mode-html.js"></script>
	<script type="text/javascript" src="<?= base_url('') ?>/public/dashboard/lib/js/ace/theme-github.js"></script>
	<!-- Javascript -->
	<script type="text/javascript" src="<?= base_url('') ?>/public/dashboard/js/app.js"></script>
	<script type="text/javascript" src="<?= base_url('') ?>/public/dashboard/js/index.js"></script>
	<script type="text/javascript" src="<?= base_url('') ?>/public/dashboard/js/login.js"></script>
</body>
</html>