@extends("layout.mainshop")
@section("content")
  <div class="container-fluid">
      <div class="row">
        <div class="col-xs-4 col-md-4">

      
         <p>{{ Session::get('nameshop')}}</p>
    <br>
    <p>Available:{{ Session::get('seat')}} Seat</p>
        </div>
        <div class="col-xs-4 col-md-4">
          <button type="AllMenu" class="btn btn-primary">ShowAllMenu</button>
    
    </div>
    <div class="col-xs-4 col-md-4">
    <div>
      </div>
    </div>
@stop