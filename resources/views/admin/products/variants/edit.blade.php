@extends('admin.layout')

@section('title')
    Cập nhật biến thể: {{ $variant->product->name }}
@endsection

@section('content')
    <div>
        Cập nhật biến thể: <strong>{{ $variant->product->name }}</strong>
    </div>
    <form action="{{ route('admin.variants.update', $variant->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="color_id" class="form-label">Màu</label>
            <select class="form-select" name="color_id" id="color_id">
                @foreach ($colors as $color)
                    <option value="{{ $color->id }}" @selected($variant->color_id == $color->id)>
                        {{ $color->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="size_id" class="form-label">Kích cỡ</label>
            <select class="form-select" name="size_id" id="size_id">
                @foreach ($sizes as $size)
                    <option value="{{ $size->id }}" @selected($variant->size_id == $size->id)>
                        {{ $size->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Hình ảnh</label> <br>
            <img src="{{ Storage::URL($variant->image) }}" width="90" alt="">
            <input type="file" class="form-control" name="image" id="image">
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Giá</label>
            <input type="number" class="form-control" name="price" id="price" value="{{ $variant->price }}">
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Giảm giá</label>
            <input type="number" class="form-control" name="sale" id="sale" value="{{ $variant->sale }}">
        </div>
        <div class="mb-3">
            <label for="stock" class="form-label">Số lượng</label>
            <input type="number" class="form-control" name="stock" id="stock" value="{{ $variant->stock }}">
        </div>
        <div class="mb-">
            <button type="submit" class="btn btn-primary">Cập nhật</button>
            <a href="{{ route('admin.variants.index', $variant->product->id) }}" class="btn btn-secondary">Quay lại</a>
        </div>
    </form>
@endsection
