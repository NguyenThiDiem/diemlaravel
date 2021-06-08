@extends('master');
@section('content');
<div class="space50">&nbsp</div>
<div class="container beta-relative">
    <div class="pull-left"><h2>List</h2></div>
    <div class="pull-right"><input type="text"placeholder="Search Id"></div>
</div>
<div class="container">
    <table class="table table-striped table-dark">
        <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">IMAGE</th>
              <th scope="col">NAME</th>
              <th scope="col">TYPE</th>
              <th scope="col">DESCRIPTION</th>
              <th scope="col">UNIT_PRICE</th>
              <th scope="col">PROMOTION_PRICE</th>
              <th scope="col">UNIT</th>
              <th scope="col">NEW</th>
              <th scope ="col"><a href="{{route('getadminadd')}}" class="btn btn-primary" style="width:80px;">Add product</a></th>
            </tr>
          </thead>
          <tbody>
              @foreach ($products as $product )
              <tr>
                <th scope="row">{{$product->id}}</th>
                <td><img src="source/image/product/{{$product->image}}" style="height:100px;"alt=""></td>
                <td>{{$product->name}}</td>
                <td>{{$product->id_type}}</td>
  
                <td>{{$product->description}}</td>
  
                <td>{{$product->unit_price}}</td>
  
                <td>{{$product->promotion_price}}</td>
                <td>{{$product->unit}}</td>
  
                <td>{{$product->new}}</td>
                <td><form role="form" action="{{route('getadminedit',$product->id)}}" method="get">
                    @csrf
                    <button name="edit" class="btn btn-warning" style="width:80px;">Edit</button>
                
                </form>

            {{-- Nut Xoa --}}
                <td><form role="form" action="{{route('admindelete',$product->id)}}" method="post">
                    @csrf
                    <button name="delete" class="btn btn-danger" style="width:80px;">Delete</button></td>
                
                </form>
            </tr>
            @endforeach

         
         
          
          </tbody>
    </table>
</div>