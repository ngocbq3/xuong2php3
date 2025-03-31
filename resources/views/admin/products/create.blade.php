@extends('admin.layout')

@section('title')
    Danh sách sản phẩm
@endsection

@section('content')
    <form action="{{ route('admin.products.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="bt-3">
            <label for="" class="form-label">Tên sản phẩm</label>
            <input type="text" name="name" id="" class="form-control">
        </div>
        <div class="bt-3">
            <label for="" class="form-label">Mã sản phẩm</label>
            <input type="text" name="code" id="" class="form-control">
        </div>
        <div class="bt-3">
            <label for="" class="form-label">Danh mục</label>
            <select name="category_id" id="" class="form-control">
                @foreach ($categories as $cate)
                    <option value="{{ $cate->id }}">
                        {{ $cate->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="bt-3">
            <label for="" class="form-label">Hình ảnh</label>
            <input type="file" name="image" id="" class="form-control">
        </div>
        <div class="bt-3">
            <label for="" class="form-label">Mô tả</label>
            <textarea name="description"rows="10" class="form-control"></textarea>
        </div>
        <div class="bt-3">
            <label for="" class="form-label">Chất liệu</label>
            <input type="text" name="metarial" id="" class="form-control">
        </div>
        <div class="bt-3">
            <label for="" class="form-label">Hướng dẫn sử dụng</label>
            <textarea name="instrut" rows="5" class="form-control"></textarea>
        </div>
        <div class="bt-3">
            <label for="" class="form-label">Hiển thị sản phẩm lên trang chủ</label>
            <input type="checkbox" name="status" value="1" id="">
        </div>
        <div class="bt-3">
            <button type="submit" class="btn btn-primary">Lưu</button>
            <a href="{{ route('admin.products.index') }}" class="btn btn-primary">Danh sách</a>
        </div>
    </form>
@endsection
