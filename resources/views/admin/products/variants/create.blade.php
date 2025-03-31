@extends('admin.layout')

@section('title')
    Thêm biến thể: {{ $product->name }}
@endsection

@section('content')
    <div>
        Thêm biến thể: <strong>{{ $product->name }}</strong>
    </div>
    <form action="{{ route('admin.variants.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="product_id" value="{{ $product->id }}">
        <div class="mb-3">
            <label for="color_id" class="form-label">Màu</label>
            <select class="form-select" name="color_id" id="color_id">
                @foreach ($colors as $color)
                    <option value="{{ $color->id }}">{{ $color->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="size_id" class="form-label">Kích cỡ</label>
            <select class="form-select" name="size_id" id="size_id">
                @foreach ($sizes as $size)
                    <option value="{{ $size->id }}">{{ $size->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Hình ảnh</label>
            <input type="file" class="form-control" name="image" id="image">
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Giá</label>
            <input type="number" class="form-control" name="price" id="price">
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Giảm giá</label>
            <input type="number" class="form-control" name="sale" id="sale">
        </div>
        <div class="mb-3">
            <label for="stock" class="form-label">Số lượng</label>
            <input type="number" class="form-control" name="stock" id="stock">
        </div>
        <div class="mb-">
            <button type="submit" class="btn btn-primary">Thêm mới</button>
            <a href="{{ route('admin.variants.index', $product->id) }}" class="btn btn-secondary">Quay lại</a>
        </div>
    </form>
@endsection
