@extends('layout.default')
@section('content')
<div class="row" style="margin-bottom:20px">
	<div class="col-md-6">
		<h2>{{$uri}}</h2>
	</div>
	<div class="col-md-6">
		<button type="button" class="btn btn-primary btn-sm pull-right" data-toggle="modal" data-target="#modal-{{$uri}}" ><i class="fa fa-plus"></i> Add New </a>
	</div>
</div>
<div class="row">
	<div class="col-md-12" >
		@include( $uri.'.table.list' )
	</div>
</div>
@include( $uri.'.modal.create' )
@endsection
@section('PageScripts')
<script>
var table = $('#table').dataTable( 
{
  	"order" 		: [[ 0, "asc" ]], 
  	"lengthMenu"    : [ [ 50, 100, -1], [  50, 100, "All"] ],
  	"pageLength"    : 100,
  	"iDisplayLength": 100,
  	"paging"        : true,
  	"ordering"      : true,
  	"info"          : true,
  	"pagingType"    : "full_numbers",  
  	"deferRender"   : true,
	"ajax"          : api+"/{{$uri}}",
	"columns"       : [	              	

					{ data: "id"}, 
	    	        { data: null , render: function ( data ) 
	        	        {
	            	      return data.first_name+' '+data.last_name;
	                	}  
	              	},
	    	        { data: null , render: function ( data ) 
	        	        {
	            	      return data.active==1 ? 'Active' : 'Inactive' ;
	                	}  
	              	},
	    	        { data: null , render: function ( data ) 
	        	        {
	            	      return '<button type="button" '
	            	      		+'class="btn btn-default btn-xs edit-{{$uri}}-id" '
	            	      		+'data-url="/{{$uri}}/'+data.id+'" >'
	            	      		+'<i class="fa fa-pencil-square-o"></i> edit</button> '
	            	      		+'<button type="button" '
	            	      		+'class="btn btn-danger btn-xs remove-{{$uri}}-id" '
	            	      		+'data-url="/{{$uri}}/'+data.id+'" >'
	            	      		+'<i class="fa fa-trash"></i> remove</button> ';
	                	}  
	              	}	              	
	          ]             
});
</script>
@endsection