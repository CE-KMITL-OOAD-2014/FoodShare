@extends("layout.main")
@section("content")
<div class="container">
	@foreach ($shops as $shop)
	<a class="btn btn-primary btn-lg" href="{{ URL::route('shop-user',$shop->Nameshop)}}" role="button">{{ $shop->Nameshop}} &raquo;</a><br>
	@endforeach
</div>


@stop