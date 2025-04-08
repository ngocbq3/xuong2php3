@extends('layouts.app')
@section('title', $product->name)
@section('content')
    <div class="row">
        <div class="col-md-6 mb-4 mb-md-0">
            <div id="productImageCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#productImageCarousel" data-bs-slide-to="0" class="active"
                        aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#productImageCarousel" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                </div>
                <div class="carousel-inner rounded border">
                    <div class="carousel-item active">
                        <img src="{{ Storage::URL($product->image) }}" class="d-block w-100 product-detail-img"
                            alt="{{ $product->name }}">
                    </div>
                    @foreach ($product->variants as $variant)
                        <div class="carousel-item">
                            <img src="{{ Storage::URL($variant->image) }}" class="d-block w-100 product-detail-img"
                                alt="Ảnh sản phẩm 2">
                        </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#productImageCarousel"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#productImageCarousel"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            <div class="d-flex justify-content-start mt-2">
                <img src="{{ Storage::URL($product->image) }}" alt="Thumbnail 1" class="img-thumbnail me-2"
                    style="width: 60px; height: 60px; cursor: pointer;" data-bs-target="#productImageCarousel"
                    data-bs-slide-to="0">
                @foreach ($product->variants as $variant)
                    <img src="{{ Storage::URL($variant->image) }}" alt="Thumbnail 2" class="img-thumbnail me-2"
                        style="width: 60px; height: 60px; cursor: pointer;" data-bs-target="#productImageCarousel"
                        data-bs-slide-to="1">
                @endforeach
            </div>
        </div>

        <div class="col-md-6">
            <h1 class="mb-3">{{ $product->name }}</h1>
            <p class="fs-3 fw-bold text-danger mb-3 price">{{ $product->lowest_price }} $</p>
            <div class="mb-4">
                <h5>Mô tả sản phẩm</h5>
                <p>{{ $product->description }}</p>
                <ul>
                    <li>Chất liệu: {{ $product->metarial }}</li>
                    <li>Xuất xứ: Việt Nam</li>
                    <li>Đặc điểm: Mềm mại, thoáng khí</li>
                </ul>
                <h5>Hướng dẫn sử dụng</h5>
                <p>{{ $product->instrut }}</p>
            </div>

            <form>
                <div class="mb-3">
                    <label for="colorOptions" class="form-label fw-bold">Màu sắc:</label>
                    <div id="colorOptions">
                        @foreach ($product->variants->unique('color') as $variant)
                            <span class="color-option " style="background-color: {{ $variant->color->code }};"
                                title="{{ $variant->color->name }}" data-color="{{ $variant->color->id }}"></span>
                        @endforeach

                    </div>
                    <input type="hidden" name="selected_color" id="selected_color"
                        value="{{ $product->variants->first()->color->id ?? 'null' }}">
                </div>

                <div class="mb-3">
                    <label for="sizeOptions" class="form-label fw-bold">Kích thước:</label>
                    <div id="sizeOptions">
                        @foreach ($product->variants->unique('size') as $variant)
                            <span class="size-option"
                                data-size="{{ $variant->size->id }}">{{ $variant->size->name }}</span>
                        @endforeach

                    </div>
                    <input type="hidden" name="selected_size" id="selected_size"
                        value="{{ $product->variants->first()->size->id ?? 'null' }}">
                </div>

                <div class="mb-4">
                    <label for="quantityInput" class="form-label fw-bold">Số lượng:</label>
                    <input type="number" class="form-control" id="quantityInput" value="1" min="1"
                        max="10" style="width: 100px;">
                </div>

                <button type="submit" class="btn btn-primary btn-lg w-100"><i class="bi bi-cart-plus-fill me-2"></i>
                    Thêm vào giỏ hàng</button>
            </form>

            <div class="mt-4 border-top pt-3">
                <h5>Thông tin thêm</h5>
                <ul class="list-unstyled">
                    <li><i class="bi bi-arrow-repeat me-2"></i> Chính sách đổi trả trong 7 ngày.</li>
                    <li><i class="bi bi-truck me-2"></i> Miễn phí vận chuyển cho đơn hàng trên 500k.</li>
                    <li><i class="bi bi-info-circle me-2"></i> Hướng dẫn bảo quản: Giặt máy chế độ nhẹ, không dùng chất tẩy
                        mạnh.</li>
                </ul>
            </div>
        </div>
    </div>

    <section class="related-products mt-5 pt-5 border-top">
        <h2 class="text-center mb-4">Sản Phẩm Liên Quan</h2>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
            @foreach ($productRelead as $item)
                <div class="col">
                    <div class="card h-100 shadow-sm product-card">
                        <img src="{{ Storage::URL($item->image) }}" class="card-img-top" alt="Sản phẩm liên quan 2">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->name }}</h5>
                            <p class="card-text fw-bold text-danger">{{ $item->lowest_price }}</p>
                            <a href="product-detail.html" class="btn btn-outline-primary btn-sm">Xem chi tiết</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Color selection
            const colorOptions = document.querySelectorAll('#colorOptions .color-option');
            const selectedColorInput = document.getElementById('selected_color');
            colorOptions.forEach(option => {
                option.addEventListener('click', function() {
                    colorOptions.forEach(opt => opt.classList.remove(
                        'active')); // Remove active class from all
                    this.classList.add('active'); // Add active class to clicked one
                    selectedColorInput.value = this.dataset.color; // Update hidden input
                    selectedColorInput.dispatchEvent(new Event('change')); // Trigger change event
                    console.log('Selected color:', selectedColorInput.value); // For debugging
                });
            });

            // Size selection
            const sizeOptions = document.querySelectorAll('#sizeOptions .size-option');
            const selectedSizeInput = document.getElementById('selected_size');
            sizeOptions.forEach(option => {
                option.addEventListener('click', function() {
                    sizeOptions.forEach(opt => opt.classList.remove(
                        'active')); // Remove active class from all
                    this.classList.add('active'); // Add active class to clicked one
                    selectedSizeInput.value = this.dataset.size; // Update hidden input
                    selectedSizeInput.dispatchEvent(new Event('change')); // Trigger change event
                    console.log('Selected size:', selectedSizeInput.value); // For debugging
                });
            });

            // Thumbnail click changes carousel slide
            const thumbnails = document.querySelectorAll('[data-bs-target="#productImageCarousel"]');
            thumbnails.forEach(thumb => {
                thumb.addEventListener('click', function() {
                    const slideIndex = this.getAttribute('data-bs-slide-to');
                    const carouselElement = document.getElementById('productImageCarousel');
                    const carouselInstance = bootstrap.Carousel.getInstance(carouselElement) ||
                        new bootstrap.Carousel(carouselElement);
                    carouselInstance.to(parseInt(slideIndex));
                });
            });

            function updatePrice() {
                const selectedColor = selectedColorInput.value;
                const selectedSize = selectedSizeInput.value;

                if (selectedColor === 'null' || selectedSize === 'null') {
                    alert('Sản phẩm này hiện không có biến thể khả dụng.');
                    return;
                }
                console.log(
                    `/get-variant/price?product_id={{ $product->id }}&color_id=${selectedColor}&size_id=${selectedSize}`
                )
                fetch(
                        `/get-variant/price?product_id={{ $product->id }}&color_id=${selectedColor}&size_id=${selectedSize}`
                    )
                    .then(response => response.json())
                    .then(data => {
                        console.log('Response data:', data); // Kiểm tra xem dữ liệu có đúng không
                        // Phần tử chứ giá
                        const priceElement = document.querySelector('.price');
                        if (data.price) {
                            priceElement.textContent = data.price + ' $';

                            const quantityInput = document.getElementById('quantityInput');
                            //Cập nhật số lượng tối đa
                            quantityInput.max = data.stock;
                            if (quantityInput.value > data.stock) {
                                // Nếu số lượng hiện tại lớn hơn số lượng tối đa, cập nhật lại giá trị
                                quantityInput.value = data.stock;
                            }

                            console.log('Cập nhật giá:', data.price, 'Số lượng kho hiện tại:', data.stock);
                        } else {
                            console.error('Không lấy được giá:', data.message);
                            priceElement.textContent = "Liên hệ";
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
            }

            // Sự kiện khi thay đổi màu sắc hoặc kích thước
            // Cập nhật giá và số lượng tối đa
            selectedColorInput.addEventListener('change', updatePrice);
            selectedSizeInput.addEventListener('change', updatePrice);

            quantityInput.addEventListener('input', function() {
                if (parseInt(this.value) > parseInt(this.max)) {
                    alert('Số lượng vượt quá tồn kho. Vui lòng chọn số lượng nhỏ hơn.');
                    this.value = this.max;
                }
            });
        });
    </script>
@endsection
