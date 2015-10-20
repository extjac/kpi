 
<!-- Modal -->
<div class="modal fade" id="userUpdateModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      
    	<form class="form-horizontal ajax-form" role="form" method="POST" action="{{ url('/api/v1/user') }}" >
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<input type="hidden" name="_method" value="PUT">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">User</h4>
      </div>

      <div class="modal-body">
        
		<div class="form-group">
			<label class="col-md-4 control-label">First name</label>
			<div class="col-md-6">
				<input type="text" class="form-control" name="first_name" value="">
			</div>
		</div>

		<div class="form-group">
			<label class="col-md-4 control-label">Last name</label>
			<div class="col-md-6">
				<input type="text" class="form-control" name="last_name" value="">
			</div>
		</div>

		<div class="form-group">
			<label class="col-md-4 control-label">E-Mail Address</label>
			<div class="col-md-6">
				<input type="email" class="form-control" name="email" value="">
			</div>
		</div>

		<div class="form-group">
			<label class="col-md-4 control-label">Password</label>
			<div class="col-md-6">
				<input type="password" class="form-control" name="password">
			</div>
		</div>

		<span class="showError"></span>

      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary btnSubmit">Save</button>
      </div>
	
	</form>

    </div>
  </div>
</div>

