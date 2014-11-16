@extends("layout.mainshop")
@section("content")
<div class="col-md-12">
  <div style="margin-left:10px;">
    <div class="col-md-3">
      <div class="row">
        <div class="col-md-12 well">
          <h4>Shop name :{{ Session::get('nameshop')}}</h4> <br>
          <h6>Available: {{ Session::get('seat')}} Seat</h6>
          <div class="col-md-3 "><br>
        </div>
      </div>
    </div>
    <div class="row" >
      <div class="col-md-12 well">
        <center><h4>Review</h4></center>
        <form class="form-signin" action="{{ URL::route('Review-post') }}" method="post" role="form">
          <textarea class="form-control" rows="3" name="comment"></textarea>
          @if($errors->has('comment'))
            {{$errors->first('comment')}}
          @endif
          <p></p>
          <button type="submit" class="btn btn-default">Submit</button>
             {{ Form::token() }}
        </form>
      @foreach ($comments as $comment)
        <a href="{{ URL::route('profile-user',$comment->Email)}}"> {{$comment->Email}}</a>:<div style="word-break: break-word;">{{ $comment->Comment }}</div> </br>
      @endforeach <br>
      </div>
    </div> 
  </div>   
  <div class="col-md-9" >
    <div class="col-md-12 well" >
      <div class="col-md-12"><br>
        <center><h3>ShowAllMenu</h3></center>
      <br><br><br>
    @foreach ($menus as $menu) 
        <div class="row">     
          <div class= "col-md-4 col-md-offset-2">
            <img width="125" height="125" alt="star" src="data:image/jpg;base64,{{{$menu->Image}}}" />   
          </div> 
          <div class= "col-md-6">
            <h4><div style="word-break: break-word;">{{$menu->Namemenu }}  {{$menu->Price}}</div></h4> 
          </div>  
        </div>
        <br><br>
        <br><br><br>  
      @endforeach  
        </div>   
      </div>
    </div> 
  </div>
</div>
@stop