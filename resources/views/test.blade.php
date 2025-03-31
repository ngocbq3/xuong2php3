<h1>Lấy dữ liệu category từ product</h1>
@foreach ($products as $product)
    <div>
        <div>ID: {{ $product->id }}</div>
        <div>Tên sản phẩm: <strong>{{ $product->name }}</strong></div>
        <div>Tên danh mục: <strong>{{ $product->category->name }}</strong></div>
    </div>
    <hr>
@endforeach

<h1>Lấy product từ category</h1>
@foreach ($categories as $category)
    @foreach ($category->products as $product)
        <div>
            <div>ID: {{ $product->id }}</div>
            <div>Tên sản phẩm: <strong>{{ $product->name }}</strong></div>
            <div>Tên danh mục: <strong>{{ $category->name }}</strong></div>
        </div>
        <hr>
    @endforeach
@endforeach
