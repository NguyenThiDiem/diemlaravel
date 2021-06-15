@extends('master');
@section('content');





   <body>
      <div class="container-fluid mt-3">
         <h2>THÊM SẢN PHẨM</h2>

        <div class="space50">&nbsp;</div>@include ('blocks/error')
         <form role="form" action="{{('adminedit')}}" method="post" enctype="multipart/form-data">
            @csrf
            <!-- Vertical -->
            <div class="form-group">
               <label for="labname">Name</label>
               <input type="text" id = "1" name="name" value="{{$product->name}}" class="form-control" placeholder="Enter name">
               <label for="labprice">Price</label>
               <input type="number" id = "1" name="unit_price" value="{{$product->unit_price}}"class="form-control" placeholder="Enter price">
            </div>
            <div class="form-group">
               <label for="labdescription">Description</label>
               <input type="text" id = "1" name="description"value="{{$product->description}}"  class="form-control" placeholder="Enter description">
               <label for="labpromotion">Promotion</label>
               <input type="number" id = "2" name="promotion_price"value="{{$product->promotion_price}}" class="form-control" placeholder="Enter promotion">
            </div>
             <div class="form-group">
               <label for="labunit">Unit</label>
               <input type="text" id = "3" name="unit"value="{{$product->unit}}" class="form-control" placeholder="Enter unit">
               <label for="labnew">New</label>
               <input type="number" id = "4" name="new" class="form-control" placeholder="Enter new">
             </div>
             <div class="form-group">
               <label for="labtype">Type</label>
               <input type="number" id = "5" name="type" class="form-control" placeholder="Enter type">
               <label for="labimage">Image</label>
               <input type="file" id = "exampleFormControllerFile1" name="image" class="form-control" placeholder="Choose file">
             </div>
             <div class="form-group">
               <button type="submit" class="btn btn-primary">Submit</button>
            </div>
         </form>
          
      </div>
    </div>
    @endsection
      {{-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script> --}}
  