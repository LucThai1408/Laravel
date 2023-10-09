@extends('admin.master')
@section('title','Admin | Thêm mới sản phẩm')
@section('main-content')
<section class="content">

    <!-- Default box -->
   <div class="col-md-8">
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Thêm mới Sản phẩm</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <form action="{{route('product.store')}}" method="POST" role="form" enctype="multipart/form-data">
            @csrf
            <div class="box-body">
              <div class="form-group">
                <label for="exampleInputEmail1">Tên sản phẩm</label>
                <input type="text" name="name" class="form-control" value="{{old('name')}}" id="exampleInputEmail1" >
                @error('name')
                <small id="helpId" class="form-text text-danger">{{$message}}</small>
                @enderror
              </div>

              <div class="form-group">
                <label for="">Chọn danh mục</label>
                <select class="form-control" value="{{old('category_id')}}" name="category_id" id="">
                  @foreach ($categories as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>    
                  @endforeach
                </select>
                  @error('category_id')
                    <small id="helpId" class="form-text text-danger">{{$message}}</small>
                  @enderror
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Giá sản phẩm</label>
                <input type="text" name="price" class="form-control" value="{{old('price')}}" id="exampleInputEmail1" >
                @error('price')
                <small id="helpId" class="form-text text-danger">{{$message}}</small>
                @enderror
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Giá khuyến mãi</label>
                <input type="number" name="sale_price" class="form-control" value="{{old('sale_price')}}" id="exampleInputEmail1" >
                @error('sale_price')
                <small id="helpId" class="form-text text-danger">{{$message}}</small>
                @enderror
              </div>
              
              <div class="form-group">
                <label for="exampleInputEmail1">Ảnh sản phẩm</label>
                <input type="file" name="photo" class="form-control" id="exampleInputEmail1" >
                @error('photo')
                <small id="helpId" class="form-text text-danger">{{$message}}</small>
                @enderror
              </div>

            </div>
            <!-- /.box-body -->

            <div class="box-footer">
              <button type="submit" class="btn btn-primary">Thêm mới</button>
            </div>
          </form>
        </div>
     
        <!-- /.box -->

      </div>
    <!-- /.box -->

  </section>
@endsection
