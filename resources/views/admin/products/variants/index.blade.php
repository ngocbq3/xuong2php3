@extends('admin.layout')

@section('title')
    Biến thể của sản phẩm: {{ $product->name }}
@endsection

@section('content')
    <div>
        Biến thể của sản phẩm: <strong>{{ $product->name }}</strong>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#ID</th>
                <th scope="col">Image</th>
                <th scope="col">Màu</th>
                <th scope="col">Kích cỡ</th>
                <th scope="col">Giá</th>
                <th scope="col">Số lượng</th>
                <th scope="col">
                    <a href="{{ route('admin.variants.create', $product->id) }}" class="btn btn-primary">Thêm mới</a>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($product->variants as $variant)
                <tr>
                    <th scope="row">{{ $variant->id }}</th>

                    <td>
                        <img src="{{ Storage::URL($variant->image) }}" width="90" alt="{{ $product->name }}">
                    </td>
                    <td>{{ $variant->color->name }}</td>
                    <td>{{ $variant->size->name }}</td>
                    <td>{{ $variant->price }}</td>
                    <td>{{ $variant->stock }}</td>
                    <td>

                        <a href="{{ route('admin.variants.edit', $variant->id) }}" class="btn btn-primary">Sửa</a>

                        <form class="d-inline" action="{{ route('admin.variants.destroy', $variant->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"
                                onclick="return confirm('Bạn có muốn xóa không?')">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
@endsection
