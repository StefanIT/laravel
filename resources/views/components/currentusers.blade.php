<div class="footer">
	<div class="col-md-12">
		<div class="card-header">
			<div class="col-md-9">
		    	<p class="card-text" id="descr"><span class="fa fa-users"></span>Current Activate Users </p>
			</div>
			<div class="col-md-3">
			</div>
			<div class="clearfix"></div>
	    </div>

	    <div class="card-block">
	    	<div class="row">
	    		@isset($registered)
		    	<div class="card col-md-12">
		    		<p>There are currently {{ $registered }} online users.</p>
		    	</div>
		    	@endisset
	    	</div>
	  	</div>
	</div>
</div>