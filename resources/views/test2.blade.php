<h1>Lấy dữ liệu category từ product</h1>
@foreach ($products as $product)
    <div>
        <div>ID: {{ $product->id }}</div>
        <div>Tên sản phẩm: <strong>{{ $product->name }}</strong></div>
        <div>Tên danh mục: <strong>{{ $product->category->name }}</strong></div>
        <!--lấy biến thể của sản phẩm-->
        @foreach ($product->variants as $variant)
            <div>
                <div>Color code: {{ $variant->color->code }}</div>
                <div>Color name: {{ $variant->color->name }}</div>
                <div>Size name: {{ $variant->size->name }}</div>
                <div>Stock: {{ $variant->stock }}</div>
            </div>
        @endforeach
    </div>
    <hr>
@endforeach
