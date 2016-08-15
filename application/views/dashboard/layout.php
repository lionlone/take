<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view('dashboard/tpl/head'); ?>
</head>
<body class="flat-blue">
	<div class="app-container">
		<div class="row content-container">
			<?php 
				$this->load->view('dashboard/tpl/header');
				$this->load->view('dashboard/tpl/sidebar', $sidebar);
				if (isset($main)) {
					if($main == 'look') {
						echo '<div class="side-body padding-top">';
						echo '<h6 style="color:red;">Chức năng này tạm khóa</h6></div>';
					} else {
						$this->load->view("dashboard/tpl/$main", $data_main);
					}
				} else {
					$this->load->view('dashboard/tpl/home', $data_main);
				}
			?>
		</div>
		<?php $this->load->view('dashboard/tpl/footer'); ?>
	</div>
	<!-- Javascript Libs -->
            <script type="text/javascript" src="<?= base_url() ?>public/dashboard/lib/js/jquery.min.js"></script>
            <script type="text/javascript" src="<?= base_url() ?>public/dashboard/lib/js/bootstrap.min.js"></script>
            <script type="text/javascript" src="<?= base_url() ?>public/dashboard/lib/js/Chart.min.js"></script>
            <script type="text/javascript" src="<?= base_url() ?>public/dashboard/lib/js/bootstrap-switch.min.js"></script>
            <script type="text/javascript" src="<?= base_url() ?>public/dashboard/lib/js/jquery.matchHeight-min.js"></script>
            <script type="text/javascript" src="<?= base_url() ?>public/dashboard/lib/js/jquery.dataTables.min.js"></script>
            <script type="text/javascript" src="<?= base_url() ?>public/dashboard/lib/js/dataTables.bootstrap.min.js"></script>
            <script type="text/javascript" src="<?= base_url() ?>public/dashboard/lib/js/select2.full.min.js"></script>
            <script type="text/javascript" src="<?= base_url() ?>public/dashboard/lib/js/ace/ace.js"></script>
            <script type="text/javascript" src="<?= base_url() ?>public/dashboard/lib/js/ace/mode-html.js"></script>
            <script type="text/javascript" src="<?= base_url() ?>public/dashboard/lib/js/ace/theme-github.js"></script>
            <script type="text/javascript" src="<?= base_url() ?>public/dashboard/lib/js/jquery-ui.js"></script>
            <script type="text/javascript" src="<?= base_url() ?>public/dashboard/lib/js/jquery.fancytree-all.js"></script>
            <script type="text/javascript" src="<?= base_url() ?>public/dashboard/lib/js/jquery.countdown.min.js"></script>
            <!-- Javascript -->
            <script type="text/javascript" src="<?= base_url() ?>public/dashboard/js/app.js"></script>
            <script type="text/javascript" src="<?= base_url() ?>public/dashboard/js/index.js"></script>
			<script type="text/javascript" src="<?= base_url() ?>public/dashboard/ckeditor/ckeditor.js"></script>
			<script type="text/javascript" src="<?= base_url() ?>public/dashboard/ckfinder/ckfinder.js"></script>
            <script type="text/javascript" src="<?= base_url() ?>public/dashboard/js/dashboard.js"></script>
			<script type="text/javascript" src="<?= base_url() ?>public/dashboard/js/ph.js"></script>
            <script>
            $(".tree-ajax").fancytree({
				source: [
					{title: "<span class='bg-primary text-highlight'><?= $sidebar['username']; ?></span> <span class='bg-info text-highlight'>Cấp: <?= $sidebar['level']; ?></span> <span class='bg-info text-highlight'>PH cá nhân:  0</span> <span class='bg-danger text-highlight'>Tổng PH hệ thống:  0</span> <a href='/member/profile'><span class='bg-warning text-highlight'>Thông tin chi tiết</span></a>", key: "<?= $sidebar['username']; ?>", lazy: true, iconclass: "icon-user"}
				],
				lazyLoad: function(event, data) {
					var node = data.node;
					data.result = {
						url: "/member/findchild",
						type: "post",
						data: {
							parent: node.key,
							level: node.getLevel()
						},
						cache: false
					};
				},
			});
			$('.countdown').each(function() {
				var $this = $(this), finalDate = $(this).html();
				$this.countdown(finalDate, function(event) {
					$this.html(event.strftime('%H giờ %M phút %S giây'));
				});
			});
            </script>
		</body>
</html>