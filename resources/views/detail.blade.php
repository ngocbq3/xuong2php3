@extends('layouts.app')
@section('title', 'Chi Tiết Sản Phẩm')
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
                        <img src="img/placeholder.jpg" class="d-block w-100 product-detail-img" alt="Ảnh sản phẩm 1">
                    </div>
                    <div class="carousel-item">
                        <img src="img/placeholder.jpg" class="d-block w-100 product-detail-img" alt="Ảnh sản phẩm 2">
                    </div>
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
                <img src="img/placeholder.jpg" alt="Thumbnail 1" class="img-thumbnail me-2"
                    style="width: 60px; height: 60px; cursor: pointer;" data-bs-target="#productImageCarousel"
                    data-bs-slide-to="0">
                <img src="img/placeholder.jpg" alt="Thumbnail 2" class="img-thumbnail me-2"
                    style="width: 60px; height: 60px; cursor: pointer;" data-bs-target="#productImageCarousel"
                    data-bs-slide-to="1">
            </div>
        </div>

        <div class="col-md-6">
            <h1 class="mb-3">Áo Thun Basic Cotton</h1>
            <p class="fs-3 fw-bold text-danger mb-3">250.000₫</p>
            <div class="mb-4">
                <h5>Mô tả sản phẩm</h5>
                <p>Đây là phần mô tả chi tiết về sản phẩm Áo Thun Basic Cotton. Chất liệu 100% cotton thoáng mát, thấm hút
                    mồ hôi tốt. Kiểu dáng basic dễ phối đồ, phù hợp mặc hàng ngày, đi chơi, đi làm.</p>
                <ul>
                    <li>Chất liệu: 100% Cotton</li>
                    <li>Xuất xứ: Việt Nam</li>
                    <li>Đặc điểm: Mềm mại, thoáng khí</li>
                </ul>
            </div>

            <form>
                <div class="mb-3">
                    <label for="colorOptions" class="form-label fw-bold">Màu sắc:</label>
                    <div id="colorOptions">
                        <span class="color-option active" style="background-color: white;" title="Trắng"
                            data-color="white"></span>
                        <span class="color-option" style="background-color: black;" title="Đen"
                            data-color="black"></span>
                        <span class="color-option" style="background-color: red;" title="Đỏ" data-color="red"></span>
                        <span class="color-option" style="background-color: blue;" title="Xanh dương"
                            data-color="blue"></span>
                    </div>
                    <input type="hidden" name="selected_color" id="selected_color" value="white">
                </div>

                <div class="mb-3">
                    <label for="sizeOptions" class="form-label fw-bold">Kích thước:</label>
                    <div id="sizeOptions">
                        <span class="size-option active" data-size="S">S</span>
                        <span class="size-option" data-size="M">M</span>
                        <span class="size-option" data-size="L">L</span>
                        <span class="size-option" data-size="XL">XL</span>
                    </div>
                    <input type="hidden" name="selected_size" id="selected_size" value="S">
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
            <div class="col">
                <div class="card h-100 shadow-sm product-card">
                    <img src="img/placeholder.jpg" class="card-img-top" alt="Sản phẩm liên quan 1">
                    <div class="card-body">
                        <h5 class="card-title">Quần Short Kaki</h5>
                        <p class="card-text fw-bold text-danger">320.000₫</p>
                        <a href="product-detail.html" class="btn btn-outline-primary btn-sm">Xem chi tiết</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100 shadow-sm product-card">
                    <img src="img/placeholder.jpg" class="card-img-top" alt="Sản phẩm liên quan 2">
                    <div class="card-body">
                        <h5 class="card-title">Áo Polo Nam</h5>
                        <p class="card-text fw-bold text-danger">290.000₫</p>
                        <a href="product-detail.html" class="btn btn-outline-primary btn-sm">Xem chi tiết</a>
                    </div>
                </div>
            </div>
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
        });
    </script>
@endsection
