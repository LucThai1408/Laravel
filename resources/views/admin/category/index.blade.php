@extends('admin.master')
@section('title' ,'Admin | Quản lí danh mục')
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
         <a href="{{route('category.create')}}" class="btn btn-success">+Thêm mới Danh Mục</a>

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
                <th>Ngày tạo</th>
                <th>Trạng thái</th>
                <th>Tùy chọn</th>
              </tr>
              @forelse ($categories as $item)
              <tr>
                <td>{{$loop->iteration}}</td>
                <td><a href="{{route('category.show',$item)}}">{{$item->name}}</a></td>
                <td>{{$item->created_at}}</td>
                <td>{!!$item->status ? '<span class="label label-success">Hiển thị</span>' : '<span class="label label-danger">Ẩn</span>'!!}</td>
                <td>
                <a href="{{route('category.edit',$item)}}" class="btn btn-success">Sửa</a>
                </td>
                <td>
                  <form action="{{route('category.destroy',$item)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return comfirm('Bạn có chắc chắn muốn xóa')" class="btn btn-danger">Xóa</button>
                  </form>
                </td>
              </tr>
              @empty
                  <h2 class="text-center">Chưa có dữ liệu!!!</h2>
              @endforelse
            </tbody></table>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
    <!-- /.box -->

  </section>
@endsection