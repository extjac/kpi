<!-- Modal -->
<div class="modal fade" id="modal-{{$uri}}" tabindex="-1" role="dialog" aria-labelledby="modal-{{$uri}}">
<div class="modal-dialog" role="document">
<div class="modal-content">

<form class="form form-horizontal ajax-form-{{$uri}}" role="form" method="POST" action="/{{$uri}}">
<input type="hidden" name="_method" id="_method" value="POST">
<input type="hidden" name="id" id="id" value="">

	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<h4 class="modal-title" >{{$uri}}</h4>
	</div>

	<div class="modal-body">

		<div class="form-group">
			<label class="col-md-3 control-label">First Name</label>
			<div class="col-md-9">
				<input type="text" class="form-control" name="first_name" id="first_name" value="" required>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-3 control-label">Last Name</label>
			<div class="col-md-9">
				<input type="text" class="form-control" name="last_name" id="last_name" value="" required>
			</div>
		</div>

		<div class="form-group">
			<label class="col-md-3 control-label">Email</label>
			<div class="col-md-9">
				<input type="email" class="form-control" name="email" id="email" value="" required>
			</div>
		</div>

		<div class="form-group">
			<label class="col-md-3 control-label">Password</label>
			<div class="col-md-9">
				<input type="password" class="form-control" name="password" id="password" value="" required>
			</div>
		</div>


		<div class="form-group">
			<label class="col-md-3 control-label">Active</label>
			<div class="col-md-3">
				<select class="form-control" name="active" id="active">
				<option value="1">Active</option>
				<option value="0">Inactive</option>
				</select>
			</div>
		</div>

		<span class="showError"></span>

	</div>

	<div class="modal-footer">
		<button type="button" class="btn btn-default btn-sm" data-dismiss="modal"><i class="fa fa-close"></i> Close </button>
		<button type="submit" class="btn btn-success btn-sm" data-loading-text="Please wait..."><i class="fa fa-check"></i> Save </button>
	</div>
		

</form>

</div>
</div>
</div>
<!-- end Modal -->
             
