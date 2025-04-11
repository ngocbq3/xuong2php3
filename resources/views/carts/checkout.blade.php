@extends('layouts.app')
@section('title', 'Thanh toán')

@section('content')
    <div class="container my-5">
        <div class="row g-5">
            <!-- Form thanh toán -->
            <div class="col-md-7">
                <h3 class="mb-4">Thông tin thanh toán</h3>
                <form action="{{ route('cart.checkout.post') }}" method="POST">
                    <!-- CSRF nếu dùng Laravel -->
                    <!-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> -->
                    @csrf
                    <div class="mb-3">
                        <label for="full_name" class="form-label">Họ và tên</label>
                        <input type="text" class="form-control" id="name" name="name"
                            value="{{ Auth::user()->name }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email"
                            value="{{ Auth::user()->email }}" required>
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
                            <input class="form-check-input" type="radio" name="payment" id="cod" value="cod"
                                checked>
                            <label class="form-check-label" for="cod">Thanh toán khi nhận hàng (COD)</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="payment" id="bank" value="bank">
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
                    @foreach ($cart as $item)
                        <div class="cart-item">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <strong>{{ $item['name'] }}</strong><br>
                                    <small>Màu: <span class="badge bg-primary">{{ $item['color'] }}</span>, Size:
                                        {{ $item['size'] }}</small><br>
                                    <small>Số lượng: {{ $item['quantity'] }}</small>,
                                    <small>Đơn giá: {{ number_format($item['price'], 2, ',') }}đ</small>
                                </div>
                                <div class="text-end">

                                    <strong>Thành tiền:
                                        {{ number_format($item['price'] * $item['quantity'], 2, ',') }}đ</strong>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <!-- Tổng cộng -->
                    <div class="d-flex justify-content-between mt-3 border-top pt-3">
                        <strong>Tổng cộng:</strong>
                        <strong>{{ number_format($totalPrice, 2, ',') }}đ</strong>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
