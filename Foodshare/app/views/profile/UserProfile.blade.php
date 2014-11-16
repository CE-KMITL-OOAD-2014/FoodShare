@extends("layout.main")
@section("content")
  <div class="col-md-12">
    <div style="margin-left:10px;">
      <div class="col-md-3">
        <div class="row" >
          <div class="col-md-12 well">
            <div class="col-md-3 ">
              <img width="150" height="150" alt="star" src="data:image/{{{$user->extensionImage}}};base64,{{{$user->profileImage}}}" />
            </div>
            <div class="col-md-6 col-md-offset-2"><br><br>
             <p>{{$user->Email}}  </p> 
           </div>
         </div>
       </div>
       <div class="row" >
        <div class="col-md-12 well">
         <h4>comment</h4>
           <form role="form" class="form-order" action="{{ URL::route('Comment-set') }}" method="post" enctype="multipart/form-data">
            <textarea class="form-control" rows="3" name="comment"></textarea>
            @if($errors->has('comment'))
              {{$errors->first('comment')}}
            @endif
            <br>
            <button type="Menushare" class="btn btn-primary">Comment</button><hr>
          </form>
         @foreach ($comments as $comment)
         <div style="word-break: break-word;">
            <a href="{{ URL::route('profile-user',$comment->Email)}}">{{ $comment->Email }} </a>:{{ $comment->Comment }} </br>
          </div>
         @endforeach <br>
      </div>
    </div> 
    <div class="row" >
      <div class="col-md-12 well">
        <div class="panel panel-info">
          <div class="panel-heading">
            <h2 class="panel-title">My Shop</h2>
          </div>
          <div class="panel-body">
          @if ($shops!=null)
            @foreach ($shops as $shop)
              <a href="{{ URL::route('shop-user',$shop->Nameshop)}}" role="button">{{ $shop->Nameshop}}</a>
            @endforeach
          @else 
          @endif
          </div>
        </div>
      </div>
    </div> 
  </div>
  <div class="col-md-9" >
    <div class="row" style="margin-left:5px;">
      <div class="col-md-12 well" >
        <div class="col-md-6" style="background-color:#b3b2de">
       <br>
          <h3>Shared Your Food</h3><br>
          <div class="edit-text"></div> 
            <div class="col-md-12">
              <form action="http://foodshare1.azurewebsites.net/index.php/photo" method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <textarea class="form-control" rows="3" name="detail"></textarea>
                </div>
                <div class="form-group">
                  <input type="file" name="uploadimage">
                </div>
                <button type="submit" class="btn btn-success">Submit</button>
                <button type="reset" class="btn btn-success">Clear</button>
                <input name="_token" type="hidden" value="wV2jp8NAMbizG2Se3J2vCmm91AKiuW1Brakf6qN4"> 
              </form>
            </div>
              <br>
              <br><br><br><br><br><br><br><br>
        </div>
        @foreach($photos as $photo)
        <div class="col-md-7"><br>
          <img class="featurette-image img-responsive" src="data:image/jpg;base64,{{{$photo->image}}}" alt="Generic placeholder image">
          <br>
        </div>
        <div class="col-md-3"><br>
           <p align="left"> <div style="word-break: break-word;">{{$photo->Detail}}</div> </p>
        </div>
          <br> @endforeach
        </div> 
      </div>
    </div>
  </div>
</div>
@stop

