@extends("layout.main")
@section("content")
<div class="jumbotron">
  <div class="container">
    <img width="150" height="150" alt="star" src="data:image/{{{$user->extensionImage}}};base64,{{{$user->profileImage}}}" />
    <p>{{$user->Email}}  </p>
        @if ($shops!=null)
          @foreach ($shops as $shop)
          <a class="btn btn-primary btn-lg" href="{{ URL::route('shop-user',$shop->Nameshop)}}" role="button">{{ $shop->Nameshop}} &raquo;</a>
          @endforeach
        @else 
        @endif
  </div>
</div>
<div class="edit-text">
  <a href="{{URL::route('Photo-set')}}" type="photo" class="btn btn-primary ">FoodShare</a>
</div>
  <hr class="featurette-divider">
   <div class="row featurette">
    @foreach($photos as $photo)
      <div class="col-md-7">
        <h1 class="edit-text"> {{$photo->Detail}} </h1>
      </div>
      <div class="col-md-5">
        <img class="featurette-image img-responsive" src="data:image/jpg;base64,{{{$photo->image}}}" alt="Generic placeholder image">
      </div> 
    @endforeach
  </div>
  <div class="row">
    <div class="edit-text">
      <div class="container">
      @foreach ($comments as $comment)
          {{ $comment->Comment }} </br>
      @endforeach
      <form role="form" class="form-order" action="{{ URL::route('Comment-set') }}" method="post" enctype="multipart/form-data">
        <textarea class="form-control" rows="3" name="comment"></textarea>
        @if($errors->has('comment'))
        {{$errors->first('comment')}}
        @endif
      <button type="Menushare" class="btn btn-primary">Comment</button>
      </form>
      </div>
    </div>
  </div>
@stop

