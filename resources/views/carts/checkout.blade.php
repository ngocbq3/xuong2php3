@extends('layouts.app')
@section('title', 'Thanh toán')

@section('content')
    <div class="container my-5">
        <div class="row g-5">
            <!-- Form thanh toán -->
            <div class="col-md-7">
                <h3 class="mb-4">Thông tin thanh toán</h3>
                <form action="/thanh-toan" method="POST">
                    <!-- CSRF nếu dùng Laravel -->
                    <!-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> -->
                    @csrf
                    <div class="mb-3">
                        <label for="full_name" class="form-label">Họ và tên</label>
                        <input type="text" class="form-control" id="full_name" name="full_name" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>

                    <div class="mb-3">
                        <label for="phone" class="form-label">Số điện thoại</label>
                        <input type="tel" class="form-control" id="phone" name="phone" required>
                    </div>

                    <div class="mb-3">
                        <label for="address" class="form-label">Địa chỉ nhận hàng</label>
                        <input type="text" class="form-control" id="address" name="address" required>
                    </div>

                    <div class="mb-3">
                        <label for="note" class="form-label">Ghi chú</label>
                        <textarea class="form-control" id="note" name="note" rows="3"></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label d-block">Phương thức thanh toán</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="payment_method" id="cod"
                                value="cod" checked>
                            <label class="form-check-label" for="cod">Thanh toán khi nhận hàng (COD)</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="payment_method" id="bank"
                                value="bank">
                            <label class="form-check-label" for="bank">Chuyển khoản ngân hàng</label>
                        </div>
                    </div>

                    <div class="text-end mt-4">
                        <button type="submit" class="btn btn-success">Xác nhận thanh toán</button>
                    </div>
                </form>
            </div>

            <!-- Mini cart bên phải -->
            <div class="col-md-5">
                <h4 class="mb-3">Đơn hàng của bạn</h4>
                <div class="cart-summary">
                    <!-- Sản phẩm -->
                    <div class="cart-item">
                        <div class="d-flex justify-content-between">
                            <div>
                                <strong>Áo Thun Nam</strong><br>
                                <small>Màu: <span class="badge bg-primary">Xanh</span>, Size: M</small><br>
                                <small>Số lượng: 2</small>
                            </div>
                            <div class="text-end">
                                <strong>400.000đ</strong>
                            </div>
                        </div>
                    </div>

                    <div class="cart-item">
                        <div class="d-flex justify-content-between">
                            <div>
                                <strong>Quần Jean</strong><br>
                                <small>Màu: <span class="badge bg-dark">Đen</span>, Size: L</small><br>
                                <small>Số lượng: 1</small>
                            </div>
                            <div class="text-end">
                                <strong>600.000đ</strong>
                            </div>
                        </div>
                    </div>

                    <!-- Tổng cộng -->
                    <div class="d-flex justify-content-between mt-3 border-top pt-3">
                        <strong>Tổng cộng:</strong>
                        <strong>1.000.000đ</strong>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
