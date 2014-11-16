@extends("layout.main")
@section("content")

    <div class="container">
		<center>
		<a href="{{ URL::route('profile-user',$user->Email)}}">{{$user->Email}}</a></br>
		</center>
    </div> <!-- /container -->


@stop