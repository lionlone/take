<!-- Main Content -->
            <div class="container-fluid">
                <div class="side-body padding-top">
                    <!-- <div class="row  no-margin-bottom"> -->
						<div class="col-sm-12 col-xs-12 col-md-12">
							<div id="notice-index"><?= $notice; ?></div>
						</div>
                        <div class="col-sm-12 col-xs-12 col-md-8">
                            <div class="table-responsive">
                                <table class="table table-hover table-home">
                                    <thead>
                                        <tr>
                                            <th>
                                                <div class="card green summary-inline">
                                                    <div class="card-body text-center">
                                                        <span class="title-button">Mã A</span>
                                                        <div class="clear-both"></div>
                                                    </div>
                                                </div>
                                            </th>
                                            <th>
                                                <div class="card blue summary-inline">
                                                    <div class="card-body text-center">
                                                        <span class="title-button">Mã B</span>
                                                        <div class="clear-both"></div>
                                                    </div>
                                                </div>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <a href="#">
                                                    <div class="card green summary-inline">
                                                        <div class="card-body">
                                                             <ul>
                                                              	<li><h2>PH chờ : 0/3</h2></li>
                                                              	<li><h2>PH thành công: 0/3</h2></li>
                                                              </ul>
                                                        </div>
                                                    </div>
                                                </a>
                                                <a href="#">
                                                    <div class="card green summary-inline">
                                                        <div class="card-body">
                                                             <ul>
                                                              	<li><h2>GH chờ : 0/3</h2></li>
                                                              	<li><h2>GH thành công: 0/3</h2></li>
                                                              </ul>
                                                        </div>
                                                    </div>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="#">
                                                    <div class="card blue summary-inline">
                                                        <div class="card-body">
                                                             <ul>
                                                              	<li><h2>PH chờ : 0/3</h2></li>
                                                              	<li><h2>PH thành công: 0/3</h2></li>
                                                              </ul>
                                                        </div>
                                                    </div>
                                                </a>
                                                <a href="#">
                                                    <div class="card blue summary-inline">
                                                        <div class="card-body">
                                                             <ul>
                                                              	<li><h2>GH chờ : 0/3</h2></li>
                                                              	<li><h2>GH thành công: 0/3</h2></li>
                                                              </ul>
                                                        </div>
                                                    </div>
                                                </a>
                                            </td>
                                        </tr>
                                        
                                        <tr>
                                            <td>
                                                <a href="#">
                                                    <div class="card green summary-inline">
                                                        <div class="card-body text-center">
                                                            <span class="title-button">Kích PIN</span>
                                                        </div>
                                                    </div>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="#">
                                                    <div class="card blue summary-inline">
                                                        <div class="card-body text-center">
                                                            <span class="title-button">Chờ</span>
                                                        </div>
                                                    </div>
                                                </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- <div class="row">
                                <div class="col-md-6 col-sm-6 col-xs-6 col-lg-6">
                                    <div class="card primary">
                                        <div class="card dark summary-inline">
                                            <div class="card-body">
                                                <i class="icon fa-1x glyphicon glyphicon-open"></i>
                                                <h2>Mã A</h2>
                                                <div class="content">
                                                    <div class="title">2</div>
                                                    <div class="sub-title">Lệnh thành công <span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span></div>
                                                </div>
                                                <div class="clear-both"></div>
                                            </div>
                                        </div>
                                        <div class="card dark summary-inline">
                                            <div class="card-body">
                                                <i class="icon fa fa-ticket fa-4x"> PH</i>
                                                <div class="content">
                                                    <div class="title"><h2>Thành công <span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span></h2></div>
                                                    <div class="sub-title">Lệnh đang chờ</div>
                                                </div>
                                                <div class="clear-both"></div>
                                            </div>
                                        </div>
                                        <div class="card dark summary-inline">
                                            <div class="card-body">
                                                <i class="icon fa fa-ticket fa-2x"> PH</i>
                                                <div class="content">
                                                    <div class="title"> <h2>Thành công <span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span></h2></div>
                                                    <div class="sub-title">L</div>
                                                </div>
                                                <div class="clear-both"></div>
                                            </div>
                                        </div>
                                        <div class="card dark summary-inline">
                                            <div class="card-body">
                                                <i class="icon fa fa-ticket fa-2x"> PH</i>
                                                <div class="content">
                                                    <div class="title"> <h2>Đợi <span class="glyphicon glyphicon-ban-circle" aria-hidden="true"></span></h2></div>
                                                    <div class="sub-title">L</div>
                                                </div>
                                                <div class="clear-both"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-6 col-lg-6">
                                    <div class="card primary">
                                        <div class="card dark summary-inline">
                                            <div class="card-body">
                                                <i class="icon glyphicon glyphicon-save fa-2x"></i>
                                                <h2>Phòng cho (GH)</h2>
                                                <div class="content">
                                                    <div class="title">0</div>
                                                    <div class="sub-title">Lệnh thành công <span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></div>
                                                </div>
                                                <div class="clear-both"></div>
                                            </div>
                                        </div>
                                        <div class="card dark summary-inline">
                                            <div class="card-body">
                                                <i class="icon fa fa-lock fa-2x"> GH</i>
                                                <div class="content">
                                                    <div class="title">Kích PIN B1</div>                           <div class="sub-title">Lệnh đang chờ</div>
                                                </div>
                                                <div class="clear-both"></div>
                                            </div>
                                        </div>
                                        <div class="card dark summary-inline">
                                            <div class="card-body">
                                                <i class="icon fa fa-ticket fa-2x"> GH</i>
                                                <div class="content">
                                                    <a href=""><div class="title"><h2>Kích PIN <span class="glyphicon glyphicon-check" aria-hidden="true"></span></h2></div></a>
                                                    <div class="sub-title">Lệch chưa đặt</div>
                                                </div>
                                                <div class="clear-both"></div>
                                            </div>
                                        </div>
                                        <div class="card dark summary-inline">
                                            <div class="card-body">
                                                <i class="icon fa fa-ticket fa-2x"> GH</i>
                                                <div class="content">
                                                    <a href=""><div class="title"><h2>Đợi <span class="glyphicon glyphicon-ban-circle" aria-hidden="true"></span></h2></div></a>
                                                    <div class="sub-title">Lệch chưa đặt</div>
                                                </div>
                                                <div class="clear-both"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                    <!-- </div> -->
                        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                            <a href="#">
                                <div class="card red summary-inline flat-item">
                                    <div class="card-body">
                                        <i class="icon fa fa-usd fa-2x"></i>
                                        Tiền hoa hồng.
                                        <div class="content">
                                            <div class="title">0</div>
                                        </div>
                                        <div class="clear-both"></div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                            <a href="#">
                                <div class="card yellow summary-inline flat-item">
                                    <div class="card-body">
                                        <i class="icon fa fa-line-chart fa-2x"></i>
                                        Điểm thưởng.
                                        <div class="content">
                                            <div class="title">0</div>
                                        </div>
                                        <div class="clear-both"></div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                            <a href="<?= base_url(); ?>member/pin">
                                <div class="card green summary-inline flat-item">
                                    <div class="card-body">
                                        <i class="icon fa fa-key fa-2x"></i>
                                        Số PIN đang có.
                                        <div class="content">
                                            <div class="title"><?= $count_pin; ?></div>
                                        </div>
                                        <div class="clear-both"></div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                            <a href="<?= base_url(); ?>member/sitemap">
                                <div class="card blue summary-inline flat-item">
                                    <div class="card-body">
                                        <i class="icon fa fa-sitemap fa-2x"></i>
                                        Thành viên
                                        <div class="content">
                                            <div class="title"><?= $count_key; ?></div>
                                        </div>
                                        <div class="clear-both"></div>
                                    </div>
                                </div>
                            </a>
                        </div>
                </div>
            </div>