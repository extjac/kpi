
<!-- Modal -->
<div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">

	<form class="form-horizontal ajax-form-user" role="form" method="POST" action="/user" data-reload="false" data-redirect="true" data-redirect-target="user">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">

		<div class="modal-content">	
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">User</h4>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label class="col-md-4 control-label">First name</label>
					<div class="col-md-6">
						<input type="text" class="form-control" name="first_name" id="first_name" value="">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-4 control-label">Last name</label>
					<div class="col-md-6">
						<input type="text" class="form-control" name="last_name" id="last_name" value="">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-4 control-label">E-Mail Address</label>
					<div class="col-md-6">
						<input type="email" class="form-control" name="email" id="email" value="">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-4 control-label">Password</label>
					<div class="col-md-6">
						<input type="password" class="form-control" name="password" id="password">
					</div>
				</div>
				<span class="showError"></span>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default " data-dismiss="modal"><span class="glyphicon glyphicon-remove" ></span> Close </button>
				<button type="submit" class="btn btn-success btn-submit" data-loading-text="Please wait..." autocomplete="off"><span class="glyphicon glyphicon-ok" ></span> OK </button>
			</div>
		</div>

	</form>

	</div>
</div>
<!-- end Modal -->

