								
																<div class="side-body padding-top">
									<div class="col-md-4">

<form id="form-signup" role="form">
										<input type="hidden" name="action" value="sign">
										<div class="text-center">
											<h5 class="content-group">Thông tin tài khoản
										</h5></div>
										<div class="form-group has-feedback has-feedback-left">
											<div class="form-group field-updateform-name required">
												<input type="text" id="updateform-name" class="form-control" name="form[username]" autofocus="" value="<?= $name; ?>" placeholder="Họ và tên" readonly="">
												<p class="help-block help-block-error"></p>
											</div>
											<div class="form-control-feedback">
												<i class="icon-user-check text-muted"></i>
											</div>
										</div>
										
										
										<div class="form-group has-feedback has-feedback-left">
											<div class="form-group field-updateform-phone required">
												<input type="text" id="updateform-phone" class="form-control" name="form[phone]" value="<?= $phone; ?>" autofocus="" placeholder="Số điện thoại">
												<p class="help-block help-block-error"></p>
											</div>
											<div class="form-control-feedback">
												<i class="icon-phone text-muted"></i>
											</div>
										</div>
										<div class="form-group has-feedback has-feedback-left">
											<div class="form-group field-updateform-email required">
												<input type="text" id="updateform-email" class="form-control" name="form[email]" value="<?= $email; ?>" autofocus="" placeholder="email@domain.com">
												<p class="help-block help-block-error"></p>
											</div>
											<div class="form-control-feedback">
												<i class="icon-mention text-muted"></i>
											</div>
										</div>
										<div class="form-group has-feedback has-feedback-left">
											<div class="form-group field-updateform-bank required">
												<input type="text" id="updateform-bank" class="form-control" name="form[bank]" value="<?= $bank; ?>" autofocus="" placeholder="Số tài khoản Vietcombank" readonly="">
												<p class="help-block help-block-error"></p>
											</div>
											<div class="form-control-feedback">
												<i class="icon-credit-card text-muted"></i>
											</div>
										</div>
										<div class="form-group has-feedback has-feedback-left">
											<div class="form-group field-updateform-branch required">
												<input type="text" id="updateform-branch" class="form-control" name="form[branch]" autofocus="" value="<?= $branch; ?>" placeholder="Chi nhánh">
												<p class="help-block help-block-error"></p>
											</div>
											<div class="form-control-feedback">
												<i class="icon-credit-card text-muted"></i>
											</div>
										</div>
										<div class="form-group has-feedback has-feedback-left">
											<div class="form-group field-updateform-refuser required">
												<input type="text" id="updateform-refuser" class="form-control" name="form[refUser]" value="<?= $referral; ?>" autofocus="" placeholder="Người giới thiệu" readonly="">
												<p class="help-block help-block-error"></p>
											</div>
											<div class="form-control-feedback">
												<i class="icon-user-check text-muted"></i>
											</div>
										</div>
										<div class="form-group has-feedback has-feedback-left">
											<div class="form-group field-updateform-pass2update required">
												<input type="password" id="updateform-pass2update" class="form-control" name="form[pass2]" value="" autofocus="" placeholder="Mật khẩu cấp 2">
												<p class="help-block help-block-error"></p>
											</div>
											<div class="form-control-feedback">
												<i class="icon-user-lock text-muted"></i>
											</div>
										</div>
										<div class="content-divider text-muted form-group"><span></span>
										</div>
										<button type="button" class="btn bg-indigo-400 btn-block" id="btn-update">Cập nhật <i class="icon-circle-right2 position-right"></i>
										</button>
									</form>
</div>										
								<div class="col-md-4">

<form id="form-signup" role="form">
										<input type="hidden" name="action" value="sign">
										<div class="text-center">
											<h5 class="content-group">Mật khẩu Cấp 1</h5></div>
										
										<div class="form-group has-feedback has-feedback-left">
											<div class="form-group field-updateform-password required">
												<input type="password" id="updateform-password" class="form-control" name="form[password]" autofocus="" placeholder="Mật khẩu cũ">
												<p class="help-block help-block-error"></p>
											</div>
											<div class="form-control-feedback">
												<i class="icon-user-lock text-muted"></i>
											</div>
										</div>
										<div class="form-group has-feedback has-feedback-left">
											<div class="form-group field-updateform-newpassword required">
												<input type="password" id="updateform-newpassword" class="form-control" name="form[password]" autofocus="" placeholder="Mật khẩu mới">
												<p class="help-block help-block-error"></p>
											</div>
											<div class="form-control-feedback">
												<i class="icon-user-lock text-muted"></i>
											</div>
										</div>
										<div class="form-group has-feedback has-feedback-left">
											<div class="form-group field-updateform-repassword required">
												<input type="password" id="updateform-repassword" class="form-control" name="form[repassword]" autofocus="" placeholder="Nhập lại mật khẩu mới">
												<p class="help-block help-block-error"></p>
											</div>
											<div class="form-control-feedback">
												<i class="icon-user-lock text-muted"></i>
											</div>
										</div>
										
										
										
										
										<div class="content-divider text-muted form-group"><span></span>
										</div>
										<button type="button" class="btn bg-indigo-400 btn-block" id="btn-update-password1">Đổi mật khẩu <i class="icon-circle-right2 position-right"></i>
										</button>
									</form>
</div>
								<div class="col-md-4">

<form id="form-signup" role="form">
										<input type="hidden" name="action" value="sign">
										<div class="text-center">
											<h5 class="content-group">Mật khẩu cấp 2</h5></div>
										
										<div class="form-group has-feedback has-feedback-left">
											<div class="form-group field-updateform-password2 required">
												<input type="password" id="updateform-password2" class="form-control" name="form[password]" autofocus="" placeholder="Mật khẩu cũ">
												<p class="help-block help-block-error"></p>
											</div>
											<div class="form-control-feedback">
												<i class="icon-user-lock text-muted"></i>
											</div>
										</div>
										<div class="form-group has-feedback has-feedback-left">
											<div class="form-group field-updateform-newpassword2 required">
												<input type="password" id="updateform-newpassword2" class="form-control" name="form[password2]" autofocus="" placeholder="Mật khẩu mới">
												<p class="help-block help-block-error"></p>
											</div>
											<div class="form-control-feedback">
												<i class="icon-user-lock text-muted"></i>
											</div>
										</div>
										<div class="form-group has-feedback has-feedback-left">
											<div class="form-group field-updateform-repassword2 required">
												<input type="password" id="updateform-repassword2" class="form-control" name="form[repassword2]" autofocus="" placeholder="Nhập lại mật khẩu mới">
												<p class="help-block help-block-error"></p>
											</div>
											<div class="form-control-feedback">
												<i class="icon-user-lock text-muted"></i>
											</div>
										</div>
											<a href="#recover2" id="recover-password2">Quên mật khẩu cấp 2</a>
										
										
										
										<div class="content-divider text-muted form-group"><span></span>
										</div>
										<button type="button" class="btn bg-indigo-400 btn-block" id="btn-update-password2">Đổi mật khẩu <i class="icon-circle-right2 position-right"></i>
										</button>
									</form>
</div>
								</div>
	