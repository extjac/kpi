<!-- Modal -->
<div class="modal fade" id="modal-{{$uri}}" tabindex="-1" role="dialog" aria-labelledby="modal-{{$uri}}">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">

		<form class="form ajax-form-{{$uri}}" role="form" method="POST" action="/{{$uri}}">
		<input type="hidden" name="_method" id="_method" value="POST">
		<input type="hidden" name="id" id="id" value="">

			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" >{{$uri}}</h4>
			</div>

			<div class="modal-body">
				
				<div class="row">
					<div class="col-md-9">
					  <div class="form-group">
					    <label for="name">Name</label>
					    <input type="text" class="form-control" name="name" id="name" value="" required>
					  </div>
					</div>

					<div class="col-md-3">
						<div class="form-group">
							<label class="col-md-2 control-label">Active</label>
							<select class="form-control" name="active" id="active">
							<option value="1">Active</option>
							<option value="0">Inactive</option>
							</select>
						</div>
					</div>

				</div>

				<div class="row">
					<div class="col-md-6">
					  <div class="form-group">
			 			<label for="category_id">Category</label>
							<?php $categories = App\Category::where('active',1)->get(['id', 'name']) ?>
							<select class="form-control" name="category_id" id="category_id" required>
							<option value="">-select-</option>
							@foreach( $categories as $category )
							<option value="{{ $category->id }}">{{ $category->name }} </option>
							@endforeach
							</select>
					  </div>
					</div>
					<div class="col-md-6">
					  <div class="form-group">
					  <label or="product_id">Product/Area</label>
			 			<?php $products = App\Product::where('active',1)->get(['id', 'name']) ?>
							<select class="form-control" name="product_id" id="product_id" required>
							<option value="">-select-</option>
							@foreach( $products as $product )
							<option value="{{ $product->id }}">{{ $product->name }} </option>
							@endforeach
							</select>
					  </div>
					</div>			
				</div>



				<div class="row">
					<div class="col-md-6">
					  <div class="form-group">
			 		    <label for="process_id">Process</label>
							<?php $processes = App\Process::where('active',1)->get(['id', 'name']) ?>
							<select class="form-control" name="process_id" id="process_id" required>
							<option value="">-select-</option>
							@foreach( $processes as $process )
							<option value="{{ $process->id }}">{{ $process->name }} </option>
							@endforeach
							</select>
					  </div>
					</div>

					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label">Owners</label>
							<select class="form-control select2" name="active" id="active" multiple required style="width:100%">
							<?php $users = App\User::All() ?>
							@foreach( $users as $user )
							<option value="{{ $user->id }}">{{ $user->first_name }} {{ $user->last_name }}</option>
							@endforeach					
							</select>
						</div>
					</div>
				</div>



				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label">Year</label>
							<select class="form-control" name="active" id="active">
							<option value="">-select-</option>
							<option value="2016">2016</option>
							<option value="2017">2017</option>
							<option value="2018">2018</option>
							</select>
						</div>
					</div>

					<div class="col-md-3">
					  <div class="form-group">
					    <label for="name">Target</label>
					    <input type="text" class="form-control" name="target" id="target" value="" required>
					  </div>
					</div>


					<div class="col-md-3">
					  	<div class="form-group">
					    	<label for="metric_id">Metric</label>
							<?php $metrics = App\Metric::where('active',1)->get(['id', 'name']) ?>
							<select class="form-control" name="metric_id" id="metric_id" required>
							<option value="">-select-</option>
							@foreach( $metrics as $metric )
							<option value="{{ $metric->id }}">{{ $metric->name }} </option>
							@endforeach
							</select> 
					  	</div>
					</div>



				</div>
				<div class="row">					
					<div class="col-md-12" >
						<div class="form-group" >
							<label class="month"><input name="month[]" type="checkbox" value="01"/> Jan </label>
							<label class="month"><input name="month[]" type="checkbox" value="02"/> Feb </label>
							<label class="month"><input name="month[]" type="checkbox" value="03"/> Mar </label>
							<label class="month"><input name="month[]" type="checkbox" value="04"/> Apr </label>
							<label class="month"><input name="month[]" type="checkbox" value="05"/> May </label>
							<label class="month"><input name="month[]" type="checkbox" value="06"/> Jun </label>
							<label class="month"><input name="month[]" type="checkbox" value="07"/> Jul </label>
							<label class="month"><input name="month[]" type="checkbox" value="08"/> Aug </label>
							<label class="month"><input name="month[]" type="checkbox" value="09"/> Sep </label>
							<label class="month"><input name="month[]" type="checkbox" value="10"/> Oct </label>
							<label class="month"><input name="month[]" type="checkbox" value="11"/> Nov </label>
							<label class="month"><input name="month[]" type="checkbox" value="12"/> Dec </label>
						</div>
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
             
