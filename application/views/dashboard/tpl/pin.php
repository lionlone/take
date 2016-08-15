<div class="side-body padding-top">
<div class="col-lg-12">
	<div class="row">
		<div class="main-product-tab">
		    <ul class="nav nav-tabs nav-tabs-highlight nav-justified">
		    	<li ><a data-toggle="tab" title="Mua PIN" href="#buypin" aria-expanded="true">Mua PIN</a></li>
		    	<li class="active"><a data-toggle="tab" title="Chuyển PIN" href="#transferpin">Chuyển PIN</a></li>
		    </ul>
		    <div class="tab-content">
			    <div id="buypin" class="tab-pane fade">
			    	<!-- <form action="" method="POST" role="form">
			    		<legend>Chuyển PIN</legend>
			    	
			    		<div class="form-group">
			    			<label for="">Số PIN</label>
			    			<input type="text" class="form-control" id="" placeholder="Min: 1">
			    		</div>
			    	
			    		
			    	
			    		<button type="submit" class="btn btn-primary">Mua PIN</button>
			    	</form> -->
			    	<h6 style="color:red;">Chức năng này tạm khóa</h6>
			    </div>
			    <div id="transferpin" class="tab-pane fade active in">
			    	<form role="form">
			    		<!-- <legend>Chuyển PIN</legend> -->
			    		<input type="text" class="hidden" name="transferpin" value="transferpin">
			    		<div class="form-group">
			    			<label for="">Số PIN</label>
			    			<input type="number" class="form-control" id="pin" name="pin" min="1" placeholder="Min: 1">
			    			<h6 class="text-info">Số PIN hiện tại: <?php echo $count_pin; ?></h6>
			    		</div>

			    		<div class="form-group">
			    			<label for="">ID người nhận</label>
			    			<input type="text" class="form-control" id="touser" name="touser" placeholder="Người nhận PIN">
			    		</div>
			    		
			    		<div class="form-group">
			    			<label for="">Mật khẩu cấp 2</label>
			    			<input type="password" class="form-control" id="pin-password2" name="pin-password2" placeholder="Mật khẩu cấp 2">
			    		</div>
			    	
			    		<button type="button" class="btn btn-primary" id="btn-transferpin" >Chuyển PIN</button>
			    	</form>
			    </div>
		    </div>
	    	<div class="table-responsive">
	    		<table class="table table-hover" id="pin-table">
	    			<thead>
	    				<tr>
	    					<th>ID</th>
	    					<th>Người chuyển</th>
	    					<th>Người nhận</th>
	    					<th>Số PIN</th>
	    					<th>Thời gian chuyển</th>
	    				</tr>
	    			</thead>
	    			<tbody>
	    				<!-- <tr>
	    					<td>60233</td>
	    					<td>admin</td>
	    					<td>admin1</td>
	    					<td>10 PIN</td>
	    					<td>22/8/2016</td>
	    				</tr> -->
	    			</tbody>
	    		</table>
	    	</div>
		</div>
	</div>
</div>
</div>