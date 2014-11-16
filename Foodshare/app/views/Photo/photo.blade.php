@extends("layout.main")
@section("content")
<center>
		@if(Session::has('global'))
			<p> {{ Session::get('global')}} </p>
			</center>
		@endif
</center>	
<center> 
	<div class="container">
		<form action="{{ URL::route('Photo-add') }}" method="post" enctype="multipart/form-data">
	 		<div class="form-group">
    			<label for="exampleInputFile">Up load FoodShare</label>
    			<input type="file" name="uploadimage">
  			</div>
  			<div class="form-group">
  				<textarea class="form-control" rows="2" name="detail"></textarea>
  			</div>
			  @if($errors->has('detail'))
				{{$errors->first('detail')}}
			  @endif
			  	<button type="submit" class="btn btn-success">Submit</button>
			 {{Form::token()}} 
		</form>
	</div>
</center>
@stop