@extends('layouts.app')

@section('title', 'Trang Chủ')

@section('content')
    <section class="featured-products mb-5">
        <h2 class="text-center mb-4">Sản Phẩm Nổi Bật</h2>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
            @foreach ($products as $product)
                <div class="col">
                    <div class="card h-100 shadow-sm product-card">
                        <img src="{{ Storage::URL($product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text fw-bold text-danger">{{ $product->lowest_price ?? 0 }} $</p>
                            <a href="product-detail.html" class="btn btn-outline-primary btn-sm">Xem chi tiết</a>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </section>

    <section class="about-us text-center bg-light p-5 rounded mb-5">
        <h2>Về Thời Trang ABC</h2>
        <p class="lead">Chúng tôi mang đến những sản phẩm thời trang chất lượng với phong cách độc đáo.</p>
        <a href="#" class="btn btn-secondary">Tìm hiểu thêm</a>
    </section>
@endsection
