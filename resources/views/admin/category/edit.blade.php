@extends('admin.master')
@section('title','Admin | Cập nhật danh mục')
@section('main-content')
<section class="content">

    <!-- Default box -->
   <div class="col-md-8">
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Cập nhật Danh mục</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <form action="{{route('category.update',$category)}}" method="POST" role="form">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{$category->id}}">
            <div class="box-body">
              <div class="form-group">
                <label for="exampleInputEmail1">Tên danh mục</label>
                <input type="text" name="name" value="{{old('name') ? old('name') : $category->name}}" class="form-control" id="exampleInputEmail1" >
                @error('name')
                <small id="helpId" class="form-text text-danger">{{$message}}</small>
                @enderror
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Chọn trạng thái</label>
                <div class="form-check form-check-inline">
                    <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="status" id="" value="1" {{$category ->status ? 'checked' : ''}}> Hiện
                        <input class="form-check-input" type="radio" name="status" id="" value="0" {{!$category ->status ? 'checked' : ''}} > Ẩn
                    </label>
                </div>
              </div>
              
            </div>
            <!-- /.box-body -->

            <div class="box-footer">
              <button type="submit" class="btn btn-primary">Update</button>
            </div>
          </form>
        </div>
     
        <!-- /.box -->

      </div>
    <!-- /.box -->

  </section>
@endsection
