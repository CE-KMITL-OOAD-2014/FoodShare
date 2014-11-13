@section("headershop")
 <nav class="navbar navbar-inverse" role="navigation">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collaspse" data-toggle="collaspe" data-target="#bs-example-navbar-collaspe-1">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
          </div>
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
             <form class="navbar-form navbar-left" role="search">
               <a class="navbar-brand">Shop Profile</a>
               @if(Session::get('name')==Session::get('emailshop'))
               <a href="{{URL::route('Menu-get')}}" type="Order1" class="btn btn-default navbar-btn">Add Order</a>
                <!--<button type="Order" class="btn btn-default"><a href="{{ URL::route('Order-get') }}">Order</a></button> -->
               <a href="{{URL::route('Reserve-show')}}" type="Reserve1" class="btn btn-primary navbar-btn">Edit Reserve</a>
               @endif
               <a href="{{URL::route('Reserve-get')}}" type="Reserv" class="btn btn-success navbar-btn">Reserv</a>
               <a href="{{URL::route('Order-get')}}" type="Order" class="btn btn-danger navbar-btn">Order</a>
               <a href="{{URL::route('Review-get')}}" type="Review" class="btn btn-danger navbar-btn">Review</a>
            </form>
            <form class="navbar-form navbar-right" role="search">
              <a href="{{URL::route('home')}}" type="home" class="btn btn-primary navbar-btn">home</a>
              <a href="{{URL::to('/centraledit')}}" type="Edit" class="btn btn-info navbar-btn">Edit</a>
              <a href="{{URL::route('signout')}}" type="Logout" class="btn btn-warning navbar-btn">Logout</a>
            </form>
        </div><!-- /.container-fluid -->
        </div>
      </nav>
    
@show