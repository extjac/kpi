@extends('backend.app')

@section('content')

 <div class="row">
	<div class="col-md-10 col-md-offset-1">
		<div class="panel panel-default">
			<div class="panel-heading"><a href="/">Home</a> > <a href="/user">User</a>
				<div class="pull-right">
        		<p><a href="#" class="modalOpen" data-modal-name="createUser" data-toggle="modal" data-target="#userModal" >+ Add New</a></p>
    			</div>
    		</div>
			<div class="panel-body">
				@include('backend.user.table.list')
			</div>

		</div>
	</div>
</div>
 
@endsection

@include('backend.user.modal.create')



@section('PageScripts')
<script>

</script>
@endsection