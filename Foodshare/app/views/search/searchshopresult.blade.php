@extends("layout.main")
@section("content")
    <div class="container">
	
					@foreach ($shops as $shop)
					<center>
						<a href="{{ URL::route('shop-user',$shop->Nameshop)}}">{{ $shop->Nameshop}}</a></br>
					</center>
					@endforeach
	
    </div> <!-- /container -->


@stop