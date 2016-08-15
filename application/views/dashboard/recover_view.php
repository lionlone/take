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
							<div class="tab-content panel-body">
								<form id="form-recover-password" role="form">
										<div class="text-center">
											<h5 class="content-group">Khôi phục mật khẩu</h5>
										</div>
										<input type="hidden" id="recover-input1" value="<?= $username; ?>">
										<input type="hidden" id="recover-input2" value="<?= $password; ?>">
										<div class="form-group has-feedback has-feedback-left">
											<div class="form-group field-recover-newpassword required">
												<input type="password" id="recover-newpassword" class="form-control" name="form[password]" autofocus="" placeholder="Mật khẩu mới">
												<p class="help-block help-block-error"></p>
											</div>
											<div class="form-control-feedback">
												<i class="icon-user-lock text-muted"></i>
											</div>
										</div>
										<div class="form-group has-feedback has-feedback-left">
											<div class="form-group field-recover-repassword required">
												<input type="password" id="recover-repassword" class="form-control" name="form[repassword]" autofocus="" placeholder="Nhập lại mật khẩu mới">
												<p class="help-block help-block-error"></p>
											</div>
											<div class="form-control-feedback">
												<i class="icon-user-lock text-muted"></i>
											</div>
										</div>
										<div class="content-divider text-muted form-group"><span></span>
										</div>
										<button type="button" class="btn bg-indigo-400 btn-block" id="btn-recover-password">Đổi mật khẩu <i class="icon-circle-right2 position-right"></i>
										</button>
									</form>
							</div>
						</div>
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