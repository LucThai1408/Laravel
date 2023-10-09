@extends('admin.master')
@section('title' ,'Admin | Quản lí sản phẩm')
@section('main-content')
<section class="content">
    @if ($message = Session::get('success'))
        <div class="alert alert-success" role="alert">
          <strong>{{$message}}</strong>
        </div>
    @endif
    <!-- Default box -->
    <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
         <a href="{{route('product.create')}}" class="btn btn-success">+Thêm mới Sản phẩm</a>

            <div class="box-tools">
              <div class="input-group input-group-sm" style="width: 150px;">
                <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                <div class="input-group-btn">
                  <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                </div>
              </div>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body table-responsive no-padding">
            <table class="table table-hover">
              <tbody><tr>
                <th>STT</th>
                <th>Tên</th>
                <th>Danh mục</th>
                <th>Giá</th>
                <th>Image</th>
                <th>Tùy chọn</th>
                <th></th>
              </tr>
              @forelse ($product as $item)
              <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$item->name}}</td>
                <td>{{$item->category->name}}</td>
                <td>{{$item->sale_price > 0  ? $item->sale_price : $item ->price}}$</td>
                <td>
                  <img src="{{asset('storage/images')}}/{{$item->image}}"  width="100px" alt="">
                </td>
                <td>
                <a href="{{route('product.edit',$item)}}" class="btn btn-success">Sửa</a>
                </td>
                <td>
                  <form action="{{route('product.destroy',$item)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa')">Xóa</button>
                  </form>
                </td>
              </tr>
              @empty
                  <h2 class="text-center">Chưa có dữ liệu!!!</h2>
              @endforelse
            </tbody></table>
          </div>
          <ul class="pagination">
            {{ $product->links() }}
          </ul>
        
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
    <!-- /.box -->

  </section>
@endsection