@extends('admin.layout')

@section('title')
    Cập nhật sản phẩm
@endsection

@section('content')
    @session('message')
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endsession
    <form action="{{ route('admin.products.update', $product->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="bt-3">
            <label for="" class="form-label">Tên sản phẩm</label>
            <input type="text" name="name" value="{{ $product->name }}" class="form-control">
        </div>
        <div class="bt-3">
            <label for="" class="form-label">Mã sản phẩm</label>
            <input type="text" name="code" value="{{ $product->code }}" class="form-control">
        </div>
        <div class="bt-3">
            <label for="" class="form-label">Danh mục</label>
            <select name="category_id" id="" class="form-control">
                @foreach ($categories as $cate)
                    <option value="{{ $cate->id }}" @selected($cate->id == $product->category_id)>
                        {{ $cate->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="bt-3">
            <label for="" class="form-label">Hình ảnh</label> <br>
            <img src="{{ Storage::URL($product->image) }}" width="150" alt="{{ $product->name }}">
            <input type="file" name="image" id="" class="form-control">
        </div>
        <div class="bt-3">
            <label for="" class="form-label">Mô tả</label>
            <textarea name="description"rows="10" class="form-control">{{ $product->description }}</textarea>
        </div>
        <div class="bt-3">
            <label for="" class="form-label">Chất liệu</label>
            <input type="text" name="metarial" value="{{ $product->metarial }}" class="form-control">
        </div>
        <div class="bt-3">
            <label for="" class="form-label">Hướng dẫn sử dụng</label>
            <textarea name="instrut" rows="5" class="form-control">{{ $product->instrut }}</textarea>
        </div>
        <div class="bt-3">
            <label for="" class="form-label">Hiển thị sản phẩm lên trang chủ</label>
            <input type="checkbox" name="status" value="1" @checked($product->status)>
        </div>
        <div class="bt-3">
            <button type="submit" class="btn btn-primary">Lưu</button>
            <a href="{{ route('admin.products.index') }}" class="btn btn-primary">Danh sách</a>
        </div>
    </form>
@endsection
