            <div class="side-menu sidebar-inverse">
                <nav class="navbar navbar-default" role="navigation">
                    <div class="side-menu-container">
                        <div class="navbar-header">
                            <a class="navbar-brand" href="<?= base_url(); ?>">
                               <!--  <div class="icon fa fa-paper-plane"></div> -->
                                <!-- <div class="icon fa fa-twitter"></div> -->
                                <div class="icon fa"><img src="<?= base_url(); ?>public/dashboard/img/takemove.png" alt="" style="max-width: 40px;margin-left: 5px;" ></div>
                                <div class="title">TakeMove</div>
                            </a>
                            <button type="button" class="navbar-expand-toggle pull-right visible-xs">
                                <i class="fa fa-times icon"></i>
                            </button>
                        </div>
                        <ul class="nav navbar-nav">
                            <li class="active">
                                <a href="#">
                                    <span class="icon fa fa-tachometer"></span><span class="title"><?= $username; ?> - Cấp <?= $level; ?></span>
                                </a>
                            </li>
                            <li>
                                <a href="<?= base_url(); ?>">
                                    <span class="icon fa fa-home"></span><span class="title">Trang chủ</span>
                                </a>
                            </li>
                            <li class="panel panel-default dropdown">
                                <a data-toggle="collapse" href="#ph">
                                    <span class="icon glyphicon glyphicon-open"></span><span class="title"> Phòng cho (PH)</span>
                                </a>
                                <!-- Dropdown level 1 -->
                                 <div id="ph" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <ul class="nav navbar-nav">
                                            <li><a href="<?= base_url(); ?>member/pha"><span class="icon fa fa-code"></span><span class="title">Mã A</span></a>
                                            </li>
                                            <li><a href="<?= base_url(); ?>member/phb"><span class="icon fa fa-code"></span><span class="title">Mã B</span></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li class="">
                                <a href="<?= base_url(); ?>member/gha">
                                    <span class="icon glyphicon glyphicon-save"></span><span class="title">Phòng nhận (GH)</span>
                                </a>
                                <!-- Dropdown level 1 -->
                                <!-- <div id="gh" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <ul class="nav navbar-nav">
                                            <li><a href=""><span class="icon fa fa-code"></span><span class="title">Mã A</span></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div> -->
                            </li>
                            <li>
                                <a href="<?= base_url(); ?>member/interest">
                                    <span class="icon fa fa-usd"></span><span class="title">Hoa hồng hệ thống</span>
                                </a>
                                <!-- Dropdown level 1 -->
                                <!-- <div id="dropdown-form" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <ul class="nav navbar-nav">
                                            <li><a href="form/ui-kits.html">Form UI Kits</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div> -->
                            </li>
                            <!-- Dropdown-->
                            <li>
                                <a href="<?= base_url(); ?>member/compensate">
                                    <span class="icon fa fa-line-chart"></span><span class="title">Điểm thưởng</span>
                                </a>
                                <!-- Dropdown level 1 -->
                                <!-- <div id="component-example" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <ul class="nav navbar-nav">
                                            <li><a href="components/pricing-table.html">Pricing Table</a>
                                            </li>
                                            <li><a href="components/chartjs.html">Chart.JS</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div> -->
                            </li>
                            <!-- Dropdown-->
                            <li>
                                <a href="<?= base_url(); ?>member/pin">
                                    <span class="icon fa fa-key"></span><span class="title">PIN</span>
                                </a>
                                <!-- Dropdown level 1 -->
                                <!-- <div id="dropdown-example" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <ul class="nav navbar-nav">
                                            <li><a href="pages/login.html">Login</a>
                                            </li>
                                            <li><a href="pages/index.html">Landing Page</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div> -->
                            </li>
                            <!-- Dropdown-->
                            <li>
                                <a href="<?= base_url(); ?>member/profile">
                                    <span class="icon fa fa-user"></span><span class="title">  Thông tin cá nhân</span>
                                </a>
                                <!-- Dropdown level 1 -->
                                <!-- <div id="dropdown-icon" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <ul class="nav navbar-nav">
                                            <li><a href="icons/glyphicons.html">Glyphicons</a>
                                            </li>
                                            <li><a href="icons/font-awesome.html">Font Awesomes</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div> -->
                            </li>
                            <li>
                                <a href="<?= base_url(); ?>member/sitemap">
                                    <span class="icon fa fa-sitemap"></span><span class="title">Hệ thống</span>
                                </a>
                            </li>
							<li>
                                <a href="<?= base_url(); ?>member/policy">
                                    <span class="icon fa fa-book"></span><span class="title">Hướng dẫn và Chính sách </span>
                                </a>
                            </li>
                            <!--<li>
                                 <a data-toggle="collapse" href="#dropdown-accout">
                                    <span class="icon fa fa-archive"></span><span class="title">Chyển tài khoản</span>
                                </a> -->
                                <!-- Dropdown level 1 -->
                               <!--  <div id="dropdown-accout" class="panel-collapse collapse">
                                   <div class="panel-body">
                                       <ul class="nav navbar-nav">
                                           <li><a href="icons/glyphicons.html">Tài khoản A</a>
                                           </li>
                                           <li><a href="icons/font-awesome.html">Tài khoản B</a>
                                           </li>
                                       </ul>
                                   </div>
                               </div>
                            </li> -->
<?php if ($this->session->userdata('admin') == "1"): ?>
    <li class="panel panel-default dropdown">
        <a data-toggle="collapse" href="#administrator">
            <span class="icon fa fa-user-secret"></span><span class="title">Quản trị</span>
        </a>
        <div id="administrator" class="panel-collapse collapse">
            <div class="panel-body">
                <ul class="nav navbar-nav">
                    <li><a href="<?= base_url(); ?>member/notice"><span class="icon fa fa-bell"></span><span class="title">Quản lý thông báo</span></a>
                    </li>
                    <li><a href="<?= base_url(); ?>member/pedit"><span class="icon fa fa-book"></span><span class="title">Quản lý chính sách</span></a>
                    </li>
                    <li><a href="<?= base_url(); ?>member/config"><span class="icon fa fa-wrench"></span><span class="title">Cấu hình</span></a>
                    </li>
                </ul>
            </div>
        </div>
    </li>
<?php endif ?>

                            <li>
                                <a href="<?= base_url(); ?>member/support">
                                    <span class="icon fa fa-support"></span><span class="title">Hỗ trợ</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?= base_url(); ?>login/logout">
                                    <span class="icon fa fa-sign-out"></span><span class="title">Thoát</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.navbar-collapse -->
                </nav>
            </div>