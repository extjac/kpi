@extends('layout.default')

@section('content')

 <div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			
			<div class="panel-heading"><a href="/">Home</a> > <a href="/user">User</a>
				<div class="pull-right">
        		<p><a href="javascript:;" data-modal-name="createUser" data-toggle="modal" data-target="#userModal" ><span class="glyphicon  glyphicon-plus" ></span> Add</a></p>
    			</div>
    		</div>

			<div class="panel-body">
				@include('backend.user.table.list')
			</div>

		</div>
	</div>
</div>
 

@include('user.modal.create')

@endsection


@section('PageScripts')
<script>
 var table = $('#tableUser').dataTable( 
{
	"ajax"          : api+"/user",
	"columns"       : [
	  	{ data: null , render: function ( data ) 
	  	   	{
	    		return'<input type="checkbox" name="id[]" id="id[]" value="'+data.id+'"  />';                        
	       	}  
	  	},
		{ data: "first_name"},
		{ data: "email"},
		{ data: "email"},
		{ data: "active"},
	    { data: null , render: function ( data ) 
	        {
		      return ' <a href="/user/'+data.id+'"'
		      		+' onClick="" class="btn btn-info btn-xs" >'
		      		+' <span class="glyphicon glyphicon-eye-open"></span> </a>';
	    	}  
	  	},
	  	{ data: null , render: function ( data ) 
	    	{
	      		return '<a href="javascript:;"'
	      			+' class="btn btn-danger remove-id btn-xs" '
	      			+' data-id="'+data.id+'" '
	      			+' data-url="/user/'+data.id+'" '
	      			+' data-method="DELETE" '
	      			+' data-confirm="Are you sure?">'
	      			+' <span class="glyphicon glyphicon-trash"></span> '
	      		 +'</a>';
	    	}  
	  	}
	]             
});
 /*
new $.fn.dataTable.FixedHeader( table, {
    // options
} );
*/
</script>
@endsection