@extends("layout.main")
@section("content")
 <form role="form" class="form-order" action="{{ URL::route('Menu-add') }}" method="post" enctype="multipart/form-data">
  <div class="container-fluid">
    <div class="container">
      <div class="row">
          <p>Add food for order</p>
          <div class="form-group">
             <label for="exampleInputFile">Upload Pic</label>
             <input type="file" name="uploadimage"><br>
          </div>
          <div class="form-group">
            <Label for="Price">Food name</label>
            <input type="name" class="form-control" name="name" placeholder="Food name">
          </div>
          @if($errors->has('name'))
              {{$errors->first('name')}}
              @endif
           <div class="form-group">
             <Label for="Price">Enter the Price</label>
             <input type="price" class="form-control" name="price" placeholder="price">
           </div>
           @if($errors->has('price'))
              {{$errors->first('price')}}
              @endif
               <button type="submit" class="btn btn-default">Submit</button>
            {{ Form::token() }}
          </div>
        </div>
      </div>
    </form>
@stop