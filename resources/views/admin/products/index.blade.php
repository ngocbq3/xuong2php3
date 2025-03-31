@extends('admin.layout')

@section('title')
    Danh sách sản phẩm
@endsection

@section('content')
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#ID</th>
                <th scope="col">Tên sản phẩm</th>
                <th scope="col">Hình</th>
                <th scope="col">Nổi bật</th>
                <th scope="col">Danh mục</th>
                <th scope="col">Ngày tạo</th>
                <th scope="col">
                    <a href="{{ route('admin.products.create') }}" class="btn btn-primary">Thêm mới</a>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <th scope="row">{{ $product->id }}</th>
                    <td>{{ $product->name }}</td>
                    <td>
                        <img src="{{ Storage::URL($product->image) }}" width="90" alt="{{ $product->name }}">
                    </td>
                    <td>{{ $product->status ? 'Trang chủ' : '' }}</td>
                    <td>{{ $product->category->name }}</td>
                    <td>{{ $product->created_at }}</td>
                    <td>
                        <a href="{{ route('admin.variants.index', $product->id) }}" class="btn btn-primary">Biến thể</a>

                        <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-primary">Sửa</a>

                        <form class="d-inline" action="{{ route('admin.products.destroy', $product->id) }}" method="post">
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
    {{ $products->links() }}
@endsection
